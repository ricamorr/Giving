<?php
/*
    Plugin Name: Giving Theme - Portafolio
    Plugin URI: http://96.127.138.18/~syscol/prueba-giving/
    Description: Añade Custom Post Types al Portafolio del sitio Giving
    Version: 1.0.0
    Author: Ricardo Morales Ramírez
    Author URI: https://www.linkedin.com/in/moralesricardo/
    Text Domain: Giving-theme
*/

if(!defined('ABSPATH')) die();

// Registrar Portafolio Custom Post Type

function giving_portafolios_post_type() {

	$labels = array(
		'name'                  => _x( 'Portafolios', 'Post Type General Name', 'Giving-theme' ),
		'singular_name'         => _x( 'Portafolio', 'Post Type Singular Name', 'Giving-theme' ),
		'menu_name'             => __( 'Portafolio', 'Giving-theme' ),
		'name_admin_bar'        => __( 'Portafolio', 'Giving-theme' ),
		'archives'              => __( 'Archivo', 'Giving-theme' ),
		'attributes'            => __( 'Atributos', 'Giving-theme' ),
		'parent_item_colon'     => __( 'Portafolio Padre', 'Giving-theme' ),
		'all_items'             => __( 'Todos Los Portafolios', 'Giving-theme' ),
		'add_new_item'          => __( 'Agregar Portafolio', 'Giving-theme' ),
		'add_new'               => __( 'Agregar Portafolio', 'Giving-theme' ),
		'new_item'              => __( 'Nuevo Portafolio', 'Giving-theme' ),
		'edit_item'             => __( 'Editar Portafolio', 'Giving-theme' ),
		'update_item'           => __( 'Actualizar Portafolio', 'Giving-theme' ),
		'view_item'             => __( 'Ver Portafolio', 'Giving-theme' ),
		'view_items'            => __( 'Ver Portafolios', 'Giving-theme' ),
		'search_items'          => __( 'Buscar Portafolio', 'Giving-theme' ),
		'not_found'             => __( 'No Encontrado', 'Giving-theme' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'Giving-theme' ),
		'featured_image'        => __( 'Imagen Destacada', 'Giving-theme' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'Giving-theme' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'Giving-theme' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'Giving-theme' ),
		'insert_into_item'      => __( 'Insertar en Portafolio', 'Giving-theme' ),
		'uploaded_to_this_item' => __( 'Agregado en Portafolio', 'Giving-theme' ),
		'items_list'            => __( 'Lista de Portafolios', 'Giving-theme' ),
		'items_list_navigation' => __( 'Navegación de Portafolios', 'Giving-theme' ),
		'filter_items_list'     => __( 'Filtrar Portafolios', 'Giving-theme' ),
	);
	$args = array(
		'label'                 => __( 'Portafolio', 'Giving-theme' ),
		'description'           => __( 'Portafolios para el Sitio Web', 'Giving-theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'giving_portafolios', $args );

}
add_action( 'init', 'giving_portafolios_post_type', 0 );