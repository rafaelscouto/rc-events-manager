<?php

namespace RcEventsManager\Classes;

/**
 * Class Settings
 * @package RcEventsManager
 */
class Settings
{
    private $settings;

    /**
     * Settings constructor.
     */
    public function __construct()
    {
        $this->settings = get_option('rc_events_manager_settings');
    }

    /**
     * Get settings
     * @return mixed
     */
    public function get_settings()
    {
        return $this->settings;
    }
    
    /**
     * Settings page
     */
    public function renderSettingsPage()
    {
        require_once RC_EVENTS_MANAGER_PLUGIN_DIR . '/src/views/admin/page-admin-settings.php';
    }
}