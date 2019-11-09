@extends('layouts.layauth')

@section('title')
Log In
@endsection

@section('content')
    <!-- Creation d'une ligne -->
    <div class="container-fluid row pad">
      <!-- Colone 1 (image) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <img src="../public/img/signIn.png" class="img-fluid">
          <div class="col-sm-12 text-center">
            <a href="{{ url('signin') }}">I <span class="strong">don't have</span> an account !</a>
            <br>
            <a class="btn btn-link" href="{{ route('password.request') }}">I <span class="strong">lost</span> my password...</a>
          </div>
        </div>
      </div>
      <!-- Colone 2 (formulaire) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <!-- Titre -->
          <h1 class="display-4">Log in</h1>
          <hr>
          <!-- Formulaire -->
          <form class="form-horizontal" method="POST" action="{{ url('login') }}">
                        {{ csrf_field() }}

            <!-- Ligne 1 (email) -->
            <div class="row">
              <div class="col-sm-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Email</label>

               
              <input id="email" type="email" class="form-control" name="email" placeholder="Ex : name.surnam@etu.umontpellier.fr" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
                  <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
              </div>
            </div>

            <!-- Ligne 2 (password) -->
            <div class="row">
              <div class="col-sm-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Ex : MySuperStrongPassword123" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>

            <!-- Ligne 4 (Bouton) -->
            <div class="row form-group" style="padding-top: 2em;">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

        </form>
      </div>
   </div>
</div>
@endsection