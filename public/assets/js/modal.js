//Modal Popup
(function() {
    "use strict";
if(localStorage.getItem("modalCookie") == null){
    var modal = document.getElementById('offerModal');
    new bootstrap.Modal(modal).show();
}
})();

// setTimeout(modalPopup,2000)

//Countedown
let endDateElm = "22 Feb 2023 12:01 am"
let countDownItem = Array.from(document.querySelectorAll('.count_down'))

let modalCookie = ()=>{
    localStorage.setItem("modalCookie",true)
}

function countDown() {
    let endDate = new Date(endDateElm);
    let newDate = new Date();
    let dateDiff = (endDate - newDate) / 1000
    if (dateDiff > 0) {
        let day = Math.floor(dateDiff / 3600 / 24)
        let hour = Math.floor(dateDiff / 3600) % 24
        let min = Math.floor(dateDiff / 60) % 60
        let sec = Math.floor(dateDiff % 60)
        countDownItem[0].textContent = day
        countDownItem[1].textContent = hour
        countDownItem[2].textContent = min
        countDownItem[3].textContent = sec
    } else {
        clearInterval(stop)
    }
}
let stop = setInterval(() => {
    countDown();
}, 1000);