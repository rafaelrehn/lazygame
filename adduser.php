<?php
	require 'connection.php';



$nome = $_POST['nome'];
$tempo = $_POST['tempo'];
$temporeal = $_POST['temporeal'];
//echo "$tempo";
$result_recado="INSERT INTO usuario (nome, tempo, temporeal) VALUES ('$nome','$tempo','$temporeal')";
$resultado_recados = mysqli_query($conn,$result_recado);

header("location: lazygame/#!/play");


?>