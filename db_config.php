<?php
DEFINE("HOST",'localhost');
DEFINE("USER",'root');
DEFINE("PASS",'');
DEFINE("DB",'bizkodaukcije');

$connection=mysqli_connect(HOST,USER,PASS,DB)
or die(mysqli_errno($connection));
mysqli_query($connection,"SET NAMES utf8") or die (mysqli_error($connection));
mysqli_query($connection,"SET CHARACTER SET utf8") or die (mysqli_error($connection));
mysqli_query($connection,"SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
// Check connection
if (mysqli_connect_errno())
{
    echo "Neuspelo povezivanje na bazu podataka: " . mysqli_connect_error();
}
?>
?>