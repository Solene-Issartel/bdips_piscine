@extends('layouts.layhome')

@section('title')
Choix Statistiques
@endsection

@section('content')

<div class="container-fluid">
    <!-- Titre -->
    <div class="container-fluid text-center pad">
       <h1 class="display-4">Statistics</h1>
       <hr style="border-top: 2px solid #b4b4b4; width: 16%; margin-top: .9rem; margin-bottom: 1rem;">
    </div>
    <!-- Formulaire -->
    <div class="container-fluid text-center pad2">
        <form method="post" action="{{url('choix')}}">
            <p>{{ csrf_field() }}
            <div class="form-row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 my-1">
                    <!-- Selections -->
                    <select class="custom-select mr-sm-2" name="choix">
                        <option value="eleve">Student</option>
                        <option value="sous_partie">Subpart</option>
                        <option value="partie">Part</option>
                        <option value="promo">Promotion</option>
                        <option value="sujet">Subject</option>
                    </select>
                </div>
            </div>
            </p>
            <!-- Button -->
            <div class="row pad2">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Let's go</button>
                </div>
            </div>            
        </form>
    </div>
</div>

@endsection