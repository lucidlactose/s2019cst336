<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

/*
    1   id	                int(11)			
	2	player_id	        varchar(38)
	3	username	        varchar(30)	
	4	pictureUrl	        varchar(300)	
	5	win_rate	        double
	6	kill_death_ratio	double	
	7	players_outlived	int(40)	
	8	place_top25	        int(30)			
	9	place_top12	        int(20)			
	10	place_top6	        int(20)
	11	place_top3	        int(20)
	12	place_top1	        int(11)
	13	time_played	        int(50)		
	14	minutes_played	    int(50)	
	15	matches_played	    int(50)	
	16	score	            int(50)			
	17	kills               int(40)
*/
$np = array();
$np[":player_id"] = $_POST["id"];
$np[":username"] = $_POST["username"];
$np[":pictureUrl"] = $_POST["pictureUrl"];
$np[":win_rate"] = $_POST["win_rate"];
$np[":kill_death_ratio"] = $_POST["kill_death_ratio"];
$np[":players_outlived"] = $_POST["players_outlived"];
$np[":place_top25"] = $_POST["place_top25"];
$np[":place_top12"] = $_POST["place_top12"];
$np[":place_top6"] = $_POST["place_top6"];
$np[":place_top3"] = $_POST["place_top3"];
$np[":place_top1"] = $_POST["place_top1"];
$np[":time_played"] = $_POST["time_played"];
$np[":minutes_played"] = $_POST["minutes_played"];
$np[":matches_played"] = $_POST["matches_played"];
$np[":score"] = $_POST["score"];
$np[":kills"] = $_POST["kills"];

$sql = "INSERT INTO player_stats (
            player_id, username, pictureUrl, win_rate, kill_death_ratio, players_outlived, 
            place_top25, place_top12, place_top6, place_top3, place_top1, time_played,minutes_played,
            matches_played, score, kills 
        ) 
        VALUES (
            :player_id, :username, :pictureUrl, :win_rate, :kill_death_ratio, :players_outlived,
            :place_top25, :place_top12, :place_top6, :place_top3, :place_top1, :time_played, :minutes_played,
            :matches_played, :score, :kills
        )";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($records);
echo json_decode(array("status"=>"success"))

?>