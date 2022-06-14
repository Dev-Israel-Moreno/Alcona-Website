<?php defined('ABSPATH') or die("No script kiddies please!");?>
<style>
<?php if($bg_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a{
  background-color: <?php echo $bg_color;?>;
}
<?php  }  ?>
<?php if($bg_active_color != ''){ ?>
.etab-sp-custom-<?php echo $post_id;?>.everest-tab-main-wrapper#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li.etab-active-show a{
   background-color: <?php echo $bg_active_color;?>;
 }
  <?php } ?>
  <?php if($bg_hover_color != ''){ ?>
 .etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.everest-tab-main-wrapper > .etab-header-wrap > ul.etab-title-tabs > li > a:hover{
   background-color: <?php echo $bg_hover_color;?>;
  }
 <?php } ?>


<?php if($font_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a,
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li .etab-icon-wrapper i{
  color: <?php echo $font_color;?>;
 }
<?php } ?>
<?php if($font_hover_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li:hover .etab-title,
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li:hover .etab-icon-wrapper i,
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li:hover  > a .etab-title-wrapper .etab-desc{
    color: <?php echo $font_hover_color;?>;
}
<?php } ?>
<?php if($desc_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-content-wrap .etab-content-section .etab-editor-content {
    color: <?php echo $desc_color;?>;
}
<?php } ?>

<?php if($bg_tab_content_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> .etab-content-wrap{
    background-color: <?php echo $bg_tab_content_color;?>;
}
<?php } ?>

 /*Template 1*/
 <?php if($template_layout == "template1"){ ?>
 <?php if($bg_active_color != ''){ ?>
.everest-tab-main-wrapper.etab-template1.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs {
    border-bottom: 6px solid <?php echo $bg_active_color;?>;
}
<?php }
} ?>
/*Template 2*/
 <?php if($template_layout == "template2"){ ?>
<?php if($bg_active_color != ''){ ?>
.everest-tab-main-wrapper.etab-template2.etab-horizontal.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:before{
      border-color: <?php echo $bg_active_color;?> transparent transparent;
} 
<?php } ?>
<?php if($bg_hover_color != ''){ ?>
.everest-tab-main-wrapper.etab-template2.etab-horizontal.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:hover:before{
  border-color: <?php echo $bg_hover_color;?> transparent transparent;
  }
<?php } ?>
<?php if($header_bgcolor != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template2 > .etab-header-wrap{
    background-color: <?php echo $header_bgcolor;?>;
}
<?php } 
}?>
<?php if($template_layout == "template3"){    
if($top_border_color != ''){ ?>
.everest-tab-main-wrapper.etab-template3.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:before{
    background-color: <?php echo $top_border_color;?>;
}
<?php }
} ?>
<?php if($subtitle_fcolor != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a .etab-title-wrapper .etab-desc{
    color: <?php echo $subtitle_fcolor;?>;
}
<?php } ?>
<?php if($subtitle_fhcolor != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:hover .etab-title-wrapper .etab-desc{
     color: <?php echo $subtitle_fhcolor;?>;
}
<?php } ?>
</style>