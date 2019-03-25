<?php
//Set properties for top menu
	if ( function_exists( 'wp_nav_menu' ) ){
		 if (function_exists('add_theme_support')) {
		  add_theme_support('nav-menus');
		  add_action( 'init', 'register_my_menus' );
		  function register_my_menus() {
		   register_nav_menus(
			array(
			 'top-menu' => __( 'Top Menu' ),
			 'bottom-menu' => __( 'bottom Menu' )
			)
		   );
		  }
		}
	}
	
//active feature image post
add_theme_support( 'post-thumbnails' );

//active mutiple post thumbnail
if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' =>'post',
            )
        );
    }
if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' =>'service',
            )
        );
    }
//add social network
if (function_exists('cn_social_icon')) {
     register_sidebar(array(
      'name' => 'social-area',
      'id'   => 'social-area',
     ));
}
//add short code
function short_detail_shortcode( $atts, $content = null ) {
   return '<li>' . $content . '</li>';
}
add_shortcode( 'detail', 'short_detail_shortcode' );

//add meta box
/*-----------------------------------------add metabox for profile--------------------------*/
add_action( 'add_meta_boxes', 'add_metaboxes' );
function add_metaboxes() {
 $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
 add_meta_box('short-content', 'Short Content', 'short_content_callback','service', 'side', 'default');
 add_meta_box('short-content-page', 'Short Content', 'page_short_content_callback','page', 'side', 'default');
 add_meta_box('short-content', 'Short Content', 'information_profile_callback','profile', 'side', 'default');
 add_meta_box('project-type', 'Project type', 'type_portfolio_callback','portfolio', 'side', 'default');
 add_meta_box('client-information', 'Client Information', 'client_information_callback','client', 'side', 'default');
 add_meta_box('select-banner', 'Select banner', 'select_banner_callback','page', 'side', 'default');

 //add metabox "short code contact" for contact page
 $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
 if($post_id==95 || $post_id==209){
	add_meta_box('contact-shortcode', 'Contact short-code', 'contact_shortcode_callback','page', 'side', 'default');
	add_meta_box('contact-info', 'Contact info', 'contact_info_callback','page', 'side', 'default');
 }
}

function short_content_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
  $short_title = get_post_meta($post->ID, 'short-title', true);
  echo '<p>Short title :</p><input type="text" name="short-title" value="' .  $short_title  . '" class="widefat" />';
  $short_description = get_post_meta($post->ID, 'short-description', true);
  echo '<p>Short description :</p><input type="text" name="short-description" value="' .$short_description. '" class="widefat" />';
  $short_detail = get_post_meta($post->ID, 'short-detail', true);
  echo '<p>Short detail :</p><textarea name="short-detail" cols="40" rows="1" style="width:100%;height:7em;margin:0;">'.$short_detail.'</textarea><br><p>Example:[detail]Carpe diam decum solo[/detail]</p>';
}

//profile metabox
function information_profile_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
  $job_name = get_post_meta($post->ID, 'job-name', true);
  echo '<p>Job name :</p><input type="text" name="job-name" value="'.$job_name. '" class="widefat" style="width:30%;" />';
  $job_description = get_post_meta($post->ID, 'job-description', true);
  echo '<p>Job description:</p><textarea name="job-description" cols="20" rows="1" style="width:100%;height:4em;margin:0;">'.$job_description.'</textarea>';
  $job_detail = get_post_meta($post->ID, 'job-detail', true);
  echo '<p>Job detail :</p><textarea name="job-detail" cols="40" rows="1" style="width:100%;height:7em;margin:0;">'.$job_detail.'</textarea><br><p>Example:[detail]Carpe diam decum solo[/detail]</p>';
  
}

//Short content for page
function page_short_content_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
  $short_title_page = get_post_meta($post->ID, 'short-title-page', true);
  echo '<p>Short title :</p><input type="text" name="short-title-page" value="' .$short_title_page. '" class="widefat" />';
}

//Project type of portfolio
function type_portfolio_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
  $project_type = get_post_meta($post->ID, 'project-type', true);
  echo '<p>Project type: </p><input type="text" name="project-type" value="' .$project_type. '" class="widefat" />';
  $industry = get_post_meta($post->ID, 'industry', true);
  echo '<p>Industry: </p><input type="text" name="industry" value="' . $industry. '" class="widefat" />';
  $link_site = get_post_meta($post->ID, 'visit-site', true);
  echo '<p>Link "visit site": </p><input type="text" name="visit-site" value="' .$link_site. '" class="widefat" /><p>Example:www.google.com</p>';
}

//Add function metabox "short code contact" for contact page
function contact_shortcode_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  $shortcode_contact = get_post_meta($post->ID, 'shortcode-contact', true);
  echo '<p>Short code contact form: </p><input type="text" name="shortcode-contact" value="' .$shortcode_contact. '" class="widefat" />';
}

//Add function metabox "short code contact" for contact page
function contact_info_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  $contact_info = get_post_meta($post->ID, 'contact-info', true);
  echo '<p>Contact info :</p><textarea name="contact-info" cols="40" rows="1" style="width:100%;height:7em;margin:0;">'.$contact_info.'</textarea><br><p>Example:[detail]Assisstance mailassisstance@vertiopia.com[/detail]</p>';
  $address = get_post_meta($post->ID, 'address', true);
  echo '<p>Address: </p><input type="text" name="address" value="' .$address. '" class="widefat" />';
}

//Add metabox "Client Information" for 'post type' client
function client_information_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  $link_client = get_post_meta($post->ID, 'link-client', true);
  echo '<p>Link client: </p><input type="text" name="link-client" value="' .$link_client. '" class="widefat" /><br><p>Example:www.google.com</p>';
}

//Add metabox "page appear banner"
function select_banner_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  $id_banner = get_post_meta($post->ID, 'select-banner', true);
  $args = array(
							'post_type' =>'banner',
							'orderby'=>'date',
							'order' => 'asc',
						);
	$loop = new WP_Query( $args );
	echo '<select name="select-banner" class="widefat">';
	while ( $loop->have_posts() ) : $loop->the_post();
		$id_select=get_the_ID();
		if($id_banner==$id_select)
			echo '<option selected="selected" value="'.$id_select.'">'.get_the_title().'</option>';
		else 
			echo '<option value="'.$id_select.'">'.get_the_title().'</option>';
	endwhile;
	echo '</select>';
}  

function save_meta_box($post_id, $post) {
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
	//save short content
    $events_meta['short-title'] = $_POST['short-title'];
	$events_meta['short-description'] = $_POST['short-description'];
	$events_meta['short-detail'] = $_POST['short-detail'];
	//save profile
	$events_meta['job-name'] = $_POST['job-name'];
	$events_meta['job-description'] = $_POST['job-description'];
	$events_meta['job-detail'] = $_POST['job-detail'];
	//save short content for page
	$events_meta['short-title-page'] = $_POST['short-title-page'];
	//save project type of portfolio
	$events_meta['project-type'] = $_POST['project-type'];
	$events_meta['industry'] = $_POST['industry'];
	$events_meta['visit-site'] = $_POST['visit-site'];
	$events_meta['shortcode-contact'] = $_POST['shortcode-contact'];
	//save contact info
	$events_meta['contact-info'] = $_POST['contact-info'];
	$events_meta['address'] = $_POST['address'];
	//add link client
	$events_meta['link-client'] = $_POST['link-client'];
	//add select-banner
	$events_meta['select-banner'] = $_POST['select-banner'];
	 
    foreach ($events_meta as $key => $value) { 
        if( $post->post_type == 'revision' ) return;
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) { 
            update_post_meta($post->ID, $key, $value);
        } else { 
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); 
    }
}
add_action('save_post', 'save_meta_box', 1, 2);

//Add taxonomy for Profile(Our team)
//create post type Profile
add_action( 'init', 'create_profile_taxonomies', 0 );

function create_profile_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Profile category', 'taxonomy general name' ),
    'singular_name' => _x( 'Profile category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Profile category' ),
    'all_items' => __( 'All Profile category' ),
    'parent_item' => __( 'Parent Profile category' ),
    'parent_item_colon' => __( 'Parent Profile category:' ),
    'edit_item' => __( 'Edit Profile category' ), 
    'update_item' => __( 'Update Profile category' ),
    'add_new_item' => __( 'Add New Profile category' ),
    'new_item_name' => __( 'New Profile category Name' ),
    'menu_name' => __( 'Profile category' ),
  ); 	

  register_taxonomy('profile-category',array('profile'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'profile-category' ),
  ));
}

function codex_custom_init_profile() {
  $labels = array(
    'name' => _x('Profile', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Profile', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'Profile', 'your_text_domain'),
    'add_new_item' => __('Add New Profile', 'your_text_domain'),
    'edit_item' => __('Edit Profile', 'your_text_domain'),
    'new_item' => __('New Profile', 'your_text_domain'),
    'all_items' => __('All Profile', 'your_text_domain'),
    'view_item' => __('View Profile', 'your_text_domain'),
    'search_items' => __('Search Profile', 'your_text_domain'),
    'not_found' =>  __('No Profile', 'your_text_domain'),
    'not_found_in_trash' => __('No Profile found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Profile', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'profile', 'URL slug', 'your_text_domain' ) ),
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields')
  ); 
  register_post_type('profile', $args);
}
add_action( 'init', 'codex_custom_init_profile' );


//Add taxonomy for Portfolio(Our team)
//create post type Portfolio
add_action( 'init', 'create_portfolio_taxonomies', 0 );

function create_portfolio_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Portfolio category', 'taxonomy general name' ),
    'singular_name' => _x( 'Portfolio category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Portfolio category' ),
    'all_items' => __( 'All Portfolio category' ),
    'parent_item' => __( 'Parent Portfolio category' ),
    'parent_item_colon' => __( 'Parent Portfolio category:' ),
    'edit_item' => __( 'Edit Portfolio category' ), 
    'update_item' => __( 'Update Portfolio category' ),
    'add_new_item' => __( 'Add New Portfolio category' ),
    'new_item_name' => __( 'New Portfolio category Name' ),
    'menu_name' => __( 'Portfolio category' ),
  ); 	

  register_taxonomy('portfolio-category',array('portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio-category' ),
  ));
}

function codex_custom_init_portfolio() {
  $labels = array(
    'name' => _x('Portfolio', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Portfolio', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'Portfolio', 'your_text_domain'),
    'add_new_item' => __('Add New Portfolio', 'your_text_domain'),
    'edit_item' => __('Edit Portfolio', 'your_text_domain'),
    'new_item' => __('New Portfolio', 'your_text_domain'),
    'all_items' => __('All Portfolio', 'your_text_domain'),
    'view_item' => __('View Portfolio', 'your_text_domain'),
    'search_items' => __('Search Portfolio', 'your_text_domain'),
    'not_found' =>  __('No Portfolio', 'your_text_domain'),
    'not_found_in_trash' => __('No Portfolio found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Portfolio', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'portfolio', 'URL slug', 'your_text_domain' ) ),
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields')
  ); 
  register_post_type('Portfolio', $args);
}
add_action( 'init', 'codex_custom_init_portfolio' );

//Add taxonomy for Service
//create post type Service
add_action( 'init', 'create_service_taxonomies', 0 );

function create_service_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Service category', 'taxonomy general name' ),
    'singular_name' => _x( 'Service category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Service category' ),
    'all_items' => __( 'All Service category' ),
    'parent_item' => __( 'Parent Service category' ),
    'parent_item_colon' => __( 'Parent Service category:' ),
    'edit_item' => __( 'Edit Service category' ), 
    'update_item' => __( 'Update Service category' ),
    'add_new_item' => __( 'Add New Service category' ),
    'new_item_name' => __( 'New Service category Name' ),
    'menu_name' => __( 'Service category' ),
  ); 	

  register_taxonomy('service-category',array('service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service-category' ),
  ));
}

function codex_custom_init_service() {
  $labels = array(
    'name' => _x('Service', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Service', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'Service', 'your_text_domain'),
    'add_new_item' => __('Add New Service', 'your_text_domain'),
    'edit_item' => __('Edit Service', 'your_text_domain'),
    'new_item' => __('New Service', 'your_text_domain'),
    'all_items' => __('All Service', 'your_text_domain'),
    'view_item' => __('View Service', 'your_text_domain'),
    'search_items' => __('Search Service', 'your_text_domain'),
    'not_found' =>  __('No Service', 'your_text_domain'),
    'not_found_in_trash' => __('No Service found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Service', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'service', 'URL slug', 'your_text_domain' ) ),
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields')
  ); 
  register_post_type('service', $args);
}
add_action( 'init', 'codex_custom_init_service' );

//Add taxonomy for Client
//create post type Client
add_action( 'init', 'create_client_taxonomies', 0 );

function create_client_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Client category', 'taxonomy general name' ),
    'singular_name' => _x( 'Client category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Client category' ),
    'all_items' => __( 'All Client category' ),
    'parent_item' => __( 'Parent Client category' ),
    'parent_item_colon' => __( 'Parent Client category:' ),
    'edit_item' => __( 'Edit Client category' ), 
    'update_item' => __( 'Update Client category' ),
    'add_new_item' => __( 'Add New Client category' ),
    'new_item_name' => __( 'New Client category Name' ),
    'menu_name' => __( 'Client category' ),
  ); 	

  register_taxonomy('client-category',array('client'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'client-category' ),
  ));
}

function codex_custom_init_client() {
  $labels = array(
    'name' => _x('Client', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Client', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'Client', 'your_text_domain'),
    'add_new_item' => __('Add New Client', 'your_text_domain'),
    'edit_item' => __('Edit Client', 'your_text_domain'),
    'new_item' => __('New Client', 'your_text_domain'),
    'all_items' => __('All Client', 'your_text_domain'),
    'view_item' => __('View Client', 'your_text_domain'),
    'search_items' => __('Search Client', 'your_text_domain'),
    'not_found' =>  __('No Client', 'your_text_domain'),
    'not_found_in_trash' => __('No Client found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Client', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'client', 'URL slug', 'your_text_domain' ) ),
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields')
  ); 
  register_post_type('client', $args);
}
add_action( 'init', 'codex_custom_init_client' );

//Add taxonomy for Banner
//create post type Banner
add_action( 'init', 'create_banner_taxonomies', 0 );

function create_banner_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Banner category', 'taxonomy general name' ),
    'singular_name' => _x( 'Banner category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Banner category' ),
    'all_items' => __( 'All Banner category' ),
    'parent_item' => __( 'Parent Banner category' ),
    'parent_item_colon' => __( 'Parent Banner category:' ),
    'edit_item' => __( 'Edit Banner category' ), 
    'update_item' => __( 'Update Banner category' ),
    'add_new_item' => __( 'Add New Banner category' ),
    'new_item_name' => __( 'New Banner category Name' ),
    'menu_name' => __( 'Banner category' ),
  ); 	

  register_taxonomy('banner-category',array('banner'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'banner-category' ),
  ));
}

function codex_custom_init_banner() {
  $labels = array(
    'name' => _x('Banner', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Banner', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'Banner', 'your_text_domain'),
    'add_new_item' => __('Add New Banner', 'your_text_domain'),
    'edit_item' => __('Edit Banner', 'your_text_domain'),
    'new_item' => __('New Banner', 'your_text_domain'),
    'all_items' => __('All Banner', 'your_text_domain'),
    'view_item' => __('View Banner', 'your_text_domain'),
    'search_items' => __('Search Banner', 'your_text_domain'),
    'not_found' =>  __('No Banner', 'your_text_domain'),
    'not_found_in_trash' => __('No Banner found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Banner', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'banner', 'URL slug', 'your_text_domain' ) ),
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields')
  ); 
  register_post_type('banner', $args);
}
add_action( 'init', 'codex_custom_init_banner' );
?>
<?php
$themename="vertiopia";
$shortname = "w";
add_action( 'admin_init', 'ws_theme_options_init' );
/**
 * Init plugin options to white list our options
 */
function ws_theme_options_init(){
    register_setting( 'ws_theme_options_group', 'ws_theme_options', 'ws_options_validate' );
}


// Hook for adding admin menus
add_action('admin_menu', 'theme_options_add_pages');

// action function for above hook
function theme_options_add_pages() {
    // Add a new top-level menu (ill-advised):
    $hook_suffix_topmenu = add_menu_page(__('Theme Options',$themename), __('Theme Options',$themename), 'administrator', 'them-options-top-handle', 'ws_toplevel_page' );
}
function ws_options_validate( $input ) {
	// Say our text option must be safe text with no HTML tags
    $input['page_left'] = wp_filter_nohtml_kses( $input['page_left'] );
    $input['page_right'] = wp_filter_nohtml_kses( $input['page_right'] );
	$input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );
	$input['twitter'] = wp_filter_nohtml_kses( $input['twitter'] );
	$input['linkedin'] = wp_filter_nohtml_kses( $input['linkedin'] );
	return $input;
}
function ws_toplevel_page() {
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php echo "<h2>" . __( 'Theme options', $themename ) . "</h2>"; ?>
        
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', $themename ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'ws_theme_options_group' ); ?>
			<?php $options = get_option( 'ws_theme_options' ); ?>

            
            <table class="form-table">
				<tr valign="top">
                    <th scope="row"><?php _e( 'Facebook', $themename ); ?> :</th>
					<td>
                        <input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" style="width:25%;" />
					</td>
				</tr>
				
				<tr valign="top">
                    <th scope="row"><?php _e( 'Twitter', $themename ); ?> :</th>
					<td>
                        <input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" style="width:25%;" />
					</td>
				</tr>
				
				<tr valign="top">
                    <th scope="row"><?php _e( 'linkedin', $themename ); ?> :</th>
					<td>
                        <input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[rss]" value="<?php esc_attr_e( $options['linkedin'] ); ?>" style="width:25%;" />
					</td>
				</tr>
			</table>
            <br/>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', $themename ); ?>" />
			</p>
		</form>
	</div>
	<?php
}
//translate html	
if($_GET['lang']=='vi'){
	$take_a_look='Xem những ứng dụng của Vertiopia';
	$more_info='Xem thêm';
}
else{
	$take_a_look='Take a look at what we do';
	$more_info='More info';
	
}
?>
