<?php

add_filter('ef3-theme-options-opt-name', 'wp_organicfood_set_demo_opt_name');

function wp_organicfood_set_demo_opt_name(){
    return 'opt_theme_options';
}

add_filter('ef3-replace-content', 'wp_organicfood_replace_content', 10 , 2);

function wp_organicfood_replace_content($replaces, $attachment){
    return array(
        //'/image="(.+?)"/' => 'image="'.$attachment.'"',
        '/tax_query:/' => 'remove_query:',
        '/categories:/' => 'remove_query:',
        //'/src="(.+?)"/' => 'src="'.ef3_import_export()->acess_url.'ef3-placeholder-image.jpg"'
    );
}

add_filter('ef3-replace-theme-options', 'wp_organicfood_replace_theme_options');

function wp_organicfood_replace_theme_options(){
    return array(
        'dev_mode' => 0,
    );
}
add_filter('ef3-enable-create-demo', 'wp_organicfood_enable_create_demo');

function wp_organicfood_enable_create_demo(){
    return false;
}

function wp_organicfood_update_theme_option(){
    $option_json = get_template_directory_uri() . '/inc/demo-data/organicfood/option.txt';
	$option_json = wp_remote_get( $option_json );
    $option_data = $option_json['body'];
    of_save_options(unserialize(base64_decode($option_data))); 
}

add_action('ef3-import-finish', 'wp_organicfood_update_theme_option');

function wp_organicfood_import_grid(){
	if(file_exists(ABSPATH .'wp-content/plugins/essential-grid/admin/includes/import.class.php')){
		require_once(ABSPATH .'wp-content/plugins/essential-grid/admin/includes/import.class.php');
		 
		$folder_dir = trailingslashit(get_template_directory().'/inc/demo-data/organicfood/grid');

		if(!file_exists($folder_dir . '/ess_grid.json')) exit();

		$im = new Essential_Grid_Import();
		$grid_extract = json_decode(file_get_contents($folder_dir . '/ess_grid.json'), true); 
		$grids = @$grid_extract['grids'];
		if(!empty($grids) && is_array($grids)){
			$grids_imported = $im->import_grids($grids);
		}
	} 
}

add_action('ef3-import-finish', 'wp_organicfood_import_grid');

function wp_organicfood_set_home_page(){

	$home_page = 'Organic Home';

	$page = get_page_by_title($home_page);

	if(!isset($page->ID))
		return ;
		 
		update_option('show_on_front', 'page');
		update_option('page_on_front', $page->ID);
}

add_action('ef3-import-finish', 'wp_organicfood_set_home_page');


function wp_organicfood_set_menu_location(){

	$setting = array(
			'Main Menu' => 'main_navigation'
	);

	$navs = wp_get_nav_menus();

	$new_setting = array();

	foreach ($navs as $nav){

		if(!isset($setting[$nav->name]))
			continue;

			$id = $nav->term_id;
			$location = $setting[$nav->name];

			$new_setting[$location] = $id;
	}

	set_theme_mod('nav_menu_locations', $new_setting);
}
 
add_action('ef3-import-finish', 'wp_organicfood_set_menu_location');

 
function wp_organicfood_update_widget_data_for_menu() { 
	$settings = array(
        'cshero-header-top-widget' => array('Menu Top'),
        'cshero-slidingbar-bottom-widget-2' => array('Menu Footer'),
    );
	if(!empty($settings)){
		foreach($settings as  $sbarid =>$nav_arr_name){
			// get menu id unassign
			$sidebars_widgets = wp_get_sidebars_widgets();
			$widget_ids = $sidebars_widgets[$sbarid];
			
			if( !$widget_ids ) {
				return ;
			}
			$icr=0;
			foreach( $widget_ids as $id ) {
				$wdgtvar = 'widget_'._get_widget_id_base( $id );
				$idvar = _get_widget_id_base( $id );
				$instance = get_option( $wdgtvar );
				$idbs = str_replace( $idvar.'-', '', $id );
				if(isset($instance[$idbs]['nav_menu'])){
					// get current menu id
					$nav = wp_get_nav_menu_object($nav_arr_name[$icr]);
					$mn_id = $nav->term_id;
					// update menu id to widget
					$instance[$idbs]['nav_menu'] = $mn_id;
					update_option( $wdgtvar, $instance );
					$icr++;
				}
			}   
		}   
	}
}
add_action('ef3-import-finish','wp_organicfood_update_widget_data_for_menu');

function wp_organicfood_set_woo_page(){
    
    $woo_pages = array(
        'woocommerce_shop_page_id' => 'Shop',
        'woocommerce_cart_page_id' => 'Cart',
        'woocommerce_checkout_page_id' => 'Checkout'
    );
    
    foreach ($woo_pages as $key => $woo_page){
    
        $page = get_page_by_title($woo_page);
    
        if(!isset($page->ID))
            return ;
             
        update_option($key, $page->ID);
    
    }
}

add_action('ef3-import-finish', 'wp_organicfood_set_woo_page');
 