$(function(){

    loadImages();

    function loadImages() {
        var email_address = $("#email_address").html().trim();
        console.log("ladiing")
        $.ajax({
            url: "api/getImages.php",
            type: "GET",
            data : {
                "email_address": email_address
            },
            // dataType: "json",
            success: function(data, status) {
                // add the images
                console.log("saoidjasoidj")
                $('#images').html(data);
            },
            complete: function(data, status) {
                console.log(data)
            }
        });
    }
    $('#imageUpload').on('submit', function(event){
        console.log('oskad')
        event.preventDefault();
        console.log("something")
        setProgress(0);
        
        var image_name = $('#image').val();
        var formData = new FormData($('form')[0]);
        var email_address = $("#email_address").html().trim();
        var caption = $("#caption").val();
        
        console.log("Caption: " + caption);
        console.log(email_address);
        
        if(image_name == '') {
            alert("Please Select Image");
            return false;
        }
        else {
            $.ajax({
                url:"api/uploadImage.php",
                method:"POST",
                data: formData,
                contentType:false,
                cache:false,
                processData:false,
                xhr: function() {
                    //upload Progress
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function(event) {
                            var percent = 0;
                            var position = event.loaded || event.position;
                            var total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            setProgress(percent);
                        }, true);
                    }
                    return xhr;
                },
                success:function(data)   {
                    $('#image').val('');
                    loadImages();
                }
            })
            .done(function(data, status, xhr) {
                console.log('upload done');
                //window.location.href = "<?php echo BASE_PATH?>/assets/<?php echo $controller->group ?>";
                // console.log(xhr);
                $.ajax({
                    url: "api/updateImageDetails.php",
                    type: "POST",
                    data: {
                        "email_address": email_address, 
                        "caption": caption
                    },                      
                    dataType: "json",
                    success: function(data, status) {
                        console.log("success")
                        // console.log(data)
                    },
                    complete: function(data, status) {
                        // console.log(data);
                    }
                });
                $("#results").html(xhr.responseText)
            })
            .fail(function(xhr) {
                console.log('upload failed');
                console.log(xhr);
            })
            .always(function() {
                //console.log('done processing upload');
            });
        }
    });
    function setProgress(percent) {
        $(".progress-bar").css("width", +percent + "%");
        $(".progress-bar").text(percent + "%");
    } 
});  
