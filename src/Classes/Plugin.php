<?php

namespace RcEventsManager\Classes;

use RcEventsManager\Classes\Dashboard;
use RcEventsManager\Classes\Events;
use RcEventsManager\Classes\EventCategories;
use RcEventsManager\Classes\Participants;
use RcEventsManager\Classes\Certificates;
use RcEventsManager\Classes\Institutions;

/**
 * Class Plugin
 * @package RcEventsManager
 */
class Plugin
{
    private $dashboard;
    private $events;
    private $event_categories;
    private $participants;
    private $certificates;
    private $institutions;

    /**
     * Plugin constructor.
     */
    public function __construct()
    {
        $this->dashboard = new Dashboard();
        $this->events = new Events();
        $this->event_categories = new EventCategories();
        $this->participants = new Participants();
        $this->certificates = new Certificates();
        $this->institutions = new Institutions();

        $this->load_text_domain();
        add_action('admin_menu', [$this, 'add_menu_page']);
        add_filter('parent_file', [$this, 'bugfix_menu_for_category']);
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

        add_submenu_page(
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            __('Event Categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Event Categories', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            'edit-tags.php?taxonomy=rc_event_category&post_type=rc_events',
            null
        );

        add_submenu_page(
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            __('Participants', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Participants', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            'edit.php?post_type=rc_participants',
            null
        );

        add_submenu_page(
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            __('Certificates', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Certificates', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            'edit.php?post_type=rc_certificates',
            null
        );

        add_submenu_page(
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            'edit.php?post_type=rc_institutions',
            null
        );
    }

    /**
     * Bugfix menu for event category
     * @param $parent_file
     * @return string
     */
    public function bugfix_menu_for_category($parent_file)
    {
        global $pagenow, $plugin_page, $submenu_file, $current_screen;

        if ($pagenow == 'edit-tags.php' && isset($current_screen->taxonomy) && $current_screen->taxonomy == 'rc_event_category') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit-tags.php?taxonomy=rc_event_category&post_type=rc_events';
        }

        return $parent_file;
    }
}