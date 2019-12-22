@extends('layouts.layauth')

@section('title')
Affichage
@endsection

@section('content')






<form method="post" action="">
	{{ csrf_field() }}
<p> Nom: <input type=text name=nom><br>
	Prenom: <input type=text name=prenom><br>
	<input type=submit name=rechercher value=Rechercher><br> </p>
</form>










@endsection