<?php include('html.php') ?>
<div class="container">
    <div class="col">
    <div class="row row-6" >
    <div class="col-6">
        <div>Name:
        <input type="text" name="title"></div><br/>

        <div>Category:
        <select name="category">
                <option disabled selected value> -- choose -- </option>
                <?php
                while (@$row = mysqli_fetch_array(@$result))
                {
                    echo "<option value='".$row['category']."'>".$row['category']."</option>";
                }
                ?>
            </select></div><br/>

        <div>Subcategory:
        <select name="subcategory">
                <option disabled selected value> -- choose -- </option>
                <?php
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<option value='".$row['subcategory']."'>".$row['subcategory']."</option>";
                }
                ?>
            </select></div><br/>

        <div>Start bid:
        <input type="text" name="state"></div><br/>

        <div>Cost:
        <input type="text" name="start"></div><br/>

        <div>Buy now:
        <input type="text" name="buy"></div><br/>
    </div>
    <div class="col-6">
        <div>Description: </div>
        <div><textarea rows="4" cols="25" name="desc"></textarea></div><br/>

        <div><input type="file" name="imgage" value="UPLOAD PHOTO"></div><br/>
    </div>
    </div>
    <div class="row-6">
        <div>Is it charitable?
            <input type="radio" name="donate" value="yes">yes
            <input type="radio" checked="checked" name="donate" value="no">no</div><br/>

        <div>
            If yes<br/>
            Donate to <select name="category">
                    <option disabled selected value> -- choose -- </option>
                    <?php
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<option value='".$row['donation']."'>".$row['donation']."</option>";
                    }
                    ?>
                </select>
        </div>
    </div>
    </div>
</div>