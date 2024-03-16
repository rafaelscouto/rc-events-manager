<?php
/**
 * @package RCEventsManager
 */
namespace RCEventsManager\Classes;

/**
 * Class Deactivate
 * @package RCEventsManager
 */
class Deactivate
{
    /**
     * Plugin deactivation
     */
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}