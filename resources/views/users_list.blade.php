@extends('layouts.layhome')

@section('title')
Users list
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
          <h1 class="display-4">Student list</h1>
          <hr>
            <div class="row">
              @foreach ($users as $user)
                <div> 
                  <input type="hidden" name="id"value="{{$user->id}}">
                </div>
                <div class="col form-group">
                  <p>{{$user->name}}</p>
                </div>
                <div class="col form-group">
                  <p >{{$user->firstname}}</p>
                </div>

                <div class="col form-group">
                  <button class="btn btn-danger"
                          type="button">
                      Delete
                  </button>
                </div>
                <div>
                  <button class="btn btn-light"
                          type="button">
                      View stats
                  </button>
                </div>
                <br><br>
              @endforeach
            </div>
            
        </div>
@endsection
