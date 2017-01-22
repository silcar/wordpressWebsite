<?php

// Register Custom Post Type
function intervention() {

    $labels = array(
        'name'                  => _x( 'Interventions', 'Post Type General Name', 'intervention' ),
        'singular_name'         => _x( 'Interventions', 'Post Type Singular Name', 'intervention' ),
        'menu_name'             => __( 'Types d\'intervention', 'intervention' ),
        'name_admin_bar'        => __( 'Les Types d\'intervention', 'intervention' ),
        'archives'              => __( 'Archives Types intervention', 'intervention' ),
        'parent_item_colon'     => __( 'Parent Item:', 'intervention' ),
        'all_items'             => __( 'Tous les types d\' interventions', 'intervention' ),
        'add_new_item'          => __( 'Ajouter une nouveau type d\'intervention', 'intervention' ),
        'add_new'               => __( 'Ajouter', 'intervention' ),
        'new_item'              => __( 'Nouveau', 'intervention' ),
        'edit_item'             => __( 'Editer type d\'intervention', 'intervention' ),
        'update_item'           => __( 'Modifier type d\'intervention', 'intervention' ),
        'view_item'             => __( 'Voir', 'intervention' ),
        'search_items'          => __( 'Rechercher un type d\'intervention', 'intervention' ),
        'not_found'             => __( 'Non trouvé', 'intervention' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'intervention' ),
        'featured_image'        => __( 'Icône', 'intervention' ),
        'set_featured_image'    => __( 'Inserer une icône', 'intervention' ),
        'remove_featured_image' => __( 'Supprimer icône', 'intervention' ),
        'use_featured_image'    => __( 'Utiliser icône', 'intervention' ),
        'insert_into_item'      => __( 'Insert into item', 'intervention' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'intervention' ),
        'items_list'            => __( 'Liste des types d\'intervention', 'intervention' ),
        'items_list_navigation' => __( 'navigation', 'intervention' ),
        'filter_items_list'     => __( 'Filtrer la liste des types d\'interventions', 'intervention' ),
    );
    $args = array(
        'label'                 => __( 'intervention', 'intervention' ),
        'description'           => __( 'Description intervention', 'intervention' ),
        'labels'                => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'type-intervention'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-network',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',)
    );
    register_post_type( 'intervention', $args );

}
add_action( 'init', 'intervention', 0 );
