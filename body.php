<?php
include('html.php');
include('db_config.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
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
        <div class="col-md-10">
        </div>
    </div>
</div>


