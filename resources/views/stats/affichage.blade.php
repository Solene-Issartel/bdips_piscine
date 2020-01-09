@extends('layouts.layauth')

@section('title')
Affichage
@endsection

@section('content')






@if (isset($prenom))
	<p>il s'appelle : {{$prenom}}</p>

@elseif (isset($part))
	<p> voila la sous-partie choisie : {{$part}}</p>
@elseif (isset($partie))
	<p> voila la partie choisie : {{$partie}}</p>
@elseif (isset($promo))
	<p> voila la promo choisie : {{$promo}} {{$annee}}</p>
@else
	<p> a déf</p>
@endif











@endsection