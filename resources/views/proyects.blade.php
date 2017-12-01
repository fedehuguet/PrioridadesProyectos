@include('layouts.app')

<br><br><br>
<h1>Proyectos</h1>
<br>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Proyecto:</label>
  <div class="col-6">
    <input class="form-control" type="text" placeholder="Proyecto nombre" id="example-text-input" name="nameProyect">
  </div>
</div>
@foreach($criterios as $criterio)
  <br>
  <p class="col-xs-6" style="display: inline-block;"> {{$criterio->name}} </h1>
  <label for="example-text-input" class="col-2 col-form-label">Valor:</label>
  <div class="col-2" style="display: inline-block;">
    <input class="form-control" type="text" placeholder="Valor del 1-5" id="example-text-input" name="valueC" idCriterio="{{$criterio->id}}">
  </div>
@endforeach
@foreach($objectives as $objective)
    <label class="radio-inline" style="padding-left: 30px;">
      {{$objective->name}}<input type="radio" id="bolCheckedObjective" name="{{$objective->name}}" idObjective="{{$objective->id}}">
    </label>
@endforeach
<br><br>
<button class="btn btn-primary" id="btnAddProyect">Agregar</button>
<br><br>
@include('layouts.footer')