

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
				"Member": object.member_name,
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
		} else {
			$('#totalDeposits').hide();
			$('.totalAmount').html(numeral(totalSales).format('0,0.00'));	
		}

		if (mediap == 'printme') {
			pagesize = 10000;
		}

		console.log(pagesize);

		$("#jsGrid").jsGrid({
			width: "100%",
	 
			filtering: true,
			editing: true,
			sorting: true,
			paging: true,
			autoload: true,
			pageSize: pagesize,
			pageButtonCount: 5,
			deleteConfirm: "Do you really want to delete this entry?",
			data: memberDeposits,
	 
			fields: [
				{ name: "Member", type: "text", editing: false  },
				{ name: "Deposit Date", type: "text"  },
				{ name: "Image", type: "image",sorting: false},
				{ name: "Amount", type: "text"},
				{ name: "Note", type:"textarea", sorting: false, filtering:false},
				{ type: "control" }
			],
			onItemUpdated: function(args) {
				var deposit_id = args.item.id;
				var deposit_date = args.item["Deposit Date"];
				var deposit_amount = args.item.Amount;
				var deposit_note = args.item.Note;
				console.log(args);
				$.post('/backend/controllers/membersdeposits.php?requestType=updateDeposit', {deposit_id: deposit_id,deposit_date:deposit_date,deposit_amount:deposit_amount,deposit_note:deposit_note}, function(data){
				});
			},
			onItemDeleted: function(args) {
				var deposit_id = args.item.id;
				$.post('/backend/controllers/membersdeposits.php?requestType=deleteDeposit', {deposit_id: deposit_id}, function(data){
					
				});
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
		var login_type = 'admin';
		$.post('/backend/controllers/membersdeposits.php', { member_id: member_id, dateFrom: dateFrom, dateTo: dateTo, login_type: login_type }, function(data){
			data = JSON.parse(data);
			dataInput(data);
		});
	};


	loadData();

	var getMembersData = function(){
		var login_type = 'auditor';
		$.post('/backend/controllers/membersdeposits.php?requestType=getMembers', {  login_type: login_type }, function(data){
			var members_data = JSON.parse(data);
			var members_html = '<option value="0">Choose member...</option>';
			$.each(members_data, function(key, object){
				members_html += '<option value="'+object.member_id+'">'+ object.firstname + ' ' + object.secondname +'</option>';
			});		

			$('#members_filter').html(members_html);

		});
	};

	getMembersData();

	$('#members_filter').on('change', function(){
			$('#member_id').val($(this).val());
	});
		
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
