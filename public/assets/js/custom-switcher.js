"use strict";

let mainContent;
(function () {

    let html = document.querySelector('html');

    //RTL 
    if (!localStorage.getItem("hostmartl")) {
        // html.setAttribute("dir" , "rtl") // for rtl version 
    }

    //Light Theme Style
    if (!localStorage.getItem("hostmalighttheme")) {
        // html.setAttribute("data-theme-mode" , "light") // for light theme
    }

    //Dark Theme Style
    if (!localStorage.getItem("hostmadarktheme")) {
        // html.setAttribute("data-theme-mode" , "dark") // for dark theme
    }

    //Boxed styles
    if (!localStorage.getItem("hostmaboxed")) {
        // html.setAttribute("data-width" , "boxed") // for boxed style
    }

    /*RTL Start*/
    if (html.getAttribute('dir') === "rtl") {
        rtlFn();
    }
    /*RTL End*/

    if (document.querySelector("#switcher-canvas")) {
        localStorageBackup();
    }

    switcherClick();
    checkOptions();

})();

function switcherClick() {
    let ltrBtn, rtlBtn, lightBtn, darkBtn, boxedBtn, fullwidthBtn,  resetBtn,  
    primaryDefaultColor1Btn, primaryDefaultColor2Btn, primaryDefaultColor3Btn, primaryDefaultColor4Btn, primaryDefaultColor5Btn, 
    bgDefaultColor1Btn, bgDefaultColor2Btn, bgDefaultColor3Btn, bgDefaultColor4Btn, bgDefaultColor5Btn,  ResetAll;
    let html = document.querySelector('html');
    lightBtn = document.querySelector('#switcher-light-theme');
    darkBtn = document.querySelector('#switcher-dark-theme');
    ltrBtn = document.querySelector('#switcher-ltr');
    rtlBtn = document.querySelector('#switcher-rtl');
    boxedBtn = document.querySelector('#switcher-boxed');
    fullwidthBtn = document.querySelector('#switcher-full-width');
    resetBtn = document.querySelector('#resetbtn');
    primaryDefaultColor1Btn = document.querySelector('#switcher-primary');
    primaryDefaultColor2Btn = document.querySelector('#switcher-primary1');
    primaryDefaultColor3Btn = document.querySelector('#switcher-primary2');
    primaryDefaultColor4Btn = document.querySelector('#switcher-primary3');
    primaryDefaultColor5Btn = document.querySelector('#switcher-primary4');
    bgDefaultColor1Btn = document.querySelector('#switcher-background');
    bgDefaultColor2Btn = document.querySelector('#switcher-background1');
    bgDefaultColor3Btn = document.querySelector('#switcher-background2');
    bgDefaultColor4Btn = document.querySelector('#switcher-background3');
    bgDefaultColor5Btn = document.querySelector('#switcher-background4');
    ResetAll = document.querySelector('#reset-all');


    // primary theme 
    if(primaryDefaultColor1Btn){
        primaryDefaultColor1Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "20, 87, 230");
            html.style.setProperty('--primary-rgb', `20, 87, 230`);
            updateColors();
        })
    }
    if(primaryDefaultColor2Btn){
        primaryDefaultColor2Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "16, 173, 231");
            html.style.setProperty('--primary-rgb', `16, 173, 231`);
            updateColors();
        })
    }
    if(primaryDefaultColor3Btn){
        primaryDefaultColor3Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "125, 172, 48");
            html.style.setProperty('--primary-rgb', `125, 172, 48`);
            updateColors();
        })
    }
    if(primaryDefaultColor4Btn){
        primaryDefaultColor4Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "209, 68, 141");
            html.style.setProperty('--primary-rgb', `209, 68, 141`);
            updateColors();
        })
    }
    if(primaryDefaultColor5Btn){
        primaryDefaultColor5Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "108, 62, 179");
            html.style.setProperty('--primary-rgb', `108, 62, 179`);
            updateColors();
        })
    }

    // Background theme 
    if(bgDefaultColor1Btn){
        bgDefaultColor1Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "50, 62, 93");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor2Btn){
        bgDefaultColor2Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "81, 93, 50");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor3Btn){
        bgDefaultColor3Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "79, 50, 93");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor4Btn){
        bgDefaultColor4Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "50, 87, 93");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor5Btn){
        bgDefaultColor5Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "93, 50, 50");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    } 

    /* Light Layout Start */
    if(lightBtn){
        lightBtn.addEventListener('click', () => {
            lightFn();
        })
    }
    /* Light Layout End */

    /* Dark Layout Start */
    if(darkBtn){
        darkBtn.addEventListener('click', () => {
            darkFn();
        });
    }
    /* Dark Layout End */

    /* rtl start */
    if(rtlBtn){
        rtlBtn.addEventListener('click', () => {
            localStorage.setItem("hostmartl", true);
            localStorage.removeItem("hostmaltr");
            rtlFn();
        });
        /* rtl end */
    }

    /* ltr start */
    if(ltrBtn){
        ltrBtn.addEventListener('click', () => {
            //    local storage 
            localStorage.setItem("hostmaltr", true);
            localStorage.removeItem("hostmartl");
            ltrFn();
        });
    }
    /* ltr end */

    /* Full Width Layout Start */
    if(fullwidthBtn){
        fullwidthBtn.addEventListener('click', () => {
           html.setAttribute('data-width', 'fullwidth');
           localStorage.setItem("hostmafullwidth", true);
           localStorage.removeItem("hostmaboxed");
       });
    }
    /* Full Width Layout End */

    /* Boxed Layout Start */
    if(boxedBtn){
        boxedBtn.addEventListener('click', () => {
           html.setAttribute('data-width', 'boxed');
           localStorage.setItem("hostmaboxed", true);
           localStorage.removeItem("hostmafullwidth");  
        })
    };
    /* Boxed Layout End */

    // reset all start
    if(ResetAll){
        ResetAll.addEventListener('click', () => {
            ResetAllFn();
        })
    }
    // reset all start
}

function ltrFn() {
    let html = document.querySelector('html')
    document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.min.css");
    html.setAttribute("dir", "ltr");
    document.querySelector('#switcher-ltr').checked = true;
    checkOptions();
}

function rtlFn() {
    let html = document.querySelector('html');
    html.setAttribute("dir", "rtl");
    document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.rtl.min.css");
    checkOptions();
}

function lightFn() {
    let html = document.querySelector('html');
    html.setAttribute('data-theme-mode', 'light');
    if(document.querySelector('#switcher-light-theme')){
        document.querySelector('#switcher-light-theme').checked = true;
    }
    updateColors()
    localStorage.removeItem("hostmadarktheme");
    localStorage.removeItem("hostmabgColor");
    localStorage.removeItem("hostmabgwhite");
    localStorage.removeItem("bodyBgRGB");
    checkOptions();
    html.style.removeProperty('--body-bg-rgb');
}

function darkFn() {
    let html = document.querySelector('html');
    html.setAttribute('data-theme-mode', 'dark');
    updateColors()
    localStorage.setItem("hostmadarktheme", true);
    localStorage.removeItem("hostmalighttheme");
    localStorage.removeItem("bodyBgRGB");
    localStorage.removeItem("hostmabgColor");
    localStorage.removeItem("hostmabgwhite");
    checkOptions();
}

function ResetAllFn() {
    let html = document.querySelector('html');
    checkOptions();

    // clearing localstorage
    localStorage.clear();

    // reseting to light
    lightFn();

    // clearing attibutes
    html.removeAttribute('data-width');

    // clear primary & bg color
    html.style.removeProperty(`--primary-rgb`);
    html.style.removeProperty(`--body-bg-rgb`);

    // reseting to ltr
    ltrFn();

    // reseting layout width styles
    if(document.querySelector('#switcher-full-width')){
        document.querySelector('#switcher-full-width').checked = true;
    }

    if(document.querySelector('#switcher-boxed')){
        document.querySelector('#switcher-boxed').checked = false;
    }

    // reseting chart colors
    updateColors();

}

function checkOptions() {

    // dark
    if (localStorage.getItem('hostmadarktheme')) {
        if(document.querySelector('#switcher-dark-theme')){
            document.querySelector('#switcher-dark-theme').checked = true;
        }
    }

    //RTL 
    if (localStorage.getItem('hostmartl')) {
        if(document.querySelector('#switcher-rtl')){
            document.querySelector('#switcher-rtl').checked = true;
        }
    }

    //boxed 
    if (localStorage.getItem('hostmaboxed')) {
        if(document.querySelector('#switcher-boxed')){
            document.querySelector('#switcher-boxed').checked = true;
        }
    }
}

// chart colors
let myVarVal,primaryRGB
function updateColors() {
    'use strict'
    primaryRGB = getComputedStyle(document.documentElement).getPropertyValue('--primary-rgb').trim();

    //get variable
    myVarVal = localStorage.getItem("primaryRGB") || primaryRGB; 
}
updateColors()

function localStorageBackup() {
    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.primaryRGB) {
        if (document.querySelector('.theme-container-primary')) {
            document.querySelector('.theme-container-primary').value = localStorage.primaryRGB;
        }
        document.querySelector('html').style.setProperty('--primary-rgb', localStorage.primaryRGB);
    }
    if (localStorage.bodyBgRGB) {
        if (document.querySelector('.theme-container-background')) {
            document.querySelector('.theme-container-background').value = localStorage.bodyBgRGB;
        }
        document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
        let html = document.querySelector('html');
        html.setAttribute('data-theme-mode', 'dark');
        document.querySelector('#switcher-dark-theme').checked = true;
    }
    if (localStorage.hostmadarktheme) {
        let html = document.querySelector('html');
        html.setAttribute('data-theme-mode', 'dark');
    }
    if (localStorage.hostmartl) {
        let html = document.querySelector('html');
        html.setAttribute('dir', 'rtl');
        rtlFn();
    }
    if (localStorage.hostmaboxed) {
        let html = document.querySelector('html');
        html.setAttribute('data-width', 'boxed');
    }
    if(localStorage.hostmaltr){
        ltrFn()
    }
}