<?php
	require 'connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LazyGame</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-png" href="favicon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="lib/easytimer/dist/easytimer.min.js"></script> 
</head>
<style>
	ul{
		list-style-type: none;
		margin: 0;
		padding: 0;
	}
	li{
		margin: 0;
	}

	@media screen and (max-width: 480px) {
   	#listUsuario{
   		font-size: 90%;
   	}
}
</style>
<body>

<div class="container-fluid text-center" style="background-color: lightgreen;">
	<h1 class="text-center">LazyGame</h1>
	<div id="chronoExample">
	    <div class="values">00:00:00</div>
	    <div>
	        <button style="width: 200px; height: 100px;" class="btn btn-primary btn-lg startButton" onmousedown="contando()" onmouseup="parar()" onmouseleave="parar()" ontouchstart="contando()" ontouchend="parar()">Start</button>        
	    </div>
	</div>     

	<p id="tempo">Aguardando</p> 

	<h4>Melhor tempo!</h4>
	<p id="n">00:00:00</p>

	<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Gravar recorde</button>
</div>
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
   	<form action="adduser.php" method="POST">
      <div class="modal-header text-center" style="background-color: lightgreen;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insira seu nome</h4>
        
      </div>
      <div class="modal-body" style="background-color: lightblue;">
        
			<label for="usr">Nome:</label>
			<input name="nome" type="text" required class="form-control" id="usr">
			<input name="tempo" type="text" id="tempophp" class="form-control fade">
			<input name="temporeal" type="text" id="tempophpreal" class="form-control fade">
			<p name="tempo" id="nn">00:00:00</p>

      </div>
      <div class="modal-footer" style="background-color: lightgreen;">
        <button type="submit" class="btn btn-default">Gravar</button>
      </div>
    </form> 
    </div>

  </div>
</div>

<div class="container-fluid" style="background-color: lightblue;">
	<h4>World Ranking</h4>
	<ul>
		<li>
			<strong><p>Nome:<span style="float: right;">Tempo:</span></p></strong>
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
			<p id="listUsuario"><?php echo $contador ?> : <?php echo $rows['nome'] ?><span style="float: right;"><?php echo $rows['tempo'] ?></span></p>
		</li>
	</ul>	
			<?php
			$contador= $contador+1;
		}
		}
		?>
</div>

<script>
var timer = new Timer();
var total = 0;
var atual = "00:00:00";
var melhor = 0;
var recorde = "00:00:00";
	
	window.onresize = function(event) {
    	timer.stop();
        document.getElementById('tempo').innerHTML = "Tempo Total " + total;
        

         if (atual > melhor) {
         	melhor = atual;
         	recorde = total;
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML = "Seu tempo: " + recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100;
         	
         }else{         	
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML = "Seu tempo: " + recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100;
         }
	};

    function contando(){
        timer.start({precision: 'secondTenths'});
        document.getElementById('tempo').innerHTML = "Contando";

    }
    
    function parar(){
        timer.stop();
        if (total != 0 ) {
        	document.getElementById('tempo').innerHTML = "Tempo Total " + total;
        }
        

         if (atual > melhor) {
         	melhor = atual;
         	recorde = total;
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML = "Seu tempo: " + recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100; 
         	
         }else{         	
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML = "Seu tempo: " + recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100; 
         }
    }



timer.addEventListener('secondTenthsUpdated', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']));
    total = timer.getTimeValues().toString([ 'minutes', 'seconds', 'secondTenths']);

    atual = Number(timer.getTimeValues().toString(['minutes']))*60 + Number(timer.getTimeValues().toString(['secondTenths'])/100) + Number(timer.getTimeValues().toString(['seconds']));
    
});

timer.addEventListener('started', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']));
    total = timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']);
    
});

timer.addEventListener('reset', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString([ 'minutes', 'seconds', 'secondTenths']));
    total = timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']);
    
});                
</script>

</body>
</html> 