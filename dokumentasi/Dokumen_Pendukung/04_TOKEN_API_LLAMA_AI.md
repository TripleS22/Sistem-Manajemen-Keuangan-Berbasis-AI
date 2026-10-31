# 04 — Token API LLM (Groq / Llama)

## 1. Penyedia & Lokasi Token

Penjelasan AI memakai **Groq Cloud API** (endpoint kompatibel OpenAI). Token disimpan sebagai variabel lingkungan, **tidak pernah di dalam source code**.

| File | Variabel | Nilai (disamarkan) |
| --- | --- | --- |
| `.env` (lokal) | `GROQ_API_KEY` | `gsk_••••••••••••••••••••••` |
| `.env.production` (hosting) | `GROQ_API_KEY` | `gsk_••••••••••••••••••••••` (sama) |
| `.env` | `GROQ_MODEL` | `openai/gpt-oss-20b` |
| `.env` | `AI_PROVIDER` | `groq` |
| `.env` (cadangan) | `GEMINI_API_KEY` | `••••••••••••••••` |

Token lengkap dapat dilihat langsung di file `.env` proyek. Token sengaja **disamarkan** dalam dokumen ini karena siapa pun yang memegang token dapat memakai kuota/akun Groq Anda. Jika token pernah terlanjur dibagikan, buat token baru di <https://console.groq.com/keys> lalu ganti nilai `GROQ_API_KEY`.

Konfigurasi dibaca di `config/services.php`:

```php
'ai'   => ['provider' => env('AI_PROVIDER', 'groq')],
'groq' => [
    'api_key' => env('GROQ_API_KEY'),
    'model'   => env('GROQ_MODEL', 'openai/gpt-oss-20b'),
],
```

## 2. ⚠️ Status Model Llama (hasil pengecekan 31-10-2026)

Daftar model yang dapat diakses token ini (`GET https://api.groq.com/openai/v1/models`):

```
allam-2-7b                          openai/gpt-oss-120b
canopylabs/orpheus-arabic-saudi     openai/gpt-oss-20b      ← dipakai aplikasi
canopylabs/orpheus-v1-english       openai/gpt-oss-safeguard-20b
meta-llama/llama-prompt-guard-2-22m qwen/qwen3.8-27b
meta-llama/llama-prompt-guard-2-86m whisper-large-v3 / whisper-large-v3-turbo
```

Panggilan ke `llama-3.3-70b-versatile` menghasilkan:

```json
{"error":{"message":"The model `llama-3.3-70b-versatile` does not exist or you do not have access to it.","type":"invalid_request_error","code":"model_not_found"}}
```

Artinya:
- **Model chat Llama sudah tidak tersedia** di akun Groq ini (yang tersisa hanya `llama-prompt-guard`, model filter keamanan, bukan model chat).
- Aplikasi saat ini berjalan dengan **`openai/gpt-oss-20b`** melalui Groq dan berfungsi normal.
- Nilai `llama-3.3-70b-versatile` yang masih tertulis di `GroqExplanationService.php` hanyalah default cadangan yang tidak pernah terpakai (karena `config/services.php` selalu mengisi model).
- Untuk dokumentasi, sebaiknya sebut komponen ini sebagai **"LLM via Groq API (model GPT-OSS 20B)"**. Bila wajib Llama, perlu penyedia lain yang masih menyediakan Llama (mis. Together AI, OpenRouter, atau Ollama lokal) beserta penyesuaian endpoint.

## 3. Cara Token Dipakai (Request ke API)

`app/Services/AI/GroqExplanationService.php`:

```http
POST https://api.groq.com/openai/v1/chat/completions
Authorization: Bearer <GROQ_API_KEY>
Content-Type: application/json

{
  "model": "openai/gpt-oss-20b",
  "messages": [
    {"role": "system", "content": "Anda adalah asisten konsultan keuangan cerdas untuk UMKM Indonesia ... Output WAJIB berupa JSON valid ..."},
    {"role": "user",   "content": "<prompt berisi data keuangan + label Decision Tree + faktor kunci>"}
  ],
  "response_format": {"type": "json_object"},
  "temperature": 0.2
}
```

Respons yang diharapkan:

```json
{"explanation": "…", "recommendations": ["…", "…", "…"]}
```

## 4. Mekanisme Fallback

Jika token kosong, salah, kuota habis, model tidak ditemukan, atau koneksi gagal, sistem **tidak error**. Penjelasan dibuat oleh mesin rule-based internal, dan tersimpan dengan `status = fallback` serta `provider = rule_based_fallback (alasan)`. Klasifikasi Decision Tree tetap berjalan.

## 5. Langkah Mengganti Token

1. Buat token di <https://console.groq.com/keys>.
2. Ubah `.env`: `GROQ_API_KEY=gsk_xxxxxxxx`
3. Jalankan `php artisan config:clear` (di hosting: hapus cache konfigurasi juga).
4. Uji: `php dokumentasi/Dokumen_Pendukung/test_live_fitur.php`, lalu pastikan bagian [C] berstatus `success`.
