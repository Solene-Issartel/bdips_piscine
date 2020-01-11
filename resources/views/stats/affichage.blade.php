@extends('layouts.layauth')

@section('title')
Statistiques
@endsection

@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>


<div class="container">
	<canvas id="myChart"></canvas>
</div>

@if (isset($prenom))
	
	<script>
	let myChart=document.getElementById('myChart').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
	let graph = new Chart(myChart, {
	    type: 'bar',
	    data: {
	        labels: <?php echo json_encode($libSujet);?>,
	        datasets: [{
	            label: 'Score',
	            data: <?php echo json_encode($resultat);?> ,
	            backgroundColor:'rgba(54, 162, 235, 0.2)',
	            borderColor:'rgba(54, 162, 235, 1)',
	            borderWidth: 1,
	            barThickness : 50 
	        }]
	    },
	    options: {
	    	title:{
	    		display:true,
	    		text:'<?php echo $nom." ".$prenom ; ?>\'s score',
	    		fontSize:32
	    	},
	    	legend:{
	    		position:'right'
	    	},
	    	scales:{
	    		yAxes:[{
	    			ticks: {
	        		min: 0,
	        		max : 990
	    		}
	    		}]
	    	}  	
	    }
	});
	</script>
@elseif (isset($moySousPartie))
	<script>
		let myChart=document.getElementById('myChart').getContext('2d');
		Chart.defaults.global.defaultFontFamily = 'Lato';
	    Chart.defaults.global.defaultFontSize = 18;
	    Chart.defaults.global.defaultFontColor = '#777';
		let graph = new Chart(myChart, {
		    type: 'polarArea',
		    data: {
		        labels: <?php echo json_encode($libSousParties);?>,
		        datasets: [{
		            label: 'Score',
		            data: <?php echo json_encode($moySousPartie);?> ,
		            backgroundColor:[
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(25, 25, 79, 0.2)',
            ],
		            borderColor:'rgba(54, 162, 235, 1)',
		            borderWidth: 1,
		            barThickness : 50 
		        }]
		    },
		    options: {
		    	title:{
		    		display:true,
		    		text:'Name Session\'s score',
		    		fontSize:32
		    	},
		    	legend:{
		    		position:'right'
		    	}, 	
		    }
		});
	</script>
@elseif (isset($partie))
	<script>
		let myChart=document.getElementById('myChart').getContext('2d');
		Chart.defaults.global.defaultFontFamily = 'Lato';
	    Chart.defaults.global.defaultFontSize = 18;
	    Chart.defaults.global.defaultFontColor = '#777';
		let graph = new Chart(myChart, {
		    type: 'bar',
		    data: {
		        labels: <?php echo json_encode($libSujet);?>,
		        datasets: [{
		            label: 'Score',
		            data: <?php echo json_encode($moySujet);?> ,
		            backgroundColor:'rgba(54, 162, 235, 0.2)',
		            borderColor:'rgba(54, 162, 235, 1)',
		            borderWidth: 1,
		            barThickness : 50 
		        }]
		    },
		    options: {
		    	title:{
		    		display:true,
		    		text:'All <?php echo $partie;?>\'s score',
		    		fontSize:32
		    	},
		    	legend:{
		    		position:'right'
		    	},
		    	scales:{
		    		yAxes:[{
		    			ticks: {
		        		min: 0,
		        		max : 495
		    		}
		    		}]
		    	}  	
		    }
		});
	</script>
@elseif (isset($libPromo))


	<script>
	let myChart=document.getElementById('myChart').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
	let graph = new Chart(myChart, {
	    type: 'bar',
	    data: {
	        labels: <?php echo json_encode($libSujet);?>,
	        datasets: [{
	            label: 'Score',
	            data: <?php echo json_encode($resultat);?> ,
	            backgroundColor:'rgba(54, 162, 235, 0.2)',
	            borderColor:'rgba(54, 162, 235, 1)',
	            borderWidth: 1,
	            barThickness : 50 
	        }]
	    },
	    options: {
	    	title:{
	    		display:true,
	    		text:'<?php echo $libPromo."\'s ".$subPart;?> score',
	    		fontSize:32
	    	},
	    	legend:{
	    		position:'right'
	    	},
	    	scales:{
	    		yAxes:[{
	    			ticks: {
	        		min: 0,
	        		max : <?php echo $max;?>
	    		}
	    		}]
	    	}  	
	    }
	});
	</script>
@elseif (isset($moySujet))
	<script>
	let myChart=document.getElementById('myChart').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
	let graph = new Chart(myChart, {
	    type: 'bar',
	    data: {
	        labels: <?php echo json_encode($libSujet);?>,
	        datasets: [{
	            label: 'Score',
	            data: <?php echo json_encode($moySujet);?> ,
	            backgroundColor:'rgba(54, 162, 235, 0.2)',
	            borderColor:'rgba(54, 162, 235, 1)',
	            borderWidth: 1,
	            barThickness : 50 
	        }]
	    },
	    options: {
	    	title:{
	    		display:true,
	    		text:'All Subjects\'s score',
	    		fontSize:32
	    	},
	    	legend:{
	    		position:'right'
	    	},
	    	scales:{
	    		yAxes:[{
	    			ticks: {
	        		min: 0,
	        		max : 990
	    		}
	    		}]
	    	}  	
	    }
	});
	</script>
@else
	<p> Where are you going ? </p>
@endif











@endsection