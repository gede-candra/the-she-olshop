$(document).ready(function() {
   $('#example').DataTable({
      dom: 'lrtip',
      "lengthMenu": [5, 10, 20, 30, 40, 50],
   });
   oTable = $('#example').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
   $('#myInputTextField').keyup(function(){
         oTable.search($(this).val()).draw();  
   })
});