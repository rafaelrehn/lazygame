<?php
	require 'connection.php';

	$nome = $_POST['nome'];
	$tempo = $_POST['tempophp'];
	$temporeal = $_POST['tempophpreal'];
	//echo "$tempo";
	$result_recado="INSERT INTO usuarios (nome, tempo, temporeal) VALUES ('$nome','$tempo','$temporeal')";
	$resultado_recados = mysqli_query($conn,$result_recado);
	//header("location: http://localhost:888/lazygame/");
?>