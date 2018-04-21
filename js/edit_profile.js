$(document).ready(function () {

    var emailReg = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;


    $('#forma').submit(function (e) {
        e.preventDefault();

        var errorUsername=true;
        var errorPassword=true;
        var errorRepeatPassword=true;
        var errorEmail=true;
        var errorAddress=true;
        var errorPhone=true;
        var errorCity=true;
        var errorCountry=true;

        var password=$('#password').val().trim();
        var repeatPassword=$("#confirm").val().trim();
        var email = $('#email').val().trim();
        var address=$('#address').val().trim();
        var phone=$('#phone').val().trim();
        var city=$('#city').val().trim();
        var country=$('#country').val().trim();
        var id=$("#id_user").val().trim();

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


        if (password == "") {
            $('#errorPassword').css("display", "block");
            errorPassword = true;
        }
        else {
            $("#errorPassword").css("display", "none");
            errorPassword = false;
        }

        if (repeatPassword == "" || password!=repeatPassword) {
            $('#errorPassword').css("display", "block");
            errorPassword= true;
        }
        else {
            $("#errorPassword").css("display", "none");
            errorPassword = false;
        }
        if (repeatPassword == "" || password!=repeatPassword) {
            $('#errorPassword').css("display", "block");
            errorPassword= true;
        }
        else {
            $("#errorPassword").css("display", "none");
            errorPassword = false;
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

        if (country == "") {
            $('#errorCountry').css("display", "block");
            errorCountry = true;
        }
        else {
            $("#errorCountry").css("display", "none");
            errorCountry = false;
        }

        if (!errorEmail && !errorPassword && !errorPhone &&!errorCity && !errorCountry) {


            $.ajax({
                type: "POST",
                url: "edit_profile-db.php",
                cache: false,
                data:  { id:id, password : password,email: email ,address : address,phone : phone,city : city,country:country },
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

