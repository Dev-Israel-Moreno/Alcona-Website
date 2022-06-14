<?php
defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ETabL_Admin_Ajax') ) {

    class ETabL_Admin_Ajax extends ETabL_Library {

        /**
         * All the ajax related tasks are hooked
         *
         * @since 1.0.0
         */
        function __construct() {
            add_action('wp_ajax_et_append_tab_html', array( $this, 'generate_new_tab_html' ));
            add_action('wp_ajax_nopriv_et_append_tab_html', array( $this, 'no_permission' ));
        }

        function no_permission() {
            die('No script kiddies please!!');
        }

        function generate_new_tab_html() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'et-admin-ajax-nonce') ) {
                if($_POST['_action'] == 'add_tab'){
                 include(ETABLite_PATH.'/includes/admin/metabox/ajax/et-add-new-tab.php');
                }
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        
    }
    new ETabL_Admin_Ajax();
}
