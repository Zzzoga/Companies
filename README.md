# Companies Directory Test Task

## Описание

Тестовое задание выполнено на WordPress согласно ТЗ.

### Реализовано

- кастомный тип записи **Компании**
- отключены публичные страницы CPT
- две кастомные таксономии:
  - Страна
  - Вид деятельности
- поля реализованы через Advanced Custom Fields:
  - Название
  - Логотип
  - Описание
  - Ссылка на официальный сайт
- собственный шаблон страницы в дочерней теме
- вывод компаний осуществляется через JSON, который добавляется в `wp_footer`
- список компаний формируется на JavaScript
- фильтрация по стране
- весь backend-код расположен в отдельном плагине

## Структура проекта

```
wp-content/
    plugins/
        companies-directory/
    themes/
        companies-child/
```

## Линтеры

PHP

```bash
composer install
composer run lint:php
```

JavaScript

```bash
npm install
npm run lint
```

## Требования

- PHP 8.1+
- WordPress 6.x
- Advanced Custom Fields