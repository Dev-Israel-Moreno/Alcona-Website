<?php defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('ETabL_Shortcode')) {

    /**
     * Frontend Review Shortcode
     */
    class ETabL_Shortcode extends ETabL_Library {

        function __construct() {
            add_shortcode('etabs', array($this, 'et_shortcode_generator'));
        }

        /*
         * Generating shortcode with post id
         */
       public function et_shortcode_generator($atts) {
        if(isset($atts['slug'])){
            $args = array(
                'post_type' => 'everest_tab',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'p' => $this->get_ID_by_slug($atts['slug'])
            );
            $everest_tab = new WP_Query($args);
            if ($everest_tab->have_posts()) {
                ob_start();
                include( ETABLite_PATH . '/includes/frontend/etab-shortcode.php' );
                $return_data = ob_get_contents();
                ob_end_clean();
                wp_reset_query();
                if (isset($return_data)) {
                    return $return_data;
                } else {
                    return NULL;
                }
            } else {
                wp_reset_query();
                return null;
            }
           }
            
        }
    }

    new ETabL_Shortcode();
}