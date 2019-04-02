<?php
	//forbinder til databasen
	$mysqli = new mysqli("localhost", "root", "", "route66");
	if($mysqli->connect_error){
		exit('Could not connect');
	}

	//Så man få svar tilbage
	$sql = "SELECT navnbruger, mailbruger, mobilbruger, har_rigtige, Monthbruger, vinder FROM bruger WHERE (har_rigtige = 1 AND date_format(Monthbruger, '%M') = date_format(NOW(), '%M'))";
	$kage = $mysqli->query($sql);
	if ($kage->num_rows > 0) {
		// output data of each row
		while($row = $kage -> fetch_assoc()){
			echo "Name: " . $row["navnbruger"]. " - mail: " . $row["mailbruger"]." - mobil: " . $row["mobilbruger"] . " - rigtige: " . $row["har_rigtige"] . " - Dato; " . $row["Monthbruger"] . " - har vundet: " . $row["vinder"] . "<br>";
		}
	} else {
		echo "0 results";
	}
	$mysqli->close();
?>