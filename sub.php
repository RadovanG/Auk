<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','bizkodaukcije');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM subcategory WHERE categoryID = '".$q."'";
$result = mysqli_query($con,$sql);
if($q!="none")
{
    echo "<select name=\"subcategory\">";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['subcategoryID'] . "'>" . $row['subcategoryName'] . "</option>";
    }
    echo "</select>";
};
?>
