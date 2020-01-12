@extends('layouts.layauth')

@section('content')
<div class="container-fluid text-center" style="margin-top:15%;">
    <div class="row">
        <div class="col-sm-6">
            <div class="container-fluid">
                <img src="../../public/img/error.png" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6">
            <!-- Titre -->
            <div class="container-fluid text-center" style="margin-top:30px;">
                <h1 class="display-4">Reset password</h1>
                <hr style="border-top: 2px solid #b4b4b4; width: 50%; margin-top: .9rem; margin-bottom: 1rem;">
                <div class="row text-center" style="width:70%;height:auto;margin-left:15%;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <form class="form-horizontal" style="margin-top:50px;width:50%;height:auto;margin-left:25%;" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                        
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your account e-mail" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif                       
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>                    
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
