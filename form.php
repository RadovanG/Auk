<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<?php if(!isset($_SESSION))
{
include_once('db_config.php');
    session_start();
}?>
<html>
<head>
    <title>upis</title>
</head>
<body>
<?php
include('header.php');?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
            <?php
            $sql = "SELECT * FROM category";
            $result = $connection->query($sql);
            ?>
            <div id="category">
                <ul class="category">
                    <?php
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<li><a href='".$row['categoryID']."'>".$row['categoryName']."</a></li>";

                        $sql1="SELECT * FROM subcategory WHERE categoryID = '".$row['categoryID']."'";
                        $result1 = $connection->query($sql1);
                        echo "<ul class='subcategory'>";
                        while ($row = mysqli_fetch_array($result1))
                        {
                            echo "<li><a href='".$row['subcategoryID']."'>".$row['subcategoryName']."</a></li>";
                        }
                        echo "</ul></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
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

    <input name="Send your product!" type="submit" value="Send">
</form>
        </div>
    </div>
</div>

</body>
</html>