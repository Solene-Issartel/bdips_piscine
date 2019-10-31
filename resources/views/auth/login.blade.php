<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Quicksand font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <!-- Title -->
    <title>Log in</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="icon" type="image/png" href="../public/img/dice.png">
  </head>

  <body>
    <!-- Creation d'une ligne -->
    <div class="container-fluid row pad">
      <!-- Colone 1 (image) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <img src="../public/img/signIn.png" class="img-fluid">
          <div class="col-sm-12 text-center">
            <a href="{{ route('register') }}">I <span class="strong">don't have</span> an account !</a>
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
</body>
</html>