<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
Plugin Name: Vídeo Destacado
Description: Insert a featured YouTube video for posts, pages and custom post types
Version: 1.7.2
License: GPL
Author: @airton
Author URI: http://www.airtonvancin.com
*/

/*
* Settings
*/
require_once plugin_dir_path( __FILE__ ) . 'video-destacado-settings.php';

// Activation hook: enable default post types (post & page)
register_activation_hook( __FILE__, 'video_destacado_activate' );
/**
 * Plugin activation callback.
 * Sets default enabled post types to 'post' and 'page'.
 */
function video_destacado_activate() {
    $default_types = array( 'post', 'page' );
    foreach ( $default_types as $pt ) {
        $option_name = 'video_destacado_' . $pt;
        if ( false === get_option( $option_name ) ) {
            update_option( $option_name, 1 );
        }
    }
}
/**
 * Add 'Settings' link to the plugin action links on the Plugins page.
 */
add_filter(
    'plugin_action_links_' . plugin_basename( __FILE__ ),
    'video_destacado_action_links'
);
/**
 * Prepend a Settings link to the plugin actions.
 *
 * @param array $links Existing action links.
 * @return array Modified action links.
 */
function video_destacado_action_links( $links ) {
    $settings_url = admin_url( 'options-general.php?page=video-destacado' );
    $links[] = '<a href="' . esc_url( $settings_url ) . '">' . __( 'Settings', 'video-destacado' ) . '</a>';
    return $links;
}

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
  global $post;
  $values         = get_post_custom( $post->ID );
  $id_video       = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';
  $width_video    = isset( $values['width_video'] ) ? esc_attr( $values['width_video'][0] ) : '';
  $height_video   = isset( $values['height_video'] ) ? esc_attr( $values['height_video'][0] ) : '';
  wp_nonce_field( 'video_destacado_nonce_action', 'video_destacado_nonce' );
  ?>

    <img style="<?php echo empty( $id_video ) ? 'display: none;' : 'display: block;'; ?>" class="thumb" src="<?php echo esc_url( 'https://img.youtube.com/vi/' . $id_video . '/0.jpg' ); ?>" alt="<?php echo esc_attr( get_the_title( $post->ID ) ); ?>" />

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
        <input type="submit" name="add" class="button add" value="<?php echo esc_attr__( 'Adicionar', 'video-destacado' ); ?>" />
        <input type="submit" name="del" class="button del" value="<?php echo esc_attr__( 'Remover', 'video-destacado' ); ?>" />
      </li>
    </ul>
  <?php
}

add_action( 'save_post', 'video_destaque_metabox_save' );
/**
 * Save meta box data.
 *
 * @param int $post_id Post ID.
 */
function video_destaque_metabox_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }
    if ( ! isset( $_POST['video_destacado_nonce'] ) || ! wp_verify_nonce( $_POST['video_destacado_nonce'], 'video_destacado_nonce_action' ) ) {
      return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
    }

    if ( isset( $_POST['id_video'] ) ) {
      $id_video = sanitize_text_field( wp_unslash( $_POST['id_video'] ) );
      update_post_meta( $post_id, 'id_video', $id_video );
    }
    if ( isset( $_POST['width_video'] ) ) {
      $width_video = intval( $_POST['width_video'] );
      update_post_meta( $post_id, 'width_video', $width_video );
    }
    if ( isset( $_POST['height_video'] ) ) {
      $height_video = intval( $_POST['height_video'] );
      update_post_meta( $post_id, 'height_video', $height_video );
    }
}

function video_destacado(){
  global $post;
  $values = get_post_custom( $post->ID );
  $id_video = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';

  $width_video = isset( $values['width_video'] ) ? esc_attr( $values['width_video'][0] ) : '';
  if(empty($width_video)){ $width_video = 560; }
  $height_video = isset( $values['height_video'] ) ? esc_attr( $values['height_video'][0] ) : '';
  if(empty($height_video)){ $height_video = 315; }

  if ( ! empty( $id_video ) ) {
    printf(
      '<iframe width="%1$s" height="%2$s" src="%3$s" frameborder="0" allowfullscreen></iframe>',
      esc_attr( $width_video ),
      esc_attr( $height_video ),
      esc_url( 'https://www.youtube.com/embed/' . $id_video )
    );
  }
}

// Enqueue admin scripts and styles.
add_action( 'admin_enqueue_scripts', 'video_destacado_admin_assets' );
/**
 * Enqueue admin scripts and styles in the WordPress admin.
 */
function video_destacado_admin_assets() {
  $plugin_url = plugin_dir_url( __FILE__ );
  wp_enqueue_script(
    'vd-admin-js',
    $plugin_url . 'js/vd-admin.js',
    array( 'jquery' ),
    '1.0',
    true
  );
  wp_enqueue_style(
    'vd-admin-css',
    $plugin_url . 'css/vd-admin.css',
    array(),
    '1.0'
  );
}
