<?php get_header(); ?>

<div class="author-page pt-[68px]">
    <div class="container mx-auto">
        <div class="author-card">
            <div class="w-fit flex gap-2">
                <a href="">
                    <figure class="mb-0 relative w-[60px] h-[60px] md:w-[100px] md:h-[100px] border border-[#101010]">
                        <img class="author-img" src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="author-img" />
                    </figure>
                </a>
                <div class="md:hidden">
                    <h2 class="author-title"><a href="">Akash Kumar</a></h2>
                    <span class="author-designation">designation</span>
                </div>
            </div>
            <div class="author-detail">
                <h2 class="author-title hidden md:block"><a href="">Akash Kumar</a></h2>
                <span class="author-designation hidden md:block">designation</span>
                <p class="author-card-desc">The cybersports market in the U.S. and beyond is an ever-growing industry as more and more gamers around the world participate in online competitions and tournaments. According to the latest data compiled by Profiler, the global cybersports market is estimated to be worth around $1 billion in 2020 and is projected to reach a staggering $2.5 billion in 2025.
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-10">
            <?php
            for ($i = 0; $i < 9; $i++) {
                echo '
                    <div class="default-card">
                        <figure>
                            <img src="' . get_template_directory_uri() . '/images/card1.jpg" alt="card" />
                        </figure>
                        <div class="default-card-detail">
                            <p>outfits</p>
                            <h2>Sézane’s New Spring Collection is Full of Pieces You’ll Never Get Sick Of Wearing</h2>
                        </div>
                    </div>';
            }
            ?>
        </div>
        <div class="flex justify-center">
            <button class="single-page-comment-from-submit-button">More Articles</button>
        </div>
    </div>
</div>
<?php get_footer(); ?>