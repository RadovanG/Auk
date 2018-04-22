<?php
include('html.php');
include('db_config.php');
include('auth.php');
?>
<?php
if(strlen(@$_POST["bid"])>1) {
    $userIDins = $_SESSION["userID"];
    $articleID = $_POST["articleID"];

    $bid = $_POST["bid"];
    $firstBidPrice = $_POST["firstBidPrice"];

    var_dump($_POST);

    $bid = stripslashes($_REQUEST['bid']);
    $bid = mysqli_real_escape_string($connection, $bid);

    $sql = "SELECT * FROM bids WHERE articleID=$articleID ORDER BY bidValue DESC LIMIT 1";

    $result = $connection->query($sql);

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $highestbid = $row['bidValue'];
        }
    } else {

    }

    if (isset($highestbid)) {
        if ($bid > $highestbid) {
            $sql = "INSERT INTO bids (articleID, userID, bidValue)
VALUES ($articleID,$userIDins,$bid)";
            $result = $connection->query($sql);
        }

    }else {
        if ($bid > $firstBidPrice) {
            var_dump($articleID);
            $sql = "INSERT INTO bids (articleID, userID, bidValue)
VALUES ($articleID,$userIDins,$bid)";
            if (mysqli_query($connection, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

        } else {
            echo "Your offer is lower than the current highest bid!";
        }
    };
}
?>
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
                        echo "<li><a style=\"color:#fff;\"href='".$row['categoryID']."'>".$row['categoryName']."</a></li>";

                        $sql1="SELECT * FROM subcategory WHERE categoryID = '".$row['categoryID']."'";
                        $result1 = $connection->query($sql1);
                        echo "<ul class='subcategory'>";
                        while ($row = mysqli_fetch_array($result1))
                        {
                            echo "<li><a style=\"color:#fff;\" href='".$row['subcategoryID']."'>".$row['subcategoryName']."</a></li>";
                        }
                        echo "</ul></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <?php
                $sql = "SELECT * FROM articles";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                $record = mysqli_fetch_array($result);

                while ($record = mysqli_fetch_array($result)) {
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-6\">";
                    $thisID=$record["articleID"];

                    echo "<img src=\"".$record["articlePhoto"]."\" width=300 class=\"rounded float-left\" width=\"100%\"  alt=\"opis slike\">";
                    echo "</div>";
                    echo "<div class=\"col-6\">";
                    echo "<a href=\"link_od_proizvoda\"> ".$record["articleUserDes"] ." </a>";
                    echo "<p class=\"text-muted\"> Opis: ".$record["articleUserDes"] ."</p>";
                    echo "<p class=\"text-muted\"> Cena kupi odmah:  ". $record["articleCostBuyNow"]."</p>";

                    echo "<br/>";
                    $firstBidPrice=$record["firstBidPrice"];
                    echo " <br/>";

                    $sqla="SELECT * FROM bids WHERE articleID=$thisID ORDER BY bidValue desc LIMIT 1";
                    @$resulta = mysqli_query($connection, $sqla) or die(mysqli_error($connection));

                        @$recorda = mysqli_fetch_array($resulta);
                        @$highprice = @$recorda["bidValue"];

                        if ($firstBidPrice > $highprice)
                            $price = $firstBidPrice;

                    else {
                        $price = $highprice;
                    }
                    echo "<p class=\"text-muted\"> Trenutni bid:  ".$price."</p>";

                  ?>  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="bid"/>
<input type="hidden" name="articleID" value="<?php echo $thisID;?>">

<input type="hidden" name="firstBidPrice" value="<?php echo $firstBidPrice;?>">

                        <input type="submit" name="placeabid" value="bid">
</form>

<?php


                    echo "  <p style=\"\" </p>";
                    echo "</div>";
                    echo "</div>";

                }

                ?>
                </div>
                <br/>


        </div>
    </div>
</div>


