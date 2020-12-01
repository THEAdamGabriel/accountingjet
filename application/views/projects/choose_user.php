<style>
.text-center.w50 sorting_asc, .text-center.w50, .text-center.option.w100.sorting,  .text-center.option.w100, .dt-button.buttons-print, .dt-button.buttons-excel.buttons-html5, .btn.btn-default.column-show-hide-popover.ml15 { 
display:none;
}

</style>
<div class="form-group">
    <label for="title" class=" col-md-3">Choose a Client </label>
                    
         <div class="table-responsive">
            <table id="client-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
</div>        

<script>
function modal_form(cid){

  
}
   $(document).ready(function () {
        var showInvoiceInfo = false;
        if (!"<?php echo $show_invoice_info; ?>") {
            showInvoiceInfo = false;
        }

        $("#client-table").appTable({
            source: '<?php echo_uri("clients/list_data") ?>',
            filterDropdown: [
               
            ],
            columns: [
                {title: "<?php echo lang("id") ?>", "class": "text-center w50"},
                {title: "<?php echo lang("company_name") ?>"},
                {title: "<?php echo lang("primary_contact") ?>"},
                             
                {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("invoice_value") ?>"},
                {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("payment_received") ?>"},
                {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("due") ?>"}
                <?php echo $custom_field_headers; ?>,
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>')
        });
        setTimeout(function(){
        $('#client-table td a').each(function(ui){
         cid=$(this).parent().parent().find('.text-center.w50').text();
           $(this).attr('href', '#');
           $(this).attr('data-action-url', "http://accountingjet.com/dashboard/index.php/projects/modal_form?client_id=" + cid);
           
           $(this).attr('data-post-client_id', cid); 
           $(this).attr('title', "Add service");
           $(this).attr('data-act', "ajax-modal");
           $(this).attr('data-title', "Add service")
        })
        }, 1500)
    });
</script>



