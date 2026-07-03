<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'companies_directory_register_post_type');

function companies_directory_register_post_type(): void
{
    register_post_type('company', [
        'labels' => [
            'name' => 'Компании',
            'singular_name' => 'Компания',
            'add_new' => 'Добавить компанию',
            'add_new_item' => 'Добавить компанию',
            'edit_item' => 'Редактировать компанию',
            'new_item' => 'Новая компания',
            'view_item' => 'Посмотреть компанию',
            'search_items' => 'Искать компании',
            'not_found' => 'Компании не найдены',
            'not_found_in_trash' => 'В корзине компании не найдены',
            'menu_name' => 'Компании',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title'],
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => false,
    ]);
}