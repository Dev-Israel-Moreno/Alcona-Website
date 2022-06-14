<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="et-field-wrap" id="et-html-<?php echo $key;?>">
 <?php 
   $content = (isset($item['html_text']) && $item['html_text'] != '')?$item['html_text']:'';
   $settings = array('textarea_name' => 'tab_items['.$key.'][html_text]','media_buttons' => true, 'quicktags' => array('buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,close'), 'editor_class' => 'et-html-text-' . $key);
   $editor_name_id = 'et-html-text-' . $key;
   wp_editor($content, $editor_name_id, $settings);      
?>
</div>
<input type="hidden" class="et_key_unique" value="<?php echo $key;?>"/>