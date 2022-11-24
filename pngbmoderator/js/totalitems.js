$( document ).ready(function() {

	var inputData = function(data){

		$.each(data, function(key, object){
			console.log(object);
		});

	}


	 var loadData = function(){

	 	$.post('backend/controllers/totalitems.php', {type: 'totItems'}, function(data){

	 		// data = JSON.parse(data);
	 		// console.log(data);
	 		// inputData(data);
	 		$("tbody[name=totalItems]").html(data);


	 	});

	 };


	 loadData();

 });
