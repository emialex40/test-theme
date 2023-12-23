<?php

get_header();

?>

    <section class="section-products">
        <div class="container">
			<?php echo do_shortcode( '[products limit="4" columns="4" order="ASC"]' ); ?>
        </div>
    </section>

    <section class="newsletter">
            <div class="newsletter-body">
                <div class="row space-between">
                    <div class="newsletter-left">
                        <h2 class="newsletter-title"><?php _e( 'Subscribe to our newsletter', 'themename' ); ?></h2>
                        <p class="newsletter-subtitle"><?php _e( 'Subscribe today for the latest Deals and More!', 'themename' ) ?></p>
                    </div>
                    <div class="newsletter-right">
                        <div class="newsletter-form">
                            <form method="post">
                                <div class="newsletter-form-email">
                                    <label for="newsletter-email"><?php _e( 'Email address', 'themename' ); ?></label>
                                    <input type="email" id="newsletter-email" name="newsletter_email" class="newsletter-email" placeholder="<?php _e( 'Email address', 'themename' ); ?>">
                                </div>
                                <div class="newsletter-form-check">
                                    <input type="checkbox" id="newsletter-check" class="newsletter-check" name="newsletter_check">
                                    <label class="newsletter-checklabel" for="newsletter-check"><?php _e( 'I agree to Angry Sales storing my data and contacting me', 'themename' ); ?></label>
                                </div>
                                <div class="newsletter-submit-row">
                                    <button id="newsletter-send" class="newsletter-send js-send" type="submit"><?php _e('Subscribe', 'themename') ?></button>
                                </div>
                            </form>
                        </div>
                        <div class="newsletter-thankyou" style="display: none;"></div>
                    </div>
                </div>
            </div>
    </section>


<?php get_footer(); ?>