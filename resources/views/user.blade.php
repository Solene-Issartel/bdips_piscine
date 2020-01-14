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
          <form class="form-horizontal" method="POST" action="{{ url('user_update'), $user->id }}">
                        {{ csrf_field() }}
            <!-- Ligne 1 (nom + prenom) -->
            <div class="row">
              <div> 
                <input type="hidden" name="id" value="{{$user->id}}">
              </div>
              <div class="col form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
              </div>
              <div class="col form-group">
                <label for="firstname">Surname</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="{{$user->firstname}}" required>
              </div>
            </div>
            <!-- Ligne 2 (email + password) -->
            <div class="row">
              <div class="col form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="{{$user->email}}" disabled>
              </div>
              <div class="col form-group">
                <label for="password">New password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Type here to set a new password" value="">
              </div>
            </div>
            @if(!Auth::user()->isAdmin())
              <!-- Ligne 3 (promotion + sexe) -->
              <div class="row">
                <!-- Promotion -->
                <div class="col-sm-3 form-group">
                  <label for="promotion">Promotion</label>
                  <select class="form-control" name="promotion">
                    @foreach ($promos as $promo)
                      @if($promo -> idPromotion == $user -> idPromotion)
                        <option value="{{$promo -> idPromotion}}" selected>{{$promo -> libellePromotion}}</option>
                      @else
                        <option value="{{$promo -> idPromotion}}">{{$promo -> libellePromotion}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
            @endif
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
