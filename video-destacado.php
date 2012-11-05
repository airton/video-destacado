<?php

/*
Plugin Name: Vídeo Destacado
Description: Inserir um vídeo destacado do Youtube, para posts, páginas e custom post types
Version: 0.1
License: GPL
Author: Airton Vancin Junior
Author URI: http://www.vancindesign.com.br
*/

add_action( 'add_meta_boxes', 'video_add_metaboxes' );
function video_add_metaboxes(){
    add_meta_box( 'video_destaque_metabox', 'Vídeo Destacado', 'video_destaque_metabox', 'post', 'side', 'high' );
}
function video_destaque_metabox(){
        $values = get_post_custom( $post->ID );
        $id_video       = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';
/*        $titulo_video   = isset( $values['titulo_video'] ) ? esc_attr( $values['titulo_video'][0] ) : '';
        $desc_video     = isset( $values['desc_video'] ) ? esc_attr( $values['desc_video'][0] ) : '';*/
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>

        <img style="<? if(empty($id_video)){echo 'display: none;' ;} else {echo 'display: block' ;}  ?>" class="thumb" src="http://img.youtube.com/vi/<? echo $id_video ?>/0.jpg" alt="<? echo $titulo_video ?>" />

        <ul id='video-destaque'>
            <li><span>ID do Vídeo:</span> <input type="text" id="id_video" name="id_video" value="<? echo $id_video ?>" /><small>Ex: www.youtube.com/watch?v=<b>XdMD4LrC4wY</b></small></li>
<!--             <li><span>Título:</span> <input type="text" id="titulo_video" name="titulo_video" value="<? //echo $titulo_video ?>" /></li>
            <li><span>Descrição:</span> <input type="text" id="desc_video" name="desc_video" value="<? //echo $desc_video ?>" /></li> -->
            <li><input type="button" tabindex="3" value="Adicionar" class="button add"><input type="button" tabindex="3" value="Remover" class="button del"></li>
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
        /*update_post_meta( $post_id, 'titulo_video', wp_kses( $_POST['titulo_video'], $allowed ) );
        update_post_meta( $post_id, 'desc_video', wp_kses( $_POST['desc_video'], $allowed ) );*/

}

function vd_scripts() {
    wp_register_script('my-upload', plugins_url('video-destacado') . '/js/vd-admin.js');
    wp_enqueue_script('my-upload');
}
function vd_styles() {
    wp_register_style('custom-admin', plugins_url('video-destacado') . '/css/vd-admin.css');
    wp_enqueue_style('custom-admin');
}
add_action('admin_print_scripts', 'vd_scripts');
add_action('admin_print_styles', 'vd_styles');