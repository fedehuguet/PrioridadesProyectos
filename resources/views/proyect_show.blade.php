@include('layouts.app')

<br><br><br>
@if(isset($proyect))
<br>
<h1 style="display: inline-block;" class="col-xs-6"> {{$proyect->name}} </h1>
@foreach($criterios as $item)
	<br>
	<h1 style="display: inline-block;" class="col-xs-6"> Nombre: {{$item->criteria->name}} </h1>
	<h2 style="display: inline-block;" class="col-xs-6"> Valor: {{$item->valueC}} </h2>
@endforeach
@foreach($objectives as $item)
	<br>
	<h1 style="display: inline-block;" class="col-xs-6"> Cumple con: {{$item->objective->name}} </h1>
@endforeach
@endif
<br><br>
@include('layouts.footer')