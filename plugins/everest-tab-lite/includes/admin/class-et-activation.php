<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );
if ( !class_exists( 'ETabL_Activation' ) ) {

    class ETabL_Activation extends ETabL_Library{
 
        /**
         * Executes all the tasks on plugin activation
         * 
         * @since 1.0.0
         */
        function __construct() {   
            register_activation_hook( ETABLite_PATH . 'everest-tab-lite.php' , array($this, 'etab_lite_activation'));
        }

         public function etab_lite_activation() {
           include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
           if (is_plugin_active('everest-tab/everest-tab.php')) {
             wp_die( __( 'You need to deactivate Everest Tab Premium Plugin in order to 
              activate Everest Tab Lite (Free) plugin. Please deactivate premium one. Your data will not be affected on deactivating.', 'everest-tab-lite' ) );
           }
          /*
          * Load Default Settings
          */
          if (!get_option('et_tab_animation_options')) {
               $et_tab_animation_options = $this->et_tab_animation_data();
               update_option('et_tab_animation_options', $et_tab_animation_options);
           }
        }
        
        
        public function et_tab_animation_data() {
            $et_tab_animation_data = array(
                'fading_entrances' => array('fadeIn','fadeInLeft','fadeInRight','fadeInUp','fadeInDown'),
                'bouncing_entrances' => array('bounce','bounceInLeft','bounceInRight','bounceInUp','bounceInDown'),
                'flippers' => array('flip','flipInX','flipInY'),
                'lightspeed' => array('lightSpeedIn'),
                'sliding_entrances' => array('slideInUp','slideInDown','slideInLeft','slideInRight'),
                'zoom_entrances' => array('zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp'),
                'attention_seekers' => array('flash','pulse'),
            );
            return $et_tab_animation_data;
        }

    }

    new ETabL_Activation();
}
