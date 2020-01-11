@extends('layouts.layauth')

@section('title')
Quiz
@endsection

@section('content')
<!-- Titre -->
<div class="container-fluid text-center" style="margin-top:60px;">
  <h1 class="display-4">Good luck !</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 21%; margin-top: .9rem; margin-bottom: 1rem;">
</div>

<div class="container pad2">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="{{ url('res_quiz') }}">
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
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <input type="radio" name="result{{$i}}" value="D">

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
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">

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
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <input type="radio" name="result{{$i}}" value="D">

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
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <input type="radio" name="result{{$i}}" value="D">

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
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <input type="radio" name="result{{$i}}" value="D">

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
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <input type="radio" name="result{{$i}}" value="D">

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
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <input type="radio" name="result{{$i}}" value="D">

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
                        <button type="submit" class="btn btn-primary" style="margin-top:20px;margin-bottom:40px;">
                          Next
                        </button>
                    @endauth


                    @guest
                        <!-- Button trigger modal -->
                        <div role="button" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Next
                        </div>
                    @endguest

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning !</h5>
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
