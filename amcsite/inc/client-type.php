<?php

// Register Custom Post Type
function client() {

    $labels = array(
        'name'                  => _x( 'Clients', 'Post Type General Name', 'client' ),
        'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'client' ),
        'menu_name'             => __( 'Clients', 'client' ),
        'name_admin_bar'        => __( 'Mes Clients', 'client' ),
        'archives'              => __( 'Item Archives', 'client' ),
        'parent_item_colon'     => __( 'Parent Item:', 'client' ),
        'all_items'             => __( 'Tous les clients', 'client' ),
        'add_new_item'          => __( 'Ajouter un nouveau client', 'client' ),
        'add_new'               => __( 'Ajouter', 'client' ),
        'new_item'              => __( 'Nouveau', 'client' ),
        'edit_item'             => __( 'Editer Client', 'client' ),
        'update_item'           => __( 'Modifier Client', 'client' ),
        'view_item'             => __( 'Voir', 'client' ),
        'search_items'          => __( 'Rechercher un client', 'client' ),
        'not_found'             => __( 'Non trouvé', 'client' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'client' ),
        'featured_image'        => __( 'Logo', 'client' ),
        'set_featured_image'    => __( 'Inserer logo', 'client' ),
        'remove_featured_image' => __( 'Supprimer Logo', 'client' ),
        'use_featured_image'    => __( 'Utiliser Logo', 'client' ),
        'insert_into_item'      => __( 'Insert into item', 'client' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'client' ),
        'items_list'            => __( 'Liste des clients', 'client' ),
        'items_list_navigation' => __( 'Clients navigation', 'client' ),
        'filter_items_list'     => __( 'Filtrer la liste des clients', 'client' ),
    );
    $args = array(
        'label'                 => __( 'Clients', 'client' ),
        'description'           => __( 'Description du client', 'client' ),
        'labels'                => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'client'),
        'query_var' => true,
        'menu_icon' => 'dashicons-store',
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'custom_fields')
        );
    register_post_type( 'client', $args );

}
add_action( 'init', 'client', 0 );
function add_client_phone_metabox(){

    $screen = 'client';

    add_meta_box(
        'client_phone',
        __( 'Numéro de téléphone du client', 'amc' ),
        'client_phone_metabox_loader',
        $screen,
        'normal',
        'high'
    );
}
function add_client_email_metabox(){

    $screen = 'client';

    add_meta_box(
        'client_email',
        __( 'Adresse mail du client', 'amc' ),
        'client_email_metabox_loader',
        $screen,
        'normal',
        'high'
    );
}
function add_client_address_metabox(){

    $screen = 'client';

    add_meta_box(
        'client_address',
        __( 'Adresse du client', 'amc' ),
        'client_address_metabox_loader',
        $screen,
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_client_phone_metabox');
add_action( 'add_meta_boxes', 'add_client_email_metabox');
add_action( 'add_meta_boxes', 'add_client_address_metabox');
//Functions managing the client customs' metaboxes display in admin section:
function client_phone_metabox_loader( $post ){

    wp_nonce_field( 'client_phone_metabox_loader', 'client_phone_metabox_loader_nonce' );

    $client_phone = get_post_meta ( $post -> ID, 'client_phone', true ) ;
    echo '<label for="input_client_phone"><br/>'.
        _e( "Numéro de téléphone du client:", 'amc' )
        .'</label> '.
        '<input type="text" id="input_client_phone" name="client_phone" value="' . esc_attr( $client_phone ) . '" size="25" />';

}
function client_email_metabox_loader( $post ){

    wp_nonce_field( 'client_email_metabox_loader', 'client_email_metabox_loader_nonce' );

    $client_email = get_post_meta ( $post -> ID, 'client_email', true ) ;
    echo '<label for="input_client_email"><br/>'.
        _e( "Saisir l'adresse email du client:", 'amc' )
        .'</label> '.
        '<input type="text" id="input_client_email" name="client_email" value="' . esc_attr( $client_email ) . '" size="25" />';

}
function client_address_metabox_loader( $post ){

    wp_nonce_field( 'client_address_metabox_loader', 'client_address_metabox_loader_nonce' );

    $client_address = get_post_meta ( $post -> ID, 'client_address', true ) ;
    echo '<label for="input_client_address"><br/>'.
        _e( "Saisir l'adresse du client:", 'amc' )
        .'</label> '.
        '<textarea id="input_client_address" name="client_address" cols="50"  rows="5">' . esc_attr( $client_address ) . '</textarea>';

}
//Function managing the client custom metabox field saving process to the wordpress database:
function client_phone_metabox_data_saver( $post_id ){

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
function client_email_metabox_data_saver( $post_id ){

    // Check if our nonce is set.
    if ( ! isset( $_POST['client_email_metabox_loader_nonce'] ) ):
        return $post_id;
    endif;

    $nonce = $_POST['client_email_metabox_loader_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'client_email_metabox_loader' ) ):
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
    $mydata = sanitize_email( $_POST['client_email'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'client_email', $mydata );

}
function client_address_metabox_data_saver( $post_id ){

    // Check if our nonce is set.
    if ( ! isset( $_POST['client_address_metabox_loader_nonce'] ) ):
        return $post_id;
    endif;

    $nonce = $_POST['client_address_metabox_loader_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'client_address_metabox_loader' ) ):
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
    $mydata = sanitize_text_field( $_POST['client_address'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'client_address', $mydata );

}
add_action( 'save_post', 'client_phone_metabox_data_saver' );
add_action( 'save_post', 'client_email_metabox_data_saver' );
add_action( 'save_post', 'client_address_metabox_data_saver' );