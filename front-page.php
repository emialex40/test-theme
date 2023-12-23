<?php
    get_header();

?>

<section class="section-products">
    <div class="container">
        <?php echo do_shortcode('[products limit="4" columns="4" order="ASC"]'); ?>
    </div>
</section>



<?php get_footer(); ?>  