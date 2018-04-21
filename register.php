<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom_bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h5>Sign up for Auctions</h5>
            <form id="forma">

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
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                        </div>
                    </div>
                </div>
                <span id="errorUsername" hidden="hidden" style="color:red">Error username exists, or must not be empty!</span>

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
                    <label for="address" class="cols-sm-2 control-label">Your address</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address" id="address"  placeholder="Enter your Address"/>
                        </div>
                    </div>
                </div>
                <span id="errorAddress" hidden="hidden" style="color:red"></span>

                <div class="form-group">
                    <label for="city" class="cols-sm-2 control-label">Your city</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="city" id="city"  placeholder="Enter your City"/>
                        </div>
                    </div>
                </div>
                <span id="errorCity" hidden="hidden" style="color:red">City must not be empty!</span>

                <div class="form-group">
                    <label for="phone" class="cols-sm-2 control-label">Phone number</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your number"/>
                        </div>
                    </div>
                </div>
                <span id="errorPhone" hidden="hidden" style="color:red">Phone must not be empty and must be only numbers!</span>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>
                <span id="errorEmail" hidden="hidden" style="color:red">Error your email must be valid, and not empty!</span>

                <div class="form-group">
                    <label for="userBirthday" class="cols-sm-2 control-label">Your Birthday</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="date" class="form-control" name="userBirthday" id="userBirthday"  />
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <input type="submit" id="submit" class="btn btn-primary btn-lg btn-block " style="background-color:#264d73;" value="Register">
                </div>

            </form>
        </div>
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/register.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>