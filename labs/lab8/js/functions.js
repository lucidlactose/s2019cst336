$(document).ready(function() {
    $('body').on('click','#img-button', updateImage);
    $("[name=button]").on("click", searchImage);
    
    // function searchImage() {
    //     $.ajax({
    //         url: "api/images.php",
    //         success: function(data, status) {
    //             console.log(data)
    //         }
    //     })
    // }
    
    function updateImage() {
        // now add this to the thing
        console.log(this.name);
        $("[name=" + this.name + "]").attr("src", "img/favorite-on.png");
    }
    
    function searchImage() {
        query = $("[name=query]").val();
        console.log(query)
        
        $.ajax({
            url: "https://pixabay.com/api/",
            type: "GET",
            dataType: "json",
            data: {
                key: "12231104-58a017091d56d05c78d72564d",
                per_page: "9",
                q: query,
            },
            success:function(data, success) {
                console.log(data)
                for (i=0; i < data.hits.length; ++i) {
                    if (i < 3) {
                        $(".first")
                            .append("<td>")
                                .append(
                                    $("<img>")
                                        .attr("src", data.hits[i].largeImageURL)
                                        .attr("width", "200")
                                )
                                .append(
                                    $("<img>")
                                        .attr("src", "img/favorite-off.png")
                                        .attr("id", "img-button")
                                        .attr("name", "img"+i)
                                        .attr("width", "20")
                                )
                    }
                    else if (i < 6) {
                        $(".second")
                            .append("<td>")
                                .append(
                                $("<img>")
                                    .attr("src", data.hits[i].largeImageURL)
                                    .attr("width", "200")
                                )
                                .append(
                                    $("<img>")
                                        .attr("src", "img/favorite-off.png")
                                        .attr("id", "img-button")
                                        .attr("name", "img"+i)
                                        .attr("width", "20")
                                )
                    }
                    else {
                        $(".third")
                            .append("<td>")
                                .append(
                                $("<img>")
                                    .attr("src", data.hits[i].largeImageURL)
                                    .attr("width", "200")
                                )
                                .append(
                                    $("<img>")
                                        .attr("src", "img/favorite-off.png")
                                        .attr("id", "img-button")
                                        .attr("name", "img"+i)
                                        .attr("width", "20")
                                )
                    }
                }
            }
        });
    }
});