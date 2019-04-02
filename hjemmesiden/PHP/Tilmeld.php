<?php
//denne side virker ikke endnu
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$mysqli = new mysqli("localhost", "root", "", "route66");
		if($mysqli->connect_error)
		{
			exit('Could not connect');
		}

		$navn = $_POST['name'];
		$email = $_POST['mail'];
		$nummer = $_POST['mobilnummer'];
		$answer = $_POST['Answer'];

		$mysqli->query("CALL Opret_bruger('$navn','$email',$nummer)");
		$message = "Du har nu tilmeldt dig til Route 66 konkurrence for en chance for en tur til spainen";
		$sql = "SELECT Rigtigt_eller_forkert FROM svarmuligheder WHERE svarmuligheder = '$answer'";
		$temp = mysqli_query($mysqli, $sql);//virker ikke
		$row = mysqli_fetch_assoc($temp);//virker ikke
		if ($row["rigtigt_eller_forkert"] == 1) 
		{
			$sql1 = "UPDATE bruger SET har_rigtige = 1 WHERE mailbruger = '$email'";
			$mysqli->query($sql1);
		}
		//header('location:/hjemmesiden/Index.html');
		//SEND EN MAIL
		//mail ($email,'Route 66 konkurrence',$message);
	}
?>