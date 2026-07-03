<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'companies_directory_register_taxonomies');

function companies_directory_register_taxonomies(): void
{
    register_taxonomy('company_country', ['company'], [
        'labels' => [
            'name' => 'Страны',
            'singular_name' => 'Страна',
            'menu_name' => 'Страны',
            'all_items' => 'Все страны',
            'edit_item' => 'Редактировать страну',
            'add_new_item' => 'Добавить страну',
        ],
        'public' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => false,
    ]);

    register_taxonomy('company_activity', ['company'], [
        'labels' => [
            'name' => 'Виды деятельности',
            'singular_name' => 'Вид деятельности',
            'menu_name' => 'Виды деятельности',
            'all_items' => 'Все виды деятельности',
            'edit_item' => 'Редактировать вид деятельности',
            'add_new_item' => 'Добавить вид деятельности',
        ],
        'public' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => false,
    ]);
}