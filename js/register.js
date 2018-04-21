$(document).ready(function () {

    var emailReg = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

    var errorFirstName=true;
    var errorLastName=true;
    var errorUsername=true;
    var errorPassword=true;
    var errorRepeatPassword=true;
    var errorAddress=true;
    var errorCity=true;
    var errorPhone=true;
    var errorEmail=true;


    $("#firstName").keyup(function () {

        var firstName=$("#firstName").val().trim();
        if (firstName == "") {
            $('#errorFirstName').css("display", "block");
            errorFirstName = true;
        }
        else {
            $("#errorFirstName").css("display", "none");
            errorFirstName = false;
        }

    });
    $("#lastName").keyup(function () {

        var lastName=$("#lastName").val().trim();
        if (lastName == "") {
            $('#errorLastName').css("display", "block");
            errorLastName = true;
        }
        else {
            $("#errorLastName").css("display", "none");
            errorLastName = false;
        }

    });

    $("#username").keyup(function () {
        var username=$("#username").val().trim();
        if (username == "") {
            $('#errorUsername').css("display", "block");
            errorUsername = true;
        }
        else {
            $("#errorUsername").css("display", "none");
            errorUsername = false;
        }

    });

    $("#password").keyup(function () {
        var password=$("#password").val().trim();
        if (password == "") {
            $('#errorPassword').css("display", "block");
            errorPassword = true;
        }
        else {
            $("#errorPassword").css("display", "none");
            errorPassword = false;
        }

    });

    $("#confirm").keyup(function () {
        var password=$("#password").val().trim();
        var repeatPassword=$("#confirm").val().trim();
        if (repeatPassword == "" || password!=repeatPassword) {
            $('#errorPassword').css("display", "block");
            errorPassword= true;
        }
        else {
            $("#errorPassword").css("display", "none");
            errorPassword = false;
        }

    });


    $("#address").keyup(function () {
        var address=$("#address").val().trim();

        if (address == "") {
            $('#errorAddress').css("display", "block");
            errorAddress = true;
        }
        else {
            $("#errorAddress").css("display", "none");
            errorAddress = false;
        }

    });
    $("#city").keyup(function () {

        var city=$("#city").val().trim();
        if (city == "") {
            $('#errorCity').css("display", "block");
            errorCity = true;
        }
        else {
            $("#errorCity").css("display", "none");
            errorCity = false;
        }

    });
    $("#phone").keyup(function () {

        var phone=$("#phone").val().trim();
        if (phone == "" || isNaN(phone)) {
            $('#errorPhone').css("display", "block");
            errorPhone = true;
        }
        else {
            $("#errorPhone").css("display", "none");
            errorPhone = false;
        }

    });
    $("#email").keyup(function () {
        var email=$("#email").val().trim();
        if (!emailReg.test(email) || email == "") {
            $('#errorEmail').css("display", "block");
            errorEmail = true;

        }
        else {
            $("#errorEmail").css("display", "none");
            errorEmail = false;
        }

    });

    $('#forma').submit(function (e) {
        e.preventDefault();

        if (errorEmail) {
            $('#errorEmail').css("display", "block");
        }
        if (errorUsername) {
            $('#errorUsername').css("display", "block");
        }

        if (errorPassword) {
            $('#errorPassword').css("display", "block");
        }
        if (errorAddress) {
            $('#errorAddress').css("display", "block");
        }

        if (errorPhone) {
            $('#errorPhone').css("display", "block");
        }
        if (errorCity) {
            $('#errorCity').css("display", "block");
        }
        if (errorFirstName) {
            $('#errorCountry').css("display", "block");
        }
        if (errorLastName) {
            $('#errorCountry').css("display", "block");
        }



        if (!errorEmail && !errorUsername && !errorPassword && !errorPhone &&!errorCity && !errorLastName && !errorFirstName) {
            var username = $('#username').val().trim();
            var password=$('#password').val().trim();
            var email = $('#email').val().trim();;
            var address=$('#address').val().trim();
            var phone=$('#phone').val().trim();
            var city=$('#city').val().trim();
            var lastName=$('#lastName').val().trim();
            var firstName=$('#firstName').val().trim();


            $.ajax({
                type: "POST",
                url: "register-db.php",
                cache: false,
                data:  { username : username, password : password,email: email ,address : address,phone : phone,city : city,lastName : lastName,firstName : firstName  },
                success: successFnc,
                error: errorFnc,
                dataType: "json"
            });

            function successFnc(data, status, xhr) {
                if(data.successReg!=""){
                    alert(data.successReg);
                }
                window.location.replace('login.php')
            }

            function errorFnc(xhr, status, error) {
                if(error.errorReg!=[]){
                    alert(error.errorReg);
                }

            }

        }

    });

    return false;
});

