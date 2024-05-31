document.addEventListener('DOMContentLoaded', () => {
    toggleAdminSideBarNav()
})


const toggleAdminSideBarNav = () => {
    const openSideBarBtn = document.querySelector('.admin-toggle-open');
    const closeSideBarBtn = document.querySelector('.admin-toggle-close');
    const sideBar = document.querySelector('.admin__container--sidebar');
    const adminMainContent = document.querySelector('.admin__container--main-content');

    openSideBarBtn.addEventListener('click', () => {

        if (closeSideBarBtn.classList.contains('hide-admin-element')) {
            closeSideBarBtn.classList.remove('hide-admin-element');
        }

        if (sideBar.classList.contains('hide-admin-sidebar') && !adminMainContent.classList.contains('hide-admin-element')) {
            adminMainContent.classList.add('hide-admin-element');
            sideBar.classList.remove('hide-admin-sidebar');
            sideBar.style.flexGrow = '1';
        }

        openSideBarBtn.classList.add('hide-admin-element');
    });

    closeSideBarBtn.addEventListener('click', () => {

        if (openSideBarBtn.classList.contains('hide-admin-element')) {
            openSideBarBtn.classList.toggle('hide-admin-element');
        }

        if (!sideBar.classList.contains('hide-admin-sidebar') && adminMainContent.classList.contains('hide-admin-element')) {
            adminMainContent.classList.toggle('hide-admin-element');
            sideBar.classList.toggle('hide-admin-sidebar');
            sideBar.style.flexGrow = '0';

        }

        closeSideBarBtn.classList.toggle('hide-admin-element');
    });
};
