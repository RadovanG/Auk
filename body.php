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
                <div class="col-2 prob ">
                    <img src="images/photo.png" class="rounded float-left" width="129-"  alt="opis slike">
                </div>
                <div class="col-3 proizvod">
                    <a href="link_od_proizvoda"> Proizvod </a>
                    <p class="text-muted"> Opis.........</p>
                    <br/>
                    <br/>

                    <p class="text-muted"> Cena: </p>
                    <p style="" </p>
                </div>
                <br/>

                <div class="col-2 prob">
                    <img src="images/photo.png" class="rounded float-left" width="100%"  alt="opis slike">
                </div>
                <div class="col-3 proizvod">
                    <a href="link_od_proizvoda "> Proizvod </a>
                    <p class="text-muted"> Opis........</p>
                    <br/>
                    <br/>

                    <p class="text-muted"> Cena: </p>

                </div>
        </div>
    </div>
</div>


