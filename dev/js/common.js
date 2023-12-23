jQuery(document).ready(function ($) {

  $('.newsletter-email').focus(function() {
    $('.error').remove()
  });

  $('.js-send').click(function (e) {
    e.preventDefault()

    let flag = false
    const mailRegex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/
    const checkVal = $(this).
      parent().
      siblings('.newsletter-form-check').
      find('.newsletter-check').
      is(':checked')

    const mailVal = $(this).
      parent().
      siblings('.newsletter-form-email').
      find('.newsletter-email').
      val()

    if (!mailRegex.test(mailVal) || mailVal == '') {
      flag = true
      $('.newsletter-form-email').append('<p class="error">The e-mail is not valid</p>')
    }

    if (!checkVal) {
      flag = true
      $('.newsletter-form-check').append('<p class="error">Please select checkbox</p>')
    }

    if (!flag) {
      $.ajax({
        type: 'POST',
        url: myajax.url,
        data: { action: 'newsletter_lead', email: mailVal },
        success: function(response) {
          if (response == '0') {
            $('.newsletter-form').addClass('hide')
            $('.newsletter-thankyou').removeClass('hide')
          } else {
            console.log('This email already exists')
          }

          setTimeout(function() {
            location.reload();
          }, 8000);
        },
        error: function(error) {
          console.error('Request error:', error);
        }
      });
    }

  })

})