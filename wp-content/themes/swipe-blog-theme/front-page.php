<?php get_header();

$recent_posts = get_posts(
    array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order'   => 'DESC',
        'posts_per_page' => 5,
        'orderby' => 'date',
    )
);

// $most_viewed_posts = get_posts(
//     array(
//         'post_type' => 'post',
//         'post_status' => 'publish',
//         'order'   => 'DESC',
//         'posts_per_page' => 7,
//         'meta_key' => 'post_views_count',
//         'orderby' => 'meta_value_num',
//     )
// );

$dating_diary_posts = get_posts( 
    array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'order'          => 'DESC',
        'posts_per_page' => 7,
        'orderby'        => 'meta_value_num',
        'category_name'  => 'dating-diary', // only posts from "dating-diary" category
    )
);


$category_slugs = ['dating-apps', 'modern-dating', 'dating-diary', 'find'];
$category_one_query = new WP_Query(
    array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name'     => $category_slugs[0],
        'posts_per_page' => 3,
    )
);


$category_two_query = new WP_Query(
    array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name'     => $category_slugs[1],
        'posts_per_page' => 3,
    )
);


$category_three_query = new WP_Query(
    array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name'     => $category_slugs[2],
        'posts_per_page' => 3,
    )
);


$category_four_query = new WP_Query(
    array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name'     => $category_slugs[3],
        'posts_per_page' => 3,
    )
);


?>

<!--Banner Section-->

<?php get_template_part( '/template-parts/homepage-banner' ); ?>

<!--Banner Section-->

 <div class="default-card-sec mb-[40px] lg:mb-[100px]">
    <div class="container mx-auto">
        <h2 class="section-title" style="padding-top:20px;">Dating Apps</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">
            <?php
            $category_four_query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'category_name'  => 'dating-apps',
            ]);

            if ($category_four_query->have_posts()) {
                while ($category_four_query->have_posts()) {
                    $category_four_query->the_post();
                    get_template_part('template-parts/content', 'default-card');
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</div>


<div class="page-wrapper pt-[60px]">

    <?php if(!empty($recent_posts) && is_array($recent_posts)) { ?>
        <div class="hero-sec py-[44px] md:py-[40px] 2xl:py-[160px] bg-[#FE4705]">
            <div class="container mx-auto">
                <?php if($recent_posts[0]) : ?>
                    <div class="hero-main">
                        <div class="hero-detail">
                            <h1 class="heroSecTitle"><?php echo get_the_title($recent_posts[0]->ID); ?></h1>
                            <p class="heroSecDetail"><?php echo get_post_meta($recent_posts[0]->ID, 'post_sub_title', true); ?></p>
                            <a class="readMoreBtn group" href="<?php echo get_the_permalink($recent_posts[0]); ?>">READ MORE
                                <svg class="group-hover:fill-[#FE4705]" width="6" height="7" viewBox="0 0 6 7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.55791 2.84999L1.12017 0.188122C0.915227 0.065106 0.708732 0 0.537094 0C0.205266 0 0 0.233339 0 0.623918V6.37699C0 6.76711 0.205008 7 0.53606 7C0.707956 7 0.911153 6.93484 1.11655 6.81148L5.55636 4.14967C5.84188 3.97821 6 3.74748 6 3.49969C6.00006 3.25207 5.84375 3.02139 5.55791 2.84999Z" fill="" />
                                </svg>
                            </a>
                        </div>
                        <div class="hero-img-sec">
                            <figure class="w-full h-[254px] md:h-[517px]">
                                <?php if (has_post_thumbnail($recent_posts[0]->ID)) : ?>
                                    <?php echo get_the_post_thumbnail($recent_posts[0]->ID, 'full', array('class' => 'w-full h-full object-contain')); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/card3.jpg" class="w-full h-full object-contain" alt="card" />     
                                <?php endif; ?>
                            </figure>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php } ?>

    <div class="common-slider-sec">
        <div class="infiniteSlider">
            <div class="slide-track">
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
                <div class="slide">
                    <h3>STORIES</h3>
                </div>
            </div>
        </div>
    </div>

    <?php 
    
    
    if($dating_diary_posts) : ?>

    <div class="scroller-slider relative pb-[50px]">
        <div class="swiper mySwiper-one bg-[#FFFFFF] pl-10 h-[440px]">
            <div class="swiper-wrapper">

                <?php foreach($dating_diary_posts as $post_by_viewed) { ?>                                    

                    <div class="swiper-slide">
                        <div class="scroller-card">
                            <a href="<?php echo get_the_permalink( $post_by_viewed->ID); ?>">
                                <figure>
                                    <?php if (has_post_thumbnail($post_by_viewed->ID)) : ?>
                                    <?php /* echo get_the_post_thumbnail($post_by_viewed->ID, 'related-thumbnail', array('class' => 'w-full h-full object-contain')); */ ?>
                                    <?php echo get_the_post_thumbnail(
                                            $post_by_viewed->ID,
                                            'large',
                                            ['class' => 'w-full h-full object-cover']
                                        ); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" class="w-full h-full object-contain" alt="card" />     
                                    <?php endif; ?>
                                    
                                    <div class="scroller-overlay">
                                        <p><?php echo get_the_title($post_by_viewed->ID); ?></p>
                                    </div>
                                </figure>
                            </a>
                        </div>
                    </div>

                <?php }
                wp_reset_postdata(); ?>                
                
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>

    <?php endif; ?>
    
    <!-- Newsletter Wrapper section-->
    <div class="bg-white py-5 w-100">
        <section class="newsletter-section d-flex align-items-center justify-content-center">
            <div class="container text-center">
                <h2 class="section-title">
                    Right this way for more juicy reads<br>
                    delivered to you on the daily.
                </h2>
                <form class="newsletter-form mx-auto mt-4" style="max-width: 450px;">
                    <div class="input-group mb-3 newsletter-input-group">
                        <span class="input-group-text bg-transparent border-dark border-end-0" id="email-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                        </span>
                        <input type="email" class="form-control bg-transparent border-dark border-start-0 ps-0 shadow-none" placeholder="Enter your email here" aria-label="Email" aria-describedby="email-icon" required>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-dark subscribe-btn px-5 py-2">SUBSCRIBE</button>
                    </div>
                </form>
                
                   
                <?php /* echo do_shortcode('[contact-form-7 id="9243815" title="Home Page Subscribe Form"]'); */ ?>
                
            </div>
        </section>
    </div>
    <!-- Newsletter Wrapper section-->
    
    <?php /*
    if(!empty($recent_posts) && is_array($recent_posts) && count($recent_posts)>1) { ?>

        <div class="collection-sec flex flex-col lg:flex-row border-y border-[#000000] mb-[40px] lg:mb-[100px]">
            <div class="vertical-img-sec py-[60px] pr-[60px] bg-[#FFBB00] w-full lg:w-[50%]" style="padding-left:60px;">
                <a href="<?php echo get_permalink($recent_posts[1]->ID); ?>">
                    <figure>
                        <?php if (has_post_thumbnail($recent_posts[1]->ID)) : ?>
                            <?php echo get_the_post_thumbnail($recent_posts[1]->ID, 'car1-thumbnail'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />     
                        <?php endif; ?>
                    </figure>
                </a>
            </div>
            <div class="py-[40px] lg:py-[100px] pl-0 3xl:pl-[70px] bg-[#EFF3ED] w-full lg:w-[50%]">
                <div class="container mx-auto">
                    <a href="<?php echo get_permalink($recent_posts[1]->ID); ?>">
                        <h2 class="text-[#101010] text-[48px] lg:text-[60px] font-MorganiteBold font-bold leading-[1] mb-5 w-full 2xl:w-[60%] uppercase">
                            <?php echo get_the_title($recent_posts[1]->ID); ?>
                        </h2>
                    </a>
                    <p class="text-[#3F3F3F] text-[16px] leading-[1.5] font-Poppins">
                        <?php echo get_post_meta($recent_posts[1]->ID, 'post_sub_title', true); ?>
                    </p>

                    <div class="hidden" id="hiddencont1" data-link="<?php echo get_permalink($recent_posts[1]->ID); ?>">
                        <?php echo $recent_posts[1]->post_content; ?>
                    </div>
                    
                    <div class="flex flex-col md:flex-row gap-5 mt-8 lg:mt-[52px] smallCard">
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <?php 
    } */
    
    /*
    if ($category_one_query->have_posts()) { ?>

        <div class="default-card-sec mb-[40px] lg:mb-[100px]">
            <div class="container mx-auto">
                <h2 class="section-title">Dating Apps</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">
                    <?php while ($category_one_query->have_posts()){
                        $category_one_query->the_post();
                        get_template_part('template-parts/content', 'default-card');
                    } ?>
                </div>
            </div>
        </div>

    <?php  } */
    
    ?>
    
       <?php
    
    if ($category_two_query->have_posts()){ ?>

    <div class="default-card-sec mb-[40px] lg:mb-[100px]">
        <div class="container mx-auto">
            <h2 class="section-title">Modern Dating</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">
                <?php while ($category_two_query->have_posts()){
                    $category_two_query->the_post();
                    get_template_part('template-parts/content', 'default-card');
                } ?>
            </div>
        </div>
    </div>

    <?php 
    }
    ?>
    
    <?php
    if(!empty($recent_posts) && is_array($recent_posts) && count($recent_posts)>2) { ?>

    <div class="hero-sec py-[44px] lg:py-[160px] bg-[#EB023D] mb-[40px] lg:mb-[100px]">
        <div class="container mx-auto">
            
            <?php if($recent_posts[2]) : ?>
                <div class="hero-main">
                    <div class="hero-detail">
                        <h2 class="heroSecTitle"><?php echo get_the_title($recent_posts[2]->ID); ?></h2>
                        <p class="heroSecDetail"> <?php echo get_post_meta($recent_posts[2]->ID, 'post_sub_title', true); ?></p>
                        <a class="readMoreBtn hover:!text-[#EB023D] group" href="<?php echo get_the_permalink($recent_posts[2]); ?>">READ MORE
                            <svg class="group-hover:fill-[#EB023D]" width="6" height="7" viewBox="0 0 6 7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.55791 2.84999L1.12017 0.188122C0.915227 0.065106 0.708732 0 0.537094 0C0.205266 0 0 0.233339 0 0.623918V6.37699C0 6.76711 0.205008 7 0.53606 7C0.707956 7 0.911153 6.93484 1.11655 6.81148L5.55636 4.14967C5.84188 3.97821 6 3.74748 6 3.49969C6.00006 3.25207 5.84375 3.02139 5.55791 2.84999Z" fill="" />
                            </svg>
                        </a>
                    </div>
                    <div class="hero-img-sec">
                        <figure class="w-full h-[254px] md:h-[517px]">
                            <?php if (has_post_thumbnail($recent_posts[2]->ID)) : ?>
                                <?php /* echo get_the_post_thumbnail($recent_posts[2]->ID, 'related-thumbnail', array('class' => 'w-full h-full object-contain')); */ ?>
                                <?php echo get_the_post_thumbnail(
                                    $recent_posts[2]->ID,
                                    'large',
                                    array('class' => 'w-full h-auto')
                                ); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/card3.jpg" class="w-full h-full object-contain" alt="card" />     
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php }    ?>
    
 
    
    <?php
    /*
    
    if(!empty($recent_posts) && is_array($recent_posts) && count($recent_posts)>3) {
        if($recent_posts[3]) : ?>
        <div class="collection-sec flex flex-col lg:flex-row border-y border-[#000000] mb-[40px] lg:mb-[100px]">
            <div class="vertical-img-sec py-[60px] pr-[60px] bg-[#FFBB00] w-full lg:w-[50%]" style="padding-left:60px;">
                <a href="<?php echo get_the_permalink( $recent_posts[3]->ID ); ?>">
                    <figure>
                        <?php if (has_post_thumbnail($recent_posts[3]->ID)) : ?>
                            <?php echo get_the_post_thumbnail($recent_posts[3]->ID, 'car1-thumbnail'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />     
                        <?php endif; ?>
                    </figure>
                </a>
            </div>
            <div class="py-[40px] lg:py-[100px] pl-0 3xl:pl-[70px] bg-[#EFF3ED] w-full lg:w-[50%]">
                <div class="container mx-auto">
                    <a href="<?php echo get_the_permalink( $recent_posts[3]->ID ); ?>">
                        <h2 class="text-[#101010] text-[48px] lg:text-[60px] font-MorganiteBold font-bold leading-[1] mb-5 w-full 2xl:w-[60%] uppercase">
                            <?php echo get_the_title($recent_posts[3]->ID); ?>
                        </h2>
                    </a>
                    <p class="text-[#3F3F3F] text-[16px] leading-[1.5] font-Poppins">
                        <?php echo get_post_meta($recent_posts[3]->ID, 'post_sub_title', true); ?>
                    </p>
                    <div class="hidden" id="hiddencont3" data-link="<?php echo get_permalink($recent_posts[3]->ID); ?>">
                        <?php echo $recent_posts[3]->post_content; ?>
                    </div>
                    <div class="flex flex-col md:flex-row gap-5 mt-8 lg:mt-[52px] smallCard">
                        
                    </div>
                </div>
            </div>
        </div>
        <?php endif; 
    }
    */
    /*
    if ($category_one_query->have_posts()){ ?>
        <div class="default-card-sec mb-[40px] lg:mb-[100px]">
            <div class="container mx-auto">
                <h2 class="section-title">Dating Apps</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">
                    <?php  while ($category_one_query->have_posts()){
                        $category_one_query->the_post();
                        get_template_part('template-parts/content', 'default-card');
                    } ?>
                </div>
            </div>
        </div>
    <?php 
        
    } 
    */
    /*
    if(!empty($recent_posts) && is_array($recent_posts) && count($recent_posts)>4) {?>


    <div class="hero-sec py-[44px] md:py-[80px] lg:py-[100px] xl:py-[120px] 2xl:py-[160px] bg-[#FE4705] mb-[40px] lg:mb-[100px]">
        <div class="container mx-auto">
            <?php if($recent_posts[4]) : ?>
                <div class="hero-main">
                    <div class="hero-detail">
                        <h2 class="heroSecTitle"><?php echo get_the_title($recent_posts[4]->ID); ?></h2>
                        <p class="heroSecDetail"><?php echo get_post_meta($recent_posts[4]->ID, 'post_sub_title', true); ?></p>
                        <a class="readMoreBtn group" href="<?php echo get_the_permalink($recent_posts[4]); ?>">READ MORE
                            <svg class="group-hover:fill-[#FE4705]" width="6" height="7" viewBox="0 0 6 7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.55791 2.84999L1.12017 0.188122C0.915227 0.065106 0.708732 0 0.537094 0C0.205266 0 0 0.233339 0 0.623918V6.37699C0 6.76711 0.205008 7 0.53606 7C0.707956 7 0.911153 6.93484 1.11655 6.81148L5.55636 4.14967C5.84188 3.97821 6 3.74748 6 3.49969C6.00006 3.25207 5.84375 3.02139 5.55791 2.84999Z" fill="" />
                            </svg>
                        </a>
                    </div>
                    <div class="hero-img-sec">
                        <figure class="w-full h-[254px] md:h-[517px]">
                            <?php if (has_post_thumbnail($recent_posts[4]->ID)) : ?>
                                <?php echo get_the_post_thumbnail($recent_posts[4]->ID, 'related-thumbnail', array('class' => 'w-full h-full object-contain')); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/card3.jpg" class="w-full h-full object-contain" alt="card" />     
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php } */
    
    /*
    if ($category_four_query->have_posts()){?>


    <div class="default-card-sec mb-[40px] lg:mb-[100px]">
        <div class="container mx-auto">
            <h2 class="section-title">Find</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">
                <?php while ($category_four_query->have_posts()){
                    $category_four_query->the_post();
                    get_template_part('template-parts/content', 'default-card');
                } ?>
            </div>
        </div>
    </div>

    <?php } */ ?>
    
    
     <!-- Social Media Section -->
    
<?php echo get_template_part('/template-parts/social-media-card'); ?>
      <!-- Social Media Section -->

</div>

<!--Newsletter Modal-->
<?php echo get_template_part('/template-parts/subscribe-modal'); ?>
<!--Newsletter Modal-->

<?php get_footer(); ?>
