<?php 
$facebook = get_option('facebook');
$twitter = get_option('twitter');
$linkedin = get_option('linkedin');   
$footer_content = get_option('content_data');  

?>


</main>
<section class="footer-sec bg-[#202020] mt-[80px] md:mt-[120px] lg:mt-[130px] xl:mt-[140px] 2xl:mt-[150px]">
    <div class="container mx-auto">
        <div class="footer-main">
            <div class="footer-detail w-full xl:w-[30%]">
                <figure class="rounded-none m-0 w-[260px] h-[46px]">
                    <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/images/logo2.png" alt="logo" />
                </figure>
                
                <p class="footer-desc"><?php echo $footer_content; ?></p>
                <div class="icon-sec">
                    <?php if ($facebook || $twitter || $linkedin) :
                        if($facebook) : ?>
                        <a href="<?php echo $facebook; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_link">
                            <svg class="group-hover:fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#979797">
                                <g clip-path="url(#clip0_662_2926)">
                                    <path d="M9.33366 9.00016H11.0003L11.667 6.3335H9.33366V5.00016C9.33366 4.3135 9.33366 3.66683 10.667 3.66683H11.667V1.42683C11.4497 1.39816 10.629 1.3335 9.76233 1.3335C7.95233 1.3335 6.66699 2.43816 6.66699 4.46683V6.3335H4.66699V9.00016H6.66699V14.6668H9.33366V9.00016Z" fill="" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_662_2926">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <?php endif;
                        if($twitter) : ?>
                        <a href="<?php echo $twitter; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_link">
                            <svg class="group-hover:fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#979797">
                                <g clip-path="url(#clip0_228_4218)">
                                    <path d="M9.48942 6.77491L15.3177 0H13.9366L8.87589 5.88256L4.83392 0H0.171997L6.28424 8.89547L0.171997 16H1.55319L6.89742 9.78782L11.166 16H15.828L9.48908 6.77491H9.48942ZM7.59768 8.97384L6.97839 8.08805L2.05086 1.03974H4.17229L8.14887 6.72795L8.76816 7.61374L13.9372 15.0075H11.8158L7.59768 8.97418V8.97384Z" fill="" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_228_4218">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <?php endif;
                        if($linkedin) : ?>
                        <a href="<?php echo $linkedin; ?>" class="icon-box group" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_link">
                            <svg class="group-hover:fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#979797">
                                <path d="M4.62764 3.33345C4.62739 3.87632 4.29804 4.36484 3.79488 4.56865C3.29172 4.77246 2.71523 4.65086 2.33725 4.2612C1.95927 3.87152 1.85528 3.2916 2.07432 2.79488C2.29336 2.29816 2.79168 1.98383 3.3343 2.00012C4.05502 2.02175 4.62796 2.61241 4.62764 3.33345ZM4.66764 5.65345H2.00097V14.0001H4.66764V5.65345ZM8.88098 5.65345H6.22764V14.0001H8.85432V9.6201C8.85432 7.1801 12.0343 6.95343 12.0343 9.6201V14.0001H14.6677V8.71343C14.6677 4.60012 9.96099 4.75345 8.85432 6.77343L8.88098 5.65345Z" fill="" />
                            </svg>
                        </a>
                        <?php endif;
                    endif; ?>
                </div>
            </div>
            <div class="footer-category-wrapper flex flex-col md:flex-row md:gap-[110px] justify-between w-full xl:w-[60%] mt-10 xl:mt-0">
                <div class="footer-list-sec md:w-[40%] xl:w-[50%]">
                    <div class="footer-box-sec">
                        <h2 class="footer-list-title">Categories</h2>
                        <ul class="footer-list-box">
                            <li>
                                <a class="footer-list footer-hov" href="">Business</a>
                            </li>
                            <li>
                                <a class="footer-list footer-hov" href="">Entertainment</a>
                            </li>
                            <li>
                                <a class="footer-list footer-hov" href="">Lifestyle</a>
                            </li>
                            <li>
                                <a class="footer-list footer-hov" href="">Society</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-box-sec">
                        <h2 class="footer-list-title">Useful Links</h2>
                        <ul class="footer-list-box">
                            <li>
                                <a class="footer-list footer-hov" href="">About Us</a>
                            </li>
                            <li>
                                <a class="footer-list footer-hov" href="">Contact Us</a>
                            </li>
                            <li>
                                <a class="footer-list footer-hov" href="">Write For Us</a>
                            </li>
                            <li>
                                <a class="footer-list footer-hov" href="">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-subscribe-sec md:w-[60%] xl:w-[50%] mt-4 md:mt-0">
                    <h2 class="footer-list-title">Newsletter</h2>
                    <input class="footer-subs-input" type="text" placeholder="Email Address">
                    <button class="footer-subs-btn">Subscribe</button>
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
            <p class="copyright">All Rights Reversed.</p>
        </div>
    </div>

</section>




<?php wp_footer(); ?>



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<?php wp_footer(); ?>

<script>
    // Slider
    var swiper = new Swiper(".mySwiper-one", {
        slidesPerView: 4.5,
        spaceBetween: 20,
        scrollbar: {
            el: ".swiper-scrollbar",
            // hide: true,
        },
    });


    // hamburger-menu
    var newMenu = document.querySelector(".ham-dropdown");
    var dropMenu = document.querySelector(".ham-content");


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