<?php
/**
 * Newsletter Popup Modal
 */
?>

<!-- ===== NEWSLETTER POPUP MODAL ===== -->
<div id="srs-modal-overlay" aria-modal="true" role="dialog" aria-labelledby="srs-modal-heading">
    <div id="srs-modal-box">

        <button id="srs-close-btn" aria-label="Close newsletter popup">&times;</button>

        <!-- Brand -->
        <div class="srs-brand">
            <a href="<?php echo home_url(); ?>">
              <figure class="rounded-none m-0 w-[196px] md:w-[126px] xl:w-[240px] h-[48px] md:h-[38px] xl:h-[42px]">
                <?php echo logo_url(); ?>
              </figure>
            </a>
        </div>

        <!-- Form Section -->
        <div id="srs-form-section">
            <h2 class="srs-headline" id="srs-modal-heading">
                Right this way for more<br>juicy reads delivered<br>to you on the daily.
            </h2>
            <p class="srs-sub">Subscribe to daily newsletter. (It's free!)</p>

            <div class="srs-input-wrap" id="srs-input-wrap">
                <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1H16V13H1V1Z" stroke="#aaa" stroke-width="1.4"/>
                    <path d="M1 1L8.5 8L16 1" stroke="#aaa" stroke-width="1.4"/>
                </svg>
                <input type="email" id="srs-email" placeholder="Enter your email here" autocomplete="email" aria-label="Email address"/>
            </div>
            <p class="srs-error" id="srs-error">Please enter a valid email address.</p>

            <p class="srs-terms">
                By signing up, I agree to the <a href="#">Terms of Use</a> (including the dispute
                resolution procedures) and have reviewed the <a href="#">Privacy Notice</a>.
            </p>

            <button class="srs-cta-btn" id="srs-submit-btn">I'M IN!</button>
            <button class="srs-skip-btn" id="srs-skip-btn">I'll pass, thanks</button>
        </div>

        <!-- Success Section -->
        <div id="srs-success-section">
            <div class="srs-success-icon">&#10003;</div>
            <h3 class="srs-success-title">You're all set!</h3>
            <p class="srs-success-msg">Thanks for subscribing. Check your inbox soon for your first daily read.</p>
            <button class="srs-cta-btn" id="srs-success-close-btn">CLOSE</button>
        </div>

    </div>
</div>
<!-- ===== END NEWSLETTER POPUP MODAL ===== -->


<style>
/* ===== Modal Overlay ===== */
#srs-modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.65);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.35s ease, visibility 0.35s ease;
}

#srs-modal-overlay.srs-visible {
    opacity: 1;
    visibility: visible;
}

/* ===== Modal Box ===== */
#srs-modal-box {
    background: #ffffff;
    width: 100%;
    max-width: 460px;
    border-radius: 4px;
    padding: 44px 38px 32px;
    position: relative;
    text-align: center;
    transform: translateY(24px) scale(0.97);
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

#srs-modal-overlay.srs-visible #srs-modal-box {
    transform: translateY(0) scale(1);
}

/* ===== Close Button ===== */
#srs-close-btn {
    position: absolute;
    top: 14px;
    right: 18px;
    background: none;
    border: none;
    font-size: 24px;
    line-height: 1;
    cursor: pointer;
    color: #999;
    padding: 0;
    transition: color 0.2s;
}
#srs-close-btn:hover { color: #333; }

/* ===== Brand ===== */
.srs-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    margin-bottom: 22px;
}
.srs-brand-name {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: #111;
}

/* ===== Headline ===== */
.srs-headline {
    font-family: 'Bebas Neue', 'Arial Black', sans-serif;
    font-size: 30px;
    font-weight: 400;
    text-transform: uppercase;
    line-height: 1.15;
    color: #111;
    margin-bottom: 10px;
    letter-spacing: 0.5px;
}

.srs-sub {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: #666;
    margin-bottom: 22px;
}

/* ===== Email Input ===== */
.srs-input-wrap {
    display: flex;
    align-items: center;
    border: 1.5px solid #ccc;
    border-radius: 3px;
    padding: 0 14px;
    margin-bottom: 6px;
    transition: border-color 0.2s;
}
.srs-input-wrap:focus-within { border-color: #FE4705; }
.srs-input-wrap.srs-invalid { border-color: #e53935; }
.srs-input-wrap svg { flex-shrink: 0; margin-right: 10px; }

#srs-email {
    border: none;
    outline: none;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: #333;
    flex: 1;
    padding: 13px 0;
    background: transparent;
}
#srs-email::placeholder { color: #aaa; }

/* ===== Error ===== */
.srs-error {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    color: #e53935;
    margin-bottom: 10px;
    display: none;
    text-align: left;
}
.srs-error.srs-show { display: block; }

/* ===== Terms ===== */
.srs-terms {
    font-family: 'Poppins', sans-serif;
    font-size: 10px;
    color: #aaa;
    line-height: 1.6;
    margin-bottom: 20px;
}
.srs-terms a { color: #aaa; text-decoration: underline; }
.srs-terms a:hover { color: #555; }

/* ===== CTA Button ===== */
.srs-cta-btn {
    display: block;
    width: 100%;
    background: #FE4705;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 14px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    cursor: pointer;
    margin-bottom: 14px;
    transition: background 0.2s, transform 0.15s;
}
.srs-cta-btn:hover { background: #d93c00; }
.srs-cta-btn:active { transform: scale(0.98); }

/* ===== Skip Button ===== */
.srs-skip-btn {
    display: block;
    width: 100%;
    background: none;
    border: none;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: #aaa;
    cursor: pointer;
    text-decoration: underline;
    padding: 0;
    transition: color 0.2s;
}
.srs-skip-btn:hover { color: #555; }

/* ===== Success Section ===== */
#srs-success-section {
    display: none;
    padding: 10px 0;
}
.srs-success-icon {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #FE4705;
    color: #fff;
    font-size: 26px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
}
.srs-success-title {
    font-family: 'Bebas Neue', 'Arial Black', sans-serif;
    font-size: 28px;
    color: #111;
    margin-bottom: 10px;
}
.srs-success-msg {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: #666;
    line-height: 1.6;
    margin-bottom: 24px;
}

/* ===== Responsive ===== */
@media (max-width: 480px) {
    #srs-modal-box {
        padding: 36px 20px 26px;
    }
    .srs-headline { font-size: 25px; }
}
</style>


<script>
(function () {
    var COOKIE_NAME  = 'srs_newsletter_shown';
    var COOKIE_DAYS  = 7;   // show again after 7 days
    var SHOW_DELAY   = 3000; // ms before popup appears

    /* ── Cookie helpers ── */
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(?:^|; )' + name + '=([^;]*)'));
        return match ? decodeURIComponent(match[1]) : null;
    }
    function setCookie(name, value, days) {
        var expires = new Date(Date.now() + days * 864e5).toUTCString();
        document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/; SameSite=Lax';
    }

    /* ── Elements ── */
    var overlay     = document.getElementById('srs-modal-overlay');
    var closeBtn    = document.getElementById('srs-close-btn');
    var submitBtn   = document.getElementById('srs-submit-btn');
    var skipBtn     = document.getElementById('srs-skip-btn');
    var emailInput  = document.getElementById('srs-email');
    var formSection = document.getElementById('srs-form-section');
    var successSec  = document.getElementById('srs-success-section');
    var successClose= document.getElementById('srs-success-close-btn');
    var inputWrap   = document.getElementById('srs-input-wrap');
    var errorMsg    = document.getElementById('srs-error');

    /* ── Open / Close ── */
    function openModal() {
        overlay.classList.add('srs-visible');
        document.body.style.overflow = 'hidden';
        setCookie(COOKIE_NAME, '1', COOKIE_DAYS);
    }

    function closeModal() {
        overlay.classList.remove('srs-visible');
        document.body.style.overflow = '';
    }

    /* ── Validate email ── */
    function isValidEmail(val) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val.trim());
    }

    /* ── Submit handler ── */
    function handleSubmit() {
        var val = emailInput.value.trim();
        if (!isValidEmail(val)) {
            inputWrap.classList.add('srs-invalid');
            errorMsg.classList.add('srs-show');
            emailInput.focus();
            return;
        }
        inputWrap.classList.remove('srs-invalid');
        errorMsg.classList.remove('srs-show');

        /* ---- Optional: hook into your email service here ---- */
        /* e.g. send to Mailchimp, ConvertKit, or your WP endpoint */
        /* fetch('/wp-json/srs/v1/subscribe', { method:'POST', body: JSON.stringify({email: val}) }) */

        formSection.style.display = 'none';
        successSec.style.display  = 'block';
    }

    /* ── Event Listeners ── */
    closeBtn.addEventListener('click',    closeModal);
    skipBtn.addEventListener('click',     closeModal);
    successClose.addEventListener('click', closeModal);
    submitBtn.addEventListener('click',   handleSubmit);

    /* Close on Enter key */
    emailInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') handleSubmit();
    });

    /* Close when clicking the backdrop */
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) closeModal();
    });

    /* Close on Escape key */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && overlay.classList.contains('srs-visible')) closeModal();
    });

    /* ── Auto-trigger with delay (respects cookie) ── */
    if (!getCookie(COOKIE_NAME)) {
        setTimeout(openModal, SHOW_DELAY);
    }

})();
</script>

