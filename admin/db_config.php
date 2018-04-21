<?php
DEFINE("HOST",'localhost');
DEFINE("USER",'root');
DEFINE("PASS",'');
DEFINE("DB",'bizkodaukcije');

$connection=mysqli_connect(HOST,USER,PASS,DB)
or die(mysqli_errno($connection));
?>