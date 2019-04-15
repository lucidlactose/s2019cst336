 $("document").ready( function() {
            function randomImg() {
                var randomNum = Math.floor(Math.random() * 3) + 1;

                if (randomNum == 1) {
                    return "img/cherry.png";
                } else if (randomNum == 2) {
                    return "img/grapes.png";
                } else {
                    return "img/seven.png";
                }
                //return some image link
            }
            function randomizeImages() {
                $("#img1").attr("src", randomImg())
                $("#img2").attr("src", randomImg())
                $("#img3").attr("src", randomImg())
            }
            
            function showText() {
                var amount = 0;
             
                if ($("#img1").attr("src") == "img/cherry.png" 
                    && $("#img2").attr("src") == "img/cherry.png"
                    && $("#img3").attr("src") == "img/cherry.png") {
                    amount = 100;
                    
                }
                else if ($("#img1").attr("src") == "img/grapes.png" 
                    && $("#img2").attr("src") == "img/grapes.png"
                    && $("#img3").attr("src") == "img/grapes.png") {
                    amount = 300;
                }
                else if($("#img1").attr("src") == "img/seven.png" 
                    && $("#img2").attr("src") == "img/seven.png"
                    && $("#img3").attr("src") == "img/seven.png") {
                    amount = 500;
                    $("#jackpot").html("J A C K P O T!!")
                    $("audio")[0].play()
                } else {
                    $("#jackpot").html("Try Again!!")
                }
                
                total += amount;
                
                $("#jackpot").css("display", "block")
                $("#win1")
                    .css("display", "block")
                    .html("You Won $" + amount)
                $("#win2")
                    .css("display", "block")
                    .html("Total Winning: $" + total)
            }
            
            function showWin() {
                randomizeImages()
                $("win").css("display", "block")
                showText()
            }
            
            var total = 0;
            
            $("#button").on("click", showWin)
        })