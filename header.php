<!DOCTYPE HTML>
<html>
<head <?php language_attributes(); ?>>
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    wp_head();
    $favicon = get_option('theme_favicon');
    ?>
    <meta name='apple-itunes-app' content='app-id=​myAppStoreID​'>
    <link rel="icon" href="<?php print $favicon; ?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php print $favicon; ?>" type="image/x-icon"/>

</head>
<body <?php body_class(); ?>>
<script>
</script>
<div id="root">
    <div class="app">
        <div class="app_main">
            <header id="header" class="header<?php echo is_front_page() ? ' bg_white' : ''; ?>">
                <div class="container">
                    <h2>Its Header</h2>
                </div>
            </header>
            <main>