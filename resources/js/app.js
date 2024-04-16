import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const searchForm = document.querySelector('#liveSearchForm');
const input = searchForm.querySelector('#searchInput');

input.addEventListener('input', () => {

    let inputValue = input.value;
    console.log(inputValue);
});


