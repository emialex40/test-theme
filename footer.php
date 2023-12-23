<?php

$logo_url = get_theme_mod( 'custom_logo' );
?>

</main>
</div>
</div>
</div>

<footer id="footer" class="footer bg_dark">
    <div class="container">
        <div class="row">
            <div class="logo header-logo">
				<?php if ( ! is_front_page() ) : ?>
                <a href="">
					<?php endif; ?>
                    <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<?php if ( ! is_front_page() ) : ?>
					<?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>