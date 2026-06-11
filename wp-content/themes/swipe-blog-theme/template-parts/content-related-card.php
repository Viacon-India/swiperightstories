<?php
$post_ID = get_the_ID();
$title = get_the_title();
$cat = get_the_category();
$cat_ID = $cat[0]->term_id;
$cat_Name = $cat[0]->cat_name;
?>

<div class="default-card">
    <a href="<?php echo get_the_permalink($post_ID); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php echo get_the_post_thumbnail(
                $post_ID,
                'large',
                array(
                    'class' => 'w-full h-auto block'
                )
            ); ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg"
                 class="w-full h-auto block"
                 alt="card">
        <?php endif; ?>
    </a>
    <div class="default-card-detail">
        <a href="<?php echo esc_url(get_category_link($cat_ID)); ?>"><?php echo $cat_Name; ?></a>
        <a href="<?php echo get_the_permalink($post_ID); ?>" title="<?php echo $title; ?>">
            <h2><?php echo $title; ?></h2>
        </a>
    </div>
</div>