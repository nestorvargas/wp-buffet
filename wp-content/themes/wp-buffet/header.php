<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php wp_head(); ?>

    <title>ADA Abogados</title>
</head>

<body>
    <header class="encabezado">
        <div class="header-contact py-2">
            <div class="container py-2">
                <!-- Contenedor principal -->
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center text-center text-md-start">

                    <!-- Izquierda: Correo y Ubicación -->
                    <div class="d-flex flex-column flex-md-row align-items-center mb-2 mb-md-0">
                        <a href="mailto:correo@example.com" class="text-decoration-none me-md-3 mb-2 mb-md-0 text-orange-dark">
                            <i class="fa-solid fa-envelope"></i> angeldiaz.abogados@gmail.com
                        </a>
                        <a href="https://goo.gl/maps/tuubicacion" target="_blank" class="text-decoration-none text-orange-dark">
                            <i class="fa-solid fa-location-dot"></i> Bogota, Colombia
                        </a>
                    </div>

                    <!-- Derecha: Redes Sociales -->
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-end align-items-center">
                        <a href="https://facebook.com" target="_blank" class="text-decoration-none me-3 text-orange-dark">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="text-decoration-none me-3 text-orange-dark">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="text-decoration-none me-3 text-orange-dark">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="tel:+573145367890" class="text-decoration-none text-orange-dark">
                            <i class="fa-solid fa-phone"></i> +57 3145367890
                        </a>
                    </div>

                </div>
            </div>


        </div>

        <div class="container gx-5 py-3 menu-container-site">
            <div class="row">
                <nav class="navbar navbar-expand-lg" id="navbarADAbogados">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<span class="fw-bold">Navbar</span>'; // Texto si no hay logo
                    }
                    ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse ms-auto" id="navbarNav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'container'       => false,
                            'menu_class'      => 'navbar-nav ms-auto text-center',
                            'fallback_cb'     => '__return_false',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 2,
                        ));
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>
