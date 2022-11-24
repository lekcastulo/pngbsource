(function($) {




	var dataInput = function(data, data2){



		var inventories = '';
		var gramsSold = '';
		// inventories += '<h4> '+data.memberFirstname+' '+data.memberLastname+'</h4>';



		$.each(data2, function(key,object){



				
				inventories += '<tr>'

				
					inventories += '<td><b>'+object.itemtype+'</b></td>';
		
					// inventories += '<td><b>'+Number(object.input).toFixed(2)+'</b></td>';
			
					// inventories += '<td><b>'+Number(object.output).toFixed(2)+'</b></td>';
			

				var items = object.input - object.output;


					inventories += '<td><b><font color="blue">'+Number(items).toFixed(2)+'</font></b></td>';
				
			
					
		});			
		
		

		$("tbody[name=totalInventory]").html(inventories);

	
		$.each(data, function(key,object){

				console.log(object);
				gramsSold += '<tr>'
				gramsSold += '<td><b>'+object.item_type+'</b></td>';
				gramsSold += '<td><b><font color="red">'+Number(object.totalgrams).toFixed(2)+'</font></b></td>';

		});

		$("tbody[name=totalGrams]").html(gramsSold);




		};	

		$('select#accountnameid').change(function(){
			loadData();
		});

	var loadData = function(){

		
		var id = $('input[name=id]').val();

	
		// console.log(id);
		$.post('backend/controllers/getinventory.php', {type: 'itemInventory', id: id }, function(data){

			data = JSON.parse(data);		
			// console.log(data);

			loadData2(data);
		});


	};
		

	var loadData2 = function(data2){
		
			var id = $('input[name=id]').val();
			// console.log(data2);

		$.post('backend/controllers/getinventory.php', {type: 'itemGrams', id: id }, function(data){

			data = JSON.parse(data);	

			// var newdata = [data];
			// $.extend(data, data2);


		
			

			// console.log(dataTotal);
			dataInput(data,data2);


		});
	};
	

	


	loadData();
	

})(jQuery);