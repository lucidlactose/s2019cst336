
//This AJAX call returns a number of "likes" and "dislikes"
//Enter a YouTube video id for "data".
$.ajax({
    type: "get",
    url:  "https://cst336.herokuapp.com/projects/api/videoLikesAPI.php",
    dataType: "json",
    data: { "videoId": "dQw4w9WgXcQ" },  //   <----AS THE VALUE, ENTER THE YOUTUBE VIDEO ID
    
    success: function(data,status) {
        $("#likes").html(data.likes);
        $("#dislikes").html(data.dislikes);
        $("#video").attr("src", "https://www.youtube.com/embed/" + data.videoId)
        console.log(data)
    },
    complete: function(data,status) { 
        //alert(status);
    }
});

