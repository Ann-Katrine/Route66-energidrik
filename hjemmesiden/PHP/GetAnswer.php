<?php
	//frobindelse til databasen
	$mysqli = new mysqli("localhost", "root", "", "route66");
	if($mysqli->connect_error){
		exit('Could not connect');
	}

	//Så man får svar fra databasen
	$lastid = mysqli_insert_id($mysqli);
	$sql = "SELECT svarmuligheder FROM svarmuligheder WHERE qusten_idqusten = (SELECT idqusten FROM qusten ORDER BY idqusten DESC LIMIT 1) ORDER BY rand() LIMIT 3";

	$result = $mysqli->query($sql);
	$array = array();
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["svarmuligheder"], ":";
			//array_push($array,$row["svarmuligheder"]);
		}
		//echo $array;
	} else {	
		echo "0 results";    
	}
?>