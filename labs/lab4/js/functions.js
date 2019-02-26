$("#zip").change(getZipCode);
$("#state").change(getCounty);
$("#username").change(checkUsername)
$("#submit").on("click", checkPassword)


function checkPassword() {
    if ($("#password").val() != $("#password-check").val()) {
        $("#wrong-password").css("display", "inline");
    } else {
        $("#wrong-password").css("display", "none");
    }
}
function checkUsername() {
    var username = $("username").val();
    // assume I store the username somewhere
    // if (availabe(username)) {
        $('#username-availability').html("available")
    // }
}
function getZipCode() {
    $.ajax({
        type: "GET",
        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
        dataType: "json",
        data: {
            "zip": $("#zip").val()
        },
        success: function(data, status) {
            if (data === false) {
                $("#wrong-zip").html( "Zip code not found" );
                $("#wrong-zip").css( "display", "inline" );
                $("#city").html( "City: " );
                $("#lat").html( "Latitude: " );
                $("#long").html( "Longitude: " );
            } else {
                $("#city").html (data["city"] );
                $("#lat").html( data["latitude"] );
                $("#long").html( data["longitude"] );
                $("#wrong-zip").css( "display", "none" );
                $("#state").val( data["state"] )
                getCounty();
            }
        },
    });
}
function getCounty() {
    $.ajax({
        type: "GET",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
        dataType: "json",
        data: {
            "state": $("#state").val().toLowerCase()
        },
        success: function(data, status) {
            for (var i=0; i < data.length; i++ ) {
                $('#county').append( "<option value=" + (data[i]["county"]) + ">" + data[i]["county"] + "</option>" );
            }
        },
    });
}