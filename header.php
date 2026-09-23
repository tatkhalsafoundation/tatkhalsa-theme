<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Zero-FOUC Theme Script -->
    <script>
        (function() {
            try {
                var savedTheme = localStorage.getItem('tatkhalsa_theme');
                var systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var theme = savedTheme || (systemPrefersDark ? 'dark' : 'dark');
                document.documentElement.setAttribute('data-theme', theme);
                document.documentElement.classList.add(theme);
            } catch (e) {}
        })();
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Accessible Skip Link -->
<a class="screen-reader-text tk-skip-link" href="#primary-content">
    <?php esc_html_e('Skip to main content', 'tatkhalsa-theme'); ?>
</a>

<!-- =========================================================================
     1. FIXED HEADER (STRICT 2-ITEM LAYOUT)
     ========================================================================= -->
<header class="tk-header" id="tk-header" role="banner">
    <div class="tk-header-container">
        
        <!-- Left: Destination anchor for circular emblem -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="tk-logo-anchor" id="tk-logo-anchor" aria-label="<?php bloginfo('name'); ?>">
            <div class="tk-header-logo-dock" id="tkNavLogoDock">
                <img 
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tatkhalsa-logo.png'); ?>" 
                    alt="<?php bloginfo('name'); ?> Emblem" 
                    class="tk-header-logo-img" 
                    id="tkHeaderLogoImg"
                    width="44" 
                    height="44" 
                    loading="eager" 
                />
            </div>
            <div class="tk-logo-brand">
                <span class="tk-logo-title"><?php bloginfo('name'); ?></span>
                <span class="tk-logo-subtitle">Foundation</span>
            </div>
        </a>

        <!-- Right: Blood On Call 2.0 CTA & Minimal 3-Line Hamburger Button -->
        <div class="tk-header-right">
            <a href="#blood-on-call" class="tk-btn-blood" role="button" aria-label="<?php esc_attr_e('Blood On Call 2.0 Emergency Service', 'tatkhalsa-theme'); ?>">
                <span class="tk-btn-blood-pulse" aria-hidden="true"></span>
                <span class="tk-btn-blood-icon" aria-hidden="true">🩸</span>
                <span class="tk-btn-blood-text">Blood On Call 2.0</span>
            </a>

            <button 
                type="button" 
                class="tk-hamburger" 
                id="tk-hamburger" 
                aria-label="<?php esc_attr_e('Toggle navigation menu', 'tatkhalsa-theme'); ?>" 
                aria-controls="tk-drawer" 
                aria-expanded="false"
            >
                <span class="tk-hamburger-box">
                    <span class="tk-hamburger-line"></span>
                    <span class="tk-hamburger-line"></span>
                    <span class="tk-hamburger-line"></span>
                </span>
            </button>
        </div>

    </div>
</header>

<!-- Off-Canvas Drawer Backdrop Overlay -->
<div class="tk-drawer-overlay" id="tk-drawer-overlay" aria-hidden="true"></div>

<!-- =========================================================================
     2. HIDDEN SLIDE-OUT NAVIGATION DRAWER (<nav class="tk-drawer">)
     ========================================================================= -->
<nav class="tk-drawer" id="tk-drawer" aria-label="<?php esc_attr_e('Main Navigation Drawer', 'tatkhalsa-theme'); ?>" aria-hidden="true" inert>
    <div class="tk-drawer-inner">
        
        <!-- Drawer Top Bar -->
        <div class="tk-drawer-header">
            <div class="tk-drawer-brand">
                <img 
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tatkhalsa-logo.png'); ?>" 
                    alt="<?php bloginfo('name'); ?>" 
                    class="tk-drawer-logo" 
                    width="36" 
                    height="36" 
                />
                <div class="tk-drawer-brand-text">
                    <span class="tk-drawer-brand-title"><?php bloginfo('name'); ?></span>
                    <span class="tk-drawer-brand-tagline">ਸੇਵਾ • ਸਮਰਪਣ • ਪਾਰਦਰਸ਼ਤਾ</span>
                </div>
            </div>
            <button type="button" class="tk-drawer-close" id="tk-drawer-close" aria-label="<?php esc_attr_e('Close navigation menu', 'tatkhalsa-theme'); ?>">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Drawer Navigation Links -->
        <ul class="tk-drawer-nav" role="menubar">
            <li class="tk-drawer-item" role="none">
                <a href="#home" class="tk-drawer-link" role="menuitem">
                    <span class="tk-drawer-icon" aria-hidden="true">🏛️</span>
                    <span class="tk-drawer-link-text"><?php esc_html_e('Home', 'tatkhalsa-theme'); ?></span>
                </a>
            </li>
            <li class="tk-drawer-item" role="none">
                <a href="#about-us" class="tk-drawer-link" role="menuitem">
                    <span class="tk-drawer-icon" aria-hidden="true">📜</span>
                    <span class="tk-drawer-link-text"><?php esc_html_e('About Us', 'tatkhalsa-theme'); ?></span>
                </a>
            </li>
            <li class="tk-drawer-item" role="none">
                <a href="#seva-verticals" class="tk-drawer-link" role="menuitem">
                    <span class="tk-drawer-icon" aria-hidden="true">🤝</span>
                    <span class="tk-drawer-link-text"><?php esc_html_e('Our Seva Projects', 'tatkhalsa-theme'); ?></span>
                </a>
            </li>
            <li class="tk-drawer-item" role="none">
                <a href="#transparency" class="tk-drawer-link" role="menuitem">
                    <span class="tk-drawer-icon" aria-hidden="true">⚖️</span>
                    <span class="tk-drawer-link-text"><?php esc_html_e('Transparency & 80G', 'tatkhalsa-theme'); ?></span>
                </a>
            </li>
            <li class="tk-drawer-item" role="none">
                <a href="#gallery" class="tk-drawer-link" role="menuitem">
                    <span class="tk-drawer-icon" aria-hidden="true">🖼️</span>
                    <span class="tk-drawer-link-text"><?php esc_html_e('Gallery & Media', 'tatkhalsa-theme'); ?></span>
                </a>
            </li>
            <li class="tk-drawer-item" role="none">
                <a href="#volunteer" class="tk-drawer-link" role="menuitem">
                    <span class="tk-drawer-icon" aria-hidden="true">🙋♂️</span>
                    <span class="tk-drawer-link-text"><?php esc_html_e('Join as Volunteer', 'tatkhalsa-theme'); ?></span>
                </a>
            </li>
            <li class="tk-drawer-item" role="none">
                <a href="#contribute" class="tk-drawer-link tk-drawer-link-contribute" role="menuitem">
                    <span class="tk-drawer-icon" aria-hidden="true">💛</span>
                    <span class="tk-drawer-link-text"><?php esc_html_e('Contribute', 'tatkhalsa-theme'); ?></span>
                </a>
            </li>
        </ul>

        <!-- Drawer Emergency Action & Contact Footer -->
        <div class="tk-drawer-footer">
            <a href="#blood-on-call" class="tk-btn-blood tk-btn-blood-drawer" role="button">
                <span class="tk-btn-blood-icon" aria-hidden="true">🩸</span>
                <span>Blood On Call 2.0 SOS</span>
            </a>
            <div class="tk-drawer-contact">
                <span>24x7 Helpline Dispatch:</span>
                <a href="tel:+919877038520" class="tk-drawer-phone">+91 98770 38520</a>
            </div>
        </div>

    </div>
</nav>
