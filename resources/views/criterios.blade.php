@include('layouts.app')

<br><br><br>
<h1>Criterios</h1>
<br>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Criterio:</label>
  <div class="col-4">
    <input class="form-control" type="text" placeholder="Criterio nombre" id="example-text-input" name="nameCriteria">
  </div>
  <label for="example-text-input" class="col-2 col-form-label">Peso:</label>
  <div class="col-2">
    <input class="form-control" type="text" placeholder="Valor del 1-5" id="example-text-input" name="valCriteria">
  </div>
  <button class="btn btn-primary" id="btnAddCriteria">+</button>
</div>
@foreach($criterios as $item)
<br>
	<h1 style="display: inline-block;" class="col-xs-6"> {{$item->name}} </h1>
	<h2 style="display: inline-block;" class="col-xs-6"> Peso : {{$item->peso}}</h2>
  <button class="btn btn-primary" id="btnDeleteCriteria" style="background-color: red; border-color: red;" idCriteria="{{$item->id}}">-</button>
@endforeach
@include('layouts.footer')