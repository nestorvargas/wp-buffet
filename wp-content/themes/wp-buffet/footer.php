<footer class="text-center mt-4 pt-4 bg-footer-site">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container py-3">
        <div class="row text-center text-md-start align-items-center">

            <!-- Logo + Redes Sociales -->
            <div class="col-12 col-md-3 mb-3 mb-md-0 d-flex flex-column align-items-center align-items-md-start">
                <div class="logo-footer mb-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt="Logo" class="img-fluid">
                </div>
                <div class="menu-footer-social d-flex justify-content-center justify-content-md-start">
                    <a href="https://facebook.com" target="_blank" class="text-decoration-none me-3 text-orange-dark">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-decoration-none me-3 text-orange-dark">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="text-decoration-none me-3 text-orange-dark">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Menú principal -->
            <div class="col-12 col-md-6 mb-3 mb-md-0">
                <div class="menu-footer-site" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'container'       => false,
                        'menu_class'      => 'navbar-nav flex-column flex-md-row justify-content-center gap-2',
                        'fallback_cb'     => '__return_false',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 2,
                    ));
                    ?>
                </div>
            </div>

            <!-- WhatsApp -->
            <div class="col-12 col-md-3 d-flex justify-content-center justify-content-md-end">
                <div class="menu-footer-whatsapp">
                    <a href="tel:+573145367890" class="text-decoration-none text-orange-dark">
                        <i class="fa-brands fa-whatsapp"></i> +57 3145367890
                    </a>
                </div>
            </div>

        </div>
    </div>


    <?php wp_footer(); ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-footer-site-year">
                    <?php
                    print(date('Y'));
                    ?>
                    Desarrollado por TAP Agencia
                </p>
            </div>
        </div>
    </div>

</footer>

</body>

</html>
