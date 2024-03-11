<?php

namespace RcEventsManager\Classes;

/**
 * Class Certificates
 * @package RcEventsManager
 */
class Certificates
{
    /**
     * Certificates constructor.
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_cpt']);
    }

    /**
     * Register custom post type
     */
    public function register_cpt()
    {
        $labels = [
            'name' => __('Certificates', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'singular_name' => __('Certificate', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'menu_name' => __('Certificates', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'slug' => __('certificates', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'name_admin_bar' => __('Certificate', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new' => __('New', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new_item' => __('Add New Certificate', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'new_item' => __('New Certificate', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'edit_item' => __('Edit Certificate', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'view_item' => __('View Certificate', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'all_items' => __('Certificates', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'search_items' => __('Search Certificates', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Certificates:', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found' => __('No certificates found.', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found_in_trash' => __('No certificates found in Trash.', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'certificates'],
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => ['title', 'custom-fields']
        ];

        register_post_type('rc_certificates', $args);
    }
}