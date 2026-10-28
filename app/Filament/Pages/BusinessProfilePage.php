<?php

namespace App\Filament\Pages;

use App\Models\BusinessProfile;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class BusinessProfilePage extends Page
{
    protected static ?string $title = 'Profil UMKM';

    protected static ?string $navigationLabel = 'Profil UMKM';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static ?int $navigationSort = 30;



    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $profile = BusinessProfile::firstOrCreate(
            ['user_id' => auth()->id()],
            [
                'business_name' => auth()->user()->name.' Business',
                'business_type' => 'Retail & Perdagangan',
                'initial_capital' => 0,
            ]
        );

        $this->form->fill($profile->attributesToArray());
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

        BusinessProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            $validatedData
        );

        Notification::make()
            ->title('Profil UMKM Berhasil Disimpan')
            ->body('Data identitas usaha Anda telah diperbarui.')
            ->success()
            ->send();
    }

    /**
     * @return array<Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Perubahan')
                ->action('save')
                ->icon('heroicon-o-check')
                ->keyBindings(['mod+s']),
        ];
    }
}
