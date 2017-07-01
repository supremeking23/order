$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

         "paging":   true,
        "ordering": false,
        "info":     true
    } );





} );