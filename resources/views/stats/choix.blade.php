@extends('layouts.layhome')

@section('title')
Statistics
@endsection

@section('content')

<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Statistics</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 16%; margin-top: .9rem; margin-bottom: 1rem;">
</div>


@if ($choix=='eleve')
<div style="margin-top:50px;">
  <form class="form-inline" method="post" action="{{url('affichage')}}">
    {{ csrf_field() }}
    <div class="container-fluid text-center">
      <div class="row" style="display:inline-block;width:30%;">
        <input type=text class="form-control" name=nom placeholder="Name">
      </div>
      </br>
      <div class="row" style="display:inline-block;width:30%;margin-top:20px;">
        <input type=text class="form-control" name=prenom placeholder="Surname">
      </div>
      </br>
      <div class="row" style="display:inline-block;width:30%;margin-top:20px;">
        <select class="custom-select mr-sm-2" name="promotion">
          <?php for($i=0; $i<count($id_promos);$i++){
            echo "\t",'<option value="',$id_promos[$i],'">',$libPromos[$i],'</option>',"\n";
          }?>
        </select>
      </div>
      </br>
      <div class="row" style="display:inline-block;width:30%;margin-top:50px;">
        <button type="submit" class="btn btn-primary" name="okEleve">Search</button>
      </div>
    </div>
  </form>
</div>
@if(isset($not_found))
<div class="alert alert-danger text-center" role="alert" style="width:30%;margin-left:35%;margin-top:30px;">
  <p>Sorry, user not found</p>      
</div>
@endif


@elseif ($choix=='partie')
<div class="container-fluid text-center" style="margin-top:50px;">
  <form method="post" action="{{url('affichage')}}">
       {{ csrf_field() }}
    <div class="form-row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 my-1">
      <!-- Selections -->
        <select class="custom-select mr-sm-2" name="partie" style="width:30%;height:auto;">
          <option value="listening">Listening</option>
          <option value="reading">Reading</option>
        </select>
        </div>
      </div>
    <!-- Button -->
    <div class="row" style="margin-top:50px;">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" name="okPartie">Search</button>
      </div>
    </div>            
  </form>
</div>

@elseif ($choix=='promo')
<div style="margin-top:50px;">
  <form method="post" action="{{url('affichage')}}">
      {{ csrf_field() }}
    <div class="container-fluid text-center">
      <div class="row" style="display:inline-block;width:10%;">
        <select class="custom-select mr-sm-2" name="promotion">
        <?php for($i=0; $i<count($id_promos);$i++){
            echo "\t",'<option value="',$id_promos[$i],'">',$libPromos[$i],'</option>',"\n";
          }?>
        </select>
      </div>
      </br>
      <div class="row" style="display:inline-block;width:10%;margin-top:20px;">
          <select class="custom-select mr-sm-2" name="statsPromo">
              <option value="subject">All</option>
              <optgroup label="Parts">
                <option value="listening">Listening</option>
                <option value="reading">Reading</option>
              </optgroup>
          </select>
      </div>
      </br>
      <div class="row" style="display:inline-block;width:20%;margin-top:50px;">
        <button type="submit" class="btn btn-primary" name="okPromo">Search</button>
      </div>
    </div>
  </form>
</div>


@elseif ($choix=='session')
<div style="margin-top:50px;">
  <form method="post" action="{{url('affichage')}}">
      {{ csrf_field() }}
    <div class="container-fluid text-center">
      <div class="row" style="display:inline-block;width:20%;">
        <select name="idsess" class="form-control">
          <?php for($i=0; $i<count($id_session);$i++){
            echo "\t",'<option value="',$id_session[$i],'">',$date_session[$i]."  ".$heure_session[$i],'</option>',"\n";
          }?>
        </select>
      </div>
      </br>
      <div class="row" style="display:inline-block;width:30%;margin-top:50px;">
        <button type="submit" class="btn btn-primary" name="okSession">Search</button>
      </div>
    </div>
  </form>
</div>
@else
	What are you doing?
@endif
@endsection