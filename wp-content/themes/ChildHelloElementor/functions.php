<?php
/*This file is part of ChildHelloElementor, hello-elementor child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function ChildHelloElementor_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'parente2-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'parente2-style' );
	    // loading child style
	    wp_register_style(
	      'childe2-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'childe2-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'ChildHelloElementor_enqueue_child_styles' );

/*Write here your own functions */

function enqueue_child_scripts() {
    wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() . '/custom-ajax.js', array('jquery'), null, true);
    wp_localize_script('my-custom-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_child_scripts');

  // Custome Post Type
function register_providers_post_type() {
    register_post_type('providers', array(
        'label' => 'Providers',
        'public' => true,
        'menu_icon' => 'dashicons-groups', // Optional: Choose an icon from Dashicons
        'supports' => array('title', 'editor', 'custom-fields'), // Add any other supports as needed
    ));
}
add_action('init', 'register_providers_post_type');
 
 
function fetch_providers_callback() {
    $keyword = sanitize_text_field($_POST['keyword']);
    $args = array(
        'post_type' => 'providers',
    );
    $isCodeType = isset($_POST['type']) && $_POST['type'] == 'code';
    if ($isCodeType) {
        $args['meta_query'] = array(
            array(
                'key' => 'shor_country_name',
                'value' => $keyword,
                'compare' => 'LIKE'
            )
        );
    } else {
        $args['s'] = $keyword;
    }

    $query = new WP_Query($args);
    $options = "";
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $sub_records = array();
            $provider_rows = get_field('providers');
            if ($provider_rows) {
                foreach ($provider_rows as $row) {
                    $sub_records[] = array(
                        'name' => $row['provider_name'],
                        'website' => $row['website']
                    );
                }
            }

            $data_attribute = htmlspecialchars(json_encode($sub_records), ENT_QUOTES, 'UTF-8');
            $displayText = $isCodeType ? get_field('shor_country_name') : get_the_title();
            $options .= "<a href='javascript:void(0)' class='dropdown-item' data-value='" . get_the_ID() . "' data-sub-records='" . $data_attribute . "'>" . $displayText . "</a></br>";
        }
    } else {
        $options .= "<a class='dropdown-item'>No providers found</a>";
    }

    wp_reset_postdata();
    echo $options;
    wp_die();
}
add_action('wp_ajax_fetch_providers', 'fetch_providers_callback');
add_action('wp_ajax_nopriv_fetch_providers', 'fetch_providers_callback');