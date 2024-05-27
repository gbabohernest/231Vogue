/**
 * Handles displaying the dropdown navigation menu on different mouse  & click events
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


    accountCTADropdownMenu();
});


const accountCTADropdownMenu = () => {
    const accountCtaDropdown = document.querySelector('#account-cta-dropdown');
    const ctaDropdownBtn = accountCtaDropdown.querySelector(".account-cta--dropdown");
    const chevron = ctaDropdownBtn.querySelector('.chevron');
    const ctaDropdownMenu = accountCtaDropdown.querySelector('.account-cta-wrapper');

    ctaDropdownBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        chevron.classList.toggle('rotate');
        ctaDropdownMenu.classList.toggle('show-cta-dropdown');
    });


    // hide when clicking outside
    document.addEventListener('click', () => {
        if (ctaDropdownMenu.classList.contains('show-cta-dropdown')) {
            ctaDropdownMenu.classList.remove('show-cta-dropdown');
        }
    });


    ctaDropdownMenu.addEventListener('click', (e) => {
        e.stopPropagation();
    })


}