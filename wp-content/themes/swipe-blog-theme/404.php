<?php get_header(); 

$most_viewed_posts = get_posts(
    array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order'   => 'DESC',
        'posts_per_page' => 7,
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
    )
);
?>

<section class="error-404">
    <div class="container mx-auto relative">

        <div class="error-400-inaner">

            <div class="big-card-center">
                <h2 class="four-zero-four-title">
                    The Page you’re looking doesn’t exist. sorry
                </h2>
            </div>
            <a href="<?php echo home_url(); ?>" class="go-back-cta">go back home</a>

        </div>

        
        <?php foreach($most_viewed_posts as $post_by_viewed) { ?>   

        <div class="absolute top-[19%] right-[1%] common-card-four-o-four ">
            <a href="">
                <p class="common-card-four-o-four-p">
                    <?php echo get_the_title($post_by_viewed->ID); ?>
                </p>
            </a>
        </div>

        <?php } ?>

        <!-- <div class="absolute top-[9%] left-[10%] common-card-four-o-four">
            <div class="common-card-four-o-four-p">
                Sézane’s New Spring Collection is Full of Pieces You’ll Never Get Sick
                Of Wearing
            </div>
        </div>

        <div class="absolute bottom-[50px] left-[0%] common-card-four-o-four">
            <p class="common-card-four-o-four-p">
                Sézane’s New Spring Collection is Full of Pieces You’ll Never Get Sick
                Of Wearing
            </p>
        </div>

        <div class="absolute bottom-[130px] right-[1%] !hidden lg:!flex common-card-four-o-four">
            <p class="common-card-four-o-four-p">
                Sézane’s New Spring Collection is Full of Pieces You’ll Never Get Sick
                Of Wearing
            </p>
        </div> -->

    </div>
</section>

<?php get_footer(); ?>