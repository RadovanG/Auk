<!DOCTYPE html>
<?php
include_once('db_config.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<form action=>
    <h3>User registration:</h3><br/>
    <div>Username:</div>    <div><input type="text" name="name"></div><br/>
    <div>Fist name:</div>   <div><input type="text" name="fname"></div><br/>
    <div>Last name:</div>   <div><input type="text" name="lname"></div><br/>
    <div>Email:</div>       <div><input type="text" name="email"></div><br/>
    <div>Address:</div>     <div><input type="text" name="address"></div><br/>
    <div>City:</div>        <div><input type="text" name="city"></div><br/>
    <div>Phone:</div>       <div><input type="text" name="phone"></div><br/>
    <div>Image:</div>       <div><input type="file" name="img"></div>
</form>

<?php

?>

<form name="test" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <h3>Post:</h3><br/>
    <div>Title:</div>       <div><input type="text" name="articleName"></div><br/>
    <div>Description:</div> <div><textarea rows="4" cols="40" name="articleUserDes"></textarea></div><br/>
    <div>State:</div>       <div><input type="text" name="articleState"></div><br/>
    <div>Start cost:</div>        <div><input type="text" name="firstBidPrice"></div><br/>
    <div>Buy Now Cost:</div>        <div><input type="text" name="articleCostBuy"></div><br/>
    <div>Category:</div>

<div>
    <select name="category">
            <?php
            $test = "SELECT categoryID, categoryName FROM category ORDER BY categoryName ASC ";
            $result = $connection->query($test);

            while ($row = mysqli_fetch_array($result))
            {
                echo "<option value='".$row['categoryID']."'>".$row['categoryName']."</option>";
            }
            ?>
        </select>

    <select name="subcategory">
        <option value="select">select</option>
        <?php
        $test = "SELECT subcategoryID, subcategoryName FROM subcategory ORDER BY subcategoryName ASC ";
        $result = $connection->query($test);

        while ($row = mysqli_fetch_array($result))
        {
            echo "<option value='".$row['subcategoryID']."'>".$row['subcategoryName']."</option>";
        }
        ?>
    </select>


    <div>Image:</div>       <div> <input name="uploadedimage" type="file"></div>

    <div>Donation:</div>    <div><input type="radio" name="articleDonation" value="1">Yes
        <input type="radio" checked="checked" name="articleDonation" value="0">No</div><br/>

    <div>
        If yes<br/>
        Donate to <select name="category">
            <option disabled selected value> -- choose -- </option>
            <?php
            while ($row = mysqli_fetch_array($result))
            {
                echo "<option value='".$row['donation']."'>".$row['donation']."</option>";
            }
            ?>
        </select>
    </div>
</form>
<?php
if (isset($_REQUEST['FName']) ){
// Brisanje karaktera koji mogu ugroziti bazu podataka.
//$f... film name, description, actors,...
$articleName = stripslashes($_REQUEST['articleName']);
//takodje.
$articleName = mysqli_real_escape_string($connection,$articleName);
$articleUserDes = stripslashes($_REQUEST['articleUserDes']);
$articleUserDes = mysqli_real_escape_string($connection,$articleUserDes);

$articleState = stripslashes($_REQUEST['articleState']);
$articleState = mysqli_real_escape_string($connection,$articleState);

$firstBidPrice = stripslashes($_REQUEST['firstBidPrice']);
$firstBidPrice = mysqli_real_escape_string($connection,$firstBidPrice);


$articleCostBuy = stripslashes($_REQUEST['articleCostBuy']);
$articleCostBuy = mysqli_real_escape_string($connection,$articleCostBuy);

$articleDonation = stripslashes($_REQUEST['articleDonation']);
$articleDonation = mysqli_real_escape_string($connection,$articleDonation);

$category = stripslashes($_REQUEST['category']);
$category = mysqli_real_escape_string($connection,$category);

$subcategory = stripslashes($_REQUEST['subcategory']);
$subcategory = mysqli_real_escape_string($connection,$subcategory);


//pristup bazi podataka
$query = "INSERT into `articles` (FName, FDescription, FActors, FGenre, FYear, F3D, FImage )
VALUES ('$fname', '$fdescription', '$factors', '$fgenre', '$fyear', '$f3d', '$fimage')";

    $result = mysqli_query($con,$query);
    //ispis ako je uspešno dodavanje filma u bazu podataka
    if($result){
        echo "<div class='form'>
        <h3>Uspešno ste dodali film! <a href='index.php'>Povratak na glavnu stranicu.</a></h3>
        <br/> <a href='dodajfilm.php'>Kliknite ovde da dodate još filmova.</a></div>";
    }
}else{
// u suprotnom se forma ponovno pojavljuje.

};
?>

?>
</body>
</html>