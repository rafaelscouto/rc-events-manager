<?php
/**
 * Plugin Name: RC Events Manager
 * Plugin URI: https://github.com/rafaelscouto/rc-events-manager
 * Description: A complete solution for managing events and issuing certificates in WordPress.
 * Author: Rafael Couto
 * Author URI: https://rafaelscouto.com.br
 * Version: 1.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: rc-events-manager
 * Domain Path: /src/languages
 */

namespace RCEventsManager;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// if exists, require the Composer autoload file
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use \RcEventsManager\Classes\Activate;
use \RcEventsManager\Classes\Deactivate;
use \RcEventsManager\Classes\Plugin;

/**
 * Class RcEventsManager
 * @package RcEventsManager
 */
class RcEventsManager
{
    private $version = '1.0.0';
    private $text_domain = 'rc-events-manager';
    
    /**
     * RcEventsManager constructor.
     * Load plugin
     */
    public function __construct()
    {
        $this->activate();
        $this->deactivate();
        $this->define_constants();
        $this->run();
    }

    /**
     * Plugin activation
     * @return void
     */
    public function activate()
    {
        register_activation_hook(__FILE__, [Activate::class, 'activate']);
    }

    /**
     * Plugin deactivation
     * @return void
     */
    public function deactivate()
    {
        register_deactivation_hook(__FILE__, [Deactivate::class, 'deactivate']);
    }

    /**
     * Define constants
     */
    private function define_constants()
    {
        define('RC_EVENTS_MANAGER_VERSION', $this->version);
        define('RC_EVENTS_MANAGER_TEXT_DOMAIN', $this->text_domain);
        define('RC_EVENTS_MANAGER_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('RC_EVENTS_MANAGER_PLUGIN_URL', plugin_dir_url(__FILE__));
    }

    /**
     * Run plugin
     */
    public function run()
    {
        $plugin = new Plugin();
        $plugin->run();
    }
}

new RcEventsManager();
