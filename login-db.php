<?php
session_start();
include ('db_config.php');
$username=mysqli_real_escape_string($connection,$_POST['username']);
$password=sha1(mysqli_real_escape_string($connection,$_POST['password']));



//var_dump($username,$password,$email,$address,$phone,$city,$country);

//echo 'user '.$username.'<br/>';
//echo 'pass '.$password.'<br/>';

//Inicijalizovanje Array-a
$json = array("errorLog" => array(), "successLog" => "");

// If za proveru da li je prazan email data
if (!empty($username)) {
    $username=mysqli_real_escape_string($connection,$_POST['username']);
} // U slucaju da nije, push JSON to array, da bi kasnije to stavili u DIV
else {
    array_push($json['errorLog'], "Username must not be empty");
}


if (!empty($password)) {
    $password = sha1(mysqli_real_escape_string($connection, $_POST['password']));
} else {
    array_push($json['errorLog'], "Password must not be empty");
}


if (isset($username) and isset($password)) {

        $sql = 'SELECT userID,username,password FROM users WHERE password="' . $password . '" AND username="' . $username . '"';
        $query = mysqli_query($connection, $sql) or die(mysqli_error($connection));


        if (mysqli_num_rows($query)) {
                $row = mysqli_fetch_array($query);

                $json["successLog"]="Login Successfull!";
                $_SESSION['username']=$username;
                $_SESSION['userID']=$row[0];
            }
        } else {
            array_push($json['errorLog'], "Username or password does not match!");
}

$json_e = json_encode($json);

echo $json_e;

?>