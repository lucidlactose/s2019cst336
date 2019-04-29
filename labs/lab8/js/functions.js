$(document).ready(function() {
    // create a way to store favorites
    favorites = []
    $('body').on('click','#img-button', toggleImage);
    $("[name=search]").on("click", searchImage);
    
    function toggleImage() {
        if (this.src == "img/favorite-on.png") {
            toggleOff(tag);
        }
        else {
            toggleOn(tag);
        }
    }
    
    function toggleOff(tag) {
        console.log(favorites);
        $("[name=" + tag.name + "]").attr("src", "img/favorite-on.png");
        
    }
    
    function toggleOn(tag) {
        // now add this to the thing
        console.log(tag);
        // console.log($("[name=" + this.name + "]").parent()[0]);
        favorites.push(tag.accessKey);
        console.log(favorites);
        $("[name=" + tag.name + "]").attr("src", "img/favorite-on.png");
    }
    
    function searchImage() {
        query = $("[name=query]").val();
        
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
                // console.log(data)
                addImages(data);
            }
        });
    }
    
    function addImages(data) {
        for (i=0; i < data.hits.length; ++i) {
            if (i < 3) {
                addImage("first", i, data);
            }
            else if (i < 6) {
                addImage("second", i, data);
            }
            else {
                addImage("third", i, data);
            }
        }
    }
    
    function addImage(location, i, data) {
        $("."+location)
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
                        // .attr("name", data.hits[i].largeImageURL)
                        .attr("width", "20")
                        .attr("accessKey", data.hits[i].largeImageURL)
                        // .attr("value", "img")
                );
    }
});