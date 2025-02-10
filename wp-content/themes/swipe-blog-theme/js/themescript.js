jQuery(document).ready(function(){
    $('.nav-links a.page-numbers').addClass('single-page-comment-from-submit-button');
    
    $('.emaillist .es-email').addClass('footer-subs-input');
    $('.emaillist input[type=submit]').addClass('footer-subs-btn');

    var contentOne = $('#hiddencont1 img').map(function(value, index) {

        if(value<=2)
        return `
        <div class="small-card">
            <a href="${$("#hiddencont1").attr('data-link')}">
                <figure>
                    <img src="${$(this).attr('src')}" alt="card" />
                </figure>
            </a>
        </div>`;

    }).get();
    $('#hiddencont1').next('.smallCard').empty().append(contentOne);

    var contentThree = $('#hiddencont3 img').map(function(value, index) {
        if(value<=2)
        return `
        <div class="small-card">
            <a href="${$("#hiddencont3").attr('data-link')}">
                <figure>
                    <img src="${$(this).attr('src')}" alt="card" />
                </figure>
            </a>
        </div>`;
    }).get();
    $('#hiddencont3').next('.smallCard').empty().append(contentThree);

});