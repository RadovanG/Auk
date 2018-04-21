<?php session_start()?>
<html>
<head>
    <title>AH</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/login_css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="login-page">
    <div id="forma">
        <form class="login-form">
            <input type="text" placeholder="username" id="username">
            <span id="errorUsername" hidden="hidden" style="color:red">Error username must not be empty!</span>
            <input type="password" placeholder="password" id="password" />
            <span id="errorPassword" hidden="hidden" style="color:red">Error password must not be empty!</span>
            <button type="submit" id="submit" name="submit">login</button>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/login.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
