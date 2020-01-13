@extends('layouts.layhome')

@section('title')
Result
@endsection

@section('content')
<div class="container-fluid pad" style="vertical-align: middle;">
  <div class="row">
    <div class="col-sm-6">
      <img src="../public/img/congrats.png" class="img-fluid">
    </div>
    <div class="col-sm-6">
      <div class="container-fluid text-center" style="margin-bottom:50px;">
        <h1 class="display-4">Your score</h1>
        <hr style="border-top: 2px solid #b4b4b4; width: 32%; margin-top: .9rem;">
      </div>
      <ul class="list-group" style="width:50%;height:auto;margin-left:25%;">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          All points
          <span class="badge badge-primary badge-pill">{{$score_final}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Listening points
          <span class="badge badge-primary badge-pill">{{$score_listening}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Reading points
          <span class="badge badge-primary badge-pill">{{$score_reading}}</span>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection