<?php

// Register Custom Post Type
function expertise() {

    $labels = array(
        'name'                  => _x( 'Expertises', 'Post Type General Name', 'expertise' ),
        'singular_name'         => _x( 'Expertise', 'Post Type Singular Name', 'expertise' ),
        'menu_name'             => __( 'Expertises', 'expertise' ),
        'name_admin_bar'        => __( 'Les Types d\'expertise', 'expertise' ),
        'archives'              => __( 'Archives Expertise', 'expertise' ),
        'parent_item_colon'     => __( 'Parent Item:', 'expertise' ),
        'all_items'             => __( 'Tous les types d\' expertises', 'expertise' ),
        'add_new_item'          => __( 'Ajouter une nouvelle expertise', 'expertise' ),
        'add_new'               => __( 'Ajouter', 'expertise' ),
        'new_item'              => __( 'Nouvelle', 'expertise' ),
        'edit_item'             => __( 'Editer expertise', 'expertise' ),
        'update_item'           => __( 'Modifier Expertise', 'expertise' ),
        'view_item'             => __( 'Voir', 'expertise' ),
        'search_items'          => __( 'Rechercher une expertise', 'expertise' ),
        'not_found'             => __( 'Non trouvée', 'expertise' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'expertise' ),
        'featured_image'        => __( 'Icône', 'expertise' ),
        'set_featured_image'    => __( 'Inserer une icône', 'expertise' ),
        'remove_featured_image' => __( 'Supprimer icône', 'expertise' ),
        'use_featured_image'    => __( 'Utiliser icône', 'expertise' ),
        'insert_into_item'      => __( 'Insert into item', 'expertise' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'expertise' ),
        'items_list'            => __( 'Liste des expertises', 'expertise' ),
        'items_list_navigation' => __( 'Actualités navigation', 'expertise' ),
        'filter_items_list'     => __( 'Filtrer la liste des types d\'expertises', 'expertise' ),
    );
    $args = array(
        'label'                 => __( 'Expertise', 'expertise' ),
        'description'           => __( 'Description expertise', 'expertise' ),
        'labels'                => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'expertise'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-network',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',)
    );
    register_post_type( 'expertise', $args );

}
add_action( 'init', 'expertise', 0 );
