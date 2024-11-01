<?php
#Activate
register_activation_hook( __FILE__, 'swgactivate' );
function swgactivate(){
	create_shanewebportfolio_cpt();
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}
#Deactivate
register_deactivation_hook( __FILE__, 'swgdeactivate' );
function swgdeactivate(){
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

#Add Ajax Url Header Area
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() { ?>
	<script type="text/javascript"> var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>'; </script>
<?php }

#Create PostType and Taxonomy
add_action('init', 'create_shanewebportfolio_cpt');

function create_shanewebportfolio_cpt(){

	$labels = array(
		'name'                  => _x( 'SWG Portfolio', 'swgportfolio', 'text_domain' ),
		'singular_name'         => _x( 'Portfolio', 'shaneportfolio', 'text_domain' ),
		'menu_name'             => __( 'SWG Portfolio', 'text_domain' ),
		'name_admin_bar'        => __( 'SWG Portfolio', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	
	$args = array(
		'label'                 => __( $labels, 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('title','editor','thumbnail','excerpt', 'comments',),
		'taxonomies'            => array('swg_cats'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'swgportfolio', $args );

	register_taxonomy(
			'swg_cats',
			'swgportfolio',
			array(
				'label' => __( 'SWGP Categories' ),
				'rewrite' => true,
				'show_ui' => true,
				'query_var' => true,
				'hierarchical' => true,
			)
		);

	add_image_size( 'swg_thumb', 150, 180, true );
	add_image_size( 'swg_med', 250, 303, true );
}

#Create Settings Page
add_action("admin_menu",'swgp_sub_menu_options');
function swgp_sub_menu_options (){
	add_submenu_page( 'edit.php?post_type=swgportfolio', 'Profolio Settings', 'Settings', 'manage_options', 'swgp_settings', 'swgp_settings_page');
}

#Admin Scripts
function my_admin_scripts() {    
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', PLUGIN_URL.'/public/js/admin.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('my-upload');
    wp_enqueue_script('my-color-picker', PLUGIN_URL . '/public/assets/color-picker/js/bootstrap-colorpicker.min.js');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-tabs');
}

#Admin Styles
function my_admin_styles() {
		wp_enqueue_style('swg-strap', PLUGIN_URL . '/public/assets/bootstrap/css/bootstrap.min.css');
		wp_enqueue_style('swg-color-picker', PLUGIN_URL . '/public/assets/color-picker/css/bootstrap-colorpicker.min.css');
		wp_enqueue_style('swg-awesome', PLUGIN_URL . '/public/assets/font-awesome-4.5.0/css/font-awesome.min.css');
		wp_enqueue_style('swg-custom', PLUGIN_URL . '/public/css/admin.css');
		wp_enqueue_style('swg-custom', PLUGIN_URL . '/public/css/custom.min.css');
	    wp_enqueue_style('thickbox');	
}

#Create Settings Page
if (isset($_GET['page']) && $_GET['page'] == 'swgp_settings') {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}

#Admin Page
function swgp_settings_page() {
	include  PLUGIN_PATH . "/app/views/admin/adminPage.php";
}

#Client Scripts
function swg_scripts() {
    wp_enqueue_style('swg-reset', PLUGIN_URL . '/public/css/grid/html5reset.css', array(), '1.0.0', 'all');
    wp_enqueue_style('swg-col', PLUGIN_URL . '/public/css/grid/col.css', array(), '1.0.0', 'all');
    wp_enqueue_style('swg-grid', PLUGIN_URL . '/public/css/grid/grid.css', array(), '1.0.0', 'all');
    wp_enqueue_style('swg-grid', PLUGIN_URL . '/public/css/grid/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('swg-style', PLUGIN_URL . 'public/css/custom.min.css', array(), '1.0.0', 'all');
    
    wp_enqueue_style('swg-awesome', PLUGIN_URL . '/public/assets/font-awesome-4.5.0/css/font-awesome.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('swg-carousel', PLUGIN_URL . '/public/assets/carousel/swgp.carousel.css', array(), '1.0.0', 'all');
    wp_enqueue_style('swg-transitions', PLUGIN_URL . '/public/assets/carousel/swgp.transitions.css', array(), '1.0.0', 'all');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('swg-script-modern', PLUGIN_URL . 'public/js/modernizr.custom.js');
    wp_enqueue_script('swg-script-carousel', PLUGIN_URL . 'public/assets/carousel/swgp.carousel.min.js', array(), '1.0.0', true);
    wp_enqueue_script('swg-script-main', PLUGIN_URL . 'public/js/custom.min.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'swg_scripts');

#Single Page Render
function get_custom_post_type_template($single_template) {
    global $post;
    if ($post->post_type == 'swgportfolio') {
        $single_template = PLUGIN_PATH .  '/app/views/client/single_template.php';
    }

    return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );

#defaults

function set_defaults(){
	require PLUGIN_PATH .  '/app/models/portfolioModel.php';
	$model = new SWG_PORTFOLIOMODEL();
	$model->set_defaults();
}

#Add Shortcode();
function swg_shortcodes($attr){
	include  PLUGIN_PATH . "/app/views/client/portfolio.php";
}
add_shortcode( 'swg_portfolio', 'swg_shortcodes');