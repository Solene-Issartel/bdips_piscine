@extends('layouts.layhome')

@section('title')
Subject
@endsection

@section('content')

<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Subjects</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 16%; margin-top: .9rem; margin-bottom: 1rem;">
  <a href="{{ url('cr_subject') }}"> Create new subject</a>
</div>



<div class="container" style="padding-top: 2em;">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <ul class="list-group">
                @if ($sujets != null)
                    @foreach($sujets as $sujet)
                        <li class="list-group-item">{{ $sujet->libelleSujet }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
