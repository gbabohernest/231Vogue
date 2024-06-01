document.addEventListener('DOMContentLoaded', () => {
    toggleAdminSideBarNav();
    addRecord();
    editRecord()
    closeModal();

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


/**
 * Display the appropriate modal  depending on the modal and operation to be performed
 * @param modalType - The type of modal [product, category, user, etc]
 * @param actionType - The specific action admin wants to perform [create, edit, delete]
 */
const showModal = (modalType, actionType) => {
    //selects a specific modal element based on its class and data attribute type
    const modal = document.querySelector(`.modal.${actionType}-modal[data-modal-type="${modalType}"]`);

    if (modal) {
        modal.style.display = 'block';

        const closeModal = (e) => {
            // close the modal when outside the modal is clicked
            if (e.target === modal || e.target.classList.contains('close-modal-btn')) {
                modal.style.display = 'none';
                modal.removeEventListener('click', closeModal);
            }
        };

        modal.addEventListener('click', closeModal);
    }
};


/**
 * Determine the specific modal to load [product, category, users]
 * when admin wants to perform create operation.
 */

const addRecord = () => {
    document.querySelectorAll('.add-record-btn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            const modalType = e.currentTarget.dataset.modalType;
            showModal(modalType, 'create');
        });
    });
};


/**
 * Determine the specific modal to load [product, category, users]
 * when admin wants to perform edit operation.
 */

const editRecord = () => {
    document.querySelectorAll('.edit-btn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            const modalType = e.currentTarget.dataset.modalType;
            showModal(modalType, 'edit')
        });
    });
}


/**
 * A universal click event to close the modals using (x) btn in the modal.
 */
const closeModal = () => {
    document.querySelectorAll('.close-modal-btn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            const modal = e.currentTarget.closest('.modal');

            if (modal) {
                modal.style.display = 'none';
            }

        });
    });
};

