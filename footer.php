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
                        <span style="color: var(--tk-gold); font-weight: 600; display: block; margin-bottom: 2px;">Punjab Emergency Dispatch:</span>
                        <a href="tel:+919877038520" class="tk-footer-link tk-touch-target" style="font-family: var(--tk-font-mono); font-size: 1rem; color: var(--tk-text-primary); font-weight: 700;">+91 98770 38520</a>
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

<!-- FLOATING SOS ACTION DOCK (For instant mobile emergency triage) -->
<div class="tk-floating-sos-dock" id="floating-sos-dock" aria-label="Quick Action Floating Bar">
    <button class="tk-btn tk-btn-emergency tk-touch-target" data-modal="modal-request-blood" style="box-shadow: 0 10px 25px rgba(225, 29, 72, 0.5);">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
        <span>Emergency Blood SOS</span>
    </button>
    <a href="tel:+919877038520" class="tk-btn tk-btn-gold tk-touch-target" aria-label="Call Dispatch" style="padding: 12px 16px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
        <span class="desktop-only">Call +91 98770 38520</span>
    </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
