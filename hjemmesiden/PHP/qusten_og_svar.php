<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//Forbinder til databasen
		$mysqli = new mysqli("localhost", "root", "", "Route66");
		if($mysqli->connect_error){
			exit('Could not connect');
		}
		
		//Får værdierne fra html-siden
		$qusten = mysqli_real_escape_string($mysqli, $_POST['qusten']);
		$svar1 = mysqli_real_escape_string($mysqli, $_POST['svarmulighed1']);
		$svar2 = mysqli_real_escape_string($mysqli, $_POST['svarmulighed2']);
		$svar3 = mysqli_real_escape_string($mysqli, $_POST['svarmulighed3']);
		
		//Sætter det ind i databasen
		$sql = "INSERT INTO qusten (qusten) VALUES ('$qusten')";
		$show = mysqli_query($mysqli, $sql);
		$last_id = $mysqli->insert_id;
	
		$sql1 = "INSERT INTO svarmuligheder (svarmuligheder, rigtigt_eller_forkert, qusten_idqusten) VALUES ('$svar1', 1, '$last_id')";
		$sql2 = "INSERT INTO svarmuligheder (svarmuligheder, rigtigt_eller_forkert, qusten_idqusten) VALUES ('$svar2', 0, '$last_id')";
		$sql3 = "INSERT INTO svarmuligheder (svarmuligheder, rigtigt_eller_forkert, qusten_idqusten) VALUES ('$svar3', 0, '$last_id')";
		
		$show1 = mysqli_query($mysqli, $sql1);
		$show2 = mysqli_query($mysqli, $sql2);
		$show3 = mysqli_query($mysqli, $sql3);
		
		//Så den ikke går over på php-siden men bliver på html-siden
		header('location:/hjemmesiden/opret_qusten_and_svar.html');
		
		//lukker forbindelsen
		$mysqli->close();
	
	}else{
		echo "HELLO!!!";
	}
?>