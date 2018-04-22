<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php if(!isset($_SESSION))
{
    include_once('db_config.php');
    session_start();
}?>
<html>
<head>
    <title>upis</title>
    <link href="css/login_css.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include('header.php');?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
            <?php
            $sql = "SELECT * FROM category";
            $result = $connection->query($sql);
            ?>
            <div id="category">
                <ul class="category">
                    <?php
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<li><a style=\"color:#fff;\" href='".$row['categoryID']."'>".$row['categoryName']."</a></li>";

                        $sql1="SELECT * FROM subcategory WHERE categoryID = '".$row['categoryID']."'";
                        $result1 = $connection->query($sql1);
                        echo "<ul class='subcategory'>";
                        while ($row = mysqli_fetch_array($result1))
                        {
                            echo "<li><a style=\"color:#fff;\" href='".$row['subcategoryID']."'>".$row['subcategoryName']."</a></li>";
                        }
                        echo "</ul></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
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
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/login.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
