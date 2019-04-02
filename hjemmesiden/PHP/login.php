<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$conn = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
		mysqli_select_db($conn, "route66") or die("Cannot connect to database"); //Connect to database
		
		$brugernavn = mysqli_real_escape_string($conn, $_POST['brugernavn']);
		$kodeord = mysqli_real_escape_string($conn, $_POST['kodeord']);

		$query = mysqli_query($conn, "SELECT * FROM administartor WHERE administartorkode = '$kodeord' AND administartorlogin = '$brugernavn';"); //Query the users table
		$rowNumber = mysqli_num_rows($query);
		if($rowNumber > 0){
			header('location:/hjemmesiden/administartorside.html');
		}
		else{
			header('location:/hjemmesiden/index.html');
		}

	}	
?>