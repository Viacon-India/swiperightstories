<?php get_header();

$author_id = get_queried_object_id();
$first_name = get_user_meta( $author_id, 'first_name', true );
$last_name = get_user_meta( $author_id, 'last_name', true );
if($first_name) {
    $display_name = $first_name.' '.$last_name;
} else {
    $display_name = get_the_author_meta('display_name', $author_id);
}
$author_desc = get_the_author_meta('description', $author_id);
$avater_url = esc_url( get_avatar_url( $author_id ) );
if(!$avater_url)
$avater_url =  get_template_directory_uri()."/images/default-author.jpg"; 

$designation = get_the_author_meta( 'designation', $author_id, true );
?>

<div class="author-page pt-[64px]">
    <div class="container mx-auto">
        <div class="author-card">
            <div class="w-fit flex gap-2">
                <a href="">
                    <figure class="mb-0 relative w-[60px] h-[60px] md:w-[100px] md:h-[100px] border border-[#101010]">
                        <img class="author-img" src="<?php echo $avater_url; ?>" alt="<?php echo $display_name; ?>-img" />
                    </figure>
                </a>
                <div class="md:hidden">
                    <h2 class="author-title"><?php echo $display_name; ?></h2>
                    <span class="author-designation"><?php echo $designation; ?></span>
                </div>
            </div>
            <div class="author-detail">
                <h2 class="author-title hidden md:block"><?php echo $display_name; ?></h2>
                <span class="author-designation hidden md:block"><?php echo $designation; ?></span>
                <?php if(!empty($author_desc)) { echo '<p class="author-card-desc">'.$author_desc.' </p>'; } ?>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-10">
            <?php
            if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'default-card');
                endwhile; ?>
            <?php else : ?>
                <p class="inner-detail">Sorry, but "<capital class="uppercase"><?php echo $display_name; ?></capital>" has not published any posts.</p>
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
<?php get_footer(); ?>