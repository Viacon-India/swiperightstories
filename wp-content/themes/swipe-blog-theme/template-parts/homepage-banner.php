<style>
    
    /* Google Fonts Import */
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600&display=swap');
    
    
/* Main Layout */
.split-layout {
  min-height: calc(100vh - 84px);
  /*background-color: var(--dark-bg);*/
  background-color: #000;
}

/* Left Content Section */
.left-content-wrapper {
  z-index: 2;
  position: relative;
}

.hero-title {
  font-family: var(--font-heading);
  font-size: 5.5rem;
  letter-spacing: 0.5px;
  line-height: 1;
  text-transform: uppercase;
  color: #ffffff;
}

.hero-text {
  color: var(--text-gray);
  font-size: 1.1rem;
  line-height: 1.8;
  max-width: 550px;
  font-weight: 400;
  color: #9E9E9E;
}

/* Stats Section */
.stats-row {
  max-width: 600px;
}

.stat-number {
  font-family: var(--font-heading);
  color: var(--primary-orange);
  font-size: 2.8rem;
  letter-spacing: 0.5px;
  color:#FE4705;
}

.stat-label {
  color: var(--text-gray);
  font-size: 14px;
  font-weight: 600;
  white-space: nowrap;
  color: #9E9E9E;
}

.stat-col {
  position: relative;
}

.stat-col:not(:last-child)::after {
  content: '';
  position: absolute;
  right: 0;
  top: 15%;
  height: 70%;
  width: 1px;
  background-color: #333333;
}

/* Right Image Grid Section */
.grid-container {
  height: calc(100vh - 84px);
  overflow: hidden;
  position: relative;
  padding: 60px 40px; /* buffer space to prevent scale clipping at boundaries */
}

.grid-column {
  display: flex;
  flex-direction: column;
  gap: 15px;
  will-change: transform;
}

.grid-block {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

/* Animations */
.scroll-up {
  animation: scrollUpAnim 30s linear infinite;
}

.scroll-down {
  animation: scrollDownAnim 30s linear infinite;
}

@keyframes scrollUpAnim {
  0% { transform: translateY(0%); }
  100% { transform: translateY(calc(-33.33333% - 5px)); }
}

@keyframes scrollDownAnim {
  0% { transform: translateY(calc(-33.33333% - 5px)); }
  100% { transform: translateY(0%); }
}

/* Elevate column and pause animation on hover to prevent side image collapse/clipping */
.column-wrapper {
  z-index: 1;
}

.column-wrapper:hover {
  z-index: 100;
}

.column-wrapper:hover .grid-column {
  animation-play-state: paused;
}

.grid-img {
  width: 100%;
  height: 35vh;
  min-height: 250px;
  object-fit: cover;
  filter: brightness(0.7);
  transition: all 0.4s ease;
  will-change: transform;
  transform: perspective(1000px);
  flex-shrink: 0;
}

.grid-img:hover {
  filter: brightness(1.1);
  transform: scale(1.05) rotate(2deg);
  box-shadow: 0 15px 30px rgba(0,0,0,0.6);
  z-index: 5;
  position: relative;
}

.grid-img.featured {
  height: 45vh;
  min-height: 300px;
  filter: brightness(1);
}

/* Highlighted Image Corners */
.highlight-wrapper {
  position: relative;
  display: block;
  margin: 0;
  transition: all 0.4s ease;
  will-change: transform;
}

.highlight-wrapper:hover {
  transform: scale(1.25);
  z-index: 5;
}

.highlight-wrapper:hover .grid-img {
  transform: none;
  filter: brightness(1.1);
  border-radius: 12px !important;
  box-shadow: 0 15px 35px rgba(0,0,0,0.6);
}

.corner {
  position: absolute;
  width: 20px;
  height: 20px;
  border-color: #ffffff;
  border-style: solid;
  z-index: 10;
  opacity: 0;
  transform: scale(0.8);
  transition: all 0.3s ease;
}

.highlight-wrapper:hover .corner {
  opacity: 1;
  transform: scale(1);
}

.top-left {
  top: -8px;
  left: -8px;
  border-width: 2px 0 0 2px;
}

.top-right {
  top: -8px;
  right: -8px;
  border-width: 2px 2px 0 0;
}

.bottom-left {
  bottom: -8px;
  left: -8px;
  border-width: 0 0 2px 2px;
}

.bottom-right {
  bottom: -8px;
  right: -8px;
  border-width: 0 2px 2px 0;
}

/* Responsive Design */
@media (max-width: 1200px) {
  .hero-title { font-size: 4.5rem; }
  .grid-img { height: 25vh; min-height: 180px; }
  .grid-img.featured { height: 35vh; min-height: 240px; }
}

@media (max-width: 991.98px) {
  .split-layout {
    height: auto;
  }
  .grid-container {
    height: 65vh;
    padding-top: 2rem;
    padding-bottom: 2rem;
  }
  .hero-title {
    font-size: 3.5rem;
    text-align: center;
  }
  .hero-text {
    text-align: center;
    margin: 0 auto 2rem auto;
  }
  .stat-col:not(:last-child)::after {
    display: none;
  }
  .stat-col {
    text-align: center;
    padding-bottom: 1rem;
    border-bottom: 1px solid #333;
  }
  .stat-col:last-child {
    border-bottom: none;
  }
  .stats-row {
    flex-direction: column;
    align-items: center;
  }
  .stats-row .col-4 {
    width: 100%;
  }
  .left-content-wrapper {
    padding-bottom: 0 !important;
  }
}

/* FLIP Animation Styles */
.animating-clone {
  position: fixed;
  z-index: 10000;
  border-radius: 12px;
  object-fit: cover;
  transition: all 0.6s cubic-bezier(0.77, 0, 0.175, 1);
  box-shadow: 0 25px 50px rgba(0,0,0,0.5);
  cursor: pointer;
  pointer-events: auto;
}

.animating-clone.expanded {
  border-radius: 0;
  box-shadow: none;
}

.hidden-original {
  opacity: 0 !important;
}

/* Pause background animation when image is expanding */
body.lightbox-open .grid-column {
  animation-play-state: paused !important;
}


/* Fix: ensure header always sits above the image grid hover effects */
header,
#masthead,
.site-header,
nav.navbar {
    position: relative;
    z-index: 9999 !important;
}

/* Fix: contain hover scaling within the grid container */
.grid-container {
    isolation: isolate;
    overflow: hidden;  /* already set, but make sure it stays */
}

/* Reduce the scale on hover so it doesn't push beyond the container boundary */
.highlight-wrapper:hover {
    transform: scale(1.15);  /* was 1.25 — toned down slightly */
    z-index: 5;
}

/* Also ensure column wrappers don't bleed past the grid */
.column-wrapper:hover {
    z-index: 100;
    /* Contain within parent stacking context */
    transform: translateZ(0);
}



/* Newsletter Section */
.newsletter-section {
  background-color: #ffb800;
  padding: 80px 20px;
  min-height: 350px;
  border-top: 2px solid #000000;
  border-bottom: 2px solid #000000;
}

.newsletter-headline {
  font-family: var(--font-heading);
  font-size: 3.5rem;
  color: #000000;
  line-height: 1.1;
  text-transform: uppercase;
  margin-bottom: 30px;
  letter-spacing: 0.5px;
}

.newsletter-form .input-group {
  border-radius: 0;
}

.newsletter-input-group .input-group-text {
  border-color: #000;
  border-radius: 0;
  color: #000;
}

.newsletter-input-group .form-control {
  border-color: #000;
  border-radius: 0;
  color: #000;
  font-family: var(--font-body);
  font-weight: 500;
}

.newsletter-input-group .form-control::placeholder {
  color: rgba(0, 0, 0, 0.8);
}

.newsletter-input-group .form-control:focus {
  background-color: transparent;
  outline: none;
  border-color: #000;
  box-shadow: none;
}

.subscribe-btn {
  background-color: #000000;
  color: #ffffff;
  border-radius: 0;
  font-family: var(--font-body);
  font-weight: 600;
  font-size: 0.9rem;
  letter-spacing: 1px;
  text-transform: uppercase;
  border: none;
}

.subscribe-btn:hover {
  background-color: #222222;
}


  /*Social Media Section */
  
  
  
/* Social Media Fanned Section */
.social-heading {
  font-family: var(--font-heading);
  font-size: 3.5rem;
  color: #000000;
  letter-spacing: 1px;
}

.social-fan-wrapper {
  width: 340px;
  height: 420px;
  perspective: 1200px;
}

.social-card {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #000;
  border-radius: 4px;
  overflow: hidden;
  box-shadow: 0 15px 35px rgba(0,0,0,0.4);
  /* removed CSS transition because JS will handle animation ticks directly! */
}

/* Master cylinder rotates smoothly */
.carousel-cylinder {
  will-change: transform;
}

.social-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Static classes removed as JS handles position */

/* Card internal gradient text */
.social-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 40%, rgba(0,0,0,0.8) 75%, rgba(0,0,0,0.95) 100%);
  z-index: 2;
}

.social-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.1);
  z-index: 1;
}

.social-card-title {
  /* Using standard bold font to emulate Oswald / Condensed lowercase rendering */
  font-family: var(--font-body);
  font-weight: 700;
  letter-spacing: -1.5px;
  font-size: 2.2rem;
  color: #ffffff;
  line-height: 1;
  text-transform: none;
}

.dated-badge {
  background-color: #e61a3d;
  color: #fff;
  font-family: var(--font-heading);
  font-size: 1.1rem;
  padding: 4px 16px;
  display: inline-block;
  /* Use clip-path to perfectly emulate the ragged brush stroke background! */
  clip-path: polygon(3% 0, 98% 3%, 100% 95%, 2% 100%);
  transform: rotate(-1deg);
  letter-spacing: 1px;
}

/* Footer layout */
.brand-logo-circle {
  width: 25px;
  height: 25px;
  background-color: #fff;
  border-radius: 50%;
}
.brand-r {
  font-family: var(--font-body);
  font-size: 13px;
  line-height: 1;
}

.social-follow-btn {
  background-color: #ff4f00;
  color: #ffffff;
  border-radius: 2px;
  font-family: var(--font-body);
  font-weight: 700;
  font-size: 0.85rem;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  border: none;
}

.social-follow-btn:hover {
  background-color: #e04500;
  color: #ffffff;
}

/* Responsiveness for extreme mobile sizing */
@media (max-width: 900px) {
  .social-fan-wrapper {
    transform: scale(0.85);
  }
}
@media (max-width: 500px) {
  .social-fan-wrapper {
    transform: scale(0.65);
  }
}

  
  /*mobile rresponsive*/
  
  /* ========================================
   MOBILE-FIRST RESPONSIVE OVERHAUL
   ======================================== */

/* --- Tablet & below (< 992px) --- */
@media (max-width: 991.98px) {

  /* Stack layout vertically */
  .split-layout {
    min-height: auto;
    flex-direction: column;
  }

  /* Left text block — full width, centered, with proper padding */
  .col-lg-6.d-flex.left-content-wrapper {
    width: 100% !important;
    max-width: 100% !important;
    flex: 0 0 100% !important;
    padding: 60px 24px 40px !important;
    text-align: center;
  }

  .left-content-wrapper .pe-lg-5,
  .left-content-wrapper .ms-xl-5 {
    padding-right: 0 !important;
    margin-left: 0 !important;
  }

  .heroSecTitle {
    font-size: 3rem !important;
    text-align: center;
    line-height: 1.05;
    margin-bottom: 20px !important;
  }

  .hero-text {
    font-size: 0.95rem !important;
    text-align: center;
    margin: 0 auto 32px auto !important;
    max-width: 480px;
    line-height: 1.7;
  }

  /* Stats row — horizontal on tablet, stacked on mobile */
  .stats-row {
    max-width: 100%;
    justify-content: center !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    gap: 0 !important;
  }

  .stat-col {
    text-align: center !important;
    padding-bottom: 0 !important;
    border-bottom: none !important;
    flex: 1 !important;
  }

  /* Restore vertical dividers between stats */
  .stat-col:not(:last-child)::after {
    display: block !important;
    content: '';
    position: absolute;
    right: 0;
    top: 10%;
    height: 80%;
    width: 1px;
    background-color: #444;
  }

  .stat-number {
    font-size: 2rem !important;
  }

  .stat-label {
    font-size: 11px !important;
    white-space: normal !important;
    line-height: 1.3;
  }

  /* Image grid — full width, shorter height */
  .col-lg-6.grid-container {
    width: 100% !important;
    max-width: 100% !important;
    flex: 0 0 100% !important;
    height: 55vw !important;
    min-height: 260px;
    max-height: 420px;
    padding: 0 !important;
    overflow: hidden;
  }

  .grid-img {
    height: 22vw !important;
    min-height: 120px !important;
  }

  .grid-img.featured {
    height: 30vw !important;
    min-height: 160px !important;
  }

  /* Disable hover scale on touch devices */
  .highlight-wrapper:hover {
    transform: none !important;
  }

  .grid-img:hover {
    transform: none !important;
  }
}

/* --- Mobile only (< 576px) --- */
@media (max-width: 575.98px) {

  .col-lg-6.d-flex.left-content-wrapper {
    padding: 44px 20px 32px !important;
  }

  .heroSecTitle {
    font-size: 2.4rem !important;
  }

  .hero-text {
    font-size: 0.9rem !important;
    margin-bottom: 28px !important;
  }

  .stat-number {
    font-size: 1.7rem !important;
  }

  .stat-label {
    font-size: 10px !important;
  }

  /* On very small screens, show only 2 columns in the grid */
  .col-lg-6.grid-container .row > .col:last-child {
    display: none;
  }

  .col-lg-6.grid-container {
    height: 50vw !important;
    min-height: 220px;
  }

  .grid-img {
    height: 28vw !important;
    min-height: 100px !important;
  }

  .grid-img.featured {
    height: 36vw !important;
    min-height: 130px !important;
  }
}

/* --- Large desktop (> 1400px) --- */
@media (min-width: 1400px) {
  .heroSecTitle {
    font-size: 5rem !important;
  }
  .hero-text {
    font-size: 1.1rem !important;
  }
}



/*////////////////*/

.animating-clone {
    position: absolute;  /* changed from fixed */
    z-index: 999;
    border-radius: 12px;
    object-fit: cover;
    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
    cursor: pointer;
    pointer-events: auto;
    transition: all 0.6s cubic-bezier(0.77, 0, 0.175, 1);
}
</style>

<div class="container-fluid px-0">
        <div class="row g-0 align-items-center split-layout">
            
            <!-- Left Text Content -->
            <div class="col-lg-6 d-flex flex-column justify-content-center py-5 px-4 px-xl-5 left-content-wrapper">
                <div class="pe-lg-5 ms-xl-5">
                    <!--<h1 class="hero-title text-uppercase mb-4">Swipe Right Stories</h1>-->
                    <h1 class="heroSecTitle">Swipe Right Stories</h1>
                    <p class="hero-text mb-5">
                        Swipe Right Stories is your go-to guide for honest dating advice, app reviews, real stories, and modern love tips. Join us to understand love in modern times and to navigate online dating with confidence. Swipe Right Stories is your go-to guide for honest dating advice,
                    </p>
                    
                    <div class="row stats-row g-3">
                        <div class="col-4 stat-col">
                            <h2 class="stat-number mb-1" data-target="500" data-suffix="+">0</h2>
                            <p class="stat-label mb-0">Comparison Lists</p>
                        </div>
                        <div class="col-4 stat-col">
                           <h2 class="stat-number mb-1" data-target="5000" data-suffix="+">0</h2>
                            <p class="stat-label mb-0">Hours of Research</p>
                        </div>
                        <div class="col-4 stat-col border-0">
                           <h2 class="stat-number mb-1" data-target="500" data-suffix="+">0</h2>
                            <p class="stat-label mb-0">Happy Subscriber's</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Image Grid Content -->
             <div class="col-lg-6 grid-container">
                <div class="row w-100 mx-0 mt-0 h-100 align-items-center justify-content-center px-3 px-xl-5" style="gap: 15px; flex-wrap: nowrap;">
                    
                    <!-- Left Column -->
                    <div class="col px-0 column-wrapper h-100 position-relative">
                        <div class="grid-column scroll-up" style="animation-delay: 0s;">
                            <div class="grid-block">
                                <!--<img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600&h=450&fit=crop" alt="Food Date" class="grid-img rounded">-->
                                <img src="<?php echo get_template_directory_uri(); ?>/images/1.jpg" alt="Food Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/2.jpg" alt="Coffee Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/3.jpg" alt="Field Couple" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/4.jpg" alt="Field Couple" class="grid-img rounded">
                            </div>
                            <div class="grid-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/5.jpg" alt="Food Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/6.jpg" alt="Coffee Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/7.jpg" alt="Field Couple" class="grid-img rounded">
                            </div>
                            <!-- Duplicates for seamless scroll -->
                            <div class="grid-block">
                                 <img src="<?php echo get_template_directory_uri(); ?>/images/1.jpg" alt="Food Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/2.jpg" alt="Coffee Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/3.jpg" alt="Field Couple" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/4.jpg" alt="Field Couple" class="grid-img rounded">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Middle Highlighted Column -->
                    <div class="col px-0 column-wrapper h-100 position-relative">
                        <div class="grid-column scroll-down" style="animation-delay: -12.5s;">
                            <div class="grid-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/8.jpg" alt="Indoor Couple" class="grid-img rounded">
                                <div class="highlight-wrapper">
                                    <span class="corner top-left"></span>
                                    <span class="corner top-right"></span>
                                    <span class="corner bottom-left"></span>
                                    <span class="corner bottom-right"></span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/9.jpg" alt="Featured Couple" class="grid-img featured rounded">
                                </div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/10.jpg" alt="Close Up Couple" class="grid-img rounded">
                            </div>
                            <div class="grid-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/11.jpg" alt="Indoor Couple" class="grid-img rounded">
                                <div class="highlight-wrapper">
                                    <span class="corner top-left"></span>
                                    <span class="corner top-right"></span>
                                    <span class="corner bottom-left"></span>
                                    <span class="corner bottom-right"></span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/12.jpg" alt="Featured Couple" class="grid-img featured rounded">
                                </div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/13.jpg" alt="Close Up Couple" class="grid-img rounded">
                            </div>
                            <!-- Duplicates for seamless scroll -->
                            <div class="grid-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/14.jpg" alt="Indoor Couple" class="grid-img rounded">
                                <div class="highlight-wrapper">
                                    <span class="corner top-left"></span>
                                    <span class="corner top-right"></span>
                                    <span class="corner bottom-left"></span>
                                    <span class="corner bottom-right"></span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/15.jpg" alt="Featured Couple" class="grid-img featured rounded">
                                </div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/16.jpg" alt="Close Up Couple" class="grid-img rounded">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="col px-0 column-wrapper h-100 position-relative">
                        <div class="grid-column scroll-up" style="animation-delay: -9.5s;">
                            <div class="grid-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/17.jpg" alt="Food Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/18.jpg" alt="Coffee Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/19.jpg" alt="Field Couple" class="grid-img rounded">
                            </div>
                            <div class="grid-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/20.jpg" alt="Food Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/21.jpg" alt="Coffee Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/22.jpg" alt="Field Couple" class="grid-img rounded">
                            </div>
                            <!-- Duplicates for seamless scroll -->
                            <div class="grid-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/23.jpg" alt="Food Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/22.jpg" alt="Coffee Date" class="grid-img rounded">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/10.jpg" alt="Field Couple" class="grid-img rounded">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
 
            
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Basic init confirmation
    console.log('Swipe Right Stories - Application initialized.');

    // Dynamically wrap all images to enable the "active design" brackets universally on hover
    const images = document.querySelectorAll('.grid-img');
    images.forEach(img => {
        // If it's already wrapped (e.g. the featured image from HTML template), skip native wrapping
        if (img.parentElement.classList.contains('highlight-wrapper')) return;

        // Create the wrapper securely around the image
        const wrapper = document.createElement('div');
        wrapper.className = 'highlight-wrapper';

        // Add corners
        const positions = ['top-left', 'top-right', 'bottom-left', 'bottom-right'];
        positions.forEach(pos => {
            const span = document.createElement('span');
            span.className = `corner ${pos}`;
            wrapper.appendChild(span);
        });

        // Wrap the image
        img.parentNode.insertBefore(wrapper, img);
        wrapper.appendChild(img);
    });

    // Expand Image FLIP Animation Functionality
    let activeClone = null;
    let originalImage = null;

    document.addEventListener('click', (e) => {
        // Close if clicking the active clone or anywhere on the right side while expanded
        if (activeClone) {
            closeExpandedImage();
            return;
        }

        // Open if clicking a grid image wrapper
        const wrapper = e.target.closest('.highlight-wrapper');
        if (wrapper && !activeClone) {
            const img = wrapper.querySelector('.grid-img');
            if (img) expandImage(img);
        }
    });

  function expandImage(img) {
    if (activeClone) return;

    originalImage = img;
    const rect = img.getBoundingClientRect();
    const targetContainer = document.querySelector('.grid-container');
    const targetRect = targetContainer.getBoundingClientRect();

    // Create clone
    activeClone = document.createElement('img');
    activeClone.src = img.src;
    activeClone.className = 'animating-clone';

    // Position relative to the grid-container (not body)
    activeClone.style.position = 'absolute';
    activeClone.style.top = `${rect.top - targetRect.top}px`;
    activeClone.style.left = `${rect.left - targetRect.left}px`;
    activeClone.style.width = `${rect.width}px`;
    activeClone.style.height = `${rect.height}px`;
    activeClone.style.zIndex = '999';
    activeClone.style.objectFit = 'cover';
    activeClone.style.borderRadius = '12px';
    activeClone.style.transition = 'all 0.6s cubic-bezier(0.77, 0, 0.175, 1)';
    activeClone.style.cursor = 'pointer';

    // Append to grid-container instead of body
    targetContainer.style.position = 'relative'; // ensure positioning context
    targetContainer.appendChild(activeClone);

    originalImage.classList.add('hidden-original');
    document.body.classList.add('lightbox-open');

    // Trigger reflow
    activeClone.offsetHeight;

    // Expand to fill the grid-container
    activeClone.style.top = '0px';
    activeClone.style.left = '0px';
    activeClone.style.width = '100%';
    activeClone.style.height = '100%';
    activeClone.style.borderRadius = '0';
}

function closeExpandedImage() {
    if (!activeClone || !originalImage) return;

    const targetContainer = document.querySelector('.grid-container');
    const targetRect = targetContainer.getBoundingClientRect();
    const rect = originalImage.getBoundingClientRect();

    activeClone.style.top = `${rect.top - targetRect.top}px`;
    activeClone.style.left = `${rect.left - targetRect.left}px`;
    activeClone.style.width = `${rect.width}px`;
    activeClone.style.height = `${rect.height}px`;
    activeClone.style.borderRadius = '12px';

    activeClone.addEventListener('transitionend', function cleanup() {
        if (activeClone && activeClone.parentNode) {
            activeClone.parentNode.removeChild(activeClone);
        }
        if (originalImage) {
            originalImage.classList.remove('hidden-original');
        }
        document.body.classList.remove('lightbox-open');
        activeClone = null;
        originalImage = null;
    }, { once: true });
}
    
    

    // Initialize Fractional Drag Carousel Interaction
    const fanWrapper = document.querySelector('.social-fan-wrapper');
    if (fanWrapper) initSocialCarousel(fanWrapper);

    function initSocialCarousel(wrapper) {
        const cards = Array.from(wrapper.querySelectorAll('.social-card'));
        const cardCount = cards.length;
        if(cardCount === 0) return;

        let currentProgress = 2; // Card 2 (third card) is Center
        let targetProgress = 2;
        let isDragging = false;
        let startX = 0;
        let lastX = 0;
        let velocity = 0;
        let animationFrameId;

        // Set origin to bottom to emulate hand fan effect exactly like reference screenshot
        cards.forEach(card => card.style.transformOrigin = 'bottom center');

        function updateCarousel() {
            if (!isDragging) {
                targetProgress += velocity;
                velocity *= 0.90; // high friction
                
                // Snap cleanly to nearest card if velocity is low
                if (Math.abs(velocity) < 0.01) {
                    let nearest = Math.round(targetProgress);
                    targetProgress += (nearest - targetProgress) * 0.1;
                }
            }

            // Unbounded dragging allows infinitely looping 360-degree rotations!
            currentProgress += (targetProgress - currentProgress) * 0.15;
            
            // Layout Mathematical mapping
            cards.forEach((card, index) => {
                // Modulo math forces infinite continuous wrapping
                let offset = (index - currentProgress) % cardCount;
                if (offset > cardCount / 2) offset -= cardCount;
                if (offset < -cardCount / 2) offset += cardCount;

                let absOffset = Math.abs(offset);
                
                // Magic numbers to explicitly match provided screenshot!
                let translateX = offset * 110; 
                let rotate = offset * 12;
                let scale = 1 - (absOffset * 0.08);
                if (scale < 0) scale = 0;

                let zIndex = 10 - absOffset * 2;
                let brightness = 1 - (absOffset * 0.35); // dynamic darkening fallback

                // Seamless infinite wrap transparency jump hide
                let opacity = 1.0;
                if (absOffset > 2.0) {
                    opacity = 1.0 - ((absOffset - 2.0) / 0.5); // Fades completely smoothly to 0 by absolute edges
                }

                card.style.transform = `translateX(${translateX}px) rotate(${rotate}deg) scale(${scale})`;
                card.style.zIndex = Math.round(zIndex);
                card.style.filter = `brightness(${Math.max(0.2, brightness)})`;
                card.style.opacity = Math.max(0, opacity);
            });

            if (isDragging || Math.abs(velocity) > 0.001 || Math.abs(targetProgress - currentProgress) > 0.001) {
                animationFrameId = requestAnimationFrame(updateCarousel);
            }
        }

        function startDrag(e) {
            if(e.target.closest('a') || e.target.closest('button')) return;
            isDragging = true;
            startX = e.type.includes('mouse') ? e.pageX : e.touches[0].pageX;
            lastX = startX;
            velocity = 0;
            cancelAnimationFrame(animationFrameId);
            wrapper.style.cursor = 'grabbing';
            updateCarousel();
        }

        function doDrag(e) {
            if (!isDragging) return;
            e.preventDefault();
            const currentX = e.type.includes('mouse') ? e.pageX : e.touches[0].pageX;
            const deltaX = currentX - lastX;
            
            // Map raw pixels directly to fractional carousel index!
            targetProgress -= deltaX * 0.01;
            velocity = -deltaX * 0.01; 
            lastX = currentX;
        }

        function endDrag() {
            if (!isDragging) return;
            isDragging = false;
            wrapper.style.cursor = 'grab';
            updateCarousel();
        }

        wrapper.addEventListener('mousedown', startDrag);
        document.addEventListener('mousemove', doDrag);
        document.addEventListener('mouseup', endDrag);
        wrapper.addEventListener('mouseleave', endDrag);

        wrapper.addEventListener('touchstart', startDrag, { passive: false });
        document.addEventListener('touchmove', doDrag, { passive: false });
        document.addEventListener('touchend', endDrag);
        
        wrapper.style.cursor = 'grab';
        updateCarousel(); // Inject initial state
    }
});




// counter
function animateCounter(el) {
  const target = parseInt(el.dataset.target);
  const suffix = el.dataset.suffix || '';
  const duration = 1800;
  const start = performance.now();

  function tick(now) {
    const elapsed = now - start;
    const progress = Math.min(elapsed / duration, 1);
    const ease = 1 - Math.pow(1 - progress, 3); // ease-out cubic
    const value = Math.round(ease * target);
    el.textContent = value.toLocaleString() + (progress === 1 ? suffix : '');
    if (progress < 1) requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
}

// Trigger when section scrolls into view
const row = document.querySelector('.stats-row');
const observer = new IntersectionObserver((entries) => {
  if (entries[0].isIntersecting) {
    row.querySelectorAll('.stat-number').forEach(animateCounter);
    observer.disconnect(); // only fires once
  }
}, { threshold: 0.3 });
observer.observe(row);

</script>