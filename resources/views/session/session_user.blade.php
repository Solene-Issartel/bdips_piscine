@extends('layouts.layhome')

@section('title')
Session User
@endsection

@section('content')
  <body style="background-image: url(../public/img/fond1.png);background-size: 100%;background-repeat: no-repeat;">
    <!-- Creation du container-->
    <div class="container-fluid">
      <!-- Titre-->
      <div class="row welcome text-center padding">
        <div class="col-12">
          <h1 class="display-4">Session</h1>
          <hr class="padding">
        </div>
      </div>

      <!-- Example single danger button -->
      <div class="col-sm-12 text-center">
        <!-- <div class="btn-group dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Search session
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <h5 class="dropdown-header">Open sessions :</h5>
            <a class="dropdown-item" href="#">Subject 5</a>
            <a class="dropdown-item" href="#">Subject 8</a>
            <a class="dropdown-item" href="#">Subject 12</a>
          </div>
        </div> -->
        <form class="form-horizontal" method="POST" action="{{ url('quiz')}}">
                        {{ csrf_field() }}
          <div class="form-group">
            <label for="form-session">Search session</label>
            <select class="form-control" id="form-session" name="id_sujet">
              @foreach($sujets as $sujet)
                <option value="{{$sujet->idSujet}}">{{$sujet->libelleSujet}}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" name="id_session" value="{{$sujet->idSession}}">
          <button type="submit" class="btn btn-primary">Enter</button>
        </form>
      </div>
    </div>
  </body>
@endsection