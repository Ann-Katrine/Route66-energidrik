<?php
	ini_set('display_errors', 0);

	//Forbinder til databasen
	$mysqli = new mysqli("localhost", "root", "", "Route66");
	if($mysqli->connect_error){
		exit('Could not connect');
	}

	//Så den trækker en vinder
	$result = $mysqli->query("CALL trak_3_random_vinder");
	if(!$result){
		echo "CALL Failed: (" . $conn->errno . ") " . $conn->error;
	}

	//Så man få svar tilbage
	$sql = "SELECT navnbruger, mailbruger, mobilbruger, har_rigtige, Monthbruger, vinder FROM bruger WHERE (vinder = 1 AND date_format(Monthbruger, '%M') = date_format(NOW(), '%M'))";
	$kage = $mysqli->query($sql);
	if ($kage->num_rows > 0) {
		// output data of each row
		while($row = $kage -> fetch_assoc()){
			echo "Name: " . $row["navnbruger"]. " - mail: " . $row["mailbruger"]." - mobil: " . $row["mobilbruger"] . " - rigtige: " . $row["har_rigtige"] . " - Dato; " . $row["Monthbruger"] . " - har vundet: " . $row["vinder"] . "<br>";
		}
	} else {
		echo "0 results";
	}

	//lukker forbindelsen
	$mysqli->close();
?>