/**
 * toggle password in the input fields for user to
 * view while typing for easier experience.
 */


document.addEventListener('DOMContentLoaded', () => {
    const passwordInputField = document.querySelector('input[type=password]');
    const icon = document.querySelector('.eye-icon');
    togglePassword(passwordInputField, icon);
})


const togglePassword = (passwordField, iconElement) => {
    const closeEye = iconElement.querySelector('.close-eye');
    const openEye = iconElement.querySelector('.open-eye');


    iconElement.addEventListener('click', () => {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';

            if (!closeEye.classList.contains('hide-eye')) {
                closeEye.classList.toggle('hide-eye');
                openEye.classList.toggle('hide-eye');
            }
        } else if (passwordField.type === 'text') {
            passwordField.type = 'password';

            if (!openEye.classList.contains('hide-eye')) {
                closeEye.classList.toggle('hide-eye');
                openEye.classList.toggle('hide-eye');
            }
        }

    });

}


