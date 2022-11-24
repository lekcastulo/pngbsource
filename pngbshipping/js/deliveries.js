(function($) {
	var dataInput = function(data){
		// console.log(data);

		var clients = [];

		$.each(data, function(key, object){ 

			console.log(object);

			var allData =  { 
				"Id": object.id, 
				"AE": object.ae, 
				"Date": object.date, 
				"Delivery Time Started": object.deliveredstarted, 
				"Time Delivered /Cancelled": object.datedelivered,	
				"Delivered By": object.deliveredby, 			
				"Item Type": object.carat, 
				"Grams": object.grams,
				"Amount": object.amount ,  
				"Address": object.address,
				"Shipping Fee": object.shippingfee,  
				"Payment Method": object.paymentmethod, 
				"Status": object.status,
				"Remarks": object.remarks,
			 };

			 clients.push(allData);

			//  console.log(clients);


		});


		$(".jsGrid").jsGrid({
			width: "100%",
			height: "400px",
                // inserting: true,
                editing: true,
                sorting: true,
				paging: true,
				selecting: true,
				
				data:clients, 
	 
			// pageSize: 15,
			// pageButtonCount: 5,
	 
			// deleteConfirm: "Do you really want to delete the client?",
	 
			// controller: db,
	 
			fields: [
				{ name: "Id", type: "text", validate: "required"},
				{ name: "AE", type: "text", validate: "required" },
				{ name: "Date", type: "text", validate: "required" },
				{ name: "Delivery Time Started", type: "text", validate: "required"},
				{ name: "Time Delivered /Cancelled", type: "text", validate: "required"},
				{ name: "Delivered By", type: "text", validate: "required" },
				{ name: "Item Type", type: "text", validate: "required" },
				{ name: "Grams", type: "text", validate: "required" },
				{ name: "Amount", type: "text", validate: "required" },
				{ name: "Address", type: "text", validate: "required" },
				{ name: "Shipping Fee", type: "text", validate: "required" },
				{ name: "Payment Method", type: "text", validate: "required" },
				{ name: "Status", type: "text", validate: "required" },
				{ name: "Change Status", type: "select", items: [ "Completed","Cancelled" ]},
				{ name: "Remarks", type: "text", validate: "required" },
				{ type: "control" }
			],

			onItemUpdated: function(args) {

				// console.log(args);

				var changestatus = args.item['Change Status'];
				var remarks = args.item['Remarks'];
				var id = args.item['Id'];
	

				

				if (changestatus == 0) {
					changestatus = 'Completed';
				}
	  
				if (changestatus == 1) {
					changestatus = 'Cancelled';
					
				  }

				  console.log(remarks);
				  console.log(id);
				  console.log(changestatus);

				// var Date = new Date("MM/dd/yyyy");
				

				// var Date = new Date();
				// var formattedDate = moment(Date).format(YYYYMMDD);
		

				// console.log(formattedDate);
				
				$.post('backend/controllers/deliveries.php', {type: 'updatedeliver', changestatus: changestatus,  remarks: remarks, id: id }, function(data){
				  loadData();
				});
			  },
		});



		
		
	};

		

		$('select#itemType').change(function(){
			loadData();
		});		

	// var tables = function(){


	

				  

		 $('button[name="sum"]').click(function() {

			var dateFrom = $('input[name=dateFrom]').val();
			var dateTo = $('input[name=dateTo]').val();
			var deliveredby = $('input[name=deliveredby]').val();


			loadData(dateFrom,dateTo,deliveredby)
			
		});

	var loadData = function(dateFrom,dateTo,deliveredby){

		
		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		var deliveredby = $('input[name="deliveredby"]').val();

		// console.log(deliveredby);
		

			// console.log(dateFrom);
			// console.log(dateTo);
		// alert('123');
		// console.log(id);
		$.post('backend/controllers/deliveries.php', {type: 'deliveries', deliveredby: deliveredby,  dateFrom: dateFrom, dateTo: dateTo }, function(data){

			// console.log(data);
			data = JSON.parse(data);


			dataInput(data);


		});
	};
	

	


	loadData();

})(jQuery);
