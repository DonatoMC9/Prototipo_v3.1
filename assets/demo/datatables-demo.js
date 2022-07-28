// Call the dataTables jQuery plugin


$(document).ready(function() {
  $('#example').DataTable( {
      "language": {
          "lengthMenu": "Mostrar _MENU_ entradas por página",
          "zeroRecords": "Nothing found - sorry",
          "info": "Showing page _PAGE_ of _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(filtered from _MAX_ total records)"
      }
  } );
});
