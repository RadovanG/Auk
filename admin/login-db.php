<?php
session_start();
include ('db_config.php');
$adminName=mysqli_real_escape_string($connection,$_POST['adminName']);
$Password=sha1(mysqli_real_escape_string($connection,$_POST['Password']));



//var_dump($adminName,$Password,$email,$address,$phone,$city,$country);

//echo 'user '.$adminName.'<br/>';
//echo 'pass '.$Password.'<br/>';

//Inicijalizovanje Array-a
$json = array("errorLog" => array(), "successLog" => "");

// If za proveru da li je prazan email data
if (!empty($adminName)) {
    $adminName=mysqli_real_escape_string($connection,$_POST['adminName']);
} // U slucaju da nije, push JSON to array, da bi kasnije to stavili u DIV
else {
    array_push($json['errorLog'], "adminName must not be empty");
}


if (!empty($Password)) {
    $Password = sha1(mysqli_real_escape_string($connection, $_POST['Password']));
} else {
    array_push($json['errorLog'], "Password must not be empty");
}


if (isset($adminName) and isset($Password)) {

        $sql = 'SELECT adminID,adminName,Password FROM admins WHERE Password="' . $Password . '" AND adminName="' . $adminName . '"';
        $query = mysqli_query($connection, $sql) or die(mysqli_error($connection));


        if (mysqli_num_rows($query)) {
                $row = mysqli_fetch_array($query);

                $json["successLog"]="Login Successfull!";
                $_SESSION['adminName']=$adminName;
                $_SESSION['adminID']=$row[0];
            }
        } else {
            array_push($json['errorLog'], "adminName or Password does not match!");
}

$json_e = json_encode($json);

echo $json_e;

?>