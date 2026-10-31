<?php

namespace App\Services\AI;

use App\Models\BusinessProfile;

class AiExplanationService
{
    public function __construct(
        protected GroqExplanationService $groqService,
        protected GeminiExplanationService $geminiService
    ) {}

    /**
     * Dispatch AI explanation request to the configured LLM provider.
     *
     * @param  array<string, mixed>  $features
     * @param  array{prediction: string, confidence: float, key_factors: array<string>}  $mlResult
     * @return array{explanation: string, recommendations: array<string>, provider: string, status: string}
     */
    public function explain(BusinessProfile $profile, array $features, array $mlResult): array
    {
        $provider = config('services.ai.provider', 'groq');

        if ($provider === 'gemini') {
            return $this->geminiService->explain($profile, $features, $mlResult);
        }

        return $this->groqService->explain($profile, $features, $mlResult);
    }
}
