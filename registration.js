'use strict';

(function () {
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');
    const submit = document.querySelector('.sc-dEoRIm');

    function fillCheck() {
        if (email.length !== 0) {
            if (password.length !== 0) {
                submit.setAttribute("href", "payment.html")
            }
        }
    }

    email.addEventListener('change', fillCheck);
    password.addEventListener('change', fillCheck);
})();
