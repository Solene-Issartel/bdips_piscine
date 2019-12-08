@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="panel panel-default">
                <div class="panel-heading">Subject creation</div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'create_question','method'=>'post']) !!}
                    <div class="container">
                        <p> Listening :</p>
                      <div class="row">
                        <div class="col-sm-4">
                          First part : 
                            <div><br>
                                <?php $k = $last_id+1; ?>
                                @for ($i = 1; $i <= 6; $i++)
                                    {!! Form::hidden('num_question'.$k,$i) !!}
                                    {!! Form::hidden('id_souspartie'.$k,1) !!}
                                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                                    {{ Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$i.",rep_question".($i+1).",1)")) }} 
                                    <?php $k++;?>
                                    <br><br>
                                @endfor
                            </div>
                        </div>
                        <div class="col-sm-4">
                          Second part : 
                            <div><br>
                                @for ($i = 7; $i <= 31; $i++)
                                    {!! Form::hidden('num_question'.$i,$i) !!}
                                    {!! Form::hidden('id_souspartie'.$i,2) !!}
                                    {!! Form::label("rep_question".$i,"Question ".$i." :") !!}
                                    {{ Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$i.",rep_question".($i+1).",1)")) }} <br><br>
                                @endfor
                            </div>
                        </div>
                        <div class="col-sm-4">
                          Third part : 
                            <div><br>
                                @for ($i = 32; $i <= 70; $i++)
                                    {!! Form::hidden('num_question'.$i,$i) !!}
                                    {!! Form::hidden('id_souspartie'.$i,3) !!}
                                    {!! Form::label("rep_question".$i,"Question ".$i." :") !!}
                                    {{ Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$i.",rep_question".($i+1).",1)")) }} <br><br>
                                @endfor
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          Fourth part : 
                            <div><br>
                                @for ($i = 71; $i <= 100; $i++)
                                    {!! Form::hidden('num_question'.$i,$i) !!}
                                    {!! Form::hidden('id_souspartie'.$i,4) !!}
                                    {!! Form::label("rep_question".$i,"Question ".$i." :") !!}
                                    {{ Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$i.",rep_question".($i+1).",1)")) }} <br><br>
                                @endfor
                            </div>
                        </div>
                      </div>
                      <br><p> Reading :</p>
                      <div class="row">
                        <div class="col-sm-4">
                          Fifth part :
                            <div><br>
                                @for ($i = 101; $i <= 130; $i++)
                                    {!! Form::hidden('num_question'.$i,$i) !!}
                                    {!! Form::hidden('id_souspartie'.$i,5) !!}
                                    {!! Form::label("rep_question".$i,"Question ".$i." :") !!}
                                    {{ Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$i.",rep_question".($i+1).",1)")) }} <br><br>
                                @endfor
                            </div>
                        </div>
                        <div class="col-sm-4">
                          Sixth part :
                            <div><br>
                                @for ($i = 131; $i <= 146; $i++)
                                    {!! Form::hidden('num_question'.$i,$i) !!}
                                    {!! Form::hidden('id_souspartie'.$i,6) !!}
                                    {!! Form::label("rep_question".$i,"Question ".$i." :") !!}
                                    {{ Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$i.",rep_question".($i+1).",1)")) }} <br><br>
                                @endfor
                            </div>
                        </div>
                        <div class="col-sm-4">
                          Seventh part : 
                            <div><br>
                                @for ($i = 147; $i <= 200; $i++)
                                    {!! Form::hidden('num_question'.$i,$i) !!}
                                    {!! Form::hidden('id_souspartie'.$i,7) !!}
                                    {!! Form::label("rep_question".$i,"Question ".$i." :") !!}
                                    
                                    @if($i==200)
                                        {!! Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "upper(rep_question".$i.")")) !!}
                                    @else 
                                        {!! Form::text("rep_question".$i,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$i.",rep_question".($i+1).",1)")) !!}
                                    @endif <br><br>
                                @endfor
                            </div>
                        </div>
                      </div>
                    </div>
                    
                        {!! Form::hidden('id_sujet',$id_sujet) !!}
                        {!! Form::submit('Next') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function suivant(encours, suivant, limite) 
    {
        if (encours.value.length == limite) {
            suivant.focus();
            upper(encours);
        }
    }

    function upper(encours)
    {
        encours.value = encours.value.toUpperCase();
    }
</script>
@endsection
