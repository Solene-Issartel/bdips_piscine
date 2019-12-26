@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="panel panel-default">
                <div class="panel-heading">Toeic</div>

                <div class="panel-body">
                    <form methos="POST" action="{{ url('quiz') }}">
                    <div class="container">
                        <p> Listening :</p>
                      <div class="row">
                        <div class="col-sm-4">
                          First part : <br> 
                                       A   B   C   D
                            <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 1; $i <= 6; $i++)
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <input type="radio" name="result{{$i}}" value="D">

                                    <br><br>
                                @endfor
                            </div>
                        </div>
                        <div class="col-sm-4">
                          Second part : <br> 
                                       A   B   C 
                            <div><br>
                                <!-- last_id pour les questions dans la bdd : permet de ne pas écraser les questions des autres sujets -->
                                @for ($i = 7; $i <= 31; $i++)
                                    Question {{$i}} :
                                    <input type="radio" name="result{{$i}}" value="A" checked>
                                    <input type="radio" name="result{{$i}}" value="B">
                                    <input type="radio" name="result{{$i}}" value="C">
                                    <br><br>
                                @endfor
                            </div>
                        </div>
                      </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
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
