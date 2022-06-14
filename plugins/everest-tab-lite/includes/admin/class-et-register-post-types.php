<?php defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('ETabL_Admin_Menu')):

    class ETabL_Admin_Menu extends ETabL_Library {

         /*
         * Executes function of construct with creation of post type
         *  @since 1.0.0
         */
        function __construct() {
            add_action('init', array($this, 'et_register_posttype'));
            add_action('admin_menu', array($this, 'et_admin_menu'));
            add_action('add_meta_boxes',array( $this, 'fn_tab_main_settings'));
            add_action('save_post', array($this, 'et_msetup_meta_save'));
            add_action('add_meta_boxes',array( $this, 'fn_create_tab_settings'));
            add_action('save_post', array($this, 'et_tab_meta_save'));
            add_action('add_meta_boxes', array($this, 'et_shortcode_usage'));
            add_action( 'add_meta_boxes', array( $this, 'et_upgrade_pro' ) ); //added blog showcase metabox
            add_action('widgets_init', array($this, 'et_widget_register'));
            add_filter('manage_everest_tab_posts_columns', array($this,'etab_columns_head'));
            add_action('manage_everest_tab_posts_custom_column', array($this,'etab_columns_content'), 10, 2);
            add_action('admin_head-post-new.php', array($this, 'etab_posttype_admin_css'));
            add_action('admin_head-post.php', array($this, 'etab_posttype_admin_css'));
            add_filter('post_row_actions', array($this, 'etab_remove_row_actions'), 10, 1);
            add_filter('the_content', array($this, 'preview_etab'));
            add_action( 'admin_init', array( $this, 'redirect_to_site' ), 1 );
            add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
            add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ) );
        }

        function admin_footer_text( $text ){
            $link = 'https://wordpress.org/support/plugin/everest-tab-lite/reviews/#new-post';
            $pro_link = 'https://accesspressthemes.com/wordpress-plugins/everest-tab';
        if(isset( $_GET[ 'page' ] )){
            if($_GET[ 'page' ] == 'et-about-us' || $_GET[ 'page' ] == 'et-howtouse'){
                $text = 'Enjoyed Everest Tab Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">Everest Tab</a> - more features, more power!';
            }
         }
         $screen = (array) get_current_screen();
         if(isset( $_GET[ 'post_type' ] )){
            if($_GET[ 'post_type' ] == 'everest_tab'){
                $text = 'Enjoyed Everest Tab Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">Everest Tab</a> - more features, more power!';
            }
         }else if(isset($screen['post_type']) && $screen['post_type'] == 'everest_tab'){
           $text = 'Enjoyed Everest Tab Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">Everest Tab</a> - more features, more power!';
         }
        return $text;
        }

      function redirect_to_site(){
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'etab-doclinks' ) {
                wp_redirect( 'https://accesspressthemes.com/documentation/everest-tab-lite/' );
                exit();
            }
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'etab-premium' ) {
                wp_redirect( 'https://accesspressthemes.com/wordpress-plugins/everest-tab' );
                exit();
            }
        }

      function plugin_row_meta( $links, $file ){
            if ( strpos( $file, 'everest-tab-lite.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="http://demo.accesspressthemes.com/wordpress-plugins/everest-tab-lite" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="https://accesspressthemes.com/documentation/everest-tab-lite/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/everest-tab" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );
                $links = array_merge( $links, $new_links );
            }
            return $links;
        }

           /*
         * Register Post Type: everest-tab
        */
        public function et_register_posttype() {
            load_plugin_textdomain('everest-tab-lite', false, basename(dirname(__FILE__)) . '/languages/');
            $labels = array(
                'name'               => _x( 'Everest Tab Lite', 'post type general name', 'everest-tab-lite' ),
                'singular_name'      => _x( 'Everest Tab Lite', 'post type singular name', 'everest-tab-lite'),
                'menu_name'          => _x( 'Everest Tab Lite', 'admin menu', 'everest-tab-lite'),
                'name_admin_bar'     => _x( 'Everest Tab Lite', 'add new on admin bar', 'everest-tab-lite'),
                'add_new'            => _x( 'Add New Tab', 'Everest Tab Lite', 'everest-tab-lite'),
                'add_new_item'       => __( 'Add New Tab', 'everest-tab-lite'),
                'new_item'           => __( 'New Tab', 'everest-tab-lite'),
                'edit_item'          => __( 'Edit Tab', 'everest-tab-lite'),
                'view_item'          => __( 'View Tab', 'everest-tab-lite'),
                'all_items'          => __( 'All Tabs', 'everest-tab-lite'),
                'search_items'       => __( 'Search Tab', 'everest-tab-lite'),
                'parent_item_colon'  => __( 'Parent Tab:', 'everest-tab-lite'),
                'not_found'          => __( 'No Tab found.', 'everest-tab-lite'),
                'not_found_in_trash' => __( 'No Tab found in Trash.', 'everest-tab-lite')
            );

            $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description.', 'everest-tab-lite'),
                'public'             => false,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'menu_icon'          => 'dashicons-slides',
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'everest_tab' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title')
            );
            register_post_type('everest_tab', $args);
        }

        /*
         * Admin Menu
        */
        public function et_admin_menu() {
            add_submenu_page('edit.php?post_type=everest_tab', __('How To Use', 'everest-tab-lite'), __('How To Use', 'everest-tab-lite'), 'manage_options', 'et-howtouse', array($this, 'et_how_to_use_callback'));
            add_submenu_page('edit.php?post_type=everest_tab', __('More WordPress Stuff', 'everest-tab-lite'), __('More WordPress Stuff', 'everest-tab-lite'), 'manage_options', 'et-about-us', array($this, 'et_about_us_callback'));
             add_submenu_page('edit.php?post_type=everest_tab', __('Documentation', 'everest-tab-lite'), __('Documentation', 'everest-tab-lite'), 'manage_options', 'etab-doclinks', '__return_false', null, 9 );
              add_submenu_page('edit.php?post_type=everest_tab', __('Check Premium Version', 'everest-tab-lite'), __('Check Premium Version', 'everest-tab-lite'), 'manage_options', 'etab-premium', '__return_false', null, 9 );
        }


        /*
        * How to use Page
        */
        public function et_how_to_use_callback(){
            include(ETABLite_PATH. '/includes/admin/pages/et-howtouse.php');
        }


        /*
        * More WordPress Stuff Page
        */
         public function et_about_us_callback(){
            include(ETABLite_PATH. '/includes/admin/pages/et-aboutus.php');
        }

        /*
        * Main Tab General Settings Metabox
        */
        function fn_tab_main_settings(){
            add_meta_box('et_main_settings',__('Main Settings','everest-tab-lite'),array($this, 'render_main_settings_callback'),'everest_tab','normal','high');
        }

        function render_main_settings_callback( $post ){
             // Add nonce for security and authentication.
            wp_nonce_field(basename(__FILE__),'et_main_setup_nonce');
            include(ETABLite_PATH.'/includes/admin/metabox/et-main-settings.php');

        }

        /*
        * Save Main Settings Data
        */
        public function et_msetup_meta_save( $post_id ){

            if (isset($_POST['et_main_settings'])) {
                $et_main_settings = $this->sanitize_array($_POST['et_main_settings']);
                update_post_meta($post_id, 'et_main_settings',$et_main_settings);
            }
            return;
            // Checks save status
            $is_autosave = wp_is_post_autosave($post_id);
            $is_revision = wp_is_post_revision($post_id);
            $is_valid_nonce = ( isset($_POST['et_main_setup_nonce']) && wp_verify_nonce($_POST['et_main_setup_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            }
        }

        /*
        * Create Tab Settings Metabox
        */
        function fn_create_tab_settings(){
            add_meta_box('et_tab_settings',__('Tab Settings','everest-tab-lite'),array($this, 'render_tab_settings_callback'),'everest_tab','normal','high');
        }

        function render_tab_settings_callback( $post ){
             // Add nonce for security and authentication.
            wp_nonce_field(basename(__FILE__),'et_tab_setup_nonce');
            include(ETABLite_PATH.'/includes/admin/metabox/et-tab-settings.php');

        }

         /*
        * Save Main Settings Data
        */
        public function et_tab_meta_save( $post_id ){

            if (isset($_POST['tab_items'])) {
                $et_tab_settings = $this->sanitize_array($_POST['tab_items']);
                update_post_meta($post_id, 'et_tab_settings',$et_tab_settings);
            }
             if (isset($_POST['et_active_tab'])) {
                $et_active_tab = $this->sanitize_array($_POST['et_active_tab']);
                update_post_meta($post_id, 'et_active_tab',$et_active_tab);
            }
            return;
            // Checks save status
            $is_autosave = wp_is_post_autosave($post_id);
            $is_revision = wp_is_post_revision($post_id);
            $is_valid_nonce = ( isset($_POST['et_tab_setup_nonce']) && wp_verify_nonce($_POST['et_tab_setup_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            }
        }

         /*
        * Shortcode Usage Metabox
        */
        function et_shortcode_usage(){
            add_meta_box('et_sc_settings',__('Shortcode Usage','everest-tab-lite'),array($this, 'render_sc_usage_callback'),'everest_tab','side','default');
        }

        function et_upgrade_pro(){
           add_meta_box( 'etab_upgrade_banner', __( 'Upgrade to Everest Tab', 'everest-tab-lite' ), array( $this, 'etab_upgrade_action' ), 'everest_tab', 'side', 'default' );
        }

       function etab_upgrade_action( $post ){
        include_once(ETABLite_PATH.'/includes/admin/pages/upgrade-right.php');
       }

        function render_sc_usage_callback( $post ){
            wp_nonce_field(basename(__FILE__),'et_tab_sc_nonce');
            include(ETABLite_PATH.'/includes/admin/metabox/et-sc-settings.php');
        }

        /*
        * Create Everest Tab Widget
        */
        public function et_widget_register(){
            register_widget('Everest_Tab_Lite_Widget');
        }



        /*
        * Add custom column to everest tab post type
        */
        public function etab_columns_head($defaults){
             $defaults['shortcodes'] = __('Shortcodes', 'everest-tab-lite');
             $defaults['template'] = __('Template Include', 'everest-tab-lite');
              unset($defaults['date']);   // remove it from the columns list
              $defaults['date'] = __('Date', 'everest-tab-lite');
              return $defaults;
        }

         /*
         * Added content to custom column to Everest Tab posttype
         */
        public function etab_columns_content( $column, $post_ID ){
            if ($column == 'shortcodes') {
                $id = $post_ID;
                $post = get_post($id);
                $slug = $post->post_name;
                if($slug != ''){ ?>
                <textarea class="egpr-shortcode-display-value" style="resize: none;" rows="2" cols="40" readonly="readonly">[etabs slug="<?php echo $slug; ?>"]</textarea>
                <span class="et-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', 'everest-tab-lite'); ?></span>
               <?php  }else{
                  echo 'Posts not published yet.';
               }
                }
            if ($column == 'template') {
                $id = $post_ID;
                $post = get_post($id);
                $slug = $post->post_name;
                 if($slug != ''){ ?>
                <textarea class="egpr-shortcode-display-value" style="resize: none;" rows="2" cols="45" readonly="readonly">&lt;?php echo do_shortcode("[etabs slug='<?php echo $slug; ?>']"); ?&gt;</textarea>
                <span class="et-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', 'everest-tab-lite'); ?></span>
                <?php }else{
                   echo 'Posts not published yet.';
                  }
            }
        }

        public function etab_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                'everest_tab'
            );
            if (in_array($post_type, $post_types))
                echo '<style type="text/css"> #view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

         public function etab_remove_row_actions($actions) {
            if (get_post_type() == 'everest_tab') {
                $post_id = get_the_ID();
               // choose the post type where you want to hide the button
                //unset($actions['view']); // this hides the VIEW button on your edit post screen
                unset($actions['inline hide-if-no-js']);
            }
            return $actions;
        }


         /*
         * Display Backend Preview on single page itself with shortcode load
         */
          public function preview_etab($content) {
            global $post;
            if ( is_singular( 'everest_tab' ) ) {
                if (isset($_GET['preview_id']) && is_user_logged_in()) {
                    $etab_post_id = intval($_GET['preview_id']);
                    $post = get_post($etab_post_id);
                    $slug = $post->post_name;
                    return do_shortcode("[etabs slug='$slug']");
                }if (isset($_GET['p']) && is_user_logged_in()) {
                    $etab_post_id = intval($_GET['p']);
                    $post = get_post($etab_post_id);
                    $slug = $post->post_name;
                    return do_shortcode("[etabs slug='$slug']");
                }else{
                    $slug = $post->post_name;
                    return do_shortcode("[etabs slug='$slug']");
                }
            }else {
                return $content;
            }
        }

    }
new ETabL_Admin_Menu();
endif;
