<?php get_header();

    while (have_posts()) : the_post();
        $post_id = get_queried_object_id();
        $cat = get_the_category();
        $cat_ID = $cat[0]->term_id;
        $parent_id = $cat[0]->parent;
        $cat_Name = $cat[0]->cat_name;
        $author_id = get_the_author_meta('ID');
        $author_designation = get_the_author_meta('designation', $author_id);
        
        $first_name = get_user_meta( $author_id, 'first_name', true );
        $last_name = get_user_meta( $author_id, 'last_name', true );
        if($first_name) {
            $author_name = $first_name.' '.$last_name;
        } else {
            $author_name = get_the_author_meta('display_name', $author_id);
        }
        $author_URL = get_author_posts_url($author_id);
        $author_desc = get_the_author_meta('description', $author_id);
        $avater_url = esc_url( get_avatar_url( $author_id ) );
        if(!$avater_url)
        $avater_url =  get_template_directory_uri()."/images/author-image-single.png"; 
    
        $sub_title = get_post_meta($post_id, 'post_sub_title', true);

        $published_date = get_the_date('j F, Y');
        $modified_date = get_the_modified_time('j F, Y'); 

        $facebook = get_option('facebook');
        $twitter = get_option('twitter');
        $linkedin = get_option('linkedin');            
        ?>


        <section class="single-page-banner">
            <div class=" container mx-auto">
                <div class="single-page-banner-inner">

                    <div class="single-page-banner-content">

                        <div class="single-p-b-up-content">
                            <div class="flex gap-2">
                                    <a href="<?php echo home_url(); ?>" class="single-page-cat">Home</a>
                                <?php if (!empty($parent_id)) { ?>
                                    <a class="single-page-cat" href="<?php echo esc_url(get_category_link($parent_id)); ?>"><?php echo get_cat_name($parent_id); ?></a>
                                <?php } ?>
                                    <a class="single-page-cat" href="<?php echo esc_url(get_category_link($cat_ID)); ?>"><?php echo $cat_Name; ?></a>
                            </div>
                            <h2 class="single-page-title"><?php the_title(); ?></h2>
                            <p class="single-page-short-dcs"><?php echo $sub_title; ?></p>
                        </div>

                        <div class="single-p-b-down-content">
                            <p class="single-page-post-date">
                                <?php echo $published_date; 
                                if($published_date != $modified_date) {
                                    echo ", Last Modified Date: ".$modified_date;
                                } ?>
                            </p>
                            <p>
                                <span class="single-page-banner-author-name-define text-[16px] font-Poppins">Written by</span>
                                <a href="<?php echo get_author_posts_url($author_id); ?>" class="single-page-banner-author-name text-[20px]">
                                    <?php echo $author_name; ?>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="single-page-banner-image-sec">
                        <div class="single-page-banner-img-card">
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <?php echo get_the_post_thumbnail($post_id, 'single-thumbnail', array('class' => 'img-responsive w-full h-full object-cover')); ?>
                            <?php else : ?>
                                <figure class="export-img-card-wrapper">
                                    <img class="img-responsive w-full h-full object-cover" 
                                    src="<?php echo get_template_directory_uri(); ?>/images/expert.jpg" 
                                    alt="content writer card side image">
                                </figure>
                            <?php endif; ?>
                                
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="single-page-content">
            <div class="container mx-auto">
                <div class="single-page-content-wrapper">
                    <div class="side-bar-sec">

                        <aside class="side-bar">
                            <div class="add-post">
                                <h2 class="sidebar-title">Table Of Contents</h2>
                                <ul class="box-item-sec">
                                <?php echo table_of_content('box-item-wrapper', ''); ?>
                                    <!-- <li class="box-item-wrapper"><button class="box-item box-line">Introduction</button></li>
                                    <li class="box-item-wrapper"><button class="box-item box-line">What Is The Meaning Of The Cross Tattoo....</button></li>
                                    <li class="box-item-wrapper"><button class="box-item box-line">Minimal Cross Tattoos</button></li>
                                    <li class="box-item-wrapper"><button class="box-item box-line">Cross Tattoo With Armband</button></li>
                                    <li class="box-item-wrapper"><button class="box-item box-line">Big Back Cross Tattoo</button></li>
                                    <li class="box-item-wrapper"><button class="box-item box-line">Stylish Chest Cross Tattoo</button></li>
                                    <li class="box-item-wrapper"><button class="box-item box-line">Leg Cross Tattoo For Women</button></li>
                                    <li class="box-item-wrapper"><button class="box-item box-line">Rib Cross Tattoo For Men</button></li> -->
                                </ul>
                            </div>
                                                            

                            <?php $related = get_posts(
                                array(
                                    // 'category__in' => $cat_ID,
                                    'post_type' => 'post',
                                    // 'orderby' => 'rand',
                                    // 'post_status' => 'publish',
                                    // 'order'   => 'DESC',
                                    'posts_per_page' => 7,
                                    // 'post__not_in' => array($post_id)
                                )
                            );
                            if ($related) : ?>
                            <div class="side-bar-card-box">

                                <h2 class="sidebar-title">MORE LIKE THIS</h2>

                                <div class="side-bar-card-col-wrapper">
                                    <?php $c = 0;
                                    foreach ($related as $post) {
                                        setup_postdata($post);
                                        if($c<=3)
                                        get_template_part('template-parts/content', 'sidebar-card');
                                        $c++;
                                    }
                                    wp_reset_postdata(); ?>
                                </div>

                            </div>                            
                            <?php endif;
                            
                            
                            
                            if ($facebook || $twitter || $linkedin) :
                            ?>
                            
                            <div class="add-post">
                                <h1 class="sidebar-title">Follow Us</h1>
                                <div class="icon-sec flex items-center gap-4">
                                    <?php if($facebook) : ?>
                                    <a class="share-icon group" href="<?php echo $facebook; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_link">
                                        <svg class="group-hover:fill-[#FFFFFF]" xmlns="http://www.w3.org/2000/svg" fill=" #232323" viewBox="0 0 24 24" width="21" height="20">
                                            <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z" />
                                        </svg>
                                    </a>
                                    <?php endif;
                                    if($twitter) : ?>
                                    <a class="share-icon group" href="<?php echo $twitter; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_link">
                                        <svg class="group-hover:fill-[#FFFFFF]" width="20" height="20" viewBox="0 0 17 15" fill="#232323" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.6261 2.55513C16.3669 2.6701 16.1004 2.76713 15.8281 2.8459C16.1505 2.48131 16.3963 2.05231 16.5463 1.58285C16.58 1.47763 16.5451 1.36245 16.4586 1.29363C16.3722 1.22475 16.2522 1.2165 16.1571 1.27287C15.5788 1.61586 14.9549 1.86234 14.3007 2.00648C13.6417 1.36255 12.7466 0.996094 11.8214 0.996094C9.86823 0.996094 8.27923 2.58504 8.27923 4.53811C8.27923 4.69193 8.28897 4.84491 8.30824 4.99575C5.8846 4.78295 3.63139 3.5917 2.08412 1.69372C2.02898 1.62607 1.94403 1.58961 1.85706 1.59659C1.77003 1.6034 1.69184 1.65247 1.64788 1.7279C1.33406 2.26638 1.16815 2.88226 1.16815 3.50888C1.16815 4.36236 1.47287 5.17214 2.01115 5.80489C1.84748 5.7482 1.68865 5.67736 1.53706 5.59321C1.45568 5.54791 1.35636 5.5486 1.27551 5.59496C1.19461 5.64132 1.14388 5.72659 1.14175 5.81979C1.14138 5.83549 1.14138 5.85119 1.14138 5.86711C1.14138 7.14107 1.82704 8.28803 2.87532 8.91317C2.78526 8.90417 2.69526 8.89113 2.60584 8.87405C2.51365 8.85643 2.41885 8.88874 2.35669 8.95905C2.29441 9.02931 2.27381 9.12724 2.3025 9.21666C2.69052 10.4281 3.68951 11.3191 4.89721 11.5908C3.89555 12.2182 2.75008 12.5468 1.5476 12.5468C1.2967 12.5468 1.04435 12.532 0.797384 12.5028C0.674698 12.4882 0.557389 12.5607 0.515606 12.6774C0.473824 12.7941 0.518108 12.9242 0.622484 12.9911C2.16726 13.9816 3.95346 14.5051 5.78789 14.5051C9.39415 14.5051 11.6501 12.8046 12.9076 11.3779C14.4756 9.59909 15.3749 7.24454 15.3749 4.91809C15.3749 4.8209 15.3734 4.72275 15.3704 4.62492C15.9891 4.15882 16.5217 3.59474 16.9551 2.94639C17.021 2.84793 17.0138 2.71779 16.9376 2.62715C16.8614 2.53645 16.7345 2.50712 16.6261 2.55513Z" fill="" />
                                        </svg>
                                    </a>
                                    <?php endif;
                                    if($linkedin) : ?>
                                    <a class="share-icon group" href="<?php echo $linkedin; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_link">
                                        <svg class="group-hover:fill-[#FFFFFF]" width="18" height="18" viewBox="0 0 16 16" fill="#232323" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 16H12.8V10.4008C12.8 8.86478 12.1224 8.00781 10.9072 8.00781C9.5848 8.00781 8.8 8.90078 8.8 10.4008V16H5.6V5.6H8.8V6.76953C8.8 6.76953 9.80399 5.00781 12.0664 5.00781C14.3296 5.00781 16 6.38888 16 9.24648V16ZM1.9536 3.93672C0.874401 3.93672 0 3.05517 0 1.96797C0 0.881569 0.874401 0 1.9536 0C3.032 0 3.9064 0.881569 3.9064 1.96797C3.9072 3.05517 3.032 3.93672 1.9536 3.93672ZM0 16H4V5.6H0V16Z" fill="" />
                                        </svg>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php endif; ?>

                        </aside>

                    </div>

                    <div class="single-page-content-sec">
                        
                        <?php the_content(); ?>                       

                        <div class="share-sec">
                            <h2 class="share-title">Share This Article: </h2>
                            <div class="flex items-center gap-2">
                                <a class="share-icon group" href="#">
                                    <svg class="group-hover:fill-[#FFFFFF]" xmlns="http://www.w3.org/2000/svg" fill=" #232323" viewBox="0 0 24 24" width="21" height="20">
                                        <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z" />
                                    </svg>
                                </a>
                                <a class="share-icon group" href="#">
                                    <svg class="group-hover:fill-[#FFFFFF]" width="20" height="20" viewBox="0 0 17 15" fill="#232323" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6261 2.55513C16.3669 2.6701 16.1004 2.76713 15.8281 2.8459C16.1505 2.48131 16.3963 2.05231 16.5463 1.58285C16.58 1.47763 16.5451 1.36245 16.4586 1.29363C16.3722 1.22475 16.2522 1.2165 16.1571 1.27287C15.5788 1.61586 14.9549 1.86234 14.3007 2.00648C13.6417 1.36255 12.7466 0.996094 11.8214 0.996094C9.86823 0.996094 8.27923 2.58504 8.27923 4.53811C8.27923 4.69193 8.28897 4.84491 8.30824 4.99575C5.8846 4.78295 3.63139 3.5917 2.08412 1.69372C2.02898 1.62607 1.94403 1.58961 1.85706 1.59659C1.77003 1.6034 1.69184 1.65247 1.64788 1.7279C1.33406 2.26638 1.16815 2.88226 1.16815 3.50888C1.16815 4.36236 1.47287 5.17214 2.01115 5.80489C1.84748 5.7482 1.68865 5.67736 1.53706 5.59321C1.45568 5.54791 1.35636 5.5486 1.27551 5.59496C1.19461 5.64132 1.14388 5.72659 1.14175 5.81979C1.14138 5.83549 1.14138 5.85119 1.14138 5.86711C1.14138 7.14107 1.82704 8.28803 2.87532 8.91317C2.78526 8.90417 2.69526 8.89113 2.60584 8.87405C2.51365 8.85643 2.41885 8.88874 2.35669 8.95905C2.29441 9.02931 2.27381 9.12724 2.3025 9.21666C2.69052 10.4281 3.68951 11.3191 4.89721 11.5908C3.89555 12.2182 2.75008 12.5468 1.5476 12.5468C1.2967 12.5468 1.04435 12.532 0.797384 12.5028C0.674698 12.4882 0.557389 12.5607 0.515606 12.6774C0.473824 12.7941 0.518108 12.9242 0.622484 12.9911C2.16726 13.9816 3.95346 14.5051 5.78789 14.5051C9.39415 14.5051 11.6501 12.8046 12.9076 11.3779C14.4756 9.59909 15.3749 7.24454 15.3749 4.91809C15.3749 4.8209 15.3734 4.72275 15.3704 4.62492C15.9891 4.15882 16.5217 3.59474 16.9551 2.94639C17.021 2.84793 17.0138 2.71779 16.9376 2.62715C16.8614 2.53645 16.7345 2.50712 16.6261 2.55513Z" fill="" />
                                    </svg>
                                </a>
                                <a class="share-icon group" href="#">
                                    <svg class="group-hover:fill-[#FFFFFF]" width="18" height="18" viewBox="0 0 16 16" fill="#232323" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 16H12.8V10.4008C12.8 8.86478 12.1224 8.00781 10.9072 8.00781C9.5848 8.00781 8.8 8.90078 8.8 10.4008V16H5.6V5.6H8.8V6.76953C8.8 6.76953 9.80399 5.00781 12.0664 5.00781C14.3296 5.00781 16 6.38888 16 9.24648V16ZM1.9536 3.93672C0.874401 3.93672 0 3.05517 0 1.96797C0 0.881569 0.874401 0 1.9536 0C3.032 0 3.9064 0.881569 3.9064 1.96797C3.9072 3.05517 3.032 3.93672 1.9536 3.93672ZM0 16H4V5.6H0V16Z" fill="" />
                                    </svg>
                                </a>

                            </div>
                        </div>

                        <div class="single-author-sec">
                            <div class="single-author-card">
                                <figure class="single-author-card-figure">
                                <?php ?>
                                    <img class="single-author-card-img" 
                                    src="<?php echo $avater_url; ?>" 
                                    alt=" single page author card  image">
                                </figure>
                                <div class="author-card-content">
                                    <h2 class="single-author-card-title"><?php echo $author_name; ?></h2>

                                    <p class="single-author-card-dsc"><?php echo $author_desc; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="comment-from-sec">
                            <div id="respond" class="comment-respond">
                                <h2 class="comment-from-title">Leave A Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/istanagreenworld/poster-image-of-climate-change/#respond" style="display:none;">Cancel reply</a></small></h2>
                                <form action="" class="comment-form" novalidate="">
                                    <p class="comment-notes">
                                        <span id="email-notes">Your email address will not be published.</span>
                                        <span class="required-field-message">Required fields are marked <span class="required">*</span></span>
                                    </p>
                                    <div class="comment-from-row">
                                        <input type="text" class="comment-from-input" name="author" placeholder="YOUR NAME*" required="">
                                        <input type="email" class="comment-from-input" name="email" placeholder="YOUR EMAIL*" required="">
                                        <input type="url" class="comment-from-input" name="url" placeholder="YOUR WEBSITE">
                                    </div>
                                    <div class="comment-from-text-aria-wrapper"><textarea class="comment-from-text-aria" id="comment" name="comment" placeholder="TYPE COMMENT HERE*" cols="30" rows="8" required=""></textarea></div>
                                    <div class="single-page-comment-from-massage-checkbox-wrapper">
                                        <div class="comment-from-check-box-wrapper"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent"></label></div>
                                        <p class="single-page-comment-from-checkbox-massage">Save my name, email, and website in this browser for the next time I comment.</p>
                                    </div>
                                    <p class="form-submit"><button type="submit" class="single-page-comment-from-submit-button">POST COMMENT</button> <input type="hidden" name="comment_post_ID" value="2881" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    </p>
                                </form>
                            </div>
                        </div>


                        <div class="all-comment-sec">
                            <h2 class="all-comment-title">
                                All Comments
                            </h2>

                            <div class="replay-card-inner">

                                <div class="replay-card">
                                    <div class="replay-card-user-wrapper">
                                        <figure class="replay-c-u-w-figure">
                                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/author-image.png" alt="Author comment Image">
                                        </figure>

                                        <div class="replay-card-user-content">
                                            <h2 class=" replay-user-name">
                                                Akash Kumar
                                            </h2>
                                            <div class="replay-date-with-edit-wrapper">
                                                <span class="replay-date-with-edit">25 July 2023 at 10:08 AM</span>
                                                <span class="replay-date-with-edit-line">|</span>
                                                <a href="#" class="replay-date-with-edit underline ">
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="replay-card-massage">
                                        Great post! We are very strong on the content front but could use some help with video. Any tips, hacks,
                                        etc for getting started with video production? but could use some help with video.
                                    </p>
                                    <div class="replay-card-button-wrapper">
                                        <button class="replay-card-common-button">Reply</button>
                                        <span class="replay-card-common-line">|</span>
                                        <button class="replay-card-common-button">Edit</button>
                                        <span class="replay-card-common-line">|</span>
                                        <button class="replay-card-common-button">Report</button>
                                    </div>
                                </div>



                                <div class="replay-card">

                                    <div class="replay-card-user-wrapper">
                                        <figure class="replay-c-u-w-figure">
                                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/author-image.png" alt="Author comment Image">
                                        </figure>

                                        <div class="replay-card-user-content">
                                            <h2 class=" replay-user-name">
                                                Akash Kumar
                                            </h2>
                                            <div class="replay-date-with-edit-wrapper">
                                                <span class="replay-date-with-edit">25 July 2023 at 10:08 AM</span>
                                                <span class="replay-date-with-edit-line">|</span>
                                                <a href="#" class="replay-date-with-edit underline ">
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="replay-card-massage">
                                        Great post! We are very strong on the content front but could use some help with video. Any tips, hacks,
                                        etc for getting started with video production? but could use some help with video.
                                    </p>

                                    <div class="replay-card-button-wrapper">
                                        <button class="replay-card-common-button">Reply</button>
                                        <span class="replay-card-common-line">|</span>
                                        <button class="replay-card-common-button">Edit</button>
                                        <span class="replay-card-common-line">|</span>
                                        <button class="replay-card-common-button">Report</button>
                                    </div>
                                    <div class="replay-card-replay">

                                        <div class="replay-card-user-wrapper">
                                            <figure class="replay-c-u-w-figure">
                                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/author-image.png" alt="Author comment Image">
                                            </figure>

                                            <div class="replay-card-user-content">
                                                <h2 class=" replay-user-name">
                                                    Akash Kumar
                                                </h2>
                                                <div class="replay-date-with-edit-wrapper">
                                                    <span class="replay-date-with-edit">25 July 2023 at 10:08 AM</span>
                                                    <span class="replay-date-with-edit-line">|</span>
                                                    <a href="#" class="replay-date-with-edit underline">
                                                        Edit
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="replay-card-massage">
                                            Great post! We are very strong on the content front but could use some help with video. Any tips, hacks,
                                            etc for getting started with video production? but could use some help with video.
                                        </p>
                                        <div class="replay-card-button-wrapper">
                                            <button class="replay-card-common-button">Reply</button>
                                            <span class="replay-card-common-line">|</span>
                                            <button class="replay-card-common-button">Edit</button>
                                            <span class="replay-card-common-line">|</span>
                                            <button class="replay-card-common-button">Report</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="replay-card">
                                    <div class="replay-card-user-wrapper">
                                        <figure class="replay-c-u-w-figure">
                                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/author-image.png" alt="Author comment Image">
                                        </figure>

                                        <div class="replay-card-user-content">
                                            <h2 class=" replay-user-name">
                                                Akash Kumar
                                            </h2>
                                            <div class="replay-date-with-edit-wrapper">
                                                <span class="replay-date-with-edit">25 July 2023 at 10:08 AM</span>
                                                <span class="replay-date-with-edit-line">|</span>
                                                <a href="#" class="replay-date-with-edit underline ">
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="replay-card-massage">
                                        Great post! We are very strong on the content front but could use some help with video. Any tips, hacks,
                                        etc for getting started with video production? but could use some help with video.
                                    </p>
                                    <div class="replay-card-button-wrapper">
                                        <button class="replay-card-common-button">Reply</button>
                                        <span class="replay-card-common-line">|</span>
                                        <button class="replay-card-common-button">Edit</button>
                                        <span class="replay-card-common-line">|</span>
                                        <button class="replay-card-common-button">Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="default-card-sec mb-[100px] mt-[100px]">
            <div class="container mx-auto">
                <h2 class="section-title">RELATED POST</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">

                    <?php 
                    $i = 0;
                    foreach ($related as $post) {
                        setup_postdata($post);
                        if($i>3)
                        get_template_part('template-parts/content', 'related-card');
                        $i++;
                    }
                    wp_reset_postdata(); ?>
                    
                    <!-- <div class="default-card">
                        <figure>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
                        </figure>
                        <div class="default-card-detail">
                            <p>outfits</p>
                            <h2>Sézane’s New Spring Collection is Full of Pieces You’ll Never Get Sick Of Wearing</h2>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>


    <?php endwhile; ?>

<?php get_footer(); ?>