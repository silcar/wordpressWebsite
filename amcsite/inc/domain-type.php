<?php

// Register Custom Post Type
function domain() {

    $labels = array(
        'name'                  => _x( 'Domaines', 'Post Type General Name', 'domain' ),
        'singular_name'         => _x( 'Domaines', 'Post Type Singular Name', 'domain' ),
        'menu_name'             => __( 'Domaines d\'expertise', 'domain' ),
        'name_admin_bar'        => __( 'Les Domaines d\'expertise', 'domain' ),
        'archives'              => __( 'Archives Domaines', 'domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'domain' ),
        'all_items'             => __( 'Tous les domaines d\' expertise', 'domain' ),
        'add_new_item'          => __( 'Ajouter un nouveau domaine', 'domain' ),
        'add_new'               => __( 'Ajouter', 'domain' ),
        'new_item'              => __( 'Nouvelle', 'domain' ),
        'edit_item'             => __( 'Editer domaine', 'domain' ),
        'update_item'           => __( 'Modifier domaine', 'domain' ),
        'view_item'             => __( 'Voir', 'domain' ),
        'search_items'          => __( 'Rechercher un domain', 'domain' ),
        'not_found'             => __( 'Non trouvé', 'domain' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'domain' ),
        'featured_image'        => __( 'Icône', 'domain' ),
        'set_featured_image'    => __( 'Inserer une icône', 'domain' ),
        'remove_featured_image' => __( 'Supprimer icône', 'domain' ),
        'use_featured_image'    => __( 'Utiliser icône', 'domain' ),
        'insert_into_item'      => __( 'Insert into item', 'domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'domain' ),
        'items_list'            => __( 'Liste des domaine', 'domain' ),
        'items_list_navigation' => __( 'Domaine navigation', 'domain' ),
        'filter_items_list'     => __( 'Filtrer la liste des domaines d\'expertises', 'domain' ),
    );
    $args = array(
        'label'                 => __( 'Domaine', 'domain' ),
        'description'           => __( 'Description domaine', 'domain' ),
        'labels'                => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'domain'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-multisite',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',)
    );
    register_post_type( 'domain', $args );

}
add_action( 'init', 'domain', 0 );
