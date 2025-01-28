<?php
$post_ID = get_the_ID();
$title = get_the_title();
$author_id = get_the_author_meta('ID');
$first_name = get_user_meta( $author_id, 'first_name', true );
$last_name = get_user_meta( $author_id, 'last_name', true );
if($first_name) {
    $author_name = $first_name.' '.$last_name;
} else {
    $author_name = get_the_author_meta('display_name', $author_id);
}
?>

<div class="search-card">
    <div class="search-card-detail">
    <h3 class="search-card-title">
        <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo $title; ?></a>
    </h3>
    <span class="search-card-author"> By <?php echo $author_name; ?></span>
    </div>
    <a class="search-card-img-wrapper" href="<?php echo get_the_permalink($post_ID); ?>">
        <figure>
            <?php if (has_post_thumbnail()) : ?>
                <?php echo get_the_post_thumbnail($post_ID, 'search-thumbnail'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
            <?php endif; ?>
        </figure>
    </a>
</div>