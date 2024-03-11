<?php

namespace RcEventsManager\Classes;

use RcEventsManager\Classes\Dashboard;
use RcEventsManager\Classes\Events;

/**
 * Class Plugin
 * @package RcEventsManager
 */
class Plugin
{
    private $dashboard;
    private $events;

    /**
     * Plugin constructor.
     */
    public function __construct()
    {
        $this->dashboard = new Dashboard();
        $this->events = new Events();

        $this->load_text_domain();
        add_action('admin_menu', [$this, 'add_menu_page']);
    }

    /**
     * Load text domain
     */
    public function load_text_domain()
    {
        load_plugin_textdomain(RC_EVENTS_MANAGER_TEXT_DOMAIN, false, RC_EVENTS_MANAGER_PLUGIN_DIR . '/src/languages');
    }

    /**
     * Add menu page
     */
    public function add_menu_page()
    {
        add_menu_page(
            __('Events Manager', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Events Manager', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            [],
            'dashicons-calendar-alt',
            6
        );

        add_submenu_page(
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            __('Dashboard', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Dashboard', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            [$this->dashboard, 'renderDashboardPage']
        );

        add_submenu_page(
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            __('Events', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Events', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            'edit.php?post_type=rc_events',
            null
        );
    }
}