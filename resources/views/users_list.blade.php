@extends('layouts.layhome')

@section('title')
Users list
@endsection

@section('content')
<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Students</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 16%; margin-top: .9rem; margin-bottom: 1rem;">
</div>

<div class="container" style="padding-top: 2em;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <ul class="list-group">
              @foreach($users as $user)
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-3">{{$user->name}}</div>
                    <div class="col-md-3">{{$user->firstname}}</div>
                    <div class="col-md-3">-button stats-</div>
                    <div class="col-md-3"><button type="button" class="btn btn-danger" style="margin-right:10%;" data-toggle="modal" data-target="#validationModal{{$user->id}}">Delete</button></div>
                  </div>
                </li>
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
              @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
