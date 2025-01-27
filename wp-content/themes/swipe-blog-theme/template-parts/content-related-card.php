<?php
$post_ID = get_the_ID();
$title = get_the_title();
$cat = get_the_category();
$cat_ID = $cat[0]->term_id;
$cat_Name = $cat[0]->cat_name;
?>

<div class="default-card">
    <?php if (has_post_thumbnail()) : ?>
        <?php echo get_the_post_thumbnail($post_ID, 'related-thumbnail'); ?>
    <?php else : ?>
        <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
        </figure>
    <?php endif; ?>
   
    <div class="default-card-detail">
        <a href="<?php echo esc_url(get_category_link($cat_ID)); ?>"><?php echo $cat_Name; ?></a>
        <a href="<?php echo get_the_permalink($post_ID); ?>" title="<?php echo $title; ?>">
            <h2><?php echo $title; ?></h2>
        </a>
    </div>
</div>