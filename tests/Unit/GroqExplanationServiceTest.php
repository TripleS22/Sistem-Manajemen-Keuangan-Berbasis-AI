<?php

namespace Tests\Unit;

use App\Models\BusinessProfile;
use App\Models\User;
use App\Services\AI\AiExplanationService;
use App\Services\AI\GroqExplanationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GroqExplanationServiceTest extends TestCase
{
    use RefreshDatabase;

    private GroqExplanationService $groqService;

    private BusinessProfile $profile;

    /** @var array<string, mixed> */
    private array $features;

    /** @var array{prediction: string, confidence: float, key_factors: array<string>} */
    private array $mlResult;

    protected function setUp(): void
    {
        parent::setUp();

        $this->groqService = app(GroqExplanationService::class);

        $user = User::factory()->create();
        $this->profile = BusinessProfile::create([
            'user_id' => $user->id,
            'business_name' => 'Toko Berkah Sejahtera',
            'business_type' => 'Retail & Sembako',
            'initial_capital' => 5_000_000,
        ]);

        $this->features = [
            'total_income' => 15_000_000,
            'total_expense' => 9_000_000,
            'net_cash_flow' => 6_000_000,
            'expense_ratio' => 0.6,
            'income_trend' => 0.15,
            'cash_flow_trend' => 0.20,
        ];

        $this->mlResult = [
            'prediction' => 'Sehat',
            'confidence' => 0.95,
            'key_factors' => ['Arus kas bersih positif', 'Rasio beban terkendali'],
        ];
    }

    /** @test */
    public function test_groq_service_falls_back_when_api_key_is_missing(): void
    {
        Config::set('services.groq.api_key', null);

        $result = $this->groqService->explain($this->profile, $this->features, $this->mlResult);

        $this->assertEquals('fallback', $result['status']);
        $this->assertStringContainsString('rule_based_fallback', $result['provider']);
        $this->assertNotEmpty($result['explanation']);
        $this->assertNotEmpty($result['recommendations']);
    }

    /** @test */
    public function test_groq_service_parses_successful_api_response(): void
    {
        Config::set('services.groq.api_key', 'gsk_mock_test_key');
        Config::set('services.groq.model', 'llama-3.3-70b-versatile');

        Http::fake([
            'api.groq.com/*' => Http::response([
                'choices' => [
                    [
                        'message' => [
                            'content' => json_encode([
                                'explanation' => 'Usaha Toko Berkah Sejahtera berada dalam tren finansial yang prima.',
                                'recommendations' => [
                                    'Sisihkan cadangan operasional 10%',
                                    'Percepat perputaran inventaris',
                                ],
                            ]),
                        ],
                    ],
                ],
            ], 200),
        ]);

        $result = $this->groqService->explain($this->profile, $this->features, $this->mlResult);

        $this->assertEquals('success', $result['status']);
        $this->assertEquals('groq', $result['provider']);
        $this->assertStringContainsString('Toko Berkah Sejahtera', $result['explanation']);
        $this->assertCount(2, $result['recommendations']);
    }

    /** @test */
    public function test_groq_service_falls_back_when_api_returns_error(): void
    {
        Config::set('services.groq.api_key', 'gsk_mock_test_key');

        Http::fake([
            'api.groq.com/*' => Http::response(['error' => 'Rate limit reached'], 429),
        ]);

        $result = $this->groqService->explain($this->profile, $this->features, $this->mlResult);

        $this->assertEquals('fallback', $result['status']);
        $this->assertStringContainsString('rule_based_fallback', $result['provider']);
        $this->assertNotEmpty($result['explanation']);
    }

    /** @test */
    public function test_ai_explanation_coordinator_routes_to_groq_by_default(): void
    {
        Config::set('services.ai.provider', 'groq');
        Config::set('services.groq.api_key', null);

        $coordinator = app(AiExplanationService::class);
        $result = $coordinator->explain($this->profile, $this->features, $this->mlResult);

        $this->assertStringContainsString('rule_based_fallback', $result['provider']);
    }
}
