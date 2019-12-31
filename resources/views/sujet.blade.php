@extends('layouts.layhome')

@section('title')
Subject
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h4 class="panel-heading">Subject list</h4>

                <div class="panel-body">
                    <a href="{{ url('cr_subject') }}"> Create new subject</a> <br><br>


                    @if ($sujets != null)
                        @foreach($sujets as $sujet)
                            {{ $sujet->libelleSujet }}
                            <br>
                        @endforeach
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
