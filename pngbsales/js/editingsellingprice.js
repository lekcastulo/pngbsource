$( document ).ready(function() {



    var editSellingpriceData = function(data){

        
      requestSellingPrice = [];

        $.each(data, function(key, object){

         

            var requestor = object.firstname+' '+object.secondname;
            // console.log(requestor);

            var allData = {

              "Request No": object.edit_transaction,
              "Request Date": object.date,
              "Member ID": object.member_id,
              "Requestor Name": requestor,
              "Selling Price":object.sellingprice,
              "OR Number": object.or_number,
              "AE Reason": object.reason,
              "Status": object.status, 
              "Request Status": object.request_status, 
              
                 

            }

           

            requestSellingPrice.push(allData);

            

        });

        $(".jsGrid").jsGrid({
          width: "100%",
          height: "400px",
   
          // inserting: true,
        //   editing: true,
          sorting: true,
          paging: true,
          selecting: true,
   
          data: requestSellingPrice,
   
          fields: [
              { name: "Request No", type: "text",  validate: "required" },
              { name: "Request Date", type: "text",  validate: "required" },
            //   { name: "Member ID", type: "text",  validate: "required" },
            //   { name: "Requestor Name", type: "text",  validate: "required" },       
              { name: "Selling Price", type: "text",  validate: "required" },
              { name: "OR Number", type: "text",  validate: "required" },
              { name: "AE Reason", type: "text",  validate: "required" },
              { name: "Status", type: "text",  validate: "required" },
              { name: "Request Status", type: "text",  validate: "required" },
              
            //   { name: "For Approval", type: "select", items: [ "For Edit", "Approved" , "Not Approved" ]},
            //   { name: "Reason For Approved/Not Approved", type: "text",  validate: "required" },
            //   { type: "control"},
          ],

          onItemUpdated: function(args) {

            
           
  
           
          
          },


          onItemDeleted: function(args) {

            
          }


        });

    }

    var editingsellingprice = function(){

      $.post('backend/controllers/editing.php', {type: 'editingsellingprice'}, function(data){
          // console.log(data);
          data = JSON.parse(data)

            editSellingpriceData(data);
          
      });
    }

  editingsellingprice();




})(jQuery);
