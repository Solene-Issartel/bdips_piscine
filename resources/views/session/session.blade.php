@extends('layouts.layhome')

@section('title')
Add Session
@endsection

@section('content')
    
    <div class="container-fluid">
      <!-- Titre -->
      <div class="container-fluid text-center pad">
        <h1 class="display-4">Schedule a session</h1>
        <hr style="border-top: 2px solid #b4b4b4; width: 40%; margin-top: .9rem; margin-bottom: 1rem;">
      </div>
      <!-- Formulaire -->
      <div class="container-fluid text-center pad2">
        <form class="form-horizontal" method="POST" action="{{ route('create_session') }}">
                      {{ csrf_field() }}
          <!-- Date session -->
          <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="control-label" for="date_session">Session date : </label>
              <input name="date_session" data-provide="datepicker" id="date_session" placeholder="YYYY-MM-DD" onload="putDate()" type="date" required class="form-control">

              @if ($errors->has('date_session'))
                  <span class="help-block">
                      <strong>{{ $errors->first('date_session') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-sm-3 form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
              <label class="control-label" for="heure_session">Session hour : </label>
              <input type="time" id="heure_session" placeholder="HH:MM" name="heure_session" min="08:00" max="18:00" required class="form-control">

              @if ($errors->has('heure_session'))
                  <span class="help-block">
                      <strong>{{ $errors->first('heure_session') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <br>
          <!-- Sujet + promotion -->
          <div class="row">
            <!-- sujet -->
            <div class="col-sm-5"></div>
            <div class="col-sm-2 form-group">
              <label class="control-label" for="idSujet">Subject : </label>
              <select name="idSujet" class="mdb-select dropdown-primary md-form form-control">
                @foreach ($tab_sujets as $sujet)
                      <option value="{{ $sujet->idSujet }}">{{ $sujet->libelleSujet }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <br>
          <!-- promotion -->
          <div class="row">
            <div class="col-sm-12">
              @foreach ($promos as $promo)
                      <input type="checkbox" class="checkbox_promo" id="promo{{ $promo->idPromotion}}" name="promo[]" value="{{ $promo->idPromotion}}">
              <label for="promo[]">{{$promo->libellePromotion}}</label>
              @endforeach
              
            </div>
          </div>
        <!-- Ligne 4 (Bouton) -->
          <div class="row pad2">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Let's go</button>
            </div>
          </div>
        </form>
      </div>
    </div>        
  </div>
@endsection