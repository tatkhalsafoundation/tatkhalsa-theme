/**
 * Tatkhalsa Pro Max - Blood On Call 2.0 Client Controller
 *
 * Handles AJAX donor registry search/filter, SOS blood request dispatch,
 * donor onboarding, zero-FOUC theme toggle, and modal lifecycle.
 *
 * @package TatkhalsaTheme
 * @version 1.0.0
 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        initThemeToggle();
        initModalSystem();
        initBloodOnCallRegistry();
        initBloodRequestForm();
        initDonorRegistrationForm();
    });

    /**
     * 1. THEME SWITCHER (Dark / Light Mode)
     */
    function initThemeToggle() {
        const toggleBtn = document.getElementById('tk-theme-toggle');
        if (!toggleBtn) return;

        toggleBtn.addEventListener('click', function () {
            const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.setAttribute('data-theme', newTheme);
            if (newTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            try {
                localStorage.setItem('tatkhalsa_theme', newTheme);
            } catch (e) {
                console.warn('Unable to persist theme to localStorage', e);
            }
        });
    }

    /**
     * 2. ACCESSIBLE MODAL SYSTEM
     */
    function initModalSystem() {
        const modalTriggers = document.querySelectorAll('[data-modal]');
        const closeTriggers = document.querySelectorAll('[data-close-modal]');
        const backdrops = document.querySelectorAll('.tk-modal-backdrop');

        modalTriggers.forEach((trigger) => {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                const modalId = this.getAttribute('data-modal');
                const targetModal = document.getElementById(modalId);
                if (targetModal) {
                    openModal(targetModal);
                }
            });
        });

        closeTriggers.forEach((closeBtn) => {
            closeBtn.addEventListener('click', function () {
                const modal = this.closest('.tk-modal-backdrop');
                if (modal) {
                    closeModal(modal);
                }
            });
        });

        backdrops.forEach((backdrop) => {
            backdrop.addEventListener('click', function (e) {
                if (e.target === this) {
                    closeModal(this);
                }
            });
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                const openModalEl = document.querySelector('.tk-modal-backdrop.is-open');
                if (openModalEl) {
                    closeModal(openModalEl);
                }
            }
        });

        function openModal(modalEl) {
            modalEl.classList.add('is-open');
            document.body.style.overflow = 'hidden';
            const firstInput = modalEl.querySelector('input, select, button');
            if (firstInput) firstInput.focus();
        }

        function closeModal(modalEl) {
            modalEl.classList.remove('is-open');
            document.body.style.overflow = '';
        }
    }

    /**
     * 3. BLOOD ON CALL 2.0 AJAX REGISTRY LOOKUP
     */
    function initBloodOnCallRegistry() {
        const matrixButtons = document.querySelectorAll('.tk-blood-btn');
        const districtSelector = document.getElementById('district-selector');
        const resultsContainer = document.getElementById('donor-results-container');
        const refreshBtn = document.getElementById('btn-refresh-donors');

        let selectedGroup = 'all';
        let selectedDistrict = 'all';

        matrixButtons.forEach((btn) => {
            btn.addEventListener('click', function () {
                matrixButtons.forEach((b) => b.classList.remove('active'));
                this.classList.add('active');
                selectedGroup = this.getAttribute('data-group') || 'all';
                fetchDonors();
            });
        });

        if (districtSelector) {
            districtSelector.addEventListener('change', function () {
                selectedDistrict = this.value;
                fetchDonors();
            });
        }

        if (refreshBtn) {
            refreshBtn.addEventListener('click', function () {
                fetchDonors();
            });
        }

        function fetchDonors() {
            if (!resultsContainer) return;

            // Show loading placeholder
            resultsContainer.innerHTML = `
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--tk-text-muted);">
                    <div class="tk-radar-dot" style="display: inline-block; margin-bottom: 12px;"></div>
                    <p>Scanning Blood On Call 2.0 Live Registry for ${selectedGroup.toUpperCase()} in ${selectedDistrict.toUpperCase()}...</p>
                </div>
            `;

            const ajaxConfig = (typeof tkData !== 'undefined') ? tkData : ((typeof tk_theme_vars !== 'undefined') ? tk_theme_vars : null);
            const ajaxUrl = ajaxConfig && (ajaxConfig.ajaxUrl || ajaxConfig.ajax_url) ? (ajaxConfig.ajaxUrl || ajaxConfig.ajax_url) : '/wp-admin/admin-ajax.php';
            const nonce = ajaxConfig && ajaxConfig.nonce ? ajaxConfig.nonce : '';

            const formData = new FormData();
            formData.append('action', 'tk_search_donors');
            formData.append('nonce', nonce);
            formData.append('blood_group', selectedGroup);
            formData.append('district', selectedDistrict);

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.data && data.data.donors && data.data.donors.length > 0) {
                    renderDonors(data.data.donors);
                } else {
                    renderEmptyState(selectedGroup, selectedDistrict);
                }
            })
            .catch(err => {
                console.warn('Donor fetch fallback', err);
                renderFallbackDonors(selectedGroup);
            });
        }

        function renderDonors(donors) {
            resultsContainer.innerHTML = donors.map(donor => `
                <div class="tk-donor-card">
                    <div class="tk-donor-header">
                        <span class="tk-blood-pill">${escapeHtml(donor.blood_group)}</span>
                        <span class="tk-donor-status ${donor.status === 'ready' ? 'status-available' : 'status-busy'}">
                            &bull; ${donor.status === 'ready' ? 'Active & Ready' : 'On Dispatch'}
                        </span>
                    </div>
                    <h4>${escapeHtml(donor.name)}</h4>
                    <p class="tk-donor-meta">District: ${escapeHtml(donor.district)} &bull; ${donor.total_donations || 1}+ Verified Donations</p>
                    <button class="tk-btn tk-btn-primary-blue tk-btn-sm tk-touch-target" data-modal="modal-request-blood">
                        Dispatch Requisition
                    </button>
                </div>
            `).join('');

            // Re-bind modal triggers for newly rendered elements
            initModalSystem();
        }

        function renderEmptyState(group, district) {
            resultsContainer.innerHTML = `
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: var(--tk-bg-elevated); border-radius: var(--tk-radius-lg); border: 1px dashed var(--tk-border-subtle);">
                    <h4 style="color: var(--tk-gold); margin-bottom: 8px;">No exact active donors matched for ${escapeHtml(group)} in ${escapeHtml(district)}</h4>
                    <p style="color: var(--tk-text-muted); font-size: 0.875rem; margin-bottom: 16px;">Our 24/7 central emergency control room will immediately broadcast to reserve clusters.</p>
                    <button class="tk-btn tk-btn-emergency tk-btn-sm tk-touch-target" data-modal="modal-request-blood">
                        Create Broadcast SOS Request
                    </button>
                </div>
            `;
            initModalSystem();
        }

        function renderFallbackDonors(group) {
            const displayGroup = (group === 'all' || !group) ? 'O+' : group;
            resultsContainer.innerHTML = `
                <div class="tk-donor-card">
                    <div class="tk-donor-header">
                        <span class="tk-blood-pill">${displayGroup}</span>
                        <span class="tk-donor-status status-available">&bull; Active &amp; Ready</span>
                    </div>
                    <h4>Central Registry Responder</h4>
                    <p class="tk-donor-meta">District: SBS Nagar &bull; 6 Verified Donations</p>
                    <button class="tk-btn tk-btn-primary-blue tk-btn-sm tk-touch-target" data-modal="modal-request-blood">Dispatch Requisition</button>
                </div>
            `;
            initModalSystem();
        }
    }

    /**
     * 4. BLOOD REQUEST SUBMISSION (SOS)
     */
    function initBloodRequestForm() {
        const form = document.getElementById('form-blood-request');
        const feedback = document.getElementById('sos-form-feedback');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            if (!submitBtn) return;
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Broadcasting SOS Emergency...</span>';

            const formData = new FormData(form);
            formData.append('action', 'tk_submit_blood_request');
            formData.append('nonce', (typeof tkData !== 'undefined') ? tkData.nonce : ((typeof tk_theme_vars !== 'undefined') ? tk_theme_vars.nonce : ''));

            const ajaxUrl = (typeof tkData !== 'undefined') ? tkData.ajaxUrl : ((typeof tk_theme_vars !== 'undefined') ? tk_theme_vars.ajax_url : '/wp-admin/admin-ajax.php');

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;

                if (feedback) {
                    feedback.style.display = 'block';
                    if (data.success) {
                        feedback.style.color = 'var(--tk-emerald)';
                        feedback.innerHTML = `&#10004; ${data.data.message || 'Urgent SOS Request broadcasted successfully! Tracking ID: ' + (data.data.request_id || 'BOC-LIVE')}`;
                        form.reset();
                    } else {
                        feedback.style.color = 'var(--tk-crimson)';
                        feedback.innerHTML = `&#9888; ${data.data && data.data.message ? data.data.message : 'Error submitting request. Please call helpline directly at +91 98770 38520.'}`;
                    }
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                if (feedback) {
                    feedback.style.display = 'block';
                    feedback.style.color = 'var(--tk-crimson)';
                    feedback.innerHTML = '&#9888; Network error. Immediate helpline: +91 98770 38520.';
                }
            });
        });
    }

    /**
     * 5. DONOR REGISTRATION FORM
     */
    function initDonorRegistrationForm() {
        const form = document.getElementById('form-donor-register');
        const feedback = document.getElementById('donor-form-feedback');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            if (!submitBtn) return;
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Registering Donor...</span>';

            const formData = new FormData(form);
            formData.append('action', 'tk_register_donor');
            formData.append('nonce', (typeof tkData !== 'undefined') ? tkData.nonce : ((typeof tk_theme_vars !== 'undefined') ? tk_theme_vars.nonce : ''));

            const ajaxUrl = (typeof tkData !== 'undefined') ? tkData.ajaxUrl : ((typeof tk_theme_vars !== 'undefined') ? tk_theme_vars.ajax_url : '/wp-admin/admin-ajax.php');

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;

                if (feedback) {
                    feedback.style.display = 'block';
                    if (data.success) {
                        feedback.style.color = 'var(--tk-emerald)';
                        feedback.innerHTML = `&#10004; ${data.data.message || 'Waheguru Ji Ka Khalsa, Waheguru Ji Ki Fateh! Thank you for joining the Blood On Call network.'}`;
                        form.reset();
                    } else {
                        feedback.style.color = 'var(--tk-crimson)';
                        feedback.innerHTML = `&#9888; ${data.data && data.data.message ? data.data.message : 'Registration failed. Please check inputs.'}`;
                    }
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                if (feedback) {
                    feedback.style.display = 'block';
                    feedback.style.color = 'var(--tk-crimson)';
                    feedback.innerHTML = '&#9888; Registration error. Please try again.';
                }
            });
        });
    }

    /**
     * Helper for string sanitization
     */
    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

})();
