<?php

// Register Custom Post Type
function actualite() {

    $labels = array(
        'name'                  => _x( 'Actualités', 'Post Type General Name', 'actualite' ),
        'singular_name'         => _x( 'Actualité', 'Post Type Singular Name', 'actualite' ),
        'menu_name'             => __( 'Actualités', 'actualite' ),
        'name_admin_bar'        => __( 'Les Actualités', 'actualite' ),
        'archives'              => __( 'Archives Actualités', 'actualite' ),
        'parent_item_colon'     => __( 'Parent Item:', 'actualite' ),
        'all_items'             => __( 'Toutes les actualités', 'actualite' ),
        'add_new_item'          => __( 'Ajouter une nouvelle actualité', 'actualite' ),
        'add_new'               => __( 'Ajouter', 'actualite' ),
        'new_item'              => __( 'Nouvelle', 'actualite' ),
        'edit_item'             => __( 'Editer Actualité', 'actualite' ),
        'update_item'           => __( 'Modifier Actualité', 'actualite' ),
        'view_item'             => __( 'Voir', 'actualite' ),
        'search_items'          => __( 'Rechercher une actualité', 'actualite' ),
        'not_found'             => __( 'Non trouvée', 'text_domain' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'actualite' ),
        'featured_image'        => __( 'Image à la Une', 'actualite' ),
        'set_featured_image'    => __( 'Inserer Image à la Une', 'actualite' ),
        'remove_featured_image' => __( 'Supprimer Image à la Une', 'actualite' ),
        'use_featured_image'    => __( 'Utiliser Image à la Une', 'actualite' ),
        'insert_into_item'      => __( 'Insert into item', 'actualite' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'actualite' ),
        'items_list'            => __( 'Liste des actualités', 'actualite' ),
        'items_list_navigation' => __( 'Actualités navigation', 'actualite' ),
        'filter_items_list'     => __( 'Filtrer la liste des actualités', 'actualite' ),
    );
    $args = array(
        'label'                 => __( 'Actualite', 'actualite' ),
        'description'           => __( 'Description actualite', 'actualite' ),
        'labels'                => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'actualite'),
        'query_var' => true,
        'menu_icon' => 'dashicons-media-text',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',)
    );
    register_post_type( 'actualite', $args );

}
add_action( 'init', 'actualite', 0 );
