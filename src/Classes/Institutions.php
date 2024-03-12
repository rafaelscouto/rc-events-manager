<?php

namespace RcEventsManager\Classes;

/**
 * Class Institutions
 * @package RcEventsManager
 */
class Institutions
{
    /**
     * Institutions constructor.
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_cpt']);
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_filter('post_type_labels_rc_institutions', [$this, 'change_thumbnail_title']);
    }

    /**
     * Register custom post type
     */
    public function register_cpt()
    {
        $labels = [
            'name' => __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'singular_name' => __('Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'menu_name' => __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'slug' => __('institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'name_admin_bar' => __('Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new' => __('New', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new_item' => __('Add New Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'new_item' => __('New Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'edit_item' => __('Edit Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'view_item' => __('View Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'all_items' => __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'search_items' => __('Search Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Institutions:', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found' => __('No institutions found.', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found_in_trash' => __('No institutions found in Trash.', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'institutions'],
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => ['title', 'thumbnail']
        ];

        register_post_type('rc_institutions', $args);
    }

    /**
     * Add meta box
     */
    public function add_meta_box()
    {
        add_meta_box(
            'rc_institutions_meta_box',
            __('Institution Details', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            [$this, 'render_meta_box'],
            'rc_institutions',
            'normal',
            'high'
        );
    }

    /**
     * Render meta box
     * @param $post
     */
    public function render_meta_box($post)
    {
        if (has_post_thumbnail($post->ID)) {
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail', true);
            $thumbnail_url = $thumbnail_url[0];
        } else {
            $thumbnail_url = 'https://fakeimg.pl/1200x750/f6f7f7/dcdcde/?text=No%20image&font=bebas';
        }
        $institution_logo = $thumbnail_url;
        $institution_registration = get_post_meta($post->ID, 'rc_institution_registration', true);
        $institution_email = get_post_meta($post->ID, 'rc_institution_email', true);
        $institution_phone = get_post_meta($post->ID, 'rc_institution_phone', true);
        $institution_address = get_post_meta($post->ID, 'rc_institution_address', true);
        $institution_address_complement = get_post_meta($post->ID, 'rc_institution_address_complement', true);
        $institution_address_number = get_post_meta($post->ID, 'rc_institution_address_number', true);
        $institution_address_neighborhood = get_post_meta($post->ID, 'rc_institution_address_neighborhood', true);
        $institution_address_city = get_post_meta($post->ID, 'rc_institution_address_city', true);
        $institution_address_state = get_post_meta($post->ID, 'rc_institution_address_state', true);
        $institution_address_zip = get_post_meta($post->ID, 'rc_institution_address_zip', true);
        $institution_address_country = get_post_meta($post->ID, 'rc_institution_address_country', true);
        $institution_website = get_post_meta($post->ID, 'rc_institution_website', true);
        $institution_director_name = get_post_meta($post->ID, 'rc_institution_director_name', true);
        $institution_director_position = get_post_meta($post->ID, 'rc_institution_director_position', true);

        require_once RC_EVENTS_MANAGER_PLUGIN_DIR . '/src/views/admin/meta-box-institutions.php';
    }

    public function change_thumbnail_title($labels)
    {
        $labels->featured_image = __('Institution Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN);
        $labels->set_featured_image = __('Set Institution Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN);
        $labels->remove_featured_image = __('Remove Institution Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN);
        $labels->use_featured_image = __('Use as Institution Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN);

        return $labels;
    }
}