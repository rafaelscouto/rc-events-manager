<?php

namespace RcEventsManager\Classes;

use RcEventsManager\Classes\Events;

/**
 * Class EventCategories
 * @package RcEventsManager
 */
class EventCategories
{
    private $events;

    /**
     * EventCategories constructor.
     */
    public function __construct()
    {
        $this->events = new Events();
        add_action('init', [$this, 'register_taxonomy']);
    }

    /**
     * Register custom taxonomy
     */
    public function register_taxonomy()
    {
        $labels = [
            'name' => __('Event Categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'singular_name' => __('Event Category', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'menu_name' => __('Event Categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'all_items' => __('All Event Categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'edit_item' => __('Edit Event Category', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'view_item' => __('View Event Category', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'update_item' => __('Update Event Category', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new_item' => __('Add New Event Category', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'new_item_name' => __('New Event Category Name', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item' => __('Parent Event Category', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Event Category:', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'search_items' => __('Search Event Categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'popular_items' => __('Popular Event Categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'separate_items_with_commas' => __('Separate event categories with commas', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_or_remove_items' => __('Add or remove event categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'choose_from_most_used' => __('Choose from the most used event categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found' => __('No event categories found.', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'rewrite' => ['slug' => 'event-category']
        ];

        register_taxonomy('rc_event_category', 'rc_events', $args);
    }
}