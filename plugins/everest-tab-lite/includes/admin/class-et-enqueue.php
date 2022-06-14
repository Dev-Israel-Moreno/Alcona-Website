<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ETabL_Enqueue') ) {
    class ETabL_Enqueue extends ETabL_Library{
        /**
         * Enqueue all the necessary JS and CSS
         *
         * since @1.0.0
         */
        function __construct() {
            add_action('admin_enqueue_scripts', array($this, 'et_admin_load_scripts')); 
            add_action('wp_enqueue_scripts', array($this, 'register_frontend_assets'), 10000); 
        }

        /*
         * Load Admin Scripts
        */
        public function et_admin_load_scripts($hook){
            $screen = get_current_screen();
            if ($hook == 'post-new.php' || $hook == 'edit.php' || $hook == 'post.php' || $hook == 'everest_tab_page_et-about-us' || $hook == 'everest_tab_page_et-howtouse') {
                if (isset($screen->post_type) && $screen->post_type == "everest_tab") {
                    $this->et_admin_styles();
                    $this->et_admin_scripts();
                  }
            }     
        }
        
       public function et_admin_styles(){
              wp_enqueue_style('et-backend-style', ETABLite_CSS_DIR . 'et-admin-style.css', false, ETABLite_VERSION);
              wp_enqueue_style('et_fontawesome_style', ETABLite_CSS_DIR . 'available_icons/font-awesome/font-awesome.min.css',false,ETABLite_VERSION);
              wp_enqueue_style('et_icon_picker_style', ETABLite_CSS_DIR . 'icon-picker.css',false,ETABLite_VERSION);

              
        }

       public function et_admin_scripts(){
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_media();
            wp_enqueue_script( 'et_color_alpha', ETABLite_ADMIN_JS_DIR . 'wp-color-picker-alpha.js',array('wp-color-picker') ,false, ETABLite_VERSION );
            wp_enqueue_script( 'et_iconpicker', ETABLite_ADMIN_JS_DIR . 'icon-picker.js',array('jquery') ,false, ETABLite_VERSION );
            wp_enqueue_script('et-admin-script', ETABLite_ADMIN_JS_DIR . 'et-admin-script.js', array('jquery', 'wp-color-picker', 'jquery-ui-sortable'), ETABLite_VERSION);
            $admin_ajax_nonce = wp_create_nonce('et-admin-ajax-nonce');
            $admin_ajax_object = array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'ajax_nonce' => $admin_ajax_nonce,
                'delete_confirm' => __('Are you sure you want to delete this tab?','everest-tab-lite'),
            );
            wp_localize_script('et-admin-script', 'et_admin_params', $admin_ajax_object);
            

        }

       public function register_frontend_assets() {
         wp_enqueue_style('et-frontend-style', ETABLite_CSS_DIR . 'et-style.css', false, ETABLite_VERSION);
         wp_enqueue_style('et_fontawesome_style', ETABLite_CSS_DIR . 'available_icons/font-awesome/font-awesome.min.css',false,ETABLite_VERSION);
         wp_enqueue_style('et-animate-style', ETABLite_CSS_DIR . 'animate.css', false, ETABLite_VERSION);
         wp_enqueue_script('et-frontend-script', ETABLite_FRONTEND_JS_DIR . 'et-frontend-script.js', array('jquery'), ETABLite_VERSION);
      }
    }
    new ETabL_Enqueue();
}