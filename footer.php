<?php
/**
 * Tatkhalsa Pro Max Footer Template
 *
 * @package TatkhalsaTheme
 * @version 1.0.0
 */
?>

<!-- =========================================================================
     FOOTER: STATUTORY COMPLIANCE & LEGAL DISCLOSURES
     ========================================================================= -->
<footer class="tk-footer" id="statutory-compliance" role="contentinfo">
    <div class="tk-footer-container">
        
        <!-- Grid Top: Brand, Mission, Quick Links, Emergency Contact -->
        <div class="tk-footer-grid">
            
            <!-- Col 1: Identity & Motto -->
            <div class="tk-footer-col">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tatkhalsa-logo.png'); ?>" alt="Tatkhalsa Foundation Logo" width="48" height="48" style="border-radius: 50%;">
                    <div>
                        <h4 style="color: var(--tk-text-primary); font-size: 1.125rem; margin-bottom: 2px;">Tatkhalsa Foundation</h4>
                        <span style="font-family: var(--tk-font-mono); font-size: 0.75rem; color: var(--tk-gold); letter-spacing: 0.05em;">BLOOD ON CALL 2.0</span>
                    </div>
                </div>
                <p style="font-size: 0.875rem; color: var(--tk-text-muted); line-height: 1.6; margin-bottom: 16px;">
                    A non-profit humanitarian organization operating with radical transparency and selfless devotion across Punjab, India, and the Global Sikh Diaspora.
                </p>
                <div class="tk-motto-badge">
                    ਸਰਬਤ ਦਾ ਭਲਾ &bull; Sarbat Da Bhalla
                </div>
            </div>

            <!-- Col 2: Seva Verticals -->
            <div class="tk-footer-col">
                <h5 class="tk-footer-heading"><?php esc_html_e('Seva Verticals', 'tatkhalsa-theme'); ?></h5>
                <ul class="tk-footer-links">
                    <li><a href="#blood-on-call" class="tk-footer-link tk-touch-target"><?php esc_html_e('Blood On Call 2.0 Network', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#seva-verticals" class="tk-footer-link tk-touch-target"><?php esc_html_e('Pediatric Cancer Relief', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#seva-verticals" class="tk-footer-link tk-touch-target"><?php esc_html_e('Disaster & Flood Rapid Force', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#seva-verticals" class="tk-footer-link tk-touch-target"><?php esc_html_e('Monthly High-Protein Ration Kits', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#seva-verticals" class="tk-footer-link tk-touch-target"><?php esc_html_e('1984 Survivors Rehabilitation', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#seva-verticals" class="tk-footer-link tk-touch-target"><?php esc_html_e('Daughters Anand Karaj Seva', 'tatkhalsa-theme'); ?></a></li>
                </ul>
            </div>

            <!-- Col 3: Transparency & Audits -->
            <div class="tk-footer-col">
                <h5 class="tk-footer-heading"><?php esc_html_e('Governance & Tax', 'tatkhalsa-theme'); ?></h5>
                <ul class="tk-footer-links">
                    <li><a href="#transparency" class="tk-footer-link tk-touch-target"><?php esc_html_e('Section 80G Tax Exemption', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#transparency" class="tk-footer-link tk-touch-target"><?php esc_html_e('Section 12A Registration', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#transparency" class="tk-footer-link tk-touch-target"><?php esc_html_e('GiveWell Standards Compliance', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#transparency" class="tk-footer-link tk-touch-target"><?php esc_html_e('Itemized Hospital Invoices', 'tatkhalsa-theme'); ?></a></li>
                    <li><a href="#transparency" class="tk-footer-link tk-touch-target"><?php esc_html_e('Direct Bank Transfer (NEFT/RTGS)', 'tatkhalsa-theme'); ?></a></li>
                </ul>
            </div>

            <!-- Col 4: 24/7 Helplines & Address -->
            <div class="tk-footer-col">
                <h5 class="tk-footer-heading"><?php esc_html_e('Emergency Helplines', 'tatkhalsa-theme'); ?></h5>
                <div style="display: flex; flex-direction: column; gap: 12px; font-size: 0.875rem;">
                    <div>
                        <span style="color: var(--tk-gold); font-weight: 600; display: block; margin-bottom: 2px;">WhatsApp Support Helpline:</span>
                        <a href="https://wa.me/447418378646?text=Waheguru%20Ji%20Ka%20Khalsa%2C%20Waheguru%20Ji%20Ki%20Fateh.%20I%20need%20assistance%20from%20Tatkhalsa%20%20Support." class="tk-footer-link tk-touch-target" style="font-family: var(--tk-font-mono); font-size: 1rem; color: var(--tk-text-primary); font-weight: 700;">+44 7418 378646</a>
                    </div>
                    <div>
                        <span style="color: var(--tk-gold); font-weight: 600; display: block; margin-bottom: 2px;">Global / UAE Chapter:</span>
                        <a href="tel:+971582111596" class="tk-footer-link tk-touch-target" style="font-family: var(--tk-font-mono); font-size: 0.9375rem; color: var(--tk-text-primary);">+971 58 211 1596</a>
                    </div>
                    <div>
                        <span style="color: var(--tk-text-muted); display: block; margin-bottom: 2px;">Official Inquiries:</span>
                        <a href="mailto:info@tatkhalsa.in" class="tk-footer-link tk-touch-target" style="color: var(--tk-gold);">info@tatkhalsa.in</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Statutory Legal Disclosure Card -->
        <div class="tk-footer-legal-card">
            <h5 style="color: var(--tk-gold); font-size: 0.9375rem; margin-bottom: 8px;">
                Statutory Registration &amp; Legal Disclosures
            </h5>
            <p style="margin-bottom: 8px;">
                <strong>Tatkhalsa Foundation</strong> is a registered non-profit organization incorporated under Section 8 of the Companies Act, 2013, Ministry of Corporate Affairs, Government of India.
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: 16px; font-family: var(--tk-font-mono); font-size: 0.8125rem; color: var(--tk-text-secondary); margin-bottom: 10px;">
                <span><strong>Corporate Identification Number (CIN):</strong> U88900PB2023NPL059225</span>
                <span><strong>Income Tax Exemptions:</strong> 12A &amp; 80G Certified</span>
                <span><strong>Entity Category:</strong> Section 8 Non-Profit (Company Limited by Guarantee)</span>
            </div>
            <p style="font-size: 0.75rem; color: var(--tk-text-muted); margin-bottom: 0;">
                <strong>Registered Office:</strong> GF 37, Bazidpur, SBS Nagar (Shahid Bhagat Singh Nagar / Nawanshahr), Punjab - 144518, India. All donations made within India are eligible for 50% tax deduction under Section 80G of the Income Tax Act, 1961.
            </p>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="tk-footer-bottom">
            <div>
                &copy; <?php echo date('Y'); ?> Tatkhalsa Foundation &bull; Blood On Call 2.0. All Rights Reserved.
            </div>
            <div style="display: flex; gap: 20px;">
                <a href="#statutory-compliance" class="tk-footer-link tk-touch-target">Privacy Policy</a>
                <a href="#statutory-compliance" class="tk-footer-link tk-touch-target">Terms of Seva</a>
                <a href="#transparency" class="tk-footer-link tk-touch-target">80G Tax Policy</a>
            </div>
        </div>

    </div>
</footer>

<!-- FLOATING ACTION DOCK (For instant mobile emergency triage & AI support) -->
<div class="tk-floating-action-dock" id="floating-action-dock" aria-label="Mobile Quick Action Bar">
    <a href="https://wa.me/447418378646?text=Waheguru%20Ji%20Ka%20Khalsa%2C%20Waheguru%20Ji%20Ki%20Fateh.%20I%20need%20assistance%20from%20Tatkhalsa%20%20Support." target="_blank" rel="noopener noreferrer" class="tk-whatsapp-fab-btn tk-touch-target" aria-label="24/7 WhatsApp Support" title="24/7 WhatsApp Support">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.27-2.42 5.82a8.188 8.188 0 0 1-5.82 2.42c-1.48 0-2.93-.39-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.216 8.216 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43l-.48-.01c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.78 2.72 4.31 3.81.6.26 1.07.42 1.44.54.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/></svg>
    </a>
    <a href="#transparency" class="tk-donate-pill-btn tk-touch-target" aria-label="Donate Now">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
        <span>Donate Now</span>
    </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
