<?php

//Consultas reutilizables
require get_template_directory() . '/inc/queries.php';

//Cuando el tema es activado
function giving_setup()
{
    //habilitar imágenes destacadas
    add_theme_support('post-thumbnails');

    //Títulos SEO
    add_theme_support('title-tag');

    //Agregar imágenes de tamaño personalizado
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}
add_action('after_setup_theme', 'giving_setup');

// Menus de navegación
function giving_menus()
{
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'Giving-theme')
    ));
}

add_action('init', 'giving_menus');

//Scripts y Styles
function giving_scripts_styles()
{
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');

    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&family=Oswald:wght@300;400;700&display=swap', array(), '1.0.0');

    // Hoja de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');

    wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'giving_scripts_styles');

// Definir Zona de Widgets
function giving_widgets() 
{
    register_sidebar( array(
        'name' => 'Sidebar Portafolio',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="texto-primario">',
        'after_title' => '</h3>'
    ));

    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'giving_widgets');

/** Imagen Hero **/

function giving_hero_image()
{
    // Obtener ID pagina principal
    $front_page_id = get_option('page_on_front');

    // Obtener ID imagen
    $id_imagen = get_field('imagen_hero', $front_page_id);

    // Obtener la imagen
    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];

    //Estilo CSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $imagen_destacada_css = "
        body.home .site-header {
            background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75) ), url($imagen) ;
        }
    ";
    wp_add_inline_style('custom', $imagen_destacada_css);
}
add_action('init', 'giving_hero_image');