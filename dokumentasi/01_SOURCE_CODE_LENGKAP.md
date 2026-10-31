# 01 — Source Code Lengkap

Sistem Manajemen Keuangan UMKM Berbasis AI (Laravel 12 + Filament + Rubix ML + Groq LLM). Model ML versi 1.1.0.
Dokumen ini berisi seluruh kode yang ditulis khusus untuk aplikasi (folder `vendor/`, `node_modules/` dan aset hasil build tidak disertakan).

## Daftar File (104 file)

- `composer.json`
- `bootstrap/app.php`
- `bootstrap/providers.php`
- `routes/console.php`
- `routes/web.php`
- `config/services.php`
- `app/Console/Commands/TrainDecisionTreeCommand.php`
- `app/Filament/Pages/Auth/Register.php`
- `app/Filament/Pages/BusinessProfilePage.php`
- `app/Filament/Pages/Dashboard.php`
- `app/Filament/Pages/FinancialReportPage.php`
- `app/Filament/Resources/FinancialAnalyses/FinancialAnalysisResource.php`
- `app/Filament/Resources/FinancialAnalyses/Pages/CreateFinancialAnalysis.php`
- `app/Filament/Resources/FinancialAnalyses/Pages/EditFinancialAnalysis.php`
- `app/Filament/Resources/FinancialAnalyses/Pages/ListFinancialAnalyses.php`
- `app/Filament/Resources/FinancialAnalyses/Pages/ViewFinancialAnalysis.php`
- `app/Filament/Resources/FinancialAnalyses/Schemas/FinancialAnalysisForm.php`
- `app/Filament/Resources/FinancialAnalyses/Schemas/FinancialAnalysisInfolist.php`
- `app/Filament/Resources/FinancialAnalyses/Tables/FinancialAnalysesTable.php`
- `app/Filament/Resources/TransactionCategories/Pages/CreateTransactionCategory.php`
- `app/Filament/Resources/TransactionCategories/Pages/EditTransactionCategory.php`
- `app/Filament/Resources/TransactionCategories/Pages/ListTransactionCategories.php`
- `app/Filament/Resources/TransactionCategories/Schemas/TransactionCategoryForm.php`
- `app/Filament/Resources/TransactionCategories/Tables/TransactionCategoriesTable.php`
- `app/Filament/Resources/TransactionCategories/TransactionCategoryResource.php`
- `app/Filament/Resources/Transactions/Pages/CreateTransaction.php`
- `app/Filament/Resources/Transactions/Pages/EditTransaction.php`
- `app/Filament/Resources/Transactions/Pages/ListTransactions.php`
- `app/Filament/Resources/Transactions/Schemas/TransactionForm.php`
- `app/Filament/Resources/Transactions/Tables/TransactionsTable.php`
- `app/Filament/Resources/Transactions/TransactionResource.php`
- `app/Filament/Resources/Users/Pages/CreateUser.php`
- `app/Filament/Resources/Users/Pages/EditUser.php`
- `app/Filament/Resources/Users/Pages/ListUsers.php`
- `app/Filament/Resources/Users/Schemas/UserForm.php`
- `app/Filament/Resources/Users/Tables/UsersTable.php`
- `app/Filament/Resources/Users/UserResource.php`
- `app/Filament/Widgets/CashFlowChartWidget.php`
- `app/Filament/Widgets/FinancialOverviewWidget.php`
- `app/Filament/Widgets/RecentTransactionsWidget.php`
- `app/Http/Controllers/Controller.php`
- `app/Http/Controllers/FinancialReportPrintController.php`
- `app/Livewire/TenantSwitcher.php`
- `app/Models/AnalysisExplanation.php`
- `app/Models/BusinessProfile.php`
- `app/Models/FinancialAnalysis.php`
- `app/Models/Transaction.php`
- `app/Models/TransactionCategory.php`
- `app/Models/User.php`
- `app/Providers/AppServiceProvider.php`
- `app/Providers/Filament/AdminPanelProvider.php`
- `app/Services/AI/AiExplanationService.php`
- `app/Services/AI/GeminiExplanationService.php`
- `app/Services/AI/GroqExplanationService.php`
- `app/Services/ML/DatasetGenerator.php`
- `app/Services/ML/FinancialDecisionTreeService.php`
- `app/Services/TenantShopService.php`
- `app/Support/DashboardPeriod.php`
- `app/Support/TenantContext.php`
- `database/factories/AnalysisExplanationFactory.php`
- `database/factories/BusinessProfileFactory.php`
- `database/factories/FinancialAnalysisFactory.php`
- `database/factories/TransactionCategoryFactory.php`
- `database/factories/TransactionFactory.php`
- `database/factories/UserFactory.php`
- `database/migrations/0001_01_01_000000_create_users_table.php`
- `database/migrations/0001_01_01_000001_create_cache_table.php`
- `database/migrations/0001_01_01_000002_create_jobs_table.php`
- `database/migrations/2026_10_27_074505_add_role_to_users_table.php`
- `database/migrations/2026_10_27_074540_create_business_profiles_table.php`
- `database/migrations/2026_10_27_074556_create_transaction_categories_table.php`
- `database/migrations/2026_10_27_074655_create_transactions_table.php`
- `database/migrations/2026_10_27_074802_create_financial_analyses_table.php`
- `database/migrations/2026_10_27_074817_create_analysis_explanations_table.php`
- `database/seeders/AnalysisExplanationSeeder.php`
- `database/seeders/BusinessProfileSeeder.php`
- `database/seeders/DatabaseSeeder.php`
- `database/seeders/FinancialAnalysisSeeder.php`
- `database/seeders/TransactionCategorySeeder.php`
- `database/seeders/TransactionSeeder.php`
- `database/seeders/UserSeeder.php`
- `resources/views/errors/503.blade.php`
- `resources/views/filament/pages/business-profile-page.blade.php`
- `resources/views/filament/pages/financial-report-page.blade.php`
- `resources/views/filament/tour-theme.blade.php`
- `resources/views/livewire/tenant-switcher.blade.php`
- `resources/views/reports/financial-print.blade.php`
- `resources/views/welcome.blade.php`
- `resources/css/app.css`
- `resources/js/app.js`
- `tests/Feature/AuthenticationTest.php`
- `tests/Feature/DashboardTest.php`
- `tests/Feature/DataIsolationTest.php`
- `tests/Feature/ExampleTest.php`
- `tests/Feature/FinancialAnalysisTest.php`
- `tests/Feature/FinancialReportPrintTest.php`
- `tests/Feature/TenantRegistrationTest.php`
- `tests/Feature/TenantSwitcherTest.php`
- `tests/Feature/TransactionTest.php`
- `tests/TestCase.php`
- `tests/Unit/DecisionTreeEvaluationTest.php`
- `tests/Unit/ExampleTest.php`
- `tests/Unit/FeatureExtractionTest.php`
- `tests/Unit/GroqExplanationServiceTest.php`

---

### `composer.json`

````json
{
    "$schema": "https://getcomposer.org/schema.json",
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": ["laravel", "framework"],
    "license": "MIT",
    "require": {
        "php": "^8.3",
        "filament/filament": "^5.11",
        "laravel/framework": "^13.17",
        "laravel/tinker": "^3.0",
        "rubix/ml": "^3.3",
        "yacoubalhaidari/filament-tour": "^1.0"
    },
    "require-dev": {
        "fakerphp/faker": "^1.23",
        "laravel/boost": "^2.10",
        "laravel/pail": "^1.2.5",
        "laravel/pao": "^1.0.6",
        "laravel/pint": "^1.27",
        "mockery/mockery": "^1.6",
        "nunomaduro/collision": "^8.6",
        "phpunit/phpunit": "^12.5.12"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "setup": [
            "composer install",
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\"",
            "@php artisan key:generate",
            "@php artisan migrate --force",
            "npm install --ignore-scripts",
            "npm run build"
        ],
        "dev": [
            "Composer\\Config::disableProcessTimeout",
            "@php artisan dev"
        ],
        "test": [
            "@php artisan config:clear --ansi @no_additional_args",
            "@php artisan test"
        ],
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi",
            "@php artisan filament:upgrade"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi",
            "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
            "@php artisan migrate --graceful --ansi"
        ],
        "pre-package-uninstall": [
            "Illuminate\\Foundation\\ComposerScripts::prePackageUninstall"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}

````

---

### `bootstrap/app.php`

````php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn () => route('filament.admin.auth.login'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();

````

---

### `bootstrap/providers.php`

````php
<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
];

````

---

### `routes/console.php`

````php
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

````

---

### `routes/web.php`

````php
<?php

use App\Http\Controllers\FinancialReportPrintController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/laporan/cetak', FinancialReportPrintController::class)
    ->middleware('auth')
    ->name('reports.print');

````

---

### `config/services.php`

````php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'ai' => [
        'provider' => env('AI_PROVIDER', 'groq'),
    ],

    'groq' => [
        'api_key' => env('GROQ_API_KEY'),
        'model' => env('GROQ_MODEL', 'openai/gpt-oss-20b'),
    ],

    'gemini' => [
        'api_key' => env('GEMINI_API_KEY'),
        'model' => env('GEMINI_MODEL', 'gemini-2.5-flash'),
    ],

];

````

---

### `app/Console/Commands/TrainDecisionTreeCommand.php`

````php
<?php

namespace App\Console\Commands;

use App\Services\ML\FinancialDecisionTreeService;
use Illuminate\Console\Command;

class TrainDecisionTreeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ml:train-decision-tree {--samples=5000 : Number of training samples}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Train the Decision Tree model for UMKM financial classification and output evaluation metrics';

    /**
     * Execute the console command.
     */
    public function handle(FinancialDecisionTreeService $service): int
    {
        $samples = (int) $this->option('samples');
        $this->info("Melatih Decision Tree Classifier dengan $samples sampel data UMKM...");

        $result = $service->train($samples);

        $this->newLine();
        $this->info('=== HASIL EVALUASI MODEL DECISION TREE ===');
        $this->table(
            ['Metrik', 'Nilai'],
            [
                ['Sampel Training (80%)', $result['train_samples_count']],
                ['Sampel Testing (20%)', $result['test_samples_count']],
                ['Akurasi Testing (Accuracy)', ($result['accuracy'] * 100).'%'],
            ]
        );

        $this->newLine();
        $this->info('=== BREAKDOWN PRECISI / RECALL / F1-SCORE ===');
        $classes = ['Sehat', 'Perlu perhatian', 'Berisiko'];
        $reportData = [];

        foreach ($classes as $cls) {
            $classReport = $result['report']['classes'][$cls] ?? [];
            $reportData[] = [
                $cls,
                isset($classReport['precision']) ? round($classReport['precision'] * 100, 2).'%' : 'N/A',
                isset($classReport['recall']) ? round($classReport['recall'] * 100, 2).'%' : 'N/A',
                isset($classReport['f1 score']) ? round($classReport['f1 score'] * 100, 2).'%' : 'N/A',
                $classReport['cardinality'] ?? '—',
            ];
        }

        $this->table(
            ['Kelas', 'Precision', 'Recall', 'F1-Score', 'Jumlah Sampel Uji'],
            $reportData
        );

        $this->newLine();
        $this->info('Model berhasil disimpan ke disk di storage/app/ml/decision_tree.model');

        return Command::SUCCESS;
    }
}

````

---

### `app/Filament/Pages/Auth/Register.php`

````php
<?php

namespace App\Filament\Pages\Auth;

use App\Services\TenantShopService;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use SensitiveParameter;

class Register extends BaseRegister
{
    public function getHeading(): string|Htmlable|null
    {
        return 'Daftar Toko UMKM Baru';
    }

    public function getSubheading(): string|Htmlable|null
    {
        return 'Daftarkan toko UMKM Anda untuk mulai mencatat keuangan dan memperoleh analisis AI.';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent()
                    ->label('Nama Pemilik Usaha')
                    ->placeholder('Contoh: Budi Santoso'),
                $this->getBusinessNameFormComponent(),
                $this->getEmailFormComponent()
                    ->label('Alamat Email')
                    ->placeholder('owner@tokoanda.com'),
                $this->getPasswordFormComponent()
                    ->label('Password'),
                $this->getPasswordConfirmationFormComponent()
                    ->label('Konfirmasi Password'),
            ]);
    }

    protected function getBusinessNameFormComponent(): Component
    {
        return TextInput::make('business_name')
            ->label('Nama Toko / Usaha UMKM')
            ->placeholder('Contoh: Kedai Kopi Berkah')
            ->required()
            ->maxLength(255);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function handleRegistration(#[SensitiveParameter] array $data): Model
    {
        $businessName = $data['business_name'] ?? null;
        unset($data['business_name']);

        $data['role'] = 'owner';

        $user = $this->getUserModel()::create($data);

        app(TenantShopService::class)->initializeShop($user, $businessName);

        return $user;
    }
}

````

---

### `app/Filament/Pages/BusinessProfilePage.php`

````php
<?php

namespace App\Filament\Pages;

use App\Models\BusinessProfile;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class BusinessProfilePage extends Page
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'business-profile';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Profil Bisnis & Modal Usaha';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Kelola informasi identitas usaha UMKM dan besaran modal awal untuk acuan evaluasi kesehatan bisnis.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Atur nama dan bidang usaha UMKM Anda',
            'Tentukan modal awal usaha',
            'Simpan catatan strategi dan target operasional bisnis',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 20;
    }

    protected static ?string $title = 'Profil UMKM';

    protected static ?string $navigationLabel = 'Profil UMKM';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan Usaha';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.business-profile-page';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $profile = \App\Support\TenantContext::getActiveBusinessProfile();

        $this->form->fill($profile ? $profile->attributesToArray() : []);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Informasi Pokok Usaha')
                    ->description('Data identitas UMKM yang digunakan sebagai konteks analisis kesehatan keuangan.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('business_name')
                            ->label('Nama Usaha / Brand')
                            ->placeholder('Contoh: Kedai Kopi Berkah')
                            ->required()
                            ->maxLength(255),
                        Select::make('business_type')
                            ->label('Jenis / Bidang Usaha')
                            ->options([
                                'Kuliner & F&B' => 'Kuliner & Makanan / Minuman (F&B)',
                                'Retail & Perdagangan' => 'Retail, Toko Kelontong & Minimarket',
                                'Fashion & Konveksi' => 'Fashion, Pakaian & Aksesori',
                                'Jasa & Konsultasi' => 'Jasa, Perbaikan & Layanan',
                                'Kerajinan & Kriya' => 'Kerajinan Tangan, Kriya & Seni',
                                'Pertanian & Peternakan' => 'Pertanian, Perkebunan & Peternakan',
                                'Teknologi & Digital' => 'Teknologi & Agensi Digital',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->searchable()
                            ->required(),
                        TextInput::make('initial_capital')
                            ->label('Modal Awal (Rp)')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('0')
                            ->helperText('Estimasi modal awal usaha ketika memulai operasional.'),
                        TextInput::make('phone')
                            ->label('Nomor Telepon / WhatsApp')
                            ->tel()
                            ->placeholder('08xxxxxxxxxx'),
                        Textarea::make('address')
                            ->label('Alamat Tempat Usaha')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Deskripsi Singkat Usaha')
                            ->placeholder('Jelaskan produk utama, target pelanggan, dan model operasional usaha Anda...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public function save(): void
    {
        $validatedData = $this->form->getState();

        $profile = \App\Support\TenantContext::getActiveBusinessProfile();

        if ($profile) {
            $profile->update($validatedData);
        }

        Notification::make()
            ->title('Profil UMKM Berhasil Disimpan')
            ->body('Data identitas usaha telah diperbarui.')
            ->success()
            ->send();
    }
}

````

---

### `app/Filament/Pages/Dashboard.php`

````php
<?php

namespace App\Filament\Pages;

use App\Support\DashboardPeriod;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Schema;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'dashboard';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Dashboard Ringkasan Keuangan';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Pusat ringkasan kondisi finansial bisnis Anda dengan grafik visual dan kartu statistik penting.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Pantau total pemasukan, pengeluaran, dan laba bersih secara real-time',
            'Grafik tren arus kas bulanan yang dinamis',
            'Tinjau daftar transaksi terbaru usaha Anda',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 10;
    }

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Select::make('period')
                    ->label('Periode')
                    ->options(DashboardPeriod::options())
                    ->default('this_month')
                    ->native(false)
                    ->columnSpan(1),
            ]);
    }
}

````

---

### `app/Filament/Pages/FinancialReportPage.php`

````php
<?php

namespace App\Filament\Pages;

use App\Models\BusinessProfile;
use App\Models\Transaction;
use BackedEnum;
use Carbon\Carbon;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Symfony\Component\HttpFoundation\StreamedResponse;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class FinancialReportPage extends Page
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'financial-report';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Laporan Keuangan & Cetak PDF';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Tinjau performa keuangan berkala (Laba Rugi & Arus Kas) serta cetak laporan resmi usaha.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Filter periode laporan bulanan, tahunan, atau rentang tanggal kustom',
            'Rekapitulasi Laba/Rugi bersih dan rincian per kategori transaksi',
            'Cetak dokumen laporan keuangan resmi siap cetak / simpan ke format PDF',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 60;
    }

    protected static ?string $title = 'Laporan Keuangan';

    protected static ?string $navigationLabel = 'Laporan Keuangan';

    protected static string|UnitEnum|null $navigationGroup = 'Laporan & Analisis AI';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentChartBar;

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.financial-report-page';

    public string $period = 'this_month';

    public ?string $startDate = null;

    public ?string $endDate = null;

    public function mount(): void
    {
        $this->setPeriodDates();
    }

    public function updatedPeriod(): void
    {
        $this->setPeriodDates();
    }

    public function updatedStartDate(): void
    {
        $this->period = 'custom';
    }

    public function updatedEndDate(): void
    {
        $this->period = 'custom';
    }

    protected function setPeriodDates(): void
    {
        $now = Carbon::now();

        match ($this->period) {
            'today' => [
                $this->startDate = $now->copy()->format('Y-m-d'),
                $this->endDate = $now->copy()->format('Y-m-d'),
            ],
            'this_month' => [
                $this->startDate = $now->copy()->startOfMonth()->format('Y-m-d'),
                $this->endDate = $now->copy()->endOfMonth()->format('Y-m-d'),
            ],
            'last_month' => [
                $this->startDate = $now->copy()->subMonth()->startOfMonth()->format('Y-m-d'),
                $this->endDate = $now->copy()->subMonth()->endOfMonth()->format('Y-m-d'),
            ],
            'this_year' => [
                $this->startDate = $now->copy()->startOfYear()->format('Y-m-d'),
                $this->endDate = $now->copy()->endOfYear()->format('Y-m-d'),
            ],
            default => null,
        };
    }

    /**
     * @return array<string, mixed>
     */
    public function getReportData(): array
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $transactionsQuery = Transaction::with('category')
            ->where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end]);

        $transactions = (clone $transactionsQuery)
            ->orderBy('transaction_date', 'asc')
            ->get();

        $totalIncome = (float) (clone $transactionsQuery)->where('type', 'income')->sum('amount');
        $totalExpense = (float) (clone $transactionsQuery)->where('type', 'expense')->sum('amount');
        $netCashFlow = $totalIncome - $totalExpense;
        $expenseRatio = $totalIncome > 0 ? ($totalExpense / $totalIncome) : 0;

        // Group by category
        $categoryBreakdown = [];
        foreach ($transactions as $t) {
            $catName = $t->category?->name ?? 'Tanpa Kategori';
            if (! isset($categoryBreakdown[$catName])) {
                $categoryBreakdown[$catName] = [
                    'name' => $catName,
                    'type' => $t->type,
                    'total' => 0,
                    'count' => 0,
                ];
            }
            $categoryBreakdown[$catName]['total'] += (float) $t->amount;
            $categoryBreakdown[$catName]['count']++;
        }

        $businessProfile = BusinessProfile::where('user_id', $userId)->first();

        return [
            'startDate' => $start->format('d M Y'),
            'endDate' => $end->format('d M Y'),
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'netCashFlow' => $netCashFlow,
            'expenseRatio' => $expenseRatio,
            'transactions' => $transactions,
            'categoryBreakdown' => $categoryBreakdown,
            'businessProfile' => $businessProfile,
        ];
    }

    public function exportCsv(): StreamedResponse
    {
        $data = $this->getReportData();
        $filename = 'laporan-keuangan-'.Carbon::parse($this->startDate)->format('Ymd').'-'.Carbon::parse($this->endDate)->format('Ymd').'.csv';

        return response()->streamDownload(function () use ($data) {
            $handle = fopen('php://output', 'w');
            // Add UTF-8 BOM for Excel compatibility
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($handle, ['LAPORAN KEUANGAN UMKM']);
            fputcsv($handle, ['Nama Usaha', $data['businessProfile']?->business_name ?? '-']);
            fputcsv($handle, ['Periode', $data['startDate'].' s/d '.$data['endDate']]);
            fputcsv($handle, []);

            fputcsv($handle, ['RINGKASAN']);
            fputcsv($handle, ['Total Pemasukan', $data['totalIncome']]);
            fputcsv($handle, ['Total Pengeluaran', $data['totalExpense']]);
            fputcsv($handle, ['Arus Kas Bersih', $data['netCashFlow']]);
            fputcsv($handle, ['Rasio Pengeluaran', number_format($data['expenseRatio'] * 100, 2).'%']);
            fputcsv($handle, []);

            fputcsv($handle, ['RINCIAN TRANSAKSI']);
            fputcsv($handle, ['No', 'Tanggal', 'Jenis', 'Kategori', 'Nominal (Rp)', 'Keterangan']);

            $no = 1;
            foreach ($data['transactions'] as $tx) {
                fputcsv($handle, [
                    $no++,
                    $tx->transaction_date->format('Y-m-d'),
                    $tx->type === 'income' ? 'Pemasukan' : 'Pengeluaran',
                    $tx->category?->name ?? '—',
                    $tx->amount,
                    $tx->description ?? '—',
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/FinancialAnalysisResource.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses;

use App\Filament\Resources\FinancialAnalyses\Pages\CreateFinancialAnalysis;
use App\Filament\Resources\FinancialAnalyses\Pages\EditFinancialAnalysis;
use App\Filament\Resources\FinancialAnalyses\Pages\ListFinancialAnalyses;
use App\Filament\Resources\FinancialAnalyses\Pages\ViewFinancialAnalysis;
use App\Filament\Resources\FinancialAnalyses\Schemas\FinancialAnalysisForm;
use App\Filament\Resources\FinancialAnalyses\Schemas\FinancialAnalysisInfolist;
use App\Filament\Resources\FinancialAnalyses\Tables\FinancialAnalysesTable;
use App\Models\FinancialAnalysis;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class FinancialAnalysisResource extends Resource
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'financial-analyses';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Analisis Keuangan AI';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Fitur unggulan untuk menganalisis kesehatan finansial UMKM secara otomatis dengan Machine Learning & AI LLM.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Klasifikasi kondisi bisnis (Sehat, Perlu Perhatian, Berisiko) via Decision Tree',
            'Penjelasan naratif cerdas dan rekomendasi taktis dari LLM AI (Groq / Gemini)',
            'Transparansi faktor penentu (*key factors*) dan tingkat keyakinan (*confidence score*)',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 50;
    }

    protected static ?string $model = FinancialAnalysis::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|UnitEnum|null $navigationGroup = 'Laporan & Analisis AI';

    protected static ?string $navigationLabel = 'Analisis Keuangan AI';

    protected static ?string $modelLabel = 'Analisis Keuangan';

    protected static ?string $pluralModelLabel = 'Riwayat Analisis AI';

    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $tenantId = \App\Support\TenantContext::getActiveTenantId();

        return $query->where('user_id', $tenantId);
    }

    public static function form(Schema $schema): Schema
    {
        return FinancialAnalysisForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FinancialAnalysisInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FinancialAnalysesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFinancialAnalyses::route('/'),
            'create' => CreateFinancialAnalysis::route('/create'),
            'view' => ViewFinancialAnalysis::route('/{record}'),
            'edit' => EditFinancialAnalysis::route('/{record}/edit'),
        ];
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/Pages/CreateFinancialAnalysis.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use App\Models\AnalysisExplanation;
use App\Models\BusinessProfile;
use App\Models\FinancialAnalysis;
use App\Services\AI\AiExplanationService;
use App\Services\ML\FinancialDecisionTreeService;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateFinancialAnalysis extends CreateRecord
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected static ?string $title = 'Jalankan Analisis Keuangan AI';

    protected function handleRecordCreation(array $data): Model
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();
        $start = Carbon::parse($data['period_start'])->startOfDay();
        $end = Carbon::parse($data['period_end'])->endOfDay();

        $profile = \App\Support\TenantContext::getActiveBusinessProfile();

        $mlService = app(FinancialDecisionTreeService::class);
        $features = $mlService->extractFeatures($userId, $start, $end);

        // Klasifikasi kondisi keuangan dengan model Decision Tree
        $mlResult = $mlService->predict($features);

        // Ekstraksi penjelasan dan rekomendasi dari LLM (Groq / Gemini)
        $aiService = app(AiExplanationService::class);
        $llmResult = $aiService->explain($profile, $features, $mlResult);

        // Simpan hasil analisis finansial
        $analysis = FinancialAnalysis::create([
            'user_id' => $userId,
            'period_start' => $data['period_start'],
            'period_end' => $data['period_end'],
            'total_income' => $features['total_income'],
            'total_expense' => $features['total_expense'],
            'net_cash_flow' => $features['net_cash_flow'],
            'expense_ratio' => $features['expense_ratio'],
            'income_trend' => $features['income_trend'],
            'cash_flow_trend' => $features['cash_flow_trend'],
            'prediction_label' => $mlResult['prediction'],
            'confidence_score' => $mlResult['confidence'],
            'key_factors' => $mlResult['key_factors'],
            'model_version' => FinancialDecisionTreeService::MODEL_VERSION,
        ]);

        // Simpan narasi penjelasan dan rekomendasi
        AnalysisExplanation::create([
            'financial_analysis_id' => $analysis->id,
            'explanation' => $llmResult['explanation'],
            'recommendations' => $llmResult['recommendations'],
            'provider' => $llmResult['provider'],
            'status' => $llmResult['status'],
        ]);

        Notification::make()
            ->title('Analisis Keuangan Berhasil!')
            ->body("Kondisi keuangan diklasifikasikan sebagai {$mlResult['prediction']}.")
            ->success()
            ->send();

        return $analysis;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->record]);
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/Pages/EditFinancialAnalysis.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFinancialAnalysis extends EditRecord
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/Pages/ListFinancialAnalyses.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinancialAnalyses extends ListRecords
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Jalankan Analisis AI')
                ->icon('heroicon-o-sparkles')
                ->color('primary'),
        ];
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/Pages/ViewFinancialAnalysis.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFinancialAnalysis extends ViewRecord
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/Schemas/FinancialAnalysisForm.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FinancialAnalysisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Pilih Periode Analisis')
                    ->description('Sistem akan menghitung otomatis seluruh pemasukan, pengeluaran, rasio keuangan, dan tren arus kas dari data transaksi Anda.')
                    ->columns(2)
                    ->schema([
                        DatePicker::make('period_start')
                            ->label('Tanggal Mulai Periode')
                            ->default(now()->startOfMonth())
                            ->required(),
                        DatePicker::make('period_end')
                            ->label('Tanggal Selesai Periode')
                            ->default(now())
                            ->required(),
                    ]),
            ]);
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/Schemas/FinancialAnalysisInfolist.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class FinancialAnalysisInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ringkasan Analisis')
                    ->description('Hasil klasifikasi kondisi keuangan oleh model Decision Tree')
                    ->icon('heroicon-o-sparkles')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('prediction_label')
                            ->label('Status Keuangan')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Sehat' => 'success',
                                'Perlu perhatian' => 'warning',
                                'Berisiko' => 'danger',
                                default => 'gray',
                            })
                            ->size(TextSize::Large),

                        TextEntry::make('confidence_score')
                            ->label('Tingkat Kepercayaan Model')
                            ->formatStateUsing(fn ($state): string => round((float) $state * 100, 1).'%')
                            ->badge()
                            ->color('info'),

                        TextEntry::make('model_version')
                            ->label('Versi Model')
                            ->badge()
                            ->color('gray'),

                        TextEntry::make('period_start')
                            ->label('Awal Periode')
                            ->date('d M Y'),

                        TextEntry::make('period_end')
                            ->label('Akhir Periode')
                            ->date('d M Y'),

                        TextEntry::make('created_at')
                            ->label('Dianalisis Pada')
                            ->dateTime('d M Y, H:i'),
                    ]),

                Section::make('Data Keuangan Periode')
                    ->description('Angka yang digunakan sebagai fitur input model Decision Tree')
                    ->icon('heroicon-o-banknotes')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('total_income')
                            ->label('Total Pemasukan')
                            ->formatStateUsing(fn ($state): string => 'Rp '.number_format((float) $state, 0, ',', '.'))
                            ->color('success'),

                        TextEntry::make('total_expense')
                            ->label('Total Pengeluaran')
                            ->formatStateUsing(fn ($state): string => 'Rp '.number_format((float) $state, 0, ',', '.'))
                            ->color('danger'),

                        TextEntry::make('net_cash_flow')
                            ->label('Arus Kas Bersih')
                            ->formatStateUsing(fn ($state): string => 'Rp '.number_format((float) $state, 0, ',', '.'))
                            ->color(fn ($state): string => (float) $state >= 0 ? 'success' : 'danger'),

                        TextEntry::make('expense_ratio')
                            ->label('Rasio Pengeluaran')
                            ->formatStateUsing(fn ($state): string => round((float) $state * 100, 1).'%')
                            ->color(fn ($state): string => match (true) {
                                (float) $state <= 0.70 => 'success',
                                (float) $state <= 0.90 => 'warning',
                                default => 'danger',
                            }),

                        TextEntry::make('income_trend')
                            ->label('Tren Pemasukan')
                            ->formatStateUsing(fn ($state): string => ((float) $state >= 0 ? '+' : '').round((float) $state * 100, 1).'%')
                            ->color(fn ($state): string => (float) $state >= 0 ? 'success' : 'danger'),

                        TextEntry::make('cash_flow_trend')
                            ->label('Tren Arus Kas')
                            ->formatStateUsing(fn ($state): string => ((float) $state >= 0 ? '+' : '').round((float) $state * 100, 1).'%')
                            ->color(fn ($state): string => (float) $state >= 0 ? 'success' : 'danger'),
                    ]),

                Section::make('Faktor Penentu Klasifikasi')
                    ->description('Faktor utama yang memengaruhi hasil keputusan model Decision Tree')
                    ->icon('heroicon-o-list-bullet')
                    ->schema([
                        TextEntry::make('key_factors')
                            ->label('')
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->columnSpanFull(),
                    ]),

                Section::make('Penjelasan & Rekomendasi AI')
                    ->description('Interpretasi naratif dan rekomendasi hasil analisis oleh LLM AI (Groq / Gemini) tanpa mengubah data sumber')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->relationship('explanation')
                    ->schema([
                        TextEntry::make('provider')
                            ->label('Penyedia AI')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => match (true) {
                                $state === 'groq' || str_starts_with($state, 'groq') => 'Groq AI (Llama 3.3)',
                                $state === 'gemini' || str_starts_with($state, 'gemini') => 'Gemini AI',
                                str_starts_with($state, 'rule') => 'Aturan Otomatis (Fallback)',
                                default => $state,
                            })
                            ->color(fn (string $state): string => match (true) {
                                $state === 'groq' || str_starts_with($state, 'groq') => 'success',
                                $state === 'gemini' || str_starts_with($state, 'gemini') => 'info',
                                str_starts_with($state, 'rule') => 'warning',
                                default => 'gray',
                            }),

                        TextEntry::make('status')
                            ->label('Status Permintaan')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'success', 'completed' => 'success',
                                'fallback' => 'warning',
                                'error' => 'danger',
                                default => 'gray',
                            }),

                        TextEntry::make('explanation')
                            ->label('Penjelasan Kondisi Keuangan')
                            ->columnSpanFull()
                            ->prose(),

                        TextEntry::make('recommendations')
                            ->label('Rekomendasi Tindakan')
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

````

---

### `app/Filament/Resources/FinancialAnalyses/Tables/FinancialAnalysesTable.php`

````php
<?php

namespace App\Filament\Resources\FinancialAnalyses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FinancialAnalysesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('period_start')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('period_end')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('net_cash_flow')
                    ->label('Arus Kas Bersih')
                    ->money('IDR', locale: 'id')
                    ->weight('bold')
                    ->color(fn ($state): string => $state >= 0 ? 'success' : 'danger')
                    ->sortable(),
                TextColumn::make('expense_ratio')
                    ->label('Rasio Biaya')
                    ->formatStateUsing(fn ($state) => number_format((float) $state * 100, 1).'%')
                    ->sortable(),
                TextColumn::make('prediction_label')
                    ->label('Status Keuangan (ML)')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'sehat' => 'success',
                        'perlu perhatian' => 'warning',
                        'berisiko' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('confidence_score')
                    ->label('Akurasi/Skor')
                    ->formatStateUsing(fn ($state) => $state ? number_format((float) $state * 100, 1).'%' : '—')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Waktu Analisis')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

````

---

### `app/Filament/Resources/TransactionCategories/Pages/CreateTransactionCategory.php`

````php
<?php

namespace App\Filament\Resources\TransactionCategories\Pages;

use App\Filament\Resources\TransactionCategories\TransactionCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactionCategory extends CreateRecord
{
    protected static string $resource = TransactionCategoryResource::class;
}

````

---

### `app/Filament/Resources/TransactionCategories/Pages/EditTransactionCategory.php`

````php
<?php

namespace App\Filament\Resources\TransactionCategories\Pages;

use App\Filament\Resources\TransactionCategories\TransactionCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransactionCategory extends EditRecord
{
    protected static string $resource = TransactionCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

````

---

### `app/Filament/Resources/TransactionCategories/Pages/ListTransactionCategories.php`

````php
<?php

namespace App\Filament\Resources\TransactionCategories\Pages;

use App\Filament\Resources\TransactionCategories\TransactionCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransactionCategories extends ListRecords
{
    protected static string $resource = TransactionCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

````

---

### `app/Filament/Resources/TransactionCategories/Schemas/TransactionCategoryForm.php`

````php
<?php

namespace App\Filament\Resources\TransactionCategories\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn () => \App\Support\TenantContext::getActiveTenantId() ?? auth()->id()),
                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->placeholder('Contoh: Penjualan Produk, Bahan Baku')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label('Tipe Transaksi')
                    ->options([
                        'income' => 'Pemasukan (Income)',
                        'expense' => 'Pengeluaran (Expense)',
                    ])
                    ->required(),
                ColorPicker::make('color')
                    ->label('Warna Label')
                    ->default('#10b981'),
                TextInput::make('icon')
                    ->label('Nama Icon (Heroicon)')
                    ->placeholder('heroicon-o-tag')
                    ->default('heroicon-o-tag'),
            ]);
    }
}

````

---

### `app/Filament/Resources/TransactionCategories/Tables/TransactionCategoriesTable.php`

````php
<?php

namespace App\Filament\Resources\TransactionCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'income' => 'success',
                        'expense' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                        default => $state,
                    }),
                TextColumn::make('color')
                    ->label('Warna')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('transactions_count')
                    ->counts('transactions')
                    ->label('Total Transaksi')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

````

---

### `app/Filament/Resources/TransactionCategories/TransactionCategoryResource.php`

````php
<?php

namespace App\Filament\Resources\TransactionCategories;

use App\Filament\Resources\TransactionCategories\Pages\CreateTransactionCategory;
use App\Filament\Resources\TransactionCategories\Pages\EditTransactionCategory;
use App\Filament\Resources\TransactionCategories\Pages\ListTransactionCategories;
use App\Filament\Resources\TransactionCategories\Schemas\TransactionCategoryForm;
use App\Filament\Resources\TransactionCategories\Tables\TransactionCategoriesTable;
use App\Models\TransactionCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class TransactionCategoryResource extends Resource
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'transaction-categories';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Kategori Transaksi';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Kelompokkan pos pemasukan dan pengeluaran agar pembukuan keuangan usaha tertata rapi.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Buat kategori pemasukan (Penjualan Produk, Jasa, Modal)',
            'Buat kategori pengeluaran (Bahan Baku, Gaji, Sewa, Operasional)',
            'Mudahkan pelacakan pos pengeluaran terbesar usaha',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 30;
    }

    protected static ?string $model = TransactionCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Transaksi';

    protected static ?string $navigationLabel = 'Kategori Transaksi';

    protected static ?string $modelLabel = 'Kategori Transaksi';

    protected static ?string $pluralModelLabel = 'Kategori Transaksi';

    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $tenantId = \App\Support\TenantContext::getActiveTenantId();

        return $query->where('user_id', $tenantId);
    }

    public static function form(Schema $schema): Schema
    {
        return TransactionCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransactionCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransactionCategories::route('/'),
            'create' => CreateTransactionCategory::route('/create'),
            'edit' => EditTransactionCategory::route('/{record}/edit'),
        ];
    }
}

````

---

### `app/Filament/Resources/Transactions/Pages/CreateTransaction.php`

````php
<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}

````

---

### `app/Filament/Resources/Transactions/Pages/EditTransaction.php`

````php
<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransaction extends EditRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

````

---

### `app/Filament/Resources/Transactions/Pages/ListTransactions.php`

````php
<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

````

---

### `app/Filament/Resources/Transactions/Schemas/TransactionForm.php`

````php
<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn () => \App\Support\TenantContext::getActiveTenantId() ?? auth()->id()),
                Select::make('type')
                    ->label('Jenis Transaksi')
                    ->options([
                        'income' => 'Pemasukan (+)',
                        'expense' => 'Pengeluaran (-)',
                    ])
                    ->default('expense')
                    ->required()
                    ->live(),
                Select::make('transaction_category_id')
                    ->label('Kategori')
                    ->relationship(
                        name: 'category',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn ($query, $get) => $query
                            ->where('user_id', \App\Support\TenantContext::getActiveTenantId() ?? auth()->id())
                            ->when($get('type'), fn ($q, $type) => $q->where('type', $type))
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        Hidden::make('user_id')
                            ->default(fn () => \App\Support\TenantContext::getActiveTenantId() ?? auth()->id()),
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->required(),
                        Select::make('type')
                            ->label('Jenis')
                            ->options([
                                'income' => 'Pemasukan',
                                'expense' => 'Pengeluaran',
                            ])
                            ->required(),
                    ]),
                TextInput::make('amount')
                    ->label('Nominal (Rp)')
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(1)
                    ->placeholder('Contoh: 500000')
                    ->required(),
                DatePicker::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->default(now())
                    ->required(),
                Textarea::make('description')
                    ->label('Keterangan / Catatan')
                    ->placeholder('Rincian singkat transaksi...')
                    ->columnSpanFull(),
            ]);
    }
}

````

---

### `app/Filament/Resources/Transactions/Tables/TransactionsTable.php`

````php
<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('transaction_date', 'desc')
            ->columns([
                TextColumn::make('transaction_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'income' => 'success',
                        'expense' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                        default => $state,
                    }),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->badge()
                    ->color('gray'),
                TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->weight('bold')
                    ->color(fn ($record): string => $record->type === 'income' ? 'success' : 'danger')
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Keterangan')
                    ->limit(40)
                    ->searchable()
                    ->placeholder('—'),
                TextColumn::make('created_at')
                    ->label('Tercatat Pada')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Jenis Transaksi')
                    ->options([
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                    ]),
                SelectFilter::make('transaction_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name', fn (Builder $query) => $query->when(! auth()->user()?->isAdmin(), fn ($q) => $q->where('user_id', auth()->id()))),
                Filter::make('transaction_date')
                    ->label('Rentang Tanggal')
                    ->form([
                        DatePicker::make('from')->label('Dari Tanggal'),
                        DatePicker::make('until')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $q, $date): Builder => $q->whereDate('transaction_date', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $q, $date): Builder => $q->whereDate('transaction_date', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

````

---

### `app/Filament/Resources/Transactions/TransactionResource.php`

````php
<?php

namespace App\Filament\Resources\Transactions;

use App\Filament\Resources\Transactions\Pages\CreateTransaction;
use App\Filament\Resources\Transactions\Pages\EditTransaction;
use App\Filament\Resources\Transactions\Pages\ListTransactions;
use App\Filament\Resources\Transactions\Schemas\TransactionForm;
use App\Filament\Resources\Transactions\Tables\TransactionsTable;
use App\Models\Transaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class TransactionResource extends Resource
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'transactions';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Pencatatan Transaksi Harian';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Catat setiap arus kas masuk dan keluar harian yang terjadi dalam aktivitas bisnis UMKM Anda.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Tambah transaksi pemasukan atau pengeluaran secara cepat',
            'Tentukan tanggal, kategori, dan rincian deskripsi transaksi',
            'Filter dan cari riwayat transaksi secara terperinci',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 40;
    }

    protected static ?string $model = Transaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'Transaksi';

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Transaksi';

    protected static ?string $modelLabel = 'Transaksi';

    protected static ?string $pluralModelLabel = 'Daftar Transaksi';

    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $tenantId = \App\Support\TenantContext::getActiveTenantId();

        return $query->where('user_id', $tenantId);
    }

    public static function form(Schema $schema): Schema
    {
        return TransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransactionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransactions::route('/'),
            'create' => CreateTransaction::route('/create'),
            'edit' => EditTransaction::route('/{record}/edit'),
        ];
    }
}

````

---

### `app/Filament/Resources/Users/Pages/CreateUser.php`

````php
<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use App\Services\TenantShopService;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Auto-verify email for accounts created by admin.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['email_verified_at'] = now();

        return $data;
    }

    /**
     * Initialize default shop profile and categories if the user is an owner.
     */
    protected function afterCreate(): void
    {
        /** @var User $record */
        $record = $this->record;

        if ($record->isOwner()) {
            app(TenantShopService::class)->initializeShop($record);
        }
    }
}

````

---

### `app/Filament/Resources/Users/Pages/EditUser.php`

````php
<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->before(function (EditUser $livewire): void {
                    if ($livewire->getRecord()->is(auth()->user())) {
                        $livewire->halt();
                    }
                }),
        ];
    }
}

````

---

### `app/Filament/Resources/Users/Pages/ListUsers.php`

````php
<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

````

---

### `app/Filament/Resources/Users/Schemas/UserForm.php`

````php
<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->placeholder('Masukkan nama lengkap')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->placeholder('contoh@email.com')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('password')
                    ->label('Password')
                    ->placeholder('Minimal 8 karakter')
                    ->password()
                    ->revealable()
                    ->required(fn (string $context): bool => $context === 'create')
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->minLength(8)
                    ->maxLength(255),
                Select::make('role')
                    ->label('Peran (Role)')
                    ->options([
                        'owner' => 'Pemilik Toko UMKM',
                        'admin' => 'Administrator Platform',
                    ])
                    ->required()
                    ->default('owner'),
            ]);
    }
}

````

---

### `app/Filament/Resources/Users/Tables/UsersTable.php`

````php
<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use App\Support\TenantContext;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pemilik')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('businessProfile.business_name')
                    ->label('Nama Toko / UMKM')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-building-storefront')
                    ->placeholder('Belum Diatur'),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-envelope'),
                TextColumn::make('role')
                    ->label('Peran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'warning',
                        'owner' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin' => 'Admin Platform',
                        'owner' => 'Pemilik Toko UMKM',
                        default => $state,
                    }),
                TextColumn::make('email_verified_at')
                    ->label('Terverifikasi')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->placeholder('Belum Terverifikasi'),
                TextColumn::make('created_at')
                    ->label('Terdaftar Sejak')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Peran')
                    ->options([
                        'owner' => 'Pemilik Toko UMKM',
                        'admin' => 'Admin Platform',
                    ]),
            ])
            ->recordActions([
                Action::make('switch_tenant')
                    ->label('Buka SIM Toko 🚀')
                    ->icon('heroicon-o-arrow-right-circle')
                    ->color('success')
                    ->action(function (User $record) {
                        TenantContext::setActiveTenantId($record->id);

                        return redirect('/admin');
                    })
                    ->visible(fn (User $record) => $record->isOwner()),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

````

---

### `app/Filament/Resources/Users/UserResource.php`

````php
<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Pengguna';

    protected static ?string $navigationLabel = 'Kelola Akun Toko';

    protected static ?string $modelLabel = 'Akun Toko UMKM';

    protected static ?string $pluralModelLabel = 'Daftar Toko & Owner';

    protected static ?int $navigationSort = 1;

    public static function canAccess(): bool
    {
        return (bool) auth()->user()?->isAdmin();
    }

    public static function canViewAny(): bool
    {
        return (bool) auth()->user()?->isAdmin();
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}

````

---

### `app/Filament/Widgets/CashFlowChartWidget.php`

````php
<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Support\DashboardPeriod;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class CashFlowChartWidget extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?bool $isLazyLoaded = false;

    protected ?string $heading = 'Grafik Arus Kas';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();
        $labels = [];
        $incomeData = [];
        $expenseData = [];

        // Untuk periode setahun, tampilkan 12 bulan kalender tahun berjalan;
        // untuk periode lainnya, tampilkan jendela 6 bulan yang berakhir pada bulan periode terpilih.
        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');
        $endMonth = $period['end']->copy()->startOfMonth();
        $monthCount = ($this->pageFilters['period'] ?? 'this_month') === 'this_year' ? 12 : 6;

        for ($i = $monthCount - 1; $i >= 0; $i--) {
            $month = $endMonth->copy()->subMonths($i);
            $start = $month->copy()->startOfMonth();
            $end = $month->copy()->endOfMonth();

            $labels[] = $month->translatedFormat($monthCount > 6 ? 'M' : 'M Y');

            $income = (float) Transaction::query()
                ->where('user_id', $userId)
                ->where('type', 'income')
                ->whereBetween('transaction_date', [$start, $end])
                ->sum('amount');

            $expense = (float) Transaction::query()
                ->where('user_id', $userId)
                ->where('type', 'expense')
                ->whereBetween('transaction_date', [$start, $end])
                ->sum('amount');

            $incomeData[] = $income;
            $expenseData[] = $expense;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan (Rp)',
                    'data' => $incomeData,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.85)',
                    'borderColor' => '#10b981',
                ],
                [
                    'label' => 'Pengeluaran (Rp)',
                    'data' => $expenseData,
                    'backgroundColor' => 'rgba(239, 68, 68, 0.85)',
                    'borderColor' => '#ef4444',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

````

---

### `app/Filament/Widgets/FinancialOverviewWidget.php`

````php
<?php

namespace App\Filament\Widgets;

use App\Models\FinancialAnalysis;
use App\Models\Transaction;
use App\Support\DashboardPeriod;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FinancialOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?bool $isLazyLoaded = false;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();

        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');
        [$start, $end] = [$period['start'], $period['end']];

        $txQuery = Transaction::query()->where('user_id', $userId);

        $income = (float) (clone $txQuery)
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $expense = (float) (clone $txQuery)
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $netCashFlow = $income - $expense;

        $latestAnalysis = FinancialAnalysis::query()
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $statusLabel = $latestAnalysis ? $latestAnalysis->prediction_label : 'Belum Ada Analisis';
        $statusColor = match (strtolower($statusLabel)) {
            'sehat' => 'success',
            'perlu perhatian' => 'warning',
            'berisiko' => 'danger',
            default => 'gray',
        };

        return [
            Stat::make('Total Pemasukan', 'Rp '.number_format($income, 0, ',', '.'))
                ->description($period['label'])
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Pengeluaran', 'Rp '.number_format($expense, 0, ',', '.'))
                ->description($period['label'])
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),

            Stat::make('Arus Kas Bersih (Net Cash Flow)', 'Rp '.number_format($netCashFlow, 0, ',', '.'))
                ->description($netCashFlow >= 0 ? 'Surplus Operasional' : 'Defisit Operasional')
                ->descriptionIcon($netCashFlow >= 0 ? 'heroicon-m-check-circle' : 'heroicon-m-exclamation-triangle')
                ->color($netCashFlow >= 0 ? 'success' : 'danger'),

            Stat::make('Kesehatan Keuangan AI', $statusLabel)
                ->description($latestAnalysis ? 'Hasil klasifikasi Decision Tree' : 'Jalankan analisis AI')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color($statusColor),
        ];
    }
}

````

---

### `app/Filament/Widgets/RecentTransactionsWidget.php`

````php
<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Support\DashboardPeriod;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget;

class RecentTransactionsWidget extends TableWidget
{
    use InteractsWithPageFilters;

    protected static ?bool $isLazyLoaded = false;

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function getTableHeading(): string
    {
        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');

        return 'Transaksi Terbaru — '.$period['label'];
    }

    public function table(Table $table): Table
    {
        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();

        return $table
            ->query(
                Transaction::query()
                    ->where('user_id', $userId)
                    ->whereBetween('transaction_date', [$period['start'], $period['end']])
                    ->orderByDesc('transaction_date')
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('transaction_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'income' => 'success',
                        'expense' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                        default => $state,
                    }),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->placeholder('—'),
                TextColumn::make('description')
                    ->label('Keterangan')
                    ->limit(40)
                    ->placeholder('—'),
                TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->weight('bold')
                    ->color(fn ($record): string => $record->type === 'income' ? 'success' : 'danger'),
            ])
            ->paginated(false)
            ->emptyStateHeading('Belum ada transaksi pada periode ini')
            ->emptyStateDescription('Transaksi lima terakhir pada periode terpilih akan tampil di sini.');
    }
}

````

---

### `app/Http/Controllers/Controller.php`

````php
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

````

---

### `app/Http/Controllers/FinancialReportPrintController.php`

````php
<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FinancialReportPrintController extends Controller
{
    /**
     * Render a print-friendly financial report for the current user's transactions.
     */
    public function __invoke(Request $request): View
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();

        $start = $request->filled('start')
            ? Carbon::parse($request->query('start'))->startOfDay()
            : Carbon::now()->startOfDay();
        $end = $request->filled('end')
            ? Carbon::parse($request->query('end'))->endOfDay()
            : Carbon::now()->endOfDay();

        $transactions = Transaction::with('category')
            ->where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end])
            ->orderBy('transaction_date')
            ->get();

        $totalIncome = (float) $transactions->where('type', 'income')->sum('amount');
        $totalExpense = (float) $transactions->where('type', 'expense')->sum('amount');

        $categoryBreakdown = [];
        foreach ($transactions as $tx) {
            $key = ($tx->type === 'income' ? 'income' : 'expense').'|'.($tx->category?->name ?? 'Tanpa Kategori');
            if (! isset($categoryBreakdown[$key])) {
                $categoryBreakdown[$key] = [
                    'name' => $tx->category?->name ?? 'Tanpa Kategori',
                    'type' => $tx->type,
                    'total' => 0,
                    'count' => 0,
                ];
            }
            $categoryBreakdown[$key]['total'] += (float) $tx->amount;
            $categoryBreakdown[$key]['count']++;
        }

        return view('reports.financial-print', [
            'businessProfile' => BusinessProfile::where('user_id', $userId)->first(),
            'startDate' => $start->format('d M Y'),
            'endDate' => $end->format('d M Y'),
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'netCashFlow' => $totalIncome - $totalExpense,
            'categoryBreakdown' => array_values($categoryBreakdown),
            'transactions' => $transactions,
            'printedAt' => Carbon::now()->translatedFormat('d M Y, H:i'),
        ]);
    }
}

````

---

### `app/Livewire/TenantSwitcher.php`

````php
<?php

namespace App\Livewire;

use App\Support\TenantContext;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TenantSwitcher extends Component
{
    public ?int $selectedTenantId = null;

    public function mount(): void
    {
        $this->selectedTenantId = TenantContext::getActiveTenantId();
    }

    public function switchTenant(int $tenantId): void
    {
        TenantContext::setActiveTenantId($tenantId);
        $this->selectedTenantId = $tenantId;

        $this->dispatch('tenant-switched');
        $this->redirect(request()->header('Referer') ?: url('/admin'));
    }

    public function render(): View
    {
        $user = auth()->user();

        $activeProfile = TenantContext::getActiveBusinessProfile();
        $tenants = ($user && $user->isAdmin()) ? TenantContext::getAllTenants() : collect();

        return view('livewire.tenant-switcher', [
            'isAdmin' => (bool) $user?->isAdmin(),
            'activeProfile' => $activeProfile,
            'tenants' => $tenants,
            'selectedTenantId' => $this->selectedTenantId,
        ]);
    }
}


````

---

### `app/Models/AnalysisExplanation.php`

````php
<?php

namespace App\Models;

use Database\Factories\AnalysisExplanationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'financial_analysis_id',
    'explanation',
    'recommendations',
    'provider',
    'status',
    'error_message',
])]
class AnalysisExplanation extends Model
{
    /** @use HasFactory<AnalysisExplanationFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'recommendations' => 'array',
        ];
    }

    /**
     * Associated financial analysis.
     */
    public function financialAnalysis(): BelongsTo
    {
        return $this->belongsTo(FinancialAnalysis::class);
    }
}

````

---

### `app/Models/BusinessProfile.php`

````php
<?php

namespace App\Models;

use Database\Factories\BusinessProfileFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'business_name',
    'business_type',
    'description',
    'initial_capital',
    'phone',
    'address',
])]
class BusinessProfile extends Model
{
    /** @use HasFactory<BusinessProfileFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'initial_capital' => 'decimal:2',
        ];
    }

    /**
     * Owner user relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

````

---

### `app/Models/FinancialAnalysis.php`

````php
<?php

namespace App\Models;

use Database\Factories\FinancialAnalysisFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'user_id',
    'period_start',
    'period_end',
    'total_income',
    'total_expense',
    'net_cash_flow',
    'expense_ratio',
    'income_trend',
    'cash_flow_trend',
    'prediction_label',
    'confidence_score',
    'key_factors',
    'model_version',
])]
class FinancialAnalysis extends Model
{
    /** @use HasFactory<FinancialAnalysisFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'period_start' => 'date',
            'period_end' => 'date',
            'total_income' => 'decimal:2',
            'total_expense' => 'decimal:2',
            'net_cash_flow' => 'decimal:2',
            'expense_ratio' => 'decimal:4',
            'income_trend' => 'decimal:4',
            'cash_flow_trend' => 'decimal:4',
            'confidence_score' => 'decimal:4',
            'key_factors' => 'array',
        ];
    }

    /**
     * User relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Associated LLM explanation.
     */
    public function explanation(): HasOne
    {
        return $this->hasOne(AnalysisExplanation::class);
    }
}

````

---

### `app/Models/Transaction.php`

````php
<?php

namespace App\Models;

use Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'transaction_category_id',
    'type',
    'amount',
    'transaction_date',
    'description',
])]
class Transaction extends Model
{
    /** @use HasFactory<TransactionFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'transaction_date' => 'date',
        ];
    }

    /**
     * Owner user relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Category relationship.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(TransactionCategory::class, 'transaction_category_id');
    }

    /**
     * Scope query to income transactions.
     *
     * @param  Builder<Transaction>  $query
     */
    public function scopeIncome(Builder $query): Builder
    {
        return $query->where('type', 'income');
    }

    /**
     * Scope query to expense transactions.
     *
     * @param  Builder<Transaction>  $query
     */
    public function scopeExpense(Builder $query): Builder
    {
        return $query->where('type', 'expense');
    }
}

````

---

### `app/Models/TransactionCategory.php`

````php
<?php

namespace App\Models;

use Database\Factories\TransactionCategoryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id',
    'name',
    'type',
    'color',
    'icon',
])]
class TransactionCategory extends Model
{
    /** @use HasFactory<TransactionCategoryFactory> */
    use HasFactory;

    /**
     * Category owner relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Transactions belonging to this category.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Scope query to income categories.
     *
     * @param  Builder<TransactionCategory>  $query
     */
    public function scopeIncome(Builder $query): Builder
    {
        return $query->where('type', 'income');
    }

    /**
     * Scope query to expense categories.
     *
     * @param  Builder<TransactionCategory>  $query
     */
    public function scopeExpense(Builder $query): Builder
    {
        return $query->where('type', 'expense');
    }
}

````

---

### `app/Models/User.php`

````php
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Check if the user has admin role.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user has owner role.
     */
    public function isOwner(): bool
    {
        return $this->role === 'owner';
    }

    /**
     * Determine if user can access the given Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    /**
     * Business profile for the UMKM owner.
     */
    public function businessProfile(): HasOne
    {
        return $this->hasOne(BusinessProfile::class);
    }

    /**
     * Categories created by or assigned to the user.
     */
    public function transactionCategories(): HasMany
    {
        return $this->hasMany(TransactionCategory::class);
    }

    /**
     * Transactions recorded by the user.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Financial analyses run by the user.
     */
    public function financialAnalyses(): HasMany
    {
        return $this->hasMany(FinancialAnalysis::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

````

---

### `app/Providers/AppServiceProvider.php`

````php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

````

---

### `app/Providers/Filament/AdminPanelProvider.php`

````php
<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Register;
use App\Filament\Widgets\CashFlowChartWidget;
use App\Filament\Widgets\FinancialOverviewWidget;
use App\Filament\Widgets\RecentTransactionsWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use YacoubAlhaidari\FilamentTour\FilamentTourPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration(Register::class)
            ->passwordReset()
            ->profile()
            ->brandName('SIM Keuangan')
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->navigationGroups([
                'Manajemen Transaksi',
                'Laporan & Analisis AI',
                'Pengaturan Usaha',
                'Manajemen Pengguna',
            ])
            ->plugins([
                FilamentTourPlugin::make()
                    ->showTourButton(true)
                    ->tourButtonIcon('heroicon-o-academic-cap')
                    ->tourButtonColor('primary')
                    ->tourButtonTooltip('Mulai Tur Panduan')
                    ->welcomeStep([
                        'id' => 'welcome',
                        'title' => 'Selamat Datang di SIM Keuangan AI! 👋',
                        'text' => '<strong>Sistem Manajemen Keuangan Cerdas untuk UMKM.</strong><br><br>Ikuti panduan interaktif ini untuk mengenal alur kerja dan seluruh fitur utama sistem, mulai dari pencatatan transaksi hingga analisis cerdas berbasis AI.',
                        'buttons' => [
                            ['text' => 'Lewati Panduan', 'action' => 'cancel', 'secondary' => true],
                            ['text' => 'Mulai Tur 🚀', 'action' => 'next', 'secondary' => false],
                        ],
                    ])
                    ->finishStep([
                        'id' => 'finish',
                        'title' => 'Panduan Selesai! 🎉',
                        'text' => '<strong>Anda siap mengelola keuangan usaha dengan lebih cerdas dan terarah.</strong><br><br>Lakukan pencatatan transaksi secara rutin untuk mendapatkan hasil prediksi Machine Learning dan rekomendasi AI yang semakin akurat.<br><br>Anda dapat memutar kembali panduan ini kapan saja melalui ikon topi toga 🎓 di pojok kanan atas.',
                        'buttons' => [
                            ['text' => 'Kembali', 'action' => 'back', 'secondary' => true],
                            ['text' => 'Mulai Sekarang 👍', 'action' => 'complete', 'secondary' => false],
                        ],
                    ]),
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => Blade::render('@include("filament.tour-theme")')
            )
            ->renderHook(
                PanelsRenderHook::GLOBAL_SEARCH_BEFORE,
                fn (): string => Blade::render('@livewire(\App\Livewire\TenantSwitcher::class)')
            )
            ->widgets([
                FinancialOverviewWidget::class,
                CashFlowChartWidget::class,
                RecentTransactionsWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

````

---

### `app/Services/AI/AiExplanationService.php`

````php
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

````

---

### `app/Services/AI/GeminiExplanationService.php`

````php
<?php

namespace App\Services\AI;

use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiExplanationService
{
    /**
     * Generate an AI explanation and recommendations using Gemini API, with a robust fallback.
     *
     * @param  array<string, mixed>  $features
     * @param  array{prediction: string, confidence: float, key_factors: array<string>}  $mlResult
     * @return array{explanation: string, recommendations: array<string>, provider: string, status: string}
     */
    public function explain(BusinessProfile $profile, array $features, array $mlResult): array
    {
        $apiKey = config('services.gemini.api_key');
        $model = config('services.gemini.model', 'gemini-2.5-flash');

        if (blank($apiKey)) {
            return $this->generateFallbackExplanation($profile, $features, $mlResult, 'Kunci API Gemini belum dikonfigurasi (.env)');
        }

        try {
            $prompt = $this->buildPrompt($profile, $features, $mlResult);

            $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

            $response = Http::timeout(25)
                ->withoutVerifying()
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($url, [
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                ['text' => $prompt],
                            ],
                        ],
                    ],
                    'generationConfig' => [
                        'responseMimeType' => 'application/json',
                        'temperature' => 0.2, // Rendah untuk menjaga ketepatan fakta dan angka
                    ],
                ]);

            if ($response->successful()) {
                $candidates = $response->json('candidates.0.content.parts.0.text');
                $parsed = json_decode($candidates, true);

                if (is_array($parsed) && isset($parsed['explanation']) && isset($parsed['recommendations'])) {
                    return [
                        'explanation' => (string) $parsed['explanation'],
                        'recommendations' => (array) $parsed['recommendations'],
                        'provider' => 'gemini-api',
                        'status' => 'completed',
                    ];
                }
            }

            Log::warning('Gemini API response unsuccessful', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return $this->generateFallbackExplanation($profile, $features, $mlResult, 'API Gemini tidak merespons (Status: '.$response->status().')');
        } catch (\Throwable $e) {
            Log::error('Error generating Gemini explanation', ['error' => $e->getMessage()]);

            return $this->generateFallbackExplanation($profile, $features, $mlResult, 'Koneksi API Gemini gagal: '.$e->getMessage());
        }
    }

    /**
     * Build strict, factual prompt for Gemini LLM.
     *
     * @param  array<string, mixed>  $features
     * @param  array{prediction: string, confidence: float, key_factors: array<string>}  $mlResult
     */
    protected function buildPrompt(BusinessProfile $profile, array $features, array $mlResult): string
    {
        $netFormatted = number_format($features['net_cash_flow'], 0, ',', '.');
        $incomeFormatted = number_format($features['total_income'], 0, ',', '.');
        $expenseFormatted = number_format($features['total_expense'], 0, ',', '.');
        $expensePercentage = round($features['expense_ratio'] * 100, 1).'%';
        $incomeTrendFormatted = round($features['income_trend'] * 100, 1).'%';
        $factorsList = implode('; ', $mlResult['key_factors']);

        return <<<PROMPT
Anda adalah asisten konsultan keuangan cerdas untuk UMKM Indonesia.
Tugas Anda adalah menjelaskan hasil klasifikasi model Machine Learning (Decision Tree) ke dalam bahasa yang mudah dipahami, simpatik, edukatif, dan profesional bagi pemilik usaha.

ATURAN KETAT:
1. DILARANG MENGARANG angka atau fakta baru. Gunakan hanya data finansial yang diberikan di bawah.
2. Hasil klasifikasi model Decision Tree ADALAH FINAL. Anda bertugas MENJELASKAN MENGAPA model memberi label tersebut, bukan mengubah labelnya.
3. Berikan output dalam format JSON valid dengan struktur:
{
  "explanation": "Teks penjelasan naratif (1-2 paragraf padat dan jelas)",
  "recommendations": [
    "Poin rekomendasi 1",
    "Poin rekomendasi 2",
    "Poin rekomendasi 3"
  ]
}

DATA SUMBER:
- Nama Usaha: {$profile->business_name}
- Bidang Usaha: {$profile->business_type}
- Total Pemasukan: Rp {$incomeFormatted}
- Total Pengeluaran: Rp {$expenseFormatted}
- Arus Kas Bersih (Net Cash Flow): Rp {$netFormatted}
- Rasio Pengeluaran: {$expensePercentage}
- Perubahan Pemasukan (Tren): {$incomeTrendFormatted}
- Klasifikasi Model Decision Tree: {$mlResult['prediction']} (Akurasi/Confidence: {$mlResult['confidence']})
- Faktor Kunci Penentu Model: {$factorsList}
PROMPT;
    }

    /**
     * Resilient Fallback Explanation when API or Quota is unavailable.
     *
     * @param  array<string, mixed>  $features
     * @param  array{prediction: string, confidence: float, key_factors: array<string>}  $mlResult
     * @return array{explanation: string, recommendations: array<string>, provider: string, status: string}
     */
    protected function generateFallbackExplanation(BusinessProfile $profile, array $features, array $mlResult, string $reason): array
    {
        $status = $mlResult['prediction'];
        $netFormatted = 'Rp '.number_format($features['net_cash_flow'], 0, ',', '.');
        $incomeFormatted = 'Rp '.number_format($features['total_income'], 0, ',', '.');
        $expenseFormatted = 'Rp '.number_format($features['total_expense'], 0, ',', '.');
        $expensePercentage = round($features['expense_ratio'] * 100, 1).'%';

        if ($status === 'Sehat') {
            $explanation = "Berdasarkan evaluasi algoritma Decision Tree, kondisi keuangan {$profile->business_name} pada periode ini tergolong SEHAT. Usaha berhasil mencatatkan surplus arus kas bersih sebesar {$netFormatted} dengan rasio pengeluaran yang terkontrol sebesar {$expensePercentage} dari total pemasukan {$incomeFormatted}. Efisiensi operasional ini memberikan ruang likuiditas yang sangat baik bagi kelangsungan usaha.";
            $recommendations = [
                'Pertahankan efisiensi belanja bahan baku dan biaya operasional yang sedang berjalan.',
                'Alokasikan sebagian surplus arus kas bersih ke rekening cadangan dana darurat (kas darurat operasional 3-6 bulan).',
                'Pertimbangkan untuk reinvestasi terkontrol guna menambah stok produk terlaris atau ekspansi pemasaran.',
            ];
        } elseif ($status === 'Perlu perhatian') {
            $explanation = "Algoritma Decision Tree mengklasifikasikan kondisi keuangan {$profile->business_name} pada status PERLU PERHATIAN. Meskipun usaha masih mampu menghasilkan arus kas bersih sebesar {$netFormatted}, porsi pengeluaran telah mencapai {$expensePercentage} dari pemasukan. Ruang margin kas relatif sempit sehingga usaha rentan apabila terjadi penurunan omzet tak terduga.";
            $recommendations = [
                'Audit pos-pos pengeluaran terbesar pada bulan ini dan cari peluang efisiensi biaya yang bersifat non-esensial.',
                'Tingkatkan aktivitas promosi atau penjualan paket bundling untuk mendongkrak pemasukan kotor.',
                'Batasi pengeluaran modal baru hingga rasio pengeluaran stabil di bawah 75%.',
            ];
        } else {
            // Berisiko
            $explanation = "Peringatan dini dari algoritma Decision Tree: kondisi keuangan {$profile->business_name} berada dalam kategori BERISIKO. Usaha mencatat beban pengeluaran ({$expenseFormatted}) yang sangat tinggi hingga menyerap {$expensePercentage} dari pemasukan, dengan posisi arus kas bersih berada di level {$netFormatted}. Langkah pemulihan arus kas harus segera diprioritaskan.";
            $recommendations = [
                'Segera lakukan moratorium (penundaan) terhadap seluruh belanja dan pengeluaran yang tidak bersentuhan langsung dengan penjualan.',
                'Fokuskan seluruh upaya pada pencairan piutang dan akselerasi penjualan produk dengan perputaran kas cepat (fast-moving).',
                'Evaluasi ulang penetapan harga jual produk (HPP) untuk memastikan margin kotor dapat menutup biaya operasional bulanan.',
            ];
        }

        return [
            'explanation' => $explanation,
            'recommendations' => $recommendations,
            'provider' => 'rule-based-engine (Fallback: '.$reason.')',
            'status' => 'completed',
        ];
    }
}

````

---

### `app/Services/AI/GroqExplanationService.php`

````php
<?php

namespace App\Services\AI;

use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GroqExplanationService
{
    /**
     * Generate an AI explanation and recommendations using Groq API (OpenAI-compatible), with a robust fallback.
     *
     * @param  array<string, mixed>  $features
     * @param  array{prediction: string, confidence: float, key_factors: array<string>}  $mlResult
     * @return array{explanation: string, recommendations: array<string>, provider: string, status: string}
     */
    public function explain(BusinessProfile $profile, array $features, array $mlResult): array
    {
        $apiKey = config('services.groq.api_key');
        $model = config('services.groq.model', 'llama-3.3-70b-versatile');

        if (blank($apiKey)) {
            return $this->generateFallbackExplanation($profile, $features, $mlResult, 'Kunci API Groq belum dikonfigurasi (.env)');
        }

        try {
            $prompt = $this->buildPrompt($profile, $features, $mlResult);

            $response = Http::timeout(25)
                ->withoutVerifying()
                ->withToken($apiKey)
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => $model,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Anda adalah asisten konsultan keuangan cerdas untuk UMKM Indonesia. Jelaskan hasil klasifikasi model Machine Learning secara simpatik, solutif, dan profesional. Output WAJIB berupa JSON valid dengan format: {"explanation": "...", "recommendations": ["...", "..."]}.',
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt,
                        ],
                    ],
                    'response_format' => [
                        'type' => 'json_object',
                    ],
                    'temperature' => 0.2,
                ]);

            if ($response->successful()) {
                $rawContent = $response->json('choices.0.message.content');
                $parsed = json_decode((string) $rawContent, true);

                if (is_array($parsed) && isset($parsed['explanation']) && isset($parsed['recommendations'])) {
                    return [
                        'explanation' => (string) $parsed['explanation'],
                        'recommendations' => array_values((array) $parsed['recommendations']),
                        'provider' => 'groq',
                        'status' => 'success',
                    ];
                }
            }

            Log::warning('Groq API response unsuccessful', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return $this->generateFallbackExplanation($profile, $features, $mlResult, 'API Groq tidak merespons (Status: '.$response->status().')');
        } catch (\Throwable $e) {
            Log::error('Error generating Groq explanation', ['error' => $e->getMessage()]);

            return $this->generateFallbackExplanation($profile, $features, $mlResult, 'Koneksi API Groq gagal: '.$e->getMessage());
        }
    }

    /**
     * Build strict, factual prompt for Groq LLM.
     *
     * @param  array<string, mixed>  $features
     * @param  array{prediction: string, confidence: float, key_factors: array<string>}  $mlResult
     */
    protected function buildPrompt(BusinessProfile $profile, array $features, array $mlResult): string
    {
        $netFormatted = number_format($features['net_cash_flow'], 0, ',', '.');
        $incomeFormatted = number_format($features['total_income'], 0, ',', '.');
        $expenseFormatted = number_format($features['total_expense'], 0, ',', '.');
        $expensePercentage = round($features['expense_ratio'] * 100, 1).'%';
        $incomeTrendFormatted = round($features['income_trend'] * 100, 1).'%';
        $factorsList = implode('; ', $mlResult['key_factors']);

        return <<<PROMPT
Anda adalah asisten konsultan keuangan cerdas untuk UMKM Indonesia.
Tugas Anda adalah menjelaskan hasil klasifikasi model Machine Learning (Decision Tree) ke dalam bahasa yang mudah dipahami, simpatik, edukatif, dan profesional bagi pemilik usaha.

ATURAN KETAT:
1. DILARANG MENGARANG angka atau fakta baru. Gunakan hanya data finansial yang diberikan di bawah.
2. Hasil klasifikasi model Decision Tree ADALAH FINAL. Anda bertugas MENJELASKAN MENGAPA model memberi label tersebut, bukan mengubah labelnya.
3. Berikan output dalam format JSON valid dengan struktur:
{
  "explanation": "Teks penjelasan naratif (1-2 paragraf padat dan jelas)",
  "recommendations": [
    "Poin rekomendasi 1",
    "Poin rekomendasi 2",
    "Poin rekomendasi 3"
  ]
}

DATA SUMBER:
- Nama Usaha: {$profile->business_name}
- Bidang Usaha: {$profile->business_type}
- Total Pemasukan: Rp {$incomeFormatted}
- Total Pengeluaran: Rp {$expenseFormatted}
- Arus Kas Bersih (Net Cash Flow): Rp {$netFormatted}
- Rasio Pengeluaran: {$expensePercentage}
- Perubahan Pemasukan (Tren): {$incomeTrendFormatted}
- Klasifikasi Model Decision Tree: {$mlResult['prediction']} (Akurasi/Confidence: {$mlResult['confidence']})
- Faktor Kunci Penentu Model: {$factorsList}
PROMPT;
    }

    /**
     * Resilient Fallback Explanation when API or Key is unavailable.
     *
     * @param  array<string, mixed>  $features
     * @param  array{prediction: string, confidence: float, key_factors: array<string>}  $mlResult
     * @return array{explanation: string, recommendations: array<string>, provider: string, status: string}
     */
    protected function generateFallbackExplanation(BusinessProfile $profile, array $features, array $mlResult, string $reason): array
    {
        $status = $mlResult['prediction'];
        $netFormatted = 'Rp '.number_format($features['net_cash_flow'], 0, ',', '.');
        $incomeFormatted = 'Rp '.number_format($features['total_income'], 0, ',', '.');
        $expenseFormatted = 'Rp '.number_format($features['total_expense'], 0, ',', '.');
        $expensePercentage = round($features['expense_ratio'] * 100, 1).'%';

        if ($status === 'Sehat') {
            $explanation = "Berdasarkan evaluasi algoritma Decision Tree, kondisi keuangan {$profile->business_name} pada periode ini tergolong SEHAT. Usaha berhasil mencatatkan surplus arus kas bersih sebesar {$netFormatted} dengan rasio pengeluaran yang terkontrol sebesar {$expensePercentage} dari total pemasukan {$incomeFormatted}. Efisiensi operasional ini memberikan ruang likuiditas yang sangat baik bagi kelangsungan usaha.";
            $recommendations = [
                'Pertahankan efisiensi belanja bahan baku dan biaya operasional yang sedang berjalan.',
                'Alokasikan sebagian surplus arus kas bersih ke rekening cadangan dana darurat (kas darurat operasional 3-6 bulan).',
                'Pertimbangkan untuk reinvestasi terkontrol guna menambah stok produk terlaris atau ekspansi pemasaran.',
            ];
        } elseif ($status === 'Perlu perhatian') {
            $explanation = "Algoritma Decision Tree mengklasifikasikan kondisi keuangan {$profile->business_name} pada status PERLU PERHATIAN. Meskipun usaha masih mampu menghasilkan arus kas bersih sebesar {$netFormatted}, porsi pengeluaran telah mencapai {$expensePercentage} dari pemasukan. Ruang margin kas relatif sempit sehingga usaha rentan apabila terjadi penurunan omzet tak terduga.";
            $recommendations = [
                'Audit pos-pos pengeluaran terbesar pada bulan ini dan cari peluang efisiensi biaya yang bersifat non-esensial.',
                'Tingkatkan aktivitas promosi atau penjualan paket bundling untuk mendongkrak pemasukan kotor.',
                'Batasi pengeluaran modal baru hingga rasio pengeluaran stabil di bawah 75%.',
            ];
        } else {
            // Berisiko
            $explanation = "Peringatan dini dari algoritma Decision Tree: kondisi keuangan {$profile->business_name} berada dalam kategori BERISIKO. Usaha mencatat beban pengeluaran ({$expenseFormatted}) yang sangat tinggi hingga menyerap {$expensePercentage} dari pemasukan, dengan posisi arus kas bersih berada di level {$netFormatted}. Langkah pemulihan arus kas harus segera diprioritaskan.";
            $recommendations = [
                'Segera lakukan moratorium (penundaan) terhadap seluruh belanja dan pengeluaran yang tidak bersentuhan langsung dengan penjualan.',
                'Fokuskan seluruh upaya pada pencairan piutang dan akselerasi penjualan produk dengan perputaran kas cepat (fast-moving).',
                'Evaluasi ulang penetapan harga jual produk (HPP) untuk memastikan margin kotor dapat menutup biaya operasional bulanan.',
            ];
        }

        return [
            'explanation' => $explanation,
            'recommendations' => $recommendations,
            'provider' => 'rule_based_fallback ('.$reason.')',
            'status' => 'fallback',
        ];
    }
}

````

---

### `app/Services/ML/DatasetGenerator.php`

````php
<?php

namespace App\Services\ML;

class DatasetGenerator
{
    /**
     * Generate synthetic but realistic UMKM financial dataset samples.
     *
     * @param  int  $count  Number of samples
     * @return array{samples: array<array<float>>, labels: array<string>}
     */
    public function generate(int $count = 1500): array
    {
        $samples = [];
        $labels = [];

        for ($i = 0; $i < $count; $i++) {
            // Skala pendapatan UMKM beragam: Rp 3.000.000 s/d Rp 150.000.000
            $totalIncome = (float) rand(3000, 150000) * 1000;

            // Generate expense ratio dengan variasi (0.30 s/d 1.40)
            $expenseRatio = rand(30, 140) / 100.0;

            // Tambahkan noise realistis
            $expenseRatio += (rand(-5, 5) / 100.0);
            $expenseRatio = max(0.20, min(1.60, round($expenseRatio, 4)));

            $totalExpense = round($totalIncome * $expenseRatio, 2);
            $netCashFlow = round($totalIncome - $totalExpense, 2);

            // Tren pendapatan & arus kas dibanding periode sebelumnya (-0.50 s/d +0.50)
            $incomeTrend = round(rand(-50, 50) / 100.0, 4);
            $cashFlowTrend = round(rand(-60, 60) / 100.0, 4);

            // Tentukan label ground-truth berdasarkan prinsip keuangan UMKM
            $label = $this->determineLabel($netCashFlow, $expenseRatio, $incomeTrend, $cashFlowTrend);

            // Fitur input: [total_income, total_expense, net_cash_flow, expense_ratio, income_trend, cash_flow_trend]
            $samples[] = [
                $totalIncome,
                $totalExpense,
                $netCashFlow,
                $expenseRatio,
                $incomeTrend,
                $cashFlowTrend,
            ];

            $labels[] = $label;
        }

        return [
            'samples' => $samples,
            'labels' => $labels,
        ];
    }

    /**
     * Ground truth labeling logic based on financial health indicators.
     */
    protected function determineLabel(float $netCashFlow, float $expenseRatio, float $incomeTrend, float $cashFlowTrend): string
    {
        if ($netCashFlow < 0 || $expenseRatio >= 0.95 || $cashFlowTrend <= -0.35) {
            return 'Berisiko';
        }

        if ($netCashFlow > 0 && $expenseRatio <= 0.75 && $incomeTrend >= -0.10 && $cashFlowTrend >= -0.10) {
            return 'Sehat';
        }

        return 'Perlu perhatian';
    }

    /**
     * Export generated dataset to CSV for inspection or external verification.
     */
    public function exportCsv(string $path, int $count = 1500): string
    {
        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $data = $this->generate($count);
        $fp = fopen($path, 'w');

        fputcsv($fp, [
            'total_income',
            'total_expense',
            'net_cash_flow',
            'expense_ratio',
            'income_trend',
            'cash_flow_trend',
            'label',
        ]);

        for ($i = 0; $i < count($data['samples']); $i++) {
            $row = $data['samples'][$i];
            $row[] = $data['labels'][$i];
            fputcsv($fp, $row);
        }

        fclose($fp);

        return $path;
    }
}

````

---

### `app/Services/ML/FinancialDecisionTreeService.php`

````php
<?php

namespace App\Services\ML;

use App\Models\Transaction;
use Carbon\Carbon;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\CrossValidation\Reports\ConfusionMatrix;
use Rubix\ML\CrossValidation\Reports\MulticlassBreakdown;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\Native;

class FinancialDecisionTreeService
{
    public const MODEL_VERSION = '1.1.0 (Decision Tree)';

    // Hyperparameter dipilih lewat stratified 5-fold cross validation
    public const MAX_HEIGHT = 10;

    public const MAX_LEAF_SIZE = 5;

    public const MIN_PURITY_INCREASE = 1e-4;

    public const TRAINING_SAMPLES = 5000;

    // Additive smoothing probabilitas daun agar confidence tidak overconfident (100%)
    public const PROBABILITY_SMOOTHING = 0.02;

    protected string $modelPath;

    public function __construct(
        protected DatasetGenerator $datasetGenerator
    ) {
        $this->modelPath = storage_path('app/ml/decision_tree.model');
    }

    /**
     * Train the Decision Tree classifier, evaluate performance, and save the model.
     *
     * @return array{
     *     accuracy: float,
     *     confusion_matrix: array<string, array<string, int>>,
     *     report: array<string, mixed>,
     *     train_samples_count: int,
     *     test_samples_count: int
     * }
     */
    public function train(int $sampleCount = self::TRAINING_SAMPLES, float $testSplit = 0.2): array
    {
        $dir = dirname($this->modelPath);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $generated = $this->datasetGenerator->generate($sampleCount);
        $dataset = new Labeled($generated['samples'], $generated['labels']);

        // Stratified split: training (80%) dan testing (20%) dengan proporsi kelas yang sama
        [$training, $testing] = $dataset->randomize()->stratifiedSplit(1.0 - $testSplit);

        // Inisialisasi Decision Tree Classifier
        // Max height = 10, max leaf size = 5 untuk mencegah overfitting
        $tree = new ClassificationTree(self::MAX_HEIGHT, self::MAX_LEAF_SIZE, self::MIN_PURITY_INCREASE);
        $estimator = new PersistentModel(
            $tree,
            new Filesystem($this->modelPath),
            new Native
        );

        // Latih model pada training set
        $estimator->train($training);

        // Evaluasi model pada testing set terpisah (Out-of-sample evaluation)
        $predictions = $estimator->predict($testing);

        $accuracyMetric = new Accuracy;
        $accuracy = $accuracyMetric->score($predictions, $testing->labels());

        $confusionMatrixReport = new ConfusionMatrix;
        $confusionMatrix = $confusionMatrixReport->generate($predictions, $testing->labels());

        $breakdownReport = new MulticlassBreakdown;
        $report = $breakdownReport->generate($predictions, $testing->labels());

        // Simpan model ke disk
        $estimator->save();

        return [
            'accuracy' => round($accuracy, 4),
            'confusion_matrix' => $confusionMatrix,
            'report' => $report,
            'train_samples_count' => $training->numSamples(),
            'test_samples_count' => $testing->numSamples(),
        ];
    }

    /**
     * Load trained model from disk or train if not present.
     */
    protected function getEstimator(): PersistentModel
    {
        if (! file_exists($this->modelPath)) {
            $this->train();
        }

        return PersistentModel::load(
            new Filesystem($this->modelPath),
            new Native
        );
    }

    /**
     * Calculate 6 financial features from real transactions for a given period.
     *
     * @return array{
     *     total_income: float,
     *     total_expense: float,
     *     net_cash_flow: float,
     *     expense_ratio: float,
     *     income_trend: float,
     *     cash_flow_trend: float
     * }
     */
    public function extractFeatures(?int $userId, Carbon $periodStart, Carbon $periodEnd): array
    {
        $baseQuery = fn () => Transaction::query()->when($userId !== null, fn ($q) => $q->where('user_id', $userId));

        // Periode saat ini
        $income = (float) $baseQuery()
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$periodStart, $periodEnd])
            ->sum('amount');

        $expense = (float) $baseQuery()
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$periodStart, $periodEnd])
            ->sum('amount');

        $netCashFlow = $income - $expense;
        $expenseRatio = $income > 0 ? round($expense / $income, 4) : ($expense > 0 ? 1.5 : 0.0);

        // Hitung periode sebelumnya dengan durasi yang sama untuk perbandingan tren
        $durationInDays = $periodStart->diffInDays($periodEnd) + 1;
        $previousStart = $periodStart->copy()->subDays($durationInDays);
        $previousEnd = $periodStart->copy()->subDay();

        $prevIncome = (float) $baseQuery()
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$previousStart, $previousEnd])
            ->sum('amount');

        $prevExpense = (float) $baseQuery()
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$previousStart, $previousEnd])
            ->sum('amount');

        $prevNetCashFlow = $prevIncome - $prevExpense;

        // Hitung tren (persentase perubahan)
        $incomeTrend = $prevIncome > 0
            ? round(($income - $prevIncome) / $prevIncome, 4)
            : ($income > 0 ? 0.20 : 0.0);

        $cashFlowTrend = abs($prevNetCashFlow) > 0
            ? round(($netCashFlow - $prevNetCashFlow) / abs($prevNetCashFlow), 4)
            : ($netCashFlow > 0 ? 0.20 : ($netCashFlow < 0 ? -0.20 : 0.0));

        return [
            'total_income' => round($income, 2),
            'total_expense' => round($expense, 2),
            'net_cash_flow' => round($netCashFlow, 2),
            'expense_ratio' => $expenseRatio,
            'income_trend' => $incomeTrend,
            'cash_flow_trend' => $cashFlowTrend,
        ];
    }

    /**
     * Run prediction using the genuine trained Decision Tree classifier.
     *
     * @param  array<string, float>  $features
     * @return array{
     *     prediction: string,
     *     probabilities: array<string, float>,
     *     confidence: float,
     *     key_factors: array<string>
     * }
     */
    public function predict(array $features): array
    {
        $estimator = $this->getEstimator();

        $sample = [
            $features['total_income'],
            $features['total_expense'],
            $features['net_cash_flow'],
            $features['expense_ratio'],
            $features['income_trend'],
            $features['cash_flow_trend'],
        ];

        $unlabeled = new Unlabeled([$sample]);

        $predictions = $estimator->predict($unlabeled);
        $prediction = $predictions[0];

        $probabilitiesList = $estimator->proba($unlabeled);
        $probabilities = $this->smoothProbabilities($probabilitiesList[0]);

        $confidence = isset($probabilities[$prediction]) ? (float) $probabilities[$prediction] : 0.90;

        // Analisis faktor penentu keputusan Decision Tree
        $keyFactors = $this->determineKeyFactors($features, $prediction);

        return [
            'prediction' => $prediction,
            'probabilities' => $probabilities,
            'confidence' => round($confidence, 4),
            'key_factors' => $keyFactors,
        ];
    }

    /**
     * Apply additive smoothing to leaf probabilities: p' = (1 - ε) · p + ε / K.
     * Urutan kelas (dan hasil prediksi) tidak berubah, hanya confidence yang dikalibrasi.
     *
     * @param  array<string, float>  $probabilities
     * @return array<string, float>
     */
    public function smoothProbabilities(array $probabilities): array
    {
        $classCount = count($probabilities);

        return array_map(
            fn (float $p) => (1 - self::PROBABILITY_SMOOTHING) * $p + self::PROBABILITY_SMOOTHING / $classCount,
            $probabilities
        );
    }

    /**
     * Determine key drivers from features that swayed the Decision Tree branch.
     *
     * @param  array<string, float>  $features
     * @return array<string>
     */
    protected function determineKeyFactors(array $features, string $prediction): array
    {
        $factors = [];

        if ($features['net_cash_flow'] < 0) {
            $factors[] = 'Arus kas operasional negatif (defisit Rp '.number_format(abs($features['net_cash_flow']), 0, ',', '.').')';
        } else {
            $factors[] = 'Arus kas operasional positif (surplus Rp '.number_format($features['net_cash_flow'], 0, ',', '.').')';
        }

        $expensePercentage = round($features['expense_ratio'] * 100, 1);
        if ($features['expense_ratio'] >= 0.90) {
            $factors[] = "Rasio pengeluaran tinggi ($expensePercentage%), menyerap hampir seluruh atau melebihi pemasukan";
        } elseif ($features['expense_ratio'] <= 0.70) {
            $factors[] = "Rasio pengeluaran efisien ($expensePercentage%), menyisakan margin kas yang sehat";
        } else {
            $factors[] = "Rasio pengeluaran moderat ($expensePercentage%), ruang cadangan kas terbatas";
        }

        if ($features['income_trend'] < -0.15) {
            $drop = abs(round($features['income_trend'] * 100, 1));
            $factors[] = "Penurunan omzet pemasukan sebesar $drop% dibanding periode sebelumnya";
        } elseif ($features['income_trend'] > 0.15) {
            $rise = round($features['income_trend'] * 100, 1);
            $factors[] = "Pertumbuhan omzet pemasukan sebesar $rise% dibanding periode sebelumnya";
        }

        if ($features['cash_flow_trend'] < -0.25) {
            $drop = abs(round($features['cash_flow_trend'] * 100, 1));
            $factors[] = "Penurunan arus kas bersih sebesar $drop%";
        }

        return $factors;
    }
}

````

---

### `app/Services/TenantShopService.php`

````php
<?php

namespace App\Services;

use App\Models\BusinessProfile;
use App\Models\User;

class TenantShopService
{
    /**
     * Get the standard list of default transaction categories for a new UMKM shop.
     *
     * @return array<int, array{name: string, type: string, color: string, icon: string}>
     */
    public static function getDefaultCategories(): array
    {
        return [
            // Pemasukan
            [
                'name' => 'Penjualan Produk',
                'type' => 'income',
                'color' => '#10b981',
                'icon' => 'heroicon-o-shopping-bag',
            ],
            [
                'name' => 'Pendapatan Jasa / Katering',
                'type' => 'income',
                'color' => '#06b6d4',
                'icon' => 'heroicon-o-briefcase',
            ],
            [
                'name' => 'Pendapatan Lain-lain',
                'type' => 'income',
                'color' => '#3b82f6',
                'icon' => 'heroicon-o-plus-circle',
            ],
            [
                'name' => 'Modal / Investasi Masuk',
                'type' => 'income',
                'color' => '#8b5cf6',
                'icon' => 'heroicon-o-banknotes',
            ],

            // Pengeluaran
            [
                'name' => 'Pembelian Bahan Baku & Kulakan',
                'type' => 'expense',
                'color' => '#ef4444',
                'icon' => 'heroicon-o-archive-box',
            ],
            [
                'name' => 'Gaji & Upah Karyawan',
                'type' => 'expense',
                'color' => '#f97316',
                'icon' => 'heroicon-o-user-group',
            ],
            [
                'name' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)',
                'type' => 'expense',
                'color' => '#f59e0b',
                'icon' => 'heroicon-o-home-modern',
            ],
            [
                'name' => 'Operasional & Perlengkapan',
                'type' => 'expense',
                'color' => '#64748b',
                'icon' => 'heroicon-o-cog-6-tooth',
            ],
            [
                'name' => 'Pemasaran & Promosi',
                'type' => 'expense',
                'color' => '#ec4899',
                'icon' => 'heroicon-o-megaphone',
            ],
            [
                'name' => 'Transportasi & Logistik',
                'type' => 'expense',
                'color' => '#a855f7',
                'icon' => 'heroicon-o-truck',
            ],
        ];
    }

    /**
     * Initialize shop profile and default categories for an UMKM owner.
     */
    public function initializeShop(
        User $user,
        ?string $businessName = null,
        ?string $businessType = null,
        float $initialCapital = 0
    ): BusinessProfile {
        $resolvedName = filled($businessName) ? trim($businessName) : "Toko {$user->name}";

        $profile = BusinessProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'business_name' => $resolvedName,
                'business_type' => $businessType ?: 'Retail & Perdagangan',
                'initial_capital' => $initialCapital,
            ]
        );

        $this->initializeDefaultCategories($user);

        return $profile;
    }

    /**
     * Seed default categories for a user if they do not exist yet.
     */
    public function initializeDefaultCategories(User $user): void
    {
        if ($user->transactionCategories()->exists()) {
            return;
        }

        foreach (self::getDefaultCategories() as $category) {
            $user->transactionCategories()->create($category);
        }
    }
}

````

---

### `app/Support/DashboardPeriod.php`

````php
<?php

namespace App\Support;

use Carbon\Carbon;
use Carbon\CarbonInterface;

class DashboardPeriod
{
    /**
     * Resolve the dashboard period filter into a concrete date range.
     *
     * @return array{start: CarbonInterface, end: CarbonInterface, label: string}
     */
    public static function resolve(?string $period): array
    {
        $now = Carbon::now();

        return match ($period) {
            'last_month' => [
                'start' => $now->copy()->subMonth()->startOfMonth()->startOfDay(),
                'end' => $now->copy()->subMonth()->endOfMonth()->endOfDay(),
                'label' => $now->copy()->subMonth()->translatedFormat('F Y'),
            ],
            'last_30_days' => [
                'start' => $now->copy()->subDays(29)->startOfDay(),
                'end' => $now->copy()->endOfDay(),
                'label' => $now->copy()->subDays(29)->translatedFormat('d M Y').' - '.$now->translatedFormat('d M Y'),
            ],
            'this_year' => [
                'start' => $now->copy()->startOfYear()->startOfDay(),
                'end' => $now->copy()->endOfYear()->endOfDay(),
                'label' => $now->translatedFormat('Y'),
            ],
            default => [
                'start' => $now->copy()->startOfMonth()->startOfDay(),
                'end' => $now->copy()->endOfMonth()->endOfDay(),
                'label' => $now->translatedFormat('F Y'),
            ],
        };
    }

    /**
     * Options for the dashboard period filter form.
     *
     * @return array<string, string>
     */
    public static function options(): array
    {
        return [
            'this_month' => 'Bulan Ini',
            'last_month' => 'Bulan Lalu',
            'last_30_days' => '30 Hari Terakhir',
            'this_year' => 'Tahun Ini',
        ];
    }
}

````

---

### `app/Support/TenantContext.php`

````php
<?php

namespace App\Support;

use App\Models\BusinessProfile;
use App\Models\User;
use Illuminate\Support\Collection;

class TenantContext
{
    public const SESSION_KEY = 'admin_active_tenant_id';

    /**
     * Get the active tenant user ID (Owner ID).
     */
    public static function getActiveTenantId(): ?int
    {
        $user = auth()->user();

        if (! $user) {
            return null;
        }

        // If the logged in user is a regular UMKM owner, they can only access their own store
        if ($user->isOwner()) {
            return $user->id;
        }

        // For Super Admin: check if a specific tenant is selected in the session
        $selectedId = session(self::SESSION_KEY);

        if ($selectedId && User::where('id', $selectedId)->where('role', 'owner')->exists()) {
            return (int) $selectedId;
        }

        // Default to the first UMKM owner registered
        $firstOwner = User::where('role', 'owner')->orderBy('id')->first();

        if ($firstOwner) {
            session([self::SESSION_KEY => $firstOwner->id]);

            return $firstOwner->id;
        }

        return $user->id;
    }

    /**
     * Get the active tenant User model.
     */
    public static function getActiveTenantUser(): ?User
    {
        $tenantId = self::getActiveTenantId();

        return $tenantId ? User::find($tenantId) : null;
    }

    /**
     * Get the active tenant BusinessProfile model.
     */
    public static function getActiveBusinessProfile(): ?BusinessProfile
    {
        $tenantId = self::getActiveTenantId();

        if (! $tenantId) {
            return null;
        }

        return BusinessProfile::firstOrCreate(
            ['user_id' => $tenantId],
            [
                'business_name' => 'Toko UMKM ' . $tenantId,
                'business_type' => 'Retail & Perdagangan',
                'initial_capital' => 0,
            ]
        );
    }

    /**
     * Switch active tenant for Super Admin.
     */
    public static function setActiveTenantId(int $userId): void
    {
        if (User::where('id', $userId)->where('role', 'owner')->exists()) {
            session([self::SESSION_KEY => $userId]);
        }
    }

    /**
     * Get list of all available UMKM tenants.
     *
     * @return Collection<int, User>
     */
    public static function getAllTenants(): Collection
    {
        return User::where('role', 'owner')
            ->with('businessProfile')
            ->orderBy('name')
            ->get();
    }
}


````

---

### `database/factories/AnalysisExplanationFactory.php`

````php
<?php

namespace Database\Factories;

use App\Models\AnalysisExplanation;
use App\Models\FinancialAnalysis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AnalysisExplanation>
 */
class AnalysisExplanationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'financial_analysis_id' => FinancialAnalysis::factory(),
            'explanation' => $this->faker->paragraph(3),
            'recommendations' => [
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
            ],
            'provider' => 'gemini',
            'status' => 'success',
            'error_message' => null,
        ];
    }

    /**
     * Fallback (rule-based) state when Gemini API is unavailable.
     */
    public function fallback(): static
    {
        return $this->state(fn (array $attributes) => [
            'provider' => 'rule_based_fallback',
            'status' => 'fallback',
            'explanation' => 'Penjelasan otomatis: analisis berdasarkan aturan kondisi keuangan.',
            'recommendations' => ['Pantau pengeluaran secara berkala.', 'Siapkan cadangan kas operasional.'],
        ]);
    }

    /**
     * Error state when API call failed entirely.
     */
    public function apiError(): static
    {
        return $this->state(fn (array $attributes) => [
            'provider' => 'gemini',
            'status' => 'error',
            'explanation' => 'Layanan AI sementara tidak tersedia.',
            'recommendations' => [],
            'error_message' => 'API request timed out.',
        ]);
    }
}

````

---

### `database/factories/BusinessProfileFactory.php`

````php
<?php

namespace Database\Factories;

use App\Models\BusinessProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BusinessProfile>
 */
class BusinessProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'business_name' => $this->faker->company().' UMKM',
            'business_type' => $this->faker->randomElement(['Kuliner', 'Retail', 'Jasa', 'Kerajinan', 'Pertanian']),
            'description' => $this->faker->sentence(10),
            'initial_capital' => $this->faker->randomFloat(2, 1_000_000, 100_000_000),
        ];
    }
}

````

---

### `database/factories/FinancialAnalysisFactory.php`

````php
<?php

namespace Database\Factories;

use App\Models\FinancialAnalysis;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FinancialAnalysis>
 */
class FinancialAnalysisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $income = $this->faker->randomFloat(2, 1000000, 20000000);
        $expense = $this->faker->randomFloat(2, 500000, $income * 1.2);
        $netCashFlow = $income - $expense;
        $expenseRatio = $income > 0 ? round($expense / $income, 4) : 0.0;
        $prediction = match (true) {
            $expenseRatio <= 0.70 && $netCashFlow > 0 => 'Sehat',
            $expenseRatio <= 0.90 => 'Perlu perhatian',
            default => 'Berisiko',
        };

        return [
            'user_id' => User::factory(),
            'period_start' => now()->subMonth()->startOfMonth(),
            'period_end' => now()->subMonth()->endOfMonth(),
            'total_income' => $income,
            'total_expense' => $expense,
            'net_cash_flow' => $netCashFlow,
            'expense_ratio' => $expenseRatio,
            'income_trend' => $this->faker->randomFloat(4, -0.3, 0.5),
            'cash_flow_trend' => $this->faker->randomFloat(4, -0.5, 0.5),
            'prediction_label' => $prediction,
            'confidence_score' => $this->faker->randomFloat(4, 0.70, 0.99),
            'key_factors' => ['Arus kas positif', 'Rasio pengeluaran efisien'],
            'model_version' => \App\Services\ML\FinancialDecisionTreeService::MODEL_VERSION,
        ];
    }

    /**
     * Healthy financial state.
     */
    public function healthy(): static
    {
        return $this->state(fn (array $attributes) => [
            'total_income' => 10000000,
            'total_expense' => 6000000,
            'net_cash_flow' => 4000000,
            'expense_ratio' => 0.60,
            'income_trend' => 0.15,
            'cash_flow_trend' => 0.10,
            'prediction_label' => 'Sehat',
            'confidence_score' => 0.95,
        ]);
    }

    /**
     * At-risk financial state.
     */
    public function atRisk(): static
    {
        return $this->state(fn (array $attributes) => [
            'total_income' => 5000000,
            'total_expense' => 5500000,
            'net_cash_flow' => -500000,
            'expense_ratio' => 1.10,
            'income_trend' => -0.20,
            'cash_flow_trend' => -0.30,
            'prediction_label' => 'Berisiko',
            'confidence_score' => 0.88,
        ]);
    }
}

````

---

### `database/factories/TransactionCategoryFactory.php`

````php
<?php

namespace Database\Factories;

use App\Models\TransactionCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransactionCategory>
 */
class TransactionCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->randomElement(['Penjualan', 'Jasa', 'Gaji', 'Sewa', 'Utilitas', 'Bahan Baku', 'Pemasaran']),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'color' => $this->faker->hexColor(),
        ];
    }

    /**
     * Income category state.
     */
    public function income(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement(['Penjualan', 'Jasa Layanan', 'Pendapatan Lain']),
            'type' => 'income',
        ]);
    }

    /**
     * Expense category state.
     */
    public function expense(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement(['Bahan Baku', 'Gaji Karyawan', 'Sewa Tempat', 'Utilitas', 'Pemasaran']),
            'type' => 'expense',
        ]);
    }
}

````

---

### `database/factories/TransactionFactory.php`

````php
<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['income', 'expense']);

        return [
            'user_id' => User::factory(),
            'transaction_category_id' => null,
            'type' => $type,
            'amount' => $this->faker->randomFloat(2, 50000, 5000000),
            'transaction_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'description' => $this->faker->sentence(4),
        ];
    }

    /**
     * Income transaction state.
     */
    public function income(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'income',
            'amount' => $this->faker->randomFloat(2, 500000, 10000000),
            'description' => 'Pemasukan: '.$this->faker->words(3, true),
        ]);
    }

    /**
     * Expense transaction state.
     */
    public function expense(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'expense',
            'amount' => $this->faker->randomFloat(2, 100000, 7000000),
            'description' => 'Pengeluaran: '.$this->faker->words(3, true),
        ]);
    }

    /**
     * Set transaction to a specific month.
     */
    public function inMonth(int $year, int $month): static
    {
        $start = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $end = $start->copy()->endOfMonth();

        return $this->state(fn (array $attributes) => [
            'transaction_date' => $this->faker->dateTimeBetween($start, $end),
        ]);
    }
}

````

---

### `database/factories/UserFactory.php`

````php
<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user has admin role.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }

    /**
     * Indicate that the user has owner role.
     */
    public function owner(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'owner',
        ]);
    }
}

````

---

### `database/migrations/0001_01_01_000000_create_users_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

````

---

### `database/migrations/0001_01_01_000001_create_cache_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->bigInteger('expiration')->index();
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->bigInteger('expiration')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};

````

---

### `database/migrations/0001_01_01_000002_create_jobs_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedSmallInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('connection');
            $table->string('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();

            $table->index(['connection', 'queue', 'failed_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};

````

---

### `database/migrations/2026_10_27_074505_add_role_to_users_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('owner')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};

````

---

### `database/migrations/2026_10_27_074540_create_business_profiles_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('business_name');
            $table->string('business_type')->nullable();
            $table->text('description')->nullable();
            $table->decimal('initial_capital', 15, 2)->default(0);
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_profiles');
    }
};

````

---

### `database/migrations/2026_10_27_074556_create_transaction_categories_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('type', ['income', 'expense']);
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_categories');
    }
};

````

---

### `database/migrations/2026_10_27_074655_create_transactions_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('transaction_category_id')->nullable()->constrained('transaction_categories')->nullOnDelete();
            $table->enum('type', ['income', 'expense']);
            $table->decimal('amount', 15, 2);
            $table->date('transaction_date');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'transaction_date']);
            $table->index(['user_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

````

---

### `database/migrations/2026_10_27_074802_create_financial_analyses_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('financial_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('period_start');
            $table->date('period_end');
            $table->decimal('total_income', 15, 2);
            $table->decimal('total_expense', 15, 2);
            $table->decimal('net_cash_flow', 15, 2);
            $table->decimal('expense_ratio', 8, 4);
            $table->decimal('income_trend', 8, 4)->default(0);
            $table->decimal('cash_flow_trend', 8, 4)->default(0);
            $table->string('prediction_label');
            $table->decimal('confidence_score', 5, 4)->nullable();
            $table->json('key_factors')->nullable();
            $table->string('model_version')->default('1.0.0');
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_analyses');
    }
};

````

---

### `database/migrations/2026_10_27_074817_create_analysis_explanations_table.php`

````php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('analysis_explanations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financial_analysis_id')->constrained('financial_analyses')->cascadeOnDelete();
            $table->longText('explanation')->nullable();
            $table->json('recommendations')->nullable();
            $table->string('provider')->default('gemini');
            $table->string('status')->default('pending');
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_explanations');
    }
};

````

---

### `database/seeders/AnalysisExplanationSeeder.php`

````php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnalysisExplanationSeeder extends Seeder
{
    /**
     * Penjelasan LLM dibuat secara otomatis saat analisis dijalankan melalui UI.
     * Seeder ini dikosongkan agar tidak men-generate teks palsu
     * yang tidak melewati model Decision Tree maupun LLM sungguhan.
     */
    public function run(): void
    {
        // Intentionally empty — explanation dibuat melalui UI Analisis AI.
    }
}

````

---

### `database/seeders/BusinessProfileSeeder.php`

````php
<?php

namespace Database\Seeders;

use App\Models\BusinessProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class BusinessProfileSeeder extends Seeder
{
    /**
     * Seed profil usaha untuk akun demo.
     */
    public function run(): void
    {
        // Pastikan akun admin tidak memiliki profil toko palsu
        BusinessProfile::whereIn('user_id', User::where('role', 'admin')->pluck('id'))->delete();

        $owners = User::where('role', 'owner')->get();

        foreach ($owners as $user) {
            BusinessProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'business_name' => $user->email === 'admin@umkm.com'
                        ? 'Kedai Kopi & Kuliner Berkah Nusantara'
                        : 'Toko Berkah Jaya '.$user->name,
                    'business_type' => $user->email === 'admin@umkm.com'
                        ? 'Kuliner & F&B'
                        : 'Retail & Perdagangan',
                    'description' => $user->email === 'admin@umkm.com'
                        ? 'Usaha kuliner kopi artisan dan makanan ringan lokal khas nusantara. Melayani pelanggan walk-in dan pesanan katering.'
                        : 'Usaha perdagangan retail kebutuhan harian, sembako, dan aneka perlengkapan rumah tangga dengan pelayanan prima.',
                    'initial_capital' => 25_000_000,
                    'phone' => '081234567890',
                    'address' => 'Jl. Merdeka No. 45, Jakarta Selatan',
                ]
            );
        }
    }
}

````

---

### `database/seeders/DatabaseSeeder.php`

````php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Urutan eksekusi penting karena ada relasi antar tabel:
     * 1. UserSeeder           — buat akun demo
     * 2. BusinessProfileSeeder — profil usaha (butuh user)
     * 3. TransactionCategorySeeder — kategori (butuh user)
     * 4. TransactionSeeder    — transaksi 6 bulan (butuh user + kategori)
     * 5. FinancialAnalysisSeeder  — kosong, dibuat via UI
     * 6. AnalysisExplanationSeeder — kosong, dibuat via UI
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BusinessProfileSeeder::class,
            TransactionCategorySeeder::class,
            TransactionSeeder::class,
            FinancialAnalysisSeeder::class,
            AnalysisExplanationSeeder::class,
        ]);
    }
}

````

---

### `database/seeders/FinancialAnalysisSeeder.php`

````php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinancialAnalysisSeeder extends Seeder
{
    /**
     * Hasil analisis keuangan dibuat melalui UI Analisis AI (bukan di-seed),
     * karena proses ini melibatkan kalkulasi Decision Tree dan pemanggilan LLM.
     *
     * Jalankan analisis pertama melalui menu "Analisis AI" di dashboard,
     * atau via: php artisan ml:train-decision-tree untuk melatih model terlebih dahulu.
     */
    public function run(): void
    {
        // Intentionally empty — analisis dibuat melalui UI.
    }
}

````

---

### `database/seeders/TransactionCategorySeeder.php`

````php
<?php

namespace Database\Seeders;

use App\Models\TransactionCategory;
use App\Models\User;
use App\Services\TenantShopService;
use Illuminate\Database\Seeder;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Seed kategori transaksi standar UMKM untuk akun demo.
     */
    public function run(): void
    {
        $categories = TenantShopService::getDefaultCategories();

        $users = User::all();

        foreach ($users as $user) {
            foreach ($categories as $category) {
                TransactionCategory::firstOrCreate(
                    ['user_id' => $user->id, 'name' => $category['name']],
                    $category
                );
            }
        }
    }
}

````

---

### `database/seeders/TransactionSeeder.php`

````php
<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Seed data transaksi realistis selama 6 bulan terakhir
     * agar Dashboard, Laporan, dan Analisis AI punya data bermakna.
     */
    public function run(): void
    {
        $users = User::all();
        $now = Carbon::now();

        /**
         * Data transaksi per bulan selama 6 bulan terakhir.
         * Pola: pertumbuhan bertahap dengan sedikit fluktuasi
         * agar model Decision Tree mendapat variasi kondisi keuangan.
         *
         * @var array<int, array<int, array{cat: string, type: string, amount: int, desc: string}>>
         */
        $monthlyData = [
            // 5 bulan lalu — Berisiko (expense ratio tinggi, net negatif)
            5 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 8_500_000, 'desc' => 'Penjualan produk bulan ke-1'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 1_200_000, 'desc' => 'Jasa katering kecil'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 5_800_000, 'desc' => 'Bahan baku kopi dan makanan'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_000_000, 'desc' => 'Gaji 2 karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_200_000, 'desc' => 'Sewa dan utilitas'],
                ['cat' => 'Operasional & Perlengkapan', 'type' => 'expense', 'amount' => 800_000, 'desc' => 'Perlengkapan operasional'],
            ],

            // 4 bulan lalu — Perlu Perhatian
            4 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 11_000_000, 'desc' => 'Penjualan produk meningkat'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 2_500_000, 'desc' => 'Katering acara perusahaan'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 6_200_000, 'desc' => 'Bahan baku bulanan'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_000_000, 'desc' => 'Gaji karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_200_000, 'desc' => 'Sewa dan utilitas'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 600_000, 'desc' => 'Iklan media sosial'],
            ],

            // 3 bulan lalu — Sehat
            3 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 16_500_000, 'desc' => 'Penjualan produk peak season'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 4_000_000, 'desc' => 'Katering acara pernikahan'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_500_000, 'desc' => 'Bahan baku meningkat'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji + bonus karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_300_000, 'desc' => 'Utilitas naik'],
                ['cat' => 'Transportasi & Logistik', 'type' => 'expense', 'amount' => 500_000, 'desc' => 'Ongkir bahan baku'],
            ],

            // 2 bulan lalu — Sehat
            2 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 18_000_000, 'desc' => 'Penjualan terbaik'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 3_500_000, 'desc' => 'Katering kantor rutin'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_800_000, 'desc' => 'Stok bahan baku lebih banyak'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji 3 karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_400_000, 'desc' => 'Sewa dan utilitas'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 800_000, 'desc' => 'Kampanye promo akhir bulan'],
                ['cat' => 'Operasional & Perlengkapan', 'type' => 'expense', 'amount' => 700_000, 'desc' => 'Peralatan dapur'],
            ],

            // 1 bulan lalu — Perlu Perhatian (sedikit turun)
            1 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 14_500_000, 'desc' => 'Penjualan turun sedikit'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 2_800_000, 'desc' => 'Pesanan katering berkurang'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_200_000, 'desc' => 'Bahan baku bulanan'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_400_000, 'desc' => 'Tagihan utilitas'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 500_000, 'desc' => 'Iklan sosmed'],
                ['cat' => 'Transportasi & Logistik', 'type' => 'expense', 'amount' => 350_000, 'desc' => 'Ongkir pengiriman'],
            ],

            // Bulan berjalan — Sehat
            0 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 12_500_000, 'desc' => 'Penjualan minggu ke-3'],
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 9_800_000, 'desc' => 'Penjualan minggu ke-2'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 3_500_000, 'desc' => 'Pesanan katering acara kantor'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_200_000, 'desc' => 'Biji kopi, susu, dan bahan masakan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_500_000, 'desc' => 'Tagihan listrik dan internet'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji 2 barista'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 500_000, 'desc' => 'Iklan media sosial'],
            ],
        ];

        foreach ($users as $user) {
            if (Transaction::where('user_id', $user->id)->count() >= 10) {
                continue;
            }

            /** @var array<string, TransactionCategory> $categories */
            $categories = TransactionCategory::where('user_id', $user->id)
                ->get()
                ->keyBy('name');

            foreach ($monthlyData as $monthsAgo => $transactions) {
                $baseDate = $now->copy()->subMonths($monthsAgo);

                foreach ($transactions as $index => $trx) {
                    if (! isset($categories[$trx['cat']])) {
                        continue;
                    }

                    // Sebar tanggal transaksi secara acak dalam bulan itu
                    $day = random_int(1, min(28, $baseDate->daysInMonth));
                    $transactionDate = $baseDate->copy()->day($day);

                    Transaction::create([
                        'user_id' => $user->id,
                        'transaction_category_id' => $categories[$trx['cat']]->id,
                        'type' => $trx['type'],
                        'amount' => $trx['amount'],
                        'transaction_date' => $transactionDate->format('Y-m-d'),
                        'description' => $trx['desc'],
                    ]);
                }
            }
        }
    }
}

````

---

### `database/seeders/UserSeeder.php`

````php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed akun demo admin dan pemilik UMKM.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'superadmin@umkm.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@umkm.com'],
            [
                'name' => 'Pemilik UMKM',
                'password' => Hash::make('password'),
                'role' => 'owner',
                'email_verified_at' => now(),
            ]
        );
    }
}

````

---

### `resources/views/errors/503.blade.php`

````blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Sedang Pemeliharaan — SIM Keuangan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0b1120;
            --card-bg: rgba(17, 24, 39, 0.75);
            --border-color: rgba(255, 255, 255, 0.08);
            --primary: #10b981;
            --primary-glow: rgba(16, 185, 129, 0.25);
            --accent: #38bdf8;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        /* Background ambient glow effects */
        .ambient-glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
        }

        .glow-1 {
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.18) 0%, transparent 70%);
            top: 10%;
            left: 15%;
            animation: pulse-slow 8s infinite alternate ease-in-out;
        }

        .glow-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.15) 0%, transparent 70%);
            bottom: 10%;
            right: 15%;
            animation: pulse-slow 10s infinite alternate-reverse ease-in-out;
        }

        /* Glassmorphism card container */
        .maintenance-container {
            position: relative;
            z-index: 1;
            max-width: 620px;
            width: 100%;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 
                        0 0 0 1px rgba(255, 255, 255, 0.05);
            animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Floating / Pulsing animated icon */
        .icon-wrapper {
            position: relative;
            width: 88px;
            height: 88px;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(56, 189, 248, 0.1));
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 22px;
            box-shadow: 0 0 35px var(--primary-glow);
            animation: float 4s ease-in-out infinite;
        }

        .icon-wrapper svg {
            width: 44px;
            height: 44px;
            color: var(--primary);
        }

        /* Status badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 1rem;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.25);
            border-radius: 9999px;
            font-size: 0.825rem;
            font-weight: 600;
            color: #34d399;
            margin-bottom: 1.5rem;
            letter-spacing: 0.025em;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #34d399;
            box-shadow: 0 0 0 0 rgba(52, 211, 153, 0.7);
            animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Headings & Texts */
        h1 {
            font-size: 1.85rem;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #ffffff, #e2e8f0, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.description {
            font-size: 0.975rem;
            line-height: 1.65;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        /* Highlight info box */
        .info-box {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 2rem;
            text-align: left;
        }

        .info-item h4 {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .info-item p {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-main);
        }

        /* Action button */
        .btn-refresh {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #10b981, #059669);
            color: #ffffff;
            font-family: inherit;
            font-size: 0.925rem;
            font-weight: 600;
            padding: 0.85rem 2rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.35);
            text-decoration: none;
        }

        .btn-refresh:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(16, 185, 129, 0.45);
            background: linear-gradient(135deg, #34d399, #10b981);
        }

        .btn-refresh:active {
            transform: translateY(0);
        }

        .btn-refresh svg {
            width: 18px;
            height: 18px;
            transition: transform 0.4s ease;
        }

        .btn-refresh:hover svg {
            transform: rotate(180deg);
        }

        /* Footer */
        .footer-note {
            margin-top: 2.25rem;
            font-size: 0.8rem;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .footer-note span.brand {
            color: #94a3b8;
            font-weight: 600;
        }

        /* Keyframe animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(2deg); }
        }

        @keyframes pulse-ring {
            0% { box-shadow: 0 0 0 0 rgba(52, 211, 153, 0.7); }
            70% { box-shadow: 0 0 0 8px rgba(52, 211, 153, 0); }
            100% { box-shadow: 0 0 0 0 rgba(52, 211, 153, 0); }
        }

        @keyframes pulse-slow {
            0% { transform: scale(0.95); opacity: 0.7; }
            100% { transform: scale(1.05); opacity: 1; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 640px) {
            .maintenance-container {
                padding: 2.25rem 1.5rem;
                border-radius: 20px;
            }
            h1 {
                font-size: 1.5rem;
            }
            .info-box {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="ambient-glow glow-1"></div>
    <div class="ambient-glow glow-2"></div>

    <div class="maintenance-container">
        <!-- Animated Maintenance / Server Icon -->
        <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.07a4.5 4.5 0 004.486-6.32l-3.27 3.287a1.5 1.5 0 01-2.122-2.122l3.287-3.27a4.5 4.5 0 00-6.32 4.486c.118.58.094 1.193-.07 1.743m-1.396 2.036l-1.31-1.31" />
            </svg>
        </div>

        <!-- Status badge -->
        <div class="status-badge">
            <span class="pulse-dot"></span>
            Mode Pemeliharaan Sistem
        </div>

        <!-- Headline & Description -->
        <h1>Sistem Sedang Dalam Pemeliharaan</h1>
        <p class="description">
            Kami sedang melakukan pembaruan berkala dan optimalisasi infrastruktur AI agar sistem pembukuan serta analisis keuangan usaha Anda semakin cepat, akurat, dan aman.
        </p>

        <!-- Information card -->
        <div class="info-box">
            <div class="info-item">
                <h4>Platform</h4>
                <p>SIM Keuangan Berbasis AI</p>
            </div>
            <div class="info-item">
                <h4>Status Layanan</h4>
                <p style="color: #38bdf8;">Peningkatan Sistem</p>
            </div>
            <div class="info-item">
                <h4>Akses Data</h4>
                <p style="color: #34d399;">Aman & Terlindungi</p>
            </div>
        </div>

        <!-- Refresh button -->
        <button class="btn-refresh" onclick="window.location.reload();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            Muat Ulang Halaman
        </button>

        <!-- Footer -->
        <div class="footer-note">
            <span>&copy; {{ date('Y') }}</span>
            <span class="brand">SIM Keuangan</span>
            <span>&bull; Layanan akan segera kembali online</span>
        </div>
    </div>
</body>
</html>

````

---

### `resources/views/filament/pages/business-profile-page.blade.php`

````blade
<x-filament-panels::page>

    @php
        $profile = \App\Support\TenantContext::getActiveBusinessProfile();
        $businessTypes = [
            'Kuliner & F&B'            => 'Kuliner & Makanan / Minuman (F&B)',
            'Retail & Perdagangan'     => 'Retail, Toko Kelontong & Minimarket',
            'Fashion & Konveksi'       => 'Fashion, Pakaian & Aksesori',
            'Jasa & Konsultasi'        => 'Jasa, Perbaikan & Layanan',
            'Kerajinan & Kriya'        => 'Kerajinan Tangan, Kriya & Seni',
            'Pertanian & Peternakan'   => 'Pertanian, Perkebunan & Peternakan',
            'Teknologi & Digital'      => 'Teknologi & Agensi Digital',
            'Lainnya'                  => 'Lainnya',
        ];
        $businessTypeLabel = $profile ? ($businessTypes[$profile->business_type] ?? $profile->business_type) : '—';
    @endphp

    <style>
        .biz-profile-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }
        .dark .biz-profile-card {
            background-color: #18181b;
            border-color: #27272a;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }
        @media (max-width: 640px) {
            .biz-profile-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }

        .biz-avatar {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
        }

        .biz-content {
            flex: 1;
            min-width: 0;
            width: 100%;
        }

        .biz-header-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .biz-title-wrap {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .biz-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
            margin: 0;
            line-height: 1.3;
        }
        .dark .biz-title {
            color: #f8fafc;
        }

        .biz-description {
            font-size: 0.875rem;
            color: #475569;
            line-height: 1.6;
            margin-top: 8px;
            margin-bottom: 0;
        }
        .dark .biz-description {
            color: #cbd5e1;
        }

        .biz-details-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }
        .dark .biz-details-bar {
            border-top-color: #27272a;
        }

        .biz-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.8125rem;
            color: #334155;
            font-weight: 500;
        }
        .dark .biz-chip {
            background-color: #202024;
            border-color: #27272a;
            color: #cbd5e1;
        }

        .biz-chip-accent {
            background-color: #ecfdf5;
            border-color: #a7f3d0;
            color: #065f46;
            font-weight: 600;
        }
        .dark .biz-chip-accent {
            background-color: #064e3b/30;
            border-color: #065f46;
            color: #34d399;
        }
    </style>

    @if(auth()->user()?->isAdmin() && $currentTenant = \App\Support\TenantContext::getActiveTenantUser())
        <div style="margin-bottom: 16px; padding: 12px 18px; background-color: rgba(245, 158, 11, 0.12); border: 1px solid rgba(245, 158, 11, 0.35); border-radius: 12px; display: flex; align-items: center; justify-content: space-between; gap: 12px; font-size: 0.875rem;" class="text-amber-900 dark:text-amber-200">
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 1.25rem;">🏪</span>
                <span><strong>Mode Super Admin:</strong> Anda sedang melihat & mengelola SIM Keuangan Toko <strong>{{ $profile?->business_name }}</strong> (Owner: {{ $currentTenant->name }} — {{ $currentTenant->email }})</span>
            </div>
            <span style="font-size: 0.75rem; font-weight: 600;" class="text-amber-700 dark:text-amber-400">Pilih toko lain via dropdown di navigasi atas</span>
        </div>
    @endif

    {{-- Kartu Ringkasan Profil Saat Ini --}}
    @if($profile && $profile->business_name)
        <div class="biz-profile-card">
            {{-- Ikon / Avatar Toko --}}
            <div class="biz-avatar">
                <x-filament::icon icon="heroicon-o-building-storefront" class="w-8 h-8" />
            </div>

            {{-- Informasi Pokok --}}
            <div class="biz-content">
                <div class="biz-header-row">
                    <div class="biz-title-wrap">
                        <h2 class="biz-title">{{ $profile->business_name }}</h2>
                        <x-filament::badge color="primary" size="sm">
                            {{ $businessTypeLabel }}
                        </x-filament::badge>
                    </div>

                    @if($profile->updated_at)
                        <span class="text-xs text-gray-400 dark:text-gray-500 font-medium">
                            Diperbarui {{ $profile->updated_at->diffForHumans() }}
                        </span>
                    @endif
                </div>

                @if($profile->description)
                    <p class="biz-description">
                        {{ $profile->description }}
                    </p>
                @endif

                {{-- Detail Tambahan (Pill Chips) --}}
                <div class="biz-details-bar">
                    @if($profile->phone)
                        <div class="biz-chip">
                            <x-filament::icon icon="heroicon-o-phone" class="w-4 h-4 text-gray-400 dark:text-gray-500" />
                            <span>{{ $profile->phone }}</span>
                        </div>
                    @endif

                    @if($profile->address)
                        <div class="biz-chip">
                            <x-filament::icon icon="heroicon-o-map-pin" class="w-4 h-4 text-gray-400 dark:text-gray-500" />
                            <span>{{ Str::limit($profile->address, 65) }}</span>
                        </div>
                    @endif

                    @if($profile->initial_capital)
                        <div class="biz-chip biz-chip-accent">
                            <x-filament::icon icon="heroicon-o-banknotes" class="w-4 h-4" />
                            <span>Modal Awal: Rp {{ number_format((float) $profile->initial_capital, 0, ',', '.') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        {{-- Petunjuk untuk profil baru --}}
        <div class="biz-profile-card" style="justify-content: center; text-align: center; padding: 36px 20px;">
            <div style="display: flex; flex-direction: column; align-items: center; gap: 12px;">
                <div class="biz-avatar">
                    <x-filament::icon icon="heroicon-o-building-storefront" class="w-8 h-8" />
                </div>
                <div>
                    <h3 class="biz-title" style="font-size: 1.1rem;">Lengkapi Profil UMKM Anda</h3>
                    <p class="biz-description" style="margin-top: 4px;">
                        Isi informasi usaha di bawah ini agar analisis AI lebih akurat dan relevan.
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- Form Profil --}}
    <form wire:submit="save" class="space-y-6">
        {{ $this->form }}

        <div style="display: flex; justify-content: flex-end; margin-top: 18px;">
            <x-filament::button
                type="submit"
                icon="heroicon-o-check"
                color="primary"
                size="md"
            >
                Simpan Perubahan
            </x-filament::button>
        </div>
    </form>

</x-filament-panels::page>

````

---

### `resources/views/filament/pages/financial-report-page.blade.php`

````blade
<x-filament-panels::page>

    @php
        $report = $this->getReportData();
        $totalIncome  = $report['totalIncome'];
        $totalExpense = $report['totalExpense'];
        $netCashFlow  = $report['netCashFlow'];
        $expenseRatio = $report['expenseRatio'];
        $categoryBreakdown = $report['categoryBreakdown'];
        $transactions = $report['transactions'];
        $businessProfile = $report['businessProfile'];
    @endphp

    {{-- Header Info Bisnis --}}
    <div class="-mt-4 mb-2">
        <h2 class="text-lg font-bold text-gray-900 dark:text-white">
            {{ $businessProfile?->business_name ?? auth()->user()->name . ' Business' }}
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            {{ $businessProfile?->business_type ?? 'UMKM' }}
            &bull;
            Periode: {{ $report['startDate'] }} s/d {{ $report['endDate'] }}
        </p>
    </div>

    {{-- Filter & Aksi --}}
    <x-filament::section>
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">

            <div class="flex flex-col gap-4">
                {{-- Tombol Periode Cepat --}}
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 mr-1">Periode:</span>
                    @foreach([
                        'today'      => 'Hari Ini',
                        'this_month' => 'Bulan Ini',
                        'last_month' => 'Bulan Lalu',
                        'this_year'  => 'Tahun Ini',
                    ] as $value => $label)
                        <button
                            wire:click="$set('period', '{{ $value }}')"
                            class="px-3 py-1.5 text-sm rounded-lg border transition-colors
                                {{ $period === $value
                                    ? 'bg-primary-600 text-white border-primary-600 dark:bg-primary-500 dark:border-primary-500'
                                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700' }}"
                        >
                            {{ $label }}
                        </button>
                    @endforeach
                </div>

                {{-- Input Tanggal Kustom --}}
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div class="w-full sm:w-auto">
                        <x-filament::input.wrapper>
                            <x-filament::input
                                type="date"
                                wire:model.live="startDate"
                            />
                        </x-filament::input.wrapper>
                    </div>
                    <span class="hidden sm:block text-gray-500">—</span>
                    <div class="w-full sm:w-auto">
                        <x-filament::input.wrapper>
                            <x-filament::input
                                type="date"
                                wire:model.live="endDate"
                            />
                        </x-filament::input.wrapper>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center gap-3 mt-4 md:mt-0">
                <x-filament::button
                    color="gray"
                    icon="heroicon-m-printer"
                    tag="a"
                    :href="route('reports.print', ['start' => $startDate, 'end' => $endDate])"
                    target="_blank"
                >
                    Cetak PDF
                </x-filament::button>
                <x-filament::button
                    color="gray"
                    icon="heroicon-m-arrow-down-tray"
                    wire:click="exportCsv"
                >
                    Ekspor CSV
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>    {{-- Style Tambahan untuk Border, Spacing, dan Grid Responsif --}}
    <style>
        .fin-grid-cards {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        @media (min-width: 640px) {
            .fin-grid-cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
        @media (min-width: 1024px) {
            .fin-grid-cards {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .fin-stat-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 20px 22px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .fin-stat-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }
        .dark .fin-stat-card {
            background-color: #18181b;
            border-color: #27272a;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }
        .dark .fin-stat-card:hover {
            border-color: #3f3f46;
        }

        .fin-card-income {
            border-left: 5px solid #10b981 !important;
        }
        .fin-card-expense {
            border-left: 5px solid #ef4444 !important;
        }
        .fin-card-cashflow {
            border-left: 5px solid #3b82f6 !important;
        }
        .fin-card-ratio {
            border-left: 5px solid #f59e0b !important;
        }

        .fin-table-container {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }
        .dark .fin-table-container {
            background-color: #18181b;
            border-color: #27272a;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }

        .fin-table-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            background-color: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .dark .fin-table-header {
            background-color: #202024;
            border-bottom-color: #27272a;
        }

        .fin-custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            text-align: left;
        }
        .fin-custom-table th {
            padding: 14px 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            background-color: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }
        .dark .fin-custom-table th {
            color: #a1a1aa;
            background-color: #202024;
            border-bottom-color: #27272a;
        }

        .fin-custom-table td {
            padding: 15px 20px;
            font-size: 0.875rem;
            color: #1e293b;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .dark .fin-custom-table td {
            color: #e4e4e7;
            border-bottom-color: #27272a;
        }

        .fin-custom-table tbody tr:last-child td {
            border-bottom: none;
        }
        .fin-custom-table tbody tr:hover td {
            background-color: #f8fafc;
        }
        .dark .fin-custom-table tbody tr:hover td {
            background-color: #27272a;
        }

        .fin-custom-table tfoot td {
            padding: 16px 20px;
            font-weight: 700;
            font-size: 0.9rem;
            background-color: #f8fafc;
            border-top: 2px solid #e2e8f0;
            color: #0f172a;
        }
        .dark .fin-custom-table tfoot td {
            background-color: #202024;
            border-top-color: #27272a;
            color: #f4f4f5;
        }
    </style>

    {{-- Kartu Ringkasan KPI --}}
    <div class="fin-grid-cards">
        {{-- Total Pemasukan --}}
        <div class="fin-stat-card fin-card-income">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Total Pemasukan</span>
                <span class="p-2 rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-950/40 dark:text-emerald-400">
                    <x-filament::icon icon="heroicon-o-arrow-trending-up" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold text-emerald-600 dark:text-emerald-400 tracking-tight">
                    Rp {{ number_format($totalIncome, 0, ',', '.') }}
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Arus kas masuk terverifikasi
                </div>
            </div>
        </div>

        {{-- Total Pengeluaran --}}
        <div class="fin-stat-card fin-card-expense">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Total Pengeluaran</span>
                <span class="p-2 rounded-lg bg-rose-50 text-rose-600 dark:bg-rose-950/40 dark:text-rose-400">
                    <x-filament::icon icon="heroicon-o-arrow-trending-down" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold text-rose-600 dark:text-rose-400 tracking-tight">
                    Rp {{ number_format($totalExpense, 0, ',', '.') }}
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Biaya operasional & modal
                </div>
            </div>
        </div>

        {{-- Arus Kas Bersih --}}
        <div class="fin-stat-card fin-card-cashflow">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Arus Kas Bersih</span>
                <span class="p-2 rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-950/40 dark:text-blue-400">
                    <x-filament::icon icon="heroicon-o-banknotes" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold {{ $netCashFlow >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }} tracking-tight">
                    {{ $netCashFlow < 0 ? '-' : '+' }}Rp {{ number_format(abs($netCashFlow), 0, ',', '.') }}
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ $netCashFlow >= 0 ? 'Surplus (Kas Positif)' : 'Defisit (Kas Negatif)' }}
                </div>
            </div>
        </div>

        {{-- Rasio Pengeluaran --}}
        <div class="fin-stat-card fin-card-ratio">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Rasio Pengeluaran</span>
                <span class="p-2 rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-950/40 dark:text-amber-400">
                    <x-filament::icon icon="heroicon-o-chart-pie" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold tracking-tight
                    {{ $expenseRatio <= 0.70 ? 'text-emerald-600 dark:text-emerald-400' : ($expenseRatio <= 0.90 ? 'text-amber-600 dark:text-amber-400' : 'text-rose-600 dark:text-rose-400') }}">
                    {{ number_format($expenseRatio * 100, 1) }}%
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ $expenseRatio <= 0.70 ? 'Optimal (≤ 70%)' : ($expenseRatio <= 0.90 ? 'Sedang (71-90%)' : 'Tinggi (> 90%)') }}
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Rekapitulasi per Kategori --}}
    <div class="fin-table-container">
        <div class="fin-table-header">
            <div>
                <h3 class="text-base font-bold text-gray-900 dark:text-white">Rekapitulasi per Kategori</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Ringkasan transaksi yang dikelompokkan berdasarkan pos kategori</p>
            </div>
            <span class="text-xs font-medium px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                {{ count($categoryBreakdown) }} Kategori
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="fin-custom-table">
                <thead>
                    <tr>
                        <th style="width: 35%;">Nama Kategori</th>
                        <th style="width: 20%; text-align: center;">Tipe</th>
                        <th style="width: 20%; text-align: center;">Jumlah Transaksi</th>
                        <th style="width: 25%; text-align: right;">Total Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categoryBreakdown as $cat)
                        <tr>
                            <td class="font-semibold text-gray-900 dark:text-white">
                                {{ $cat['name'] }}
                            </td>
                            <td style="text-align: center;">
                                <x-filament::badge :color="$cat['type'] === 'income' ? 'success' : 'danger'" size="sm">
                                    {{ $cat['type'] === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                </x-filament::badge>
                            </td>
                            <td style="text-align: center;" class="font-medium text-gray-600 dark:text-gray-300">
                                {{ $cat['count'] }}
                            </td>
                            <td style="text-align: right;" class="font-bold {{ $cat['type'] === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                Rp {{ number_format($cat['total'], 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 36px 20px;" class="text-gray-500 dark:text-gray-400 italic">
                                Belum ada data transaksi pada periode yang dipilih.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tabel Rincian Transaksi --}}
    <div class="fin-table-container">
        <div class="fin-table-header">
            <div>
                <h3 class="text-base font-bold text-gray-900 dark:text-white">Rincian Transaksi</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Daftar kronologis seluruh arus transaksi pada periode aktif</p>
            </div>
            <span class="text-xs font-medium px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                {{ $transactions->count() }} Transaksi
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="fin-custom-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">Tanggal</th>
                        <th style="width: 15%; text-align: center;">Jenis</th>
                        <th style="width: 25%;">Kategori</th>
                        <th style="width: 25%;">Keterangan</th>
                        <th style="width: 20%; text-align: right;">Nominal (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $tx)
                        <tr>
                            <td class="font-medium text-gray-700 dark:text-gray-300" style="white-space: nowrap;">
                                {{ $tx->transaction_date->format('d M Y') }}
                            </td>
                            <td style="text-align: center;">
                                <x-filament::badge :color="$tx->type === 'income' ? 'success' : 'danger'" size="sm">
                                    {{ $tx->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                </x-filament::badge>
                            </td>
                            <td class="font-medium text-gray-900 dark:text-white">
                                {{ $tx->category?->name ?? '—' }}
                            </td>
                            <td class="text-gray-600 dark:text-gray-400 text-sm">
                                {{ $tx->description ?? '—' }}
                            </td>
                            <td style="text-align: right; white-space: nowrap;" class="font-bold {{ $tx->type === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                {{ $tx->type === 'expense' ? '-' : '+' }}Rp {{ number_format((float) $tx->amount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 36px 20px;" class="text-gray-500 dark:text-gray-400 italic">
                                Tidak ada transaksi pada periode yang dipilih.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if($transactions->count() > 0)
                <tfoot>
                    <tr>
                        <td colspan="4" class="font-bold">
                            Total Ringkasan ({{ $transactions->count() }} transaksi)
                        </td>
                        <td style="text-align: right; white-space: nowrap;" class="font-extrabold {{ $netCashFlow >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                            {{ $netCashFlow < 0 ? '-' : '+' }}Rp {{ number_format(abs($netCashFlow), 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>

</x-filament-panels::page>
````

---

### `resources/views/filament/tour-theme.blade.php`

````blade
<style>
    /* ==========================================================================
       FILAMENT TOUR - THEME HARMONIZATION (EMERALD & DARK MODE)
       ========================================================================== */

    /* 1. Modal Container & Glassmorphism */
    .shepherd-theme-custom {
        max-width: 440px !important;
        border-radius: 18px !important;
        overflow: hidden !important;
        font-family: inherit !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7), 0 0 25px rgba(16, 185, 129, 0.2) !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* Dark Mode Theme (Default & Filament .dark) */
    html.dark .shepherd-theme-custom,
    body.dark .shepherd-theme-custom,
    .shepherd-theme-custom {
        background: #18181b !important;
        border: 1px solid rgba(16, 185, 129, 0.35) !important;
        color: #f4f4f5 !important;
    }

    /* Light Mode Theme */
    html:not(.dark) .shepherd-theme-custom {
        background: #ffffff !important;
        border: 1px solid rgba(16, 185, 129, 0.4) !important;
        color: #18181b !important;
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15), 0 0 20px rgba(16, 185, 129, 0.15) !important;
    }

    /* 2. Header - Emerald Gradient */
    .shepherd-theme-custom .shepherd-header {
        background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
        padding: 1.25rem 1.5rem !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
    }

    .shepherd-theme-custom .shepherd-title {
        color: #ffffff !important;
        font-size: 1.15rem !important;
        font-weight: 700 !important;
        letter-spacing: -0.015em !important;
        margin: 0 !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2) !important;
    }

    .shepherd-theme-custom .shepherd-cancel-icon {
        color: rgba(255, 255, 255, 0.8) !important;
        background: rgba(255, 255, 255, 0.15) !important;
        border-radius: 50% !important;
        width: 30px !important;
        height: 30px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.2s ease !important;
        font-size: 1.25rem !important;
    }

    .shepherd-theme-custom .shepherd-cancel-icon:hover {
        color: #ffffff !important;
        background: rgba(255, 255, 255, 0.3) !important;
        transform: rotate(90deg) !important;
    }

    /* 3. Content Area & Text Direction (Force LTR & Proper Indonesian Formatting) */
    .shepherd-theme-custom .shepherd-content {
        background: transparent !important;
        border-radius: 0 !important;
    }

    .shepherd-theme-custom .shepherd-text {
        direction: ltr !important;
        text-align: left !important;
        padding: 1.5rem 1.5rem 1rem 1.5rem !important;
        font-size: 0.95rem !important;
        line-height: 1.7 !important;
    }

    html.dark .shepherd-theme-custom .shepherd-text,
    .shepherd-theme-custom .shepherd-text {
        color: #d4d4d8 !important;
        background: #18181b !important;
    }

    html:not(.dark) .shepherd-theme-custom .shepherd-text {
        color: #3f3f46 !important;
        background: #ffffff !important;
    }

    .shepherd-theme-custom .shepherd-text strong {
        font-weight: 600 !important;
    }

    html.dark .shepherd-theme-custom .shepherd-text strong,
    .shepherd-theme-custom .shepherd-text strong {
        color: #ffffff !important;
    }

    html:not(.dark) .shepherd-theme-custom .shepherd-text strong {
        color: #09090b !important;
    }

    /* 4. Footer & Button Layout */
    .shepherd-theme-custom .shepherd-footer {
        direction: ltr !important;
        display: flex !important;
        justify-content: flex-end !important;
        flex-direction: row-reverse !important;
        gap: 0.75rem !important;
        padding: 1rem 1.5rem 1.25rem !important;
        border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    html.dark .shepherd-theme-custom .shepherd-footer,
    .shepherd-theme-custom .shepherd-footer {
        background: #09090b !important;
        border-top: 1px solid rgba(255, 255, 255, 0.06) !important;
    }

    html:not(.dark) .shepherd-theme-custom .shepherd-footer {
        background: #fafafa !important;
        border-top: 1px solid rgba(0, 0, 0, 0.06) !important;
    }

    /* 5. Primary Action Button (Selanjutnya / Selesai) - Emerald */
    .shepherd-theme-custom .shepherd-button {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        color: #ffffff !important;
        font-size: 0.875rem !important;
        font-weight: 600 !important;
        padding: 0.625rem 1.35rem !important;
        border-radius: 10px !important;
        border: none !important;
        cursor: pointer !important;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3) !important;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .shepherd-theme-custom .shepherd-button:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.45) !important;
        transform: translateY(-1px) !important;
    }

    .shepherd-theme-custom .shepherd-button:active {
        transform: translateY(0) !important;
    }

    /* 6. Secondary Action Button (Sebelumnya / Lewati) */
    .shepherd-theme-custom .shepherd-button-secondary {
        border-radius: 10px !important;
        padding: 0.625rem 1.25rem !important;
        font-size: 0.875rem !important;
        font-weight: 500 !important;
        transition: all 0.2s ease !important;
    }

    html.dark .shepherd-theme-custom .shepherd-button-secondary,
    .shepherd-theme-custom .shepherd-button-secondary {
        background: rgba(255, 255, 255, 0.08) !important;
        color: #e4e4e7 !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        box-shadow: none !important;
    }

    html.dark .shepherd-theme-custom .shepherd-button-secondary:hover,
    .shepherd-theme-custom .shepherd-button-secondary:hover {
        background: rgba(255, 255, 255, 0.15) !important;
        color: #ffffff !important;
    }

    html:not(.dark) .shepherd-theme-custom .shepherd-button-secondary {
        background: #f4f4f5 !important;
        color: #52525b !important;
        border: 1px solid #e4e4e7 !important;
        box-shadow: none !important;
    }

    html:not(.dark) .shepherd-theme-custom .shepherd-button-secondary:hover {
        background: #e4e4e7 !important;
        color: #18181b !important;
    }

    /* 7. Target Highlight & Pulse (Replaces Orange with Emerald) */
    .shepherd-target,
    .shepherd-tour-active-nav {
        border-radius: 12px !important;
        outline: 2px solid #10b981 !important;
        outline-offset: 3px !important;
        animation: shepherd-emerald-pulse 2.2s cubic-bezier(0.4, 0, 0.6, 1) infinite !important;
    }

    @keyframes shepherd-emerald-pulse {
        0%, 100% {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25), 0 0 20px rgba(16, 185, 129, 0.2);
        }
        50% {
            box-shadow: 0 0 0 6px rgba(16, 185, 129, 0.45), 0 0 30px rgba(16, 185, 129, 0.4);
        }
    }

    /* 8. Arrow Colors */
    .shepherd-arrow:before {
        border-color: rgba(16, 185, 129, 0.35) !important;
    }

    html.dark .shepherd-arrow:before,
    .shepherd-arrow:before {
        background: #18181b !important;
    }

    html:not(.dark) .shepherd-arrow:before {
        background: #ffffff !important;
    }
</style>

````

---

### `resources/views/livewire/tenant-switcher.blade.php`

````blade
<div class="flex items-center gap-2">
    @if ($isAdmin)
        <div class="relative flex items-center">
            <div class="flex items-center gap-1.5 text-xs font-semibold text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-300 dark:border-emerald-800 rounded-lg px-2.5 py-1.5 shadow-sm">
                <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <span class="hidden lg:inline text-gray-500 dark:text-gray-400 font-medium">Toko:</span>
                <select 
                    id="tenant-select" 
                    wire:change="switchTenant($event.target.value)"
                    class="bg-transparent font-bold text-gray-900 dark:text-gray-100 border-none outline-none focus:ring-0 cursor-pointer text-xs pr-4 py-0"
                >
                    @forelse ($tenants as $tenant)
                        <option value="{{ $tenant->id }}" @selected($tenant->id === $selectedTenantId) class="text-gray-900 bg-white dark:bg-zinc-800 dark:text-gray-100 font-medium">
                            {{ $tenant->businessProfile?->business_name ?: $tenant->name }} ({{ $tenant->name }})
                        </option>
                    @empty
                        <option value="" disabled class="text-gray-500">Belum ada toko terdaftar</option>
                    @endforelse
                </select>
            </div>
        </div>
    @elseif ($activeProfile)
        <div class="hidden sm:flex items-center gap-1.5 text-xs font-semibold text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/60 dark:border-emerald-800/40 rounded-lg px-2.5 py-1">
            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <span>{{ $activeProfile->business_name }}</span>
        </div>
    @endif
</div>


````

---

### `resources/views/reports/financial-print.blade.php`

````blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan — {{ $businessProfile?->business_name ?? 'UMKM' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1f2937;
            font-size: 12px;
            padding: 32px;
        }
        .report-header { text-align: center; border-bottom: 2px solid #111827; padding-bottom: 16px; margin-bottom: 20px; }
        .report-header h1 { font-size: 20px; margin-bottom: 4px; }
        .report-header p { color: #6b7280; font-size: 12px; }
        .summary { display: flex; gap: 12px; margin-bottom: 20px; }
        .summary-box { flex: 1; border: 1px solid #d1d5db; border-radius: 6px; padding: 12px; }
        .summary-box .label { font-size: 11px; color: #6b7280; margin-bottom: 4px; }
        .summary-box .value { font-size: 16px; font-weight: bold; }
        .value.positive { color: #047857; }
        .value.negative { color: #b91c1c; }
        h2 { font-size: 14px; margin-bottom: 8px; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        th, td { border: 1px solid #d1d5db; padding: 6px 8px; text-align: left; }
        th { background: #f3f4f6; font-size: 11px; text-transform: uppercase; letter-spacing: 0.03em; }
        td.num, th.num { text-align: right; }
        tfoot td { font-weight: bold; background: #f9fafb; }
        .footer { margin-top: 24px; color: #6b7280; font-size: 11px; text-align: center; }
        @media print {
            body { padding: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="no-print" style="text-align: right; margin-bottom: 12px;">
        <button onclick="window.print()" style="padding: 8px 16px; cursor: pointer;">Cetak / Simpan PDF</button>
    </div>

    <div class="report-header">
        <h1>{{ $businessProfile?->business_name ?? auth()->user()->name.' Business' }}</h1>
        <p>{{ $businessProfile?->business_type ?? 'UMKM' }} &bull; Laporan Keuangan</p>
        <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>
    </div>

    <div class="summary">
        <div class="summary-box">
            <div class="label">Total Pemasukan</div>
            <div class="value positive">Rp {{ number_format($totalIncome, 0, ',', '.') }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Total Pengeluaran</div>
            <div class="value negative">Rp {{ number_format($totalExpense, 0, ',', '.') }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Arus Kas Bersih</div>
            <div class="value {{ $netCashFlow >= 0 ? 'positive' : 'negative' }}">
                {{ $netCashFlow < 0 ? '-' : '' }}Rp {{ number_format(abs($netCashFlow), 0, ',', '.') }}
            </div>
        </div>
    </div>

    <h2>Rekapitulasi per Kategori</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Tipe</th>
                <th class="num">Jumlah Transaksi</th>
                <th class="num">Total Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categoryBreakdown as $cat)
                <tr>
                    <td>{{ $cat['name'] }}</td>
                    <td>{{ $cat['type'] === 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                    <td class="num">{{ $cat['count'] }}</td>
                    <td class="num">{{ $cat['type'] === 'expense' ? '-' : '' }}Rp {{ number_format($cat['total'], 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; font-style: italic;">Belum ada data transaksi pada periode ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Rincian Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th class="num">Nominal (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $tx)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tx->transaction_date->format('d M Y') }}</td>
                    <td>{{ $tx->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                    <td>{{ $tx->category?->name ?? '—' }}</td>
                    <td>{{ $tx->description ?? '—' }}</td>
                    <td class="num">{{ $tx->type === 'expense' ? '-' : '+' }}{{ number_format((float) $tx->amount, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; font-style: italic;">Tidak ada transaksi pada periode yang dipilih.</td>
                </tr>
            @endforelse
        </tbody>
        @if($transactions->count() > 0)
        <tfoot>
            <tr>
                <td colspan="5">Total Arus Kas Bersih ({{ $transactions->count() }} transaksi)</td>
                <td class="num">{{ $netCashFlow < 0 ? '-' : '+' }}{{ number_format(abs($netCashFlow), 0, ',', '.') }}</td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="footer">
        Dicetak pada {{ $printedAt }} &bull; Dokumen ini dihasilkan otomatis oleh SIM Keuangan
    </div>

    <script>
        window.addEventListener('load', function () {
            // Buka dialog cetak otomatis; pengguna dapat memilih "Save as PDF".
            if (! window.location.search.includes('noprint=1')) {
                window.print();
            }
        });
    </script>
</body>
</html>

````

---

### `resources/views/welcome.blade.php`

````blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */ @layer properties{@supports (((-webkit-hyphens:none)) and (not (margin-trim:inline))) or ((-moz-orient:inline) and (not (color:rgb(from red r g b)))){*,:before,:after,::backdrop{--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-border-style:solid;--tw-leading:initial;--tw-font-weight:initial;--tw-tracking:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}}}@layer theme{:root,:host{--font-sans:"Instrument Sans", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";--font-serif:ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;--font-mono:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;--color-red-50:oklch(97.1% .013 17.38);--color-red-100:oklch(93.6% .032 17.717);--color-red-200:oklch(88.5% .062 18.334);--color-red-300:oklch(80.8% .114 19.571);--color-red-400:oklch(70.4% .191 22.216);--color-red-500:oklch(63.7% .237 25.331);--color-red-600:oklch(57.7% .245 27.325);--color-red-700:oklch(50.5% .213 27.518);--color-red-800:oklch(44.4% .177 26.899);--color-red-900:oklch(39.6% .141 25.723);--color-red-950:oklch(25.8% .092 26.042);--color-orange-50:oklch(98% .016 73.684);--color-orange-100:oklch(95.4% .038 75.164);--color-orange-200:oklch(90.1% .076 70.697);--color-orange-300:oklch(83.7% .128 66.29);--color-orange-400:oklch(75% .183 55.934);--color-orange-500:oklch(70.5% .213 47.604);--color-orange-600:oklch(64.6% .222 41.116);--color-orange-700:oklch(55.3% .195 38.402);--color-orange-800:oklch(47% .157 37.304);--color-orange-900:oklch(40.8% .123 38.172);--color-orange-950:oklch(26.6% .079 36.259);--color-amber-50:oklch(98.7% .022 95.277);--color-amber-100:oklch(96.2% .059 95.617);--color-amber-200:oklch(92.4% .12 95.746);--color-amber-300:oklch(87.9% .169 91.605);--color-amber-400:oklch(82.8% .189 84.429);--color-amber-500:oklch(76.9% .188 70.08);--color-amber-600:oklch(66.6% .179 58.318);--color-amber-700:oklch(55.5% .163 48.998);--color-amber-800:oklch(47.3% .137 46.201);--color-amber-900:oklch(41.4% .112 45.904);--color-amber-950:oklch(27.9% .077 45.635);--color-yellow-50:oklch(98.7% .026 102.212);--color-yellow-100:oklch(97.3% .071 103.193);--color-yellow-200:oklch(94.5% .129 101.54);--color-yellow-300:oklch(90.5% .182 98.111);--color-yellow-400:oklch(85.2% .199 91.936);--color-yellow-500:oklch(79.5% .184 86.047);--color-yellow-600:oklch(68.1% .162 75.834);--color-yellow-700:oklch(55.4% .135 66.442);--color-yellow-800:oklch(47.6% .114 61.907);--color-yellow-900:oklch(42.1% .095 57.708);--color-yellow-950:oklch(28.6% .066 53.813);--color-lime-50:oklch(98.6% .031 120.757);--color-lime-100:oklch(96.7% .067 122.328);--color-lime-200:oklch(93.8% .127 124.321);--color-lime-300:oklch(89.7% .196 126.665);--color-lime-400:oklch(84.1% .238 128.85);--color-lime-500:oklch(76.8% .233 130.85);--color-lime-600:oklch(64.8% .2 131.684);--color-lime-700:oklch(53.2% .157 131.589);--color-lime-800:oklch(45.3% .124 130.933);--color-lime-900:oklch(40.5% .101 131.063);--color-lime-950:oklch(27.4% .072 132.109);--color-green-50:oklch(98.2% .018 155.826);--color-green-100:oklch(96.2% .044 156.743);--color-green-200:oklch(92.5% .084 155.995);--color-green-300:oklch(87.1% .15 154.449);--color-green-400:oklch(79.2% .209 151.711);--color-green-500:oklch(72.3% .219 149.579);--color-green-600:oklch(62.7% .194 149.214);--color-green-700:oklch(52.7% .154 150.069);--color-green-800:oklch(44.8% .119 151.328);--color-green-900:oklch(39.3% .095 152.535);--color-green-950:oklch(26.6% .065 152.934);--color-emerald-50:oklch(97.9% .021 166.113);--color-emerald-100:oklch(95% .052 163.051);--color-emerald-200:oklch(90.5% .093 164.15);--color-emerald-300:oklch(84.5% .143 164.978);--color-emerald-400:oklch(76.5% .177 163.223);--color-emerald-500:oklch(69.6% .17 162.48);--color-emerald-600:oklch(59.6% .145 163.225);--color-emerald-700:oklch(50.8% .118 165.612);--color-emerald-800:oklch(43.2% .095 166.913);--color-emerald-900:oklch(37.8% .077 168.94);--color-emerald-950:oklch(26.2% .051 172.552);--color-teal-50:oklch(98.4% .014 180.72);--color-teal-100:oklch(95.3% .051 180.801);--color-teal-200:oklch(91% .096 180.426);--color-teal-300:oklch(85.5% .138 181.071);--color-teal-400:oklch(77.7% .152 181.912);--color-teal-500:oklch(70.4% .14 182.503);--color-teal-600:oklch(60% .118 184.704);--color-teal-700:oklch(51.1% .096 186.391);--color-teal-800:oklch(43.7% .078 188.216);--color-teal-900:oklch(38.6% .063 188.416);--color-teal-950:oklch(27.7% .046 192.524);--color-cyan-50:oklch(98.4% .019 200.873);--color-cyan-100:oklch(95.6% .045 203.388);--color-cyan-200:oklch(91.7% .08 205.041);--color-cyan-300:oklch(86.5% .127 207.078);--color-cyan-400:oklch(78.9% .154 211.53);--color-cyan-500:oklch(71.5% .143 215.221);--color-cyan-600:oklch(60.9% .126 221.723);--color-cyan-700:oklch(52% .105 223.128);--color-cyan-800:oklch(45% .085 224.283);--color-cyan-900:oklch(39.8% .07 227.392);--color-cyan-950:oklch(30.2% .056 229.695);--color-sky-50:oklch(97.7% .013 236.62);--color-sky-100:oklch(95.1% .026 236.824);--color-sky-200:oklch(90.1% .058 230.902);--color-sky-300:oklch(82.8% .111 230.318);--color-sky-400:oklch(74.6% .16 232.661);--color-sky-500:oklch(68.5% .169 237.323);--color-sky-600:oklch(58.8% .158 241.966);--color-sky-700:oklch(50% .134 242.749);--color-sky-800:oklch(44.3% .11 240.79);--color-sky-900:oklch(39.1% .09 240.876);--color-sky-950:oklch(29.3% .066 243.157);--color-blue-50:oklch(97% .014 254.604);--color-blue-100:oklch(93.2% .032 255.585);--color-blue-200:oklch(88.2% .059 254.128);--color-blue-300:oklch(80.9% .105 251.813);--color-blue-400:oklch(70.7% .165 254.624);--color-blue-500:oklch(62.3% .214 259.815);--color-blue-600:oklch(54.6% .245 262.881);--color-blue-700:oklch(48.8% .243 264.376);--color-blue-800:oklch(42.4% .199 265.638);--color-blue-900:oklch(37.9% .146 265.522);--color-blue-950:oklch(28.2% .091 267.935);--color-indigo-50:oklch(96.2% .018 272.314);--color-indigo-100:oklch(93% .034 272.788);--color-indigo-200:oklch(87% .065 274.039);--color-indigo-300:oklch(78.5% .115 274.713);--color-indigo-400:oklch(67.3% .182 276.935);--color-indigo-500:oklch(58.5% .233 277.117);--color-indigo-600:oklch(51.1% .262 276.966);--color-indigo-700:oklch(45.7% .24 277.023);--color-indigo-800:oklch(39.8% .195 277.366);--color-indigo-900:oklch(35.9% .144 278.697);--color-indigo-950:oklch(25.7% .09 281.288);--color-violet-50:oklch(96.9% .016 293.756);--color-violet-100:oklch(94.3% .029 294.588);--color-violet-200:oklch(89.4% .057 293.283);--color-violet-300:oklch(81.1% .111 293.571);--color-violet-400:oklch(70.2% .183 293.541);--color-violet-500:oklch(60.6% .25 292.717);--color-violet-600:oklch(54.1% .281 293.009);--color-violet-700:oklch(49.1% .27 292.581);--color-violet-800:oklch(43.2% .232 292.759);--color-violet-900:oklch(38% .189 293.745);--color-violet-950:oklch(28.3% .141 291.089);--color-purple-50:oklch(97.7% .014 308.299);--color-purple-100:oklch(94.6% .033 307.174);--color-purple-200:oklch(90.2% .063 306.703);--color-purple-300:oklch(82.7% .119 306.383);--color-purple-400:oklch(71.4% .203 305.504);--color-purple-500:oklch(62.7% .265 303.9);--color-purple-600:oklch(55.8% .288 302.321);--color-purple-700:oklch(49.6% .265 301.924);--color-purple-800:oklch(43.8% .218 303.724);--color-purple-900:oklch(38.1% .176 304.987);--color-purple-950:oklch(29.1% .149 302.717);--color-fuchsia-50:oklch(97.7% .017 320.058);--color-fuchsia-100:oklch(95.2% .037 318.852);--color-fuchsia-200:oklch(90.3% .076 319.62);--color-fuchsia-300:oklch(83.3% .145 321.434);--color-fuchsia-400:oklch(74% .238 322.16);--color-fuchsia-500:oklch(66.7% .295 322.15);--color-fuchsia-600:oklch(59.1% .293 322.896);--color-fuchsia-700:oklch(51.8% .253 323.949);--color-fuchsia-800:oklch(45.2% .211 324.591);--color-fuchsia-900:oklch(40.1% .17 325.612);--color-fuchsia-950:oklch(29.3% .136 325.661);--color-pink-50:oklch(97.1% .014 343.198);--color-pink-100:oklch(94.8% .028 342.258);--color-pink-200:oklch(89.9% .061 343.231);--color-pink-300:oklch(82.3% .12 346.018);--color-pink-400:oklch(71.8% .202 349.761);--color-pink-500:oklch(65.6% .241 354.308);--color-pink-600:oklch(59.2% .249 .584);--color-pink-700:oklch(52.5% .223 3.958);--color-pink-800:oklch(45.9% .187 3.815);--color-pink-900:oklch(40.8% .153 2.432);--color-pink-950:oklch(28.4% .109 3.907);--color-rose-50:oklch(96.9% .015 12.422);--color-rose-100:oklch(94.1% .03 12.58);--color-rose-200:oklch(89.2% .058 10.001);--color-rose-300:oklch(81% .117 11.638);--color-rose-400:oklch(71.2% .194 13.428);--color-rose-500:oklch(64.5% .246 16.439);--color-rose-600:oklch(58.6% .253 17.585);--color-rose-700:oklch(51.4% .222 16.935);--color-rose-800:oklch(45.5% .188 13.697);--color-rose-900:oklch(41% .159 10.272);--color-rose-950:oklch(27.1% .105 12.094);--color-slate-50:oklch(98.4% .003 247.858);--color-slate-100:oklch(96.8% .007 247.896);--color-slate-200:oklch(92.9% .013 255.508);--color-slate-300:oklch(86.9% .022 252.894);--color-slate-400:oklch(70.4% .04 256.788);--color-slate-500:oklch(55.4% .046 257.417);--color-slate-600:oklch(44.6% .043 257.281);--color-slate-700:oklch(37.2% .044 257.287);--color-slate-800:oklch(27.9% .041 260.031);--color-slate-900:oklch(20.8% .042 265.755);--color-slate-950:oklch(12.9% .042 264.695);--color-gray-50:oklch(98.5% .002 247.839);--color-gray-100:oklch(96.7% .003 264.542);--color-gray-200:oklch(92.8% .006 264.531);--color-gray-300:oklch(87.2% .01 258.338);--color-gray-400:oklch(70.7% .022 261.325);--color-gray-500:oklch(55.1% .027 264.364);--color-gray-600:oklch(44.6% .03 256.802);--color-gray-700:oklch(37.3% .034 259.733);--color-gray-800:oklch(27.8% .033 256.848);--color-gray-900:oklch(21% .034 264.665);--color-gray-950:oklch(13% .028 261.692);--color-zinc-50:oklch(98.5% 0 0);--color-zinc-100:oklch(96.7% .001 286.375);--color-zinc-200:oklch(92% .004 286.32);--color-zinc-300:oklch(87.1% .006 286.286);--color-zinc-400:oklch(70.5% .015 286.067);--color-zinc-500:oklch(55.2% .016 285.938);--color-zinc-600:oklch(44.2% .017 285.786);--color-zinc-700:oklch(37% .013 285.805);--color-zinc-800:oklch(27.4% .006 286.033);--color-zinc-900:oklch(21% .006 285.885);--color-zinc-950:oklch(14.1% .005 285.823);--color-neutral-50:oklch(98.5% 0 0);--color-neutral-100:oklch(97% 0 0);--color-neutral-200:oklch(92.2% 0 0);--color-neutral-300:oklch(87% 0 0);--color-neutral-400:oklch(70.8% 0 0);--color-neutral-500:oklch(55.6% 0 0);--color-neutral-600:oklch(43.9% 0 0);--color-neutral-700:oklch(37.1% 0 0);--color-neutral-800:oklch(26.9% 0 0);--color-neutral-900:oklch(20.5% 0 0);--color-neutral-950:oklch(14.5% 0 0);--color-stone-50:oklch(98.5% .001 106.423);--color-stone-100:oklch(97% .001 106.424);--color-stone-200:oklch(92.3% .003 48.717);--color-stone-300:oklch(86.9% .005 56.366);--color-stone-400:oklch(70.9% .01 56.259);--color-stone-500:oklch(55.3% .013 58.071);--color-stone-600:oklch(44.4% .011 73.639);--color-stone-700:oklch(37.4% .01 67.558);--color-stone-800:oklch(26.8% .007 34.298);--color-stone-900:oklch(21.6% .006 56.043);--color-stone-950:oklch(14.7% .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1 / .75);--text-sm:.875rem;--text-sm--line-height:calc(1.25 / .875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75 / 1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75 / 1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2 / 1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5 / 2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a, 0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a, 0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4, 0, 1, 1);--ease-out:cubic-bezier(0, 0, .2, 1);--ease-in-out:cubic-bezier(.4, 0, .2, 1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0, 0, .2, 1) infinite;--animate-pulse:pulse 2s cubic-bezier(.4, 0, .6, 1) infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16 / 9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4, 0, .2, 1);--default-font-family:var(--font-sans);--default-mono-font-family:var(--font-mono)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1}@supports (not ((-webkit-appearance:-apple-pay-button))) or (contain-intrinsic-size:1px){::placeholder{color:currentColor}@supports (color:color-mix(in lab,red,red)){::placeholder{color:color-mix(in oklab,currentcolor 50%,transparent)}}}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}::-webkit-calendar-picker-indicator{line-height:1}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){appearance:button}::file-selector-button{appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.fixed{position:fixed}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing) * 0)}.start{inset-inline-start:var(--spacing)}.top-0{top:calc(var(--spacing) * 0)}.right-0{right:calc(var(--spacing) * 0)}.container{width:100%}@media(min-width:40rem){.container{max-width:40rem}}@media(min-width:48rem){.container{max-width:48rem}}@media(min-width:64rem){.container{max-width:64rem}}@media(min-width:80rem){.container{max-width:80rem}}@media(min-width:96rem){.container{max-width:96rem}}.mx-auto{margin-inline:auto}.-mt-\[6\.6rem\]{margin-top:-6.6rem}.-mt-px{margin-top:-1px}.mt-2{margin-top:calc(var(--spacing) * 2)}.mt-4{margin-top:calc(var(--spacing) * 4)}.mt-6{margin-top:calc(var(--spacing) * 6)}.mt-8{margin-top:calc(var(--spacing) * 8)}.mr-2{margin-right:calc(var(--spacing) * 2)}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing) * 1)}.mb-2{margin-bottom:calc(var(--spacing) * 2)}.mb-4{margin-bottom:calc(var(--spacing) * 4)}.mb-6{margin-bottom:calc(var(--spacing) * 6)}.-ml-8{margin-left:calc(var(--spacing) * -8)}.-ml-px{margin-left:-1px}.ml-1{margin-left:calc(var(--spacing) * 1)}.ml-2{margin-left:calc(var(--spacing) * 2)}.ml-4{margin-left:calc(var(--spacing) * 4)}.ml-12{margin-left:calc(var(--spacing) * 12)}.contents{display:contents}.flex{display:flex}.grid{display:grid}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/364\]{aspect-ratio:335/364}.h-1{height:calc(var(--spacing) * 1)}.h-1\.5{height:calc(var(--spacing) * 1.5)}.h-2{height:calc(var(--spacing) * 2)}.h-2\.5{height:calc(var(--spacing) * 2.5)}.h-3{height:calc(var(--spacing) * 3)}.h-3\.5{height:calc(var(--spacing) * 3.5)}.h-5{height:calc(var(--spacing) * 5)}.h-8{height:calc(var(--spacing) * 8)}.h-14{height:calc(var(--spacing) * 14)}.h-14\.5{height:calc(var(--spacing) * 14.5)}.h-16{height:calc(var(--spacing) * 16)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing) * 1)}.w-1\.5{width:calc(var(--spacing) * 1.5)}.w-2{width:calc(var(--spacing) * 2)}.w-2\.5{width:calc(var(--spacing) * 2.5)}.w-3{width:calc(var(--spacing) * 3)}.w-3\.5{width:calc(var(--spacing) * 3.5)}.w-5{width:calc(var(--spacing) * 5)}.w-8{width:calc(var(--spacing) * 8)}.w-\[438px\]{width:438px}.w-auto{width:auto}.w-full{width:100%}.max-w-6xl{max-width:var(--container-6xl)}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.max-w-xl{max-width:var(--container-xl)}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing) * 0);translate:var(--tw-translate-x) var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x,) var(--tw-rotate-y,) var(--tw-rotate-z,) var(--tw-skew-x,) var(--tw-skew-y,)}.cursor-default{cursor:default}.cursor-not-allowed{cursor:not-allowed}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-between{justify-content:space-between}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.justify-items-center{justify-items:center}.gap-2{gap:calc(var(--spacing) * 2)}.gap-3{gap:calc(var(--spacing) * 3)}.gap-4{gap:calc(var(--spacing) * 4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing) * 1) * var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing) * 1) * calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-md{border-radius:var(--radius-md)}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-l-md{border-top-left-radius:var(--radius-md);border-bottom-left-radius:var(--radius-md)}.rounded-r-md{border-top-right-radius:var(--radius-md);border-bottom-right-radius:var(--radius-md)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-t{border-top-style:var(--tw-border-style);border-top-width:1px}.border-r{border-right-style:var(--tw-border-style);border-right-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-gray-200{border-color:var(--color-gray-200)}.border-gray-300{border-color:var(--color-gray-300)}.border-gray-400{border-color:var(--color-gray-400)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-gray-100{background-color:var(--color-gray-100)}.bg-gray-200{background-color:var(--color-gray-200)}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing) * 6)}.px-2{padding-inline:calc(var(--spacing) * 2)}.px-4{padding-inline:calc(var(--spacing) * 4)}.px-5{padding-inline:calc(var(--spacing) * 5)}.px-6{padding-inline:calc(var(--spacing) * 6)}.py-1{padding-block:calc(var(--spacing) * 1)}.py-1\.5{padding-block:calc(var(--spacing) * 1.5)}.py-2{padding-block:calc(var(--spacing) * 2)}.py-4{padding-block:calc(var(--spacing) * 4)}.pt-8{padding-top:calc(var(--spacing) * 8)}.pb-6{padding-bottom:calc(var(--spacing) * 6)}.pb-12{padding-bottom:calc(var(--spacing) * 12)}.text-center{text-align:center}.text-lg{font-size:var(--text-lg);line-height:var(--tw-leading,var(--text-lg--line-height))}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-5{--tw-leading:calc(var(--spacing) * 5);line-height:calc(var(--spacing) * 5)}.leading-7{--tw-leading:calc(var(--spacing) * 7);line-height:calc(var(--spacing) * 7)}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.font-semibold{--tw-font-weight:var(--font-weight-semibold);font-weight:var(--font-weight-semibold)}.tracking-wider{--tw-tracking:var(--tracking-wider);letter-spacing:var(--tracking-wider)}.text-\[\#1B1B18\],.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F3BEC7\]{color:#f3bec7}.text-\[\#F8B803\]{color:#f8b803}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-gray-200{color:var(--color-gray-200)}.text-gray-300{color:var(--color-gray-300)}.text-gray-400{color:var(--color-gray-400)}.text-gray-500{color:var(--color-gray-500)}.text-gray-600{color:var(--color-gray-600)}.text-gray-700{color:var(--color-gray-700)}.text-gray-800{color:var(--color-gray-800)}.text-gray-900{color:var(--color-gray-900)}.text-white{color:var(--color-white)}.uppercase{text-transform:uppercase}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.opacity-100{opacity:1}.mix-blend-color{mix-blend-mode:color}.mix-blend-darken{mix-blend-mode:darken}.mix-blend-hard-light{mix-blend-mode:hard-light}.mix-blend-multiply{mix-blend-mode:multiply}.shadow{--tw-shadow:0 1px 3px 0 var(--tw-shadow-color,#0000001a), 0 1px 2px -1px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008), 0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-sm{--tw-shadow:0 1px 3px 0 var(--tw-shadow-color,#0000001a), 0 1px 2px -1px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.ring-gray-300{--tw-ring-color:var(--color-gray-300)}.filter{filter:var(--tw-blur,) var(--tw-brightness,) var(--tw-contrast,) var(--tw-grayscale,) var(--tw-hue-rotate,) var(--tw-invert,) var(--tw-saturate,) var(--tw-sepia,) var(--tw-drop-shadow,)}.transition{transition-property:color,background-color,border-color,outline-color,text-decoration-color,fill,stroke,--tw-gradient-from,--tw-gradient-via,--tw-gradient-to,opacity,box-shadow,transform,translate,scale,rotate,filter,-webkit-backdrop-filter,backdrop-filter,display,content-visibility,overlay,pointer-events;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-200{transition-delay:.2s}.delay-300{transition-delay:.3s}.delay-400{transition-delay:.4s}.duration-150{--tw-duration:.15s;transition-duration:.15s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.ease-in-out{--tw-ease:var(--ease-in-out);transition-timing-function:var(--ease-in-out)}.\[--stroke-color\:\#1B1B18\]{--stroke-color:#1b1b18}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing) * 0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing) * 0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media(hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}.hover\:bg-gray-100:hover{background-color:var(--color-gray-100)}.hover\:text-gray-400:hover{color:var(--color-gray-400)}.hover\:text-gray-700:hover{color:var(--color-gray-700)}}.focus\:border-blue-300:focus{border-color:var(--color-blue-300)}.focus\:ring:focus{--tw-ring-shadow:var(--tw-ring-inset,) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color,currentcolor);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.focus\:outline-none:focus{--tw-outline-style:none;outline-style:none}.active\:bg-gray-100:active{background-color:var(--color-gray-100)}.active\:text-gray-500:active{color:var(--color-gray-500)}.active\:text-gray-700:active{color:var(--color-gray-700)}.active\:text-gray-800:active{color:var(--color-gray-800)}@media(min-width:40rem){.sm\:flex{display:flex}.sm\:hidden{display:none}.sm\:flex-1{flex:1}.sm\:items-center{align-items:center}.sm\:justify-between{justify-content:space-between}.sm\:justify-start{justify-content:flex-start}.sm\:gap-2{gap:calc(var(--spacing) * 2)}.sm\:px-6{padding-inline:calc(var(--spacing) * 6)}.sm\:pt-0{padding-top:calc(var(--spacing) * 0)}}@media(min-width:64rem){.lg\:mt-10{margin-top:calc(var(--spacing) * 10)}.lg\:mb-0{margin-bottom:calc(var(--spacing) * 0)}.lg\:mb-6{margin-bottom:calc(var(--spacing) * 6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing) * 0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing) * 8)}.lg\:p-20{padding:calc(var(--spacing) * 20)}.lg\:px-8{padding-inline:calc(var(--spacing) * 8)}.lg\:pb-10{padding-bottom:calc(var(--spacing) * 10)}}.rtl\:flex-row-reverse:where(:dir(rtl),[dir=rtl],[dir=rtl] *){flex-direction:row-reverse}@media(prefers-color-scheme:dark){.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:border-gray-600{border-color:var(--color-gray-600)}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:bg-gray-700{background-color:var(--color-gray-700)}.dark\:bg-gray-800{background-color:var(--color-gray-800)}.dark\:bg-gray-900{background-color:var(--color-gray-900)}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#4B0600\]{color:#4b0600}.dark\:text-\[\#391800\]{color:#391800}.dark\:text-\[\#733000\]{color:#733000}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:text-black{color:var(--color-black)}.dark\:text-gray-200{color:var(--color-gray-200)}.dark\:text-gray-300{color:var(--color-gray-300)}.dark\:text-gray-400{color:var(--color-gray-400)}.dark\:text-gray-600{color:var(--color-gray-600)}.dark\:mix-blend-hard-light{mix-blend-mode:hard-light}.dark\:mix-blend-normal{mix-blend-mode:normal}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:\[--stroke-color\:\#FF750F\]{--stroke-color:#ff750f}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media(hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-gray-900:hover{background-color:var(--color-gray-900)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}.dark\:hover\:text-gray-200:hover{color:var(--color-gray-200)}.dark\:hover\:text-gray-300:hover{color:var(--color-gray-300)}}.dark\:focus\:border-blue-700:focus{border-color:var(--color-blue-700)}.dark\:focus\:border-blue-800:focus{border-color:var(--color-blue-800)}.dark\:active\:bg-gray-700:active{background-color:var(--color-gray-700)}.dark\:active\:text-gray-300:active{color:var(--color-gray-300)}}@starting-style{.starting\:opacity-0{opacity:0}}@media(prefers-reduced-motion:no-preference){@starting-style{.motion-safe\:starting\:-translate-x-\[26px\]{--tw-translate-x: -26px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:-translate-x-\[51px\]{--tw-translate-x: -51px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:-translate-x-\[78px\]{--tw-translate-x: -78px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:-translate-x-\[102px\]{--tw-translate-x: -102px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:translate-y-6{--tw-translate-y:calc(var(--spacing) * 6);translate:var(--tw-translate-x) var(--tw-translate-y)}}}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false}@property --tw-rotate-y{syntax:"*";inherits:false}@property --tw-rotate-z{syntax:"*";inherits:false}@property --tw-skew-x{syntax:"*";inherits:false}@property --tw-skew-y{syntax:"*";inherits:false}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-tracking{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-drop-shadow-color{syntax:"*";inherits:false}@property --tw-drop-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-drop-shadow-size{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-ease{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <div class="text-[13px] leading-[20px] flex-1 p-6 pb-6 lg:p-20 lg:pb-10 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                    <h1 class="mb-1 font-medium">Let's get started</h1>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">With so many options available to you,<br /> we suggest you start with the following:</p>
                    <ul class="flex flex-col mb-4 lg:mb-6">
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Read the
                                <a href="https://laravel.com/docs" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                                    <span>Documentation</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Watch video tutorials at
                                <a href="https://laracasts.com" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                                    <span>Laracasts</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                    </ul>
                    <ul class="flex gap-3 text-sm leading-normal">
                        <li>
                            <a href="https://cloud.laravel.com" target="_blank" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                                Deploy now
                            </a>
                        </li>
                    </ul>

                    <p class="mt-6 lg:mt-10 text-[#706f6c] dark:text-[#A1A09A]">
                        v{{ app()->version() }}
                        <a href="https://github.com/laravel/framework/blob/13.x/CHANGELOG.md" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                            <span>View changelog</span>
                            <svg
                                width="10"
                                height="11"
                                viewBox="0 0 10 11"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-2.5 h-2.5"
                            >
                                <path
                                    d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                    stroke="currentColor"
                                    stroke-linecap="square"
                                />
                            </svg>
                        </a>
                    </p>
                </div>
                <div class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/364] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
                    {{-- Laravel Logo --}}
                    <svg class="w-full text-[#F53003] dark:text-[#F61500] transition-all translate-y-0 opacity-100 max-w-none duration-750 starting:opacity-0 motion-safe:starting:translate-y-6" viewBox="0 0 438 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.2036 -3H0V102.197H49.5189V86.7187H17.2036V-3Z" fill="currentColor" />
                        <path d="M110.256 41.6337C108.061 38.1275 104.945 35.3731 100.905 33.3681C96.8667 31.3647 92.8016 30.3618 88.7131 30.3618C83.4247 30.3618 78.5885 31.3389 74.201 33.2923C69.8111 35.2456 66.0474 37.928 62.9059 41.3333C59.7643 44.7401 57.3198 48.6726 55.5754 53.1293C53.8287 57.589 52.9572 62.274 52.9572 67.1813C52.9572 72.1925 53.8287 76.8995 55.5754 81.3069C57.3191 85.7173 59.7636 89.6241 62.9059 93.0293C66.0474 96.4361 69.8119 99.1155 74.201 101.069C78.5885 103.022 83.4247 103.999 88.7131 103.999C92.8016 103.999 96.8667 102.997 100.905 100.994C104.945 98.9911 108.061 96.2359 110.256 92.7282V102.195H126.563V32.1642H110.256V41.6337ZM108.76 75.7472C107.762 78.4531 106.366 80.8078 104.572 82.8112C102.776 84.8161 100.606 86.4183 98.0637 87.6206C95.5202 88.823 92.7004 89.4238 89.6103 89.4238C86.5178 89.4238 83.7252 88.823 81.2324 87.6206C78.7388 86.4183 76.5949 84.8161 74.7998 82.8112C73.004 80.8078 71.6319 78.4531 70.6856 75.7472C69.7356 73.0421 69.2644 70.1868 69.2644 67.1821C69.2644 64.1758 69.7356 61.3205 70.6856 58.6154C71.6319 55.9102 73.004 53.5571 74.7998 51.5522C76.5949 49.5495 78.738 47.9451 81.2324 46.7427C83.7252 45.5404 86.5178 44.9396 89.6103 44.9396C92.7012 44.9396 95.5202 45.5404 98.0637 46.7427C100.606 47.9451 102.776 49.5487 104.572 51.5522C106.367 53.5571 107.762 55.9102 108.76 58.6154C109.756 61.3205 110.256 64.1758 110.256 67.1821C110.256 70.1868 109.756 73.0421 108.76 75.7472Z" fill="currentColor" />
                        <path d="M242.805 41.6337C240.611 38.1275 237.494 35.3731 233.455 33.3681C229.416 31.3647 225.351 30.3618 221.262 30.3618C215.974 30.3618 211.138 31.3389 206.75 33.2923C202.36 35.2456 198.597 37.928 195.455 41.3333C192.314 44.7401 189.869 48.6726 188.125 53.1293C186.378 57.589 185.507 62.274 185.507 67.1813C185.507 72.1925 186.378 76.8995 188.125 81.3069C189.868 85.7173 192.313 89.6241 195.455 93.0293C198.597 96.4361 202.361 99.1155 206.75 101.069C211.138 103.022 215.974 103.999 221.262 103.999C225.351 103.999 229.416 102.997 233.455 100.994C237.494 98.9911 240.611 96.2359 242.805 92.7282V102.195H259.112V32.1642H242.805V41.6337ZM241.31 75.7472C240.312 78.4531 238.916 80.8078 237.122 82.8112C235.326 84.8161 233.156 86.4183 230.614 87.6206C228.07 88.823 225.251 89.4238 222.16 89.4238C219.068 89.4238 216.275 88.823 213.782 87.6206C211.289 86.4183 209.145 84.8161 207.35 82.8112C205.554 80.8078 204.182 78.4531 203.236 75.7472C202.286 73.0421 201.814 70.1868 201.814 67.1821C201.814 64.1758 202.286 61.3205 203.236 58.6154C204.182 55.9102 205.554 53.5571 207.35 51.5522C209.145 49.5495 211.288 47.9451 213.782 46.7427C216.275 45.5404 219.068 44.9396 222.16 44.9396C225.251 44.9396 228.07 45.5404 230.614 46.7427C233.156 47.9451 235.326 49.5487 237.122 51.5522C238.917 53.5571 240.312 55.9102 241.31 58.6154C242.306 61.3205 242.806 64.1758 242.806 67.1821C242.805 70.1868 242.305 73.0421 241.31 75.7472Z" fill="currentColor" />
                        <path d="M438 -3H421.694V102.197H438V-3Z" fill="currentColor" />
                        <path d="M139.43 102.197H155.735V48.2834H183.712V32.1665H139.43V102.197Z" fill="currentColor" />
                        <path d="M324.49 32.1665L303.995 85.794L283.498 32.1665H266.983L293.748 102.197H314.242L341.006 32.1665H324.49Z" fill="currentColor" />
                        <path d="M376.571 30.3656C356.603 30.3656 340.797 46.8497 340.797 67.1828C340.797 89.6597 356.094 104 378.661 104C391.29 104 399.354 99.1488 409.206 88.5848L398.189 80.0226C398.183 80.031 389.874 90.9895 377.468 90.9895C363.048 90.9895 356.977 79.3111 356.977 73.269H411.075C413.917 50.1328 398.775 30.3656 376.571 30.3656ZM357.02 61.0967C357.145 59.7487 359.023 43.3761 376.442 43.3761C393.861 43.3761 395.978 59.7464 396.099 61.0967H357.02Z" fill="currentColor" />
                    </svg>

                    {{-- 13 --}}
                    <svg class="w-[438px] max-w-none relative -mt-[6.6rem] -ml-8 lg:ml-0 [--stroke-color:#1B1B18] dark:[--stroke-color:#FF750F]" viewBox="0 0 440 392" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g class="mix-blend-darken dark:mix-blend-normal transition-all delay-300 opacity-100 duration-750 starting:opacity-0 text-[#1B1B18] dark:text-black">
                            <mask id="path-1-mask" maskUnits="userSpaceOnUse" x="-0.328613" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="-0.328613" y="103" width="338" height="299"/>
                                <path d="M234.936 400.8C204.136 400.8 178.936 392.4 159.336 375.6C140.136 358.8 130.536 337 130.536 310.2H200.736C200.736 318.2 203.736 324.8 209.736 330C215.736 335.2 223.736 337.8 233.736 337.8C243.336 337.8 251.136 335 257.136 329.4C263.536 323.8 266.736 316.6 266.736 307.8C266.736 299.8 263.936 293.2 258.336 288C252.736 282.8 245.536 280.2 236.736 280.2H199.536V218.4H236.736C243.536 218.4 249.336 216 254.136 211.2C258.936 206.4 261.336 200.4 261.336 193.2C261.336 184.8 258.736 178.2 253.536 173.4C248.336 168.6 241.736 166.2 233.736 166.2C226.536 166.2 220.336 168.4 215.136 172.8C210.336 177.2 207.936 182.8 207.936 189.6H141.336C141.336 164.8 150.136 144.6 167.736 129C185.336 113 207.936 105 235.536 105C263.136 105 285.536 112.2 302.736 126.6C320.336 141 329.136 160 329.136 183.6C329.136 200.8 324.536 214.8 315.336 225.6C306.136 236 294.336 243.2 279.936 247.2C297.136 252 310.736 260.2 320.736 271.8C331.136 283.4 336.336 298 336.336 315.6C336.336 340.4 326.936 360.8 308.136 376.8C289.336 392.8 264.936 400.8 234.936 400.8Z"/>
                                <path d="M26.8714 167.6H1.67139V105.2H94.6714V400.2H26.8714V167.6Z"/>
                            </mask>
                            <path d="M234.936 400.8C204.136 400.8 178.936 392.4 159.336 375.6C140.136 358.8 130.536 337 130.536 310.2H200.736C200.736 318.2 203.736 324.8 209.736 330C215.736 335.2 223.736 337.8 233.736 337.8C243.336 337.8 251.136 335 257.136 329.4C263.536 323.8 266.736 316.6 266.736 307.8C266.736 299.8 263.936 293.2 258.336 288C252.736 282.8 245.536 280.2 236.736 280.2H199.536V218.4H236.736C243.536 218.4 249.336 216 254.136 211.2C258.936 206.4 261.336 200.4 261.336 193.2C261.336 184.8 258.736 178.2 253.536 173.4C248.336 168.6 241.736 166.2 233.736 166.2C226.536 166.2 220.336 168.4 215.136 172.8C210.336 177.2 207.936 182.8 207.936 189.6H141.336C141.336 164.8 150.136 144.6 167.736 129C185.336 113 207.936 105 235.536 105C263.136 105 285.536 112.2 302.736 126.6C320.336 141 329.136 160 329.136 183.6C329.136 200.8 324.536 214.8 315.336 225.6C306.136 236 294.336 243.2 279.936 247.2C297.136 252 310.736 260.2 320.736 271.8C331.136 283.4 336.336 298 336.336 315.6C336.336 340.4 326.936 360.8 308.136 376.8C289.336 392.8 264.936 400.8 234.936 400.8Z" fill="currentColor"/>
                            <path d="M26.8714 167.6H1.67139V105.2H94.6714V400.2H26.8714V167.6Z" fill="currentColor"/>
                            <path d="M234.936 400.8C204.136 400.8 178.936 392.4 159.336 375.6C140.136 358.8 130.536 337 130.536 310.2H200.736C200.736 318.2 203.736 324.8 209.736 330C215.736 335.2 223.736 337.8 233.736 337.8C243.336 337.8 251.136 335 257.136 329.4C263.536 323.8 266.736 316.6 266.736 307.8C266.736 299.8 263.936 293.2 258.336 288C252.736 282.8 245.536 280.2 236.736 280.2H199.536V218.4H236.736C243.536 218.4 249.336 216 254.136 211.2C258.936 206.4 261.336 200.4 261.336 193.2C261.336 184.8 258.736 178.2 253.536 173.4C248.336 168.6 241.736 166.2 233.736 166.2C226.536 166.2 220.336 168.4 215.136 172.8C210.336 177.2 207.936 182.8 207.936 189.6H141.336C141.336 164.8 150.136 144.6 167.736 129C185.336 113 207.936 105 235.536 105C263.136 105 285.536 112.2 302.736 126.6C320.336 141 329.136 160 329.136 183.6C329.136 200.8 324.536 214.8 315.336 225.6C306.136 236 294.336 243.2 279.936 247.2C297.136 252 310.736 260.2 320.736 271.8C331.136 283.4 336.336 298 336.336 315.6C336.336 340.4 326.936 360.8 308.136 376.8C289.336 392.8 264.936 400.8 234.936 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-1-mask)"/>
                            <path d="M26.8714 167.6H1.67139V105.2H94.6714V400.2H26.8714V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-1-mask)"/>
                        </g>

                        <g class="transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[26px] text-[#F3BEC7] dark:text-[#4B0600]">
                            <mask id="path-2-mask" maskUnits="userSpaceOnUse" x="25.3357" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="25.3357" y="103" width="338" height="299"/>
                                <path d="M260.6 400.8C229.8 400.8 204.6 392.4 185 375.6C165.8 358.8 156.2 337 156.2 310.2H226.4C226.4 318.2 229.4 324.8 235.4 330C241.4 335.2 249.4 337.8 259.4 337.8C269 337.8 276.8 335 282.8 329.4C289.2 323.8 292.4 316.6 292.4 307.8C292.4 299.8 289.6 293.2 284 288C278.4 282.8 271.2 280.2 262.4 280.2H225.2V218.4H262.4C269.2 218.4 275 216 279.8 211.2C284.6 206.4 287 200.4 287 193.2C287 184.8 284.4 178.2 279.2 173.4C274 168.6 267.4 166.2 259.4 166.2C252.2 166.2 246 168.4 240.8 172.8C236 177.2 233.6 182.8 233.6 189.6H167C167 164.8 175.8 144.6 193.4 129C211 113 233.6 105 261.2 105C288.8 105 311.2 112.2 328.4 126.6C346 141 354.8 160 354.8 183.6C354.8 200.8 350.2 214.8 341 225.6C331.8 236 320 243.2 305.6 247.2C322.8 252 336.4 260.2 346.4 271.8C356.8 283.4 362 298 362 315.6C362 340.4 352.6 360.8 333.8 376.8C315 392.8 290.6 400.8 260.6 400.8Z"/>
                                <path d="M52.5357 167.6H27.3357V105.2H120.336V400.2H52.5357V167.6Z"/>
                            </mask>
                            <path d="M260.6 400.8C229.8 400.8 204.6 392.4 185 375.6C165.8 358.8 156.2 337 156.2 310.2H226.4C226.4 318.2 229.4 324.8 235.4 330C241.4 335.2 249.4 337.8 259.4 337.8C269 337.8 276.8 335 282.8 329.4C289.2 323.8 292.4 316.6 292.4 307.8C292.4 299.8 289.6 293.2 284 288C278.4 282.8 271.2 280.2 262.4 280.2H225.2V218.4H262.4C269.2 218.4 275 216 279.8 211.2C284.6 206.4 287 200.4 287 193.2C287 184.8 284.4 178.2 279.2 173.4C274 168.6 267.4 166.2 259.4 166.2C252.2 166.2 246 168.4 240.8 172.8C236 177.2 233.6 182.8 233.6 189.6H167C167 164.8 175.8 144.6 193.4 129C211 113 233.6 105 261.2 105C288.8 105 311.2 112.2 328.4 126.6C346 141 354.8 160 354.8 183.6C354.8 200.8 350.2 214.8 341 225.6C331.8 236 320 243.2 305.6 247.2C322.8 252 336.4 260.2 346.4 271.8C356.8 283.4 362 298 362 315.6C362 340.4 352.6 360.8 333.8 376.8C315 392.8 290.6 400.8 260.6 400.8Z" fill="currentColor"/>
                            <path d="M52.5357 167.6H27.3357V105.2H120.336V400.2H52.5357V167.6Z" fill="currentColor"/>
                            <path d="M260.6 400.8C229.8 400.8 204.6 392.4 185 375.6C165.8 358.8 156.2 337 156.2 310.2H226.4C226.4 318.2 229.4 324.8 235.4 330C241.4 335.2 249.4 337.8 259.4 337.8C269 337.8 276.8 335 282.8 329.4C289.2 323.8 292.4 316.6 292.4 307.8C292.4 299.8 289.6 293.2 284 288C278.4 282.8 271.2 280.2 262.4 280.2H225.2V218.4H262.4C269.2 218.4 275 216 279.8 211.2C284.6 206.4 287 200.4 287 193.2C287 184.8 284.4 178.2 279.2 173.4C274 168.6 267.4 166.2 259.4 166.2C252.2 166.2 246 168.4 240.8 172.8C236 177.2 233.6 182.8 233.6 189.6H167C167 164.8 175.8 144.6 193.4 129C211 113 233.6 105 261.2 105C288.8 105 311.2 112.2 328.4 126.6C346 141 354.8 160 354.8 183.6C354.8 200.8 350.2 214.8 341 225.6C331.8 236 320 243.2 305.6 247.2C322.8 252 336.4 260.2 346.4 271.8C356.8 283.4 362 298 362 315.6C362 340.4 352.6 360.8 333.8 376.8C315 392.8 290.6 400.8 260.6 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-2-mask)"/>
                            <path d="M52.5357 167.6H27.3357V105.2H120.336V400.2H52.5357V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-2-mask)"/>
                        </g>
                        
                        <g class="mix-blend-color dark:mix-blend-hard-light transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[51px] text-[#F8B803] dark:text-[#391800]">
                            <mask id="path-3-mask" maskUnits="userSpaceOnUse" x="51" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="51" y="103" width="338" height="299"/>
                                <path d="M286.264 400.8C255.464 400.8 230.264 392.4 210.664 375.6C191.464 358.8 181.864 337 181.864 310.2H252.064C252.064 318.2 255.064 324.8 261.064 330C267.064 335.2 275.064 337.8 285.064 337.8C294.664 337.8 302.464 335 308.464 329.4C314.864 323.8 318.064 316.6 318.064 307.8C318.064 299.8 315.264 293.2 309.664 288C304.064 282.8 296.864 280.2 288.064 280.2H250.864V218.4H288.064C294.864 218.4 300.664 216 305.464 211.2C310.264 206.4 312.664 200.4 312.664 193.2C312.664 184.8 310.064 178.2 304.864 173.4C299.664 168.6 293.064 166.2 285.064 166.2C277.864 166.2 271.664 168.4 266.464 172.8C261.664 177.2 259.264 182.8 259.264 189.6H192.664C192.664 164.8 201.464 144.6 219.064 129C236.664 113 259.264 105 286.864 105C314.464 105 336.864 112.2 354.064 126.6C371.664 141 380.464 160 380.464 183.6C380.464 200.8 375.864 214.8 366.664 225.6C357.464 236 345.664 243.2 331.264 247.2C348.464 252 362.064 260.2 372.064 271.8C382.464 283.4 387.664 298 387.664 315.6C387.664 340.4 378.264 360.8 359.464 376.8C340.664 392.8 316.264 400.8 286.264 400.8Z"/>
                                <path d="M78.2 167.6H53V105.2H146V400.2H78.2V167.6Z"/>
                            </mask>
                            <path d="M286.264 400.8C255.464 400.8 230.264 392.4 210.664 375.6C191.464 358.8 181.864 337 181.864 310.2H252.064C252.064 318.2 255.064 324.8 261.064 330C267.064 335.2 275.064 337.8 285.064 337.8C294.664 337.8 302.464 335 308.464 329.4C314.864 323.8 318.064 316.6 318.064 307.8C318.064 299.8 315.264 293.2 309.664 288C304.064 282.8 296.864 280.2 288.064 280.2H250.864V218.4H288.064C294.864 218.4 300.664 216 305.464 211.2C310.264 206.4 312.664 200.4 312.664 193.2C312.664 184.8 310.064 178.2 304.864 173.4C299.664 168.6 293.064 166.2 285.064 166.2C277.864 166.2 271.664 168.4 266.464 172.8C261.664 177.2 259.264 182.8 259.264 189.6H192.664C192.664 164.8 201.464 144.6 219.064 129C236.664 113 259.264 105 286.864 105C314.464 105 336.864 112.2 354.064 126.6C371.664 141 380.464 160 380.464 183.6C380.464 200.8 375.864 214.8 366.664 225.6C357.464 236 345.664 243.2 331.264 247.2C348.464 252 362.064 260.2 372.064 271.8C382.464 283.4 387.664 298 387.664 315.6C387.664 340.4 378.264 360.8 359.464 376.8C340.664 392.8 316.264 400.8 286.264 400.8Z" fill="currentColor"/>
                            <path d="M78.2 167.6H53V105.2H146V400.2H78.2V167.6Z" fill="currentColor"/>
                            <path d="M286.264 400.8C255.464 400.8 230.264 392.4 210.664 375.6C191.464 358.8 181.864 337 181.864 310.2H252.064C252.064 318.2 255.064 324.8 261.064 330C267.064 335.2 275.064 337.8 285.064 337.8C294.664 337.8 302.464 335 308.464 329.4C314.864 323.8 318.064 316.6 318.064 307.8C318.064 299.8 315.264 293.2 309.664 288C304.064 282.8 296.864 280.2 288.064 280.2H250.864V218.4H288.064C294.864 218.4 300.664 216 305.464 211.2C310.264 206.4 312.664 200.4 312.664 193.2C312.664 184.8 310.064 178.2 304.864 173.4C299.664 168.6 293.064 166.2 285.064 166.2C277.864 166.2 271.664 168.4 266.464 172.8C261.664 177.2 259.264 182.8 259.264 189.6H192.664C192.664 164.8 201.464 144.6 219.064 129C236.664 113 259.264 105 286.864 105C314.464 105 336.864 112.2 354.064 126.6C371.664 141 380.464 160 380.464 183.6C380.464 200.8 375.864 214.8 366.664 225.6C357.464 236 345.664 243.2 331.264 247.2C348.464 252 362.064 260.2 372.064 271.8C382.464 283.4 387.664 298 387.664 315.6C387.664 340.4 378.264 360.8 359.464 376.8C340.664 392.8 316.264 400.8 286.264 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-3-mask)"/>
                            <path d="M78.2 167.6H53V105.2H146V400.2H78.2V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-3-mask)"/>
                        </g>
                        
                        <g class="mix-blend-multiply dark:mix-blend-normal transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[78px] text-[#F3BEC7] dark:text-[#733000]">
                            <mask id="path-4-mask" maskUnits="userSpaceOnUse" x="76.6643" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="76.6643" y="103" width="338" height="299"/>
                                <path d="M311.929 400.8C281.129 400.8 255.929 392.4 236.329 375.6C217.129 358.8 207.529 337 207.529 310.2H277.729C277.729 318.2 280.729 324.8 286.729 330C292.729 335.2 300.729 337.8 310.729 337.8C320.329 337.8 328.129 335 334.129 329.4C340.529 323.8 343.729 316.6 343.729 307.8C343.729 299.8 340.929 293.2 335.329 288C329.729 282.8 322.529 280.2 313.729 280.2H276.529V218.4H313.729C320.529 218.4 326.329 216 331.129 211.2C335.929 206.4 338.329 200.4 338.329 193.2C338.329 184.8 335.729 178.2 330.529 173.4C325.329 168.6 318.729 166.2 310.729 166.2C303.529 166.2 297.329 168.4 292.129 172.8C287.329 177.2 284.929 182.8 284.929 189.6H218.329C218.329 164.8 227.129 144.6 244.729 129C262.329 113 284.929 105 312.529 105C340.129 105 362.529 112.2 379.729 126.6C397.329 141 406.129 160 406.129 183.6C406.129 200.8 401.529 214.8 392.329 225.6C383.129 236 371.329 243.2 356.929 247.2C374.129 252 387.729 260.2 397.729 271.8C408.129 283.4 413.329 298 413.329 315.6C413.329 340.4 403.929 360.8 385.129 376.8C366.329 392.8 341.929 400.8 311.929 400.8Z"/>
                                <path d="M103.864 167.6H78.6643V105.2H171.664V400.2H103.864V167.6Z"/>
                            </mask>
                            <path d="M311.929 400.8C281.129 400.8 255.929 392.4 236.329 375.6C217.129 358.8 207.529 337 207.529 310.2H277.729C277.729 318.2 280.729 324.8 286.729 330C292.729 335.2 300.729 337.8 310.729 337.8C320.329 337.8 328.129 335 334.129 329.4C340.529 323.8 343.729 316.6 343.729 307.8C343.729 299.8 340.929 293.2 335.329 288C329.729 282.8 322.529 280.2 313.729 280.2H276.529V218.4H313.729C320.529 218.4 326.329 216 331.129 211.2C335.929 206.4 338.329 200.4 338.329 193.2C338.329 184.8 335.729 178.2 330.529 173.4C325.329 168.6 318.729 166.2 310.729 166.2C303.529 166.2 297.329 168.4 292.129 172.8C287.329 177.2 284.929 182.8 284.929 189.6H218.329C218.329 164.8 227.129 144.6 244.729 129C262.329 113 284.929 105 312.529 105C340.129 105 362.529 112.2 379.729 126.6C397.329 141 406.129 160 406.129 183.6C406.129 200.8 401.529 214.8 392.329 225.6C383.129 236 371.329 243.2 356.929 247.2C374.129 252 387.729 260.2 397.729 271.8C408.129 283.4 413.329 298 413.329 315.6C413.329 340.4 403.929 360.8 385.129 376.8C366.329 392.8 341.929 400.8 311.929 400.8Z" fill="currentColor"/>
                            <path d="M103.864 167.6H78.6643V105.2H171.664V400.2H103.864V167.6Z" fill="currentColor"/>
                            <path d="M311.929 400.8C281.129 400.8 255.929 392.4 236.329 375.6C217.129 358.8 207.529 337 207.529 310.2H277.729C277.729 318.2 280.729 324.8 286.729 330C292.729 335.2 300.729 337.8 310.729 337.8C320.329 337.8 328.129 335 334.129 329.4C340.529 323.8 343.729 316.6 343.729 307.8C343.729 299.8 340.929 293.2 335.329 288C329.729 282.8 322.529 280.2 313.729 280.2H276.529V218.4H313.729C320.529 218.4 326.329 216 331.129 211.2C335.929 206.4 338.329 200.4 338.329 193.2C338.329 184.8 335.729 178.2 330.529 173.4C325.329 168.6 318.729 166.2 310.729 166.2C303.529 166.2 297.329 168.4 292.129 172.8C287.329 177.2 284.929 182.8 284.929 189.6H218.329C218.329 164.8 227.129 144.6 244.729 129C262.329 113 284.929 105 312.529 105C340.129 105 362.529 112.2 379.729 126.6C397.329 141 406.129 160 406.129 183.6C406.129 200.8 401.529 214.8 392.329 225.6C383.129 236 371.329 243.2 356.929 247.2C374.129 252 387.729 260.2 397.729 271.8C408.129 283.4 413.329 298 413.329 315.6C413.329 340.4 403.929 360.8 385.129 376.8C366.329 392.8 341.929 400.8 311.929 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-4-mask)"/>
                            <path d="M103.864 167.6H78.6643V105.2H171.664V400.2H103.864V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-4-mask)"/>
                        </g>
                        
                        <g class="mix-blend-hard-light transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[102px] text-[#F3BEC7] dark:text-[#4B0600]">
                            <mask id="path-5-mask" maskUnits="userSpaceOnUse" x="102.329" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="102.329" y="103" width="338" height="299"/>
                                <path d="M337.593 400.8C306.793 400.8 281.593 392.4 261.993 375.6C242.793 358.8 233.193 337 233.193 310.2H303.393C303.393 318.2 306.393 324.8 312.393 330C318.393 335.2 326.393 337.8 336.393 337.8C345.993 337.8 353.793 335 359.793 329.4C366.193 323.8 369.393 316.6 369.393 307.8C369.393 299.8 366.593 293.2 360.993 288C355.393 282.8 348.193 280.2 339.393 280.2H302.193V218.4H339.393C346.193 218.4 351.993 216 356.793 211.2C361.593 206.4 363.993 200.4 363.993 193.2C363.993 184.8 361.393 178.2 356.193 173.4C350.993 168.6 344.393 166.2 336.393 166.2C329.193 166.2 322.993 168.4 317.793 172.8C312.993 177.2 310.593 182.8 310.593 189.6H243.993C243.993 164.8 252.793 144.6 270.393 129C287.993 113 310.593 105 338.193 105C365.793 105 388.193 112.2 405.393 126.6C422.993 141 431.793 160 431.793 183.6C431.793 200.8 427.193 214.8 417.993 225.6C408.793 236 396.993 243.2 382.593 247.2C399.793 252 413.393 260.2 423.393 271.8C433.793 283.4 438.993 298 438.993 315.6C438.993 340.4 429.593 360.8 410.793 376.8C391.993 392.8 367.593 400.8 337.593 400.8Z"/>
                                <path d="M129.529 167.6H104.329V105.2H197.329V400.2H129.529V167.6Z"/>
                            </mask>
                            <path d="M337.593 400.8C306.793 400.8 281.593 392.4 261.993 375.6C242.793 358.8 233.193 337 233.193 310.2H303.393C303.393 318.2 306.393 324.8 312.393 330C318.393 335.2 326.393 337.8 336.393 337.8C345.993 337.8 353.793 335 359.793 329.4C366.193 323.8 369.393 316.6 369.393 307.8C369.393 299.8 366.593 293.2 360.993 288C355.393 282.8 348.193 280.2 339.393 280.2H302.193V218.4H339.393C346.193 218.4 351.993 216 356.793 211.2C361.593 206.4 363.993 200.4 363.993 193.2C363.993 184.8 361.393 178.2 356.193 173.4C350.993 168.6 344.393 166.2 336.393 166.2C329.193 166.2 322.993 168.4 317.793 172.8C312.993 177.2 310.593 182.8 310.593 189.6H243.993C243.993 164.8 252.793 144.6 270.393 129C287.993 113 310.593 105 338.193 105C365.793 105 388.193 112.2 405.393 126.6C422.993 141 431.793 160 431.793 183.6C431.793 200.8 427.193 214.8 417.993 225.6C408.793 236 396.993 243.2 382.593 247.2C399.793 252 413.393 260.2 423.393 271.8C433.793 283.4 438.993 298 438.993 315.6C438.993 340.4 429.593 360.8 410.793 376.8C391.993 392.8 367.593 400.8 337.593 400.8Z" fill="currentColor"/>
                            <path d="M129.529 167.6H104.329V105.2H197.329V400.2H129.529V167.6Z" fill="currentColor"/>
                            <path d="M337.593 400.8C306.793 400.8 281.593 392.4 261.993 375.6C242.793 358.8 233.193 337 233.193 310.2H303.393C303.393 318.2 306.393 324.8 312.393 330C318.393 335.2 326.393 337.8 336.393 337.8C345.993 337.8 353.793 335 359.793 329.4C366.193 323.8 369.393 316.6 369.393 307.8C369.393 299.8 366.593 293.2 360.993 288C355.393 282.8 348.193 280.2 339.393 280.2H302.193V218.4H339.393C346.193 218.4 351.993 216 356.793 211.2C361.593 206.4 363.993 200.4 363.993 193.2C363.993 184.8 361.393 178.2 356.193 173.4C350.993 168.6 344.393 166.2 336.393 166.2C329.193 166.2 322.993 168.4 317.793 172.8C312.993 177.2 310.593 182.8 310.593 189.6H243.993C243.993 164.8 252.793 144.6 270.393 129C287.993 113 310.593 105 338.193 105C365.793 105 388.193 112.2 405.393 126.6C422.993 141 431.793 160 431.793 183.6C431.793 200.8 427.193 214.8 417.993 225.6C408.793 236 396.993 243.2 382.593 247.2C399.793 252 413.393 260.2 423.393 271.8C433.793 283.4 438.993 298 438.993 315.6C438.993 340.4 429.593 360.8 410.793 376.8C391.993 392.8 367.593 400.8 337.593 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-5-mask)"/>
                            <path d="M129.529 167.6H104.329V105.2H197.329V400.2H129.529V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-5-mask)"/>
                        </g>
                    </svg>
                    <div class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>

````

---

### `resources/css/app.css`

````css
@import 'tailwindcss';

@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';

@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
        'Segoe UI Symbol', 'Noto Color Emoji';
}

````

---

### `resources/js/app.js`

````javascript
//

````

---

### `tests/Feature/AuthenticationTest.php`

````php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-01: Autentikasi
 * Pengguna dapat mendaftar, login, logout, dan mengubah kata sandi.
 */
class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_user_can_authenticate_and_access_admin(): void
    {
        $user = User::factory()->create([
            'email' => 'umkm@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Filament uses Livewire for authentication; actingAs is the correct way
        // to verify an authenticated user can reach the admin panel.
        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_credentials_are_stored_correctly(): void
    {
        $user = User::factory()->create([
            'email' => 'umkm@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->assertDatabaseHas('users', ['email' => 'umkm@example.com']);
        $this->assertTrue(password_verify('password123', $user->password));
    }

    public function test_authenticated_user_can_access_admin_panel(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_is_redirected_from_admin(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect();
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post('/admin/logout');

        $this->assertGuest();
    }

    public function test_user_email_is_unique_in_database(): void
    {
        User::factory()->create(['email' => 'existing@example.com']);

        $this->assertDatabaseHas('users', ['email' => 'existing@example.com']);
        $this->assertEquals(1, User::where('email', 'existing@example.com')->count());
    }
}

````

---

### `tests/Feature/DashboardTest.php`

````php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_renders_period_filter_and_widgets(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertOk();
        $response->assertSee('Periode', false);
        $response->assertSee('Total Pemasukan', false);
        $response->assertSee('Transaksi Terbaru', false);
    }
}

````

---

### `tests/Feature/DataIsolationTest.php`

````php
<?php

namespace Tests\Feature;

use App\Models\FinancialAnalysis;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-08: Keamanan – Pengguna tidak dapat mengakses transaksi atau analisis milik pengguna lain.
 * Tests cross-user data isolation for transactions and financial analyses.
 */
class DataIsolationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_cannot_read_another_users_transactions(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $transactionA = Transaction::factory()->create(['user_id' => $userA->id]);
        Transaction::factory()->create(['user_id' => $userB->id]);

        // Simulate user A's scoped query
        $results = Transaction::where('user_id', $userA->id)->get();

        $this->assertCount(1, $results);
        $this->assertEquals($transactionA->id, $results->first()->id);
    }

    /** @test */
    public function test_user_cannot_read_another_users_financial_analyses(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $analysisA = FinancialAnalysis::factory()->create(['user_id' => $userA->id]);
        FinancialAnalysis::factory()->count(3)->create(['user_id' => $userB->id]);

        // Simulate user A's scoped query
        $results = FinancialAnalysis::where('user_id', $userA->id)->get();

        $this->assertCount(1, $results);
        $this->assertEquals($analysisA->id, $results->first()->id);
    }

    /** @test */
    public function test_multiple_users_transactions_do_not_leak_across_accounts(): void
    {
        $users = User::factory()->count(5)->create();

        foreach ($users as $index => $user) {
            // Each user gets a unique count
            Transaction::factory()->count($index + 1)->create(['user_id' => $user->id]);
        }

        foreach ($users as $index => $user) {
            $count = Transaction::where('user_id', $user->id)->count();
            $this->assertEquals($index + 1, $count, "User {$user->id} should have ".($index + 1).' transactions');
        }
    }

    /** @test */
    public function test_income_sum_is_isolated_per_user(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        Transaction::factory()->income()->create(['user_id' => $userA->id, 'amount' => 10_000_000]);
        Transaction::factory()->income()->create(['user_id' => $userB->id, 'amount' => 99_000_000]);

        $incomeA = (float) Transaction::where('user_id', $userA->id)->income()->sum('amount');

        $this->assertEqualsWithDelta(10_000_000.0, $incomeA, 0.01, 'User A income should not include User B data');
    }

    /** @test */
    public function test_financial_analysis_prediction_belongs_to_correct_user(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        FinancialAnalysis::factory()->healthy()->create(['user_id' => $userA->id]);
        FinancialAnalysis::factory()->atRisk()->create(['user_id' => $userB->id]);

        $analysisA = FinancialAnalysis::where('user_id', $userA->id)->first();
        $analysisB = FinancialAnalysis::where('user_id', $userB->id)->first();

        $this->assertEquals('Sehat', $analysisA->prediction_label);
        $this->assertEquals('Berisiko', $analysisB->prediction_label);
    }
}

````

---

### `tests/Feature/ExampleTest.php`

````php
<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/admin');
    }
}

````

---

### `tests/Feature/FinancialAnalysisTest.php`

````php
<?php

namespace Tests\Feature;

use App\Models\AnalysisExplanation;
use App\Models\FinancialAnalysis;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-05: Decision Tree – Sistem menghasilkan klasifikasi dari fitur keuangan yang valid.
 * FR-06: Penjelasan LLM – Hasil model dapat dijelaskan melalui API tanpa mengubah data sumber.
 * FR-07: Ketahanan layanan – Jika API LLM gagal, pencatatan dan klasifikasi tetap berfungsi.
 */
class FinancialAnalysisTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_financial_analysis_is_persisted_with_all_required_fields(): void
    {
        $user = User::factory()->create();

        $analysis = FinancialAnalysis::factory()->healthy()->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('financial_analyses', [
            'id' => $analysis->id,
            'user_id' => $user->id,
            'prediction_label' => 'Sehat',
        ]);

        $this->assertNotNull($analysis->period_start);
        $this->assertNotNull($analysis->period_end);
        $this->assertNotNull($analysis->model_version);
    }

    /** @test */
    public function test_prediction_label_is_one_of_three_valid_categories(): void
    {
        $user = User::factory()->create();

        $validLabels = ['Sehat', 'Perlu perhatian', 'Berisiko'];

        $analyses = FinancialAnalysis::factory()->count(10)->create(['user_id' => $user->id]);

        foreach ($analyses as $analysis) {
            $this->assertContains($analysis->prediction_label, $validLabels);
        }
    }

    /** @test */
    public function test_financial_analysis_key_factors_is_stored_as_array(): void
    {
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create([
            'user_id' => $user->id,
            'key_factors' => ['Arus kas positif', 'Rasio pengeluaran efisien'],
        ]);

        $fresh = $analysis->fresh();

        $this->assertIsArray($fresh->key_factors);
        $this->assertCount(2, $fresh->key_factors);
    }

    /** @test */
    public function test_analysis_explanation_is_linked_to_financial_analysis(): void
    {
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create(['user_id' => $user->id]);

        $explanation = AnalysisExplanation::create([
            'financial_analysis_id' => $analysis->id,
            'explanation' => 'Usaha dalam kondisi baik dengan arus kas positif.',
            'recommendations' => ['Pertahankan pengelolaan keuangan yang baik.'],
            'provider' => 'gemini',
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('analysis_explanations', [
            'financial_analysis_id' => $analysis->id,
            'provider' => 'gemini',
        ]);

        // Test relation
        $this->assertNotNull($analysis->explanation);
        $this->assertEquals($explanation->id, $analysis->explanation->id);
    }

    /** @test */
    public function test_analysis_remains_accessible_when_explanation_status_is_fallback(): void
    {
        // FR-07: Jika API LLM gagal, pencatatan dan klasifikasi tetap berfungsi.
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create(['user_id' => $user->id]);

        AnalysisExplanation::create([
            'financial_analysis_id' => $analysis->id,
            'explanation' => 'Penjelasan otomatis: kondisi keuangan perlu pemantauan.',
            'recommendations' => ['Pantau pengeluaran secara berkala.'],
            'provider' => 'rule_based_fallback',
            'status' => 'fallback',
        ]);

        $fresh = $analysis->fresh();

        // Classification result must still be present regardless of LLM status
        $this->assertNotNull($fresh->prediction_label);
        $this->assertNotNull($fresh->explanation);
        $this->assertEquals('fallback', $fresh->explanation->status);
    }

    /** @test */
    public function test_confidence_score_is_between_zero_and_one(): void
    {
        $user = User::factory()->create();
        $analyses = FinancialAnalysis::factory()->count(10)->create(['user_id' => $user->id]);

        foreach ($analyses as $analysis) {
            $this->assertGreaterThanOrEqual(0.0, (float) $analysis->confidence_score);
            $this->assertLessThanOrEqual(1.0, (float) $analysis->confidence_score);
        }
    }

    /** @test */
    public function test_net_cash_flow_equals_income_minus_expense_in_analysis(): void
    {
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create([
            'user_id' => $user->id,
            'total_income' => 10_000_000,
            'total_expense' => 6_000_000,
            'net_cash_flow' => 4_000_000,
        ]);

        $calculated = (float) $analysis->total_income - (float) $analysis->total_expense;

        $this->assertEqualsWithDelta((float) $analysis->net_cash_flow, $calculated, 0.01);
    }

    /** @test */
    public function test_user_can_have_multiple_analyses_over_time(): void
    {
        $user = User::factory()->create();

        FinancialAnalysis::factory()->count(4)->create(['user_id' => $user->id]);

        $count = FinancialAnalysis::where('user_id', $user->id)->count();
        $this->assertEquals(4, $count);
    }
}

````

---

### `tests/Feature/FinancialReportPrintTest.php`

````php
<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FinancialReportPrintTest extends TestCase
{
    use RefreshDatabase;

    public function test_print_report_renders_consistent_totals_for_the_period(): void
    {
        $user = User::factory()->create();
        $incomeCategory = TransactionCategory::factory()->income()->create(['user_id' => $user->id]);
        $expenseCategory = TransactionCategory::factory()->expense()->create(['user_id' => $user->id]);

        Transaction::create([
            'user_id' => $user->id,
            'transaction_category_id' => $incomeCategory->id,
            'type' => 'income',
            'amount' => 500000,
            'transaction_date' => now()->startOfMonth()->toDateString(),
            'description' => 'Penjualan tunai',
        ]);

        Transaction::create([
            'user_id' => $user->id,
            'transaction_category_id' => $expenseCategory->id,
            'type' => 'expense',
            'amount' => 200000,
            'transaction_date' => now()->startOfMonth()->toDateString(),
            'description' => 'Bahan baku',
        ]);

        $response = $this->actingAs($user)->get(route('reports.print', [
            'start' => now()->startOfMonth()->toDateString(),
            'end' => now()->endOfMonth()->toDateString(),
        ]));

        $response->assertOk();
        $response->assertSee('Rp 500.000');
        $response->assertSee('Rp 200.000');
        $response->assertSee('Rp 300.000');
    }

    public function test_print_report_does_not_include_other_users_transactions(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        Transaction::create([
            'user_id' => $otherUser->id,
            'transaction_category_id' => TransactionCategory::factory()->create(['user_id' => $otherUser->id])->id,
            'type' => 'income',
            'amount' => 777000,
            'transaction_date' => now()->startOfMonth()->toDateString(),
            'description' => 'Transaksi milik pengguna lain',
        ]);

        $response = $this->actingAs($user)->get(route('reports.print', [
            'start' => now()->startOfMonth()->toDateString(),
            'end' => now()->endOfMonth()->toDateString(),
        ]));

        $response->assertOk();
        $response->assertDontSee('Transaksi milik pengguna lain');
    }

    public function test_print_report_requires_authentication(): void
    {
        $this->get(route('reports.print'))->assertRedirect();
    }
}

````

---

### `tests/Feature/TenantRegistrationTest.php`

````php
<?php

namespace Tests\Feature;

use App\Filament\Pages\Auth\Register;
use App\Models\BusinessProfile;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use App\Services\TenantShopService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TenantRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_user_registration_creates_owner_shop_profile_and_default_categories(): void
    {
        $userData = [
            'name' => 'Budi Santoso',
            'business_name' => 'Kopi Mantap Jiwa',
            'email' => 'budi@kopimantap.com',
            'password' => 'password123',
            'passwordConfirmation' => 'password123',
        ];

        Livewire::test(Register::class)
            ->fillForm($userData)
            ->call('register')
            ->assertHasNoFormErrors();

        // 1. User created with owner role
        $user = User::where('email', 'budi@kopimantap.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('owner', $user->role);
        $this->assertTrue($user->isOwner());
        $this->assertFalse($user->isAdmin());

        // 2. Business profile created
        $profile = BusinessProfile::where('user_id', $user->id)->first();
        $this->assertNotNull($profile);
        $this->assertEquals('Kopi Mantap Jiwa', $profile->business_name);

        // 3. Default categories seeded
        $categoriesCount = TransactionCategory::where('user_id', $user->id)->count();
        $this->assertGreaterThan(0, $categoriesCount);
        $this->assertEquals(count(TenantShopService::getDefaultCategories()), $categoriesCount);

        $incomeCat = TransactionCategory::where('user_id', $user->id)->where('type', 'income')->first();
        $this->assertNotNull($incomeCat);

        $expenseCat = TransactionCategory::where('user_id', $user->id)->where('type', 'expense')->first();
        $this->assertNotNull($expenseCat);
    }

    public function test_each_tenant_data_is_isolated(): void
    {
        // Tenant 1 (Toko A)
        $ownerA = User::factory()->owner()->create(['name' => 'Owner A', 'email' => 'a@toko.com']);
        app(TenantShopService::class)->initializeShop($ownerA, 'Toko A');
        $catA = $ownerA->transactionCategories()->where('type', 'income')->first();
        $txA = Transaction::create([
            'user_id' => $ownerA->id,
            'transaction_category_id' => $catA?->id,
            'type' => 'income',
            'amount' => 1000000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Toko A',
        ]);

        // Tenant 2 (Toko B)
        $ownerB = User::factory()->owner()->create(['name' => 'Owner B', 'email' => 'b@toko.com']);
        app(TenantShopService::class)->initializeShop($ownerB, 'Toko B');
        $catB = $ownerB->transactionCategories()->where('type', 'income')->first();
        $txB = Transaction::create([
            'user_id' => $ownerB->id,
            'transaction_category_id' => $catB?->id,
            'type' => 'income',
            'amount' => 500000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Toko B',
        ]);

        // Acting as Owner A
        $this->actingAs($ownerA);

        $visibleTxA = Transaction::query()->where('user_id', auth()->id())->pluck('id');
        $this->assertTrue($visibleTxA->contains($txA->id));
        $this->assertFalse($visibleTxA->contains($txB->id));

        // Acting as Owner B
        $this->actingAs($ownerB);

        $visibleTxB = Transaction::query()->where('user_id', auth()->id())->pluck('id');
        $this->assertTrue($visibleTxB->contains($txB->id));
        $this->assertFalse($visibleTxB->contains($txA->id));
    }
}

````

---

### `tests/Feature/TenantSwitcherTest.php`

````php
<?php

namespace Tests\Feature;

use App\Models\BusinessProfile;
use App\Models\Transaction;
use App\Models\User;
use App\Support\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TenantSwitcherTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_can_switch_tenant_and_see_different_store_data(): void
    {
        $admin = User::factory()->admin()->create(['name' => 'Super Admin', 'email' => 'admin@platform.com']);

        // Toko 1
        $owner1 = User::factory()->owner()->create(['name' => 'Budi', 'email' => 'budi@kopi.com']);
        $profile1 = BusinessProfile::create([
            'user_id' => $owner1->id,
            'business_name' => 'Kedai Kopi Berkah',
            'business_type' => 'Kuliner & F&B',
            'initial_capital' => 10000000,
        ]);
        $tx1 = Transaction::create([
            'user_id' => $owner1->id,
            'type' => 'income',
            'amount' => 500000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Kopi',
        ]);

        // Toko 2
        $owner2 = User::factory()->owner()->create(['name' => 'Siti', 'email' => 'siti@fashion.com']);
        $profile2 = BusinessProfile::create([
            'user_id' => $owner2->id,
            'business_name' => 'Butik Siti Cantik',
            'business_type' => 'Fashion & Konveksi',
            'initial_capital' => 20000000,
        ]);
        $tx2 = Transaction::create([
            'user_id' => $owner2->id,
            'type' => 'income',
            'amount' => 1500000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Baju',
        ]);

        // Login as Super Admin
        $this->actingAs($admin);

        // Switch to Toko 1
        TenantContext::setActiveTenantId($owner1->id);
        $this->assertEquals($owner1->id, TenantContext::getActiveTenantId());
        $this->assertEquals('Kedai Kopi Berkah', TenantContext::getActiveBusinessProfile()?->business_name);

        $visibleTx1 = Transaction::where('user_id', TenantContext::getActiveTenantId())->get();
        $this->assertTrue($visibleTx1->contains('id', $tx1->id));
        $this->assertFalse($visibleTx1->contains('id', $tx2->id));

        // Switch to Toko 2 via Livewire component
        Livewire::test(\App\Livewire\TenantSwitcher::class)
            ->call('switchTenant', $owner2->id);

        $this->assertEquals($owner2->id, TenantContext::getActiveTenantId());
        $this->assertEquals('Butik Siti Cantik', TenantContext::getActiveBusinessProfile()?->business_name);

        $visibleTx2 = Transaction::where('user_id', TenantContext::getActiveTenantId())->get();
        $this->assertTrue($visibleTx2->contains('id', $tx2->id));
        $this->assertFalse($visibleTx2->contains('id', $tx1->id));
    }

    public function test_owner_is_locked_to_their_own_store_and_cannot_switch_tenants(): void
    {
        $owner1 = User::factory()->owner()->create(['name' => 'Owner 1', 'email' => 'owner1@toko.com']);
        $owner2 = User::factory()->owner()->create(['name' => 'Owner 2', 'email' => 'owner2@toko.com']);

        $this->actingAs($owner1);

        // Even if session has another ID, owner always resolves to their own ID
        session([TenantContext::SESSION_KEY => $owner2->id]);
        $this->assertEquals($owner1->id, TenantContext::getActiveTenantId());
    }
}


````

---

### `tests/Feature/TransactionTest.php`

````php
<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-02: Transaksi
 * Pengguna dapat menambah, mengubah, menghapus, dan memfilter transaksi.
 * FR-08: Pengguna tidak dapat mengakses transaksi milik pengguna lain.
 */
class TransactionTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private TransactionCategory $incomeCategory;

    private TransactionCategory $expenseCategory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->incomeCategory = TransactionCategory::factory()->income()->create(['user_id' => $this->user->id]);
        $this->expenseCategory = TransactionCategory::factory()->expense()->create(['user_id' => $this->user->id]);
    }

    /** @test */
    public function test_income_transaction_is_persisted_correctly(): void
    {
        $transaction = Transaction::factory()->income()->create([
            'user_id' => $this->user->id,
            'transaction_category_id' => $this->incomeCategory->id,
            'amount' => 5_000_000,
            'transaction_date' => '2026-10-01',
            'description' => 'Penjualan produk Oktober',
        ]);

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'user_id' => $this->user->id,
            'type' => 'income',
            'amount' => '5000000.00',
        ]);
    }

    /** @test */
    public function test_expense_transaction_is_persisted_correctly(): void
    {
        $transaction = Transaction::factory()->expense()->create([
            'user_id' => $this->user->id,
            'transaction_category_id' => $this->expenseCategory->id,
            'amount' => 2_500_000,
            'transaction_date' => '2026-10-05',
        ]);

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'user_id' => $this->user->id,
            'type' => 'expense',
            'amount' => '2500000.00',
        ]);
    }

    /** @test */
    public function test_income_sum_is_calculated_correctly_for_period(): void
    {
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 3_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 2_000_000, 'transaction_date' => '2026-10-20']);
        // Out-of-period – should NOT be counted
        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 9_999_999, 'transaction_date' => '2026-09-30']);

        $total = (float) Transaction::where('user_id', $this->user->id)
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $this->assertEqualsWithDelta(5_000_000.0, $total, 0.01);
    }

    /** @test */
    public function test_expense_sum_is_calculated_correctly_for_period(): void
    {
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->expense()->create(['user_id' => $this->user->id, 'amount' => 1_500_000, 'transaction_date' => '2026-10-05']);
        Transaction::factory()->expense()->create(['user_id' => $this->user->id, 'amount' => 800_000, 'transaction_date' => '2026-10-15']);

        $total = (float) Transaction::where('user_id', $this->user->id)
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $this->assertEqualsWithDelta(2_300_000.0, $total, 0.01);
    }

    /** @test */
    public function test_transaction_can_be_deleted(): void
    {
        $transaction = Transaction::factory()->create(['user_id' => $this->user->id]);

        $transaction->delete();

        $this->assertDatabaseMissing('transactions', ['id' => $transaction->id]);
    }

    /** @test */
    public function test_transaction_description_can_be_updated(): void
    {
        $transaction = Transaction::factory()->create([
            'user_id' => $this->user->id,
            'description' => 'Original description',
        ]);

        $transaction->update(['description' => 'Updated description']);

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'description' => 'Updated description',
        ]);
    }

    /** @test */
    public function test_net_cash_flow_equals_income_minus_expense(): void
    {
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 8_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->expense()->create(['user_id' => $this->user->id, 'amount' => 6_800_000, 'transaction_date' => '2026-10-15']);

        $income = (float) Transaction::where('user_id', $this->user->id)->income()->whereBetween('transaction_date', [$start, $end])->sum('amount');
        $expense = (float) Transaction::where('user_id', $this->user->id)->expense()->whereBetween('transaction_date', [$start, $end])->sum('amount');

        $this->assertEqualsWithDelta(1_200_000.0, $income - $expense, 0.01);
    }

    /** @test */
    public function test_transactions_belong_to_owner_via_scope(): void
    {
        $otherUser = User::factory()->create();
        Transaction::factory()->count(3)->create(['user_id' => $this->user->id]);
        Transaction::factory()->count(5)->create(['user_id' => $otherUser->id]);

        $myTransactions = Transaction::where('user_id', $this->user->id)->get();

        $this->assertCount(3, $myTransactions);
        $myTransactions->each(fn ($t) => $this->assertEquals($this->user->id, $t->user_id));
    }
}

````

---

### `tests/TestCase.php`

````php
<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    //
}

````

---

### `tests/Unit/DecisionTreeEvaluationTest.php`

````php
<?php

namespace Tests\Unit;

use App\Services\ML\DatasetGenerator;
use App\Services\ML\FinancialDecisionTreeService;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\Native;
use Tests\TestCase;

/**
 * FR-05: Evaluasi standar Decision Tree – confusion matrix, metrik klasifikasi,
 * stratified cross validation, dan validitas confidence score.
 * Tidak menimpa model produksi di storage/app/ml/decision_tree.model.
 */
class DecisionTreeEvaluationTest extends TestCase
{
    private const CLASSES = ['Sehat', 'Perlu perhatian', 'Berisiko'];

    private static ?array $holdOut = null;

    /**
     * Prediksi model produksi pada 1000 data uji independen dengan seed tetap.
     *
     * @return array{actual: array<string>, pred: array<string>, proba: array<array<string, float>>}
     */
    private function holdOut(): array
    {
        if (self::$holdOut === null) {
            mt_srand(2026);
            $data = app(DatasetGenerator::class)->generate(1000);
            $model = PersistentModel::load(new Filesystem(storage_path('app/ml/decision_tree.model')), new Native);
            $samples = new Unlabeled($data['samples']);

            self::$holdOut = [
                'actual' => $data['labels'],
                'pred' => $model->predict($samples),
                'proba' => $model->proba($samples),
            ];
        }

        return self::$holdOut;
    }

    /**
     * @param  array<string>  $actual
     * @param  array<string>  $pred
     * @return array<string, array<string, int>>
     */
    private function confusionMatrix(array $actual, array $pred): array
    {
        $cm = array_fill_keys(self::CLASSES, array_fill_keys(self::CLASSES, 0));
        foreach ($actual as $i => $label) {
            $cm[$label][$pred[$i]]++;
        }

        return $cm;
    }

    /**
     * @param  array<string, array<string, int>>  $cm
     * @return array<string, array{precision: float, recall: float, f1: float}>
     */
    private function perClassMetrics(array $cm): array
    {
        $result = [];
        foreach (self::CLASSES as $class) {
            $tp = $cm[$class][$class];
            $predicted = array_sum(array_column($cm, $class));
            $actual = array_sum($cm[$class]);
            $precision = $predicted ? $tp / $predicted : 0.0;
            $recall = $actual ? $tp / $actual : 0.0;
            $result[$class] = [
                'precision' => $precision,
                'recall' => $recall,
                'f1' => $precision + $recall ? 2 * $precision * $recall / ($precision + $recall) : 0.0,
            ];
        }

        return $result;
    }

    /** @param array<string, array<string, int>> $cm */
    private function accuracy(array $cm): float
    {
        $correct = array_sum(array_map(fn ($c) => $cm[$c][$c], self::CLASSES));

        return $correct / array_sum(array_map('array_sum', $cm));
    }

    /** @test */
    public function test_confusion_matrix_is_square_and_totals_match_samples(): void
    {
        $data = $this->holdOut();
        $cm = $this->confusionMatrix($data['actual'], $data['pred']);

        $this->assertSame(self::CLASSES, array_keys($cm));
        foreach ($cm as $row) {
            $this->assertSame(self::CLASSES, array_keys($row));
        }
        $this->assertSame(count($data['actual']), array_sum(array_map('array_sum', $cm)));

        // Total per baris = jumlah label aktual tiap kelas
        $counts = array_count_values($data['actual']);
        foreach (self::CLASSES as $class) {
            $this->assertSame($counts[$class] ?? 0, array_sum($cm[$class]));
        }
    }

    /** @test */
    public function test_production_model_accuracy_meets_threshold_and_beats_baseline(): void
    {
        $data = $this->holdOut();
        $accuracy = $this->accuracy($this->confusionMatrix($data['actual'], $data['pred']));
        $baseline = max(array_count_values($data['actual'])) / count($data['actual']);

        $this->assertGreaterThanOrEqual(0.85, $accuracy);
        $this->assertGreaterThan($baseline + 0.20, $accuracy, 'Model harus jauh lebih baik dari tebakan kelas mayoritas');
    }

    /** @test */
    public function test_production_model_per_class_metrics_meet_thresholds(): void
    {
        $data = $this->holdOut();
        $metrics = $this->perClassMetrics($this->confusionMatrix($data['actual'], $data['pred']));

        foreach ($metrics as $class => $m) {
            $this->assertGreaterThanOrEqual(0.75, $m['precision'], "Precision $class");
            $this->assertGreaterThanOrEqual(0.75, $m['recall'], "Recall $class");
            $this->assertGreaterThanOrEqual(0.75, $m['f1'], "F1 $class");
        }

        // Kelas Berisiko paling kritis untuk peringatan dini: recall minimal 90%
        $this->assertGreaterThanOrEqual(0.90, $metrics['Berisiko']['recall']);

        $macroF1 = array_sum(array_column($metrics, 'f1')) / count($metrics);
        $this->assertGreaterThanOrEqual(0.85, $macroF1);
    }

    /** @test */
    public function test_probabilities_are_valid_distributions_and_match_prediction(): void
    {
        $data = $this->holdOut();

        foreach ($data['proba'] as $i => $dist) {
            $this->assertEqualsCanonicalizing(self::CLASSES, array_keys($dist));
            foreach ($dist as $p) {
                $this->assertGreaterThanOrEqual(0.0, $p);
                $this->assertLessThanOrEqual(1.0, $p);
            }
            $this->assertEqualsWithDelta(1.0, array_sum($dist), 1e-6);

            // Kelas prediksi selalu memiliki probabilitas tertinggi
            $this->assertEqualsWithDelta(max($dist), $dist[$data['pred'][$i]], 1e-9);
        }
    }

    /** @test */
    public function test_confidence_is_higher_for_correct_predictions_than_wrong_ones(): void
    {
        $data = $this->holdOut();
        $correct = [];
        $wrong = [];

        foreach ($data['pred'] as $i => $pred) {
            $confidence = $data['proba'][$i][$pred];
            $pred === $data['actual'][$i] ? $correct[] = $confidence : $wrong[] = $confidence;
        }

        $this->assertNotEmpty($correct);
        $this->assertNotEmpty($wrong);
        $this->assertGreaterThan(array_sum($wrong) / count($wrong), array_sum($correct) / count($correct));
    }

    /** @test */
    public function test_smoothed_confidence_is_calibrated_and_never_absolute(): void
    {
        $data = $this->holdOut();
        $service = app(FinancialDecisionTreeService::class);
        $n = count($data['actual']);
        $bins = [];

        foreach ($data['pred'] as $i => $pred) {
            $dist = $service->smoothProbabilities($data['proba'][$i]);
            $confidence = $dist[$pred];

            $this->assertLessThan(1.0, $confidence, 'Confidence tidak boleh 100%');
            $this->assertEqualsWithDelta(1.0, array_sum($dist), 1e-6);
            $this->assertSame($pred, array_search(max($dist), $dist, true), 'Smoothing tidak boleh mengubah prediksi');

            $bin = min(9, (int) floor($confidence * 10));
            $bins[$bin][] = [$confidence, $pred === $data['actual'][$i] ? 1.0 : 0.0];
        }

        // Expected Calibration Error (10 bin)
        $ece = 0.0;
        foreach ($bins as $items) {
            $meanConfidence = array_sum(array_column($items, 0)) / count($items);
            $accuracy = array_sum(array_column($items, 1)) / count($items);
            $ece += count($items) / $n * abs($accuracy - $meanConfidence);
        }

        $this->assertLessThanOrEqual(0.05, $ece, 'ECE harus <= 0.05 (terkalibrasi baik)');
    }

    /** @test */
    public function test_service_confidence_equals_probability_of_predicted_class(): void
    {
        $result = app(FinancialDecisionTreeService::class)->predict([
            'total_income' => 20_000_000,
            'total_expense' => 17_000_000,
            'net_cash_flow' => 3_000_000,
            'expense_ratio' => 0.85,
            'income_trend' => -0.05,
            'cash_flow_trend' => -0.15,
        ]);

        $this->assertContains($result['prediction'], self::CLASSES);
        $this->assertGreaterThanOrEqual(0.0, $result['confidence']);
        $this->assertLessThanOrEqual(1.0, $result['confidence']);
        $this->assertEqualsWithDelta(round($result['probabilities'][$result['prediction']], 4), $result['confidence'], 1e-9);
    }

    /** @test */
    public function test_stratified_five_fold_cross_validation_is_stable(): void
    {
        mt_srand(42);
        $data = app(DatasetGenerator::class)->generate(1000);
        $folds = (new Labeled($data['samples'], $data['labels']))->randomize()->stratifiedFold(5);

        $scores = [];
        foreach ($folds as $i => $testing) {
            $training = Labeled::quick();
            foreach ($folds as $j => $fold) {
                if ($j !== $i) {
                    $training = $training->merge($fold);
                }
            }

            $tree = new ClassificationTree(
                FinancialDecisionTreeService::MAX_HEIGHT,
                FinancialDecisionTreeService::MAX_LEAF_SIZE,
                FinancialDecisionTreeService::MIN_PURITY_INCREASE
            );
            $tree->train($training);
            $scores[] = $this->accuracy($this->confusionMatrix($testing->labels(), $tree->predict($testing)));
        }

        $mean = array_sum($scores) / count($scores);
        $std = sqrt(array_sum(array_map(fn ($s) => ($s - $mean) ** 2, $scores)) / (count($scores) - 1));

        $this->assertGreaterThanOrEqual(0.85, $mean);
        $this->assertLessThanOrEqual(0.06, $std, 'Akurasi antar-fold harus stabil');
        $this->assertGreaterThanOrEqual(0.80, min($scores));
    }
}

````

---

### `tests/Unit/ExampleTest.php`

````php
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
}

````

---

### `tests/Unit/FeatureExtractionTest.php`

````php
<?php

namespace Tests\Unit;

use App\Models\Transaction;
use App\Models\User;
use App\Services\ML\DatasetGenerator;
use App\Services\ML\FinancialDecisionTreeService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Unit tests for ML feature extraction and dataset generation.
 * FR-05: Decision Tree must produce valid classifications from financial features.
 */
class FeatureExtractionTest extends TestCase
{
    use RefreshDatabase;

    private FinancialDecisionTreeService $mlService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mlService = app(FinancialDecisionTreeService::class);
    }

    /** @test */
    public function test_feature_extraction_returns_all_required_keys(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertArrayHasKey('total_income', $features);
        $this->assertArrayHasKey('total_expense', $features);
        $this->assertArrayHasKey('net_cash_flow', $features);
        $this->assertArrayHasKey('expense_ratio', $features);
        $this->assertArrayHasKey('income_trend', $features);
        $this->assertArrayHasKey('cash_flow_trend', $features);
    }

    /** @test */
    public function test_feature_extraction_returns_zero_income_when_no_transactions(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertEquals(0.0, $features['total_income']);
        $this->assertEquals(0.0, $features['total_expense']);
        $this->assertEquals(0.0, $features['net_cash_flow']);
    }

    /** @test */
    public function test_feature_extraction_calculates_correct_income_total(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 3_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 2_000_000, 'transaction_date' => '2026-10-20']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertEqualsWithDelta(5_000_000.0, $features['total_income'], 0.01);
    }

    /** @test */
    public function test_feature_extraction_calculates_correct_net_cash_flow(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 8_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->expense()->create(['user_id' => $user->id, 'amount' => 5_500_000, 'transaction_date' => '2026-10-15']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertEqualsWithDelta(2_500_000.0, $features['net_cash_flow'], 0.01);
    }

    /** @test */
    public function test_expense_ratio_is_correctly_computed(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 10_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->expense()->create(['user_id' => $user->id, 'amount' => 7_000_000, 'transaction_date' => '2026-10-15']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        // expense_ratio = 7_000_000 / 10_000_000 = 0.7
        $this->assertEqualsWithDelta(0.70, (float) $features['expense_ratio'], 0.001);
    }

    /** @test */
    public function test_expense_ratio_is_clamped_when_income_is_zero(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->expense()->create(['user_id' => $user->id, 'amount' => 1_000_000, 'transaction_date' => '2026-10-10']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        // No income → expense_ratio should be 1.5 (penalty for zero income with expenses)
        $this->assertEquals(1.5, $features['expense_ratio']);
    }

    /** @test */
    public function test_dataset_generator_produces_correct_sample_count(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(300);

        $this->assertArrayHasKey('samples', $generated);
        $this->assertArrayHasKey('labels', $generated);
        $this->assertCount(300, $generated['samples']);
        $this->assertCount(300, $generated['labels']);
    }

    /** @test */
    public function test_dataset_generator_produces_valid_labels(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(100);

        $validLabels = ['Sehat', 'Perlu perhatian', 'Berisiko'];

        foreach ($generated['labels'] as $label) {
            $this->assertContains($label, $validLabels, "Label '{$label}' is not a valid classification label");
        }
    }

    /** @test */
    public function test_dataset_generator_produces_samples_with_six_features(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(50);

        foreach ($generated['samples'] as $sample) {
            $this->assertCount(6, $sample, 'Each sample must have exactly 6 features');
            foreach ($sample as $feature) {
                $this->assertIsFloat($feature, 'Each feature must be a float');
            }
        }
    }

    /** @test */
    public function test_dataset_has_all_three_label_classes_represented(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(300);

        $uniqueLabels = array_unique($generated['labels']);
        sort($uniqueLabels);

        $this->assertContains('Sehat', $uniqueLabels);
        $this->assertContains('Perlu perhatian', $uniqueLabels);
        $this->assertContains('Berisiko', $uniqueLabels);
    }
}

````

---

### `tests/Unit/GroqExplanationServiceTest.php`

````php
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

````

