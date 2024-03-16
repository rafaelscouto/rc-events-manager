<?php

namespace RcEventsManager\Classes;

/**
 * Class Dashboard
 * @package RcEventsManager
 */
class Dashboard
{
    /**
     * Dashboard constructor.
     */
    public function __construct()
    {
    }

    /**
     * Dashboard page
     */
    public function renderDashboardPage()
    {
        require_once RC_EVENTS_MANAGER_PLUGIN_DIR . 'src/views/admin/page-admin-dashboard.php';
    }
}