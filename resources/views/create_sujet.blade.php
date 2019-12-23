@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Subject creation</div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'create_subject','method'=>'post']) !!}
                        {!! Form::label('subject_name', 'Subject name : ') !!}
                        {!! Form::text('subject_name') !!}
                        {!! Form::hidden('author_name',$user->name) !!}
                        {!! Form::submit('Next') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
