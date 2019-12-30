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
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Search session
          </button>
          <div class="dropdown-menu">
            <h5 class="dropdown-header">Open sessions :</h5>
            <a class="dropdown-item" href="lobby.html">Subject 5</a>
            <a class="dropdown-item" href="#">Subject 8</a>
            <a class="dropdown-item" href="#">Subject 12</a>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection