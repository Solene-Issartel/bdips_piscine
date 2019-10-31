@extends('layouts.layhome')

@section('title')
User
@endsection

@section('content')
<!-- Partie basse -->
    <!-- Creation d'une ligne -->
    <div class="container-fluid row pad2">
      <!-- Colone 1 (image) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <img src="../public/img/user.png" class="img-fluid">
        </div>
      </div>
      <!-- Colone 2 (formulaire) -->
      <div class="col-sm-6">
        <div class="container-fluid">
          <!-- Titre -->
          <h1 class="display-4">My account</h1>
          <hr>
          <!-- Formulaire -->
          <!-- Formulaire -->
          <form class="form-horizontal" method="POST" action="{{ url('user_create') }}">
                        {{ csrf_field() }}
            <!-- Ligne 1 (nom + prenom) -->
            <div class="row">
              <div class="col form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Paul">
              </div>
              <div class="col form-group">
                <label for="firstname">Surname</label>
                <input type="text" class="form-control" id="firstname" placeholder="Dupont">
              </div>
            </div>
            <!-- Ligne 2 (email + password) -->
            <div class="row">
              <div class="col form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="paul.dupont@etu.umontpellier.fr">
              </div>
              <div class="col form-group">
                <label for="password">New password</label>
                <input type="text" class="form-control" id="password" placeholder="Type here to set a new password">
              </div>
            </div>
            <!-- Ligne 3 (promotion + sexe) -->
            <div class="row">
              <!-- Promotion -->
              <div class="col-sm-3 form-group">
                <label for="promotion">Promotion</label>
                <select class="form-control">
                  <option>IG3</option>
                  <option>IG4</option>
                  <option>IG5</option>
                  <option>GBA3</option>
                  <option>GBA4</option>
                  <option>GBA5</option>
                  <option>MAT3</option>
                  <option>MAT4</option>
                  <option>MAT5</option>
                  <option>MI3</option>
                  <option>MI4</option>
                  <option>MI5</option>
                  <option>MEA3</option>
                  <option>MEA4</option>
                  <option>MEA5</option>
                  <option>SE3</option>
                  <option>SE4</option>
                  <option>SE5</option>
                </select>
              </div>
              <!-- Sexe -->
              <div class="col-sm-3 form-group">
                <label for="gender">Gender</label>
                <select class="form-control">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
          </form>
          <!-- Ligne 4 (Bouton) -->
            <div class="row" style="padding-top: 2em;">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            </form>
        </div>        
      </div>
@endsection
