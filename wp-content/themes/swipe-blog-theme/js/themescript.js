jQuery(document).ready(function(){
    $('.nav-links a:not(:first-child)').addClass('single-page-comment-from-submit-button');
    $(' .nav-links span.current').addClass('not-active-button');

    $('.emaillist .es-email').addClass('footer-subs-input');
    $('.emaillist input[type=submit]').addClass('footer-subs-btn');
}) ;