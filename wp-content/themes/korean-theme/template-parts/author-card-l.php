<?php $post_ID = get_the_ID();
$cat = get_the_category(); ?>

<div class="trends-grid-card-wrapper col-end-[span_6] sm:col-end-[span_6] md:col-end-[span_6] lg:col-end-[span_6]" data-card_index="<?php echo $args['card_index']; ?>">
    <div class="small-bottom-text-card">
        <a href="<?php echo get_the_permalink($post_ID); ?>" aria-label="<?php echo the_title_attribute('echo=0'); ?>">
            <figure class="small-bottom-text-card-figure">
                <?php if (has_post_thumbnail()) : ?>
                    <?php echo get_the_post_thumbnail($post_ID, 'default-large-thumbnail', array('class' => 'img-responsive')); ?>
                <?php else : ?>
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/smc-1.jpg" alt="card image">
                <?php endif; ?>
            </figure>
        </a>
        <div class="small-bottom-text-content">
            <?php if (!empty($cat)) echo '<a href="' . esc_url(get_category_link($cat[0]->term_id)) . '" class="small-bottom-text-card-cat" title="' . $cat[0]->cat_name . '">' . $cat[0]->cat_name . '</a>'; ?>
            <h2 class="small-bottom-text-card-title"><a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a></h2>
        </div>
    </div>
</div>