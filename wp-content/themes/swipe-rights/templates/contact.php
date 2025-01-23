<?php /* Template Name: Contact Page Template */ ?>

<?php get_header(); ?>

<section class="contact-us-page mt-[68px]">
    <div class="container mx-auto">

        <div class="page-common-wrapper">
            <div class="page-common-wrapper-inner">
                <div class="contact-about-common-title-wrapper">
                    <h2 class="contact-about-common-title">
                        Contact Us
                    </h2>
                </div>

                <p class="contact-about-p">
                    Whether she is searching for her dream job or a new city to call home; is saving for a down payment or a ticket to travel the world; is learning to cook or speak another language, she needs a bit of guidance, she wants to be inspired.
                    She is The Everygirl. This is for her.
                </p>
            </div>
        </div>
    </div>
</section>


<section class="contact-us-from-sec-wrapper">
    <div class="container mx-auto">

        <div class="contact-us-from-sec">
            <div class="from-content-sec">
                <form action="" class="from-content-form">
                    <input type="text" placeholder="YOUR NAME*" class="common-input-fled  " />

                    <input type="text" placeholder="YOUR EMAIL*" class="common-input-fled" />

                    <input type="text" placeholder="YOUR SUBJECT*" class="common-input-fled" />

                    <textarea placeholder="TYPE COMMENT HERE*" class="common-text-aria"></textarea>

                    <button class="from-submit-button">
                        Submit
                    </button>
                </form>
            </div>

            <div class="contact-us-img-sec">
                <figure class="contact-us-figure">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/contact-img.jpg" alt="concat us page image">
                </figure>
            </div>

        </div>

    </div>
</section>

<?php get_footer(); ?>