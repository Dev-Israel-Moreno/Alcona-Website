<?php
/**
 * Created by Dailenis Zamora.
 * User: Dailenis
 * Date: 08-Ago-20
 * Time: 2:03 AM
 */

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'parallaxsome-style' for the parallaxsome theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

/*Cargando mi JS*/
function aplicar_jquery_script() {

    wp_register_script('custom_script', get_stylesheet_directory_uri() .'/myscript.js', array( 'jquery' ), true);
    wp_enqueue_script('custom_script');
}
add_action( 'wp_enqueue_scripts', 'aplicar_jquery_script' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/* Add post thumbnail */

if ( has_post_thumbnail() ) {
    the_post_thumbnail();
    }

/*POLYLANG */
pll_register_string("Todos los derechos reservados", "Todos los derechos reservados", "Header");


/* CAMBIANDO EL FOOTER DEL TEMA */
if ( ! function_exists( 'flash_footer_copyright' ) ) :
    /**
     * Footer Copyright Text.
     *
     * @since Flash 1.0
     */
    function flash_footer_copyright() {
        ?>
        <div class="copyright">
    <span class="copyright-text">
        <?php printf( esc_html__( ' %1$s %2$s', 'flash' ), '&copy; ', date( 'Y' ) ); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
        <?php  printf( pll__("Todos los derechos reservados") ) ?>
        
    </span>
        </div><!-- .copyright -->
        <?php
    }
endif;

add_action( 'flash_copyright_area', 'flash_footer_copyright' );


