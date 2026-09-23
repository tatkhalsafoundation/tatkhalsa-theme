<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- ZERO-FOUC THEME INITIALIZATION SCRIPT (Runs synchronously before render) -->
    <script>
        (function() {
            try {
                var savedTheme = localStorage.getItem('tatkhalsa_theme');
                var systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var theme = savedTheme || (systemPrefersDark ? 'dark' : 'dark'); // Default to dark aesthetic
                document.documentElement.setAttribute('data-theme', theme);
                document.documentElement.classList.add(theme);
                if (theme === 'light') {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {
                console.warn('Zero-FOUC loader error', e);
            }
        })();
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ACCESSIBILITY SKIP TO CONTENT -->
<a class="screen-reader-text tk-touch-target" href="#primary-content" style="position: absolute; top: -9999px; left: 20px; z-index: 99999; background: var(--tk-gold); color: #020617; padding: 12px 20px; border-radius: 8px; font-weight: 700; text-decoration: none;">
    <?php esc_html_e('Skip to main content', 'tatkhalsa-theme'); ?>
</a>

<!-- STICKY GLASS HEADER WITH GSAP LOGO TARGET CONTAINER -->
<header id="masthead" class="tk-header-wrapper" role="banner">
    <nav class="tk-navbar" aria-label="<?php esc_attr_e('Main Navigation', 'tatkhalsa-theme'); ?>">
        
        <!-- Brand / Sticky Logo Docking Slot -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="tk-nav-brand-slot" rel="home">
            <div id="tk-navbar-logo-slot" class="tk-nav-logo-target" aria-hidden="true">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tatkhalsa-logo.png'); ?>" alt="<?php bloginfo('name'); ?> Emblem" width="44" height="44">
            </div>
            <div class="tk-nav-title-group">
                <span class="tk-nav-title"><?php bloginfo('name'); ?></span>
                <span class="tk-nav-subtitle">Blood On Call 2.0</span>
            </div>
        </a>

        <!-- Desktop Navigation Menu -->
        <ul class="tk-nav-menu" role="menubar">
            <li role="none"><a href="#blood-on-call" class="tk-nav-link" role="menuitem"><?php esc_html_e('Blood On Call', 'tatkhalsa-theme'); ?></a></li>
            <li role="none"><a href="#seva-verticals" class="tk-nav-link" role="menuitem"><?php esc_html_e('Seva Verticals', 'tatkhalsa-theme'); ?></a></li>
            <li role="none"><a href="#transparency" class="tk-nav-link" role="menuitem"><?php esc_html_e('Transparency & 80G', 'tatkhalsa-theme'); ?></a></li>
            <li role="none"><a href="#statutory-compliance" class="tk-nav-link" role="menuitem"><?php esc_html_e('Compliance', 'tatkhalsa-theme'); ?></a></li>
        </ul>

        <!-- Action Items (Theme Switcher + Emergency SOS Button) -->
        <div class="tk-nav-actions">
            <!-- Theme Toggle Button (Dark/Light) -->
            <button id="tk-theme-toggle" class="tk-theme-toggle tk-touch-target" aria-label="<?php esc_attr_e('Toggle Dark/Light Mode', 'tatkhalsa-theme'); ?>" title="Toggle Theme">
                <svg class="tk-icon-sun" viewBox="0 0 24 24">
                    <path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.99 4.58c-.39-.39-1.03-.39-1.41 0s-.39 1.03 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0s.39-1.03 0-1.41L5.99 4.58zm12.37 12.37c-.39-.39-1.03-.39-1.41 0s-.39 1.03 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0s.39-1.03 0-1.41l-1.06-1.06zm1.06-10.96c.39-.39.39-1.03 0-1.41s-1.03-.39-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0l1.06-1.06zM7.05 18.36c.39-.39.39-1.03 0-1.41s-1.03-.39-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0l1.06-1.06z"/>
                </svg>
                <svg class="tk-icon-moon" viewBox="0 0 24 24">
                    <path d="M12.3 2a10 10 0 0 0-.19 20 10 10 0 0 0 8.7-5.1 1 1 0 0 0-1-1.44 8 8 0 1 1-8.95-8.95 1 1 0 0 0-1.44-1A10 10 0 0 0 12.3 2z"/>
                </svg>
            </button>

            <!-- Emergency Blood Request Trigger Button -->
            <button class="tk-btn tk-btn-emergency tk-btn-sm tk-touch-target" data-modal="modal-request-blood" aria-label="<?php esc_attr_e('Request Emergency Blood', 'tatkhalsa-theme'); ?>">
                <span>SOS Blood Request</span>
            </button>
        </div>
    </nav>
</header>
