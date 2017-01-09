<?php

// Register Custom Post Type
function expertise() {

    $labels = array(
        'name'                  => _x( 'Interventions', 'Post Type General Name', 'expertise' ),
        'singular_name'         => _x( 'Interventions', 'Post Type Singular Name', 'expertise' ),
        'menu_name'             => __( 'Types d\'intervention', 'expertise' ),
        'name_admin_bar'        => __( 'Les Types d\'intervention', 'expertise' ),
        'archives'              => __( 'Archives Types intervention', 'expertise' ),
        'parent_item_colon'     => __( 'Parent Item:', 'expertise' ),
        'all_items'             => __( 'Tous les types d\' interventions', 'expertise' ),
        'add_new_item'          => __( 'Ajouter une nouveau type d\'intervention', 'expertise' ),
        'add_new'               => __( 'Ajouter', 'expertise' ),
        'new_item'              => __( 'Nouveau', 'expertise' ),
        'edit_item'             => __( 'Editer type d\'intervention', 'expertise' ),
        'update_item'           => __( 'Modifier type d\'intervention', 'expertise' ),
        'view_item'             => __( 'Voir', 'expertise' ),
        'search_items'          => __( 'Rechercher un type d\'intervention', 'expertise' ),
        'not_found'             => __( 'Non trouvé', 'expertise' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'expertise' ),
        'featured_image'        => __( 'Icône', 'expertise' ),
        'set_featured_image'    => __( 'Inserer une icône', 'expertise' ),
        'remove_featured_image' => __( 'Supprimer icône', 'expertise' ),
        'use_featured_image'    => __( 'Utiliser icône', 'expertise' ),
        'insert_into_item'      => __( 'Insert into item', 'expertise' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'expertise' ),
        'items_list'            => __( 'Liste des types d\'intervention', 'expertise' ),
        'items_list_navigation' => __( 'navigation', 'expertise' ),
        'filter_items_list'     => __( 'Filtrer la liste des types d\'interventions', 'expertise' ),
    );
    $args = array(
        'label'                 => __( 'intervention', 'expertise' ),
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
