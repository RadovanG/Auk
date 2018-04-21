$(document).ready(function () {

    var errorUsername=true;
    var errorPassword=true;

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

    $('#forma').submit(function (e) {
        e.preventDefault();


        if (errorUsername) {
            $('#errorUsername').css("display", "block");
        }

        if (errorPassword) {
            $('#errorPassword').css("display", "block");
        }

        if (!errorUsername && !errorPassword) {
            var username = $('#username').val().trim();
            var password=$('#password').val().trim();


            $.ajax({
                type: "POST",
                url: "login-db.php",
                cache: false,
                data:  { username : username, password : password},
                success: successFnc,
                error: errorFnc,
                dataType: "json"
            });

            function successFnc(data, status, xhr) {

                if(data.successLog=="")
                {
                   alert("Username and password dont match!")
                }
                else
                {
                    alert(data.successLog);
                    window.location.replace('index.php')
                }

            }

            function errorFnc(xhr, status, error) {

            }

        }

    });

    return false;
});

