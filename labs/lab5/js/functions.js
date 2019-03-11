$("#zip").change(getZipCode);
$("#state").change(getCounty);
$("#submit").on("click", checkUsernameAndPassword)

function checkUsernameAndPassword() {
    var username = $("#username").val();
    var password = $("#password").val()
    var password_check = $("#password-check").val();
    $.ajax({
        type: "POST",
        url: "server.php",
        dataType: "json",
        data: {
            "username": username,
            "passwords" : [password, password_check]
        },
        success: function(data, status) {
            console.log(data);
            valid_password = data["valid_password"];
            username_available = data["availability"];
            
            if (valid_password) {
                $("#wrong-password").css("display", "none");
                $(".recommend").css("display", "none");
            }
            else {
                no_password = data["no_password"];
                matching_passwords = data["matching_passwords"];
                contains_username = data["contains_username"];
                recommended_password = data["recommended_password"];
                if (no_password) {
                    $("#wrong-password").html("passward is empty");
                }
                else if (matching_passwords) {
                    $("#wrong-password").html("Passwords do not match");
                }
                else if (contains_username) {
                    $("#wrong-password").html("Password has username");
                }
                $("#wrong-password").css("display", "inline");
                $(".recommend").css("display", "block");
                $("#recommended_password").html(recommended_password);
            }
            
            if (username_available) {
                $('#username-availability')
                    .html("available")
                    .css("color", "green");
            }
            else {
                $('#username-availability')
                    .html("unavailable")
                    .css("color", "red");
            }
        },
        complete: function(data, status) {
            console.log(data)
        }
    });
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
            console.log(data)
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