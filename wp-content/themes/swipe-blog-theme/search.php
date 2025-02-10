<?php get_header(); ?>

<section class="inner-sec pt-[64px]">
    <div class="w-page-wrapper">
      <div class="page-content">
        
        <div class="bg-[#FE4705] py-[40px] md:pt-[16px] md:pb-[28px] 2xl:py-[100px]">
            <div class="container mx-auto">
                <form class="input-sec">
                    <input type="text" id="default-search" 
                    class="input-field" placeholder="Type &amp; Hit Enter..." 
                    name="s" value="<?php echo $_GET['s']; ?>" required="">
                </form>
            </div>
        </div>

        <div class=" mx-auto flex justify-center items-center">
            <div class="toggle-cut">
                <span onclick="document.getElementById('myModal').style.display='none'" class="close ">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.22387 1.0321L10.9999 8.8081L18.7439 1.0641C19.0181 0.772258 19.3994 0.604738 19.7999 0.600098C20.6835 0.600098 21.3999 1.31642 21.3999 2.2001C21.4074 2.59658 21.2511 2.97866 20.9679 3.2561L13.1439 11.0001L20.9679 18.8241C21.2315 19.082 21.3863 19.4315 21.3999 19.8001C21.3999 20.6838 20.6835 21.4001 19.7999 21.4001C19.3875 21.4172 18.9871 21.2604 18.6959 20.9681L10.9999 13.1921L3.23987 20.9521C2.96675 21.2342 2.59235 21.3955 2.19987 21.4001C1.31619 21.4001 0.599869 20.6838 0.599869 19.8001C0.592349 19.4036 0.748669 19.0215 1.03187 18.7441L8.85587 11.0001L1.03187 3.1761C0.768189 2.91818 0.613469 2.56874 0.599869 2.2001C0.599869 1.31642 1.31619 0.600098 2.19987 0.600098C2.58451 0.604738 2.95203 0.759778 3.22387 1.0321Z" fill="" />
                    </svg>
                </span>
            </div>
    
            <div class="modal-main">    
                <div class="modal-wrapper pt-5 lg:pt-0">        
                    <div class="modal-body-wrapper flex  relative mt-5 md:mt-6 lg:mt-8 border-t border-[#000000]">
                        <div class="modal-body">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'order' => 'DESC',
                                'post_status' => 'publish',
                                'posts_per_page' => 12,
                            );
                            $args['s'] =  'how';
                            $q = new WP_Query($args);
                            while( $q->have_posts() ): $q->the_post();               
                                get_template_part('template-parts/content', 'search-card');                                
                            endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
</section>

<?php get_footer(); ?>
