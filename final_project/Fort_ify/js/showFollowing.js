$(function() {
    $.ajax({
        url: "API/getFollowing.php",
        type: "POST",
        data: {
            "userId": localStorage.userId
        },
        dataType: "json",
        success: function(data, status) {
            data.forEach(function(key){
                    Scout.players.search(key["following_id"], "epic", null, "fortnite")
		            // .then(results => console.log(results))
		            .then(results => showMeta(results))
            });
            
            
        },
        complete: function(data, status) {
            console.log(data)
        }
    });
    
	function showMeta(results) {
		if (results.length === 0) {
			return;
		}
		var username;
		var found = false;
		for (var i=0; i < results.results.length; ++i) {
			username = results.results[i].player.handle;
			if (results.results[i].player.handle.toUpperCase() === username.toUpperCase()) {
				results = results.results[i];
				found = true;
				break;
			}
		}
		if (!found) {
			results = results.results[0];
		}
		console.log(results)
		$("#allFollowing").append(
                "<center>" 
                +
	                "<div class = 'follower'>"
	                +
						
		    		    "<a href = 'searchResults.php?username=" + username +"'>"+ username +"</a>"
						+
						
						"<hr>"
						
	    		    +
					"</div>"
    		    +
		        "</center>"
		    
		    );
	}

    
     
});