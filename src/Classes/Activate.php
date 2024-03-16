<?php
/**
 * @package RCEventsManager
 */
namespace RCEventsManager\Classes;

/**
 * Class Activate
 * @package RCEventsManager
 */
class Activate
{
    /**
     * Plugin activation
     */
    public static function activate()
    {
        flush_rewrite_rules();
    }
}