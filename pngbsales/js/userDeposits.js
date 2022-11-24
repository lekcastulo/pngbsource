

(function($) {
	/* VALIDATE */
	$("#addDepositForm").validate({
		rules: {
			deposit_amount: {
			  required: true,
			  number: true
			},
			deposit_date: {
				required: true,
			}
		  },

		submitHandler: function(form){
			toggleButtonDisabledAttr();			
			var form_data = new FormData(form); //Creates new FormData object
			var post_url = '/backend/controllers/savedeposit.php';
			$.ajax({
				url : post_url,
				type: 'POST',
				data : form_data,
				contentType: false,
				cache: false,
				processData:false
			}).success(function(response){ //
				$("#addDepositForm").trigger("reset")
				$("[data-dismiss=modal]").trigger({ type: "click" });

				

				var response_ = JSON.parse(response);
				console.log(response_.type);
				if (response_.type == 'success') {
					toggleButtonDisabledAttr();
					$("#success-message span").html(response_.message);
					$("#success-message").addClass('alert-success') 
					.show();
				}

				if (response_.type == 'error') {
					$("#success-message span").html(response_.message);
					$("#success-message").addClass('alert-danger') 
					.show();
				}

				loadData();

			});
		}
	});

	
	window.onafterprint = function(){
		$('#media_p').val('browseme');
		$('#filterdate').trigger('click');
	}

	$('#printpage').on('click', function() {
		$('#media_p').val('printme');
		$('#filterdate').trigger('click');	
	});
	
	var dataInput = function(data){
		var memberDeposits = [];
		var totalSales = data.totaldeposits;
		var deposits =  data.deposits;
		var table = '';
		var mediap = $('#media_p').val();
		var pagesize = 20;

		if (deposits.length) {
		$.each(deposits, function(key, object){

			var depositData = {
				"id": object.id,
				"Deposit Date": object.deposit_date,
				"Image": '<img class="deposit_img" src="'+object.deposit_image+'" style="width:60px;height:60px;">',
				"Amount": numeral(object.deposit_amount).format('0,0.00'),
				"Note": object.deposit_note
			}

			memberDeposits.push(depositData);

		});

		/* TOTAL */
		
		$('#totalDeposits').show();
		$('.totalAmount').html(numeral(totalSales).format('0,0.00'));
		}

		if (mediap == 'printme') {
			pagesize = 10000;
		}

		console.log(pagesize);

		$("#jsGrid").jsGrid({
			width: "100%",
	 
			filtering: true,
			editing: false,
			sorting: true,
			paging: true,
			autoload: true,
			pageSize: pagesize,
			pageButtonCount: 5,
			deleteConfirm: "Do you really want to delete this entry?",
			data: memberDeposits,
	 
			fields: [
				{ name: "Deposit Date", type: "text"  },
				{ name: "Image", type: "image",sorting: false},
				{ name: "Amount", type: "text"},
				{ name: "Note", type:"textarea", sorting: false, filtering:false},
				//{ type: "control" }
			],
			onItemUpdated: function(args) {
				console.log(args);
	
			},
  
  
            onItemDeleted: function(args) {
				console.log(args);
			}
		});
		if (mediap == 'printme') {
			window.print();
		}
		//$("tbody[name=metroData]").html(table);
	};

		
	$('button[name="sum"]').click(function() {

		var dateFrom = $('input[name=dateFrom]').val();
		var dateTo = $('input[name=dateTo]').val();

		loadData(dateFrom,dateTo)

	});

	var loadData = function(dateFrom,dateTo){
		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		var member_id = $('#member_id').val();
		$.post('/backend/controllers/membersdeposits.php', { member_id: member_id, dateFrom: dateFrom, dateTo: dateTo }, function(data){
			data = JSON.parse(data);
			dataInput(data);
		});
	};


	loadData();

})(jQuery);



$(window).load(function() {
	//EVENT IMG CLICK
	
		$('#jsGrid').on('click', '.deposit_img', function() {
			var img_src = $(this).attr('src');
			$('#myModal').find('img').attr('src', img_src );
			$('#myModal').find('img').css('width', '100%' );
			$('#myModal').modal('show');
		});
	
	});


	//FUNCTION TOGGLE BUTTON DISABLED ATTR
function toggleButtonDisabledAttr() {
	console.log('test');
	var $modal_submit_btn = $('#addDepositModal').find("button[type='submit']");
	$modal_submit_btn.prop('disabled', function(i, v) { return !v; });
}