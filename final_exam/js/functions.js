function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    var userId = profile.getId();
    localStorage.setItem("userId",userId);
    $(".g-signin2").css("display", "none");
    $("#logout-button").css("display", "block");
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
    auth2.disconnect();
    $(".g-signin2").css("display", "block");
    $("#logout-button").css("display", "none");
}

function copyInvitation() {
    copyText = $("#myInput");
    console.log(copyText.val())
    copyText.select();
    document.execCommand("copy");
}

function cancelAppointment(item) {
    
}
function deleteAppointment(item) {
    console.log(item.id)
    $.ajax({
        url: "api/deleteAppointment.php",
        type: "POST",
        data: {
            "id": item.id
        },
        dataType: "text",
        success: function(data, status) {
            console.log(data)
        }
    });
    getAppointments();
}

$(function() {
    getAppointments();
    
    $("#show-appointment").on("click", showModal);
    $("#cancel-button").on("click", hideModal);
    $("#add-button").on("click", addAppointment);


    function showModal() {
        $("#add-appointment-modal").modal({backdrop: true});
    }
    function hideModal() {
        $("#add-appointment-modal").modal("hide");
    }

    function addAppointment() {
        start_time = $("#start-time").val()
        end_time = $("#end-time").val()
        
        // the hour for calculating the duration
        start_hour = parseInt(start_time.substring(0,2)) * 60;
        end_hour = parseInt(end_time.substring(0,2)) * 60;
        
        // the minutes for calculating the duration
        start_min = parseInt(start_time.substring(3, 5));
        end_min = parseInt(end_time.substring(3, 5));
        
        duration = (end_hour - start_hour) + (end_min - start_min);
        console.log(duration)
        $.ajax({
            url: "api/addAppointment.php",
            type: "POST",
            data: {
                "date": $("#date").val(),
                "start_time": $("#start-time").val(),
                "duration": duration,
                "booked_by": "Not Booked",
            },
            dateType: "json",
            success: function(data, status) {
                console.log(data)
            },
        })
        hideModal();
        getAppointments();
    }
    function getAppointments() {
        $("#appointment-times").find("tr:gt(0)").remove();
        $.ajax({
            url: "api/getAppointments.php",
            type: "GET",
            dataType: "json",
            success: function(data, status) {
                data.forEach(function(key) {
                    date = key["date"];
                    date_year = date.substring(0,4);
                    date_month = date.substring(5,7);
                    date_day = date.substring(8,10);
                    
                    // this is to make sure no date in the past is shown to the user
                    curr_date = new Date()
                    if (curr_date.getFullYear() == parseInt(date_year)) {
                        if (curr_date.getMonth()+1 == parseInt(date_month)) {
                            if (curr_date.getDate() > parseInt(date_day)) {
                                return;
                            }
                        }
                        else if (curr_date.getMonth()+1 > parseInt(date_month)) {
                            return;
                        }
                    }
                    else if (curr_date.getFullYear() > parseInt(date_year)) {
                        return;
                    }
                    
                    hour = parseInt(key["start_time"].substr(0,2));
                    str_hour = (hour > 12 ? (hour-12) + " PM" : hour + " AM");
                    str_hour = (hour == 0 ? "12 AM" : str_hour);
                    str_hour = (hour == 12 ? "12 PM" : str_hour);
                    
                    isCancelButton = (key["booked_by"] === "Not Booked" ? "Delete" : "Cancel");
                    isCancelFunction = (key["booked_by"] === "Not Booked" ? "deleteAppointment(this)" : "cancelAppointment(this)");
                    
                    duration_hour = parseInt(parseInt(key["minute_duration"]) / 60);
                    duration_min = parseInt(key["minute_duration"]) % 60;
                    duration_str = (duration_hour > 0 ? duration_hour + " hour " : "") +
                                    (duration_min != 0 ? duration_min + " min " : "");
                    $("#appointment-times").append(
                        $("<tr id='time'>")
                            .append(
                                $("<td>").append( key["date"] )
                            ) .append(
                                $("<td>").append( str_hour )
                            ) .append(
                                $("<td>").append( duration_str )
                            ) .append(
                                $("<td>").append( key["booked_by"] )
                            ) .append(
                                $("<td>").append( 
                                    $("<button id=" + key["id"] + ">").html("Details")
                                ) .append(
                                    $("<button id="+key["id"]+" onclick="+isCancelFunction+">").html(isCancelButton)
                                )
                            )
                        )
                })
                console.log(data)
            },
        })
    }
})

function getAppointments() {
    $("#appointment-times").find("tr:gt(0)").remove();
    $.ajax({
        url: "api/getAppointments.php",
        type: "GET",
        dataType: "json",
        success: function(data, status) {
            data.forEach(function(key) {
                date = key["date"];
                date_year = date.substring(0,4);
                date_month = date.substring(5,7);
                date_day = date.substring(8,10);
                
                // this is to make sure no date in the past is shown to the user
                curr_date = new Date()
                if (curr_date.getFullYear() == parseInt(date_year)) {
                    if (curr_date.getMonth()+1 == parseInt(date_month)) {
                        if (curr_date.getDate() > parseInt(date_day)) {
                            return;
                        }
                    }
                    else if (curr_date.getMonth()+1 > parseInt(date_month)) {
                        return;
                    }
                }
                else if (curr_date.getFullYear() > parseInt(date_year)) {
                    return;
                }
                
                hour = parseInt(key["start_time"].substr(0,2));
                str_hour = (hour > 12 ? (hour-12) + " PM" : hour + " AM");
                str_hour = (hour == 0 ? "12 AM" : str_hour);
                str_hour = (hour == 12 ? "12 PM" : str_hour);
                
                isCancelButton = (key["booked_by"] === "Not Booked" ? "Delete" : "Cancel");
                isCancelFunction = (key["booked_by"] === "Not Booked" ? "deleteAppointment(this)" : "cancelAppointment(this)");
                
                duration_hour = parseInt(parseInt(key["minute_duration"]) / 60);
                duration_min = parseInt(key["minute_duration"]) % 60;
                duration_str = (duration_hour > 0 ? duration_hour + " hour " : "") +
                                (duration_min != 0 ? duration_min + " min " : "");
                $("#appointment-times").append(
                    $("<tr id='time'>")
                        .append(
                            $("<td>").append( key["date"] )
                        ) .append(
                            $("<td>").append( str_hour )
                        ) .append(
                            $("<td>").append( duration_str )
                        ) .append(
                            $("<td>").append( key["booked_by"] )
                        ) .append(
                            $("<td>").append( 
                                $("<button id=" + key["id"] + ">").html("Details")
                            ) .append(
                                $("<button id="+key["id"]+" onclick="+isCancelFunction+">").html(isCancelButton)
                            )
                        )
                    )
            })
            console.log(data)
        },
    })
}

/*********************************************************************/
/**************     GOOGLE SIGN-IN BUTTON FORMATTING    **************/
/*********************************************************************/

// function onSuccess(googleUser) {
//     console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
// }
// function onFailure(error) {
//     console.log(error);
// }
// function renderButton() {
//     console.log('iojadsojiadsjio')
//     gapi.signin2.render("g-signin2", {
//         'scope': 'profile email',
//         'width': 240,
//         'height': 50,
//         'longtitle': true,
//         'theme': 'dark',
//         'text-align': 'right',
//         'onsuccess': onSuccess,
//         'onfailure': onFailure
//     });
// }
/*********************************************************************/
/**************     GOOGLE SIGN-IN BUTTON FORMATTING    **************/
/*********************************************************************/