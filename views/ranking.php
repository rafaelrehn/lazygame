<?php
	require '../connection.php'
?>
<div class="container" style="background-color: #559E54;">
	<div class="jumbotron">
	<h1>World Ranking</h1>
	<ul>
		<li>
			<h2><strong>Nome:<span style="float: right;">Tempo:</span></strong></h2>
		</li>
		<?php
			$usuario = "SELECT * FROM usuario WHERE temporeal > 0 ORDER BY temporeal DESC";
			$usuarios = mysqli_query($conn , $usuario);	
			$contador=1;	
			if(mysqli_num_rows($usuarios)<=0){
			echo "Sem cadastros..";
			}else{
				while($rows = mysqli_fetch_assoc ($usuarios)){
					
			?>
		<li type="1" style="list-style-type: none;">
			<h2 id="listUsuario"><?php echo $contador ?> : <?php echo $rows['nome'] ?><span style="float: right;"><?php echo $rows['tempo'] ?></span></h2>
						<?php
			$contador= $contador+1;
		}
		}
		?>
		</li>
	</ul>	

	</div>
</div>