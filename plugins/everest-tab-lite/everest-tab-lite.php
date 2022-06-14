<?php defined('ABSPATH') or die('No script kiddies please!');
/*
  Plugin Name: Everest Tab Lite
  Plugin URI:  https://accesspressthemes.com/wordpress-plugins/everest-tab-lite/
  Description: Multiple Tab Creation | Shortcode Integration | Order Tab With Drag & Drop Functionality | Fully Responsive
  Version:     2.0.0
  Author:      AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License:     GPLv2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: everest-tab-lite
 */
/**
 * Plugin Main Class
 *
 * @since 1.0.0
*/
if (!class_exists('ETab_Lite_Class')) {

    class ETab_Lite_Class{

        function __construct() {
            $this->define_constants();
            $this->includes();
        }

        /**
         * Define Everest Tab Lite Constants.
         */
        private function define_constants() {
          $this->define('ETABLite_TITLE', 'Everest Tab Lite');
          $this->define('ETABLite_VERSION', '2.0.0');
          $this->define('ETABLite_TD', 'everest-tab-lite');
          $this->define('ETABLite_IMAGE_DIR', plugin_dir_url(__FILE__) . 'assets/images/');
          $this->define('ETABLite_ADMIN_JS_DIR', plugin_dir_url(__FILE__) . 'assets/js/admin/');
          $this->define('ETABLite_FRONTEND_JS_DIR', plugin_dir_url(__FILE__) . 'assets/js/frontend/');
          $this->define('ETABLite_CSS_DIR', plugin_dir_url(__FILE__) . 'assets/css/');
          $this->define('ETABLite_PATH', plugin_dir_path(__FILE__));
          $this->define('ETABLite_URL', plugin_dir_url(__FILE__));
        }

         /**
           * Define constant if not already set.
          */
          private function define( $name, $value ) {
            if ( ! defined( $name ) ) {
              define( $name, $value );
            }
          }

         /**
         * Includes all the necessary files
         */
        public function includes(){
            include(ETABLite_PATH . '/includes/admin/class-et-library.php');
            include(ETABLite_PATH . '/includes/admin/class-et-activation.php');
            include(ETABLite_PATH . '/includes/admin/class-et-register-post-types.php');
            include(ETABLite_PATH . '/includes/admin/class-et-enqueue.php');
            include(ETABLite_PATH . '/includes/admin/class-et-admin-ajax.php');
            include(ETABLite_PATH . '/includes/admin/class-et-register-widget.php');
            include(ETABLite_PATH . '/includes/admin/class-et-shortcode-generator.php');
        }


    }

    $etab_lite_object = new ETab_Lite_Class();
}
