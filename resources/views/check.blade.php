@extends('layouts.layauth')

@section('content')
<div class="container-fluid row pad">
    <!-- Colone 1 -->
    <div class="col-sm-6">
        <div class="container-fluid">
            <div class="panel-body text-center" style="vertical-align: middle;">
                <!-- Titre -->
                <h1 class="display-4" style="margin-top:22%;">Waiting for you</h1>
                </br>
                <h5>- Please check your mailbox -</h5>
                @if (session('status'))
                    <div class="alert alert-success text-center" style="width:70%;height:auto;margin-left:15%;margin-top:30px;">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Colone 2 (image) -->
    <div class="col-sm-6">
        <div class="container-fluid">
            <img src="../public/img/signIn.png" class="img-fluid">
        </div>
    </div>
</div>
@endsection
