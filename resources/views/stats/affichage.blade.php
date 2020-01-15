@extends('layouts.layhome')

@section('title')
Statistiques
@endsection

@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

@if (isset($prenom))
<div class="container-fluid text-center" style="width: 70%;height:auto;margin-top:50px;">
	<canvas id="myChart"></canvas>
</div>
	
<script>
	let myChart=document.getElementById('myChart').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Quicksand';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#000000';
	let graph = new Chart(myChart, {
	    type: 'bar',
	    data: {
	        labels: <?php echo json_encode($libSujet);?>,
	        datasets: [{
	            label: 'Score',
	            data: <?php echo json_encode($resultat);?> ,
	            backgroundColor:'rgba(0, 123, 255, 1)',
				borderColor:'rgba(0, 123, 255, 1)',
				borderWidth: 1,
				barThickness : 50 
	        }]
	    },
	    options: {
	    	title:{
	    		display:true,
	    		text:'<?php echo $nom." ".$prenom ; ?>\'s score',
	    		fontSize:70,
				fontColor:'#000000',
				padding:30
	    	},
	    	legend:{position:'bottom',display: false},
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
<div class="container-fluid text-center" style="margin-top:50px;">
	<div class="row">
		<div class="col-sm-6" style="vertical-align: middle;">
			<canvas id="myChart"></canvas>
		</div>
		<div class="col-sm-6" style="vertical-align: middle;">
			<canvas id="sucessRate" style="margin-bottom:30px;"></canvas>
			<p>
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Students in failure
				</button>
			</p>
			<div class="collapse" id="collapseExample" style="width:40%;margin-left:30%;">
				<div class="card card-body">
					<ul class="list-group">
						<?php
						//eleve en difficulté :
						foreach ($difficulte as &$diff) {
							echo "	<li class='list-group-item d-flex justify-content-between align-items-center'>
										$diff
									</li>";
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>




<script>
		let myChart=document.getElementById('myChart').getContext('2d');
		Chart.defaults.global.defaultFontFamily = 'Quicksand';
	    Chart.defaults.global.defaultFontSize = 18;
    	Chart.defaults.global.defaultFontColor = '#000000';
		let graph = new Chart(myChart, {
		    type: 'polarArea',
		    data: {
		        labels: <?php echo json_encode($libSousParties);?>,
		        datasets: [{
		            label: 'Score',
		            data: <?php echo json_encode($moySousPartie);?> ,
		            backgroundColor:[
					'rgba(231, 76, 60, 0.5)',
					'rgba(230, 126, 34, 0.5)',
					'rgba(241, 196, 15, 0.5)',
					'rgba(39, 174, 96, 0.5)',
					'rgba(0, 123, 255, 0.5)',
					'rgba(142, 68, 173, 0.5)',
					'rgba(127, 140, 141, 0.5)'],borderWidth: 1,barThickness : 50 }]
		    },
		    options: {
		    	title:{
		    		display:true,
		    		text:'Selected session\'s score',
		    		fontSize:50,
					fontColor:'#000000',
					padding:40
		    	},
		    	legend:{position:'right',display: true},
		    }
		});
</script>

<script>
	let succ=document.getElementById('sucessRate').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Quicksand';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#000000';
	let succGraph = new Chart(succ, {
	    type: 'doughnut',
	    data: {
	        labels: ['Success','Failure'],
	        datasets: [{
	            label: 'Score',
	            data: [<?php echo $totalusers-$totaldiff ;?>,<?php echo $totaldiff;?>] ,
	            backgroundColor:['rgba(231, 76, 60, 0.5)',"rgba(230, 126, 34, 0.5)"],
				barThickness : 50 
	        }]
	    },
	    options: {
	    	title:{
	    		display:true,
	    		text:' Success Rate',
	    		fontSize:50,
				fontColor:'#000000',
				padding:40
	    	}
	    	//legend:{position:'bottom',display: false}  	
	    }
	});
</script>


@elseif (isset($partie))
<div class="container-fluid text-center" style="width: 70%;height:auto;margin-top:50px;">
	<canvas id="myChart"></canvas>
</div>

<script>
		let myChart=document.getElementById('myChart').getContext('2d');
		Chart.defaults.global.defaultFontFamily = 'Quicksand';
	    Chart.defaults.global.defaultFontSize = 18;
    	Chart.defaults.global.defaultFontColor = '#000000';
		let graph = new Chart(myChart, {
		    type: 'bar',
		    data: {
		        labels: <?php echo json_encode($libSujet);?>,
		        datasets: [{
		            label: 'Score',
		            data: <?php echo json_encode($moySujet);?> ,
		            backgroundColor:'rgba(0, 123, 255, 1)',
					borderColor:'rgba(0, 123, 255, 1)',
					borderWidth: 1,
					barThickness : 50 
		        }]
		    },
		    options: {
		    	title:{
		    		display:true,
		    		text:'All subject <?php echo $partie;?>\'s score',
		    		fontSize:70,
					fontColor:'#000000',
					padding:30
		    	},
		    	legend:{position:'bottom',display: false},
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
<div class="container-fluid text-center" style="width: 70%;height:auto;margin-top:50px;">
	<canvas id="myChart"></canvas>
</div>

<script>
	let myChart=document.getElementById('myChart').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Quicksand';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#000000';
	let graph = new Chart(myChart, {
	    type: 'bar',
	    data: {
	        labels: <?php echo json_encode($libSujet);?>,
	        datasets: [{
	            label: 'Score',
	            data: <?php echo json_encode($resultat);?> ,
	            backgroundColor:'rgba(0, 123, 255, 1)',
				borderColor:'rgba(0, 123, 255, 1)',
				borderWidth: 1,
				barThickness : 50 
	        }]
	    },
	    options: {
	    	title:{
	    		display:true,
	    		text:'<?php echo $libPromo."\'s ".$subPart;?> score',
	    		fontSize:70,
				fontColor:'#000000',
				padding:30
	    	},
	    	legend:{position:'bottom',display: false},
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
<div class="container-fluid text-center" style="width: 70%;height:auto;margin-top:50px;">
	<canvas id="myChart"></canvas>
</div>

<script>
	let myChart=document.getElementById('myChart').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Quicksand';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#000000';
	let graph = new Chart(myChart, {
	    type: 'bar',
	    data: {
	        labels: <?php echo json_encode($libSujet);?>,
	        datasets: [{
	            label: 'Score',
	            data: <?php echo json_encode($moySujet);?>,
				backgroundColor:'rgba(0, 123, 255, 1)',
				borderColor:'rgba(0, 123, 255, 1)',
				borderWidth: 1,
				barThickness : 50 
	        }]
	    },
	    options: {
	    	title:{display:true,text:'All subject\'s scores',fontSize:70,fontColor:'#000000',padding:30},
	    	legend:{position:'bottom',display: false},
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

@elseif (isset($id_user))

<div class="container-fluid text-center" style="width: 70%;height:auto;margin-top:50px;">
	<p>
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Scores timeline</button>
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Select session</button>
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Selected session score</button>
	</p>
	<div class="collapse" id="collapse1">
		<div class="card card-body">
			<canvas id="myChart"></canvas>
		</div>
	</div>
	<div class="collapse" id="collapse2">
		<div class="card card-body text-center">
			<h2 style="margin-bottom:20px;">Which session do you want to analyse ?</h2>
			<form method="post" action="{{url('affichage')}}">
				{{ csrf_field() }}
				<select class="form-control" name="userSubPart" style="width:20%;height:auto;margin-left:40%;">
					<?php for($i=0; $i<count($userHour);$i++){
						$selected='';
						if($i==(count($userHour)-1)){
							$selected='selected="selected"';
						}
						
						echo "\t",'<option value="',$userIdSession[$i],'"',$selected,'>',$userDate[$i]."  ".$userHour[$i],'</option>',"\n";
					}?>
				</select>
				</br>
				<input type="submit" name="okUserSubPart" class="btn btn-primary" value="Submit" style="margin-top:15px;"/>			
			</form>
		</div>
	</div>
	<div class="collapse" id="collapse3">
		<div class="card card-body">
			<canvas id="user"></canvas>
		</div>
	</div>
</div>

<script>
	let myChart=document.getElementById('myChart').getContext('2d');
	Chart.defaults.global.defaultFontFamily = 'Quicksand';
	Chart.defaults.global.defaultFontSize = 18;
	Chart.defaults.global.defaultFontColor = '#000000';
	let graph = new Chart(myChart, {
		type: 'bar',
		data: {
			labels: <?php echo json_encode($libSujet);?>,
			datasets: [{
				label: 'Score',
				data: <?php echo json_encode($resultatSujet);?> ,
				backgroundColor:'rgba(0, 123, 255, 1)',
				borderColor:'rgba(0, 123, 255, 1)',
				borderWidth: 1,
				barThickness : 50 
			}]
		},
		options: {
			title:{display:true,text:'Scores timeline',fontSize:70,fontColor:'#000000',padding:30},
			legend:{position:'bottom',display: false},
	
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

<script>
	let mySubChart=document.getElementById('user').getContext('2d');
	let Subgraph = new Chart(mySubChart, {
		type: 'polarArea',
		data: {
			labels: <?php echo json_encode($libSousParties);?>,
			datasets: [{
				label: 'Score',
				data: <?php echo json_encode($resSousPartie);?> ,
				backgroundColor:[
				'rgba(231, 76, 60, 0.5)',
				'rgba(230, 126, 34, 0.5)',
				'rgba(241, 196, 15, 0.5)',
				'rgba(39, 174, 96, 0.5)',
				'rgba(0, 123, 255, 0.5)',
				'rgba(142, 68, 173, 0.5)',
				'rgba(127, 140, 141, 0.5)'],borderWidth: 1,barThickness : 50 
			}]
		},
		options: {
			title:{display:true,text:'Selected session\'s score',fontSize:70,position: 'top',fontColor:'#000000',padding:30},
			legend:{position:'right'},  	
		}
	});
</script>
@else
	<p> Where are you going ? </p>
@endif

@endsection