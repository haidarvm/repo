<script src="<?=base_url();?>assets/js/datatables.min.js"></script>
<script src="<?=base_url();?>assets/js/dataTables.editor.min.js"></script>
<script src="<?=base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/js/buttons.print.min.js"></script>
<script src="<?=base_url();?>assets/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/js/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/js/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/js/moment-with-locales.min.js"></script>
<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
 $(document).ready(function() {
     $('#repo').DataTable( {
        dom: 'Bfrtip',
         select: true,
         colReorder: false,
        paging:         false,
         buttons: [
             { text: 'Tambah', 
                action: function ( e, dt, button, config ) {
                    window.location = '<?=base_url();?>admin/insert';
                }   
            },
             {
                 extend: 'collection',
                 text: 'Export',
                 buttons: [
                     'copy',
                     'excel',
                     'csv',
                     'pdf',
                     'print'
                 ]
             }
         ]
     } );
 } );
</script>