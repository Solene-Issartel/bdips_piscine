@extends('layouts.layhome')

@section('title')
Session User
@endsection

@section('content')

<div class="container-fluid">
  <!-- Titre-->
  <div class="row welcome text-center padding">
    <div class="col-12">
      <h1 class="display-4">Search Session</h1>
      <hr class="padding">
    </div>
  </div>

  <!-- Example single danger button -->
  <div class="col-sm-12 text-center">
    <form class="form-horizontal" method="POST" action="{{ url('waiting_session')}}">
                    {{ csrf_field() }}
      
        @if (isset($sujets))
          <div class="form-group">
            <select class="form-control" id="form-session" name="id_session">
              @foreach($sujets as $sujet)
                <option value="{{$sujet->idSession}}">{{$sujet->libelleSujet}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Enter</button>
        </form>
        @else
          <p>No session schedule for today</p>
        @endif
      
  </div>
</div>
@endsection