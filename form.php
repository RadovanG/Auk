<!DOCTYPE html>
<?php
include_once('db_config.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<form name="test" method="post" enctype="multipart/form-data" action="saveimage.php">

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

    <div>Donation:</div>    <div><input type="radio" name="articleDonation" value="1" checked="checked">Yes
        <input type="radio"  name="articleDonation" value="9">No</div><br/>


    <input name="Send your product!" type="submit" value="Send">
</form>


</body>
</html>