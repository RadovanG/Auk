<?php
include('html.php');
include('db_config.php');
$getUserID=$_GET['userid'];
?>
<div class="container-fluid">
    <div class="row">

        <div class="divmain">
            <h3>User profile!</h3>

            <?php




             $sql = "SELECT * FROM `users` WHERE UserID=$getUserID";

            $result = $connection->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<table class="tabelafilmova">
<tr><td rowspan="6" class="tabimg"><img src="' . $row["userPhoto"] . '" class="imguser" alt="userphoto"/></td>
<td class="naziv"> Name:  ' . $row["lastName"] .  $row["firstName"] .'</td></tr>
<tr><td class="zanr"> Username:  ' . $row["username"] . '</td></tr>
<tr><td class="opis"> Date Registered:  ' . $row["dateRegistered"] . '</td></tr>
<tr><td class="glumci"> Date Last Login:  ' . $row["dateLastLogin"] . '</td></tr>

</table>';
                }
            } else {
                echo "User not found.";
            }

            ?>
        </div>

    </div>


