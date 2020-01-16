@extends('layouts.layauth')

@section('title')
Quiz
@endsection

@section('content')
<!-- Titre -->
<div class="container-fluid text-center" style="margin-top:60px;">
  <h1 class="display-4">Good luck !</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 21%; margin-top: .9rem; margin-bottom: 1rem;">
  <body onload="start()">
    <p id="starting_hour" hidden>{{$temps_debut[0][0]*10+$temps_debut[0][1]}}</p>
    <p id="starting_min" hidden>{{$temps_debut[0][3]*10+$temps_debut[0][4]}}</p>
    <p id="starting_sec" hidden>{{$temps_debut[0][6]*10+$temps_debut[0][7]}}</p>  
    <p id="starting_hour" >Session started at : {{$temps_debut[0]}}</p>
    <p id="temps_restant"></p>
    <script >
        var timer;
        var total_second;
        function start(){
            var dateToday=new Date();     
            var current_hour=dateToday.getHours();
            var current_min=dateToday.getMinutes();
            var current_sec=dateToday.getSeconds();

            var starting_hour=parseInt(document.getElementById("starting_hour").innerHTML);
            var starting_min=parseInt(document.getElementById("starting_min").innerHTML);
            var starting_sec=parseInt(document.getElementById("starting_sec").innerHTML);
            var ending_hour=starting_hour+2; 
            var ending_min=starting_min;
            var ending_sec=starting_sec
	    
	    //ajout de verifications si jamais on veut changer le temps de la session pour la demo :
	    if (ending_sec>=60){
		ending_min+=1
		ending_sec=ending_sec%60
	    }

	    if (ending_min>=60){
	    	ending_hour+=1
		ending_min=ending_min%60
	    }
	    
            var diff_hour=ending_hour-current_hour;
            var diff_min=ending_min-current_min;
            var diff_sec=ending_sec-current_sec;
            //total_second=-10;
            total_second=(3600*diff_hour)+(60*diff_min)+(diff_sec);
            if(total_second<0){
              end();
            } 
            else{
              countdown(total_second);
            }
        }

        function countdown(n) {
          if (n==0){
            document.getElementById('quizForm').submit();
          }
          else{
            var str="";
            str+=Math.floor(n/3600)+"h : "+Math.floor(n/60)%60+"mn : "+n%60+"s"
          document.getElementById("temps_restant").innerHTML=str
          total_second=n;
          timer =setTimeout(function(){ countdown(n-1); }, 1000);
          }
        }
        function end(){
          document.getElementById("temps_restant").innerHTML="Finished !";
          document.getElementById("buttonSub").disabled =true;
          alert("End of Session.");
          window.location.href = "{{url('home')}}";
        }
    </script>
  </body>
</div>

<div class="container" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" id="quizForm" action="{{ url('res_quiz') }}">
                        {{ csrf_field() }}
                     

                    <div class="container text-center">
                      <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Photographs
                                </div>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 1; $i <= 6; $i++)
                                    {{$i}} -
                                    A <input type="radio" name="result{{$i}}" value="A">
                                    B <input type="radio" name="result{{$i}}" value="B">
                                    C <input type="radio" name="result{{$i}}" value="C">
                                    D <input type="radio" name="result{{$i}}" value="D">

                                    <br><br>
                                @endfor
                            </div>
                              </div>
                            </div>
                          </div>
                          <div class="card" style="margin-top:10px;">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Question & Answer
                                  <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                </div>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 7; $i <= 31; $i++)
                                    {{$i}} -
                                    A <input type="radio" name="result{{$i}}" value="A">
                                    B <input type="radio" name="result{{$i}}" value="B">
                                    C <input type="radio" name="result{{$i}}" value="C">

                                    <br><br>
                                @endfor
                            </div>
                              </div>
                            </div>
                          </div>
                          <div class="card" style="margin-top:10px;">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Short conversations
                                  <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                </div>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 32; $i <= 70; $i++)
                                    {{$i}} -
                                    A <input type="radio" name="result{{$i}}" value="A">
                                    B <input type="radio" name="result{{$i}}" value="B">
                                    C <input type="radio" name="result{{$i}}" value="C">
                                    D <input type="radio" name="result{{$i}}" value="D">

                                    <br><br>
                                @endfor
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card" style="margin-top:10px;">
                            <div class="card-header" id="headingFour">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  Short talks
                                  <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                </div>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                              <div class="card-body">
                                <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 71; $i <= 100; $i++)
                                    {{$i}} -
                                    A <input type="radio" name="result{{$i}}" value="A">
                                    B <input type="radio" name="result{{$i}}" value="B">
                                    C <input type="radio" name="result{{$i}}" value="C">
                                    D <input type="radio" name="result{{$i}}" value="D">

                                    <br><br>
                                @endfor
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card" style="margin-top:10px;">
                            <div class="card-header" id="headingFive">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                  Incomplete sentences
                                </div>
                              </h5>
                            </div>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                              <div class="card-body">
                                <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 101; $i <= 130; $i++)
                                    {{$i}} -
                                    A <input type="radio" name="result{{$i}}" value="A">
                                    B <input type="radio" name="result{{$i}}" value="B">
                                    C <input type="radio" name="result{{$i}}" value="C">
                                    D <input type="radio" name="result{{$i}}" value="D">

                                    <br><br>
                                @endfor
                            </div>
                              </div>
                            </div>
                          </div>
                          <div class="card" style="margin-top:10px;">
                            <div class="card-header" id="headingSix">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                  Text completion
                                  <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                </div>
                              </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                              <div class="card-body">
                                <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 131; $i <= 146; $i++)
                                    {{$i}} -
                                    A <input type="radio" name="result{{$i}}" value="A">
                                    B <input type="radio" name="result{{$i}}" value="B">
                                    C <input type="radio" name="result{{$i}}" value="C">
                                    D <input type="radio" name="result{{$i}}" value="D">

                                    <br><br>
                                @endfor
                            </div>
                              </div>
                            </div>
                          </div>
                          <div class="card" style="margin-top:10px;">
                            <div class="card-header" id="headingSeven">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                  Reading comprehension
                                  <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                </div>
                              </h5>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                              <div class="card-body">
                                <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 147; $i <= 200; $i++)
                                    {{$i}} -
                                    A <input type="radio" name="result{{$i}}" value="A">
                                    B <input type="radio" name="result{{$i}}" value="B">
                                    C <input type="radio" name="result{{$i}}" value="C">
                                    D <input type="radio" name="result{{$i}}" value="D">

                                    <br><br>
                                @endfor
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                    <!-- il faut tester si les id sont vides ou non  --> 
                    <input type="hidden" name="id_session" value="{{(isset($id_session) ? $id_session : '')}}">
                    <input type="hidden" name="id_sujet" value="{{(isset($id_sujet) ? $id_sujet : '')}}">

                    @auth
                        <!-- Button trigger modal -->
                        <div role="button" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#validateModal" style="margin-top:20px;margin-bottom:40px;">
                          Send
                        </div>
                    @endauth

                    <!-- Modal -->
                    <div class="modal fade" id="validateModal" tabindex="-1" role="dialog" aria-labelledby="validateModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="validateModalLabel">Validation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <br>
                            Submit your answers ?
                          <br><br>
                          </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Yes</button>
                      </div>
                        </div>
                      </div>
                    </div>

                    @guest
                        <!-- Button trigger modal -->
                        <div role="button" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#disconnectedModal" style="margin-top:20px;margin-bottom:40px;">
                          Send
                        </div>
                    @endguest

                    <!-- Modal -->
                    <div class="modal fade" id="disconnectedModal" tabindex="-1" role="dialog" aria-labelledby="disconnectedModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="disconnectedModalLabel">Warning !</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <br>
                            Be careful ! You have been disconected, please call a teacher.
                          <br><br>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
