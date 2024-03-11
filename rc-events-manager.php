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

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

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
        $this->define_constants();
        $this->run();
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
    }
}

// Start plugin
new RcEventsManager();
