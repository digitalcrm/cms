let acceptCookie = document.getElementById('acceptModal');

const getCookieValueFromStorage = localStorage.getItem('cookieAccepted');

console.log(getCookieValueFromStorage);

function toggle() {
    if(acceptCookie.click) {
        localStorage.setItem('cookieAccepted', 1);
    } else {
        localStorage.setItem('cookieAccepted', 0);
    }
}

$(document).ready(function() {
    if (getCookieValueFromStorage == 0 || getCookieValueFromStorage == null) {
        $('#cookieModal').modal('show');
    }
});

acceptCookie.addEventListener('click', toggle);