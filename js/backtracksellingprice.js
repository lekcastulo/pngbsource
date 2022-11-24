$( document ).ready(function() {


  
    var editingSellingprice = function(){
  
      $.post('backend/controllers/editing.php', {type: 'backtrackSellingprice'}, function(data){
          // console.log(data);
          data = JSON.parse(data)
  
            editSellingData(data);
          
      });
    }
  
    var editSellingData = function(data){
  
        
      requestCustomer = [];
  
        $.each(data, function(key, object){
  
        
  
            var requestor = object.firstname+' '+object.secondname;
            // console.log(requestor);
  
            var allData = {
  
              "Request No": object.edit_transaction,
              "Request Date": object.date,
              "Member ID": object.member_id,
              "Requestor Name": requestor,
              "Old Selling Price": object.existing_sellingprice,
              "Requested Selling Price":object.sellingprice,
              "OR Number": object.or_number,
              "AE Reason": object.reason,
              "Status": object.status,  
                
  
            }
  
          
  
            requestCustomer.push(allData);
  
            // console.log(allData);
  
            
  
        });
  
        $(".jsGrid7").jsGrid({
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
              { name: "Request Date", type: "text",  validate: "required" },
              { name: "Member ID", type: "text",  validate: "required" },
              { name: "Requestor Name", type: "text",  validate: "required" },  
              { name: "Old Selling Price", type: "text",  validate: "required" },       
              { name: "Requested Selling Price", type: "text",  validate: "required" },
              { name: "OR Number", type: "text",  validate: "required" },
              { name: "AE Reason", type: "text",  validate: "required" },
              { name: "Status", type: "text",  validate: "required" },
            //   { name: "For Approval", type: "select", items: [ "For Edit", "Approved" , "Not Approved" ]},
            //   { name: "Reason For Approved/Not Approved", type: "text",  validate: "required" },
            //   { type: "control"},
          ],
  
          onItemUpdated: function(args) {
  
            
  
            
  
            var requestno = args.item['Request No'];
            var approval = args.item['For Approval'];
            var sellingprice = args.item['Selling Price'];
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
          
  
  
            // console.log(adminreason);
            // console.log(approval);
            // console.log(requestno);
            // console.log(or);
            // console.log(sellingprice);
            
  
            
            $.post('backend/controllers/editing.php', { type: 'editingSellingpriceRequest', member:member,or:or, sellingprice:sellingprice, approval:approval, adminreason:adminreason, requestno: requestno}, function(data) {
              loadData();
            });
          },
  
  
          onItemDeleted: function(args) {
  
            // var  TN = args.item.TN;
            // $.post('backend/controllers/zipcode.php', { type: 'deleteProject', TN: TN }, function(data) {
            //   loadData();
  
            // });
  
          }
  
  
          });
  
    }
  
  
  editingSellingprice();

  
  
  })(jQuery);
  