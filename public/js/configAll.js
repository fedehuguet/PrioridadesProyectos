$(document).ready(function () {

	$("#btnAddObjective").click(function () {
        var objname = $('[name=nameObjective]').val();
        var bolChecar = $('[id=bolChecar]').is(':checked');
        var bolSend = 0;
        if(bolChecar) {
        	bolSend = 1;
        }
	    if(objname == "") {
	    	alert('Error llene los campos');
	    	return;
	    }
	    debugger;
        var urlResource = location.origin + "/objective";
        dataSend = {
            name: objname,
            _token: $('meta[name="csrf-token"]').attr('content'),
            bolCorto: bolSend
        };
        $.ajax({
		  type: 'POST',
		  url: urlResource,
		  data: dataSend,
		  dataType: 'json'
		}).done(function(response){
			location.reload();
		});
    });

    $("#btnAddCriteria").click(function () {
        var critname = $('[name=nameCriteria]').val();
        var critpeso = parseInt($('[name=valCriteria]').val());
	    if(critname == "" || critpeso == "") {
	    	alert('Error llene los campos');
	    	return;
	    }
	    debugger;
        var urlResource = location.origin + "/criteria";
        dataSend = {
            name: critname,
            _token: $('meta[name="csrf-token"]').attr('content'),
            peso: critpeso
        };
        $.ajax({
		  type: 'POST',
		  url: urlResource,
		  data: dataSend,
		  dataType: 'json'
		}).done(function(response){
			location.reload();
		});
    });
    $("#btnAddProyect").click(function () {
        var proyectname = $('[name=nameProyect]').val();
	    if(proyectname == "") {
	    	alert('Error llene los campos');
	    	return;
	    }
	    var criterios = [];
	    $('[name=valueC]').each(function( item ) {
	    	var valor = parseInt($(this).val());
	    	if(isNaN(valor)) {
	    		valor=1;
	    	}
		  	criterios.push({idCriterio:parseInt($(this).attr('idCriterio')), value:valor});
		});
		var objectives = [];
	    $('[id=bolCheckedObjective]').each(function( item ) {
	    	if($(this).is(':checked')) {
	    		objectives.push({idObjective:parseInt($(this).attr('idObjective'))});
	    	}
		});
	    debugger;
        var urlResource = location.origin + "/proyect";
        dataSend = {
            name: proyectname,
            _token: $('meta[name="csrf-token"]').attr('content'),
            criterios: criterios,
            objectives: objectives
        };
        $.ajax({
		  type: 'POST',
		  url: urlResource,
		  data: dataSend,
		  dataType: 'json'
		}).done(function(response){
			location.reload();
		});
    });
    $("[id=btnDeleteObjective]").click(function () {
	    debugger;
        var urlResource = location.origin + "/objective/" +$(this).attr('idObjective');
        $.ajax({
        	url: urlResource,
        	method: 'POST',
            data: {
                _method: 'DELETE',
                _token: $('meta[name="csrf-token"]').attr('content')
            }
		}).done(function(response){
			location.reload();
		});
    });
    $("[id=btnDeleteCriteria]").click(function () {
	    debugger;
        var urlResource = location.origin + "/criteria/" +$(this).attr('idCriteria');
        $.ajax({
        	url: urlResource,
        	method: 'POST',
            data: {
                _method: 'DELETE',
                _token: $('meta[name="csrf-token"]').attr('content')
            }
		}).done(function(response){
			location.reload();
		});
    });
});