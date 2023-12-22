jQuery(document).ready(function ($) {

    // ajax content filter
    $('#manage').change(function () {
        let postId = $(this).val();
        let data = {action: 'post_filter', 'postId': postId};

        $.ajax({
            url: ajax_web_url,
            data: data,
            type: 'post',
            success: function (response, data) {
                // console.log(response)
                $('#result').html(response);
            },
        });
    });


    // fancybox customize
    $('.header_btn').click(function (e) {
        e.preventDefault();
        $.fancybox.open(
            {
                src: '#form',
                type : 'inline',
                btnTpl: {
                    smallBtn: '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}"><img src="/wp-content/uploads/2020/10/close.png" alt="Close"></button>'
                }
            }
        );
    });

    $("[data-fancybox]").fancybox({
        infobar: false,
        // smallBtn: true,
        buttons : [
            'close'
        ],
    })

    // anchor code
    var $page = $('html, body');
    $('a[href*="#"]').click(function() {
        event.preventDefault();
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 1000);
        return false;
    });


})