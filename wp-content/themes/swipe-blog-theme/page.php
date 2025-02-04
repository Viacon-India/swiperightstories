<?php get_header();

while (have_posts()) : the_post(); ?>

<section class="inner-sec pt-[64px]">
  <div class="container mx-auto">
    <div class="w-page-wrapper">
      <div class="flex justify-center pt-8 lg:pt-[56px]">
        <h3 class="about-title"><?php the_title(); ?></h3>
      </div>
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php endwhile;

get_footer(); ?>