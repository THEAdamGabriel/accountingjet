
<script>
    function send_ajax(url){
      
            $.ajax({
                    url: url,
                    data: $('#client-form').serialize(),
                    success: function(response){
                            $('#ajaxModalContent').html(response)
                    }
             })       
      
    }
</script>    
<style>
.panel .form-group .col-md-9.name {
    width: 250px;
    float: right;
    margin-right: 73px;
    margin-top: -34px;
    clear: right;
    margin-bottom: 15px;
}
.general-form .form-control.name {
    width: 100%!important;
}
input#exp_month {
    width: 70px!important;
    float: right;
}
input#exp_year {
    width: 125px!important;
    float: right;
    margin-right: 2px;
}
input#price, input#price1, input#price2 {
    float: right;
    clear: both;
    margin-bottom: 3px;
    color: green;
    font-weight: bold;
    text-align: right;
    font-size: 16px;
    border-radius: 4px;
    border: 1px solid green;
    padding: 2px;
    width: 100px;
}
.form-group {
    margin-bottom: -40px;
    min-height: 85px;
}
</style>
<?php echo form_open("javascript: send_ajax('" . get_uri("projects/save") . "');", array("id" => "project-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="estimate_id" value="<?php echo $model_info->estimate_id; ?>" />
    <h2>Please Pay for your Subscription</h2>
    
      
            <div class="form-group">
                <label for="title" class=" col-md-3">Your Name? </label>
                <div class=" col-md-9 name">
                    <?php
                    echo form_input(array(
                        "id" => "name",
                        "name" => "name",
                        "value" => $model_info->first_name . ' ' . $model_info->last_name,
                        "class" => "form-control name",
                        
                        "placeholder" => 'Name',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class=" col-md-3">Credit Card Number? </label>
                <div class=" col-md-9 name">
                    <?php
                    echo form_input(array(
                        "id" => "ccnumber",
                        'type' => 'text',
                        "name" => "ccnumber",
                        "value" => $model_info->ccnumber,
                        "class" => "form-control name",
                        "placeholder" => 'CC Number',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class=" col-md-3">Exp. Date?</label>
                <div class=" col-md-9 name">
                     
                    <?php
                    echo form_input(array(
                        "id" => "exp_year",
                        'type' => 'text',
                        "name" => "exp_year",
                        "value" => $model_info->exp_year,
                        "class" => "form-control name",
                        "placeholder" => 'Year',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                     <?php
                    echo form_input(array(
                        "id" => "exp_month",
                        'type' => 'text',
                        "name" => "exp_month",
                        "value" => $model_info->exp_month,
                        "class" => "form-control name",
                        "placeholder" => 'Month',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
             <div class="form-group">
                <label for="title" class=" col-md-3">Subscription Price</label>
                <div class=" col-md-9">
                   <input type="text" disabled id="price" value="<?php echo $model_info->projects->price; ?>" />
                </div>
                <br />
                <label for="title" class=" col-md-3">Discounts</label>
                <div class=" col-md-9">
                   <input type="text" disabled id="price1" value="<?php if($model_info->projects->total>=2){ echo .10; }else{ echo 0; } ?>" />
                </div>
                <br />
                <label for="title" class=" col-md-3">Total Price</label>
                <div class=" col-md-9">
                   <input type="text" disabled id="price2" value="<?php if($model_info->projects->total>=2){ echo ceil($model_info->projects->price - ($model_info->projects->price * .10)); }else{ echo $model_info->projects->price; } ?>" />
                </div>
          
            </div>
           
</div>

<div class="modal-footer">
           
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>
