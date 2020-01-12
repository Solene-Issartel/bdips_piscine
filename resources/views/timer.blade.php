@extends('layouts.layhome')

@section('title')
Timer
@endsection

@section('content')
<div class="container-fluid text-center pad">
    Hours: <input type="number" id="nbHour" min="0"><br/>
    Minutes:<input type="number" id="nbMinute" min="0"><br/>
    Seconds:<input type="number" id="nbSecond" min="0"><br/>
    <button onclick="start()" class="btn btn-primary">Start </button>
    <button onclick="pause()" class="btn btn-primary">Pause </button>
    <button onclick="resume()" class="btn btn-primary">Resume </button>
    <p id="demo"></p>

    <script>
    var is_active;
    var timer;
    var total_second;
    function start(){
        if(is_active==undefined){     
            is_active=true;
            var nbHour=parseInt("0"+document.getElementById("nbHour").value);
            var nbMinute=parseInt("0"+document.getElementById("nbMinute").value);
            var nbSecond=parseInt("0"+document.getElementById("nbSecond").value);
            total_second=(3600*nbHour)+(60*nbMinute)+(nbSecond);
            countdown(total_second);
        }
        else{
            pause();
            is_active=true;
            var nbHour=parseInt("0"+document.getElementById("nbHour").value,10);
            var nbMinute=parseInt("0"+document.getElementById("nbMinute").value,10);
            var nbSecond=parseInt("0"+document.getElementById("nbSecond").value,10);
            total_second=(3600*nbHour)+(60*nbMinute)+(nbSecond);
            countdown(total_second);
        }
    }

    function resume(){
        if(is_active==false){
            is_active=true;
            countdown(total_second-1);
        }
    }

    function pause(){
        if(is_active==true){
            is_active=false;
            clearTimeout(timer);
        }
    }
    function countdown(n) {
      if (n==0){
        alert("End of Session.");
      }
      else{
        var str="";
        str+=Math.floor(n/3600)+"h : "+Math.floor(n/60)%60+"mn : "+n%60+"s"
      document.getElementById("demo").innerHTML=str
      total_second=n;
      timer =setTimeout(function(){ countdown(n-1); }, 1000);
      }
    }
    </script>
</div>
@endsection
