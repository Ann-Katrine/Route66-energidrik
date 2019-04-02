<?php
	//forbinder til databasen
	$mysqli = new mysqli("localhost", "root", "", "route66");
	if($mysqli->connect_error){
		exit('Could not connect');
	}
	
	//Så man får svar fra databasen
	$sql = "SELECT qusten FROM qusten ORDER BY idqusten DESC LIMIT 1";

	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			echo $row["qusten"];
		} 
	}else {
		echo "0 results";
	}
?>