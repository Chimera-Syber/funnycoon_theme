// Popups script

const body = document.querySelector('body');
const lockPadding = document.querySelectorAll(".lock_padding");

const popupLinks = document.querySelectorAll('.popup-link');

let unlock = true;
const timeout = 500;

if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
        const popupLink = popupLinks[index];
        popupLink.addEventListener("click", function (e) {
            const popupName = popupLink.getAttribute('href').replace('#', '');
            const currentPopup = document.getElementById(popupName);
            popupOpen(currentPopup);
            e.preventDefault();
        });
    }
}

const popupCloseIcon = document.querySelectorAll('.close_popup');
if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
        const el = popupCloseIcon[index];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));
            e.preventDefault();
        });
    }
}

function popupOpen(currentPopup) {
    if (currentPopup && unlock) {
        const popupActive = document.querySelector('.popup.open');
        if (popupActive) {
            popupClose(popupActive, false);
        } else {
            bodyLock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener("click", function (e) {
            if (!e.target.closest('.popup_wrapper')) {
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function bodyLock() {
    const lockPaddingValue = window.innerWidth - document.querySelector('.body').offsetWidth + 'px';
    if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
            const el = lockPadding[index];
            el.style.paddingRight = lockPaddingValue;
        }
    }

    body.style.paddingRight = lockPaddingValue;
    body.classList.add('lock');

    unlock = false;
    setTimeout(function () {
        unlock = true;
    }, timeout);
}

function bodyUnLock() {
    setTimeout(function () {

        if (lockPadding.length > 0) {
            for (let index = 0; index < lockPadding.length; index++) {
                const el = lockPadding[index];
                el.style.paddingRight = '0px';
            }
        }

        body.style.paddingRight = '0px';
        body.classList.remove('lock');
    }, timeout);
}

function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
        popupActive.classList.remove('open');
        if (doUnlock) {
            bodyUnLock();
        }
    }
}

document.addEventListener('keydown', function (e) {
    if (e.key === "Escape") {
        const popupActive = document.querySelector('.popup.open');
        popupClose(popupActive);
    }
});

// Mobile menu script (burger)

const burgerBtn = document.querySelector('#mobileMenuBurger');
const mobileMenu = document.querySelector("#mobileMenu");

function mobileMenuToggle() {
    const mobileMenuActive = document.querySelector('.mobile_menu_open');
    if (mobileMenuActive) {
        mobileMenu.classList.remove('mobile_menu_open');
    } else {
        mobileMenu.classList.add('mobile_menu_open');
    }
}

burgerBtn.addEventListener("click", function (e) {
    mobileMenuToggle();
});

const mobileSidebar = document.querySelector('.mobile_sidebar');

mobileSidebar.addEventListener("click", function (e) {
    mobileMenuToggle();
});


// Mobile menu animation 

const mobileMenuHasChilder = document.querySelectorAll('.mobile-menu-item-has-children');

if (mobileMenuHasChilder.length > 0) {

    for (let index = 0; index < mobileMenuHasChilder.length; index++) {
        const el = mobileMenuHasChilder[index];
        el.addEventListener("click", function (e) {
                      

            const child = el.querySelector('.mobile-sub-menu');
            if (child.classList.contains('mobile-sub-menu-open')) {

                const AllOpenElement = document.querySelectorAll('.mobile-sub-menu-open');
                for(let index = 0; index < AllOpenElement.length; index++) {
                    AllOpenElement[index].classList.remove('mobile-sub-menu-open');
                }


            } else {

                const AllOpenElement = document.querySelectorAll('.mobile-sub-menu-open');
                for(let index = 0; index < AllOpenElement.length; index++) {
                    AllOpenElement[index].classList.remove('mobile-sub-menu-open');
                }

                child.classList.add('mobile-sub-menu-open');
            }
            
            
        });
    
    }
}
