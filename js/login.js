const form = document.querySelector('.js_login_form');
const proceedButton = document.querySelector('.js_login_form .js_signup_btn input');
const errorText = document.querySelector('.js_error_text');

form.addEventListener('submit', (e) => {
    e.preventDefault();
});

proceedButton.addEventListener('click', () => {
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/login.php', true);
    xhr.addEventListener('load', () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (data == 'success') {
                    errorText.classList.add('success');
                    errorText.classList.remove('none');
                    errorText.textContent = 'success';
                    location.href = 'users.php';
                } else {
                    errorText.textContent = data;
                    errorText.classList.remove('success');
                    errorText.classList.remove('none');
                };
            };
        };

    });

    let formData = new FormData(form);

    xhr.send(formData);

});