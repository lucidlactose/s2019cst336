

<!DOCTYPE html>
<html>
    <head>
        <title>Fort-ify</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://sdk.scoutsdk.com/1.0.0/js/Scout.js"></script>
        <script type="text/javascript" src="js/everyPage.js"></script>
        <script type="text/javascript" src="js/profilePage.js"></script>
        <script type="text/javascript" src="js/homePage.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="771332740040-bst02ajh5o98uga1dk3e36sv30pjknuh.apps.googleusercontent.com">
        <!--<link type="text/css" rel="stylesheet" href="magicscroll-trial/magicscroll/magicscroll.css"/>-->
        <!--<script type="text/javascript" src="magicscroll-trial/magicscroll/magicscroll.js"></script>-->
        
    </head>
    <body>
        
        <header>
            <form class="navigationBar">
                <div id = "logo">
                    <h3 style = "color:white;">Fort-ify</h3>
                </div>
                <button type = "button" id="ps4Tab" >PS4</button>
                <button type = "button" id="xbxTab" >XBX</button>
                <button type = "button" id="pcTab" >PC</button>
                <input type="text" placeholder="Enter your Epic Games username..." data-username="{{result['username']}}" name="search" id = "searchQ">
                <button type="button" id ="searchButton"><i class="fa fa-search"></i></button>
                <nav>
                    <a href id = "rankingsTab"src = "index.php">Rankings</a>
                    <a href id = "newsTab" src = "index.php">News</a>
                    <a href id = "streamingTab" src = "index.php">Streaming</a>
                </nav>
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
            </form>

        </header>
    		<div id = "dailyItems">
    			<br>
    				<table id = "daily">
    					<tr>
    						<b id= "sectionTitle">Daily Store Items</b>
    					</tr>
    					<?php
    					// Setup the CURL session
                        $cSession = curl_init();
                        
                        // Setup the CURL options
                        curl_setopt($cSession,CURLOPT_URL,"https://fortnite-public-api.theapinetwork.com/prod09/store/get?language=en");
                        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($cSession,CURLOPT_HEADER, false);
                        
                        // Add headers to the HTTP command
                        curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
                            "Accept: application/json",
                            "Content-Type: application/json",
                        ));
                        
                        // Execute the CURL command
                        $results = curl_exec($cSession);
                        
                        // Check for specific non-zero error numbers
                        $errno = curl_errno($cSession);
                        if ($errno) {
                            switch ($errno) {
                                default:
                                    echo "Error #$errno...execution halted";
                                    break;
                            }
                        
                            // Close the session and exit
                            curl_close($cSession);
                            exit();
                        }
                        
                        // Close the session
                        curl_close($cSession);
                        
                        
                        // json_encode($results);
                        // $results = ($results);
                        $results = json_decode($results,true);
                        for($i = 0; $i < 10; $i += 2){
                            $data = json_encode($results['items'][$i]["item"]["images"]["information"]);
                            $data2 = json_encode($results['items'][$i + 1]["item"]["images"]["information"]);
                            $data3 = json_encode($results['items'][$i + 2]["item"]["images"]["information"]);
                            echo "<tr> <td><img src=" . $data . " onclick='myFunction(this);'/> </td> <td><img src=". $data2 . "onclick='myFunction(this);'/> </td> <td><img src=". $data3 . "onclick='myFunction(this);'/> </td> </tr>";
                        }
                        ?>
    				</table>
    				<br>
                </div>
            <div id = "upComingItems">
    			<br>
    				<table id = "upComing">
    					<tr>
    						<b id= "sectionTitle">Upcomming Items</b>
    					</tr>
    					<?php
    					// Setup the CURL session
                        $cSession = curl_init();
                        
                        // Setup the CURL options
                        curl_setopt($cSession,CURLOPT_URL,"https://fortnite-public-api.theapinetwork.com/prod09/upcoming/get");
                        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($cSession,CURLOPT_HEADER, false);
                        
                        // Add headers to the HTTP command
                        curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
                            "Accept: application/json",
                            "Content-Type: application/json",
                        ));
                        
                        // Execute the CURL command
                        $results = curl_exec($cSession);
                        
                        // Check for specific non-zero error numbers
                        $errno = curl_errno($cSession);
                        if ($errno) {
                            switch ($errno) {
                                default:
                                    echo "Error #$errno...execution halted";
                                    break;
                            }
                        
                            // Close the session and exit
                            curl_close($cSession);
                            exit();
                        }
                        
                        // Close the session
                        curl_close($cSession);
                        
                        
                        // json_encode($results);
                        // $results = ($results);
                        $results = json_decode($results,true);
                        for($i = 0; $i < 10; $i += 2){
                            $data = json_encode($results['items'][$i]["item"]["images"]["information"]);
                            $data2 = json_encode($results['items'][$i + 1]["item"]["images"]["information"]);
                            $data3 = json_encode($results['items'][$i + 2]["item"]["images"]["information"]);
                            echo "<tr> <td><img src=" . $data . " onclick='myFunction(this);'/> </td> <td><img src=". $data2 . "onclick='myFunction(this);'/> </td> <td><img src=". $data3 . "onclick='myFunction(this);'/> </td> </tr>";
                        }
                        ?>
    				</table>
    				<br>
                </div>
                
    		</div>
    		<div id="bottom">
    		    <br>
    		    <center style="margin-top:50px;">
    		       Enrique Mosqueda Pesqueda Inuega Ortega De La Rosa Martinez Ryan
    		    </center>
    		</div>
    		<div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
            </div>
        </body>
        <script>
                function myFunction(imgs) {
                console.log(imgs);
                // Get the modal
                var modal = document.getElementById('myModal');
                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var modalImg = document.getElementById("img01");
                modal.style.display = "block";
                modalImg.src = imgs.src;
                var span = document.getElementsByClassName("close")[0];
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() { 
                modal.style.display = "none";
                };
            }
        </script>
    
</html>