@extends('layouts.layhome')

@section('title')
Result
@endsection

@section('content')
    <!-- Creation du container-->
    <div class="container-fluid">
      <!-- Titre-->
      <div class="row welcome text-center padding">
        <div class="col-12">
          <h1 class="display-4">Result</h1>
          <hr class="padding">
        </div>
      </div>
      <h1>{{$score_final}}</h1>
      <h1>/990</h1>
      </div>
@endsection