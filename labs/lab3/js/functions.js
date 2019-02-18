$("document").ready( function() {
    console.log("ready");
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
                     $("<ans1>")
                        .append(
                         $("<input>")
                            .attr("type", "radio")
                            .attr("id", "item1")
                            .attr("name", name + "1")
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
                            .attr("name",  name + "2")
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
                            .attr("name",  name + "3")
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
                            .attr("name",  name + "4")
                            .attr("value", "4")
                        )
                        .append(
                         $("<label>")
                            .attr("for", "item4")
                            .html(ans4)
                        )
                    )
                )
        console.log("Q1 CHANGED");
    }
    function addButton() {
        console.log("ADDED BUTTON")
        $(".quiz")
        .append(
            $("<input>")
                .attr("type", "button")
                .attr("value", "Submit Results")
        )
    }
    
    question("2 + 1", "3", "2", "1", "4", "prob1-")
    question("7 * 13", "91", "49", "169", "71", "prob2-")
    question("8 + x = 3", "x = -5", "x = 5", "x = -6", "x = 6", "prob3-")
    question("sin(x) = -&radic;3 / 2", "&#982;/3", "5 * &#982;/6", "&#982;/4", "2 * &#982;/3", "prob4-")
    question("d/dx [6x<sup>2</sup>]", "6x", "3x", "12x", "36x", "prob5-")
    question("&int; (-3x<sup>2</sup> cos(4x<sup>3</sup>)) dx", "5", "heck, man idk", "tan(6x) + &infin;", "-cos(4x<sup>3</sup>)/4", "prob6-")
    addButton()
    
    console.log("WHY")
})