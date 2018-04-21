<?php
include("db_config.php");

?>
<?php
if (isset($_REQUEST['articleName']) ){

var_dump($_REQUEST);

$articleName = stripslashes($_REQUEST['articleName']);
$articleName = mysqli_real_escape_string($connection,$articleName);

$articleUserDes = stripslashes($_REQUEST['articleUserDes']);
$articleUserDes = mysqli_real_escape_string($connection,$articleUserDes);

$articleState = stripslashes($_REQUEST['articleState']);
$articleState = mysqli_real_escape_string($connection,$articleState);

$subcategory = stripslashes($_REQUEST['subcategory']);
$subcategory = mysqli_real_escape_string($connection,$subcategory);

$firstBidPrice = stripslashes($_REQUEST['firstBidPrice']);
$firstBidPrice = mysqli_real_escape_string($connection,$firstBidPrice);

$articleCostBuy = stripslashes($_REQUEST['articleCostBuy']);
$articleCostBuy = mysqli_real_escape_string($connection,$articleCostBuy);

$articleDonation = stripslashes($_REQUEST['articleDonation']);
$articleDonation = mysqli_real_escape_string($connection,$articleDonation);

  $query="INSERT into `articles` (articleName`, `articleUserDes`, `subCatID`, `articleState`, `articleCostBuyNow`, `firstBidPrice`, `articleDonation`) 
VALUES ('$articleName', '$articleUserDes', $subcategory, '$articleState', $articleCostBuy, $firstBidPrice, $articleDonation)";

    $result = mysqli_query($connection,$query);

    //ispis ako je uspešno dodavanje filma u bazu podataka
    if($result) {
        echo "<div class='form'>
        <h3>Uspešno ste dodali predmet! Blavo!</h3>
        </div>";
    }else{
    echo "Greska!!";}

}
?>