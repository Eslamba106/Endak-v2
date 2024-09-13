'use strict'

function toggle(btnID, rowIDs){
var btnToggle = document.getElementById(btnID);
var rowHiddens = document.querySelectorAll(rowIDs);

var ariaExpanded = btnToggle.getAttribute('aria-expanded');
if(ariaExpanded === 'false'){
    for(let row of rowHiddens){
    row.classList.remove('hidden');
    row.classList.add('show');
    }
    btnToggle.setAttribute('aria-expanded', 'true');
}
else{
    for(let row of rowHiddens){
    row.classList.remove('show');
    row.classList.add('hidden');
    }
    btnToggle.setAttribute('aria-expanded', 'false');
}
}
 