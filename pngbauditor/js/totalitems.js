$( document ).ready(function() {

	var inputData = function(data){

		$.each(data, function(key, object){
			console.log(object);
		});

	}

		 $('button[name="datef"]').click(function() {

		var dateFrom = $('input[name=dateFrom]').val();
		var dateTo = $('input[name=dateTo]').val();


		loadData(dateFrom,dateTo)
		
	});

	 var loadData = function(dateFrom, dateTo){

		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;	

	 	$.post('backend/controllers/totalitems.php', {type: 'totItems', dateFrom: dateFrom, dateTo: dateTo}, function(data){

	 		// data = JSON.parse(data);
	 		// console.log(data);
	 		// inputData(data);
	 		$("tbody[name=totalItems]").html(data);


	 	});

	 };


	 loadData();

 });

