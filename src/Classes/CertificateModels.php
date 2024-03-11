<?php

namespace RcEventsManager\Classes;

/**
 * Class CertificateModels
 * @package RcEventsManager
 */
class CertificateModels
{
    private $models;

    /**
     * CertificateModels constructor.
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
            'name' => __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'singular_name' => __('Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'menu_name' => __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'slug' => __('certificate-models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'name_admin_bar' => __('Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new' => __('New', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new_item' => __('Add New Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'new_item' => __('New Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'edit_item' => __('Edit Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'view_item' => __('View Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'all_items' => __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'search_items' => __('Search Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Certificate Models:', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found' => __('No certificate models found.', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found_in_trash' => __('No certificate models found in Trash.', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'certificate-models'],
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => ['title', 'custom-fields']
        ];

        register_post_type('rc_certificate_model', $args);
    }
}