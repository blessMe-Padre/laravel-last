import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const searchForm = document.querySelector('#liveSearchForm');
const input = searchForm.querySelector('#searchInput');
const result = document.querySelector('#searchResults');

if (searchForm) {
    let timer;
    input.addEventListener('input', () => {
        let inputValue = input.value;
        clearTimeout(timer);

        timer = setTimeout(() => {
            requestToController(inputValue);
        }, 1000);
    });
}

function requestToController(inputValue) {

    let formData = new FormData();
    formData.append('s2', inputValue);

    fetch(searchForm.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        }
    })
        .then(response => response.json())
        .then(data => {
            result.innerHTML = '';
            console.log(data);
            if (data.users.length > 0) {
                data.users.forEach(user => {
                    result.innerHTML += `Имя пользователя: ${user.name} <br>`;
                    if (user.length > 0) {
                        user.reviews.forEach(review => {
                            result.innerHTML += `отзыв: ${review.message} <br>`;
                        });
                    }
                });
            }
            else {
                result.innerHTML = 'Пользователя не найдено';
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}



