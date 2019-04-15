$(document).ready(function() {
    // MATCH is a sql statement and a tick is how to escape column names and table names
    var currentUserId = 1;
    getMatch();
    $("#dislike-button").on("click", dislike);
    $("#neither-button").on("click", neither);
    $("#like-button").on("click", like);

    function like() {
        cinderReply("like");        
    }
    function neither() {
        cinderReply("neither");        
    }
    function dislike() {
        cinderReply("dislike");        
    }
    function cinderReply(reply) {
        $.ajax({
            type: "POST",
            url: "api/setLike.php",
            data: {
                "profile": $("#profile_name").html(),
                "currentUserId": 1,
                "like": reply == "like",
                "neither": reply == "neither",
                "dislike": reply == "dislike",
            },
            dataType: "json",
            success: function(data, status) {
                console.log("success");
            },
            complete: function(data, status) {
                console.log("completed a reply")
            }
        })
    }
    function getMatch() {
        $.ajax({
            type: "GET",
            url: "api/getMatch.php",
            dataType: "json",
            success: function(data, status) {
                console.log("success in match")
                var item = data[Math.floor(Math.random()*data.length)];
                getProfile(item["user_id"]);
            },
            complete: function(data, status) {
                // console.log(data)
                // for debugging but not needed if you use the network page
            }
        });
    }
    function getProfile(id) {
        $.ajax({
            type: "GET",
            url: "api/getProfile.php",
            dataType: "json",
            data: {
                "id": id,
            },
            success: function(data, status) {
                console.log("success in profile")
                item = data[Math.floor(Math.random()*data.length)];
                
                $("#profile-name").html(item["username"])
                $("#profile-description").html(item["about_me"])
            },
            complete: function(data, status) {
                // console.log(data)
                // for debugging but not needed if you use the network page
            }
        });
    }
});
$(document).on("click", ".historyLink", loadHistory);

function loadHistory() {
    $.ajax({
        type: "GET",
        url: "api/getHistory.php",
        dataType: "json",
        success: function(data, status) {
            console.log("success in history")
            console.log(data)
            $("#history").css("display", "block");

            // console.log(data)
            $("#history").html("");
            
            data.forEach(function(key) {
                $("#history table").append(
                            $("<tr>").append(
                                    $("<td>").html(data["username"])
                            )
                )
            })
        }
    })
    
}