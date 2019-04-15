$(document).ready(function() {
    
    $("[name=login]").on("click", login);
    $("[name=logout]").on("click", logout);
    
    function login() {
        username = $("#username").val();
        password = $("#password").val();
        $.ajax({
            type: "POST",
            url: "api/login.php",
            dataType: "json",
            data : {
               "username": username,
               "password": password,
            },
            success : function(data, status) {
                if (!data.valid) {
                    $(".invalid-login").html(data.reason).css("color", "red")
                }
                else {
                    $(".invalid-login").html("")
                    if (data[0]["isAdmin"] == "1") {
                        console.log("welcome admin")
                        window.location = "admin.php";
                    }
                    else {
                        window.location = "user.php";
                    }
                }
                console.log(data);
            },
            complete : function(data, status) {
                // console.log(data);
            }
        });
    }
    function logout() {
        window.location = "index.php";
    }
})