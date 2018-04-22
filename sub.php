<?php
include_once("db_config.php");
?>
<?php
$category = array();

$sql = "SELECT categoryID,categoryName
FROM category
ORDER BY categoryName ASC";

$result= mysqli_query($connection,$sql) or die(mysqli_error($connection));
if (mysqli_num_rows($result)>0)
{
    while ($record = mysqli_fetch_array($result))
    {
        $category[$record['categoryID']] = $record['categoryName'];
        var_dump($category);
    }
}
var_dump($category);
$sub_category = array();
foreach ($category as $k=>$v)
{
    $sql = "SELECT subcategoryID, subcategoryName, categoryID
			FROM subcategory
			WHERE categoryID = '$k'";

    $result= mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result))
        {
            $sub_category["$v"][] = $record['subcategoryName'];
            var_dump($sub_category);
        }
    }
}
?>
<script type="text/javascript">
    <?php

</script>
</body>
</html>