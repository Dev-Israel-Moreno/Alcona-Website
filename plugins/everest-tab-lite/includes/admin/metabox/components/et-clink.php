<?php defined('ABSPATH') or die('No script kiddies please!!'); 
$custom_link_url = (isset($item['clink']['custom_link_url']) && $item['clink']['custom_link_url'] != '')?esc_url($item['clink']['custom_link_url']):'';
$link_target = (isset($item['clink']['custom_link_target']) && $item['clink']['custom_link_target'] != '')?esc_attr($item['clink']['custom_link_target']):'';
?>
<div class="et_options_wrap et_clink_wrapper">
     <div class="et-field-wrap">
        <label><?php _e('Link Target','everest-tab-lite');?></label>
         <div class="etab-right-options"> 
          <input type="text" name="tab_items[<?php echo $key;?>][clink][custom_link_url]" class="et-tab-text et-clink-url" value="<?php echo esc_url($custom_link_url);?>"/>
        </div>
     </div>
	 <div class="et-field-wrap">
        <label><?php _e('Link Target','everest-tab-lite');?></label>
         <div class="etab-right-options"> 
           <select name="tab_items[<?php echo $key; ?>][clink][custom_link_target]">
            <option value="_blank" <?php selected($link_target,"_blank");?>>_blank</option>
            <option value="_parent" <?php selected($link_target,"_parent");?>>_parent</option>
            <option value="_self" <?php selected($link_target,"_self");?>>_self</option>
            <option value="_top" <?php selected($link_target,"_top");?>>_top</option>      
           </select>
        </div>
    </div>
</div>