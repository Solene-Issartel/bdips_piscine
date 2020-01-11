@extends('layouts.layhome')

@section('title')
Result
@endsection

@section('content')
<!-- Congrats -->
<div class="container-fluid">
  <img src="../public/img/congrats.png" class="img-fluid">
</div>
<!-- Creation du container pour le score-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
      <h1 style="font-size:200px;color:#E3F1FC;">{{$score_final}}/990</h1>
    </div>
  </div>
</div>
@endsection