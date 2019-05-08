<!DOCTYPE html>
<html lang="en">
	<head>
        <title> Player </title>
        <meta charset="utf-8">
        <!--our stylesheets-->
        
        <link href="css/searchResults.css" rel="stylesheet" type="text/css"/>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
            <!--someone else crud-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://sdk.scoutsdk.com/1.0.0/js/Scout.js"></script>
            <!--our webpage javascript-->
        <script type="text/javascript" src="js/everyPage.js"></script>
        <script type="text/javascript" src="js/searchResultsPage.js"></script>
        
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="771332740040-lj3mssd5n8d1sfgo7fj32l5t32d5tcsu.apps.googleusercontent.com">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    </head>
    
	<body>
	    <div id="profile-id"></div>
		<header>
		    <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="profile.php?username=wickyticky">My Stats</a>
                <a href="following.php">Following</a>
                <a href="#">Followers</a>
                <a href="fortHome.php" onclick="signOut()">Sign Out</a>
            </div>
            <form class="navigationBar">
                <div id = "logo">
                    <h3 style = "color:white;">Fort-ify</h3>
                </div>
                <button type = "button" id="ps4Tab" ><i class="fab fa-playstation"></i></button>
                <button type = "button" id="xbxTab" ><i class="fab fa-xbox"></i></button>
                <button type = "button" id="pcTab" ><i class="fab fa-windows"></i></button>
                <input type="text" placeholder="Enter your Epic Games username..." data-username="{{result['username']}}" name="search" id = "searchQ">
                <button type="button" id ="searchButton"><i class="fa fa-search"></i></button>
                <nav>
                    <a href = "groupStats.php" id = "rankingsTab"src = "index.php">Rankings</a>
                    <a href = "news.php" id = "newsTab" src = "index.php">News</a>
                    <a href id = "streamingTab" src = "index.php">Streaming</a>
                    
                </nav>
                <span id = "sideMenu" onclick="openNav()">&#9776;</span>
            </form>
        </header>
        
        <div class= "player-box">
            
		    
	        <div class="current-stat">
	            <div class="player-specifics">
		        <!--<div id="profile-pic"> <img src="#" alt=" "> </div>-->
		        <div id="profile-name"> playerName </div>
		        <button id="follow-button" name="follow" class="btn btn-success">+</button>
		        <button id="unfollow-button" name="unfollow" class="btn btn-success">-</button>
		        <button id="refresh-button" name="refresh"class="btn btn-success"><i class="fas fa-sync"></i></button>
		        </div>
		        <div id="wins"></div>
		        <div id="score"></div>
		        <div id="kd"></div>
		        <div id="matchesPlayed"></div>
		        <div id="kills"></div>
	        </div>    
		</div>
			
</body>
<div class="g-signin2" style = "visibility:hidden"></div>

</html>
