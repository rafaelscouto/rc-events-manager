<?php

namespace RcEventsManager\Classes;

use RcEventsManager\Utils\Utils;

/**
 * Class Institutions
 * @package RcEventsManager
 */
class Institutions
{
    /**
     * Institutions constructor.
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_cpt']);
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_filter('post_type_labels_rc_institutions', [$this, 'change_featured_image_title']);
        add_action('save_post', [$this, 'save_meta_box']);
        add_filter('manage_rc_institutions_posts_columns', [$this, 'custom_columns']);
        add_action('manage_rc_institutions_posts_custom_column', [$this, 'custom_columns_data'], 10, 2);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_styles_and_scripts_admin']);
    }

    /**
     * Register custom post type
     */
    public function register_cpt()
    {
        $labels = [
            'name' => __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'singular_name' => __('Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'menu_name' => __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'slug' => __('institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'name_admin_bar' => __('Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new' => __('New', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'add_new_item' => __('Add New Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'new_item' => __('New Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'edit_item' => __('Edit Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'view_item' => __('View Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'all_items' => __('Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'search_items' => __('Search Institutions', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Institutions:', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found' => __('No institutions found.', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'not_found_in_trash' => __('No institutions found in Trash.', RC_EVENTS_MANAGER_TEXT_DOMAIN)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'institutions'],
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => ['title', 'thumbnail']
        ];

        register_post_type('rc_institutions', $args);
    }

    /**
     * Add meta box
     */
    public function add_meta_box()
    {
        add_meta_box(
            'rc_institutions_meta_box',
            __('Institution Details', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            [$this, 'render_meta_box'],
            'rc_institutions',
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
        $institution_default_theme = get_post_meta($post->ID, 'rc_institution_default_theme', true);
        $institution_logo = self::logo_thumbnail($post->ID);
        $institution_register_type = get_post_meta($post->ID, 'rc_institution_register_type', true);
        $institution_register_types = [
            ['code' => 'CNPJ', 'title' => __('CNPJ - Brazil', RC_EVENTS_MANAGER_TEXT_DOMAIN)],
            ['code' => 'EIN', 'title' => __('EIN - United States', RC_EVENTS_MANAGER_TEXT_DOMAIN)],
            ['code' => 'OTHER', 'title' => __('Other', RC_EVENTS_MANAGER_TEXT_DOMAIN)]
        ];
        $institution_registration = get_post_meta($post->ID, 'rc_institution_registration', true);
        $institution_email = get_post_meta($post->ID, 'rc_institution_email', true);
        $institution_phone = get_post_meta($post->ID, 'rc_institution_phone', true);
        $institution_address = get_post_meta($post->ID, 'rc_institution_address', true);
        $institution_address_complement = get_post_meta($post->ID, 'rc_institution_address_complement', true);
        $institution_address_number = get_post_meta($post->ID, 'rc_institution_address_number', true);
        $institution_address_neighborhood = get_post_meta($post->ID, 'rc_institution_neighborhood', true);
        $institution_address_city = get_post_meta($post->ID, 'rc_institution_city', true);
        $institution_address_state = get_post_meta($post->ID, 'rc_institution_state', true);
        $institution_address_zip = get_post_meta($post->ID, 'rc_institution_zip_code', true);
        $institution_address_country = get_post_meta($post->ID, 'rc_institution_country', true);
        $institution_website = get_post_meta($post->ID, 'rc_institution_website', true);
        $institution_director_name = get_post_meta($post->ID, 'rc_institution_director_name', true);
        $institution_director_position = get_post_meta($post->ID, 'rc_institution_director_position', true);

        wp_nonce_field('rc_institutions_meta_box', 'rc_institutions_meta_box_nonce');

        require_once RC_EVENTS_MANAGER_PLUGIN_DIR . '/src/views/admin/meta-box-institutions.php';
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

        if (!Utils::check_nonce('rc_institutions_meta_box_nonce', 'rc_institutions_meta_box')) {
            return false;
        }

        if (isset($_POST['rc_institution_register_type'])) {
            update_post_meta($post_id, 'rc_institution_register_type', $_POST['rc_institution_register_type']);
        }

        if (isset($_POST['rc_institution_registration'])) {
            // Remove all characters except numbers and letters
            $institution_registration = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['rc_institution_registration']);
            update_post_meta($post_id, 'rc_institution_registration', $institution_registration);
        }

        if (isset($_POST['rc_institution_email'])) {
            // Check if the email is valid
            if (!filter_var($_POST['rc_institution_email'], FILTER_VALIDATE_EMAIL)) {
                return false;
            }

            update_post_meta($post_id, 'rc_institution_email', $_POST['rc_institution_email']);
        }

        if (isset($_POST['rc_institution_phone'])) {
            $institution_phone = preg_replace('/\D/', '', $_POST['rc_institution_phone']);
            update_post_meta($post_id, 'rc_institution_phone', $institution_phone);
        }

        if (isset($_POST['rc_institution_address'])) {
            update_post_meta($post_id, 'rc_institution_address', $_POST['rc_institution_address']);
        }

        if (isset($_POST['rc_institution_address_complement'])) {
            update_post_meta($post_id, 'rc_institution_address_complement', $_POST['rc_institution_address_complement']);
        }

        if (isset($_POST['rc_institution_address_number'])) {
            update_post_meta($post_id, 'rc_institution_address_number', $_POST['rc_institution_address_number']);
        }

        if (isset($_POST['rc_institution_neighborhood'])) {
            update_post_meta($post_id, 'rc_institution_neighborhood', $_POST['rc_institution_neighborhood']);
        }

        if (isset($_POST['rc_institution_city'])) {
            update_post_meta($post_id, 'rc_institution_city', $_POST['rc_institution_city']);
        }

        if (isset($_POST['rc_institution_state'])) {
            update_post_meta($post_id, 'rc_institution_state', $_POST['rc_institution_state']);
        }

        if (isset($_POST['rc_institution_zip_code'])) {
            update_post_meta($post_id, 'rc_institution_zip_code', $_POST['rc_institution_zip_code']);
        }

        if (isset($_POST['rc_institution_country'])) {
            update_post_meta($post_id, 'rc_institution_country', $_POST['rc_institution_country']);
        }

        if (isset($_POST['rc_institution_website'])) {
            update_post_meta($post_id, 'rc_institution_website', $_POST['rc_institution_website']);
        }

        if (isset($_POST['rc_institution_director_name'])) {
            update_post_meta($post_id, 'rc_institution_director_name', $_POST['rc_institution_director_name']);
        }

        if (isset($_POST['rc_institution_director_position'])) {
            update_post_meta($post_id, 'rc_institution_director_position', $_POST['rc_institution_director_position']);
        }

        return true;
    }

    /**
     * Get institutions
     * @return array
     */
    public static function get_institutions()
    {
        $args = [
            'post_type' => 'rc_institutions',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
        ];

        $institutions = get_posts($args);

        return $institutions;
    }

    /**
     * Change featured image title
     * @param $labels
     * @return mixed
     */
    public function change_featured_image_title($labels)
    {
        return Utils::change_featured_image_title($labels, 'Institution Logo');
    }

    /**
     * Logo thumbnail
     * @param $post_id
     * @return string
     */
    public static function logo_thumbnail($post_id)
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
            'rc_institution_logo' => __('Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'title' => __('Name', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'rc_institution_registration' => __('Registration Number', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'rc_institution_email' => __('Email', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'rc_institution_phone' => __('Phone', RC_EVENTS_MANAGER_TEXT_DOMAIN),
            'date' => $columns['date']
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
            case 'rc_institution_logo':
                echo '<div class="rc_post_image_column_data rc_circle"><img src="' . self::logo_thumbnail($post_id) . '" alt="Institution Logo"></div>';
                break;
            case 'rc_institution_registration':
                echo get_post_meta($post_id, 'rc_institution_registration', true);
                break;
            case 'rc_institution_email':
                echo get_post_meta($post_id, 'rc_institution_email', true);
                break;
            case 'rc_institution_phone':
                echo get_post_meta($post_id, 'rc_institution_phone', true);
                break;
        }
    }

    /**
     * Enqueue scripts only for Institutions
     * @param $hook
     */
    public function enqueue_styles_and_scripts_admin($hook)
    {
        if ('post-new.php' === $hook || 'post.php' === $hook) {
            global $post_type;

            if ('rc_institutions' === $post_type) {
                wp_enqueue_media();
                wp_enqueue_script('rc-events-manager-admin-institutions', RC_EVENTS_MANAGER_PLUGIN_URL . 'src/assets/js/admin/rc-admin-institutions.js', [], RC_EVENTS_MANAGER_VERSION, true);
            }
        }
    }
}