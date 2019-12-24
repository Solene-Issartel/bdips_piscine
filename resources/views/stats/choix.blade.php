@extends('layouts.layauth')

@section('title')
PAr sous parties
@endsection

@section('content')
@if ($choix=='eleve')
<form method="post" action="{{url('affichage')}}">
	{{ csrf_field() }}
	<p> Nom: <input type=text name=nom><br>
	Prenom: <input type=text name=prenom><br>
	<input type=submit name=okEleve value=Rechercher><br> </p>
</form>
@elseif ($choix=='sous_partie')
	<form method="post" action="{{url('affichage')}}">
   		<p>{{ csrf_field() }}
       <label for="choix">Quelle sous-partie voulez-vous  ?</label><br />
       <select name="sous_partie">
           <option value="P1">Part 1</option>
           <option value="P2">Part 2</option>
           <option value="P3">Part 3</option>
           <option value="P4">Part 4</option>
           <option value="P5">Part 5</option>
           <option value="P6">Part 6</option>
           <option value="P7">Part 7</option>
 		</select>
   </p>
   <input type="submit" name="okSousPartie"/>
</form>
@elseif ($choix=='partie')
	<form method="post" action="{{url('affichage')}}">
   		<p>{{ csrf_field() }}
       <label for="choix">Quelle partie voulez-vous  ?</label><br />
       <select name="partie">
           <option value="listening">Listening</option>
           <option value="readinf">Reading</option>
 </select>
   </p>
   <input type="submit" name="okPartie"/>
</form>

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