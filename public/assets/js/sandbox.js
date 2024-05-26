/**
 * Handles displaying the dropdown navigation menu on different mouse events
 */


document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.querySelector('#dropdown');
    const dropdownMenu = dropdown.querySelector('#dropdown-menu');
    const chevron = dropdown.querySelector('.chevron');

    let timeout;

    dropdown.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        dropdownMenu.classList.add('show');
        chevron.classList.add('rotate');
    });


    dropdown.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            dropdownMenu.classList.remove('show');
            chevron.classList.remove('rotate');
        }, 200)

    });

    dropdownMenu.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
    });

    dropdownMenu.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            dropdownMenu.classList.remove('show');
            chevron.classList.remove('rotate');
        }, 200);
    });

});