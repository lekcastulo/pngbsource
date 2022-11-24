$( document ).ready(function() {

   
    var editShipping = function(data){

        
      requestCustomer = [];

        $.each(data, function(key, object){

         

            var requestor = object.firstname+' '+object.secondname;
            // console.log(requestor);

            var allData = {

            "Request No": object.edit_transaction,
            "OR Date": object.ordate,
            "Request Date": object.date,
            "Member ID": object.member_id,
            "Requestor Name": requestor,
            "Old Shipping Option":object.existing_sf,
            "Requested Shipping Fee":object.sf,
            "OR Number": object.or_number,
            "Requested SF Amount": object.sfamount,
            "Requested Reference Number": object.reference,
            "AE Reason": object.reason,
            "Status": object.status,  
                 

            }

            console.log(allData);

           

            requestCustomer.push(allData);

            

        });

        

        $(".jsGrid9").jsGrid({
          width: "100%",
          height: "400px",
   
          // inserting: true,
        //   editing: true,
          sorting: true,
          paging: true,
          selecting: true,
   
          data: requestCustomer,
   
          fields: [
            { name: "Request No", type: "text",  validate: "required" },
            { name: "OR Date", type: "text",  validate: "required" },
            { name: "Request Date", type: "text",  validate: "required" },
            { name: "Member ID", type: "text",  validate: "required" },
            { name: "Requestor Name", type: "text",  validate: "required" },       
            { name: "Old Shipping Option", type: "text",  validate: "required" },           
            { name: "Requested Shipping Fee", type: "text",  validate: "required" },   
            { name: "Requested SF Amount", type: "text",  validate: "required" }, 
            { name: "Requested Reference Number", type: "text",  validate: "required" },         
            { name: "OR Number", type: "text",  validate: "required" },
            { name: "AE Reason", type: "text",  validate: "required" },
            { name: "Status", type: "text",  validate: "required" },
          ],

          onItemUpdated: function(args) {

            



            var requestno = args.item['Request No'];
            var approval = args.item['For Approval'];
            var customer = args.item['Customer Name'];
            var member = args.item['Member ID'];
            var or = args.item['OR Number'];
            var adminreason = args.item['Reason For Approved/Not Approved'];

            // console.log(member);

            if (approval == 1) {
                approval = 'Approved';
            }

            if (approval == 2) {
              approval = 'Not Approved';
          }
           


            console.log(adminreason);
            console.log(approval);
            console.log(requestno);
            console.log(or);
            console.log(customer);
            console.log(member);
            
  
            
            $.post('backend/controllers/editing.php', { type: 'editingShippingFeeRequest', member:member,or:or, grams:grams, approval:approval, adminreason:adminreason, requestno: requestno}, function(data) {
              // loadData();
            });
          },


          // onItemDeleted: function(args) {

            // var  TN = args.item.TN;
            // $.post('backend/controllers/zipcode.php', { type: 'deleteProject', TN: TN }, function(data) {
            //   loadData();

            // });

          // }


        });

    }

    var editingitemtype = function(){

        $.post('backend/controllers/editing.php', {type: 'editingshippingfee'}, function(data){
           
            data = JSON.parse(data)

             console.log(data);

              editShipping(data);
            
        });
    }
  
  editingitemtype();



})(jQuery);

