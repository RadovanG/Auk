<?php include('db_config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                    xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                };
                xmlhttp.open("GET","sub.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<body>



Category:
<select name="categoryname" onchange="showUser(this.value)">
    <option value="none">None</option>
    <?php
    $sql = "SELECT * FROM category";
    $result = $connection->query($sql);

    while ($row = mysqli_fetch_array($result))
    {
        echo "<option value='".$row['categoryID']."'>".$row['categoryName']."</option>";
    }
    ?>
</select>

<br/>
<div id="txtHint">y</div>
