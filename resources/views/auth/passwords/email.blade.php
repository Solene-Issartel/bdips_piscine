@extends('layouts.layauth')

@section('content')
<div class="container-fluid text-center">
    <div class="row">
        <div class="col-sm-6">
            <div class="container-fluid">
                <img src="../../public/img/error.png" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6">
            <!-- Titre -->
            <div class="container-fluid text-center pad">
                <h1 class="display-4">Reset password</h1>
                <hr style="border-top: 2px solid #b4b4b4; width: 50%; margin-top: .9rem; margin-bottom: 1rem;">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your account e-mail" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
