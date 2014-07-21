<?php
/*
Plugin Name: Shortcode Quicktags
Author: MrFent
Author URI: http://www.MrFent.com
Demo: http://shortcode-quicktags.MrFent.com
Description: Adds PageLines shortcode Quicktags to the WordPress HTML editor 
Class Name: ShortcodeQuicktags
Version: 1.0.1
PageLines: true
v3: true
*/

class ShortcodeQuicktags {
	
	function __construct() {
		add_action( 'admin_head', array(&$this, 'admin_register_head'));
		add_action( 'after_setup_theme', array( &$this, 'options' ));
		add_action( 'admin_print_footer_scripts', array(&$this, 'add_shortcode_quicktags'));	
	}
	
	function admin_register_head() {
		if ( !class_exists( 'EditorInterface' ) ) 
		return;
		if ((pl_setting( 'sq_button_text_color')) || (pl_setting( 'sq_button_background_color'))) {
		$button_background_color = (pl_setting( 'sq_button_background_color')) ? pl_setting( 'sq_button_background_color') : '#f7f7f7';
		$button_text_color = (pl_setting( 'sq_button_text_color')) ? pl_setting( 'sq_button_text_color') : '555555';
		if (pl_setting( 'sq_button_background_color')) {
		$backgroundcolor = sprintf('background-color:#%s;box-shadow:none;',$button_background_color);}else{$backgroundcolor = '';}
		if (pl_setting( 'sq_button_text_color')) {
		$color = sprintf('color:#%s;',$button_text_color);}else{$color = '';}
		printf('<style>.wp-core-ui .quicktags-toolbar input[id^="qt_content_pl_"].button.button-small {%s%s}</style>', $backgroundcolor, $color  ); 
		}    	
	}
	
	function add_shortcode_quicktags() {
		if ( !class_exists( 'EditorInterface' ) )
		return;
	    if (wp_script_is('quicktags')){
		$colorclass = (pl_setting( 'color_class')) ? pl_setting( 'color_class') : 'primary'; ?>
	    <script type="text/javascript">
			<?php if(!pl_setting('pl_accordion')) {?>
			QTags.addButton( 'pl_accordion', '<?php _e( 'Accordion', 'shortcode-quicktags' );?>', '[pl_accordion name="accordion"][pl_accordioncontent name="accordion" number="1" heading="Tile 1" open="yes"]\nContent 1\n[/pl_accordioncontent]\n[pl_accordioncontent name="accordion" number="2" heading="Title 2"]\nContent 2\n[/pl_accordioncontent]\n[/pl_accordion]', '', 'pl_accordion', '<?php _e( 'PageLines Accordion', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_alertbox')) {?>
			QTags.addButton( 'pl_alertbox', '<?php _e( 'Alert', 'shortcode-quicktags' );?>', '[pl_alertbox type="<?php echo $colorclass; ?>" closable="yes"]', '[/pl_alertbox]', 'pl_alertbox', '<?php _e( 'PageLines Alert\n\ntype:\n   default (Grey)\n   primary (Dark Blue)\n   info (Light Blue)\n   success (Green)\n   warning (Orange)\n   important (Red)\n   inverse (Black)\n\n(Optional) Insert between code:\n<h2 class=&#34;alert-heading&#34;>Alert Heading</h2>', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_animation')) {?>	
			QTags.addButton( 'pl_animation', '<?php _e( 'Animation', 'shortcode-quicktags' );?>', '<div class="pl-animation-group">\n	<div class="pl-animation pla-fade">INSERT CONTENT</div>\n	<div class="pl-animation pla-fade">INSERT CONTENT</div>\n	<div class="pl-animation pla-fade">INSERT CONTENT</div>\n	<div class="pl-animation pla-fade">INSERT CONTENT</div>\n	<div class="pl-animation pla-fade">INSERT CONTENT</div>\n	<div class="pl-animation pla-fade">INSERT CONTENT</div>\n</div>', '', 'pl_animation', '<?php _e( 'PageLines Animation Classes\n\nclass:\n  no-anim (No Animation)\n  pl-appear\n  pla-fade\n  pla-scale\n  pla-from-top\n  pla-from-bottom\n  pla-from-left\n  pla-from-right\n\nTo make everything appear at once, remove the\nopening and closing pl-animation-group div\n\nYou can use these Animation Classes with\nthings like <ol> & <ul> lists, the PageLines\nResponsive Grid, pretty much anything...', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_badge')) {?>
			QTags.addButton( 'pl_badge', '<?php _e( 'Badge', 'shortcode-quicktags' );?>', '[pl_badge type="<?php echo $colorclass; ?>"]', '[/pl_badge]', 'pl_badge', '<?php _e( 'PageLines Badge\n\ntype:\n   default (Grey)\n   primary (Dark Blue)\n   info (Light Blue)\n   success (Green)\n   warning (Orange)\n   important (Red)\n   inverse (Black)', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_blockquote')) {?>
			QTags.addButton( 'pl_blockquote', '<?php _e( 'Blockquote', 'shortcode-quicktags' );?>', '[pl_blockquote cite="Someone Famous"]', '[/pl_blockquote]', 'pl_blockquote', '<?php _e( 'PageLines Blockquote\n\n(Optional)\npull=&#34;right&#34;', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_button')) {?>
			QTags.addButton( 'pl_button', '<?php _e( 'Button', 'shortcode-quicktags' );?>', '[pl_button type="<?php echo $colorclass; ?>" link="" target="blank"]', '[/pl_button]', 'pl_button', '<?php _e( 'PageLines Standard Button\n\ntype:\n   default (Grey)\n   primary (Dark Blue)\n   info (Light Blue)\n   success (Green)\n   warning (Orange)\n   important (Red)\n   inverse (Black)\n\n(Optional)\nsize=&#34;mini&#34; or size=&#34;large&#34;', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_button_group')) {?>
			QTags.addButton( 'pl_button_group', '<?php _e( 'Button Group', 'shortcode-quicktags' );?>', '[pl_buttongroup]\n	<a class="btn btn-<?php echo $colorclass; ?>" href="#">Link</a>\n	<a class="btn btn-<?php echo $colorclass; ?>" href="#">Link</a>\n	<a class="btn btn-<?php echo $colorclass; ?>" href="#">Link</a>\n[/pl_buttongroup]', '', 'pl_button_group', '<?php _e( 'PageLines Button Group\n\nclass:\n   btn-default (Grey)\n   btn-primary (Dark Blue)\n   btn-info (Light Blue)\n   btn-success (Green)\n   btn-warning (Orange)\n   btn-important (Red)\n   btn-inverse (Black)\n\nYou can also use btn-mini and btn-large', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_carousel')) {?>
			QTags.addButton( 'pl_carousel', '<?php _e( 'Carousel', 'shortcode-quicktags' );?>', '[pl_carousel name="PageLinesCarousel"][pl_carouselimage first="yes" title="Slide 1" imageurl="" ]\nHere is the first slide and its caption.\n[/pl_carouselimage]\n[pl_carouselimage title="Slide 2" imageurl=""]\nHere is the second slide, in all its glory.\n[/pl_carouselimage]\n[pl_carouselimage title="Slide 3" imageurl=""]\nYou can have as many slides as you can create.\n[/pl_carouselimage]\n[/pl_carousel]', '', 'pl_carousel', '<?php _e( 'PageLines Carousel\n\nIf the Carousel doesn&#39;t display correctly, use [pl_raw] around the embed code.', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_chart')) {?>
			QTags.addButton( 'pl_chart', '<?php _e( 'Chart', 'shortcode-quicktags' );?>', '[chart data="41.52,37.79,20.67,0.03" bg="F7F9FA" labels="Reffering+sites|Search+Engines|Direct+traffic|Other" colors="058DC7,50B432,ED561B,EDEF00" size="488x200" title="Traffic Sources" type="pie"]', '', 'pl_chart', '<?php _e( 'PageLines Chart\n\ntype:\n   line\n   xyline\n   sparkline\n   meter\n   scatter\n   venn\n   pie\n   pie2d', 'shortcode-quicktags' );?>', 1000 );	
			<?php } if(!pl_setting('pl_codebox')) {?>
			QTags.addButton( 'pl_codebox', '<?php _e( 'CodeBox', 'shortcode-quicktags' );?>', '[pl_codebox]', '[/pl_codebox]', 'pl_codebox', '<?php _e( 'PageLines CodeBox\n\nYou must enable Google Prettify Code:\nDMS Toolbar → Site Settings → Advanced', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_button_dropdown')) {?>
			QTags.addButton( 'pl_button_dropdown', '<?php _e( 'Dropdown', 'shortcode-quicktags' );?>', '[pl_buttondropdown type="<?php echo $colorclass; ?>" label="button"]\n<ul>\n	<li><a href="#">This</a></li>\n	<li><a href="#">This</a></li>\n	<li><a href="#">This</a></li>\n</ul>\n[/pl_buttondropdown]', '', 'pl_button_dropdown', '<?php _e( 'PageLines Dropdown Button\n\ntype:\n   default (Grey)\n   primary (Dark Blue)\n   info (Light Blue)\n   success (Green)\n   warning (Orange)\n   important (Red)\n   inverse (Black)\n\n(Optional)\nsize=&#34;mini&#34; or size=&#34;large&#34;\n\nIf you want a Split Dropdown button, you\ncan use [pl_splitbuttondropdown] instead.', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_fa_icon')) {?>	
		    QTags.addButton( 'pl_fa_icon', '<?php _e( 'FA Icon', 'shortcode-quicktags' );?>', '<i class="icon icon-pagelines"></i>', '', 'pl_fa_icon', '<?php _e( 'PageLines Font Awesome Icon\n\nChange the size by adding icon-large, icon-2x, icon-3x, or icon-4x.\n\nYou can make a Bulleted List by adding\n<ul class=&#34;icons-ul&#34;> and then put the icon code right after each <li>', 'shortcode-quicktags' );?>', 1000 );	
			<?php } if(!pl_setting('pl_facebook')) {?>
			QTags.addButton( 'pl_facebook', '<?php _e( 'Facebook', 'shortcode-quicktags' );?>', '[like_button]', '', 'pl_facebook', '<?php _e( 'PageLines Facebook Like Button\n\n(Optional)\nurl=&#34;http:&#47;&#47;url-to-like.com&#34;\nIf you don&#39;t specify a URL, the URL of that page will be used.\n\nYou should enter Your Facebook App ID:\nDMS Toolbar → Site Settings → Social & Local', 'shortcode-quicktags' );?>', 1000 );	
			<?php } if(!pl_setting('pl_googleplus')) {?>
			QTags.addButton( 'pl_googleplus', '<?php _e( 'Google+', 'shortcode-quicktags' );?>', '[googleplus]', '', 'pl_googleplus', '<?php _e( 'PageLines Google+ Button', 'shortcode-quicktags' );?>', 1000 );		
			<?php } if(!pl_setting('pl_google_maps')) {?>	
		    QTags.addButton( 'pl_google_maps', '<?php _e( 'Google Maps', 'shortcode-quicktags' );?>', '[googlemap width="100%" height="300" address="San Francisco,CA"]', '', 'pl_google_maps', '<?php _e( 'PageLines Google Maps', 'shortcode-quicktags' );?>', 1000 );	
			<?php } if(!pl_setting('pl_grid')) {?>	
			QTags.addButton( 'pl_grid', '<?php _e( 'Grid', 'shortcode-quicktags' );?>', '<div class="row">\n	<div class="span4">4</div>\n	<div class="span8">8</div>\n</div>', '', 'pl_grid', '<?php _e( 'PageLines Responsive Grid\n\n(Optional)\nAdd the class offset6 to make a column offset.\nExample:\n<div class=&#34;span6 offset6&#34;>6 Offset 6</div>', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_label')) {?>
			QTags.addButton( 'pl_label', '<?php _e( 'Label', 'shortcode-quicktags' );?>', '[pl_label type="<?php echo $colorclass; ?>"]', '[/pl_label]', 'pl_label', '<?php _e( 'PageLines Label\n\ntype:\n   default (Grey)\n   primary (Dark Blue)\n   info (Light Blue)\n   success (Green)\n   warning (Orange)\n   important (Red)\n   inverse (Black)', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_linkedin')) {?>
			QTags.addButton( 'pl_linkedin', '<?php _e( 'LinkedIn', 'shortcode-quicktags' );?>', '[linkedin]', '', 'pl_linkedin', '<?php _e( 'PageLines LinkedIn Button', 'shortcode-quicktags' );?>', 1000 );	
			<?php } if(!pl_setting('pl_modal')) {?>
			QTags.addButton( 'pl_modal', '<?php _e( 'Modal', 'shortcode-quicktags' );?>', '[pl_modal title="Title" type="btn" colortype="<?php echo $colorclass; ?>" label="Click Me!"]', '[/pl_modal]', 'pl_modal', '<?php _e( 'PageLines Modal\n\ncolortype:\n   default (Grey)\n   primary (Dark Blue)\n   info (Light Blue)\n   success (Green)\n   warning (Orange)\n   important (Red)\n   inverse (Black)\n\ntype:\n   btn\n   label\n   badge\n\nOr remove type=&#34;&#34; to use regular text.\n\n(Optional):\nhash=&#34;&#34;\nThis will allow you to set a Modal ID.\nOtherwise the ID will always be random.', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_pinterest')) {?>
			QTags.addButton( 'pl_pinterest', '<?php _e( 'Pinterest', 'shortcode-quicktags' );?>', '[pinterest]', '', 'pl_pinterest', '<?php _e( 'PageLines Pinterest Button\n\n(Optional)\nimg=&#34;http:&#47;&#47;image-url.com&#34;', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_popover')) {?>
			QTags.addButton( 'pl_popover', '<?php _e( 'Popover', 'shortcode-quicktags' );?>', '[pl_popover title="Title" content="..." position="right"]', '[/pl_popover]', 'pl_popover', '<?php _e( 'PageLines Popover\n\nposition:\n   top\n   bottom\n   left\n   right', 'shortcode-quicktags' );?>', 1000 );	
			<?php } if(!pl_setting('pl_raw')) {?>
			QTags.addButton( 'pl_raw', '<?php _e( 'Raw', 'shortcode-quicktags' );?>', '[pl_raw]', '[/pl_raw]', 'pl_raw', '<?php _e( 'PageLines Raw', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_tabs')) {?>
			QTags.addButton( 'pl_tabs', '<?php _e( 'Tabs', 'shortcode-quicktags' );?>', '[pl_tabs][pl_tabtitlesection type="tabs"]\n[pl_tabtitle active="yes" number="1"]Title 1[/pl_tabtitle]\n[pl_tabtitle number="2"]Title 2[/pl_tabtitle]\n[/pl_tabtitlesection]\n[pl_tabcontentsection]\n\n[pl_tabcontent active="yes" number="1"]\nLorem ipsum dolor sit amet, consectetur adipiscing elit\n[/pl_tabcontent]\n\n[pl_tabcontent number="2"]\nLorem ipsum dolor sit amet, consectetur adipiscing elit\n[/pl_tabcontent]\n\n[/pl_tabcontentsection]\n[/pl_tabs]', '', 'pl_tabs', '<?php _e( 'PageLines Tabs\n\nIf the Tabs don&#39;t display correctly, use [pl_raw] around the embed code.', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_tooltip')) {?>
			QTags.addButton( 'pl_tooltip', '<?php _e( 'Tooltip', 'shortcode-quicktags' );?>', '[pl_tooltip tip="This is a tooltip!" position="right"]', '[/pl_tooltip]', 'pl_tooltip', '<?php _e( 'PageLines Tooltip\n\nposition:\n   top\n   bottom\n   left\n   right', 'shortcode-quicktags' );?>', 1000 );
			<?php } if(!pl_setting('pl_twitter')) {?>
			QTags.addButton( 'pl_twitter', '<?php _e( 'Twitter', 'shortcode-quicktags' );?>', '[twitter_button]', '', 'pl_twitter', '<?php _e( 'PageLines Twitter Button\n\n(Optional)\ntype=&#34;follow&#34;\nThis will change it to &#34;Follow Button&#34;.\n\nEnter Your Twitter Username to follow:\nDMS Toolbar → Site Settings → Social & Local', 'shortcode-quicktags' );?>', 1000 );	
			<?php } if(!pl_setting('pl_video')) {?>
			QTags.addButton( 'pl_video', '<?php _e( 'Video', 'shortcode-quicktags' );?>', '[pl_video type="youtube" id="BracDuhEHls"]', '', 'pl_video', '<?php _e( 'PageLines Video\n\ntype:\n   youtube\n   vimeo\n   dailymotion', 'shortcode-quicktags' );?>', 1000 );	
			<?php } ?>
	    </script><?php
	    }
	}

	function Shortcode_Quicktags_Help(){
	    ob_start();?><?php _e( 'Your new Quicktags are now activated. Just go to the HTML Text Editor inside a page or post and you will see them. Quicktags are for the <strong>Text editor</strong> only, not the Visual Editor.<br /><br />Use the settings below to customize your Quicktags. Also, your Quicktags have tooltips that will appear when you hover your cursor over them. They will show you different options for configuring your shortcodes.', 'shortcode-quicktags' ); return ob_get_clean();
	}

	function options(  ){
		if ( !class_exists( 'EditorInterface' ) )
		return;
		$options = array( );
		$options[] = array(
			'key'					=> 'quicktags-instructions',
			'type'					=> 'template',
			'template' 				=> $this->Shortcode_Quicktags_Help(),
			'title' 				=> __( 'Instructions', 'shortcode-quicktags' )
			);
		$options[] = array(
			'key'					=> 'quicktags-setup',
			'type'					=> 'multi',
			'col'					=> 1,
			'title' 				=> __( 'Quicktags Setup', 'shortcode-quicktags' ),
			'opts' => array(
				array(	
					'key'			=> 'sq_button_text_color',		
					'type'			=> 'color',	
					'label' 		=> __( 'Button Text Color', 'shortcode-quicktags' ),	
					'default'		=> ''
					),
				array(	
					'key'			=> 'sq_button_background_color',		
					'type'			=> 'color',	
					'label' 		=> __( 'Button Background Color', 'shortcode-quicktags' ),	
					'default'		=> ''
					),	
				array(
					'key'			=> 'color_class',
					'type'			=> 'select',
					'help'			=> __( 'Choose a color class that will appear in all of your shortcodes', 'shortcode-quicktags' ),
					'label'			=> __( 'Default Color Class', 'shortcode-quicktags' ),
					'default'		=>	'primary',
					'opts'			=> array(
						'default'	=> array("name" => __( 'default (Grey)', 'shortcode-quicktags' )),
						'primary'	=> array("name" => __( 'primary (Dark Blue)', 'shortcode-quicktags' )),
						'info'		=> array("name" => __( 'info (Light Blue)', 'shortcode-quicktags' )),
						'success'	=> array("name" => __( 'success (Green)', 'shortcode-quicktags' )),
						'warning'	=> array("name" => __( 'warning (Orange)', 'shortcode-quicktags' )),
						'important'	=> array("name" => __( 'important (Red)', 'shortcode-quicktags' )),
						'inverse'	=> array("name" => __( 'inverse (Black)', 'shortcode-quicktags' ))									
					)
				)
			)
		);
		$options[]	= array(
			'key'					=> 'hide-quicktags',
			'col'					=> 2,
			'type'					=> 'multi',
			'title' 				=> __( 'Hide Quicktags from HTML Editor', 'shortcode-quicktags' ),
			'opts'	=> array(
				array(
					'key'			=> 'pl_accordion',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Accordion', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_alertbox',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Alert', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_animation',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Animation', 'shortcode-quicktags' )
				),			
				array(
					'key'			=> 'pl_badge',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Badge', 'shortcode-quicktags' )
				),
				
				 array(
					'key'			=> 'pl_blockquote',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Blockquote', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_button',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Button', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_button_group',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Button Group', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_carousel',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Carousel', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_chart',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Chart', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_codebox',
					'type' 			=> 'check',
					'label'			=> __( 'Hide CodeBox', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_button_dropdown',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Dropdown', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_fa_icon',
					'type' 			=> 'check',
					'label'			=> __( 'Hide FA Icon', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_facebook',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Facebook', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_googleplus',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Google+', 'shortcode-quicktags' )
				),			
				array(
					'key'			=> 'pl_google_maps',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Google Maps', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_grid',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Grid', 'shortcode-quicktags' )
				),			
				array(
					'key'			=> 'pl_label',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Label', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_linkedin',
					'type' 			=> 'check',
					'label'			=> __( 'Hide LinkedIn', 'shortcode-quicktags' )
				),		
				array(
					'key'			=> 'pl_modal',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Modal', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_pinterest',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Pinterest', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_popover',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Popover', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_raw',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Raw', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_tabs',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Tabs', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_tooltip',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Tooltip', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_twitter',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Twitter', 'shortcode-quicktags' )
				),
				array(
					'key'			=> 'pl_video',
					'type' 			=> 'check',
					'label'			=> __( 'Hide Video', 'shortcode-quicktags' )
				)
			)
		);
		$option_args = array(
			'name'		=> 'Shortcode Quicktags',
			'opts'		=> $options,
			'icon'		=> 'icon-code',
			'pos'		=> 8
		);
		pl_add_options_page( $option_args );
	}
}
new ShortcodeQuicktags;