document.addEventListener('DOMContentLoaded', () => {

    showCategoriesDropdownMenu();
    accountCTADropdownMenu();
    toggleSideBarNavigation();
    bannerSlideShow(models, backgrounds);
});


/**
 * Handles displaying the dropdown navigation menu on different mouse  & click events
 */

const showCategoriesDropdownMenu = () => {
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

}
const accountCTADropdownMenu = () => {
    const accountCtaDropdown = document.querySelector('#account-cta-dropdown');
    const ctaDropdownBtn = accountCtaDropdown.querySelector(".account-cta--dropdown");
    const chevron = ctaDropdownBtn.querySelector('.chevron');
    const ctaDropdownMenu = accountCtaDropdown.querySelector('.account-cta-wrapper');

    let timeout;

    ctaDropdownBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        chevron.classList.toggle('rotate');
        ctaDropdownMenu.classList.toggle('show-cta-dropdown');
    });

    accountCtaDropdown.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
    })

    accountCtaDropdown.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            if (ctaDropdownMenu.classList.contains('show-cta-dropdown') && chevron.classList.contains('rotate')) {
                ctaDropdownMenu.classList.remove('show-cta-dropdown');
                chevron.classList.remove('rotate');
            }
        }, 200)
    });


    ctaDropdownMenu.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
    })

    ctaDropdownMenu.addEventListener('mouseleave', () => {
        timeout.setTimeout(() => {
            if (ctaDropdownMenu.classList.contains('show-cta-dropdown') && chevron.classList.contains('rotate')) {
                ctaDropdownMenu.classList.remove('show-cta-dropdown');
                chevron.classList.remove('rotate');
            }
        }, 200)
    })

    // hide when clicking outside
    document.addEventListener('click', () => {
        if (ctaDropdownMenu.classList.contains('show-cta-dropdown')) {
            ctaDropdownMenu.classList.remove('show-cta-dropdown');
            chevron.classList.remove('rotate');
        }
    });


    ctaDropdownMenu.addEventListener('click', (e) => {
        e.stopPropagation();
    });

}


const toggleSideBarNavigation = () => {

    const toggleBtn = document.getElementById('sidebarToggle');
    const closeSideNav = document.getElementById('closeSideBar');
    const sidebarNav = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');


    toggleBtn.addEventListener('click', () => {

        sidebarNav.style.width = "90%";
        overlay.classList.add('show-overlay');
    });


    closeSideNav.addEventListener('click', () => {
        sidebarNav.style.width = "0";
        overlay.classList.remove('show-overlay');
    });

    document.addEventListener('click', (e) => {
        if (!sidebarNav.contains(e.target) && e.target !== toggleBtn) {
            sidebarNav.style.width = "0";
            overlay.classList.remove('show-overlay');
        }
    })
}


/*Array of objects that stored information about our models */

const models = [
    {
        id: 1,
        name: 'model-1',
        img: "/assets/images/models/model-1.png",
    },

    {
        id: 2,
        name: 'model-2',
        img: "/assets/images/models/model-2.png",
    },

    {
        id: 3,
        name: 'model-3',
        img: "/assets/images/models/model-3.png",
    },

    {
        id: 4,
        name: 'model-4',
        img: "/assets/images/models/model-4.png",
    }
];

/* Backgrounds colors for implementing slideshow on the banner*/
const backgrounds = [
    '#ffffff linear-gradient(135deg, #484349, #ff0000, #4d86be, #ffffff, #0000ff ',
    '#ffffff linear-gradient(135deg, #787878, #484349, #ff0000, #4d86be, #e74739, #ffffff, #0000ff, #273469)',
    'gray linear-gradient(135deg, #273469, #273469, #4d86be, #ff0000, #484349, #FFFAFF, #000000, #e74739, #ffffff, #0000ff)',
    '#4d86be linear-gradient(135deg, #FFFAFF, #273469, gray, #4d86be, #ff0000, #e74739, #FFFAFF, #e74739)',
    // '#f5f5f5 linear-gradient(135deg, #ffffff, #4d86be, #FFfFAFF, #484349)'
]


/* Handles the banner slideshow, updates background-color, change model images*/
const bannerSlideShow = (models, backgrounds) => {
    const prev = document.querySelector('.banner-prev');
    const next = document.querySelector('.banner-next');
    const img = document.querySelector('.model-pic');
    const banner = document.querySelector('.banner');

    let currentSlideShow = Math.floor(Math.random() * models.length);

    const updateSlideShow = () => {
        const model = models[currentSlideShow];
        img.src = model.img;
        img.alt = model.name;
        banner.style.background = backgrounds[Math.floor(Math.random() * backgrounds.length)];
    };

    const nextSlide = () => {
        currentSlideShow = (currentSlideShow + 1) % models.length;
        updateSlideShow();
    };

    const prevSlide = () => {
        currentSlideShow = (currentSlideShow - 1 + models.length) % models.length;
        updateSlideShow();
    };

    updateSlideShow();

    prev.addEventListener('click', prevSlide);
    next.addEventListener('click', nextSlide);

    setInterval(nextSlide, 3000);
};