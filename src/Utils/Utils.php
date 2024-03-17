<?php

namespace RcEventsManager\Utils;

/**
 * Class Utils
 * @package RcEventsManager
 */
class Utils
{
    /**
     * Check user can save
     * @param $post_id
     * @return bool
     */
    public static function check_user_can_save($post_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return false;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return false;
        }

        return true;
    }

    /**
     * Check the nonce
     * @param $nonce
     * @param $action
     * @return bool
     */
    public static function check_nonce($nonce, $action) {
        if(!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $action)) {
            return false;
        }
        
        return true;
    }

    /**
     * Change featured image title
     * @param $labels
     * @param $postType
     * @return mixed
     */
    public static function change_featured_image_title($labels, $postType) {
        $labels->featured_image = __('' . $postType, RC_EVENTS_MANAGER_TEXT_DOMAIN);
        $labels->set_featured_image = __('Set ' . $postType, RC_EVENTS_MANAGER_TEXT_DOMAIN);
        $labels->remove_featured_image = __('Remove ' . $postType, RC_EVENTS_MANAGER_TEXT_DOMAIN);
        $labels->use_featured_image = __('Use as ' . $postType, RC_EVENTS_MANAGER_TEXT_DOMAIN);

        return $labels;
    }

    /**
     * Get the post thumbnail
     * @param $post_id
     * @param string $size
     * @return string
     */
    public static function get_post_thumbnail($post_id, $size = 'full') {
        if(has_post_thumbnail($post_id)) {
            $thumbnail_id = get_post_thumbnail_id($post_id);
            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, $size, true);
            return $thumbnail_url[0];
        } else {
            return RC_EVENTS_MANAGER_PLUGIN_URL . 'src/assets/images/no-image.png';
        }
    }
}