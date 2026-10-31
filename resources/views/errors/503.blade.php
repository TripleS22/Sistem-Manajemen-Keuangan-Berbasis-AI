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
