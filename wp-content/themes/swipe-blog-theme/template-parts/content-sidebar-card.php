<?php
$post_ID = get_the_ID();
$title = get_the_title();
$cat = get_the_category();
$cat_ID = $cat[0]->term_id;
$cat_Name = $cat[0]->cat_name;
?>

<div class="side-bar-card">
    <a href="<?php echo esc_url(get_category_link($cat_ID)); ?>" class="side-bar-card-category"> 
        <?php echo $cat_Name; ?>
    </a>
    <a href="<?php echo get_the_permalink($post_ID); ?>" title="<?php echo $title; ?>">
        <h2 class="side-bar-card-title">
            <?php echo $title; ?>
        </h2>
    </a>
</div>