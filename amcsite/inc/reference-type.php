<?php

// Register Custom Post Type
function reference() {

    $labels = array(
        'name'                  => _x( 'Références', 'Post Type General Name', 'reference' ),
        'singular_name'         => _x( 'Référence', 'Post Type Singular Name', 'reference' ),
        'menu_name'             => __( 'Référence', 'reference' ),
        'name_admin_bar'        => __( 'Nos références', 'reference' ),
        'archives'              => __( 'Item Archives', 'reference' ),
        'parent_item_colon'     => __( 'Parent Item:', 'reference' ),
        'all_items'             => __( 'Toutes les références', 'reference' ),
        'add_new_item'          => __( 'Ajouter nouvelle référence', 'reference' ),
        'add_new'               => __( 'Ajouter', 'reference' ),
        'new_item'              => __( 'Nouveau', 'reference' ),
        'edit_item'             => __( 'Editer la référence', 'reference' ),
        'update_item'           => __( 'Modifier référence', 'reference' ),
        'view_item'             => __( 'Voir', 'client' ),
        'search_items'          => __( 'Rechercher une référence', 'reference' ),
        'not_found'             => __( 'Non trouvée', 'reference' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'reference' ),
        'featured_image'        => __( 'Logo', 'reference' ),
        'set_featured_image'    => __( 'Inserer logo', 'reference' ),
        'remove_featured_image' => __( 'Supprimer Logo', 'reference' ),
        'use_featured_image'    => __( 'Utiliser Logo', 'reference' ),
        'insert_into_item'      => __( 'Insert into item', 'reference' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'reference' ),
        'items_list'            => __( 'Liste des référence', 'reference' ),
        'items_list_navigation' => __( 'Références navigation', 'reference' ),
        'filter_items_list'     => __( 'Filtrer la liste des références', 'reference' ),
    );
    $args = array(
        'label'                 => __( 'Références', 'reference' ),
        'description'           => __( 'Description de la référence', 'reference' ),
        'labels'                => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'reference'),
        'query_var' => true,
        'menu_icon' => 'dashicons-welcome-view-site',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom_fields')
    );
    register_post_type( 'reference', $args );

}
add_action( 'init', 'reference', 0 );
function add_reference_client_metabox(){

    $screen = 'reference';

    add_meta_box(
        'reference_client',
        __( 'Client', 'amc' ),
        'reference_client_metabox_loader',
        $screen,
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_reference_client_metabox');
//Functions managing the client customs' metaboxes display in admin section:
function reference_client_metabox_loader( $post ){

    wp_nonce_field( 'client_phone_metabox_loader', 'client_phone_metabox_loader_nonce' );
    $args = array(
        'post_type' => 'client',
        'posts_per_page' => 200,
        'orderby' => array(
            'title' => 'ASC'
        )
    );

    $reference_client = get_post_meta ( $post -> ID, 'reference_client', true ) ;
    var_dump($reference_client);
    $clients = new WP_Query( $args );
    echo '<select name="reference_client" id="reference_client" >';
    echo '<option value="">Sélectionner un client</option>';
    if ( $clients->have_posts() ) {

        while ($clients->have_posts()) {
            $clients->the_post();
            $c_id = get_the_ID();

            echo '<option value="'. get_the_ID() .'">';
            the_title() ;
            echo '</option>';
        }
    }// end if
    echo '<option value="">Créer un nouveau client</option>';
    echo '</select>';
    var_dump($c_id);
}
//Function managing the client custom metabox field saving process to the wordpress database:
function reference_client_metabox_data_saver( $post_id ){

    // Check if our nonce is set.
    if ( ! isset( $_POST['client_phone_metabox_loader_nonce'] ) ):
        return $post_id;
    endif;

    $nonce = $_POST['client_phone_metabox_loader_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'client_phone_metabox_loader' ) ):
        return $post_id;
    endif;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ):
        return $post_id;
    endif;

    // Check the user's permissions.
    if ( 'client' == $_POST['post_type'] ):

        if ( ! current_user_can( 'edit_page', $post_id ) ):
            return $post_id;

        else :

            if ( ! current_user_can( 'edit_post', $post_id ) ):
                return $post_id;
            endif;

        endif;

    endif;

    /* OK, its safe for us to save the data now. */

    // Sanitize user input.
    $mydata = sanitize_text_field( $_POST['client_phone'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'client_phone', $mydata );

}
add_action( 'save_post', 'reference_client_metabox_data_saver' );