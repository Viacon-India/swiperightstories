<?php /* Template Name: Contact Page Template */ ?>

<?php get_header();

while (have_posts()) : the_post(); ?>

<section class="contact-us-page mt-[68px]">
    <div class="container mx-auto">

        <div class="page-common-wrapper">
            <div class="page-common-wrapper-inner">
                <div class="contact-about-common-title-wrapper">
                    <h2 class="contact-about-common-title">
                        <?php the_title(); ?>
                    </h2>
                </div>

                <p class="contact-about-p">
                    <?php the_content(); ?>                    
                </p>
            </div>
        </div>
    </div>
</section>


<section class="contact-us-from-sec-wrapper">
    <div class="container mx-auto">

        <div class="contact-us-from-sec">
            <div class="from-content-sec">
                <div class="from-content-form">
                    <?php echo do_shortcode( '[contact-form-7 id="d95beea" title="Contact Form"]' ); ?>
                </div>
            </div>

            <div class="contact-us-img-sec">
                <figure class="contact-us-figure">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'contact-thumbnail', array('class' => 'img-responsive')); ?>
                </figure>
            </div>

        </div>

    </div>
</section>

<?php endwhile;
get_footer(); ?>