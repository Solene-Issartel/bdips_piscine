@extends('layouts.layhome')

@section('title')
Result
@endsection

@section('content')
<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Your score</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 21%; margin-top: .9rem; margin-bottom: 1rem;">
</div>

<!-- Creation du container pour le score-->
<div class="container-fluid">
  <div class="row text-center">
    <div class="col-sm-5"></div>
    <div class="col-sm-2" style="margin-top:60px;">
      <h1 style="font-size:80px;">{{$score_final}}</h1>
    </div>
  </div>
</div>
@endsection