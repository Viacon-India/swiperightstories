<?php
$post_ID = get_the_ID();
$title = get_the_title();
$cat = get_the_category();
$cat_ID = $cat[0]->term_id;
$cat_Name = $cat[0]->cat_name;
?>

<div class="default-card">
    <a href="<?php echo esc_url(get_the_permalink($post_ID)); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <figure>
                <?php echo get_the_post_thumbnail($post_ID, 'related-thumbnail'); ?>
            </figure>
        <?php else : ?>
            <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
            </figure>
        <?php endif; ?>
    </a>
    <div class="default-card-detail">
        <p><a href="<?php echo esc_url(get_category_link($cat_ID)); ?>"><?php echo $cat_Name; ?></a></p>
        <h3>
            <a href="<?php echo esc_url(get_the_permalink($post_ID)); ?>">
                <?php echo $title; ?>
            </a>
        </h3>
    </div>
</div>