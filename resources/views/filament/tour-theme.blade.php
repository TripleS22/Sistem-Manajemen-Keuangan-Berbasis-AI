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
