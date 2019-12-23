@extends('layouts.layhome')

@section('title')
Users list
@endsection

@section('content')
<!-- Partie basse -->
    <!-- Creation d'une ligne -->
    <div class="container-fluid row pad2">
      <!-- Colone 2 (formulaire) -->
      
        <div class="container-fluid">
          <!-- Titre -->
          <h1 class="display-4">Student list</h1>
          <hr>
          @foreach ($users as $user)
            <div class="row">
              <div class="col-sm-8">
                <div class="col form-group">
                  <p>{{$user->name}}</p>
                </div>
                <div class="col form-group">
                  <p >{{$user->firstname}}</p>
                </div>
                  
                  <!-- Button trigger modal -->
                  <div class="col form-group">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#validationModal{{$user->id}}">
                      Delete
                    </button>
                  </div>
                  <div class="col form-group">
                    <button class="btn btn-light"
                          type="button">
                      View stats
                  </button>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="validationModal{{$user->id}}" role="dialog" aria-labelledby="validationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="validationModalLabel">Validation</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure to want to delete this user ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form class="form-horizontal" method="POST" action="{{ url('user_delete') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-primary">Yes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <br><br>
            </div>
            @endforeach
            
        </div>
@endsection
