'use strict'

// Switcher Color Pickers
const pickrContainerPrimary = document.querySelector('.pickr-container-primary');
const themeContainerPrimary = document.querySelector('.theme-container-primary');
const pickrContainerBackground = document.querySelector('.pickr-container-background');
const themeContainerBackground = document.querySelector('.theme-container-background');


// For Theme Primary
const nanoThemes = [
    [
        'nano',
        {

            defaultRepresentation: 'RGB',
            components: {
                preview: true,
                opacity: false,
                hue: true,

                interaction: {
                    hex: false,
                    rgba: true,
                    hsva: false,
                    input: true,
                    clear: false,
                    save: false
                }
            }
        }
    ]
];
const nanoButtons = [];
let nanoPickr = null;
for (const [theme, config] of nanoThemes) {
    const button = document.createElement('button');
    button.innerHTML = theme;
    nanoButtons.push(button);

    button.addEventListener('click', () => {
        const el = document.createElement('p');
        pickrContainerPrimary.appendChild(el);

        /* Delete previous instance */
        if (nanoPickr) {
            nanoPickr.destroyAndRemove();
        }

        /* Apply active class */
        for (const btn of nanoButtons) {
            btn.classList[btn === button ? 'add' : 'remove']('active');
        }

        /* Create fresh instance */
        nanoPickr = new Pickr(Object.assign({
            el,
            theme,
            default: '#1457e6'
        }, config));

        /* Set events */
        nanoPickr.on('changestop', (source, instance) => {
            let color = instance.getColor().toRGBA();
            let html = document.querySelector('html');
            html.style.setProperty('--primary-rgb', `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(color[2])}`);
            /* theme color picker */
            localStorage.setItem('primaryRGB', `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(color[2])}`);
            updateColors();
        });
    });

    themeContainerPrimary.appendChild(button);
}
nanoButtons[0].click();


// For Theme Background
const nanoThemes1 = [
    [
        'nano',
        {

            defaultRepresentation: 'RGB',
            components: {
                preview: true,
                opacity: false,
                hue: true,

                interaction: {
                    hex: false,
                    rgba: true,
                    hsva: false,
                    input: true,
                    clear: false,
                    save: false
                }
            }
        }
    ]
];
const nanoButtons1 = [];
let nanoPickr1 = null;
for (const [theme, config] of nanoThemes) {
    const button = document.createElement('button');
    button.innerHTML = theme;
    nanoButtons1.push(button);

    button.addEventListener('click', () => {
        const el = document.createElement('p');
        pickrContainerBackground.appendChild(el);

        /* Delete previous instance */
        if (nanoPickr1) {
            nanoPickr1.destroyAndRemove();
        }

        /* Apply active class */
        for (const btn of nanoButtons) {
            btn.classList[btn === button ? 'add' : 'remove']('active');
        }

        /* Create fresh instance */
        nanoPickr1 = new Pickr(Object.assign({
            el,
            theme,
            default: '#1457e6'
        }, config));

        /* Set events */
        nanoPickr1.on('changestop', (source, instance) => {
            let color = instance.getColor().toRGBA();
            let html = document.querySelector('html');
            html.style.setProperty('--body-bg-rgb', `${color[0]}, ${color[1]}, ${color[2]}`);
            localStorage.removeItem("bgtheme");
            updateColors();
            html.setAttribute('data-theme-mode', 'dark');
            html.setAttribute('data-menu-styles', 'transparent');
            html.setAttribute('data-header-styles', 'transparent');
            document.querySelector('#switcher-dark-theme').checked = true;
            localStorage.setItem('bodyBgRGB', `${color[0]}, ${color[1]}, ${color[2]}`);
        });
    });
    themeContainerBackground.appendChild(button);
}
nanoButtons1[0].click();