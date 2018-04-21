$(".guitar_type").change(function () {

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
});

$(".strings").change(function () {
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
});

$(".pickups").change(function () {
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
});


$(".tuners").change(function () {
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
});