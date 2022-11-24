$( document ).ready(function() {



	var dataInput = function(){

	}

	var loadData = function(){

		$.post('backend/controllers/total.php', {type: 'totalItems' }, function(data){
		$("tbody[name=overAllTotal]").html(data);

		});


	};
		


	loadData();
	
 });
