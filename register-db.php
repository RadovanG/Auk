<?php
include ('db_config.php');
$firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
$lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
$username=mysqli_real_escape_string($connection,$_POST['username']);
$password=sha1(mysqli_real_escape_string($connection,$_POST['password']));
$address=mysqli_real_escape_string($connection,$_POST['address']);
$city=mysqli_real_escape_string($connection,$_POST['city']);
$phone=mysqli_real_escape_string($connection,$_POST['phone']);
$email=mysqli_real_escape_string($connection,$_POST['email']);
$userBirthday=mysqli_real_escape_string($connection,$_POST['userBirthday']);






//var_dump($firstName,$lastName,$username,$password,$address,$city,$phone,$email,$userBirthday);

//Inicijalizovanje Array-a
$json = array("errorReg" => array(), "successReg" => "");

// If za proveru da li je prazan data
if (!empty($firstName)) {
    $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
}
else {
    array_push($json['errorReg'], "First Name must not be empty");
}

if (!empty($lastName)) {
    $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
}
else {
    array_push($json['errorReg'], "Last Name must not be empty");
}

if (!empty($username)) {
    $username=mysqli_real_escape_string($connection,$_POST['username']);
} // U slucaju da nije, push JSON to array, da bi kasnije to stavili u DIV
else {
    array_push($json['errorReg'], "Username must not be empty");
}


if (!empty($password)) {
    $password=sha1(mysqli_real_escape_string($connection,$_POST['password']));
} else {
    array_push($json['errorReg'], "Password must not be empty");
}

if (!empty($address)) {
    $address=mysqli_real_escape_string($connection,$_POST['address']);
} else {
    array_push($json['errorReg'], "Address must not be empty");
}

if (!empty($city)) {
    $city=mysqli_real_escape_string($connection,$_POST['city']);;
} else {
    array_push($json['errorReg'], "City must not be empty");
}

if (!empty($phone)) {
    $phone=mysqli_real_escape_string($connection,$_POST['phone']);
} else {
    array_push($json['errorReg'], "Phone must not be empty");
}

if (!empty($email)) {
    $email=mysqli_real_escape_string($connection,$_POST['email']);
} else {
    array_push($json['errorReg'], "Email must not be empty");
}



if (isset($firstName) and isset($lastName) and isset($username) and isset($password) and isset($address) and isset($city) and isset($phone) and isset($email) and isset($userBirthday)) {


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $sql = 'SELECT username,email FROM users WHERE email="' . $email . '" AND username="' . $username . '"';
        $query = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        if (mysqli_num_rows($query) == 0) {
            $sql = 'INSERT INTO users (firstName,lastName,username,password,address,city,phone,email,userPhoto,userBirthday) VALUES ("' . $firstName . '","' . $lastName . '","' . $username . '","' . $password . '","' . $address . '","' . $city . '","' . $phone . '","' . $email . '","' ."images\genericProfileIcon.jpg" . '","' . $userBirthday . '")';
            $query = mysqli_query($connection, $sql) or die(mysqli_error($connection));

            if ($query) {
                $json["successReg"]="Successful registration!";
            }
        } else {
            array_push($json['errorReg'], "Email or username already exists in our database");
        }
    }

}

$json_e = json_encode($json);

echo $json_e;

?>