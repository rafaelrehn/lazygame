<?php
	require 'connection.php';

	$output = array();
	$query = "SELECT * FROM usuarios where (nome != ' ' and tempo != '')";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result)>0) {
		while ( $row = mysqli_fetch_array($result)) {
			$output[]=$row;
		}
		echo json_encode($output);
		//console.log($output);
	}
?>