@extends('layouts.layhome')

@section('title')
Session User
@endsection

@section('content')
<body style="background-image: url(../public/img/fond1.png);background-size: 100%;background-repeat: no-repeat;">
  <div class="container-fluid">
    <!-- Titre -->
    <div class="container-fluid text-center pad">
      <h1 class="display-4">Search session</h1>
      <hr style="border-top: 2px solid #b4b4b4; width: 25%; margin-top: .9rem; margin-bottom: 1rem;">
    </div>

    <!-- Example single danger button -->
    <div class="row pad2">
      <div class="col-sm-5"></div>
      <div class="col-sm-2 text-center">
        <form class="form-horizontal" method="POST" action="{{ url('waiting_session')}}">
                        {{ csrf_field() }}
          
            @if (count($sujets) > 0)
              <div class="form-group">
                <select class="form-control" id="form-session" name="id_session">
                  @foreach($sujets as $sujet)
                    <option value="{{$sujet->idSession}}">Subject {{$sujet->libelleSujet}} at {{$sujet->heureDebut}}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary" style="margin-top:30px;">Enter</button>        
            @else
              <p>No session schedule for today</p>
            @endif
        </form>      
      </div>
    </div>
  </div>
</body>
@endsection