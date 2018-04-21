<?php
include("db_config.php");

?>
<?php
if (isset($_REQUEST['articleName']) ) {


    $articleName = stripslashes($_REQUEST['articleName']);
    $articleName = mysqli_real_escape_string($connection, $articleName);

    $articleUserDes = stripslashes($_REQUEST['articleUserDes']);
    $articleUserDes = mysqli_real_escape_string($connection, $articleUserDes);

    $articleState = stripslashes($_REQUEST['articleState']);
    $articleState = mysqli_real_escape_string($connection, $articleState);

    $subcategory = stripslashes($_REQUEST['subcategory']);
    $subcategory = mysqli_real_escape_string($connection, $subcategory);

    $firstBidPrice = stripslashes($_REQUEST['firstBidPrice']);
    $firstBidPrice = mysqli_real_escape_string($connection, $firstBidPrice);

    $articleCostBuy = stripslashes($_REQUEST['articleCostBuy']);
    $articleCostBuy = mysqli_real_escape_string($connection, $articleCostBuy);

    $articleDonation = stripslashes($_REQUEST['articleDonation']);
    $articleDonation = mysqli_real_escape_string($connection, $articleDonation);

    function GetImageExtension($imagetype)
    {
        if (empty($imagetype)) return false;

        switch ($imagetype) {

            case 'image/bmp':
                return '.bmp';
            case 'image/gif':
                return '.gif';
            case 'image/jpeg':
                return '.jpg';
            case 'image/png':
                return '.png';
            default:
                return false;
        }
    }


    if (!empty($_FILES["uploadedimage"]["name"])) {

        $file_name = $_FILES["uploadedimage"]["name"];
        $temp_name = $_FILES["uploadedimage"]["tmp_name"];
        $imgtype = $_FILES["uploadedimage"]["type"];
        $ext = GetImageExtension($imgtype);
        $imagename = date("d-m-Y") . "-" . time() . $ext;
        $target_path = "images/user/" . $imagename;

    }
    if (move_uploaded_file($_FILES["uploadedimage"]["tmp_name"], $target_path)) {
        echo "The file " . basename($_FILES["uploadedimage"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $query = "INSERT into `articles` (`articleName`, `articleUserDes`, `subCatID`, `articleState`, `articleCostBuyNow`, `firstBidPrice`, `articleDonation`, `articlePhoto`, `articleTimeExpires`) 
VALUES ('$articleName', '$articleUserDes', $subcategory, '$articleState', $articleCostBuy, $firstBidPrice, $articleDonation, '$target_path',DATE_ADD(now(), INTERVAL 5 DAY) )";

    $result = mysqli_query($connection, $query);

    //ispis ako je uspešno dodavanje filma u bazu podataka
    if ($result) {
        echo "<div class='form'>
        <h3>Uspešno ste dodali predmet! Blavo!</h3>
        </div>";
    } else {

        echo mysqli_error($connection);
        echo "Greska!!";
    }
}

var_dump($_REQUEST);
var_dump($date)
?>