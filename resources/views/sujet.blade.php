@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Subject list</div>

                <div class="panel-body">

                    @if ($sujets != null)
                        @foreach($sujets as $sujet)
                            {{ $sujet->libelleSujet }}
                            <br>
                        @endforeach
                    @endif

                    <a href="{{ url('cr_subject') }}"> Create new subject</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
