<!-- ===================== SOCIAL MEDIA SECTION (FAN + HOVER SLIDE + INFINITE LOOP) ===================== -->
<div class="bg-white py-2 w-100 overflow-hidden">
    <section class="social-section d-flex flex-column align-items-center justify-content-center text-center">
        <h2 class="section-title">SOCIAL MEDIA</h2>

        <div class="social-fan-wrapper position-relative mx-auto mt-5 mb-5">
            <div class="social-stage">

                <!-- Card 0 -->
                <div class="social-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Group 2098.jpg" class="social-img" alt="Social Post">
                    <div class="social-overlay"></div>
                </div>

                <!-- Card 1 -->
                <div class="social-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Group 2099.jpg" class="social-img" alt="Social Post">
                    <div class="social-overlay"></div>
                </div>

                <!-- Card 2 (starts in the center) -->
                <div class="social-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Group 2097.jpg" class="social-img" alt="Social Post">
                    <div class="social-overlay"></div>
                </div>

                <!-- Card 3 -->
                <div class="social-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Group 2096.jpg" class="social-img" alt="Social Post">
                    <div class="social-overlay"></div>
                </div>

                <!-- Card 4 -->
                <div class="social-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Group 2095.jpg" class="social-img" alt="Social Post">
                    <div class="social-overlay"></div>
                </div>

            </div>
        </div>

        <a href="https://www.instagram.com/swiperightstoriesofficial/" class="btn social-follow-btn mt-5 mb-3 px-4 py-2" target="_blank" rel="noopener">FOLLOW US</a>
    </section>
</div>

<style>
/*
  Fan layout. Remove the old .social-fan-wrapper / .social-card
  rules from custom.css so they don't conflict with these.
  Fan geometry (tilt, spread, scale, darkness) lives in the JS "POSE" table.
*/
.social-fan-wrapper {
    width: 100%;
    max-width: 1100px;
    cursor: ew-resize;
}

.social-stage {
    position: relative;
    width: 1100px;            /* design size, scaled down on small screens by JS */
    height: 540px;
    transform-origin: top left;
}

.social-fan-wrapper .social-card {
    position: absolute;
    top: 0;
    left: 50%;
    width: 340px;
    height: 420px;
    margin-left: -170px;
    border-radius: 4px;
    overflow: hidden;
    background: #000;
    box-shadow: 0 25px 40px rgba(0, 0, 0, .35);
    transform-origin: center center;
    transition: transform .7s cubic-bezier(.22, .61, .36, 1),
                opacity .7s ease;
    will-change: transform, opacity;
}

.social-fan-wrapper .social-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    user-select: none;
    -webkit-user-select: none;
    -webkit-user-drag: none;
    pointer-events: none;          /* images can't be grabbed or dragged */
    filter: none !important;       /* ignore any old dimming rules */
    opacity: 1 !important;
    mix-blend-mode: normal !important;
}

.social-fan-wrapper .social-card {
    filter: none !important;
    -webkit-user-select: none;
    user-select: none;
}

/* Old overlay layer is hidden; the script adds its own .social-shade layer */
.social-fan-wrapper .social-overlay {
    display: none !important;
}

.social-fan-wrapper .social-shade {
    position: absolute;
    inset: 0;
    background: #000;
    opacity: 0;
    pointer-events: none;
    transition: opacity .3s ease;
}

/* Front card: no dark layer at all, fully bright */
.social-fan-wrapper .social-card.is-center .social-shade {
    opacity: 0 !important;
    transition: opacity .15s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var wrapper = document.querySelector('.social-fan-wrapper');
    if (!wrapper) return;
    var stage = wrapper.querySelector('.social-stage');
    var cards = Array.prototype.slice.call(stage.querySelectorAll('.social-card'));
    var n = cards.length;
    var half = Math.floor(n / 2);

    // own dark layer per card + make sure images can't be dragged
    cards.forEach(function (card) {
        var shade = document.createElement('div');
        shade.className = 'social-shade';
        card.appendChild(shade);
        var img = card.querySelector('.social-img');
        if (img) img.setAttribute('draggable', 'false');
    });
    var DESIGN_W = 1100, DESIGN_H = 540;
    var DELAY = 700;                 // ms between steps (match the .7s CSS transition)

    /* POSE per distance from the center card: x/y offset (px), rotation (deg),
       scale, overlay darkness (0-1), opacity. Tweak these to fine-tune the fan. */
    var POSE = [
        { x: 0,   y: 0,  r: 0,  s: 1,    ov: 0,    o: 1, z: 50 },   // center
        { x: 152, y: 21, r: 12, s: .92,  ov: .55,  o: 1, z: 40 },   // next to center (dark)
        { x: 291, y: 48, r: 24, s: .84,  ov: .72,  o: 1, z: 30 },   // outer (darker)
        { x: 400, y: 80, r: 32, s: .76,  ov: .8,   o: 0, z: 20 }    // hidden (used when a card loops around)
    ];

    var active = Math.floor(n / 2);   // start with the middle card centered
    var timer = null, dir = 0;

    // circular distance of card i from the active card, in the range -half .. +half
    function offsetOf(i) {
        return ((i - active + half) % n + n) % n - half;
    }

    function pose(card, d, hidden) {
        var sign = d < 0 ? -1 : 1;
        var p = hidden ? POSE[3] : POSE[Math.min(Math.abs(d), 3)];
        card.style.transform =
            'translate(' + (sign * p.x) + 'px,' + p.y + 'px) ' +
            'rotate(' + (sign * p.r) + 'deg) scale(' + p.s + ')';
        card.style.opacity = p.o;
        card.style.zIndex = p.z;
        card.classList.toggle('is-center', !hidden && d === 0);
        card.querySelector('.social-shade').style.opacity = p.ov;
    }

    function render(first) {
        cards.forEach(function (card, i) {
            var d = offsetOf(i);
            var prev = card._d;
            card._d = d;

            if (first || prev === undefined || Math.abs(d - prev) <= 1) {
                pose(card, d, false);          // normal one-step move
                return;
            }

            // This card is looping around the circle: fade it out on the old
            // side, silently jump to the new side, then glide it back in.
            clearTimeout(card._t);
            pose(card, prev, true);                              // exit (hidden, old side)
            card._t = setTimeout(function () {
                card.style.transition = 'none';
                pose(card, d, true);                              // park hidden on the new side
                void card.offsetWidth;                            // flush styles
                card.style.transition = '';
                requestAnimationFrame(function () { pose(card, d, false); });   // glide in
            }, DELAY * 0.5);
        });
    }

    /* direction: -1 = cards slide right (previous card comes to center)
                  +1 = cards slide left  (next card comes to center) */
    function step(direction) {
        active = (active + direction + n) % n;
        render(false);
    }

    function stop() {
        clearInterval(timer);
        timer = null;
        dir = 0;
    }

    function start(direction) {
        if (dir === direction) return;
        stop();
        dir = direction;
        step(direction);
        timer = setInterval(function () { step(direction); }, DELAY);
    }

    function fit() {
        var k = Math.min(1, wrapper.clientWidth / DESIGN_W);
        stage.style.transform = 'scale(' + k + ')';
        stage.style.marginLeft = ((wrapper.clientWidth - DESIGN_W * k) / 2) + 'px';
        wrapper.style.height = (DESIGN_H * k) + 'px';
    }

    wrapper.addEventListener('mousemove', function (e) {
        var r = wrapper.getBoundingClientRect();
        var x = (e.clientX - r.left) / r.width;
        if (x < 0.4) start(-1);          // hover left  -> cards slide to the right
        else if (x > 0.6) start(1);      // hover right -> cards slide to the left
        else stop();                     // middle zone pauses
    });
    wrapper.addEventListener('mouseleave', stop);
    wrapper.addEventListener('dragstart', function (e) { e.preventDefault(); });
    wrapper.addEventListener('selectstart', function (e) { e.preventDefault(); });
    window.addEventListener('resize', fit);

    fit();
    render(true);
});
</script>
<!-- =================== END SOCIAL MEDIA SECTION =================== -->