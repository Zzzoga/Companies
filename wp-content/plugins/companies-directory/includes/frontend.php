<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'companies_directory_enqueue_assets');

function companies_directory_enqueue_assets(): void
{
    if (!is_page_template('page-companies.php')) {
        return;
    }

    wp_enqueue_style(
        'companies-directory',
        COMPANIES_DIRECTORY_URL . 'assets/css/companies.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'companies-directory',
        COMPANIES_DIRECTORY_URL . 'assets/js/companies.js',
        [],
        '1.0.0',
        true
    );
}

add_action('wp_footer', 'companies_directory_print_companies_json');

function companies_directory_print_companies_json(): void
{
    if (!is_page_template('page-companies.php')) {
        return;
    }

    $companies = get_posts([
        'post_type' => 'company',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ]);

    $data = [];

    foreach ($companies as $company) {
        $countries = wp_get_post_terms($company->ID, 'company_country');
        $activities = wp_get_post_terms($company->ID, 'company_activity');

        $logo = get_field('company_logo', $company->ID);

        $data[] = [
            'id' => $company->ID,
            'title' => get_the_title($company->ID),
            'name' => get_field('company_name', $company->ID),
            'description' => get_field('company_description', $company->ID),
            'website' => get_field('company_website', $company->ID),
            'logo' => [
                'url' => $logo['url'] ?? '',
                'alt' => $logo['alt'] ?? '',
            ],
            'countries' => array_map(static function ($term) {
                return [
                    'id' => $term->term_id,
                    'name' => $term->name,
                    'slug' => $term->slug,
                ];
            }, $countries),
            'activities' => array_map(static function ($term) {
                return [
                    'id' => $term->term_id,
                    'name' => $term->name,
                    'slug' => $term->slug,
                ];
            }, $activities),
        ];
    }

    printf(
        '<script>window.companiesDirectoryData = %s;</script>',
        wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    );
}