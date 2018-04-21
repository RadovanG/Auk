<?php
include ('db_config.php');

$password=sha1(mysqli_real_escape_string($connection,$_POST['password']));
$email=mysqli_real_escape_string($connection,$_POST['email']);
$address=mysqli_real_escape_string($connection,$_POST['address']);
$phone=mysqli_real_escape_string($connection,$_POST['phone']);
$city=mysqli_real_escape_string($connection,$_POST['city']);
$country=mysqli_real_escape_string($connection,$_POST['country']);
$id=mysqli_real_escape_string($connection,$_POST['id']);

//var_dump($id,$password,$email,$address,$phone,$city,$country);

//echo 'user '.$username.'<br/>';
//echo 'pass '.$password.'<br/>';;
//echo 'email '.$email.'<br/>';
//echo 'address '.$address.'<br/>';
//echo 'phone '.$phone.'<br/>';
//echo 'city '.$city.'<br/>';
//echo 'country '.$country.'<br/>';

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

if (!empty($country)) {
    $country=mysqli_real_escape_string($connection,$_POST['country']);

} else {
    array_push($json['errorReg'], "Country must not be empty");
}




if (isset($email) and isset($password) and isset($address) and isset($phone) and isset($city) and isset($country)) {
        $sql="UPDATE users SET password='$password',email='$email',address='$address',phone_number='$phone',city='$city',country='$country' WHERE id_user=$id";
        $query=mysqli_query($connection,$sql);
        if ($query) {
            $json["successReg"]="Successfull update!";
    }

}

$json_e = json_encode($json);

echo $json_e;

?>