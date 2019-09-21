<?php session_start() ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<div id="welcome"></div>
<h3>Login Now!</h3>
<form action="../server/login_server.php" method="post">
    <label>Username: <input id="user" name="user" type="text"></label>
    <br>
    <label>Password: <input id="pwd" name="pwd" type="password"></label>
    <br>
    <label>Key: <input id="key" name="key" type="password" oninput="verifyInput(this.id)"></label>
    <br>
    <button id="submit" type="submit" onclick="processSubmit()" disabled>Login</button>
</form>
<p>Don't have an account? <a href="register.html">Register</a></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="javascript/sha256.js"></script>
<script src="javascript/utils.js"></script>
<script>
    $('#welcome').showWelcome()

    function processSubmit() {
        hash('pwd');
        let key = document.getElementById('key');
        key.value = rsaEncrypt(key.value);
    }
</script>
</body>
</html>