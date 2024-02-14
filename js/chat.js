// console.log(PushSubscription());
const form = document.querySelector('.js_chat_app_form');
const inputField = document.querySelector('.js_chat_app_form .messaging_input')
const sendBtn = document.querySelector('.js_chat_app_form button');
const chatArea = document.querySelector('.js_chat_area');

form.addEventListener('submit', (e) => {
    e.preventDefault();
});

sendBtn.addEventListener('click', () => {
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/insertChat.php', true);
    xhr.addEventListener('load', () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                inputField.value = '';
                scrollToBottom();
            };
        };

    });

    let formData = new FormData(form);

    xhr.send(formData);

});

chatArea.addEventListener('mouseenter', () => {
    chatArea.classList.add('onScrolling');
});

chatArea.addEventListener('mouseleave', () => {
    chatArea.classList.remove('onScrolling');
});

setInterval(() => {

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/getChat.php', true);
    xhr.addEventListener('load', () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatArea.innerHTML = data;
                if (!chatArea.classList.contains('onScrolling')) {
                    scrollToBottom();
                }
            };
        };

    });

    let formData = new FormData(form);

    xhr.send(formData);

}, 500);

function scrollToBottom() {
    chatArea.scrollTop = chatArea.scrollHeight;
}