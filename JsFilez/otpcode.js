document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.otp-card-inputs input');
    const button = document.querySelector('.otp-card button');

    inputs.forEach((input, index) => {
        input.addEventListener('keyup', (e) => {
            const currentElement = e.target;
            const nextElement = input.nextElementSibling;
            const prevElement = input.previousElementSibling;
            const lastInputStatus = 0;
            
            if (prevElement && e.keyCode === 8 && !currentElement.value) {
                prevElement.focus();
                prevElement.value = '';
                button.setAttribute('disabled', true);
            } else {
                const reg = /^[0-9]+$/;
                if (!reg.test(currentElement.value)) {
                    currentElement.value = currentElement.value.replace(/\D/g, '');
                } else if (currentElement.value && nextElement) {
                    nextElement.focus();
                } else if (currentElement.value && !nextElement) {
                    button.removeAttribute('disabled');
                }
            }
        });
    });
});
