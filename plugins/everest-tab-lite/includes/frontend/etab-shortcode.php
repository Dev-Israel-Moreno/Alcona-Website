<?php defined('ABSPATH') or die("No script kiddies please!");
if(isset($atts['slug'])){
	$post_id =  $this->get_ID_by_slug($atts['slug']);
	$et_settings = get_option('et_settings', true);
	/* Main Settings */
	$msettings = get_post_meta($post_id, 'et_main_settings', true);
	$tabsettings = get_post_meta($post_id, 'et_tab_settings', true);
	$active_tab = get_post_meta($post_id, 'et_active_tab', true);
	$tab_active = (isset($active_tab['active']) && $active_tab['active'] != '')?esc_attr($active_tab['active']):'';
	$orientation_type = (isset($msettings['general_settings']['orientation_type']) && $msettings['general_settings']['orientation_type'] != '')?esc_attr($msettings['general_settings']['orientation_type']):'horizontal';
	if(isset($atts['orientation']) && $atts['orientation'] != ''){
		$orientation = $atts['orientation'];
	}else{
		$orientation =  $orientation_type;
	}
	$tab_position = (isset($msettings['general_settings']['tab_position']) && $msettings['general_settings']['tab_position'] != '')?esc_attr($msettings['general_settings']['tab_position']):'top-left';
//display settings
	$template  = (isset($msettings['display_settings']['template']) && $msettings['display_settings']['template'] != '')?esc_attr($msettings['display_settings']['template']):'template1';
	if(isset($atts['template']) && $atts['template'] != ''){
		$template_layout = $atts['template'];
	}else{
		$template_layout =  $template;
	}
	$random_num = rand(111111111, 999999999);
	?>
	<div class="everest-tab-main-wrapper etab-sc-main-wrapper etab-clearfix etab-group-wrap etab-sp-custom-<?php echo $post_id;?> etab-<?php echo esc_attr($template_layout);?> etab-trigger-on_click etab-<?php echo esc_attr($orientation);?> etab-<?php echo esc_attr($tab_position);?>-position" data-tab_trigger_type="on_click" id="et-tab-random-<?php echo $random_num;?>">
		<div class="etab-header-wrap">
			<ul class="etab-title-tabs et-tab<?php echo $random_num;?> etab-clearfix" data-id="etab-<?php echo $random_num;?>">
				<?php if(isset($tabsettings) && !empty($tabsettings)){
					$i = 0; foreach ($tabsettings as $key => $value) {
						$enable_desc = (isset($value['enable_desc']) && $value['enable_desc'] == true)?true:false;
						$description = (isset($value['description']) && $value['description'] != '')?$value['description']:'';
						$components = (isset($value['components']) && $value['components'] != '')?$value['components']:'';
						$custom_link_url = (isset($value['clink']['custom_link_url']) && $value['clink']['custom_link_url'] != '')?$value['clink']['custom_link_url']:'#';
						$link_target = (isset($value['clink']['custom_link_target']) && $value['clink']['custom_link_target'] != '')?$value['clink']['custom_link_target']:'_self';
						$icon_type = (isset($value['icon_type']) && $value['icon_type'] != '')?$value['icon_type']:'';
						$icon_code = (isset($value['icon']['code']) && $value['icon']['code'] != '')?$value['icon']['code']:'';
						?>
						<li class="etab-label <?php if($tab_active == $key) echo 'etab-active-show';?>" id="etab-<?php echo esc_attr($key);?>-<?php echo $random_num;?>">
							<?php if($components == "custom_link"){?>
								<a href="<?php echo esc_url($custom_link_url);?>" target="<?php echo esc_attr($link_target);?>" data-tabtype="custom_link">
								<?php  }else{ ?>
									<a href="javascript:void(0);" data-tabtype="component_type">
									<?php } ?>
									<div class="etab-title-wrapper">
										<?php if($icon_type == "available_icon"){
											if($icon_code != '' || $icon_code != 'dashicons|dashicons-blank' || $icon_code != 'fa|fa-blank' || $icon_code != "genericon|genericon-blank"){ ?>
												<span class="etab-icon-wrapper etab-available-icons">
													<i class="<?php echo str_replace('|', ' ', $icon_code);?>"></i>
												</span>
												<?php 
											}
										}
										?>
										<span class="etab-title"><?php echo esc_attr($value['tab_label']);?></span>
										<?php if($enable_desc){ ?>
											<p class="etab-desc"><?php echo esc_attr($description);?></p>
										<?php } ?>
									</div>
								</a>
							</li>
							<?php $i++; } }?>
						</ul>
					</div>
					<div class="etab-content-wrap">
						<?php if(isset($tabsettings) && !empty($tabsettings)){
							foreach ($tabsettings as $key => $value) { 
								if($tab_active == $key){
									$active_check = "1";
								}else{
									$active_check = "0";
								}?>
								<div class="etab-content-section etab-<?php echo $random_num;?> <?php if($tab_active == $key) echo 'etab-active-content';?> etab-<?php echo esc_attr($key);?>-<?php echo $random_num;?>" data-active="<?php echo $active_check;?>">
									<?php
									$components = (isset($value['components']) && $value['components'] != '')?$value['components']:'';
									if($components == "editor"){
										$html_text = (isset($value['html_text']) && $value['html_text'] != '')?$value['html_text']:''; 
										?>
										<div class="etab-editor-content clearfix">
											<?php echo do_shortcode(wptexturize(wpautop($html_text)));?>
										</div>
									<?php }
									?> 
								</div>
							<?php } }?>
						</div>
					</div>
					<?php
					$enable_custom_option = (isset($msettings['custom_settings']['enable_custom_option']) && $msettings['custom_settings']['enable_custom_option'] == true)?true:false;
					$bg_color = (isset($msettings['custom_settings']['bg_color']) && $msettings['custom_settings']['bg_color'] != '')?esc_attr($msettings['custom_settings']['bg_color']):'';
					$bg_hover_color = (isset($msettings['custom_settings']['bg_hover_color']) && $msettings['custom_settings']['bg_hover_color'] != '')?esc_attr($msettings['custom_settings']['bg_hover_color']):'';
					$bg_active_color = (isset($msettings['custom_settings']['bg_active_color']) && $msettings['custom_settings']['bg_active_color'] != '')?esc_attr($msettings['custom_settings']['bg_active_color']):'';
					$font_color = (isset($msettings['custom_settings']['font_color']) && $msettings['custom_settings']['font_color'] != '')?esc_attr($msettings['custom_settings']['font_color']):'';
					$desc_color = (isset($msettings['custom_settings']['desc_color']) && $msettings['custom_settings']['desc_color'] != '')?esc_attr($msettings['custom_settings']['desc_color']):'';
					$font_hover_color = (isset($msettings['custom_settings']['font_hover_color']) && $msettings['custom_settings']['font_hover_color'] != '')?esc_attr($msettings['custom_settings']['font_hover_color']):'';
					$bg_tab_content_color = (isset($msettings['custom_settings']['bg_tab_content_color']) && $msettings['custom_settings']['bg_tab_content_color'] != '')?esc_attr($msettings['custom_settings']['bg_tab_content_color']):'';
					$header_bgcolor = (isset($msettings['custom_settings']['header_bgcolor']) && $msettings['custom_settings']['header_bgcolor'] != '')?esc_attr($msettings['custom_settings']['header_bgcolor']):'';
					$top_border_color = (isset($msettings['custom_settings']['top_border_color']) && $msettings['custom_settings']['top_border_color'] != '')?esc_attr($msettings['custom_settings']['top_border_color']):'';

					$subtitle_fcolor = (isset($msettings['custom_settings']['subtitle_fcolor']) && $msettings['custom_settings']['subtitle_fcolor'] != '')?esc_attr($msettings['custom_settings']['subtitle_fcolor']):'';
					$subtitle_fhcolor = (isset($msettings['custom_settings']['subtitle_fhcolor']) && $msettings['custom_settings']['subtitle_fhcolor'] != '')?esc_attr($msettings['custom_settings']['subtitle_fhcolor']):'';

					if($enable_custom_option == "true" || $enable_custom_option != ''){
						include(ETABLite_PATH.'/includes/frontend/etab-custom-css.php');	
					}
				}
				?>


