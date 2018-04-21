<?php
include ('db_config.php');

$password=sha1(mysqli_real_escape_string($connection,$_POST['password']));
$email=mysqli_real_escape_string($connection,$_POST['email']);
$firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
$lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
$address=mysqli_real_escape_string($connection,$_POST['address']);
$phone=mysqli_real_escape_string($connection,$_POST['phone']);
$city=mysqli_real_escape_string($connection,$_POST['city']);
$id=mysqli_real_escape_string($connection,$_POST['id']);



//Inicialitaion of  Array
$json = array("errorReg" => array(), "successReg" => "");

// Check to see if its emtpy

if (!empty($password)) {
    $password=sha1(mysqli_real_escape_string($connection,$_POST['password']));
} else {
    array_push($json['errorReg'], "Password must not be empty");
}


if (!empty($email)) {
    $email=mysqli_real_escape_string($connection,$_POST['email']);
} else {
    array_push($json['errorReg'], "Email must not be empty");
}

if (!empty($address)) {
    $address=mysqli_real_escape_string($connection,$_POST['address']);
} else {
    array_push($json['errorReg'], "Address must not be empty");
}
if (!empty($phone)) {
    $phone=mysqli_real_escape_string($connection,$_POST['phone']);
} else {
    array_push($json['errorReg'], "Phone must not be empty");
}

if (!empty($city)) {
    $city=mysqli_real_escape_string($connection,$_POST['city']);;
} else {
    array_push($json['errorReg'], "City must not be empty");
}

if (!empty($firstName)) {
    $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);

} else {
    array_push($json['errorReg'], "Country must not be empty");
}

if (!empty($lastName)) {
    $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);

} else {
    array_push($json['errorReg'], "Country must not be empty");
}




if (isset($email) and isset($password) and isset($address) and isset($phone) and isset($city) and isset($firstName) and isset($lastName)) {
        $sql="UPDATE users SET password='$password',email='$email',address='$address',phone='$phone',city='$city',firstName='$firstName',lastName='$lastName' WHERE userID=$id";
        $query=mysqli_query($connection,$sql);
        if ($query) {
            $json["successReg"]="Successfull update!";
    }

}

$json_e = json_encode($json);

echo $json_e;

?>