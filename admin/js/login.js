$(document).ready(function () {

    var erroradminName=true;
    var errorPassword=true;

    $("#adminName").keyup(function () {
        var adminName=$("#adminName").val().trim();
        if (adminName == "") {
            $('#erroradminName').css("display", "block");
            erroradminName = true;
        }
        else {
            $("#erroradminName").css("display", "none");
            erroradminName = false;
        }

    });

    $("#Password").keyup(function () {
        var Password=$("#Password").val().trim();
        if (Password == "") {
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


        if (erroradminName) {
            $('#erroradminName').css("display", "block");
        }

        if (errorPassword) {
            $('#errorPassword').css("display", "block");
        }

        if (!erroradminName && !errorPassword) {
            var adminName = $('#adminName').val().trim();
            var Password=$('#Password').val().trim();


            $.ajax({
                type: "POST",
                url: "login-db.php",
                cache: false,
                data:  { adminName : adminName, Password : Password},
                success: successFnc,
                error: errorFnc,
                dataType: "json"
            });

            function successFnc(data, status, xhr) {

                if(data.successLog=="")
                {
                   alert("adminName and Password dont match!")
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

