$( document ).ready(function() {

    var editingCustomer = function(){
  
        $.post('backend/controllers/editing.php', {type: 'backtrackCustomers'}, function(data){
            // console.log(data);
            data = JSON.parse(data)
  
              editCustomerData(data);
            
        });
    }
  
    var editCustomerData = function(data){
  
        
      requestCustomer = [];
  
        $.each(data, function(key, object){
  
         
  
            var requestor = object.firstname+' '+object.secondname;
            // console.log(requestor);
  
            var allData = {
  
              "Request No": object.edit_transaction,
              "Request Date": object.date,
              "Member ID": object.member_id,
              "Requestor Name": requestor,
              "Customer Name":object.customer_name,
              "OR Number": object.or_number,
              "AE Reason": object.reason,
              "Status": object.status,  
                 
  
            }
  
           
  
            requestCustomer.push(allData);
  
            
  
        });
  
        $(".jsGrid5").jsGrid({
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
              { name: "Customer Name", type: "text",  validate: "required" },
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
           
  
  
            // console.log(adminreason);
            // console.log(approval);
            // console.log(requestno);
            // console.log(or);
            // console.log(customer);
            // console.log(member);
            
  
            
            $.post('backend/controllers/editing.php', { type: 'editingCustomerRequest', member:member,or:or, customer:customer, approval:approval, adminreason:adminreason, requestno: requestno}, function(data) {
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
  
  
  editingCustomer();
  
  
  })(jQuery);
  