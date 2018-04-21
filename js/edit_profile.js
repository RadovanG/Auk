$(document).ready(function () {

    var emailReg = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;


    $('#forma').submit(function (e) {
        e.preventDefault();

        var errorEmail=true;
        var errorAddress=true;
        var errorPhone=true;
        var errorCity=true;
        var errorFirstName=true;
        var errorLastName=true;

        var email = $('#email').val().trim();
        var address=$('#address').val().trim();
        var phone=$('#phone').val().trim();
        var city=$('#city').val().trim();
        var id=$("#userID").val().trim();
        var lastName=$('#lastName').val().trim();
        var firstName=$('#firstName').val().trim();
        if (lastName == "") {
            $('#errorLastName').css("display", "block");
            errorLastName = true;
        }
        else {
            $("#errorLastName").css("display", "none");
            errorLastName = false;
        }

        if (firstName == "") {
            $('#errorFirstName').css("display", "block");
            errorFirstName = true;
        }
        else {
            $("#errorFirstName").css("display", "none");
            errorFirstName = false;
        }

        if(!emailReg.test(email) || email == "")
        {
            $('#errorEmail').css("display", "block");
            errorEmail = true;
        }
        else
        {
            $("#errorEmail").css("display", "none");
            errorEmail = false;
        }





        if (address == "") {
            $('#errorAddress').css("display", "block");
            errorAddress = true;
        }
        else {
            $("#errorAddress").css("display", "none");
            errorAddress = false;
        }

        if (phone == "" || isNaN(phone)) {
            $('#errorPhone').css("display", "block");
            errorPhone = true;
        }
        else {
            $("#errorPhone").css("display", "none");
            errorPhone = false;
        }

        if (city == "") {
            $('#errorCity').css("display", "block");
            errorCity = true;
        }
        else {
            $("#errorCity").css("display", "none");
            errorCity = false;
        }

        if (firstName == "") {
            $('#errorFirstName').css("display", "block");
            errorFirstName = true;
        }
        else {
            $("#errorFirstName").css("display", "none");
            errorFirstName = false;
        }
        if (lastName == "") {
            $('#errorLastName').css("display", "block");
            errorLastName = true;
        }
        else {
            $("#errorLastName").css("display", "none");
            errorLastName = false;
        }
        if (!errorEmail  && !errorPhone &&!errorCity && !errorLastName && !errorFirstName) {


            $.ajax({
                type: "POST",
                url: "edit_profile-db.php",
                cache: false,
                data:  { id:id, email: email ,address : address,phone : phone,city : city,firstName:firstName, lastName:lastName },
                success: successFnc,
                error: errorFnc,
                dataType: "json"
            });

            function successFnc(data, status, xhr) {
                if(data.successReg!=""){
                    alert(data.successReg);
                }
                window.location.replace('logout.php')
            }

            function errorFnc(xhr, status, error) {

            }

        }

    });

    return false;
});

