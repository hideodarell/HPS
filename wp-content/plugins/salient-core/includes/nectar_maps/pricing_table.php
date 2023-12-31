<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

return array(
	"name"  => esc_html__("Pricing Table", "salient-core"),
	"base" => "pricing_table",
	"show_settings_on_create" => false,
	"is_container" => true,
	"icon" => "icon-wpb-pricing-table",
	"category" => esc_html__('Content', 'salient-core'),
	"description" => esc_html__('Stylish pricing tables', 'salient-core'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", "salient-core"),
			"param_name" => "el_class",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"admin_label" => false,
			"class" => "",
			"heading" => "Style",
			"param_name" => "style",
			"value" => array(
				esc_html__("Default", "salient-core") => "default",
				esc_html__("Flat Alternative", "salient-core") => "flat-alternative"
			),
			'save_always' => true,
			"description" => ""
		)
	),
	"custom_markup" => '
	<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	<ul class="tabs_controls">
	</ul>
	%content%
	</div>'
	,
	'default_content' => '
	[pricing_column title="'.esc_html__('Column','salient-core').'" id="'.$tab_id_1.'"]  [/pricing_column]
	[pricing_column title="'.esc_html__('Column','salient-core').'" id="'.$tab_id_2.'"]  [/pricing_column]
	',
	"js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
);

?>