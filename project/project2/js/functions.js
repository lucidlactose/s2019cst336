$("document").ready( function() {
    function question(question, ans1, ans2, ans3, ans4, name) {
            $(".quiz")
                .append(
                 $("<question>")
                    .append(
                     $("<label>")
                        .attr("for", "question")
                        .attr("id", "label-question")
                        .html(question)
                    )
                    .append(
                     $("<img>")
                        .attr("id", "result")
                        .attr("id", name + "-grade")
                    )
                    .append(
                     $("<ans1>")
                        .append(
                         $("<input>")
                            .attr("type", "radio")
                            .attr("id", "item1")
                            .attr("name", name)
                            .attr("value", "1")
                        )
                        .append(
                         $("<label>")
                            .attr("for", "item1")
                            .html(ans1)
                        )
                    )
                    .append(
                     $("<ans2>")
                        .append(
                         $("<input>")
                            .attr("type", "radio")
                            .attr("id", "item2")
                            .attr("name",  name)
                            .attr("value", "2")
                        )
                        .append(
                         $("<label>")
                            .attr("for", "item2")
                            .html(ans2)
                        )
                    )
                    .append(
                     $("<ans3>")
                        .append(
                         $("<input>")
                            .attr("type", "radio")
                            .attr("id", "item3")
                            .attr("name",  name)
                            .attr("value", "3")
                        )
                        .append(
                         $("<label>")
                            .attr("for", "item3")
                            .html(ans3)
                        )
                    )
                    .append(
                     $("<ans4>")
                        .append(
                         $("<input>")
                            .attr("type", "radio")
                            .attr("id", "item4")
                            .attr("name",  name)
                            .attr("value", "4")
                        )
                        .append(
                         $("<label>")
                            .attr("for", "item4")
                            .html(ans4)
                        )
                    )
                );
    };
    function addButton() {
        $(".quiz")
        .append(
            $("<input>")
                .attr("id", "submit-button")
                .attr("type", "button")
                .attr("value", "Submit Results")
        );
    };

    function checkSpecificAnswer(name, correctAnswer) {
        // all these vars are for grabbing the html of the selectedRadioID
        var selectedRadio = $("input[name='" + name + "']:checked");
        var selectedNameValue = selectedRadio.val();
        var selectedRadioId = selectedRadio.attr("id");
        var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();
        
        if (selectedNameValue === correctAnswer) {
            $("#" + name + "-grade")
                .attr("src","img/correct.png")
                .attr("alt", "Correct");
            return 1;
        } else {
            $("#" + name + "-grade")
                .attr("src","img/wrong.png")
                .attr("alt", "Wrong");
            console.log(name + "incorrect");
            return 0;
        }
    }
    
    function checkAnswers() {
        var total = 0;
        
        total += checkSpecificAnswer("prob1", "1");
        total += checkSpecificAnswer("prob2", "3");
        total += checkSpecificAnswer("prob3", "1");
        total += checkSpecificAnswer("prob4", "4");
        total += checkSpecificAnswer("prob5", "3");
        total += checkSpecificAnswer("prob6", "4");
        
        $("finale")
            .css("display", "block");
        $("finale h2")
            .html("Total: " + Math.floor(total/6) * 100 + "%");
        
        if (total === 6) {
            $("finale h2")
                .css("color", "green")
                .css("background", "lime");
        } else if (total === 4 || total < 4) {
            $("finale h2")
                .css("color", "red")
                .css("background", "black");
        }
        
        $('html, body').animate({ scrollTop: $("header").offset().top }, 500);
    }
    
    question("2 + 1", "3", "2", "1", "4", "prob1");
    question("7 * 13", "91", "49", "169", "71", "prob2");
    question("8 + x = 3", "x = -5", "x = 5", "x = -6", "x = 6", "prob3");
    question("sin(x) = -&radic;3 / 2", "&pi;/3", "5 * &pi;/6", "&pi;/4", "2 * &pi;/3", "prob4");
    question("d/dx [6x<sup>2</sup>]", "6x", "3x", "12x", "36x", "prob5");
    question("&int; (-3x<sup>2</sup> cos(4x<sup>3</sup>)) dx", "5", "heck, man idk", "tan(6x) + &infin;", "-cos(4x<sup>3</sup>)/4", "prob6");
    addButton();
    
    $("#submit-button").on("click", checkAnswers);

});