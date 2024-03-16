<?php

namespace RcEventsManager\Classes;

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
    private $certificate_models;
    private $settings;

    /**
     * Plugin constructor.
     * @param Dashboard $dashboard
     * @param Events $events
     * @param EventCategories $event_categories
     * @param Participants $participants
     * @param Certificates $certificates
     * @param Institutions $institutions
     * @param CertificateModels $certificate_models
     * @param Settings $settings
     */
    public function __construct()
    {
        $this->dashboard = new Dashboard;
        $this->events = new Events;
        $this->event_categories = new EventCategories;
        $this->participants = new Participants;
        $this->certificates = new Certificates;
        $this->institutions = new Institutions;
        $this->certificate_models = new CertificateModels;
        $this->settings = new Settings;
        $this->run();
    }

    /**
     * Run plugin
     */
    public function run()
    {
        $this->load_text_domain();
        add_action('admin_menu', [$this, 'add_menu_page']);
        add_filter('parent_file', [$this, 'bugfix_menu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_styles_and_scripts_admin']);
    }

    /**
     * Load text domain
     */
    public function load_text_domain()
    {
        load_plugin_textdomain(RC_EVENTS_MANAGER_TEXT_DOMAIN, false, RC_EVENTS_MANAGER_PLUGIN_DIR . '/src/Languages');
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
            __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            'edit.php?post_type=rc_certificate_model',
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

        add_submenu_page(
            RC_EVENTS_MANAGER_TEXT_DOMAIN,
            __('Settings', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            __('Settings', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'manage_options',
            'rc-settings',
            [$this->settings, 'renderSettingsPage']
        );
    }

    /**
     * Bugfix menu for event category
     * @param $parent_file
     * @return string
     */
    public function bugfix_menu($parent_file)
    {
        global $pagenow, $plugin_page, $submenu_file, $current_screen;

        if ($pagenow == 'edit-tags.php' && isset($current_screen->taxonomy) && $current_screen->taxonomy == 'rc_event_category') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit-tags.php?taxonomy=rc_event_category&post_type=rc_events';
        } elseif ($pagenow == 'post-new.php' && isset($current_screen->post_type) && $current_screen->post_type == 'rc_events') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit.php?post_type=rc_events';
        } elseif ($pagenow == 'post-new.php' && isset($current_screen->post_type) && $current_screen->post_type == 'rc_participants') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit.php?post_type=rc_participants';
        } elseif ($pagenow == 'post-new.php' && isset($current_screen->post_type) && $current_screen->post_type == 'rc_certificates') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit.php?post_type=rc_certificates';
        } elseif ($pagenow == 'post-new.php' && isset($current_screen->post_type) && $current_screen->post_type == 'rc_institutions') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit.php?post_type=rc_institutions';
        } elseif ($pagenow == 'post.php' && isset($current_screen->post_type) && $current_screen->post_type == 'rc_institutions') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit.php?post_type=rc_institutions';
        } elseif ($pagenow == 'post-new.php' && isset($current_screen->post_type) && $current_screen->post_type == 'rc_certificate_model') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit.php?post_type=rc_certificate_model';
        } elseif ($pagenow == 'post.php' && isset($current_screen->post_type) && $current_screen->post_type == 'rc_certificate_model') {
            $parent_file = RC_EVENTS_MANAGER_TEXT_DOMAIN;
            $submenu_file = 'edit.php?post_type=rc_certificate_model';
        }

        return $parent_file;
    }                                                

    public function enqueue_styles_and_scripts_admin() {
        wp_enqueue_style('rc-events-manager-admin', RC_EVENTS_MANAGER_PLUGIN_URL . 'src/assets/css/admin/rc-admin-main.css', [], RC_EVENTS_MANAGER_VERSION, 'all');
    }
}