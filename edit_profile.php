<?php if(!isset($_SESSION))
{
    session_start();
}?>
<?php
include ('db_config.php');
$id=$_SESSION['userID'];
$sql="SELECT * from users where userID=$id";
$query=mysqli_query($connection,$sql);

if(mysqli_num_rows($query)>0)
{
    while($row=mysqli_fetch_array($query))
    {
        echo '
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
               <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet" type="text/css">
               <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">';

echo'<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h5>Edit you profile</h5>
            <form id="forma">

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>
                <span id="errorPassword" hidden="hidden" style="color:red">Password must not be empty!</span>
                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div>

 <div class="form-group">
                    <label for="firstName" class="cols-sm-2 control-label">First Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="firstName" id="firstName"  placeholder="Enter your First Name"/>
                        </div>
                    </div>
                </div>
                <span id="errorFirstName" hidden="hidden" style="color:red">Error First name must not be empty!</span>

                <div class="form-group">
                    <label for="lastName" class="cols-sm-2 control-label">Last Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="lastName" id="lastName"  placeholder="Enter your Last name"/>
                        </div>
                    </div>
                </div>
                <span id="errorLastName" hidden="hidden" style="color:red">Error Last name must not be empty!</span>
                
                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" id="email" value="'.$row['email'].'" placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>
                <span id="errorEmail" hidden="hidden" style="color:red">Error your email must be valid, and not empty!</span>

                <div class="form-group">
                    <label for="address" class="cols-sm-2 control-label">Your address</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address" id="address"  value="'.$row['address'].'" placeholder="Enter your Address"/>
                        </div>
                    </div>
                </div>
                <span id="errorAddress" hidden="hidden" style="color:red"></span>

                <div class="form-group">
                    <label for="phone" class="cols-sm-2 control-label">Phone number</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone" id="phone" value="'.$row['phone'].'"  placeholder="Enter your number"/>
                        </div>
                    </div>
                </div>
                <span id="errorPhone" hidden="hidden" style="color:red">Phone must not be empty!</span>

                <div class="form-group">
                    <label for="city" class="cols-sm-2 control-label">Your city</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="city" id="city" value="'.$row['city'].'" placeholder="Enter your City"/>
                        </div>
                    </div>
                </div>
                <span id="errorCity" hidden="hidden" style="color:red">City must not be empty!</span>
                <input type="text" id="userID" hidden="hidden" value="'.$row['userID'].'">
                 
                    <input type="submit" id="submit" class="btn btn-primary btn-lg btn-block " style="background-color:#264d73;" value="Update">
                </div>

            </form>
        </div>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/edit_profile.js"></script>
<script src="js/bootstrap.min.js"></script>';
    }
}
