document.addEventListener('DOMContentLoaded', () => {
  showCategoriesDropdownMenu();
  toggleSideBarNavigation();
  accountCTADropdownMenu();
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
    }, 200);
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
};
const accountCTADropdownMenu = () => {
  const accountCtaDropdown = document.querySelector('#account-cta-dropdown');
  const ctaDropdownBtn = accountCtaDropdown.querySelector(
    '.account-cta--dropdown'
  );
  const chevron = ctaDropdownBtn.querySelector('.chevron');
  const ctaDropdownMenu = accountCtaDropdown.querySelector(
    '.account-cta-wrapper'
  );

  let timeout;

  ctaDropdownBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    chevron.classList.toggle('rotate');
    ctaDropdownMenu.classList.toggle('show-cta-dropdown');
  });

  accountCtaDropdown.addEventListener('mouseenter', () => {
    clearTimeout(timeout);
  });

  accountCtaDropdown.addEventListener('mouseleave', () => {
    timeout = setTimeout(() => {
      if (
        ctaDropdownMenu.classList.contains('show-cta-dropdown') &&
        chevron.classList.contains('rotate')
      ) {
        ctaDropdownMenu.classList.remove('show-cta-dropdown');
        chevron.classList.remove('rotate');
      }
    }, 200);
  });

  ctaDropdownMenu.addEventListener('mouseenter', () => {
    clearTimeout(timeout);
  });

  ctaDropdownMenu.addEventListener('mouseleave', () => {
    timeout.setTimeout(() => {
      if (
        ctaDropdownMenu.classList.contains('show-cta-dropdown') &&
        chevron.classList.contains('rotate')
      ) {
        ctaDropdownMenu.classList.remove('show-cta-dropdown');
        chevron.classList.remove('rotate');
      }
    }, 200);
  });

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
};

const toggleSideBarNavigation = () => {
  const toggleBtn = document.getElementById('sidebarToggle');
  const closeSideNav = document.getElementById('closeSideBar');
  const sidebarNav = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  toggleBtn.addEventListener('click', () => {
    sidebarNav.style.width = '90%';
    overlay.classList.add('show-overlay');
  });

  closeSideNav.addEventListener('click', () => {
    sidebarNav.style.width = '0';
    overlay.classList.remove('show-overlay');
  });

  document.addEventListener('click', (e) => {
    if (!sidebarNav.contains(e.target) && e.target !== toggleBtn) {
      sidebarNav.style.width = '0';
      overlay.classList.remove('show-overlay');
    }
  });
};
