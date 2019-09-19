function verify_input() {
    let pwd = document.getElementById('pwd').value
    let button = document.getElementById('submit')
    if (pwd.length >= 6) {
        button.disabled = false
    } else {
        button.disabled = true;
    }
}

$.fn.showWelcome = function () {
    $('#welcome').load('welcome.html')
}