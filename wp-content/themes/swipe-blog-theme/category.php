<?php get_header(); ?>

<div class="category-page pt-[68px]">
    <figure class="w-full h-[450px]">
        <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/images/contact-img.jpg" alt="category-image">
    </figure>
    <div class="container mx-auto mt-[60px]">
        <div class="flex gap-2">
            <a href="" class="single-page-cat">
                Home
            </a>
            <a href="" class="single-page-cat">
                DATING Apps
            </a>
        </div>
        <h2 class="text-[#000000] text-[80px] font-MorganiteBold uppercase leading-[1] ">Dating Apps</h2>
        <p class="text-[15px] sm:text-[16px] font-Poppins font-normal first:mt-0
                  mt-[8px] sm:mt-[9px] md:mt-[10px] lg:mt-[11px] xl:mt-[12px] 2xl:mt-[13px] 3xl:mt-[14px]
                  mb-[16px] sm:mb-[18px] md:mb-[20px] lg:mb-[22px] xl:mb-[24px] 2xl:mb-[26px] 3xl:mb-[24px]">The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin. There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.</p>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-10">
            <?php
            for ($i = 0; $i < 9; $i++) {
                echo '
                    <div class="default-card">
                        <figure>
                            <img src="' . get_template_directory_uri() . '/images/card1.jpg" alt="card" />
                        </figure>
                        <div class="default-card-detail">
                            <p>outfits</p>
                            <h2>Sézane’s New Spring Collection is Full of Pieces You’ll Never Get Sick Of Wearing</h2>
                        </div>
                    </div>';
            }
            ?>
        </div>
        <div class="flex justify-center">
            <button class="single-page-comment-from-submit-button">More Articles</button>
        </div>
    </div>
</div>

<?php get_footer(); ?>