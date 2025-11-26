<?php 
$facebook = get_option('facebook');
$twitter = get_option('twitter');
$linkedin = get_option('linkedin');   
$instagram = get_option('instagram');   
$youtube = get_option('youtube');   
$pinterest = get_option('pinterest');   
$reddit = get_option('reddit');   
$footer_content = get_option('content_data');  

?>


</main>
<!--<section class="footer-sec bg-[#202020] mt-[80px] md:mt-[120px] lg:mt-[130px] xl:mt-[140px] 2xl:mt-[150px]"> -->
<section class="footer-sec bg-[#202020] mt-[40px] md:mt-[60px] lg:mt-[70px] xl:mt-[80px] 2xl:mt-[90px]"> 
    <div class="container mx-auto">
        <div class="footer-main">
            <div class="footer-detail w-full xl:w-[30%]">
                <a href="<?php echo home_url(); ?>">
                    <figure class="rounded-none m-0 w-[260px] h-[46px]">
                        <?php echo footer_logo_url(); ?>
                    </figure>
                </a>
                
                <p class="footer-desc"><?php echo $footer_content; ?></p>
               <div class="icon-sec">
                    <?php if ($facebook || $twitter || $linkedin || $instagram || $youtube || $pinterest || $reddit) : ?>
                
                        <?php if ($facebook) : ?>
                            <a href="<?php echo $facebook; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="Facebook">
                                <svg class="group-hover:fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#979797">
                                    <path d="M9.33366 9.00016H11.0003L11.667 6.3335H9.33366V5.00016C9.33366 4.3135 9.33366 3.66683 10.667 3.66683H11.667V1.42683C11.4497 1.39816 10.629 1.3335 9.76233 1.3335C7.95233 1.3335 6.66699 2.43816 6.66699 4.46683V6.3335H4.66699V9.00016H6.66699V14.6668H9.33366V9.00016Z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                
                        <?php if ($twitter) : ?>
                            <a href="<?php echo $twitter; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="Twitter">
                                <svg class="group-hover:fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#979797">
                                    <path d="M9.48942 6.77491L15.3177 0H13.9366L8.87589 5.88256L4.83392 0H0.171997L6.28424 8.89547L0.171997 16H1.55319L6.89742 9.78782L11.166 16H15.828L9.48908 6.77491H9.48942ZM7.59768 8.97384L6.97839 8.08805L2.05086 1.03974H4.17229L8.14887 6.72795L8.76816 7.61374L13.9372 15.0075H11.8158L7.59768 8.97418V8.97384Z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                
                        <?php if ($linkedin) : ?>
                            <a href="<?php echo $linkedin; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="LinkedIn">
                                <svg class="group-hover:fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#979797">
                                    <path d="M4.62764 3.33345C4.62739 3.87632 4.29804 4.36484 3.79488 4.56865C3.29172 4.77246 2.71523 4.65086 2.33725 4.2612C1.95927 3.87152 1.85528 3.2916 2.07432 2.79488C2.29336 2.29816 2.79168 1.98383 3.3343 2.00012C4.05502 2.02175 4.62796 2.61241 4.62764 3.33345ZM4.66764 5.65345H2.00097V14.0001H4.66764V5.65345ZM8.88098 5.65345H6.22764V14.0001H8.85432V9.6201C8.85432 7.1801 12.0343 6.95343 12.0343 9.6201V14.0001H14.6677V8.71343C14.6677 4.60012 9.96099 4.75345 8.85432 6.77343L8.88098 5.65345Z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                
                        <?php if ($instagram) : ?>
                            <a href="<?php echo $instagram; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-[#000000]" width="24" height="24" viewBox="0 0 24 24" fill="#979797">
                                    <path d="M7.75 2A5.75 5.75 0 0 0 2 7.75v8.5A5.75 5.75 0 0 0 7.75 22h8.5A5.75 5.75 0 0 0 22 16.25v-8.5A5.75 5.75 0 0 0 16.25 2h-8.5zm0 1.5h8.5A4.25 4.25 0 0 1 20.5 7.75v8.5A4.25 4.25 0 0 1 16.25 20.5h-8.5A4.25 4.25 0 0 1 3.5 16.25v-8.5A4.25 4.25 0 0 1 7.75 3.5zM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 1.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zm5.25-.75a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                
                        <?php if ($youtube) : ?>
                            <a href="<?php echo $youtube; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="YouTube">
                              <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-[#000000]" width="24" height="24" viewBox="0 0 24 24" fill="#979797">
                                <path d="M23.498 6.186c-.272-1.02-1.073-1.82-2.093-2.093C19.59 3.5 12 3.5 12 3.5s-7.59 0-9.405.593C1.575 4.366.774 5.166.502 6.186.001 8.02 0 12 0 12s0 3.98.502 5.814c.272 1.02 1.073 1.82 2.093 2.093C4.41 20.5 12 20.5 12 20.5s7.59 0 9.405-.593c1.02-.272 1.82-1.073 2.093-2.093.501-1.834.502-5.814.502-5.814s-.001-3.98-.502-5.814zM9.75 15.02V8.98l6.25 3.02-6.25 3.02z"/>
                              </svg>
                            </a>

                        <?php endif; ?>
                
                        <?php if ($pinterest) : ?>
                            <a href="<?php echo $pinterest; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="Pinterest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-[#000000]" width="24" height="24" viewBox="0 0 24 24" fill="#979797">
                                    <path d="M12 2C6.489 2 2 6.38 2 11.816c0 3.353 1.889 6.27 4.83 7.578-.068-.645-.13-1.637.026-2.343.142-.614.92-3.906.92-3.906s-.235-.474-.235-1.175c0-1.101.64-1.922 1.434-1.922.675 0 1 0.508 1 1.116 0 .679-.43 1.694-.653 2.636-.188.797.396 1.447 1.174 1.447 1.409 0 2.49-1.49 2.49-3.64 0-1.899-1.365-3.229-3.317-3.229-2.26 0-3.587 1.694-3.587 3.446 0 .68.26 1.408.584 1.804.064.079.073.149.056.229-.06.26-.194.817-.22.931-.033.143-.106.173-.243.104-.908-.42-1.477-1.735-1.477-2.793 0-2.277 1.658-4.37 4.783-4.37 2.51 0 4.459 1.788 4.459 4.182 0 2.494-1.57 4.5-3.751 4.5-.733 0-1.423-.38-1.657-.832l-.45 1.708c-.163.627-.604 1.415-.9 1.896.675.204 1.39.315 2.134.315 5.511 0 10-4.38 10-9.816S17.511 2 12 2z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($reddit) : ?>
                            <a href="<?php echo esc_url($reddit); ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="Reddit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="#979797" class="transition-all duration-300 group-hover:fill-[#FF4500]">
                                    <path d="M24 11.779a2.49 2.49 0 0 0-4.237-1.748c-1.017-.707-2.371-1.157-3.868-1.219l.818-3.856 2.701.573a1.765 1.765 0 1 0 .183-.868l-3.037-.646a.434.434 0 0 0-.512.326l-.957 4.518c-1.552.058-2.949.509-4.004 1.23a2.49 2.49 0 1 0-2.688 4.108c-.019.17-.029.343-.029.518 0 2.603 3.13 4.72 6.974 4.72s6.974-2.117 6.974-4.72c0-.173-.01-.344-.029-.513A2.49 2.49 0 0 0 24 11.779ZM8.733 12.444a1.126 1.126 0 1 1 0 2.252 1.126 1.126 0 0 1 0-2.252Zm6.583 3.894c-.792.79-2.299.854-3.319.854s-2.527-.064-3.319-.854a.434.434 0 1 1 .614-.614c.511.511 1.63.673 2.705.673s2.194-.162 2.705-.673a.434.434 0 1 1 .614.614ZM15.22 14.7a1.126 1.126 0 1 1 0-2.252 1.126 1.126 0 0 1 0 2.252Z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div><br>
                
                
                <!--google badge-->
                 <a href="https://www.google.com/preferences/source?q=swiperightstories.com" target="_blank"   style="position: relative;  display: inline-block; "   onmouseover="this.querySelector('.tip').style.opacity='1';" onmouseout="this.querySelector('.tip').style.opacity='0';" >
                            <img src="<?php echo get_template_directory_uri(); ?>/images/swiperightstories.png" alt="Badge" class=""   style="width:300px; height:auto;"/>
                        <!-- Tooltip element -->
                        <span class="tip"
                              style="
                                  position: absolute;
                                  bottom: 110%;
                                  left: 50%;
                                  transform: translateX(-50%);
                                  background: #fff;
                                  color: #000;
                                  padding: 6px 10px;
                                  border-radius: 6px;
                                  font-size: 12px;
                                  white-space: nowrap;
                                  opacity: 0;
                                  pointer-events: none;
                                  transition: opacity .25s ease;
                              ">
                            Follow us on Google
                        </span>
                        </a>
                
                
            </div>
            <div class="footer-category-wrapper flex flex-col md:flex-row md:gap-[110px] justify-between w-full xl:w-[60%] mt-10 xl:mt-0">
                <div class="footer-list-sec md:w-[40%] xl:w-[50%]">
                    <div class="footer-box-sec">                        
                        <?php
                        $locations = get_nav_menu_locations();
                        $cat_menu = wp_get_nav_menu_object( $locations[ 'categories-menu' ] );
                        $cat_menu_items = wp_get_nav_menu_items($cat_menu->term_id); ?>

                        <h2 class="footer-list-title"><?php echo $cat_menu->name; ?></h2>
                        <ul class="footer-list-box">
                            <?php foreach ($cat_menu_items as $cat_menu_item) { ?>
                            <li>
                                <a class="footer-list footer-hov" href="<?php echo $cat_menu_item->url; ?>">
                                    <?php echo $cat_menu_item->title; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="footer-box-sec">
                        <?php
                        $locations = get_nav_menu_locations();
                        $useful_menu = wp_get_nav_menu_object( $locations[ 'useful-links' ] );
                        $useful_menu_items = wp_get_nav_menu_items($useful_menu->term_id); ?>
                        <h2 class="footer-list-title"><?php echo $useful_menu->name; ?></h2>
                        <ul class="footer-list-box">
                            <?php foreach ($useful_menu_items as $useful_menu_item) { ?>
                            <li>
                                <a class="footer-list footer-hov" href="<?php echo $useful_menu_item->url; ?>">
                                    <?php echo $useful_menu_item->title; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="footer-subscribe-sec md:w-[60%] xl:w-[50%] mt-4 md:mt-0">
                    <h2 class="footer-list-title">Newsletter</h2>
                    <?php echo do_shortcode( '[email-subscribers-form id="1"]' ); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrapper">
        <div class="container mx-auto copyright-sec">
            <p class="copyright">
                <svg class="pb-[2px]" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0.5C3.86463 0.5 0.5 3.86463 0.5 8C0.5 12.1354 3.86463 15.5 8 15.5C12.1354 15.5 15.5 12.1354 15.5 8C15.5 3.86463 12.1354 0.5 8 0.5ZM8 1.65385C11.5111 1.65385 14.3462 4.48888 14.3462 8C14.3462 11.5111 11.5111 14.3462 8 14.3462C4.48888 14.3462 1.65385 11.5111 1.65385 8C1.65385 4.48888 4.48888 1.65385 8 1.65385ZM7.94591 4.53846C6.02809 4.53846 4.48438 6.08218 4.48438 8C4.48438 9.91782 6.02809 11.4615 7.94591 11.4615C9.32963 11.4615 10.5128 10.6322 11.0649 9.46034L10.0192 8.97356C9.64739 9.76457 8.86989 10.3077 7.94591 10.3077C6.63206 10.3077 5.63822 9.31385 5.63822 8C5.63822 6.68615 6.63206 5.69231 7.94591 5.69231C8.86989 5.69231 9.64739 6.23543 10.0192 7.02644L11.0649 6.53966C10.5128 5.36779 9.32963 4.53846 7.94591 4.53846Z" fill="#979797" />
                </svg><?php echo get_the_date('Y'); ?> Swipe Right Stories.
            </p>
            <p class="copyright">All Rights Reserved.</p>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

<script>
    // Slider
    var swiper = new Swiper(".mySwiper-one", {
        spaceBetween: 20,
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 2.3,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 2.9,
            spaceBetween: 50,
          },
          1536: {
            slidesPerView: 4.2,
            spaceBetween: 50,
          },
        },
    });

    // hamburger-menu
    $(document).ready(function() {
        $('.ham-dropdown').click(function() {
            $(".ham-dropdown").toggleClass("change-icon");
            $(".ham-content").toggleClass("change");
        })
    });

    // Navbar submenu
    var acc2 = document.getElementsByClassName("ham-accordion");
    var j;

    for (j = 0; j < acc2.length; j++) {
        acc2[j].addEventListener("click", function() {
            this.classList.toggle("active");
            var newPanel = this.nextElementSibling;
            newPanel.classList.toggle("pt-2");
            if (newPanel.style.maxHeight) {
                newPanel.style.maxHeight = null;
            } else {
                newPanel.style.maxHeight = newPanel.scrollHeight + "px";
            }
        });
    }
</script>

</body>
</html>