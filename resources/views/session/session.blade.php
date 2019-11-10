@extends('layouts.layauth')

@section('title')
Add Session
@endsection

@section('content')
    
      <!-- Colone 2 (formulaire) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <!-- Titre -->
          <h1 class="display-4">Sign in</h1>
          <hr>
          <!-- Formulaire -->
          <form class="form-horizontal" method="POST" action="{{ route('create_session') }}">
                        {{ csrf_field() }}
            <!-- Ligne 1 (nom + prenom) -->
            <div class="row">
              <div class="col form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label" for="date_session">Session date</label>
                <input name="date_session" data-provide="datepicker" id="date_session" onload="putDate()" type="date">

                @if ($errors->has('date_session'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date_session') }}</strong>
                    </span>
                @endif
              </div>

              <div class="col form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label class="control-label" for="heure_session">Open session time</label>
                <input type="time" id="heure_session" name="heure_session" min="08:00" max="18:00" required>

                @if ($errors->has('heure_session'))
                    <span class="help-block">
                        <strong>{{ $errors->first('heure_session') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <!-- Ligne 3 (promotion + sexe) -->
            <div class="row">
              <!-- Promotion -->
              <div class="col-sm-3 form-group">
                <label class="control-label" for="idSujet">Toeic subject</label>
                <select name="idSujet" class="form-control">
                  @foreach ($tab_sujets as $sujet)
                        <option value="{{ $sujet->idSujet }}">{{ $sujet->libelleSujet }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                @foreach ($promos as $promo)
                        <input type="checkbox" class="checkbox_promo" id="promo{{ $promo->idPromotion}}" name="promo[]" onclick="progFormValuesID({{ $promo->idPromotion}})">
                <label for="promo[]">{{$promo->libellePromotion}}</label>
                  @endforeach
                
              </div>
            </div>
          <!-- Ligne 4 (Bouton) -->
            <div class="row" style="padding-top: 2em;">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            </form>
        </div>        
      </div>
  </div>
@endsection