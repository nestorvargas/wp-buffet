<?php get_header() ?>

<div class="container-fluid">
    <div class="slider-home">
        <?php
        if (is_front_page() || is_home()) {
            echo do_shortcode('[smartslider3 slider="2"]'); // Cambia "1" por el ID de tu slider
        }
        ?>
    </div>
    <main id="main" class="site-main">
        <?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        ?>
    </main>
</div>
<?php get_footer() ?>
