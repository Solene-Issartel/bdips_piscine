@extends('layouts.layauth')

@section('title')
Choix Statistiques
@endsection

@section('content')



  


<form method="post" action="{{url('affichage')}}">
   <p>{{ csrf_field() }}
       <label for="choix">Quelle statistiques voulez-vous  ?</label><br />
       <select name="choix">
           <option value="eleve">par élève</option>
           <option value="sous_partie">par sous-partie</option>
           <option value="partie">par partie</option>
           <option value="promo">par promotion</option>
       </select>
   </p>
   
   <input type="submit" name="ok"/>
</form>



@endsection