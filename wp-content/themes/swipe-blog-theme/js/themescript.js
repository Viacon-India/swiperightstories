jQuery(document).ready(function(){
    $('.nav-links a.page-numbers').addClass('single-page-comment-from-submit-button');
    
    $('.emaillist .es-email').addClass('footer-subs-input');
    $('.emaillist input[type=submit]').addClass('footer-subs-btn');

    html = $('#hiddencont3').html();
    console.log(html);
    html.each(function() {
        console.log($(this).find('img'));
    })

}) ;