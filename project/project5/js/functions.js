$(function() {
    $("#pickFilesButton").on("click", function() {
        $("[name=fileName]").trigger("click");
    })
    
    
    
    // 3. Send files with ajax
    $('#uploadFilesButton').click(function(e) {
        setProgress(0);
        var formData = new FormData($('form')[0]);
        $.ajax({
                url: "uploadFile.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                cache: false,
                // This part gives up chunk progress of the file upload
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
                }
            })
            .done(function(data, status, xhr) {
                console.log('upload done');
                //window.location.href = "<?php echo BASE_PATH?>/assets/<?php echo $controller->group ?>";
                console.log(xhr);
                $("#results").html(xhr.responseText)
            })
            .fail(function(xhr) {
                console.log('upload failed');
                console.log(xhr);
            })
            .always(function() {
                //console.log('done processing upload');
            });
    });

    function setProgress(percent) {
        $(".progress-bar").css("width", +percent + "%");
        $(".progress-bar").text(percent + "%");
    }

});