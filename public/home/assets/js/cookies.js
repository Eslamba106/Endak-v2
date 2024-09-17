// Create cookie
function createCookie(cookieName, cookieValue, expiredDays) {
    const d = new Date();
    d.setTime(d.getTime() + (expiredDays*24*60*60*1000));
    let cookieExpires = "cookieExpires="+ d.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + ";" + cookieExpires + ";path=/";
}

// Remove cookie
function removeCookie(cookieName) {
    const d = new Date();
    d.setTime(d.getTime() + (24*60*60*1000));
    let cookieExpires = "cookieExpires="+ d.toUTCString();
    document.cookie = cookieName + "=;" + cookieExpires + ";path=/";
}

// Read cookie
function getCookie(cookieName) {
    let name = cookieName + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Set cookie
function acceptCookie(){
    removeCookie('user_cookie_accept');
    createCookie('user_cookie_accept', 1, 30);
    document.getElementById("cookieNotice").style.display = "none";
}

let cookie_accept = getCookie("user_cookie_accept");
if(cookie_accept != ""){
    document.getElementById("cookieNotice").style.display = "none";
}else{
    document.getElementById("cookieNotice").style.display = "block";
}

(function() {

    var button = document.querySelector('#customize');
    var cookie = document.querySelector('#customizeCookie');

    button.addEventListener('click', function() {

        cookie.classList.toggle('d-none');

    });    

})();