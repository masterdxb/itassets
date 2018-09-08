// $('#table_grid').DataTable({
//     responsive: {
//         details: {
//             renderer: function ( api, rowIdx ) {
//                 // Select hidden columns for the given row
//                 var data = api.cells( rowIdx, ':hidden' ).eq(0).map( function ( cell ) {
//                     var header = $( api.column( cell.column ).header() );

//                     return '<tr>'+
//                             '<td>'+
//                                 header.text()+':'+
//                             '</td> '+
//                             '<td>'+
//                                 api.cell( cell ).data()+
//                             '</td>'+
//                         '</tr>';
//                 } ).toArray().join('');

//                 return data ?
//                     $('<table/>').append( data ) :
//                     false;
//             }
//         }
//     },
//     "bPaginate": false,
//     "bFilter": false,
//     "bInfo": false,
//     "aaSorting": []
// });

// $('.select2').select2();

//iCheck for checkbox and radio inputs
// $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
//   checkboxClass: 'icheckbox_minimal-blue',
//   radioClass   : 'iradio_minimal-blue'
// });

 $(".confirm-delete").submit(function (event) {
 var x = confirm("Are you sure you want to delete?");
    if (x) {
        return true;
    }
    else {

        event.preventDefault();
        return false;
    }

});

$(function(){
    $('body').on('close.bs.alert', function(e){
        e.preventDefault();
        e.stopPropagation();
        $(e.target).slideUp();
    });
});

$(document).ready(function(){

    $('#datepicker').datepicker({
      autoclose: true
    });

    $('.slag-name').on('keyup', function(){
        $('.slug-role').val(slug($(this).val()));
    });

    function slug(str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }

    $('.data-delete').on('click', function (e) {
        if (!confirm('Are you sure you want to delete?')){
            return false;
        } 
        e.preventDefault();
        $('#form-delete-' + $(this).data('form')).submit();
    });

});