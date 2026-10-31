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
