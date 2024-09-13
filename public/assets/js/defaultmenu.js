"use strict";

const ANIMATION_DURATION = 300;

const sidebar = document.getElementById("sidebar");
let mainContentDiv = document.querySelector(".main-content");

const slideHasSub = document.querySelectorAll(".nav > ul > .slide.has-sub");

const firstLevelItems = document.querySelectorAll(".nav > ul > .slide.has-sub > a");

const innerLevelItems = document.querySelectorAll(".nav > ul > .slide.has-sub .slide.has-sub > a");

class PopperObject {
  instance = null;
  reference = null;
  popperTarget = null;

  constructor(reference, popperTarget) {
    this.init(reference, popperTarget);
  }

  init(reference, popperTarget) {
    this.reference = reference;
    this.popperTarget = popperTarget;
    this.instance = Popper.createPopper(this.reference, this.popperTarget, {
      placement: "bottom",
      strategy: "relative",
      resize: true,
      modifiers: [
        {
          name: "computeStyles",
          options: {
            adaptive: false
          }
        },
      ]
    });

    document.addEventListener(
      "click",
      (e) => this.clicker(e, this.popperTarget, this.reference),
      false
    );

    const ro = new ResizeObserver(() => {
      this.instance.update();
    });

    ro.observe(this.popperTarget);
    ro.observe(this.reference);
  }

  clicker(event, popperTarget, reference) {
    if (
      sidebar.classList.contains("collapsed") &&
      !popperTarget.contains(event.target) &&
      !reference.contains(event.target)
    ) {
      this.hide();
    }
  }

  hide() {
    // this.instance.state.elements.popper.style.visibility = "hidden";
  }
}

class Poppers {
  subMenuPoppers = [];

  constructor() {
    this.init();
  }

  init() {
    slideHasSub.forEach((element) => {
      this.subMenuPoppers.push(
        new PopperObject(element, element.lastElementChild)
      );
      this.closePoppers();
    });
  }

  togglePopper(target) {
    if (window.getComputedStyle(target).visibility === "hidden" && window.getComputedStyle(target).visibility === undefined)
      target.style.visibility = "visible";
    else target.style.visibility = "hidden";
  }

  updatePoppers() {
    this.subMenuPoppers.forEach((element) => {
      element.instance.state.elements.popper.style.display = "none";
      element.instance.update();
    });
  }

  closePoppers() {
    this.subMenuPoppers.forEach((element) => {
      element.hide();
    });
  }
}

const slideUp = (target, duration = ANIMATION_DURATION) => {
  const { parentElement } = target;
  parentElement.classList.remove("open");
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = `${duration}ms`;
  target.style.boxSizing = "border-box";
  target.style.height = `${target.offsetHeight}px`;
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  window.setTimeout(() => {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};
const slideDown = (target, duration = ANIMATION_DURATION) => {
  const { parentElement } = target;
  parentElement.classList.add("open");
  target.style.removeProperty("display");
  let { display } = window.getComputedStyle(target);
  if (display === "none") display = "block";
  target.style.display = display;
  const height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  target.offsetHeight;
  target.style.boxSizing = "border-box";
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = `${duration}ms`;
  target.style.height = `${height}px`;
  target.style.removeProperty("padding-top");
  target.style.removeProperty("padding-bottom");
  target.style.removeProperty("margin-top");
  target.style.removeProperty("margin-bottom");
  window.setTimeout(() => {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};

const slideToggle = (target, duration = ANIMATION_DURATION) => {
  let html = document.querySelector('html');
  if (!((html.getAttribute('data-nav-style') === "menu-hover" && html.getAttribute('toggled') === 'menu-hover-closed' && window.innerWidth >= 992) || (html.getAttribute('data-nav-style') === "icon-hover" && html.getAttribute('toggled') === 'icon-hover-closed' && window.innerWidth >= 992))) {
    if (window.getComputedStyle(target).display === "none")
      return slideDown(target, duration);
    return slideUp(target, duration);
  }
};

const PoppersInstance = new Poppers();

/**
 * wait for the current animation to finish and update poppers position
 */
const updatePoppersTimeout = () => {
  setTimeout(() => {
    PoppersInstance.updatePoppers();
  }, ANIMATION_DURATION);
};

const defaultOpenMenus = document.querySelectorAll(".slide.has-sub.open");

defaultOpenMenus.forEach((element) => {
  element.lastElementChild.style.display = "block";
});

/**
 * handle top level submenu click
 */
 firstLevelItems.forEach((element) => {
  element.addEventListener("click", () => {
    let html = document.querySelector('html');
    if (!((html.getAttribute('data-nav-style') === "menu-hover" && html.getAttribute('toggled') === 'menu-hover-closed' && window.innerWidth >= 992) || (html.getAttribute('data-nav-style') === "icon-hover" && html.getAttribute('toggled') === 'icon-hover-closed' && window.innerWidth >= 992))) {
      const parentMenu = element.closest(".nav.sub-open");
      if (parentMenu)
        parentMenu.querySelectorAll(":scope > ul > .slide.has-sub > a").forEach(
          el => {
            // window.getComputedStyle(el.nextElementSibling).display !== "none" && 
            if (el.nextElementSibling.style.display === "block" || window.getComputedStyle(el.nextElementSibling).display === "block") {
              slideUp(el.nextElementSibling)
            }
          }
        );
      slideToggle(element.nextElementSibling);
    }
  });
});

/**
 * handle inner submenu click
 */
innerLevelItems.forEach((element) => {
  let html = document.querySelector('html');
  // if ((html.getAttribute('data-nav-style') !== "menu-hover" || html.getAttribute('data-nav-style') !== "icon-hover") ) {
  element.addEventListener("click", () => {
    slideToggle(element.nextElementSibling);
  });
  // }
});

/**
 * menu styles
 */
let headerToggleBtn, headerToggleBtn1, WindowPreSize;
(() => {
  let html = document.querySelector('html');
  headerToggleBtn = document.querySelector('.sidemenu-toggle');
  headerToggleBtn.addEventListener('click', toggleSidemenu);
  headerToggleBtn1 = document.querySelector('.sidemenu-toggle1');
  headerToggleBtn1.addEventListener('click', toggleSidemenu);
  let mainContent = document.querySelector('.main-content');
  if (window.innerWidth <= 992) {
    mainContent.addEventListener('click', menuClose);
  }
  else {
    mainContent.removeEventListener('click', menuClose);
  }

  WindowPreSize = [window.innerWidth];
  setNavActive();
  if (html.getAttribute('data-nav-layout') === "horizontal" && window.innerWidth >= 992) {
    clearNavDropdown();
    mainContent.addEventListener('click', clearNavDropdown);
  }
  else {
    mainContent.removeEventListener('click', clearNavDropdown);
  }

  
  window.addEventListener('resize', ResizeMenu);
  toggleSidemenu();

  if ((html.getAttribute('data-nav-style') === "menu-hover" || html.getAttribute('data-nav-style') === "icon-hover") && window.innerWidth >= 992) {
    clearNavDropdown();
  }
  if(window.innerWidth < 992) {
    html.setAttribute('toggled','close')
  }
})()

function ResizeMenu() {
  let html = document.querySelector('html');
  let mainContent = document.querySelector('.main-content');

  WindowPreSize.push(window.innerWidth);
  if (WindowPreSize.length > 2) { WindowPreSize.shift() }
  if (WindowPreSize.length > 1) {
    if ((WindowPreSize[WindowPreSize.length - 1] < 992) && (WindowPreSize[WindowPreSize.length - 2] >= 992)) {
      // less than 992;
      mainContent.addEventListener('click', menuClose);
      setNavActive()
      toggleSidemenu();
      mainContent.removeEventListener('click', clearNavDropdown);
    }

    if ((WindowPreSize[WindowPreSize.length - 1] >= 992) && (WindowPreSize[WindowPreSize.length - 2] < 992)) {
      // greater than 992
      mainContent.removeEventListener('click', menuClose);
      toggleSidemenu();
      if (html.getAttribute('data-nav-layout') === "horizontal") {
        clearNavDropdown()
        mainContent.addEventListener('click', clearNavDropdown);
      }
      else {
        mainContent.removeEventListener('click', clearNavDropdown);
      }
      html.removeAttribute('toggled')
    }
  }
}
function menuClose() {
  let html = document.querySelector('html');
  html.setAttribute('toggled', 'close')
}
function toggleSidemenu() {
  let html = document.querySelector('html');
  let sidemenuType = html.getAttribute('data-nav-layout');

  if (window.innerWidth >= 992) {
    if (sidemenuType === "vertical") {
      sidebar.removeEventListener('mouseenter', mouseEntered);
      sidebar.removeEventListener('mouseleave', mouseLeave);
      sidebar.removeEventListener('click', icontextOpen);
      mainContentDiv.removeEventListener('click', icontextClose);
      let sidemenulink = document.querySelectorAll('.main-menu li > .side-menu__item');
      sidemenulink.forEach(ele => ele.removeEventListener('click', doubleClickFn))

      let verticalStyle = html.getAttribute('vertical-style');
      switch (verticalStyle) {
        // default 
        case 'default':
          iconOverayFn();
          html.removeAttribute('toggled');

        // for making any vertical style as default
        // default:
        // iconOverayFn();
        // html.removeAttribute('toggled');
      }
      let menuclickStyle = html.getAttribute('data-nav-style');
      switch (menuclickStyle) {
        case 'menu-hover':
          if (html.getAttribute('toggled') === 'menu-hover-closed') {
            html.removeAttribute('toggled');
            setNavActive()
          }
          else {
            html.setAttribute('toggled', 'menu-hover-closed');
            clearNavDropdown()
          }
          break;
        //for making any horizontal style as default
        default:
      }
    }
  }
  else {
    if (html.getAttribute('toggled') === 'close') {
      html.setAttribute('toggled', 'open');
    }
    else {
      html.setAttribute('toggled', 'close');
    }
  }
}
function menuhoverFn() {
  let html = document.querySelector('html');
  html.setAttribute('data-nav-style', 'menu-hover');
  html.removeAttribute('hor-style');
  html.removeAttribute('vertical-style');
  toggleSidemenu();
  if (html.getAttribute('toggled') === 'menu-hover-closed') {
    clearNavDropdown();
  }
}
function setNavActive() {
    let currentPath = window.location.pathname.split('/')[0];
  
    currentPath = location.pathname == "/" ? "index.html" : location.pathname.substring(1);
    currentPath = currentPath.substring(currentPath.lastIndexOf("/") + 1);
    let sidemenuItems = document.querySelectorAll('.side-menu__item');
    sidemenuItems.forEach(e => {
      if (currentPath === "/") {
        currentPath = "index.html";
      }
      if (e.getAttribute('href') === currentPath) {
        e.classList.add('active');
        e.parentElement.classList.add('active');
        let parent = e.closest('ul:not(.main-menu)');
        let parentNotMain = e.closest('ul:not(.main-menu)');
        let hasParent = true;
        while (hasParent) {
          if (parent) {
            parent.classList.add('active');
            parent.previousElementSibling?.classList.add('active');
            parent.parentElement.classList.add('active');
            slideDown(parent);
            parent = parent.parentElement.closest('ul:not(.main-menu)');
            // 
            if (parent && parent.closest('ul:not(.main-menu)')) {
              parentNotMain = parent && parent.closest('ul:not(.main-menu)');
            }
            if (!parentNotMain) hasParent = false;
          }
          else{
            hasParent = false;  
          }
        }
      }
    })
  }
  function clearNavDropdown() {
    let sidemenus = document.querySelectorAll('ul.slide-menu');
    sidemenus.forEach(e => {
      let parent = e.closest('ul:not(.main-menu)');
      let parentNotMain = e.closest('ul:not(.main-menu)');
      if (parent) {
        let hasParent = parent.closest('ul.main-menu');
        while (hasParent) {
          parent.classList.add('active');
          slideUp(parent);
          // 
          parent = parent.parentElement.closest('ul:not(.main-menu)');
          parentNotMain = parent && parent.closest('ul:not(.main-menu)');
          if (!parentNotMain) hasParent = false;
        }
      }
    })
  }

  window.addEventListener("unload", () => {
    let mainContent = document.querySelector('.main-content');
    mainContent.removeEventListener('click', clearNavDropdown);
    window.removeEventListener('resize', ResizeMenu);
    let sidemenulink = document.querySelectorAll('.main-menu li > .side-menu__item');
    sidemenulink.forEach(ele => ele.removeEventListener('click', doubleClickFn))
  
  });

// FOOTER
document.getElementById("year").innerHTML = new Date().getFullYear();



