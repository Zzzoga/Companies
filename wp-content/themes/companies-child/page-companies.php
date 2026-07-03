<?php
/**
 * Template Name: Companies Directory
 */

get_header();
?>

<main id="primary" class="site-main companies-page">
    <section class="companies-page__header">
        <h1><?php the_title(); ?></h1>
        <p>Каталог компаний с фильтрацией по стране.</p>
    </section>

    <section class="companies-page__filters">
        <label for="companies-country-filter">Фильтр по стране:</label>

        <select id="companies-country-filter">
            <option value="">Все страны</option>
        </select>
    </section>

    <section
        id="companies-list"
        class="companies-list"
        aria-live="polite"
    ></section>
</main>

<?php
get_footer();