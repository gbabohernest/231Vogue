document.addEventListener('DOMContentLoaded', () => {
    initializeUserSettingDropdown();
})

const initializeUserSettingDropdown = () => {
    const dropdownButtons = document.querySelectorAll('.show-user-drop-down');
    const profileMenu = document.getElementById('profile-drop');
    const securityMenu = document.getElementById('security-drop')
    const profileChevron  = document.querySelector('.profile-chevron');
    const securityChevron  = document.querySelector('.security-chevron');


    const toggleDropdown = (menu, chevron) => {
        menu.classList.toggle('d-block');
        chevron.classList.toggle('rotateDown');
    };

    dropdownButtons.forEach((btn) => {
        btn.addEventListener('click', (e) => {

            if (e.currentTarget.classList.contains('profile')) {
                toggleDropdown(profileMenu, profileChevron);
            } else if (e.currentTarget.classList.contains('security')) {
                toggleDropdown(securityMenu, securityChevron);
            }
        })
    })


}