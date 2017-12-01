@include('layouts.app')

<br><br><br>
<h1>Objetivos</h1>
<br>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Objetivo:</label>
  <div class="col-6">
    <input class="form-control" type="text" placeholder="Obetivo nombre" id="example-text-input" name="nameObjective">
  </div>
  <form style="padding-left: 30px; padding-right: 30px;">
    <label class="radio-inline">
      <input type="radio" id="bolChecar" name="bolCorto" style="margin-right: 10px;">Corto
    </label>
    <label class="radio-inline" style="padding-left: 30px;">
      <input type="radio" name="bolCorto" style="margin-right: 10px;">Largo
    </label>
  </form>
  <button class="btn btn-primary" id="btnAddObjective">+</button>
</div>
@foreach($objectives as $item)
<br>
	<h1 style="display: inline-block;" class="col-xs-6"> {{$item->name}} </h1>
	@if($item->bolCorto)
		<h2 style="display: inline-block;" class="col-xs-6">   Plazo : Corto</h2>
	@else
		<h2 style="display: inline-block;" class="col-xs-6">   Plazo : Largo</h2>
	@endif
  <button class="btn btn-primary" id="btnDeleteObjective" style="background-color: red; border-color: red;" idObjective="{{$item->id}}">-</button>
@endforeach

@include('layouts.footer')