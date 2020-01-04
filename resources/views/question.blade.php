@extends('layouts.layhome')

@section('content')
<!-- Titre -->
<div class="container-fluid text-center pad">
  <h1 class="display-4">Subject creation</h1>
  <hr style="border-top: 2px solid #b4b4b4; width: 16%; margin-top: .9rem; margin-bottom: 1rem;">
</div>



<div class="container-fluid">
    <form class="form-group text-center" method="POST" action="{{ url('create_question') }}">
        {!! Form::hidden('id_sujet',$id_sujet) !!}
        <div class="container-fluid row pad2">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">

                <!-- Photographs --> 
                <div class="container-fluid" style="background-color:#E9ECEF;">
                    <div class="container">
                        <p class="lead">Photographs</p>
                    </div>
                </div>                       
                <?php $k = $last_id+1; ?>
                @for ($i = 1; $i <= 6; $i++)
                    {!! Form::hidden('num_question'.$k,$i) !!}
                    {!! Form::hidden('id_souspartie'.$k,1) !!}
                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                    {{ Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$k.",rep_question".($k+1).",1)")) }} 
                    <?php $k++;?>
                    <br><br>
                @endfor

                <!-- Question & Answer --> 
                <div class="container-fluid" style="background-color:#E9ECEF;">
                    <div class="container">
                        <p class="lead">Question & Answer</p>
                    </div>
                </div>                       
                <?php $k = $last_id+1; ?>
                @for ($i = 7; $i <= 31; $i++)
                    {!! Form::hidden('num_question'.$k,$i) !!}
                    {!! Form::hidden('id_souspartie'.$k,2) !!}
                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                    {{ Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$k.",rep_question".($k+1).",1)")) }} 
                    <?php $k++;?>
                    <br><br>
                @endfor

                <!-- Short Conversations --> 
                <div class="container-fluid" style="background-color:#E9ECEF;">
                    <div class="container">
                        <p class="lead">Short Conversations</p>
                    </div>
                </div>                       
                <?php $k = $last_id+1; ?>
                @for ($i = 32; $i <= 70; $i++)
                    {!! Form::hidden('num_question'.$k,$i) !!}
                    {!! Form::hidden('id_souspartie'.$k,3) !!}
                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                    {{ Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$k.",rep_question".($k+1).",1)")) }} 
                    <?php $k++;?>
                    <br><br>
                @endfor

                <!-- Short Talks --> 
                <div class="container-fluid" style="background-color:#E9ECEF;">
                    <div class="container">
                        <p class="lead">Short Talks</p>
                    </div>
                </div>                       
                <?php $k = $last_id+1; ?>
                @for ($i = 71; $i <= 100; $i++)
                    {!! Form::hidden('num_question'.$k,$i) !!}
                    {!! Form::hidden('id_souspartie'.$k,4) !!}
                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                    {{ Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$k.",rep_question".($k+1).",1)")) }} 
                    <?php $k++;?>
                    <br><br>
                @endfor

                <!-- Incomplete Sentences --> 
                <div class="container-fluid" style="background-color:#E9ECEF;">
                    <div class="container">
                        <p class="lead">Incomplete Sentences</p>
                    </div>
                </div>                       
                <?php $k = $last_id+1; ?>
                @for ($i = 101; $i <= 130; $i++)
                    {!! Form::hidden('num_question'.$k,$i) !!}
                    {!! Form::hidden('id_souspartie'.$k,5) !!}
                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                    {{ Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$k.",rep_question".($k+1).",1)")) }} 
                    <?php $k++;?>
                    <br><br>
                @endfor

                <!-- Text Completion --> 
                <div class="container-fluid" style="background-color:#E9ECEF;">
                    <div class="container">
                        <p class="lead">Text Completion</p>
                    </div>
                </div>                       
                <?php $k = $last_id+1; ?>
                @for ($i = 131; $i <= 146; $i++)
                    {!! Form::hidden('num_question'.$k,$i) !!}
                    {!! Form::hidden('id_souspartie'.$k,6) !!}
                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                    {{ Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$k.",rep_question".($k+1).",1)")) }} 
                    <?php $k++;?>
                    <br><br>
                @endfor

                <!-- Reading Comprehension --> 
                <div class="container-fluid" style="background-color:#E9ECEF;">
                    <div class="container">
                        <p class="lead">Reading Comprehension</p>
                    </div>
                </div>                       
                <?php $k = $last_id+1; ?>
                @for ($i = 147; $i <= 200; $i++)
                    {!! Form::hidden('num_question'.$k,$i) !!}
                    {!! Form::hidden('id_souspartie'.$k,7) !!}
                    {!! Form::label("rep_question".$k,"Question ".$i." :") !!}
                    
                    @if($i==200)
                        {!! Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "upper(rep_question".$k.")")) !!}
                    @else 
                        {!! Form::text("rep_question".$k,null,array('maxlength' => 1,'onKeyUp' => "suivant(rep_question".$k.",rep_question".($k+1).",1)")) !!}
                    @endif 
                    <?php $k++;?>
                    <br><br>
                @endfor

                <br>
                <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </form>
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
