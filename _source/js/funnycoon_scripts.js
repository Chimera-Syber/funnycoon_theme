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
        const mobileMenuActive = document.querySelector('.mobile_menu_open');
        if (mobileMenuActive) {
            mobileMenuToggle(); 
        }
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
        bodyUnLock();
    } else {
        bodyLock()
        mobileMenu.classList.add('mobile_menu_open');
    }
}

if (burgerBtn) {
    burgerBtn.addEventListener("click", function (e) {
        mobileMenuToggle();
    });
}

const mobileSidebar = document.querySelector('.mobile_sidebar');

if (mobileSidebar) {
    mobileSidebar.addEventListener("click", function (e) {
        mobileMenuToggle();
    });
}


// Mobile menu animation    


let mobileMenuHasChilder = document.querySelectorAll('.mobile-menu-item-has-children');

/**
 * Function for delete classes
 * 
 * @param {*} elementClass - element by class or id (with . or #);
 * @param {*} classToDelete - element for delete
 * 
 * @return delete class in elements
 */


function openElementsClose(elementClass, classToDelete) {

    let allOpenElement = document.querySelectorAll(elementClass);
    for(let index = 0; index < allOpenElement.length; index++) {
        allOpenElement[index].classList.remove(classToDelete);
    }

}

if (mobileMenuHasChilder.length > 0) {

    for (let index = 0; index < mobileMenuHasChilder.length; index++) {
        let el = mobileMenuHasChilder[index];
        el.addEventListener("click", function (e) {

            let menu = this.closest('.mobile-menu-item-has-children');

            if(menu.parentNode.classList.contains('mobile-sub-menu')) {
                if(menu.classList.contains('open')) {

                    menu.classList.remove('open');
                    menu.parentNode.classList.remove('mobile-sub-menu-open');

                } else {
                   
                    menu.classList.add('open');
                    menu.parentNode.classList.add('mobile-sub-menu-open');

                }
            } else {
                if (menu.classList.contains('open')) {

                    menu.classList.remove('open');
                    

                } else {
                    
                    openElementsClose('.open', 'open');
                    openElementsClose('.mobile-sub-menu-open', 'mobile-sub-menu-open');
                    menu.classList.add('open');

                }
            }
        });
    }
}

// Magnific image popup

jQuery(document).ready(function($) {

    $('.wp-block-image').each(function() {
        $(this).addClass('funnycoon_image_in_post');
    });

    // Translation for Magnific Popup

    $.extend(true, $.magnificPopup.defaults, {
        tClose: 'Закрыть (Esc)', 
        tLoading: 'Загрузка...', 
        gallery: {
          tPrev: 'Предыдущее (Стрелка влево)', 
          tNext: 'Следующее (Стрелка вправо)',
          tCounter: '%curr% из %total%' 
        },
        image: {
          tError: '<a href="%url%">Изображение</a> не было загружено.'
        },
        ajax: {
          tError: '<a href="%url%">Контент</a> не был загружен.' 
        }
      });

    $(".funnycoon_image_in_post").magnificPopup({
        delegate: 'a',
        type: 'image',        
        closeOnContentClick: true,
        closeBtnInside: true,
        mainClass: 'mfp-no-margins mfp-with-zoom',
        zoom: {
            enabled: true,
            duration: 200,
            easing: 'ease-in-out'
        },
        gallery: {
            enabled: true,
        },
    });
 
});

// Measures for 404 page

jQuery(document).ready(function($) {
    let maxWidth404 = parseInt($(":root").css("--404-max-width")),
        maxHeight404 = parseInt($(":root").css("--404-max-height")),
        widthImage404 = parseInt($(":root").css("--start-image-w")),
        heightImage404 = parseInt($(":root").css("--start-image-h")),
        windowWidthSize = $(window).width(),
        windowHeightSize = $(window).height(),
        newWidthImage404 = widthImage404 * (windowWidthSize / maxWidth404),
        newHeightImage404 = heightImage404 * (windowHeightSize / maxHeight404);

    $(":root").css("--image-w", newWidthImage404 + 'px');
    $(":root").css("--image-h", newHeightImage404 + 'px');
});