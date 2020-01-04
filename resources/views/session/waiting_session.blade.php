@extends('layouts.layhome')

@section('title')
Waiting session
@endsection

@section('content')
  <body style="background-image: url(../public/img/fond1.png);background-size: 100%;background-repeat: no-repeat;">
    <!-- Creation du container-->
    <div class="container-fluid">
      <!-- Titre-->
      <div class="row welcome text-center padding">
        <div class="col-12">
          <h1 class="display-4">Waiting session</h1>
          <hr class="padding">
        </div>
      </div>

      <!-- Example single danger button -->
      <div class="col-sm-12 text-center">
        <form class="form-horizontal" method="POST" action="{{ url('quiz')}}">
                        {{ csrf_field() }}
          
          <!-- il faut tester si les id sont vides ou non  --> 
          <input type="hidden" name="id_session" value="{{(isset($id_session) ? $id_session : '')}}">
          <input type="hidden" name="id_sujet" value="{{(isset($id_sujet) ? $id_sujet : '')}}">

          @if($access)
            <button type="submit" class="btn btn-primary">Enter</button>
          @else
            <button type="submit" class="btn btn-primary" disabled>Enter</button>
          @endif

        </form>
      </div>
    </div>
  </body>
@endsection