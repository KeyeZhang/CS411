<?php
function is_in_pot($player_name){
	include "dbh.php";

	// obtain the team the player plays in // obtain WEST and EAST playoff teams and union them together
	$sql = "SELECT Teamname
			FROM player
			WHERE Name = '$player_name' AND Teamname IN 
		(	(SELECT short_name
			 FROM Teams_Statistics
			 WHERE Conference =  'W'
			 ORDER BY Win_percent DESC 
			 LIMIT 8
		    )
			 UNION (

			 SELECT short_name
			 FROM Teams_Statistics
			 WHERE Conference =  'E'
			 ORDER BY Win_percent DESC 
			 LIMIT 8
		    )
	    )";


	

	// judge whether the team is in playoff teams and return a boolean value
	$result = mysqli_query($conn, $sql);
	if(!$row = mysqli_fetch_assoc($result)){
		return false;
	}
	else{
		return true;
	}
	mysqli_free_result($result);
	mysqli_close($conn);
}

?>