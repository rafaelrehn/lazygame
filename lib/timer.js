var timer = new Timer();
var total = 0;
var atual = "00:00:00";
var melhor = 0;
var recorde = "00:00:00";
	
	window.onresize = function(event) {
    	timer.stop();
        $(".startButton").css({"animation":"" , "animation-iteration-count": ""});
        document.getElementById('tempo').innerHTML = total;
        

         if (atual > melhor) {
         	melhor = atual;
         	recorde = total;
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML = recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100;
         	
         }else{         	
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML = recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100;
         }
	};

    function contando(){
        timer.start({precision: 'secondTenths'});
        document.getElementById('tempo').innerHTML = "Contando";
        $(".startButton").css({"animation":"jello 1s" , "animation-iteration-count": "infinite" , "animation-delay" : "0.85s"});
    }

    
    
    function parar(){
        timer.stop();
         $(".startButton").css({"animation":"" , "animation-iteration-count": ""});
        if (total != 0 ) {
        	document.getElementById('tempo').innerHTML = "Tempo Total " + total;
        }
        

         if (atual > melhor) {
         	melhor = atual;
         	recorde = total;
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML = recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100; 
         	
         }else{         	
         	document.getElementById('n').innerHTML = recorde;
         	document.getElementById('nn').innerHTML =  recorde;
         	document.getElementById("tempophp").value = recorde;
         	document.getElementById("tempophpreal").value = atual*100; 
         }
    }



timer.addEventListener('secondTenthsUpdated', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']));
    total = timer.getTimeValues().toString([ 'minutes', 'seconds', 'secondTenths']);

    atual = Number(timer.getTimeValues().toString(['minutes']))*60 + Number(timer.getTimeValues().toString(['secondTenths'])/100) + Number(timer.getTimeValues().toString(['seconds']));
    
});

/*
timer.addEventListener('started', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']));
    total = timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']);
    
});

timer.addEventListener('reset', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString([ 'minutes', 'seconds', 'secondTenths']));
    total = timer.getTimeValues().toString(['minutes', 'seconds', 'secondTenths']);
    
});                
*/