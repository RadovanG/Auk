<?php
include("db_config.php");


function GetImageExtension($imagetype)
{
    if(empty($imagetype)) return false;

    switch($imagetype)

    {

        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
    }
}


if (!empty($_FILES["uploadedimage"]["name"])) {

    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-Y")."-".time().$ext;
    $target_path = "images/user/".$imagename;

    $query="UPDATE users SET userPhoto='$target_path' WHERE userID=1";

    echo $target_path;

    $result = mysqli_query($connection,$query);
    //ispis ako je uspesno updateovanje filma u bazu podataka
    if($result){
        echo "<div class='form'>
        <h3>Uspešno ste uredili film! <a href='../index.php'>Povratak na glavnu stranicu.</a></h3>
        <br/> <a href='dodajfilm.php'>Kliknite ovde da dodate/menjate još filmova.</a>";
    }
}


?>;