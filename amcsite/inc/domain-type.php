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

function add_custom_meta_boxes() {

    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_attachment',
        'Image de couverture',
        'wp_custom_attachment',
        'domain',
        'side'
    );

    // Define the custom attachment for pages
    add_meta_box(
        'wp_custom_attachment',
        'Image de couverture',
        'wp_custom_attachment',
        'expertise',
        'side'
    );

} // end add_custom_meta_boxes
function add_expertise_intervention_metabox(){

    $screen = 'domain';

    add_meta_box(
        'expertise_intervention',
        __( 'Types d\'intervention', 'amc' ),
        'expertise_intervention_metabox_loader',
        $screen,
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');
add_action('add_meta_boxes', 'add_expertise_intervention_metabox');
function wp_custom_attachment($post) {

    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');

    $resources = get_post_meta( $post->ID, 'wp_custom_attachment', true );
    $expStr = explode("/uploads/", $resources['url']);
    $uploads = wp_upload_dir();
    $upload_path = $uploads['baseurl'];
    $resources_url = $upload_path . '/' . $expStr[1];
    $html = '<p class="description">';
    $html .= 'Télécharger image de cover';
    $html .= '</p>';
    $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" accept="image/*" value="'. $resources['url'] .'" size="25" />';
    if($resources){
        $html .= '<p>';
        $html .= '<img id="cover-img" src="'. $resources_url .'" style="width:245px; height:auto;">';
        $html .= '</p>';
        $html .= '<p>';
        $html .= '<a href="#" id="remove-cover-img" style="cursor:pointer; text-decoration: underline">Supprimer l\'image de couverture</a>';
        $html .= '</p>';
    }
    echo $html;

} // end wp_custom_attachment

//Functions managing the client customs' metaboxes display in admin section:
function expertise_intervention_metabox_loader( $post ){

    wp_nonce_field( 'expertise_intervention_metabox_loader', 'expertise_intervention_metabox_loader_nonce' );
    $args = array(
        'post_type' => 'expertise',
        'posts_per_page' => 200,
        'orderby' => array(
            'title' => 'ASC'
        )
    );

    $expertise_intervention = get_post_meta ( $post -> ID, 'expertise_intervention', true ) ;
    $interventions = new WP_Query( $args );
    echo '<h5 style="font-size:1.3rem">Choisir les types d\'intervention pour ce domaine d\'expertise</h5>';

    if ( $interventions->have_posts() ) {
        echo '<div class="row">';
        while ($interventions->have_posts()) {
            $interventions->the_post();
            $text='';
            $c_id = get_the_ID();
            if(in_array($c_id, $expertise_intervention)){
                $text = 'checked="checked"';
            }
            echo '<div class="col s6">
      <input class="filled-in" value="'. get_the_ID() .'" name="expertise_intervention[]" type="checkbox" id="typeIn'. get_the_ID() .'" '. $text .' />
      <label for="typeIn'. get_the_ID() .'">';
            the_title() ;
            echo '</label>
    </div>';
        }
        echo '</div>';
    }// end if
}
function save_custom_meta_data($id) {

    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
        return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $id;
    } // end if

    if('domain' == $_POST['post_type']) {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('image/png', 'image/jpeg', 'image/gif');

        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));

            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wp_custom_attachment', $upload);
                update_post_meta($id, 'wp_custom_attachment', $upload);
            } // end if/else

        } else {
            wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function expertise_intervention_metabox_data_saver( $post_id ){

    // Check if our nonce is set.
    if ( ! isset( $_POST['expertise_intervention_metabox_loader_nonce'] ) ):
        return $post_id;
    endif;

    $nonce = $_POST['expertise_intervention_metabox_loader_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'expertise_intervention_metabox_loader' ) ):
        return $post_id;
    endif;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ):
        return $post_id;
    endif;

    // Check the user's permissions.
    if ( 'client' == $_POST['expertise_intervention'] ):

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
    $mydata = ( $_POST['expertise_intervention'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'expertise_intervention', $mydata );

}
add_action( 'save_post', 'expertise_intervention_metabox_data_saver' );
add_action('save_post', 'save_custom_meta_data');
function update_edit_form(){
    echo ' enctype="multipart/form-data"';
}
add_action('post_edit_form_tag', 'update_edit_form');