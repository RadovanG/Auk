<?php
include_once("db_config.php");
include_once("auth.php");

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

}
if (move_uploaded_file($_FILES["uploadedimage"]["tmp_name"], $target_path)) {
echo "The file ". basename( $_FILES["uploadedimage"]["name"]). " has been uploaded.";
} else {
echo "Sorry, there was an error uploading your file.";
}

$userIDforphoto=$_SESSION['userID'];

$query="UPDATE `users` 
SET `userPhoto`='$target_path' WHERE userID=$userIDforphoto";

$result = mysqli_query($connection,$query);

//ispis ako je uspešno dodavanje filma u bazu podataka
if($result) {
    echo "<div class='form'>
        <h3>You have successfully updated your profile picture!</h3>
        </div>";
}else{

    echo mysqli_error($connection);
    echo "Greska!!";

}

?>