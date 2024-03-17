<?php

namespace RcEventsManager\Classes;

use RcEventsManager\Utils\Utils;
use RcEventsManager\Classes\Institutions;

/**
 * Class CertificateModels
 * @package RcEventsManager
 */
class CertificateModels
{
    private $models;

    /**
     * CertificateModels constructor.
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_cpt']);
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_filter('post_type_labels_rc_certificate_model', [$this, 'change_featured_image_title']);
        add_action('save_post_rc_certificate_model', [$this, 'save_meta_box']);
        add_filter('manage_rc_certificate_model_posts_columns', [$this, 'custom_columns']);
        add_action('manage_rc_certificate_model_posts_custom_column', [$this, 'custom_columns_data'], 10, 2);
    }

    /**
     * Register custom post type
     */
    public function register_cpt()
    {
        $labels = [
            'name' => __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'singular_name' => __('Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'menu_name' => __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'slug' => __('certificate-models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'name_admin_bar' => __('Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new' => __('New', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new_item' => __('Add New Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'new_item' => __('New Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'edit_item' => __('Edit Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'view_item' => __('View Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'all_items' => __('Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'search_items' => __('Search Certificate Models', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Certificate Models:', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found' => __('No certificate models found.', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found_in_trash' => __('No certificate models found in Trash.', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'certificate-models'],
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => ['title', 'thumbnail']
        ];

        register_post_type('rc_certificate_model', $args);
    }

    /**
     * Add meta box
     */
    public function add_meta_box()
    {
        add_meta_box(
            'rc_certificate_model_meta_box',
            __('Certificate Model', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            [$this, 'render_meta_box'],
            'rc_certificate_model',
            'normal',
            'high'
        );
    }

    /**
     * Render meta box
     * @param $post
     */
    public function render_meta_box($post)
    {
        $associated_institution = get_post_meta($post->ID, 'rc_associated_institution', true);
        $institutions = Institutions::get_institutions();

        wp_nonce_field('rc_certificate_model_meta_box', 'rc_certificate_model_meta_box_nonce');

        require_once RC_EVENTS_MANAGER_PLUGIN_DIR . '/src/views/admin/meta-box-certificate-models.php';
    }

    /**
     * Save meta box
     * @param $post_id
     * @return bool
     */
    public function save_meta_box($post_id)
    {
        if (!Utils::check_user_can_save($post_id)) {
            return false;
        }

        if (isset($_POST['rc_associated_institution'])) {
            update_post_meta($post_id, 'rc_associated_institution', $_POST['rc_associated_institution']);
        }

        return true;
    }

    /**
     * Change featured image title
     * @param $labels
     * @return mixed
     */
    public function change_featured_image_title($labels)
    {
        return Utils::change_featured_image_title($labels, 'Certificate background Image Model');
    }

    /**
     * Certificate model image
     * @param $post_id
     * @return string
     */
    public static function certificate_model_image($post_id)
    {
        return Utils::get_post_thumbnail($post_id, 'thumbnail');
    }

    /**
     * Custom columns
     * @param $columns
     * @return mixed
     */
    public function custom_columns($columns)
    {
        $columns = [
            'cb' => $columns['cb'],
            'rc_certificate_model_image' => __('Background Image', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'title' => __('Title', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'rc_associated_institution' => __('Associated Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'date' => __('Date', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        return $columns;
    }

    /**
     * Custom columns data
     * @param $column
     * @param $post_id
     * @return void
     */
    public function custom_columns_data($column, $post_id)
    {
        switch ($column) {
            case 'rc_certificate_model_image':
                echo '<div class="rc_post_image_column_data"><img src="' . self::certificate_model_image($post_id) . '" alt="Certificate model image"></div>';
                break;
            case 'rc_associated_institution':
                if (get_post_meta($post_id, 'rc_associated_institution', true)) {
                    echo get_the_title(get_post_meta($post_id, 'rc_associated_institution', true));
                } else {
                    echo __('No institution associated', RC_EVENTS_MANAGER_TEXT_DOMAIN);
                }
                break;
        }
    }
}