const searchBar = document.querySelector('.js_search_input');
const searchButton = document.querySelector('.js_search_input + button');
const userListUl = document.querySelector('.user_lists_container ul'); 

searchButton.addEventListener('click', () => {
    searchBar.classList.toggle('active');
    searchButton.classList.toggle('active');
    searchBar.focus();
    searchBar.value = '';
});

searchBar.addEventListener('keydown', () => {
    let searchTerm = searchBar.value;
    if (searchTerm !== '') {
        searchBar.classList.add('currentActive');
    } else if(searchTerm === '') {
        searchBar.classList.remove('currentActive');
    }
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/search.php', true);
    xhr.addEventListener('load', () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data === 'No user found related to your search term') {
                    userListUl.classList.add('no_user_sty');
                } else {
                    userListUl.classList.remove('no_user_sty');
                }
                userListUl.innerHTML = data;
            };
        };

    });

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('searchTerm=' + searchTerm);

});

setInterval(() => {

    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/users.php', true);
    xhr.addEventListener('load', () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(searchBar.value === '') {
                    searchBar.classList.remove('currentActive')
                }
                if (!searchBar.classList.contains('currentActive')) {
                    userListUl.innerHTML = data;
                }
            };
        };

    });

    xhr.send();

}, 500);