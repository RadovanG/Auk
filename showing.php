<?php if(!isset($_SESSION))
{
    session_start();
}?>

<?php
include_once ('db_config.php');include('html.php');
?>
<html>
<head>

</head>
<body>

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
    echo "<a href=\"link_od_proizvoda\"> Proizvod </a>";
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

</body>
</html>
