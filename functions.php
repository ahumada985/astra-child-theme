<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/**
 * Agregar video de cachorro en la página principal
 */
function add_puppy_video() {
    if (is_home() || is_front_page()) {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.createElement('video');
            video.src = '<?php echo get_stylesheet_directory_uri(); ?>/pup-animado.mp4';
            video.autoplay = true;
            video.loop = true;
            video.muted = true;
            video.playsInline = true;
            video.controls = false;
            video.setAttribute('webkit-playsinline', '');
            video.setAttribute('playsinline', '');
            video.style.cssText = `
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                height: 300px;
                z-index: 1000;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                object-fit: cover;
                background: #f0f0f0;
            `;

            // Forzar reproducción después de cargar
            video.addEventListener('loadeddata', function() {
                video.play().catch(function(error) {
                    console.log('Error al reproducir video:', error);
                });
            });

            document.body.appendChild(video);
        });
        </script>
        <?php
    }
}
add_action('wp_head', 'add_puppy_video');