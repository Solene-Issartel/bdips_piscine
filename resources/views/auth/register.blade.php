@extends('layouts.layauth')

@section('title')
Sign In
@endsection

@section('content')
    <!-- Creation d'une ligne -->
    <div class="container-fluid row pad">
      <!-- Colone 1 (image) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <img src="../public/img/signIn.png" class="img-fluid">
          <div class="col-sm-12 text-center">
            <a href="{{ url('login') }}">I <span class="strong">already have</span> an account !</a>
          </div>
        </div>
      </div>
      <!-- Colone 2 (formulaire) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <!-- Titre -->
          <h1 class="display-4">Sign in</h1>
          <hr>
          <!-- Formulaire -->
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
            <!-- Ligne 1 (nom + prenom) -->
            <div class="row">
              <div class="col form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label" for="name">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Ex : Paul" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>

              <div class="col form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label class="control-label" for="firstname">Surname</label>
                <input name="firstname" type="text" class="form-control" placeholder="Ex : Dupont" value="{{ old('firstname') }}" required autofocus>

                @if ($errors->has('firstname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('firstname') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <!-- Ligne 2 (email + password) -->
            <div class="row">
              <div class="col form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label" for="email">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Ex : name.surnam@etu.umontpellier.fr" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="col form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label" for="password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Ex : MySuperStrongPassword123" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <!-- Ligne 3 (promotion + sexe) -->
            <div class="row">
              <!-- Promotion -->
              <div class="col-sm-3 form-group">
                <label class="control-label" for="idPromotion">Promotion</label>
                <select name="idPromotion" class="form-control">
                    @foreach ($promos as $promo)
                        <option value="{{ $promo->idPromotion }}">{{ $promo->libellePromotion }}</option>
                  @endforeach
                </select>
              </div>
              <!-- Sexe -->
              <!-- <div class="col-sm-3 form-group">
                <label for="formGroupExampleInput2">Gender</label>
                <select class="form-control">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div> -->
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