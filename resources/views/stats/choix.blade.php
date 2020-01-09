@extends('layouts.layhome')

@section('title')
Par sous parties
@endsection



@section('content')

<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Statistics</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 16%; margin-top: .9rem; margin-bottom: 1rem;">
</div>

@if ($choix=='eleve')
<div style="margin-top: 4rem;">
  <form class="form-inline" method="post" action="{{url('affichage')}}">
    {{ csrf_field() }}
    <div class="container-fluid">
      <div class="row" style="padding-left:40%;padding-top:25px;">
        <input type=text class="form-control" name=nom placeholder="Surname" style="width:35%;">
      </div>
      <div class="row" style="padding-left:40%;padding-top:25px;">
        <input type=text class="form-control" name=prenom placeholder="Name" style="width:35%;">
      </div>
      <div class="row" style="padding-left:40%;padding-top:25px;">
         <label for="promotion">Promotion :  </label>
                <select class="form-control" name="promotion">
                  <option value="1">IG3</option>
                  <option value="2">IG4</option>
                  <option value="3">IG5</option>
                  <option value="4">GBA3</option>
                  <option value="5">GBA4</option>
                  <option value="6">GBA5</option>
                  <option value="7">MAT3</option>
                  <option value="8">MAT4</option>
                  <option value="9">MAT5</option>
                  <option value="10">MI3</option>
                  <option value="11">MI4</option>
                  <option value="12">MI5</option>
                  <option value="13">MEA3</option>
                  <option value="14">MEA4</option>
                  <option value="15">MEA5</option>
                  <option value="16">STE3</option>
                  <option value="17">STE4</option>
                  <option value="18">STE5</option>
                </select>
      </div>
      <div class="row" style="padding-left:40%;padding-top:25px;">
        <button type="submit" class="btn btn-primary" name="okEleve" style="width:35%;">Search</button>
      </div>
    </div>
  </form>
</div>


@elseif ($choix=='partie')
<div class="container-fluid text-center pad2">
  <form method="post" action="{{url('affichage')}}">
       {{ csrf_field() }}
    <div class="form-row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 my-1">
      <!-- Selections -->
        <select class="custom-select mr-sm-2" name="partie">
          <option value="listening">Listening</option>
          <option value="reading">Reading</option>
        </select>
        </div>
      </div>
    <!-- Button -->
    <div class="row pad2">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" name="okPartie">Let's go</button>
      </div>
    </div>            
  </form>
</div>

@elseif ($choix=='promo')
<form method="post" action="{{url('affichage')}}">
   		<p>{{ csrf_field() }}
       <label for="choix">Quelle promo voulez-vous  ?</label><br />
       <select name="promo">
           <option value="GBA">GBA</option>
           <option value="IG">IG</option>
           <option value="MAT">MAT</option>
           <option value="MEA">MEA</option>
           <option value="MI">MI</option>
           <option value="STE">STE</option>
  		</select>
  		<select name="annee">
  			<option value="3">3</option>
  			<option value="4">4</option>
  			<option value="5">5</option>
  		</select>
     	
   </p>
   <input type="submit" name="okPromo"/>
</form>
@elseif ($choix=='sujet')
wait for now
@else
	What are you doin?
@endif
@endsection