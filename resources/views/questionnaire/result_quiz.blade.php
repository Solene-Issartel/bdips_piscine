@extends('layouts.layhome')

@section('title')
Result
@endsection

@section('content')
<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Result</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 25%; margin-top: .9rem; margin-bottom: 1rem;">
</div>

<!-- Creation du container-->
<h1>{{$score_final}}</h1>
<h1>/990</h1>

@endsection