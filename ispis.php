<?php

include_once("db_config.php");
include_once("menu.php")

?>







<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pocetna stanica</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="tabela1.css"/>
</head>
<body>


<form action="saveimage.php" enctype="multipart/form-data" method="post">
    <input name="uploadedimage" type="file">

    <input name="Upload Photo" type="submit" value="Upload Image">
</form>


<div class="divside"> <?php
    include_once("sidemenu.php");
    ?> </div>
<div class="divmain">
    <h1>REZERVIŠITE VAŠE KARTE ZA BIOSKOP ONLINE!</h1>
    <h1>Najnoviji filmovi u bioskopovima</h1>
    <?php


    $sql = "SELECT articleName, articleUserDes, articleState, articleTimePosted, articleTimeExpires,  ";


    // Listaju se filmovi iz baze films, redjaju se po tome kada su dodati u bazu. Limit prikaza je na 4 najnovija.
    $sql = "SELECT `FilmID`, `FName`, `FDescription`, `FActors`, `FGenre`, `FYear`, `F3D`, `FImage`, `AddedOn` FROM `films` order by `AddedOn` desc limit 4";

    $result = $con->query($sql);
    // AKO postoje filmovi u bazi ispisuju se u formatu tabele: Slika koristi naziv.jpg il sl. iz baze a tu se dodaje cela putanja...
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<table class="tabelafilmova">
<tr><td rowspan="6" class="tabimg"><img src="images/' . $row["FImage"] . '" class="imgfilm" alt="Slikafilm"/></td>
<td class="naziv">' . $row["FName"] . '</td></tr>
<tr><td class="zanr">' . $row["FGenre"] . ' , ' . $row["FYear"] . '</td></tr>
<tr><td class="opis">' . $row["FDescription"] . '</td></tr>
<tr><td class="glumci">' . $row["FActors"] . '</td></tr>
<tr><td class="termini"><a href="termini.php?film=' . $row["FilmID"] . '">PROVERI TERMINE ZA OVAJ FILM</a></td></tr>
</table>';
        }
    } else {
        echo "No films.";
    }

    ?>
</div>


</body>
</html>






