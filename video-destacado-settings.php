<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/*  ==========================================================================
    Page Settings
    ========================================================================== */

	add_action( 'admin_menu', 'video_destacado_settings' );

    function video_destacado_settings() {
        // criamos a pagina de opções com esta função
        add_options_page( __( 'Vídeo Destacado Settings', 'video-destacado' ), __( 'Vídeo Destacado', 'video-destacado' ), 'manage_options', 'video-destacado', 'video_destacado_settings_content' );

        //call register settings function
        add_action( 'admin_init', 'video_destacado_register' );

	}

    function video_destacado_register() {
        //register our settings
        $post_types = get_post_types( array( 'public' => true ) );
        foreach ( $post_types as $post_type ) {
            register_setting( 'video-destacado-settings-group', 'video_destacado_' . $post_type );
        }
    }


    function video_destacado_settings_content() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Vídeo Destacado Settings', 'video-destacado' ); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'video-destacado-settings-group' );
                do_settings_sections( 'video-destacado-settings-group' );
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'Enable meta box for post types:', 'video-destacado' ); ?></th>
                        <td>
                            <?php
                            $post_types = get_post_types( array( 'public' => true ), 'objects' );
                            foreach ( $post_types as $pt ) {
                                $option_name = 'video_destacado_' . $pt->name;
                                ?>
                                <label>
                                    <input type="checkbox" name="<?php echo esc_attr( $option_name ); ?>" value="1" <?php checked( 1, get_option( $option_name ) ); ?> />
                                    <?php echo esc_html( $pt->labels->singular_name ); ?>
                                </label><br />
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
?>
