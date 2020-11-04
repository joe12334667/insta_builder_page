// $(document).ready( function () {
//     $('#example').DataTable();
// } );

$(document).ready(function() {
    $('#example').DataTable( {
        "aoColumns": [
            null,
            null,
            { "orderSequence": [ "asc" ] },
            { "orderSequence": [ "desc", "asc", "asc" ] },
            { "orderSequence": [ "desc" ] },
            null
        ]
    } );
} );