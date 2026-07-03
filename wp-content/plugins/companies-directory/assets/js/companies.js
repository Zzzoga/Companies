document.addEventListener('DOMContentLoaded', () => {

    const companies = window.companiesDirectoryData || [];

    const container = document.getElementById('companies-list');
    const countrySelect = document.getElementById('companies-country-filter');

    if (!container || !countrySelect) {
        return;
    }

    if (!companies.length) {
        container.innerHTML = '<p>Компании не найдены.</p>';
        return;
    }

    fillCountries(companies);

    render(companies);

    countrySelect.addEventListener('change', function () {

        const selectedCountry = this.value;

        if (!selectedCountry) {
            render(companies);
            return;
        }

        const filtered = companies.filter(company =>
            company.countries.some(country => country.slug === selectedCountry)
        );

        render(filtered);

    });

    function fillCountries(companies) {

        const countries = [];

        companies.forEach(company => {

            company.countries.forEach(country => {

                if (!countries.find(item => item.slug === country.slug)) {
                    countries.push(country);
                }

            });

        });

        countries.sort((a, b) => a.name.localeCompare(b.name));

        countries.forEach(country => {

            const option = document.createElement('option');

            option.value = country.slug;
            option.textContent = country.name;

            countrySelect.appendChild(option);

        });

    }

    function render(items) {

        container.innerHTML = '';

        if (!items.length) {

            container.innerHTML = '<p>Ничего не найдено.</p>';

            return;

        }

        items.forEach(company => {

            const card = document.createElement('article');

            card.className = 'company-card';

            card.innerHTML = `
                ${
                    company.logo.url
                        ? `<img src="${company.logo.url}" alt="${company.logo.alt}" class="company-logo">`
                        : ''
                }

                <h2>${company.name || company.title}</h2>

                <p>${company.description || ''}</p>

                <p><strong>Страна:</strong> ${company.countries.map(c => c.name).join(', ')}</p>

                <p><strong>Вид деятельности:</strong> ${company.activities.map(a => a.name).join(', ')}</p>

                ${
                    company.website
                        ? `<p><a href="${company.website}" target="_blank" rel="noopener noreferrer">Официальный сайт</a></p>`
                        : ''
                }
            `;

            container.appendChild(card);

        });

    }

});