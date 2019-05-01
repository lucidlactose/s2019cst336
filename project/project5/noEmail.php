<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Please provide an Email </title>
        <meta charset="utf-8">
    </head>
    <body>
        <form action="index.php" method="post">
            <input type="text" name="email_address"/>
            <input type="submit" value="Submit"/>
        </form>

    </body>
</html>
<?php
    session_start();
    
    if (isset($_POST["Submit"])) {
        $_SESSION["email_address"] = $_POST["email_address"];
        header('Location: ' . "index.php");
    }
?>


