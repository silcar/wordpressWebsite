<?php

// Register Custom Team member Type
function equipe() {

    $labels = array(
        'name'                  => _x( 'Equipe', 'Post Type General Name', 'equipe' ),
        'singular_name'         => _x( 'Equipe', 'Post Type Singular Name', 'equipe' ),
        'menu_name'             => __( 'Equipe', 'equipe' ),
        'name_admin_bar'        => __( 'Notre équipe', 'equipe' ),
        'archives'              => __( 'Item Archives', 'equipe' ),
        'parent_item_colon'     => __( 'Parent Item:', 'equipe' ),
        'all_items'             => __( 'Tous les membres', 'equipe' ),
        'add_new_item'          => __( 'Ajouter un nouveau membre', 'equipe' ),
        'add_new'               => __( 'Ajouter', 'equipe' ),
        'new_item'              => __( 'Nouveau', 'equipe' ),
        'edit_item'             => __( 'Editer Membre', 'equipe' ),
        'update_item'           => __( 'Modifier Membre', 'equipe' ),
        'view_item'             => __( 'Voir', 'equipe' ),
        'search_items'          => __( 'Rechercher un membre', 'equipe' ),
        'not_found'             => __( 'Non trouvé', 'equipe' ),
        'not_found_in_trash'    => __( 'Introuvable dans corbeille', 'equipe' ),
        'featured_image'        => __( 'Photo', 'equipe' ),
        'set_featured_image'    => __( 'Inserer Photo du membre', 'equipe' ),
        'remove_featured_image' => __( 'Supprimer photo', 'equipe' ),
        'use_featured_image'    => __( 'Utiliser Photo', 'equipe' ),
        'insert_into_item'      => __( 'Insert into item', 'equipe' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'equipe' ),
        'items_list'            => __( 'Liste des membres', 'equipe' ),
        'items_list_navigation' => __( 'Équipe navigation', 'equipe' ),
        'filter_items_list'     => __( 'Filtrer la liste des membres', 'equipe' ),
    );
    $args = array(
        'label'                 => __( 'Équipe AMC', 'equipe' ),
        'description'           => __( 'Description du membre', 'equipe' ),
        'labels'                => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'equipe'),
        'query_var' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'custom_fields')
    );
    register_post_type( 'equipe', $args );

}
add_action( 'init', 'equipe', 0 );
function add_member_function_metabox(){

    $screen = 'equipe';

    add_meta_box(
        'member_function',
        __( 'Fonction du membre', 'amc' ),
        'member_function_metabox_loader',
        $screen,
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_member_function_metabox');
//Functions managing the client customs' metaboxes display in admin section:

function member_function_metabox_loader( $post ){

    wp_nonce_field( 'member_function_metabox_loader', 'member_function_metabox_loader_nonce' );

    $member_function = get_post_meta ( $post -> ID, 'member_function', true ) ;
    echo '<label for="input_member_function"><br/>'.
        _e( "Saisir la fonction du membre:", 'amc' )
        .'</label> '.
        '<textarea id="input_member_function" name="member_function" cols="50"  rows="5">' . esc_attr( $member_function ) . '</textarea>';

}
//Function managing the client custom metabox field saving process to the wordpress database:
function member_function_metabox_data_saver( $post_id ){

    // Check if our nonce is set.
    if ( ! isset( $_POST['member_function_metabox_loader_nonce'] ) ):
        return $post_id;
    endif;

    $nonce = $_POST['member_function_metabox_loader_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'member_function_metabox_loader' ) ):
        return $post_id;
    endif;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ):
        return $post_id;
    endif;

    // Check the user's permissions.
    if ( 'equipe' == $_POST['post_type'] ):

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
    $mydata = sanitize_text_field( $_POST['member_function'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'member_function', $mydata );

}
add_action( 'save_post', 'member_function_metabox_data_saver' );