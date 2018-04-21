<?php session_start()?>
<html>
<head>
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/login_css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="login-page">
    <div id="forma">
        <form class="login-form">
            <input type="text" placeholder="adminName" id="adminName">
            <span id="erroradminName" hidden="hidden" style="color:red">Error adminName must not be empty!</span>
            <input type="Password" placeholder="Password" id="Password" />
            <span id="errorPassword" hidden="hidden" style="color:red">Error Password must not be empty!</span>
            <button type="submit" id="submit" name="submit">login</button>
        </form>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/login.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
