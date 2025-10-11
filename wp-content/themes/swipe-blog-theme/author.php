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

$facebook = get_the_author_meta('facebook', $author_id);
$twitter = get_the_author_meta('twitter', $author_id);
$linkedin = get_the_author_meta('linkedin', $author_id);
$instagram = get_the_author_meta('instagram', $author_id);
?>
<style>
 .icon-box-author {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #fff; /* white background */
    color: #000;           /* black icon */
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 20px; /* icon size */
}

.icon-box-author:hover {
    background-color: #fe4705; /* hover bg */
    color: #000;               /* keep icon black */
}

.author-card-social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #fff; /* white background */
    color: #000;            /* icon color (affects SVG) */
    text-decoration: none;
    transition: all 0.3s ease;
}

.author-card-social-icon svg {
    width: 20px;
    height: 20px;
    fill: currentColor; /* allows color to follow CSS */
}

.author-card-social-icon:hover {
    background-color: #fe4705; /* orange hover background */
    color: #000;               /* icon stays black */
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-pap6tZp2+Xqv9N0E1ozYkV6C5pZ5D7a3zY+QkR5A3Vb7x5x5uU3q5K0gE/XLXxFjY7qQ6sBZbL8F2v0iXkD3GQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                
                 <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false) || (!empty($twitter) && (filter_var($twitter, FILTER_VALIDATE_URL) !== false)) || (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false)) || (!empty($instagram) && (filter_var($instagram, FILTER_VALIDATE_URL) !== false))) :
                    echo '<div class="author-page-author-card-social-icon-wrapper">';
                    if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)) echo '<a class="icon-box group" href="' . $facebook . '" rel="noopener noreferrer nofollow" target="_blank" aria-label="author_social_Link"><span class="icon-facebook"></span></a>';
                    if (!empty($twitter) && (filter_var($twitter, FILTER_VALIDATE_URL) !== false)) echo '<a class="author-card-social-icon" href="' . $twitter . '" rel="noopener noreferrer nofollow" target="_blank" aria-label="author_social_Link"><span class="icon-x"></span></a>';
                    
                   if (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL) !== false) {
                        echo '<a class="author-card-social-icon" href="' . $instagram . '" rel="noopener noreferrer nofollow" target="_blank" aria-label="author_instagram_Link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M7.75 2h8.5A5.76 5.76 0 0 1 22 7.75v8.5A5.76 5.76 0 0 1 16.25 22h-8.5A5.76 5.76 0 0 1 2 16.25v-8.5A5.76 5.76 0 0 1 7.75 2zm0 1.5A4.26 4.26 0 0 0 3.5 7.75v8.5A4.26 4.26 0 0 0 7.75 20.5h8.5A4.26 4.26 0 0 0 20.5 16.25v-8.5A4.26 4.26 0 0 0 16.25 3.5h-8.5zM12 7.25A4.76 4.76 0 1 1 7.25 12 4.76 4.76 0 0 1 12 7.25zm0 1.5A3.26 3.26 0 1 0 15.25 12 3.26 3.26 0 0 0 12 8.75zm4.75-3a1 1 0 1 1-1 1 1 1 0 0 1 1-1z"/>
                            </svg>
                        </a>';
                    }
                    
                    // LinkedIn
                    if (!empty($linkedin) && filter_var($linkedin, FILTER_VALIDATE_URL) !== false) {
                        echo '<a class="author-card-social-icon" href="' . $linkedin . '" rel="noopener noreferrer nofollow" target="_blank" aria-label="author_linkedin_Link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M4.98 3.5a2.5 2.5 0 1 1-.02 5.001A2.5 2.5 0 0 1 4.98 3.5zM3 9h4v12H3zM9 9h3.7v1.71h.05a4.07 4.07 0 0 1 3.66-2c3.91 0 4.64 2.57 4.64 5.91V21h-4v-5.17c0-1.23-.02-2.82-1.72-2.82s-1.98 1.35-1.98 2.73V21H9z"/>
                            </svg>
                        </a>';
                    }



                    echo '</div>';
                endif; ?>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-10">
            <?php
            if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'archive-card');
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