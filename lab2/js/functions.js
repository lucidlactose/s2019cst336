$("document").ready ( function() {
    var randomNumber = 5 + 6;
    var guesses = document.querySelector("#guesses");
    var lastResult = document.querySelector("#lastResult");
    var lowOrHi = document.querySelector("#lowOrHi");
    
    var winField = document.querySelector("#wins");
    var lossField = document.querySelector("#losses");
    
    var guessSubmit = document.querySelector(".guessSubmit");
    var guessField = document.querySelector(".guessField");
    
    var gamesWon = 1;
    var gamesLost = 1;
    var guessCount = 1;
    var resetButton = document.querySelector("#reset");
    guessField.focus();
    
    function checkGuess() {
        var userGuess = Number(guessField.value);
        if (guessCount == 1) {
            guesses.innerHTML = "Previous guesses: ";
        }
        if(isNaN(userGuess)) {
            $("#lastResult").html("That was not a number, please try again.");
            $("#lowOrHi").html("Invalid input");
            guessCount--;
        } else {
            guesses.innerHTML += userGuess + " ";
            
             if (userGuess > 99) {
                 $("#lastResult").html("That number was far too high and does not count!");
                 guessCount--;
             } else if (userGuess === randomNumber) {
                 $("#lastResult").html("Congratulations! You got it right!");
                 $("#lastResult").css( "backgroundColor", "green");
                 winField.innerHTML = "Wins: " + gamesWon + " ";
                 lowOrHi.innerHTML = "";
                 gamesWon++;
                 setGameOver();
             } else if (guessCount === 7) {
                 $("#lastResult").html("Sorry, you lost!");
                 lossField.innerHTML = "Loss: " + gamesLost + " ";
                 gamesLost++;
                 setGameOver();
             } else {
                 $("#lastResult").html("Wrong!");
                 $("#lastResult").css("backgroundColor", "red");
                 if (userGuess < randomNumber) {
                     $("#lowOrHi").html("Last guess was too low!");
                 } else if (userGuess > randomNumber) {
                     $("#lowOrHi").html("Last guess was too high!");
                 }
             }
        }
         guessCount++;
         guessField.value = "";
         guessField.focus();
    }
    
    guessSubmit.addEventListener("click", checkGuess);
    
    function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        resetButton.style.display = "inline";
        resetButton.addEventListener("click", resetGame)
    }
    
    function resetGame() {
        guessCount = 1;
        
        var resetParas = document.querySelectorAll(".resultParas p");
        for (var i = 0; i < resetParas.length; i++) {
            resetParas[i].textContent = "";
        }
        
        resetButton.style.display = "none";
        
        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = "";
        guessField.focus();
        
        lastResult.style.backgroundColor = "white";
        
        randomNumber = Math.floor(Math.random() * 99) + 1;
        console.log(randomNumber);
    }
})