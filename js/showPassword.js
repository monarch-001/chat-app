const passwordField = document.querySelector('.js_input_password_field');
const toggleIcon = document.querySelector('.js_input_password_field + i');

toggleIcon.addEventListener('click', () => {
    if(passwordField.type === 'password') {
        passwordField.type = 'text';
        passwordField.removeAttribute('autocomplete');
        toggleIcon.classList.add('active');
    } else {
        passwordField.type = 'password';
        passwordField.setAttribute('autocomplete', 'off')
        toggleIcon.classList.remove('active');
    }
})
