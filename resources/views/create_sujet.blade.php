@extends('layouts.layhome')

@section('content')
<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Subject creation</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 16%; margin-top: .9rem; margin-bottom: 1rem;">
</div>


<div class="row pad2">
    <!-- sujet -->
    <div class="col-sm-5"></div>
    <div class="col-sm-2 form-group text-center">
        <form class="form-horizontal" method="POST" action="{{ url('create_subject') }}">
            {{ csrf_field() }}
            <input type="hidden" name="author_name" value="{{$user->name}}">
            <input type="text" class="form-control text-center" id="subject_name" name="subject_name" placeholder="Subject name" required>
            <br>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
 

    </div>
</div>
@endsection
