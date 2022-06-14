<?php defined('ABSPATH') or die("No script kiddies please!");  ?>
  <div class="et-header">
    <div class="et-header-section">
      <div class="et-left-wrap et-clearfix">
        <div class="et-plugin-logo">
         <img src='<?php echo ETABLite_IMAGE_DIR; ?>everest-tab-lite-logo-backend.png' alt="plugin-logo" />
       </div>
       <div class="et-settings-title">
         <?php _e('How To Use', 'everest-tab-lite'); ?>
       </div>
     </div>
   </div>
 </div>
<div class="et-about-main-wrapper">
 <div class="et-container etab-about-main-wrapper">
  <div class="etab-column-one-wrap">
    <div class="etab-panel-body">
      <div class="etab-row">
        <div class="etab-col-three-third">
          <h2><?php _e('How To Use','everest-tab-lite'); ?></h2>
          <div class="egpr-tab-wrapper">
            <div class="etab-main-wrap etab-htu-settings">
              <div class="etab_main_wrapper etab_clearfix">
               <h5><?php _e('For detailed documentation, please visit here. ', 'everest-tab-lite'); ?><a href="https://accesspressthemes.com/documentation/everest-tab-lite/" target="_blank">VIEW DOCUMENTATION</a></h5>
               <p>
                 <?php
                 _e(' <b>Everest Tab Lite </b> is one of the best free wordpress tab plugin to show your own custom html content inside tab with 3 pre available beautiful and responsive tab layouts.','everest-tab-lite');
                 ?>
               </p>
               <p>
                 <?php
                 _e(' A standout amongst the most powerful tab display platform with 3 pre available templates or custom styling options to show tab on your site in an most attractive and easy shortcode implementation.
                 Display either custom html content or set tab item as custom url with target and display on your site using generated shortcode.','everest-tab-lite');?>
               </p>

               <div class="etab-content-section">
                <h5>All Everest Tab Lite</h5>
                <p><?php _e('Create multiple tabs and display it using specific tab shortcodes anywhere on your site as you prefer.
                There is mainly General Common Settings" for overall tab configuration setup and "Tab Settings" to create multiple tab items.', 'everest-tab-lite'); ?>

              </p>
              <div class="second-info">
                <h5>1. Main Settings</h5>
                <p> <?php _e('This settings is overall  main settings for specific tab. Here you can find 3 different tab options as "General Settings","Display Settings" and "Custom Styling".', 'everest-tab-lite'); ?>

              </p>
              <ul>
                <li><strong>General Settings:</strong> <?php _e('This tab options includes orientation type as horizontal only with its 2 position options.', 'everest-tab-lite'); ?>
                <ul>
                  <li><?php _e('Orientation Type: Default is always horizontal. (Vertical Tab and Horizontal Tab both is only available on our premium version of Everest Tab Lite plugin)', 'everest-tab-lite'); ?></li>
                  <li><?php _e('Tabs Position: Choose tab position for horizontal type. Horizontal orientation includes top left, top right.', 'everest-tab-lite'); ?></li>

                </ul>
              </li>
              <li><strong>Display Settings:</strong><?php _e('Altogether our plugin includes 3 beautifully designed template layout for tab. Here you can choose template layout for specific tab.', 'everest-tab-lite'); ?> </li>
              <li><strong>Custom Styling Settings:</strong> <?php _e('Enable and set custom styling configuration for overall tab settings. You can override the pre available template design using this
              custom styling options. You can change the color configuration for assigned template from Display Settings tab. There are many customization options such as set tab background color, background hover color, font color, font hover color, tab active background color , tab content color. ', 'everest-tab-lite'); ?></li>
            </ul>

            <h5>2. Tab Settings</h5>
            <p><?php _e('This is the tab settings to create multiple tab and assign components for each tab.Below are options available on this settings described:', 'everest-tab-lite'); ?>
          </p>
          <ul>
            <li><?php _e('Active: Enable any one radio button among multiple tab in order to choose one tab as active by default.','everest-tab-lite'); ?></li>
            <li><?php _e('Tab Label : Fill tab title here.', 'everest-tab-lite'); ?></li>
            <li><?php _e('Choose Components : This options includes altogether 6 advanced components to fill on tab content which are mentioned below:', 'everest-tab-lite'); ?>
            <ul>
              <li><strong>WYSIWYG Editor :</strong> <?php _e('Fill any html content here. Note: Shortcode implementation will not work for this editor.', 'everest-tab-lite'); ?></li>
              <li><strong>Custom Link Tab :</strong><?php _e('Set custom link and link target for this tab.', 'everest-tab-lite'); ?> </li>
            </ul>
          </li>
        </ul>

        <h5>Shortcode Settings</h5>
        <p><?php _e('You can get shortcode of specific tab post type from its edit page > Everest Tab Shortcode Usage metabox shown on left section or else you can get shortcode on main tab lists for specific tab on its specific row.', 'everest-tab-lite'); ?>
      </p>
      <h5>Shortcode Parameters</h5>
      <p><?php _e('Everest Tab Lite Shortcode is generated using everest_tab custom post type where you can create multiple tab and display on your site using its shortcodes.
        i.e Go to "Everest Tab Lite" > Add New of admin left menu page and create multiple tab adding new page, set necessary settings as per your requiremnt and then save all data. On successfull saving all data you will find
        its respected shortcode on right side of metabox "Shortcode Usage" section area.', 'everest-tab-lite'); ?>
      </p>
      <p><?php _e('Available Custom Shortcode Parameters', 'everest-tab-lite'); ?> :</p>
      <ul>
        <li><strong>template</strong> :<?php _e('This parameter help you to change the template set for tab shortcode.Our plugin contains altogether 3 pre defined and beautifully designed tab templates.', 'everest-tab-lite'); ?>
        <p>e.g., [etabs slug="slug-here" template="template2"]</p>
      </li>
    </ul>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="etab-col-two">
            <?php include_once(ETABLite_PATH.'/includes/admin/pages/upgrade-right.php');?>
        </div>
</div>
</div>
</div>
</div>
