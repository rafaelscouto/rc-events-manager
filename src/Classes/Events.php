<?php

namespace RcEventsManager\Classes;

/**
 * Class Events
 * @package RcEventsManager
 */
class Events
{
    /**
     * Events constructor.
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
            'name' => __('Events', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'singular_name' => __('Event', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'menu_name' => __('Events', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'slug' => __('events', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'name_admin_bar' => __('Event', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new' => __('New', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new_item' => __('Add New Event', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'new_item' => __('New Event', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'edit_item' => __('Edit Event', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'view_item' => __('View Event', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'all_items' => __('Events', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'search_items' => __('Search Events', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Events:', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found' => __('No events found.', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found_in_trash' => __('No events found in Trash.', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'events'],
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields']
        ];

        register_post_type('rc_events', $args);
    }
}