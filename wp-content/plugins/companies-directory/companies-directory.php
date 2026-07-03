<?php
/**
 * Plugin Name: Companies Directory
 * Description: Custom companies directory functionality for the test task.
 * Version: 1.0.0
 * Author: The Fayzullin
 * Text Domain: companies-directory
 */

if (!defined('ABSPATH')) {
    exit;
}

define('COMPANIES_DIRECTORY_PATH', plugin_dir_path(__FILE__));
define('COMPANIES_DIRECTORY_URL', plugin_dir_url(__FILE__));

require_once COMPANIES_DIRECTORY_PATH . 'includes/post-types.php';
require_once COMPANIES_DIRECTORY_PATH . 'includes/taxonomies.php';
require_once COMPANIES_DIRECTORY_PATH . 'includes/acf-fields.php';
require_once COMPANIES_DIRECTORY_PATH . 'includes/frontend.php';