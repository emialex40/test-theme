<!DOCTYPE HTML>
<html>
<head <?php language_attributes(); ?>>
    <title><?php wp_title( '' ); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php
	wp_head();
	$logo_url = get_theme_mod('custom_logo');

	?>
    <meta name='apple-itunes-app' content='app-id=​myAppStoreID​'>

</head>
<body <?php body_class(); ?>>
<script>
</script>
<div id="root">
    <div class="app">
        <div class="app_main">
            <header id="header" class="header">
                <div class="container">
                    <div class="row">
                        <div class="logo header-logo">
							<?php if ( ! is_front_page() ) : ?>
                            <a href="">
								<?php endif; ?>
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
								<?php if ( ! is_front_page() ) : ?>
								<?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <main>