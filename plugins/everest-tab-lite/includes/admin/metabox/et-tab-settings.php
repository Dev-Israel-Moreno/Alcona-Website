<?php defined('ABSPATH') or die('No script kiddies please!!');
/* 
 * Tab Settings Metabox
 */
global $post;
$postid = $post->ID;
$et_tab_settings = get_post_meta($postid, 'et_tab_settings', true);
?>
<div class="et-setup-wrapper et-tab-settings-wrapper">
    <div class="et_top_section">
        <input type="button" class="button-secondary et-add-tabs-button" id="add-mulitple-tabs" value="<?php _e('ADD NEW TAB','everest-tab-lite');?>">
        <span class="et-loader-image" style="display: none;">
            <img src='<?php echo ETABLite_IMAGE_DIR.'preloader.gif'; ?>' alt='Loading...'/>
        </span>
    </div>
    <div class="et_tab_append_wrapper clearfix">
          <?php
            if(isset( $et_tab_settings ) && !empty( $et_tab_settings )){
                $tabs_counts      = count($et_tab_settings);
                if($tabs_counts != 0){
                    $count = 1;
                    $tab_item = $et_tab_settings;
                    foreach($tab_item as $key => $item){
                       include(ETABLite_PATH.'/includes/admin/metabox/ajax/et-add-new-tab.php');
                    }
                }
            }else{
                $column_index   = $this->generateRandomIndex();
                $key          = $column_index;
                $count = 1;
                include(ETABLite_PATH.'/includes/admin/metabox/ajax/et-add-new-tab.php');
            }
            ?>
    </div>
</div>
