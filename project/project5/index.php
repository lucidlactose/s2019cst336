<?php
    session_start();    
    if (!empty($_POST["email_address"])) {
        $_SESSION["email_address"] = $_POST["email_address"];
    }
        
    if (empty($_SESSION["email_address"])) {
        header('Location: ' . "noEmail.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!--These bookstrap links are literlaly only for the buttons-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <div class="container">
            <h2> Photo and video album </h2>
            <div id="images">
                
            </div>

            <hr id="division">

            <!--complex way to get the php data to javascript but whatever-->
            <div id="email-div">
                <p> Email: 
                    <span id="email_address">
                        <?php
                            echo $_SESSION["email_address"];
                        ?>
                    </span>
                </p>
            </div>
            <div id="caption-div">
                <p> Photo caption: </p>
                <input id="caption" type="textarea" name="caption"/>
            </div>
            
            <!--file upload stuff-->
            <form method="post" id="imageUpload" enctype="multipart/form-data">
                <input type="file" name="image[]" id="image" multiple accept=".jpg, .png, .gif" />
                <br />
                <input type="submit" name="insert" id="submit" value="Insert" class="btn btn-info" />
            </form>
       
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    0%
                </div>
            </div>
   
            <div id="fileList"> </div>
                <div id="results"> </div>
            </form>
        </div>
    </body>
</html>