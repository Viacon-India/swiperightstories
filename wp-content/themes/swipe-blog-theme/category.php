<?php get_header(); 


    $desc = category_description(); 
    $archive_object = get_queried_object();

    $category_image_id = get_term_meta( $archive_object->term_id, 'tax_image_id', true );
    ?>

    <div class="category-page pt-[64px]">
        <figure class="w-full h-[300px] lg:h-[450px]">
            <?php if (!empty($category_image_id)) {
                echo wp_get_attachment_image($category_image_id, 'category-thumbnail', false, array('class' => 'w-full h-full object-cover'));
            }else{
                echo '<img src="'.get_template_directory_uri().'/images/contact-img.jpg" alt="Placeholder" class="w-full h-full object-cover">';
            } ?>
            <!-- <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/images/contact-img.jpg" alt="category-image"> -->
        </figure>
        <div class="container mx-auto mt-8 lg:mt-[60px]">
            <div class="flex gap-2">
                <a href="<?php echo home_url(); ?>" class="single-page-cat">Home</a>
                <a class="single-page-cat">
                    <?php echo strip_tags(single_cat_title()); ?>
                </a>
            </div>
            <h2 class="text-[#000000] text-[80px] font-MorganiteBold uppercase leading-[1] "><?php echo strip_tags(single_cat_title()); ?></h2>
            <p class="text-[15px] sm:text-[16px] font-Poppins font-normal first:mt-0
                    mt-[8px] sm:mt-[9px] md:mt-[10px] lg:mt-[11px] xl:mt-[12px] 2xl:mt-[13px] 3xl:mt-[14px]
                    mb-[16px] sm:mb-[18px] md:mb-[20px] lg:mb-[22px] xl:mb-[24px] 2xl:mb-[26px] 3xl:mb-[24px]">
                    
                    <?php echo strip_tags($desc); ?>
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6 lg:mt-10">
                <?php
                if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'default-card');
                    endwhile; ?>
                <?php else : ?>
                    <p class="inner-detail">Sorry, there is no articles.</p>
                <?php endif; ?>
            </div>
            <div class="flex justify-center">
                <!-- <button class="single-page-comment-from-submit-button">More Articles</button> -->
                <div class="pagination">
                    <?php the_posts_pagination(
                        array(
                            'mid_size' => 1,
                            'prev_text'          => _x('<<', 'previous set of Posts'),
                            'next_text'          => _x('>>', 'next set of Posts')
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>

<?php 
get_footer(); ?>