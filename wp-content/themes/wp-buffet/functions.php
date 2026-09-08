<?php

/**
 * Registrar menús de navegación.
 * Comprueba si la función register_nav_menus existe y luego registra los menús de navegación.
 */
if(function_exists('register_nav_menus')){

    register_nav_menus(array(
        'primary' => 'Primary Menu site',
        'footer' => 'Footer Menu'
    ));

}

/**
 * Enqueue scripts y estilos.
 * Carga los archivos CSS y JavaScript generados por Webpack.
 */
function wp_buffet_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // Cargar CSS generado por Webpack
    wp_enqueue_style('wp-buffet-style', get_template_directory_uri() . '/assets/css/theme.css', [], $theme_version);

    // Cargar JavaScript generado por Webpack
    wp_enqueue_script('wp-buffet-script', get_template_directory_uri() . '/assets/js/theme.js', [], $theme_version, true);

    wp_enqueue_style('kadence-blocks-style');
    wp_enqueue_script('kadence-blocks-script');
}

add_action('wp_enqueue_scripts', 'wp_buffet_enqueue_assets');

/**
 * Configuración del logo personalizado.
 * Añade soporte para un logo personalizado con dimensiones flexibles.
 */
function wp_buffet_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}

add_action('after_setup_theme', 'wp_buffet_custom_logo_setup');
