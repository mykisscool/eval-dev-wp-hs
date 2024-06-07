<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}
add_action( 'admin_notices', 'blankslate_notice' );
function blankslate_notice() {
$user_id = get_current_user_id();
$admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$param = ( count( $_GET ) ) ? '&' : '?';
if ( !get_user_meta( $user_id, 'blankslate_notice_dismissed_8' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'blankslate' ) . '</big></a>' . wp_kses_post( __( '<big><strong>📝 Thank you for using BlankSlate!</strong></big>', 'blankslate' ) ) . '<br /><br /><a href="https://wordpress.org/support/theme/blankslate/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__( 'Review', 'blankslate' ) . '</a> <a href="https://github.com/tidythemes/blankslate/issues" class="button-primary" target="_blank">' . esc_html__( 'Feature Requests & Support', 'blankslate' ) . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__( 'Donate', 'blankslate' ) . '</a></p></div>';
}
add_action( 'admin_init', 'blankslate_notice_dismissed' );
function blankslate_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['dismiss'] ) )
add_user_meta( $user_id, 'blankslate_notice_dismissed_8', 'true', true );
}
add_action( 'wp_enqueue_scripts', 'blankslate_enqueue' );
function blankslate_enqueue() {
wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'blankslate_footer' );
function blankslate_footer() {
?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (deviceAgent.match(/(Android)/)) {
$("html").addClass("android");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function blankslate_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'blankslate_schema_url', 10 );
function blankslate_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'blankslate_wp_body_open' ) ) {
function blankslate_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'blankslate_skip_link', 5 );
function blankslate_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'blankslate' ) . '</a>';
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function blankslate_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_script( 'custom', get_theme_file_uri( 'js/scripts.js' ), array(), '1.0', true, array( 'strategy' => 'defer', 'in_footer' => true ) );
});

/**
 * Searches through PHP SERVER superglobals for the correct key containing client IP address; varies based on
 * architecture and server configuration.
 * @return mixed|string
 */
function get_ip_address() {

    // Cloudflare
    if( !empty($_SERVER['HTTP_CF_CONNECTING_IP']) && is_valid_ip($_SERVER['HTTP_CF_CONNECTING_IP']) ) {
        return $_SERVER['HTTP_CF_CONNECTING_IP'];
    }

    // AWS Cloudfront
    if( !empty($_SERVER['CLOUDFRONT_VIEWER_ADDRESS']) ) {
        // The Cloudfront-Viewer-Address is in the format IP:PORT
        // Extract the IP address and ignore the PORT
        $parts = explode( ':', $_SERVER['CLOUDFRONT_VIEWER_ADDRESS'] );
        if( is_valid_ip($parts[0]) ) {
            return $parts[0];
        }
    }

    // Pantheon, AWS Load Balancer, and IPs passing through proxies
    if( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        // Check if multiple IP addresses exist in var
        $iplist = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
        foreach( $iplist as $ip ) {
            if( is_valid_ip( $ip ) ) {
                return $ip;
            }
        }
    }

    // Loop through other _SERVER vars that might contain IP address
    $keys = array(
        'HTTP_X_FORWARDED',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_CLIENT_IP',
        'REMOTE_ADDR'
    );

    foreach( $keys as $key ) {
        if( !empty($_SERVER[$key]) && is_valid_ip($_SERVER[$key]) ) {
            return $_SERVER[$key];
        }
    }

    return ''; // Couldn't find the IP in the usual places
}

/**
 * @param $ip
 * @return bool
 */
function is_valid_ip($ip) {
    $options = FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE;
    return filter_var( $ip, FILTER_VALIDATE_IP, $options ) !== false;
}

/**
 * @return string|void
 */
function get_city_available_message() {
    $ip = get_ip_address();
    $ip = '35.142.93.21'; // Just to simulate a non-private IP address
    $is_valid_ip = is_valid_ip( $ip );

    if ( $is_valid_ip ) {
        $city = file_get_contents( "https://ipapi.co/{$ip}/city/" );
    }

    if ( $is_valid_ip && $city ) {
        return '&#127968; Our Gutters available in ' . file_get_contents( "https://ipapi.co/{$ip}/city/" );
    }
}

/**
 * New post type - Gutter
 * @return void
 */
function my_custom_post_gutter() {

    $labels = array(
        'name'               => 'Gutters',
        'singular_name'      => 'Gutter',
        'add_new'            => 'Add New Gutter',
        'add_new_item'       => 'Add New Gutter',
        'edit_item'          => 'Edit Gutter',
        'new_item'           => 'New Gutter',
        'all_items'          => 'All Gutters',
        'view_item'          => 'View Gutter',
        'search_items'       => 'Search Gutters',
        'not_found'          => 'No gutters found',
        'not_found_in_trash' => 'No gutters found in the Trash'
    );

    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields'
    );

    $args = array(
        'labels'             => $labels,
        'supports'           => $supports,
        'description'        => 'Custom gutter post type',
        'hierarchical'       => false,
        'query_var'          => true,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'menu_position'      => 5,
        'has_archive'        => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-hammer',
        'rewrite'            => array( 'slug' => 'gutter' ),
        'taxonomies'         => array( 'gutter-category' ),
        'show_in_rest'       => true
    );

    register_post_type( 'gutter', $args );
}
add_action( 'init', 'my_custom_post_gutter' );

/**
 * New categories for "gutter"
 * @return void
 */
function my_custom_taxonomy_standard_gutter() {

    $args = array(
        'label'             => 'Gutter Categories',
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'gutter-category' ),
    );

    register_taxonomy( 'gutter-category', array( 'gutter' ), $args );
}
add_action( 'init', 'my_custom_taxonomy_standard_gutter' );

/**
 * @return array
 */
function get_gutter_category_array() {
    $categories = get_categories( array (
        'taxonomy'   => 'gutter-category',
        'hide_empty' => false
    ) );

    $category_data = array();
    foreach($categories as $category) {
        $category_data[] = array(
            'name' => $category->name,
            'description' => $category->description,
            'thumbnail' => null // @TODO Add thumbnail for custom post type category
        );
    }

    return array_slice($category_data, 0, 3); // @TODO Template expecting 3 - what happens with less than that?
}

/**
 * New post type - Testimonial
 * @return void
 */
function my_custom_post_testimonial() {

    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'add_new'            => 'Add New Testimonial',
        'add_new_item'       => 'Add New Testimonial',
        'edit_item'          => 'Edit Testimonial',
        'new_item'           => 'New Testimonial',
        'all_items'          => 'All Testimonials',
        'view_item'          => 'View Testimonial',
        'search_items'       => 'Search Testimonials',
        'not_found'          => 'No testimonials found',
        'not_found_in_trash' => 'No testimonials found in the Trash'
    );

    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );

    $args = array(
        'labels'             => $labels,
        'supports'           => $supports,
        'description'        => 'Custom testimonial post type',
        'hierarchical'       => false,
        'query_var'          => false,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'menu_position'      => 6,
        'has_archive'        => false,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-star-half'
    );

    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'my_custom_post_testimonial' );

/**
 * @return array
 */
function get_testimonials_array() {
    $testimonials = get_posts( array(
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'numberposts' => 4
    ) );

    $testimonial_data = array();
    foreach( $testimonials as $testimonial ) {
        $testimonial_data[] = array(
            'name' => $testimonial->post_title,
            'quote' => $testimonial->post_content
        );
    }

    return $testimonial_data; // @TODO Template expecting 4 - what happens with less than that?
}
