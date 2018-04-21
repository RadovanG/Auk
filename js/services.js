$(document).ready(function () {

    var errorManufacturer=true;

    $("#manufacturer").change(function () {
        var manufacturer=$("#manufacturer").val().trim();
        if (manufacturer == "default") {
            $("#manufacturer").css("borderColor","#f00");
            $("#data").css("display","none");
            $("#submit").css("display","none");
            errorManufacturer = true;
        }
        else {
            $("#manufacturer").css("borderColor","#a9a9a9");
            $("#data").css("display","inline-block");
            $("#submit").css("display","inline-block");
            errorManufacturer = false;
        }

        if (!errorManufacturer) {
            var manufacturer = $('#manufacturer').val().trim();


            $.ajax({
                beforeSend:function() {

                    if(manufacturer=="default") {

                        $("#submit").css("display", "none");
                        return false;
                    }
                },
                type: "POST",
                url: "showGuitarTypes.php",
                cache: false,
                data:  { manufacturer:manufacturer },
                success:function(data,status,xhr) {

                    $("#data").html(data);
                    if(data)
                    {
                        {
                            var guitar=$(".guitar_type").val().trim();
                            $.ajax({
                                type: "POST",
                                url: "getGuitarPicture.php",
                                cache: false,
                                data:  { guitar : guitar},
                                success: successFnc,
                                error: errorFnc,
                                dataType: "html"
                            });

                            function successFnc(data, status, xhr) {
                                $("#guitar_picture").html(data);
                            }

                            function errorFnc(xhr, status, error) {

                            }
                        }
                        {
                            var strings=$(".strings").val().trim();
                            $.ajax({
                                type: "POST",
                                url: "getStringsPicture.php",
                                cache: false,
                                data:  { strings: strings},
                                success: successFnc,
                                error: errorFnc,
                                dataType: "html"
                            });

                            function successFnc(data, status, xhr) {
                                $("#strings_picture").html(data);
                            }

                            function errorFnc(xhr, status, error) {

                            }
                        }
                        {
                            var pickups=$(".pickups").val().trim();
                            $.ajax({
                                type: "POST",
                                url: "getPickupsPicture.php",
                                cache: false,
                                data:  { pickups: pickups},
                                success: successFnc,
                                error: errorFnc,
                                dataType: "html"
                            });

                            function successFnc(data, status, xhr) {
                                $("#pickups_picture").html(data);
                            }

                            function errorFnc(xhr, status, error) {

                            }
                        }
                        {
                            var tuners=$(".tuners").val().trim();
                            $.ajax({
                                type: "POST",
                                url: "getTunersPicture.php",
                                cache: false,
                                data:  { tuners: tuners},
                                success: successFnc,
                                error: errorFnc,
                                dataType: "html"
                            });

                            function successFnc(data, status, xhr) {
                                $("#tuners_picture").html(data);
                            }

                            function errorFnc(xhr, status, error) {

                            }
                        }
                    }

                },
                error: errorFnc,
                dataType: "html"
            });

            function errorFnc(xhr, status, error) {

            }


        }
    });


    $('#forma').submit(function (e) {
        e.preventDefault();


        if (errorManufacturer) {
            $('#errorManufacturer').css("display", "block");
        }


        if (!errorManufacturer) {
            var manufacturer= $('#manufacturer').val().trim();
            var guitar_type=$('.guitar_type').val().trim();
            var pickups=$('.pickups').val().trim();
            var strings=$('.strings').val().trim();
            var tuners=$('.tuners').val().trim();
            var key=$('#key').val().trim();

            var manufacturerCheck= $("#manufacturer option:selected").html();
            var guitar_typeCheck=$('.guitar_type  option:selected').html();
            var pickupsCheck=$('.pickups  option:selected').html();
            var stringsCheck=$('.strings  option:selected').html();
            var tunersCheck=$('.tuners  option:selected').html();




                    if (confirm("Is this your final order, please check the prices before you submit?"
                        +"\n"+manufacturerCheck+" "+guitar_typeCheck+"\n"+stringsCheck+"\n"+pickupsCheck+"\n"+tunersCheck)){

                        $.ajax({
                            type: "POST",
                            url: "setOrder.php",
                            cache: false,
                            data:  {manufacturer:manufacturer,guitar_type:guitar_type,pickups:pickups,strings:strings,tuners:tuners,key:key},
                            success: successFnc,
                            error: errorFnc,
                            dataType: "html"
                        });

                        function successFnc(data, status, xhr) {
                            alert(data);
                            setInterval(function () {
                                window.location.replace('index.php');
                            },1500);
                        }

                        function errorFnc(xhr, status, error) {

                        }
                    }




        }

    });

    return false;
});

