<?php
/**
 * Tatkhalsa Pro Max Main Template
 *
 * @package TatkhalsaTheme
 * @version 1.0.0
 */

get_header(); ?>

<main id="primary-content" class="tk-main-flow" role="main">

    <!-- =========================================================================
         HERO SECTION: CENTER BRAND MORPH STAGE & REGULATORY TRUST BADGE
         ========================================================================= -->
    <section class="tk-hero-section" id="home">
        <div class="tk-hero-bg-overlay" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/golden-temple.webp'); ?>');"></div>

        <div class="tk-hero-content">
            
            <!-- GSAP Center-to-Header Logo Source Stage -->
            <div class="hero-logo-wrapper" id="heroLogoWrapper">
                <div class="hero-emblem" id="heroEmblem">
                    <img 
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tatkhalsa-logo.png'); ?>" 
                        alt="Tatkhalsa Foundation Emblem" 
                        class="hero-emblem-img" 
                        id="heroEmblemImg"
                        width="116" 
                        height="116" 
                        loading="eager"
                    />
                </div>
            </div>

            <!-- Regulatory Trust Badge -->
            <div class="tk-regulatory-badge">
                <span class="tk-badge-pulse"></span>
                <span class="tk-badge-text">Regd. Section 8 NGO &bull; 80G &amp; 12A Certified &bull; Darpan Verified &bull; CIN U88900PB2023NPL059225</span>
            </div>

            <!-- Main Heading with Gold Shimmer -->
            <h1 class="tk-hero-title">
                The Royal Standard of <br>
                <span class="tk-gold-shimmer">Selfless Seva &amp; Emergency Blood</span>
            </h1>

            <p class="tk-hero-lead">
                Answering the urgent cry for help across Punjab and beyond. From life-saving <strong>Blood On Call 2.0</strong> emergency dispatches within 15 minutes to pediatric cancer relief and humanitarian disaster response — 100% direct, transparent, and audited.
            </p>

            <!-- Dual Primary CTAs -->
            <div class="tk-hero-cta-group">
                <a href="#blood-on-call" class="tk-btn tk-btn-emergency tk-touch-target">
                    <span class="tk-btn-blood-icon" aria-hidden="true">🩸</span>
                    <span>Request Blood (SOS)</span>
                </a>

                <a href="#seva-verticals" class="tk-btn tk-btn-gold tk-touch-target">
                    <span>Explore Seva Missions</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>

            <!-- Dynamic Telemetry Counter Strip -->
            <div class="tk-telemetry-strip" id="telemetry-counters">
                <div class="tk-telemetry-item">
                    <span class="tk-telemetry-value tk-counter" data-target="4850" id="stat-dispatched">4,850+</span>
                    <span class="tk-telemetry-label">Units Dispatched</span>
                </div>
                <div class="tk-telemetry-item">
                    <span class="tk-telemetry-value tk-counter" data-target="15" data-prefix="< " data-suffix=" min" id="stat-eta">&lt; 15 min</span>
                    <span class="tk-telemetry-label">Avg. Response Time</span>
                </div>
                <div class="tk-telemetry-item">
                    <span class="tk-telemetry-value" id="stat-transparency">100%</span>
                    <span class="tk-telemetry-label">Audited Seva (GiveWell)</span>
                </div>
            </div>

        </div>
    </section>

    <!-- =========================================================================
         SECTION 2: BLOOD ON CALL 2.0 INTERACTIVE RADAR & DONOR REGISTRY
         ========================================================================= -->
    <section class="tk-section tk-blood-hub" id="blood-on-call">
        <div class="tk-section-header">
            <span class="tk-section-eyebrow">Emergency Response Network</span>
            <h2 class="tk-section-title">Blood On Call 2.0 Live Registry</h2>
            <p>Direct peer-to-peer and coordinated donor dispatch across all districts of Punjab. Zero commercial middleman, 100% free for patients.</p>
        </div>

        <div style="max-width: var(--tk-container-max); margin: 0 auto;">
            
            <!-- Blood Group Quick Matrix Filter -->
            <div class="tk-blood-matrix" role="radiogroup" aria-label="Select Blood Group">
                <button class="tk-blood-btn active tk-touch-target" data-group="all">ALL</button>
                <button class="tk-blood-btn tk-touch-target" data-group="O+">O+</button>
                <button class="tk-blood-btn tk-touch-target" data-group="O-">O-</button>
                <button class="tk-blood-btn tk-touch-target" data-group="A+">A+</button>
                <button class="tk-blood-btn tk-touch-target" data-group="A-">A-</button>
                <button class="tk-blood-btn tk-touch-target" data-group="B+">B+</button>
                <button class="tk-blood-btn tk-touch-target" data-group="B-">B-</button>
                <button class="tk-blood-btn tk-touch-target" data-group="AB+">AB+</button>
                <button class="tk-blood-btn tk-touch-target" data-group="AB-">AB-</button>
            </div>

            <!-- District & Search Filter Bar -->
            <div class="tk-filter-bar">
                <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                    <label for="district-selector" class="tk-form-label" style="margin-bottom: 0;">Filter District:</label>
                    <select id="district-selector" class="tk-filter-select tk-touch-target">
                        <option value="all">All Punjab Districts &amp; Hubs</option>
                        <option value="jalandhar">Jalandhar</option>
                        <option value="amritsar">Amritsar</option>
                        <option value="ludhiana">Ludhiana</option>
                        <option value="nawanshahr">SBS Nagar (Nawanshahr)</option>
                        <option value="kapurthala">Kapurthala</option>
                        <option value="patiala">Patiala</option>
                        <option value="bathinda">Bathinda</option>
                        <option value="mohali">SAS Nagar (Mohali)</option>
                        <option value="dubai">UAE / Dubai Chapter</option>
                    </select>
                </div>

                <div style="display: flex; gap: 12px; align-items: center;">
                    <button id="btn-refresh-donors" class="tk-btn tk-btn-glass tk-btn-sm tk-touch-target">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
                        <span>Live Sync</span>
                    </button>
                    <button class="tk-btn tk-btn-gold tk-btn-sm tk-touch-target" data-modal="modal-register-donor">
                        <span>+ Join as Donor</span>
                    </button>
                </div>
            </div>

            <!-- Live Donor Card Grid (Hydrated via AJAX) -->
            <div id="donor-results-container" class="tk-donor-grid" aria-live="polite">
                <!-- Fallback / Loading State -->
                <div class="tk-donor-card">
                    <div class="tk-donor-header">
                        <span class="tk-blood-pill">O+</span>
                        <span class="tk-donor-status status-available">&bull; Active &amp; Ready</span>
                    </div>
                    <h4>Gurpreet Singh</h4>
                    <p class="tk-donor-meta">District: Jalandhar &bull; 7 Verified Donations</p>
                    <button class="tk-btn tk-btn-primary-blue tk-btn-sm tk-touch-target" data-modal="modal-request-blood">Dispatch Requisition</button>
                </div>

                <div class="tk-donor-card">
                    <div class="tk-donor-header">
                        <span class="tk-blood-pill">B+</span>
                        <span class="tk-donor-status status-available">&bull; Active &amp; Ready</span>
                    </div>
                    <h4>Harmanpreet Kaur</h4>
                    <p class="tk-donor-meta">District: Amritsar &bull; 4 Verified Donations</p>
                    <button class="tk-btn tk-btn-primary-blue tk-btn-sm tk-touch-target" data-modal="modal-request-blood">Dispatch Requisition</button>
                </div>

                <div class="tk-donor-card">
                    <div class="tk-donor-header">
                        <span class="tk-blood-pill">AB+</span>
                        <span class="tk-donor-status status-available">&bull; Active &amp; Ready</span>
                    </div>
                    <h4>Simranjit Singh</h4>
                    <p class="tk-donor-meta">District: Kapurthala &bull; 5 Verified Donations</p>
                    <button class="tk-btn tk-btn-primary-blue tk-btn-sm tk-touch-target" data-modal="modal-request-blood">Dispatch Requisition</button>
                </div>
            </div>

        </div>
    </section>

    <!-- =========================================================================
         SECTION 3: CORE SEVA VERTICALS BENTO GRID
         ========================================================================= -->
    <section class="tk-section" id="seva-verticals">
        <div class="tk-section-header">
            <span class="tk-section-eyebrow">Pillars of Impact</span>
            <h2 class="tk-section-title">Core Humanitarian Seva Verticals</h2>
            <p>Rooted in the eternal Sikh principle of <em>Vand Chhako</em> (Share what you have) and <em>Sarbat Da Bhalla</em> (Welfare of All).</p>
        </div>

        <div class="tk-bento-grid">
            
            <!-- Bento 1: Pediatric Cancer & Emergency Medical (Span 8) -->
            <div class="tk-bento-card col-8">
                <span class="tk-card-badge tk-badge-crimson">Urgent Medical Seva</span>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pediatric-care-seva.webp'); ?>" alt="Pediatric Cancer & Medical Relief" class="tk-card-image" loading="lazy">
                <h3 class="tk-card-title">Pediatric Cancer &amp; Direct-to-Hospital Medical Relief</h3>
                <p class="tk-card-text">
                    Covering full chemotherapy protocols, bone marrow transplants, and critical surgeries for impoverished children at PGI Chandigarh, DMC Ludhiana, and Tata Memorial. Payments are disbursed directly to hospital accounts with 0% administrative deductions.
                </p>
                <div style="display: flex; gap: 12px; align-items: center;">
                    <a href="#transparency" class="tk-btn tk-btn-glass tk-btn-sm tk-touch-target">View Audit Trail</a>
                    <button class="tk-btn tk-btn-gold tk-btn-sm tk-touch-target" data-modal="modal-request-blood">Submit Patient Case</button>
                </div>
            </div>

            <!-- Bento 2: Blood On Call 2.0 (Span 4) -->
            <div class="tk-bento-card col-4">
                <span class="tk-card-badge tk-badge-emerald">24/7 Rapid Response</span>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/project-blood-on-call.webp'); ?>" alt="Blood On Call 2.0" class="tk-card-image" loading="lazy">
                <h3 class="tk-card-title">Blood On Call 2.0</h3>
                <p class="tk-card-text">
                    Sub-15 minute emergency blood and platelet dispatch across Punjab. Over 4,850+ verified units dispatched to road accidents and ICU units.
                </p>
                <a href="#blood-on-call" class="tk-btn tk-btn-glass tk-btn-sm tk-touch-target">Open Dispatch Grid &rarr;</a>
            </div>

            <!-- Bento 3: Disaster & Flood Relief (Span 4) -->
            <div class="tk-bento-card col-4">
                <span class="tk-card-badge tk-badge-gold">Emergency Fleet</span>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/disaster-flood-relief.webp'); ?>" alt="Disaster & Flood Relief" class="tk-card-image" loading="lazy">
                <h3 class="tk-card-title">Disaster &amp; Monsoon Flood Relief</h3>
                <p class="tk-card-text">
                    Deployment of motorized rescue boats, medical emergency kits, water purification systems, and cattle fodder across inundated villages.
                </p>
                <a href="#transparency" class="tk-btn tk-btn-glass tk-btn-sm tk-touch-target">Field Reports</a>
            </div>

            <!-- Bento 4: Essential Grocery & Ration Support (Span 4) -->
            <div class="tk-bento-card col-4">
                <span class="tk-card-badge tk-badge-emerald">Nutrition Security</span>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/campaign-grocery-help.webp'); ?>" alt="Monthly Ration Support" class="tk-card-image" loading="lazy">
                <h3 class="tk-card-title">Monthly Dry Ration &amp; Nutrition</h3>
                <p class="tk-card-text">
                    Monthly high-protein grocery supplies (atta, pulses, desi ghee, mustard oil, spices) provided to widowed mothers and disabled elders with dignity.
                </p>
                <a href="#transparency" class="tk-btn tk-btn-glass tk-btn-sm tk-touch-target">View Ration Matrix</a>
            </div>

            <!-- Bento 5: 1984 Relief & Daughters Anand Karaj (Span 4) -->
            <div class="tk-bento-card col-4">
                <span class="tk-card-badge tk-badge-gold">Honor &amp; Dignity</span>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/campaign-1984-victims.webp'); ?>" alt="1984 Survivors Relief" class="tk-card-image" loading="lazy">
                <h3 class="tk-card-title">1984 Relief &amp; Anand Karaj Seva</h3>
                <p class="tk-card-text">
                    Monthly dignified pensions for elderly 1984 survivors and solemnizing respectful, zero-dowry Anand Karaj ceremonies for underprivileged Gursikh daughters.
                </p>
                <a href="#transparency" class="tk-btn tk-btn-glass tk-btn-sm tk-touch-target">Read Stories</a>
            </div>

        </div>
    </section>

    <!-- =========================================================================
         SECTION 4: TRANSPARENCY, 80G TAX EXEMPTION & REGULATORY EXCELLENCE
         ========================================================================= -->
    <section class="tk-section" id="transparency" style="background: var(--tk-bg-surface); border-top: 1px solid var(--tk-border-color);">
        <div class="tk-section-header">
            <span class="tk-section-eyebrow">Uncompromising Integrity</span>
            <h2 class="tk-section-title">GiveWell-Grade Transparency &amp; 80G Exemption</h2>
            <p>Every rupee accounted for with itemized hospital invoices and GST-compliant vendor receipts.</p>
        </div>

        <div class="tk-bento-grid">
            <div class="tk-bento-card col-6">
                <h3 class="tk-card-title" style="color: var(--tk-gold);">50% Tax Deduction under Section 80G</h3>
                <p class="tk-card-text">
                    Donations made to Tatkhalsa Foundation (Section 8 Non-Profit, CIN: <strong>U88900PB2023NPL059225</strong>) qualify for 50% tax exemption under Section 80G of the Income Tax Act, 1961.
                </p>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px; margin-bottom: 24px; font-size: 0.9375rem; color: var(--tk-text-secondary);">
                    <li style="display: flex; gap: 8px; align-items: center;">
                        <svg width="18" height="18" fill="var(--tk-emerald)" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        <span>Instant 80G Tax Exemption Certificate &amp; Form 10BE filing.</span>
                    </li>
                    <li style="display: flex; gap: 8px; align-items: center;">
                        <svg width="18" height="18" fill="var(--tk-emerald)" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        <span>Direct-to-hospital disbursement policy (No cash handovers).</span>
                    </li>
                    <li style="display: flex; gap: 8px; align-items: center;">
                        <svg width="18" height="18" fill="var(--tk-emerald)" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        <span>Annual audited balance sheets published publicly.</span>
                    </li>
                </ul>
                <a href="https://wa.me/447418378646?text=Waheguru%20Ji%20Ka%20Khalsa%2C%20Waheguru%20Ji%20Ki%20Fateh.%20I%20need%20assistance%20from%20Tatkhalsa%20%20Support." class="tk-btn tk-btn-gold tk-touch-target">WhatsApp Accounts Desk (+44 7418 378646)</a>
            </div>

            <div class="tk-bento-card col-6">
                <h3 class="tk-card-title">Bank Transfer &amp; Direct Seva Details</h3>
                <div style="background: var(--tk-bg-elevated); padding: 20px; border-radius: var(--tk-radius-md); font-family: var(--tk-font-mono); font-size: 0.9375rem; line-height: 1.8; margin-bottom: 20px; border: 1px solid var(--tk-border-subtle);">
                    <div><strong>Account Name:</strong> TATKHALSA FOUNDATION</div>
                    <div><strong>Bank:</strong> Axis Bank Ltd.</div>
                    <div><strong>Account Type:</strong> Current Account (Section 8 NGO)</div>
                    <div><strong>IFSC Code:</strong> UTIB0000000</div>
                    <div><strong>UPI ID:</strong> tatkhalsa@axisbank</div>
                </div>
                <p style="font-size: 0.8125rem; color: var(--tk-text-muted);">
                    * For international remittances (UAE / UK / US / Canada / Australia), please connect with our global seva desk at <a href="mailto:info@tatkhalsa.in" style="color: var(--tk-gold);">info@tatkhalsa.in</a>.
                </p>
            </div>
        </div>
    </section>

</main>

<!-- =========================================================================
     MODAL 1: EMERGENCY BLOOD REQUISITION (SOS)
     ========================================================================= -->
<div id="modal-request-blood" class="tk-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="modal-sos-title">
    <div class="tk-modal-box">
        <button class="tk-modal-close tk-touch-target" data-close-modal aria-label="Close modal">&times;</button>
        <span class="tk-card-badge tk-badge-crimson" style="margin-bottom: 12px;">Immediate Emergency Action</span>
        <h3 id="modal-sos-title" style="margin-bottom: 8px;">Create SOS Blood Requisition</h3>
        <p style="font-size: 0.875rem; color: var(--tk-text-muted); margin-bottom: 20px;">
            Blood On Call 2.0 coordinators will broadcast your requirement to donors in your exact hospital radius within 15 minutes.
        </p>

        <form id="form-blood-request">
            <div class="tk-form-group">
                <label class="tk-form-label" for="sos-patient">Patient Full Name *</label>
                <input type="text" id="sos-patient" name="patient_name" class="tk-form-control" required placeholder="e.g. Gurmukh Singh">
            </div>

            <div class="tk-form-row">
                <div class="tk-form-group">
                    <label class="tk-form-label" for="sos-blood-group">Blood Group Required *</label>
                    <select id="sos-blood-group" name="blood_group" class="tk-form-control" required>
                        <option value="">Select Group</option>
                        <option value="O+">O Positive (O+)</option>
                        <option value="O-">O Negative (O-)</option>
                        <option value="A+">A Positive (A+)</option>
                        <option value="A-">A Negative (A-)</option>
                        <option value="B+">B Positive (B+)</option>
                        <option value="B-">B Negative (B-)</option>
                        <option value="AB+">AB Positive (AB+)</option>
                        <option value="AB-">AB Negative (AB-)</option>
                    </select>
                </div>
                <div class="tk-form-group">
                    <label class="tk-form-label" for="sos-units">Units Required *</label>
                    <input type="number" id="sos-units" name="units_needed" class="tk-form-control" min="1" max="10" value="1" required>
                </div>
            </div>

            <div class="tk-form-row">
                <div class="tk-form-group">
                    <label class="tk-form-label" for="sos-hospital">Hospital Name &amp; City *</label>
                    <input type="text" id="sos-hospital" name="hospital_name" class="tk-form-control" required placeholder="e.g. Civil Hospital, Jalandhar">
                </div>
                <div class="tk-form-group">
                    <label class="tk-form-label" for="sos-district">District / Region *</label>
                    <input type="text" id="sos-district" name="district" class="tk-form-control" required placeholder="e.g. Jalandhar">
                </div>
            </div>

            <div class="tk-form-row">
                <div class="tk-form-group">
                    <label class="tk-form-label" for="sos-contact-name">Attendant / Contact Person *</label>
                    <input type="text" id="sos-contact-name" name="contact_person" class="tk-form-control" required placeholder="e.g. Navjot Singh">
                </div>
                <div class="tk-form-group">
                    <label class="tk-form-label" for="sos-contact-phone">Contact Mobile Number *</label>
                    <input type="tel" id="sos-contact-phone" name="contact_phone" class="tk-form-control" required placeholder="+91 98765 43210">
                </div>
            </div>

            <div id="sos-form-feedback" style="margin-bottom: 15px; font-size: 0.9rem; font-weight: 600; display: none;"></div>

            <button type="submit" class="tk-btn tk-btn-emergency tk-touch-target" style="width: 100%; justify-content: center;">
                <span>Broadcast Emergency Dispatch (SOS)</span>
            </button>
        </form>
    </div>
</div>

<!-- =========================================================================
     MODAL 2: DONOR REGISTRATION
     ========================================================================= -->
<div id="modal-register-donor" class="tk-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="modal-donor-title">
    <div class="tk-modal-box">
        <button class="tk-modal-close tk-touch-target" data-close-modal aria-label="Close modal">&times;</button>
        <span class="tk-card-badge tk-badge-gold" style="margin-bottom: 12px;">Become a Life Saver</span>
        <h3 id="modal-donor-title" style="margin-bottom: 8px;">Register as Verified Blood Donor</h3>
        <p style="font-size: 0.875rem; color: var(--tk-text-muted); margin-bottom: 20px;">
            Join the elite Rapid Blood On Call 2.0 squad. Your contact details are safely encrypted and only contacted during urgent emergencies in your area.
        </p>

        <form id="form-donor-register">
            <div class="tk-form-group">
                <label class="tk-form-label" for="donor-name">Full Name *</label>
                <input type="text" id="donor-name" name="full_name" class="tk-form-control" required placeholder="e.g. Jaswinder Singh">
            </div>

            <div class="tk-form-row">
                <div class="tk-form-group">
                    <label class="tk-form-label" for="donor-blood-group">Blood Group *</label>
                    <select id="donor-blood-group" name="blood_group" class="tk-form-control" required>
                        <option value="">Select Blood Group</option>
                        <option value="O+">O Positive (O+)</option>
                        <option value="O-">O Negative (O-)</option>
                        <option value="A+">A Positive (A+)</option>
                        <option value="A-">A Negative (A-)</option>
                        <option value="B+">B Positive (B+)</option>
                        <option value="B-">B Negative (B-)</option>
                        <option value="AB+">AB Positive (AB+)</option>
                        <option value="AB-">AB Negative (AB-)</option>
                    </select>
                </div>
                <div class="tk-form-group">
                    <label class="tk-form-label" for="donor-phone">Mobile Phone (WhatsApp) *</label>
                    <input type="tel" id="donor-phone" name="phone" class="tk-form-control" required placeholder="+91 98XXX XXXXX">
                </div>
            </div>

            <div class="tk-form-row">
                <div class="tk-form-group">
                    <label class="tk-form-label" for="donor-district">District / City *</label>
                    <input type="text" id="donor-district" name="district" class="tk-form-control" required placeholder="e.g. Ludhiana">
                </div>
                <div class="tk-form-group">
                    <label class="tk-form-label" for="donor-age">Age (18-65) *</label>
                    <input type="number" id="donor-age" name="age" class="tk-form-control" min="18" max="65" value="24" required>
                </div>
            </div>

            <div id="donor-form-feedback" style="margin-bottom: 15px; font-size: 0.9rem; font-weight: 600; display: none;"></div>

            <button type="submit" class="tk-btn tk-btn-gold tk-touch-target" style="width: 100%; justify-content: center;">
                <span>Complete Donor Registration</span>
            </button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
