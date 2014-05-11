<?php

/*
Plugin Name: Vídeo Destacado
Description: Inserir um vídeo destacado do Youtube, para posts, páginas e custom post types
Version: 1.0
License: GPL
Author: Airton Vancin Junior
Author URI: http://www.vancindesign.com.br
*/

/*
* Settings
*/
include_once ('video-destacado-settings.php');

add_action( 'add_meta_boxes', 'video_add_metaboxes' );
function video_add_metaboxes(){
    $post_types = get_post_types( array( 'public' => true ) );
    foreach ( $post_types as $post_type ) {
        if ( get_option('video_destacado_'.$post_type) ) {
            add_meta_box( 'video_destaque_metabox', 'Vídeo Destacado', 'video_destaque_metabox', $post_type, 'side', 'default' );
        }
    }
}
function video_destaque_metabox(){
    $values         = get_post_custom( $post->ID );
    $id_video       = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';
    $width_video    = isset( $values['width_video'] ) ? esc_attr( $values['width_video'][0] ) : '';
    $height_video   = isset( $values['height_video'] ) ? esc_attr( $values['height_video'][0] ) : '';
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>

        <img style="<?php if(empty($id_video)){echo 'display: none;' ;} else {echo 'display: block' ;}  ?>" class="thumb" src="http://img.youtube.com/vi/<?php echo $id_video; ?>/0.jpg" alt="<?php echo $titulo_video; ?>" />

        <ul id='video-destaque'>
            <li><span>ID do Vídeo:</span> <input type="text" id="id_video" name="id_video" value="<?php echo $id_video; ?>" /><small>Ex: www.youtube.com/watch?v=<b>XdMD4LrC4wY</b></small></li>
            <li>
                <div class="vd-options">
                    <a href="#">More Options</a>
                </div>
                <div class="vd-more">
                    <div class="box">
                        <span>Width:</span>
                        <input type="text" id="width_video" name="width_video" value="<?php echo $width_video; ?>" />
                        <small>Default: <b>560</b></small>
                    </div>
                    <div class="box">
                        <span>Height:</span>
                        <input type="text" id="height_video" name="height_video" value="<?php echo $height_video; ?>" />
                        <small>Default: <b>315</b></small>
                    </div>
                </div>
            </li>
            <li>
                <!-- <input type="button" tabindex="3" value="Adicionar" class="button add">
                <input type="button" tabindex="3" value="Remover" class="button del"> -->
                <?php submit_button('Adicionar', 'secondary small', 'add', false); ?>
                <?php submit_button('Remover', 'secondary small', 'del', false); ?>
            </li>


        </ul>
  <?php
}

add_action( 'save_post', 'video_destaque_metabox_save' );
function video_destaque_metabox_save( $post_id ){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    $allowed = array(
    'a' => array(
    'href' => array()
    )
    );

    if( isset( $_POST['texto_meta_box'] ) )
    update_post_meta( $post_id, 'texto_meta_box', wp_kses( $_POST['texto_meta_box'], $allowed ) );
    update_post_meta( $post_id, 'id_video', wp_kses( $_POST['id_video'], $allowed ) );
    update_post_meta( $post_id, 'width_video', wp_kses( $_POST['width_video'], $allowed ) );
    update_post_meta( $post_id, 'height_video', wp_kses( $_POST['height_video'], $allowed ) );
}

function video_destacado(){
    $values = get_post_custom( $post->ID );
    $id_video = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';

    $width_video = isset( $values['width_video'] ) ? esc_attr( $values['width_video'][0] ) : '';
    if(empty($width_video)){ $width_video = 560; }
    $height_video = isset( $values['height_video'] ) ? esc_attr( $values['height_video'][0] ) : '';
    if(empty($height_video)){ $height_video = 315; }

    if(!empty($id_video)):
    $iframe = "<iframe width='".$width_video."' height='".$height_video."' src='http://www.youtube.com/embed/".$id_video."' frameborder='0' allowfullscreen></iframe>";
    echo $iframe;
    endif;
}

function vide_destacado_scripts() {
	wp_register_script('my-script', plugins_url('video-destacado') . '/js/vd-admin.js');
	wp_enqueue_script('my-script');
	//wp_enqueue_script('jquery');
}
function video_destacado_styles() {
	wp_register_style('my-css', plugins_url('video-destacado') . '/css/vd-admin.css');
	wp_enqueue_style('my-css');
}
add_action('admin_print_scripts', 'vide_destacado_scripts');
add_action('admin_print_styles', 'video_destacado_styles');
