@extends('layouts.layauth')

@section('title')
Quiz
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="panel panel-default">
                <div class="panel-heading">Toeic</div>

                <div class="panel-body">
                    <form method="POST" action="{{ url('res_quiz') }}">
                        {{ csrf_field() }}
                    <div class="container">
                        <p> Listening :</p>
                      <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Part 1
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
                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Part 2
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
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <div role="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Part 3
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
                    </div>
                    
                    

                    @auth
                        <button type="submit" class="btn btn-primary">
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

@endsection
