	(function($) {



	var dataInput = function(data, data2, computedItems){



		var inventories = '';
		var gramsSold = '';
		var remainItems = '';
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

				gramsSold += '<tr>'
				gramsSold += '<td><b>'+object.item_type+'</b></td>';
				gramsSold += '<td><b><font color="blue">'+Number(object.totalgrams).toFixed(2)+'</font></b></td>';

		});		

		$("tbody[name=totalGrams]").html(gramsSold);


		$.each(computedItems, function(key,object){

			console.log(object);

				remainItems += '<tr>'
				remainItems += '<td><b>'+object.item_type+'</b></td>';
				remainItems += '<td><b><font color="red">'+Number(object.value).toFixed(2)+'</font></b></td>';

		});

		$("tbody[name=itemsRamaining]").html(remainItems);













		};	

		$('select#accountnameid').change(function(){
			loadData();
		});

	var loadData = function(){

		var id = $('select#accountnameid').val();
	

		console.log (id);



	
		$.post('backend/controllers/getinventory.php', {type: 'itemInventory', id: id }, function(data){
		$("tbody[name=totalInventory]").html(data);
			// data = JSON.parse(data);		

			// loadData(data);
		});


	};
		


	loadData();
	
	})(jQuery);