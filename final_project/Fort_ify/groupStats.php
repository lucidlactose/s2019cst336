<!DOCTYPE html>
<html>
	<head>
        <title>Group Stats</title>
        <!--<link href="css/styles.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/armandostuffIdontwantinmine.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://sdk.scoutsdk.com/1.0.0/js/Scout.js"></script>
        <script type="text/javascript" src="js/homePage.js"></script>
        <script type="text/javascript" src="js/everyPage.js"></script>
        <script type="text/javascript" src="js/getgroupstats.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="771332740040-lj3mssd5n8d1sfgo7fj32l5t32d5tcsu.apps.googleusercontent.com">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    
	<body>
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
                    <a href id = "rankingsTab"src = "index.php">Rankings</a>
                    <a href = "news.php" id = "newsTab" src = "index.php">News</a>
                    <a href id = "streamingTab" src = "index.php">Streaming</a>
                </nav>
                <span id = "sideMenu" onclick="openNav()">&#9776;</span>
            </form>
        </header>
		<div id = "playerstats">
			<table id = "myStatsTable">
				<tr>
					<br><br><br><br>
					<b id= "gamertag">Fduenez</b>
				</tr>
				<tr>
					<td id="mystatimgtd"><img src="img/player3.png" style="width:400px; height:370px;"/><td>
					<td>
						<div class="limiter1">
							<div class="wrap1">
								<div class="table1 ver1 m-b-110">
									<div class="table1-body js-pscroll">
										<table>
											<tbody>
												<tr>
													<td class="column11">K/D</td>
													<td class="column12">1704/1409</td>
												</tr>

												<tr>
													<td class="column11">Kills</td>
													<td class="column12">5073</td>
												</tr>
												<tr>
													<td class="column11">Win Rates:</td>
													<td class="column12">51/1460</td>
												</tr>
												<tr>
													<td class="column11">Top 1:</td>
													<td class="column12">3244</td>
												</tr>
												<tr>
													<td class="column11">Top 25:</td>
													<td class="column12">1704/1409</td>
												</tr>
												<tr>
													<td class="column11">Players outlived</td>
													<td class="column12">1704/1409</td>
												</tr>
												<tr>
													<td class="column11">Time played:</td>
													<td class="column12">1704/1409</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div id= "everyonesStats">
			<div id = "comparewithteammate">
				<div id="comparemove">
					<b style="margin-left: 350px; font-size: 50px;"><u>Compare with Teammate</u></b>
					<br>
					<h2 id= "searchteammate">Search: <input type="text" id = "compairFriendTag"> <button type="button" id="compairbutton">Enter</button><h2>
				</div>
			</div>	
			<div id = "killsDiv">
				<b style="margin-left: 700px; font-size: 50px;"><u>Team stats</u></b>
				<h1>Rank by Kills</h1>
				<div class="limiter2">
					<div class="wrap2">
						<div class="table2 ver1 m-b-110">
							<div class="table2-body js-pscroll">
								<table>
									<tbody id = "tableBody2">
				
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="piechart1"></div>
				</div>
			</div>
			<div id = "topOneDiv">
				<h1>Ranking by Wins </h1>
				<div class="limiter3">
					<div class="wrap3">
						<div class="table3 ver1 m-b-110">
							<div class="table3-body js-pscroll">
								<table>
									<tbody id = "tableBody3">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="piechart2"></div>
				</div>
			</div>
			<div id = "kdDiv">
				<h1>Rank by K/D</h1>
				<div class="limiter4">
					<div class="wrap4">
						<div class="table4 ver1 m-b-110">
							<div class="table4-body js-pscroll">
								<table>
									<tbody id = "tableBody4">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="piechart3"></div>
				</div>
			</div>
		</div>
	</body>
	<div class="g-signin2" style = "visibility:hidden"></div>

    <div class="g-signin2" style = "visibility:hidden"></div>
</html>
