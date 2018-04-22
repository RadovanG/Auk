<?php
include('html.php');
include('db_config.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12"">
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
            <div class="row">
                <?php
                $sql = "SELECT * FROM articles";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                $record = mysqli_fetch_array($result);
                $thisID=$record["articleID"];

                while ($record = mysqli_fetch_array($result)) {
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-2\">";
                    echo "<img src=\"".$record["articlePhoto"]."\" class=\"rounded float-left\" width=\"100%\"  alt=\"opis slike\">";
                    echo "</div>";
                    echo "<div class=\"col-3\">";
                    echo "<a href=\"link_od_proizvoda\"> ".$record["articleUserDes"] ." </a>";
                    echo "<p class=\"text-muted\"> Opis: ".$record["articleUserDes"] ."</p>";
                    echo "<br/>";
                    echo " <br/>";

                    echo "<p class=\"text-muted\"> Trenutni bid:  ". $record["firstBidPrice"]."</p>";



                    echo "<p class=\"text-muted\"> Cena kupi odmah:  ". $record["articleCostBuyNow"]."</p>";


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


