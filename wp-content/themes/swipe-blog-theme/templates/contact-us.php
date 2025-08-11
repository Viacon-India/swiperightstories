<?php /* Template Name: Contact Page Template */ 

get_header();
$cont_featimage = wp_get_attachment_url(get_post_thumbnail_id($post->ID));


while (have_posts()) : the_post(); ?>

<style>
input[type=text],
input[type=email],
textarea,
select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/*div {*/
/*  border-radius: 5px;*/
/*  background-color: #f2f2f2;*/
/*  padding: 20px;*/
/*}*/

.single-page-banner{
      border-radius: 5px;
  /*background-color: #f2f2f2;*/
  padding: 20px;
}

</style>

<section class="contact-us-page mt-[68px]">
    <div class="container mx-auto">
        <div class="page-common-wrapper">
            <div class="page-common-wrapper-inner">
                <div class="contact-about-common-title-wrapper">
                    <h2 class="contact-about-common-title">
                        <?php the_title(); ?>
                    </h2>
                </div>
                <p class="contact-about-p">
                    <?php the_content(); ?>                    
                </p>
            </div>
        </div>
    </div>
</section>
<br><br><br>

<section class="single-page-banner container mx-auto">
  <div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row bg-[#f5eee9] gap-x-20 py-4">

      <!-- Left: Form -->
      <div class="w-full lg:w-1/2 p-6 lg:pl-10 lg:pr-6 flex items-center justify-center">
        <div class="w-full max-w-md bg-[#f2f2f2] p-6 rounded-md">
            
            
           <?php echo do_shortcode('[contact-form-7 id="dc3d4a5" title="Contact Us Page Form"]'); ?>
            

        </div>
      </div>

      <!-- Right: Image -->
      <div class="w-full lg:w-1/2 lg:pl-6 flex items-center" style="padding-left: 50px;">
          
          <figure class="w-full h-full">
           <?php if ($cont_featimage) { ?>
             <img src="<?php echo $cont_featimage; ?>"alt="Contact Us" class="w-full h-full object-cover">
           <?php } else { ?>
             <img src="https://swiperightstories.com/wp-content/uploads/2025/06/How-To-Delete-Tinder-Account_-A-step-By-Step-Guide.jpg" alt="Contact Us" class="w-full h-full object-cover">
           <?php } ?>
         </figure>
                
      </div>

    </div>
  </div>
</section>


<?php endwhile;
get_footer(); ?>