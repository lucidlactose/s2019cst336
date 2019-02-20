$("document").ready( function() {
    function addRadioOption(parent, tag, name, ans, id, val, type) {
            $(parent)
                .append(
                     $("<" + tag + ">")
                        .append(
                         $("<input>")
                            .attr("type", type)
                            .attr("id", id)
                            .attr("name", name)
                            .attr("value", val)
                        )
                        .append(
                         $("<label>")
                            .attr("for", id)
                            .html(ans)
                        )
                    );
    }
    function question1() {
        var question = "If you were to go on a trip, where would you like to go?";
        var ans1 = "An isolated haunted mansion surrounded by apes";
        var ans2 = "An exotic island filled with snakes and beautiful women";
        var ans3 = "An fascist island filled with war and terror";
        var ans4 = "An magical sky island filled with druids"
        var name = "prob1";
        var id = "prob1-item";
        
        var parent = ".quiz question";
        var type = "radio"
        $(parent)
                .append(
                 $("<p>")
                    .attr("for", "question")
                    .attr("id", "label-question")
                    .html(question)
                );
        addRadioOption(parent, "ans1", name, ans1, id + 1, "1", type);
        addRadioOption(parent, "ans2", name, ans2, id + 2, "2", type);
        addRadioOption(parent, "ans3", name, ans3, id + 3, "3", type);
        addRadioOption(parent, "ans4", name, ans4, id + 4, "4", type);
    };
    function question2() {
        var question = "What am I holding in my hand?";
        var ans1 = "Crickets";
        var ans2 = "Your girlfriend's hand";
        var ans3 = "Assorted cheeses";
        var name = "prob2";
        var id = "prob2-item";

        var parent = ".quiz question";
        var type = "checkbox";
        $(parent)
                .empty()
                .append(
                 $("<p>")
                    .attr("for", "question")
                    .attr("id", "label-question")
                    .html(question)
                );
        addRadioOption(parent, "ans1", name, ans1, id + 1, ans1, type);
        addRadioOption(parent, "ans2", name, ans2, id + 2, ans2, type);
        addRadioOption(parent, "ans3", name, ans3, id + 3, ans3, type);
    };
    function question3() {
        var question = "What color is a beaver's mantle?";
        var ans1 = "";
        var name = "prob3";
        var id = "prob3-item"

        var parent = ".quiz question";
        var type = "color";
        $(parent)
                .empty()
                .attr("class", "prob3")
                .append(
                 $("<p>")
                    .attr("for", "question")
                    .attr("id", "label-question")
                    .html(question)
                )
        addRadioOption(parent, "ans1", name, ans1, id + 1, "#aaaaaa", type);
    };
    function checkQuestion1() {
        // all these vars are for grabbing the html of the selectedRadioID
        var selectedRadio = $("input[name='prob1']:checked");
        var selectedNameValue = selectedRadio.val();
        var selectedRadioId = selectedRadio.attr("id");
        var selectedLabelHtml = $("label[for='" + selectedRadioId + "']").html();
        
        answers["prob1"] = selectedLabelHtml;
    }
    function checkQuestion2() {
        var checked = []
        var checked1 = $("#prob2-item1:checked").length > 0;
        var checked2 = $("#prob2-item2:checked").length > 0;
        var checked3 = $("#prob2-item3:checked").length > 0;
        var item1 = $("#prob2-item1").val();
        var item2 = $("#prob2-item2").val();
        var item3 = $("#prob2-item3").val();

        if (checked1) {
            checked.push(item1);
        }
        if (checked2) {
            checked.push(item2);
        }
        if (checked3) {
            checked.push(item3);
        }
        
        answers["prob2"] = checked;
    }
    function checkQuestion3() {
        answers["prob3"] = $("#prob3-item1").val();
    }
    function checkAnswers() {
        if (currentQuestion == 1) {
            checkQuestion1();
            question2();
            currentQuestion++;
        } else if (currentQuestion == 2) {
            checkQuestion2();
            question3();
            currentQuestion++;
        } else if (currentQuestion == 3) {
            checkQuestion3();
            result(answers);
            currentQuestion++;
        }    
        // $('html, body').animate({ scrollTop: $("header").offset().top }, 500);
    }
    function result(answer) {
        var answer1 = answer["prob2"][0]
        var answer2 = answer["prob2"][1]
        var answer3 = answer["prob2"][2]
        $("center")
            .empty()
            .append(
             $("<explanation>")
                .html("The background will now be the color you chose. \
                    The text will also be inverted so it is easier to read and \
                    your answers are: ")
            )
            .append(
             $("<prob1>")
                .html(answer["prob1"])
            )
            .append(
             $("<prob2>")
                .append(
                 $("<prob2-ans1>")
                    .html(answer1)
                )
                .append(
                 $("<prob2-ans2>")
                    .html(answer2)
                )
                .append(
                 $("<prob2-ans3>")
                    .html(answer3)
                )
            )
            .css("background", answer["prob3"])
        $("footer")
            .css("background", answer["prob3"])
    }
    
    function showQuestions() {
        question1();
    }
    var currentQuestion = 1;
    var answers = {};
    showQuestions();
    
    
    $("#next-button").on("click", checkAnswers);
});