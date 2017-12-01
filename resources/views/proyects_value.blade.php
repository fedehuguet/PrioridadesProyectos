@include('layouts.app')

<br><br><br>
@foreach($proyects as $item)
<br>
	<h1 style="display: inline-block;" class="col-xs-6"> <a href="/proyect/{{$item->id}}">{{$item->name}}</a> </h1>
	<h2 style="display: inline-block;" class="col-xs-6"> {{$item->value}} </h2>
	<label class="radio-inline" style="padding-left: 30px;">
      <input type="radio"> Terminado
    </label>
@endforeach
<br><br>
@include('layouts.footer')