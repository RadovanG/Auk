<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<form>
    <h3>User registration:</h3><br/>
    <div>Username:</div>    <div><input type="text" name="name"></div><br/>
    <div>Fist name:</div>   <div><input type="text" name="fname"></div><br/>
    <div>Last name:</div>   <div><input type="text" name="lname"></div><br/>
    <div>Email:</div>       <div><input type="text" name="email"></div><br/>
    <div>Address:</div>     <div><input type="text" name="address"></div><br/>
    <div>City:</div>        <div><input type="text" name="city"></div><br/>
    <div>Phone:</div>       <div><input type="text" name="phone"></div><br/>
    <div>Image:</div>       <div><input type="file" name="img"></div>
</form>

<form>
    <h3>Post:</h3><br/>
    <div>Title:</div>       <div><input type="text" name="title"></div><br/>
    <div>Description:</div> <div><textarea rows="4" cols="40" name="desc"></textarea></div><br/>
    <div>State:</div>       <div><input type="text" name="state"></div><br/>
    <div>Cost:</div>        <div><input type="text" name="cost"></div><br/><div>Category:</div>
    <div><select name="category">
            <option disabled selected value> -- choose -- </option>
            <option value="computers">Computers</option>
            <option value="Sheep">Sheep</option>
            <option value="weapons">Weapons</option>
            <option value="other">Other</option>
        </select></div><br/>
    <div>Donation:</div>    <div><input type="radio" name="donate" value="yes">yes
                                 <input type="radio" name="donate" value="no">no</div><br/>
    <div>Image:</div>       <div><input type="file" name="imgage"></div>
</form>
</body>
</html>