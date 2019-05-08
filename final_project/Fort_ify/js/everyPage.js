// client id: e90f5a13-6bc1-4d8d-b3aa-0724a4212d39
// client secret: fdf14291909f5eb40478cc13ef96c231cee034b8ecafd38334f5d656666b710c

//**********************************************************************
//*******************_______NAVIGATION BAR_______***********************
 
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
var meUser;
function search() {
    username = $("[name=search]").val();
    if (username !== "") {
        username = username.split(" ").join("+");
        for (i=0; i<username.length; ++i) {
            if (username !== "+") {
                // console.log(username);
        		
            }
        }
        collectData();
        console.log(meUser)
        $.ajax({
            url: "API/logQuery.php",
            type: "POST",
            data: {
                "id": meUser, 
                "search": username,
            },
            dataType: "text",
            success: function(data, status) {
                console.log(data)
                window.location.href = "searchResults.php?username=" + username;
            },
            complete: function(data, status) {
                console.log(data)
            }
        })
    }
}
function collectData(){
	
	var eh = gapi.auth2.init();
	eh = gapi.auth2.getAuthInstance();
	
	if(eh.isSignedIn.get()){
		var profile = eh.currentUser.get().getBasicProfile();
		console.log('ID: ' + profile.getId());
		meUser = profile.getId();
		
	}
	else{
	    alert("there was an issue");
	}
	
}

$(function(){
    Scout.configure({
        clientId: "e90f5a13-6bc1-4d8d-b3aa-0724a4212d39"
    }).then(() => {
        // Perform Scout queries here
    });
    
    $("#searchButton").on("click", search);
    
    
    $("#ps4Tab").on("click",function() {
        $("#ps4Tab").css("background-color", "#284FBA");
        $("#xbxTab").css("background-color", "#2196F3");
        $("#pcTab").css("background-color","#2196F3");
    });
    
    $("#xbxTab").on("click", function() {
        $("#xbxTab").css("background-color", "#1A8124");
        $("#ps4Tab").css("background-color", "#2196F3");
        $("#pcTab").css("background-color","#2196F3");
    });
    
    $("#pcTab").on("click",function(){
        $("#pcTab").css("background-color","#333333");
        $("#ps4Tab").css("background-color", "#2196F3");
        $("#xbxTab").css("background-color", "#2196F3");
    });

});

$(document).on('keypress', function(e) {
    var keycode = event.keyCode || event.which;
    if (keycode === 13) {
        e.preventDefault();
        search();
    }
});

