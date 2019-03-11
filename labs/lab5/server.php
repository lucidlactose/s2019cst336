<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    session_start();
    $httpMethod = strtoupper($_SERVER["REQUEST_METHOD"]);
    
    switch($httpMethod) {
        case "OPTIONS":
            onOptions();
            exit();                    
        case "GET":
            onGet();
            break;    
        case "POST":  
            onPost();
            break;       
        case "DELETE":
            onDelete();
            break ;
        default:
            // Add default handling
            break;
    }  
    
    function onPost() {
        // results is an object
        $results = new stdClass();
        $username = $_POST["username"];
        $passwords = $_POST["passwords"];
        
        // validate password
        $same_password = $passwords[0] === $passwords[1];       // same passwords
        $contains_username = strpos($passwords[0], $username) === false &&  // if it contains password
                             strpos($passwords[0], $username) !== 0;       // edge case for 0
        $empty = $passwords[0] !== "";      // makes sure it is not empty
        
        if ($same_password && $contains_username && $empty) {
            $results->valid_password = true;
        }
        else {
            $results->valid_password = false;
            $results->no_password = ($empty ? false: true);
            $results->matching_passwords = ($same_password ? false: true);
            $results->contains_username = ($contains_username ? false: true);
            $results->recommended_password = randomPassword();
        }
        
        // check if the password is available
        $results->availability = true;
        foreach ($_SESSION as $name => $value) {
            if ($name == $username) {
                $results->availability = false;
                $jsonToReturn["message"] = "Username already used";
            }
        }
        // TODO: process the registration
        if ($results->availability && $results->valid_password) {
            $_SESSION[$username] = $passwords[0];
            $jsonToReturn["message"] = "success";
        }
        
        echo json_encode($results);
    }
    function onGet() {
        
    }
    function onOptions() {
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Origin: *");
    }

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = "";
        for ($i=0; $i < 13; ++$i) {
            $j = rand(0, strlen($alphabet));
            $password .= $alphabet[$j];
        }
        return $password;
    }

?>