<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="/dashboard/assets/js/jquery.mask.js"></script>
<link href="/dashboard/assets/css/fileuploader.css" rel="stylesheet" type="text/css">
<script>
    function send_ajax(url){
      if($('.panel.shown').length<3){
        id = parseInt($('.panel.active').attr('id').replace(/panel_/ig, ''));
        $('#arrow_' + (id + 1)).click();
        
      }else{
            $.ajax({
                    url: '/dashboard/index.php/projects/blockscore',
                    data: { client_id: '<?php echo $model_info->client_id; ?>' },
                    success: function(response){
                            $('#ajaxModalContent').html(response)
                    }
             })       
      }
    }
</script>    
<script>
    function send_ajax2(url){
     
            $.ajax({
                    url: url,
                    data: $('#client-form').serialize(),
                    type: 'post',
                    success: function(response){
                            $('#ajaxModalContent').html(response)
                    }
             })       
      
    }
</script>  
<?php echo form_open("javascript: send_ajax('" . get_uri("projects/save") . "');", array("id" => "project-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="estimate_id" value="<?php echo $model_info->estimate_id; ?>" />
    <h2>Please Choose Your Services</h2>
    <ul style="width:100%;list-style:none;display:block;height:60px;">
      <li class="next" style="" id="arrow_0"><b style="margin-top:8px;color:#fff;display:block;margin-left:7px;">Bookkeeping</b></li>
      <li class="next" style="" id="arrow_1"><b style="margin-top:8px;color:#fff;display:block;margin-left:10px;">Payroll</b></li>
      <li class="next" style="" id="arrow_2"><b style="margin-top:8px;color:#fff;display:block;margin-left:10px;">Taxes</b></li>
    </ul>  
    <style>
        .modal-title {
        display:none;
        }
        .modal-header {
            border-bottom: unset;
        }
        .panel label.col-md-3 {
            width: 90%;
        }
        .form-group2.hidden {
            display:block!important;
        }
        .panel input {
            width: 92px;
            float: right;
            clear: both;
            display: block;
            position: relative;
            left: 40px;
        }
        .panel p {
            font-weight: bold;
            text-indent: 15px;
            font-size: 20px;
        }
        .panel {
            display:none;
        }
.panel.active {
    display: table;
 } 
.panel {
    border-radius: 5px;
    transition: all 1s;
    border: none;
    border: 1px solid #ededed;
    padding: 5px;
    width: 100%;
    margin-top: 10px!important;
    background-color: #eeee;
}
.modal-body > ul {
    margin-bottom: 10px;
    background-color: #eee;
    min-height: 78px;
    display: block;
    padding: 5px 0px 55px 5px;
    text-align: center;
    border-radius: 5px;
}
.modal-body h2 {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
}
.next {
    display: inline-block;
    background-image: url(/dashboard/assets/images/arrow_gradient_red_right.png);
    width: 143px;
    height: 66px;
    background-size: 145px 86px;
    background-repeat: no-repeat;
    line-height: 48px;
    vertical-align: middle;
    margin-right: 20px;
    font-size: 16px;
    background-position: 0px -10px;
    text-align: left;
}
         .next.active {
            background-image: url(/dashboard/assets/images/arrow_gradient_green_right.png);
         }
         .panel p label {
                font-size: 15px!important;
                width: 150px;
                float: right;
                margin-right: 20px;
            }
            .panel p label input {
                float: right;
                margin-top: -15px;
                /* margin-left: -15px; */
            }
            .col-md-9 select {
                float: right;
                margin-left: 40px;
                border: 0px none;
                background-color: #f6f8f9;
                padding: 6px;
                border-radius: 2px;
                position: relative;
                left: 40px;
            }
            .panel span.error {
                color: red;
                clear: both;
                float: none;
                display: block;
                margin-left: 15px;
            }
            .modal-footer label.col-md-3 {
                font-weight: bold;
                width: 150px;
                float: left;
            }
            .modal-footer .col-md-9 {
                float: right;
                margin-top: -20px;
            }
           .modal-footer .col-md-9 input {
                color: green!important;
                font-size: 20px;
                font-weight: bold;
                width: 100px;
                text-align: right;
                border: 0px none;
                padding: 4px;
                border-radius: 4px;
            }
            .select2-container {
                box-sizing: border-box;
                display: inline-block;
                margin: 0;
                position: relative;
                vertical-align: middle;
                width: 112%;
                margin-bottom: 20px;
            }
            .panel .form-group .col-md-9 {
                width: 100px;
                float: right;
                margin-right: 73px;
                margin-top: -34px;
                clear: right;
                margin-bottom: 15px;
            }
            .panel label.col-md-3 {
                width: 70%;
                font-weight: bold;
            }
            .panel .form-group .col-md-9.auto_holder {
                float: none;
                width: 85%;
            }
            .panel p {
                font-weight: bold;
                text-indent: 15px;
                font-size: 20px;
                margin-bottom: 25px;
            }
            .panel p label select {
                border: 0px none;
                padding: 4px;
                border-radius: 2px;
            }
            .form-group2 {
                width: 80%;
                margin-left: 40px;
            }
            
            .form-group2.hidden {
                    float: right;
                    clear: both;
            }
            .col-md-9.button {
                background-color: #aaa;
                right: -25px;
                color: #fff;
                border-radius: 5px;
                cursor: pointer;
            }
            ul#spouse, ul#Dependants, ul#Business, ul#Property {
                list-style: none;
                clear: both;
                display: none;
                width: 95%;
                text-align: left;
                margin-left: -24px;
            }
            li.inline {
                display: inline-block;
                text-align: left;
                float: left;
                width: 22%;
                margin-right:2px;
            }
            li.inline label {
                float: left;
                clear: both;
                display: block;
            }
            #spouse li.block, #Dependants li.block, #Business li.block, #Property li.block {
                background-color: #ededed;
                padding: 5px 5px 30px;
                height: 60px;
                margin-bottom: 2px;
            }
            .panel #spouse input, .panel #spouse select, .panel #Dependants input, .panel #Dependants select, .panel #Property input, .panel #Property select, .panel #Business input, .panel #Business select {
                width: 100%;
                float: none;
                clear: both;
                display: block;
                position: relative;
                left: 0px;
            }
            ul#spouse > li > ul, ul#Dependants > li > ul, ul#Property > li > ul, ul#Business > li > ul {
                width: 100%;
                margin-left: -30px;
            }
            #Property li.inline:first-child, #Business li.inline:first-child {
                width: 75%;
            }
            .upload-box {
                position: relative;
                margin-top: 50px;
                font-size: 16px;
                padding-top: 30px;
                height: 20px;
                min-height: 40px;
                line-height: 40px;
                display: block;
                clear: both;
                color: #666;
                font-weight: bold;
                vertical-align: top;
                padding: 0px 0px 20px;
            }
.upload-box {
    position: relative;
    margin-top: 0px;
    font-size: 16px;
    padding-top: 30px;
    height: 38px;
    min-height: 40px;
    line-height: 40px;
    display: block;
    clear: both;
    color: #666;
    font-weight: bold;
    vertical-align: top;
    padding: 0px 0px 20px;
    float: right;
    margin-right: 48px;
    margin-top: 0px;
    margin-bottom: 32px;
}
#spouse_docs, #property_docs, #home_business_docs {
    position: relative;
    margin-top: 0px;
    font-size: 16px;
    padding-top: 30px;
    height: auto;
    min-height: 40px;
    line-height: 40px;
    display: block;
    clear: both;
    color: #666;
    font-weight: bold;
    vertical-align: top;
    padding: 0px 0px 20px;
    float: right;
    margin-right: 48px;
    margin-top: 0px;
    margin-bottom: 32px;
    height: auto;
    margin-bottom: -50px;
}
.panel .form-group .col-md-9.name {
    width: 250px;
    float: right;
    margin-right: 73px;
    margin-top: -34px;
    clear: right;
    margin-bottom: 15px;
}
.qq-upload-button {
    display: block;
    width: 105px;
    padding: 0px 0 20px;
    text-align: center;
    background: #880000;
    border-bottom: 1px solid #DDD;
    color: #FFF;
    height: 38px;
    border-radius: 5px;
    float: right;
    font-size: 10px;
}
#property_docs, #home_business_docs, #spouse_docs {
    display: none;
    position: relative;
    top: -51px;
    left: -2px;
}
#spouse {
    background-color: #ededed;
    padding: 5px 5px 30px;
    height: 102px;
    margin-bottom: 2px;
    display:none;
}
div#spouse_docs {
    top: -35px;
}
.panel .name input {
    width: 200px;
}
.qq-upload-list li {
    margin: 0;
    padding: 0px;
    line-height: 15px;
    font-size: 11px;
    background-color: #FFF0BD;
}
.upload-box {
    position: relative;
    margin-top: 0px;
    font-size: 16px;
    padding-top: 30px;
    height: 38px;
    min-height: 40px;
    line-height: 40px;
    display: block;
    clear: both;
    color: #666;
    font-weight: bold;
    vertical-align: top;
    padding: 0px 0px 20px;
    float: right;
    margin-right: 48px;
    margin-top: 0px;
    margin-bottom: 32px;
    width: 100%;
    height: auto;
}
.upload-box ul {
    float: left;
    list-style: none;
    background-color: #ccc;
    margin-left: 60px;
    padding: 0px 5px;
}
.upload-box ul li {
    display: inline-block;
    border-right: 2px solid #fff;
    font-size: 10px;
    padding-right: 5px;
    padding-left: 5px;
    /* border-bottom: 2px solid #fff; */
    line-height: 12px;
    height: 100%;
    padding-top: 16px;
}
.upload-box ul li:last-child {
  border-right:unset;
  }
.upload-box i.fa.fa-trash {
    position: relative;
    top: 9px;
    font-size: 15px;
    float: right;
    margin-bottom: 10px;
}
input.disabled, select.disabled {
background-color:#666!important;
color:#fff;
}
        </style>    
   
    <div class="panel" alt="Bookkeeping" id="panel_0">
       <p>Bookkeeping<label>Enable <?php
                    $options = array(
                            ''         => 'No',
                            '1'         => 'Yes',
                            
                            
                    );

                    $attrs = array( 'class' => 'choose_services', 'alt' => 'Bookkeeping');
                    echo form_dropdown('services[Bookkeeping]', $options, $model_info->Bookkeeping->bookkeeping, $attrs);
                    ?></label></p>
            <div class="form-group">
                <label for="title" class=" col-md-3">How many bank accounts and credit cards do you use for your business? </label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "num_accounts",
                        "name" => "num_accounts",
                        "value" => $model_info->Bookkeeping->num_accounts,
                        "class" => "form-control",
                        'max' => 10,
                        'min' => 1,
                        "placeholder" => '# Accounts',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class=" col-md-3">What is your average monthly expenses? </label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "expenses",
                        'type' => 'number',
                        "name" => "expenses",
                        "value" => $model_info->Bookkeeping->expenses,
                        "class" => "form-control",
                        "placeholder" => '$ Expenses',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class=" col-md-3">Do you currently use an accounting system?</label>
                <div class=" col-md-9">
                     <?php
                    $options = array(
                            'quickbooks'           => 'Quickbooks',
                            'xero'           => 'Xero',
                            'freshbooks'     => 'Freshbooks',
                            ''           => 'None'
                           
                    );


                    echo form_dropdown('accounting_system', $options, $model_info->Bookkeeping->accounting_system);
                    ?>
                </div>
            </div>
            <input type="hidden" id="Bookkeeping_price" value="<?php echo @$model_info->Bookkeeping->price; ?>" class="price" />
            
    </div>
    <div class="panel" alt="Payroll"  id="panel_1">
       <p>Payroll<label>Enable <?php
                    $options = array(
                            ''         => 'No',
                            '1'         => 'Yes',
                            
                            
                    );

                    $attrs = array( 'class' => 'choose_services', 'alt' => 'Payroll');
                    echo form_dropdown('services[Payroll]', $options, $model_info->Payroll->payroll, $attrs);
                    ?></label></p>
           <div class="form-group">
                <label for="title" class=" col-md-3"> How often do you pay your employees? </label>
                <div class=" col-md-9">
                    <?php
                    $options = array(
                            
                            '1'     => 'Bi-Weekly',
                            '0'     => 'Monthly',
                           
                           
                    );


                    echo form_dropdown('payment_interval', $options);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class=" col-md-3">How many employees do you have? </label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "num_employees",
                        "name" => "num_employees",
                        'type' => 'number',
                        "value" => $model_info->Payroll->num_employees,
                        "class" => "form-control",
                        "placeholder" => '# Employees',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class=" col-md-3">Which pay types do you provide?</label>
                <div class=" col-md-9">
                    <?php
                    $options = array(
                            'Hourly'           => 'hourly',
                            'Salary'           => 'salary',
                            'Tips'             => 'tips',
                            'Commission'       => 'commission',
                            'Reimbursment'     => 'reimbursment'
                            
                    );


                    echo form_dropdown('pay_types', $options, $model_info->Payroll->pay_types);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class=" col-md-3">Do you have a retirement plan? </label>
                <div class=" col-md-9">
                    <?php
                     $options = array(
                            '0'         => 'No',
                            '1'         => 'Yes',
                            
                            
                    );


                    echo form_dropdown('retirement', $options, $model_info->Payroll->retirement);
                    ?>
                </div>
            </div>
            <div class="form-group ">
                <label for="title" class=" col-md-3">What deductions do you have?</label>
                <div class=" col-md-9 auto_holder">
                    <div id="deductions_types" name="deductions_types"></div>
                </div>
            </div>
           <input type="hidden" id="Payroll_price" value="<?php echo $model_info->Payroll->price; ?>" class="price" />
    </div>
    <div class="panel" alt="Taxes" id="panel_2">
        <p>Taxes<label>Enable <?php
                      $options = array(
                            ''         => 'No',
                            '1'         => 'Yes',
                            
                            
                    );
                    

                    $attrs = array( 'class' => 'choose_services', 'alt' => 'Taxes');
                    echo form_dropdown('services[Taxes]', $options, $model_info->Taxes->taxes, $attrs);
                    ?></label>
        </p>
            <div class="form-group">
               
               
                    <label for="title" class=" col-md-3">Business or personal taxes? </label>
                    <div class=" col-md-9">
                        <select id="taxes_b" name="taxes_b">
                            <option value="bus" <?php if($model_info->Taxes->taxes_b == 'bus') { ?> selected<?php } ?>>Business</option>
                            <option value="per" <?php if($model_info->Taxes->taxes_b == 'per') { ?> selected<?php } ?>>Personal</option>
                            <option value="both" <?php if($model_info->Taxes->taxes_b == 'both') { ?> selected<?php } ?>>Both</option>
                        </select>
                    </div>
                </div>
         
            <div class="form-group2 hidden" id="bus_taxes">
              <div class="form-group">
                 <label for="title" class=" col-md-3 ">Incorpoated as? </label>
                    <div class=" col-md-9">
                        <?php
                      
                        $options = array(
                                'S-Corp'           => 'S Corporation',
                                'C-Corp'           => 'C Corporation',
                                'Partnership'      => 'Partnership',
                        );


                        echo form_dropdown('corp_type', $options, $model_info->Taxes->corp_type, 'id="corp_type"');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class=" col-md-3">Average Annual Income? </label>
                    <div class=" col-md-9">
                         <?php
                            echo form_input(array(
                                "id" => "bus_annual_income",
                                "name" => "bus_annual_income",
                                'type' => 'number',
                                "value" => $model_info->Taxes->bus_annual_income,
                                "class" => "form-control",
                                "placeholder" => 'Income',
                                "autofocus" => true,
                                "data-rule-required" => true,
                                "data-msg-required" => lang("field_required"),
                            ));
                            ?>
                    </div>
                </div>
                <div class="upload-box " alt="businsess docs" id="business_docs"><div class="qq-upload-button">P&L Statements</div></div>
            </div>
            <div class="form-group2 hidden" id="per_taxes">
                <div class="form-group">
                    <label for="title" class=" col-md-3">Your Name? </label>
                    <div class=" col-md-9 name">
                         <?php
                            echo form_input(array(
                                "id" => "company_name",
                                "name" => "company_name",
                                'type' => 'text',
                                "value" => $model_info->user->company_name,
                                "class" => "form-control",
                                "placeholder" => 'Name',
                                "autofocus" => true,
                                "data-rule-required" => true,
                                "data-msg-required" => lang("field_required"),
                            ));
                            ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class=" col-md-3">Your SSN? </label>
                    <div class=" col-md-9 name">
                         <?php
                            echo form_input(array(
                                "id" => "ssn",
                                "name" => "ssn",
                                'type' => 'text',
                                "value" => $model_info->user->ssn,
                                "class" => "form-control ssn",
                                "placeholder" => 'xxx-xx-xxxx',
                                "autofocus" => true,
                                "data-rule-required" => true,
                                "data-msg-required" => lang("field_required"),
                            ));
                            ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="title" class=" col-md-3">Your Birth Date? </label>
                    <div class=" col-md-9 name">
                         <?php
                            echo form_input(array(
                                "id" => "dob",
                                "name" => "dob",
                                'type' => 'text',
                                "value" => $model_info->user->dob,
                                "class" => "form-control dob",
                                "placeholder" => 'yyyy-mm-dd',
                                "autofocus" => true,
                                "data-rule-required" => true,
                                "data-msg-required" => lang("field_required"),
                            ));
                            ?>
                    </div>
                    <div class="upload-box" alt="personal" id="personal_docs"><div class="qq-upload-button">W2, 1099, Etc</div></div>
                </div>
                <div class="form-group">
                    <label for="title" class=" col-md-3">Enter Spouse </label>
                    <div class=" col-md-9 button" onclick="add_spouse();">
                         Filing Jointly
                    </div>
                    <ul id="spouse">
                    <?php
                       $l = 0;
                       if(!empty($model_info->Taxes->spouse->name)){
                       ?>
                            <li class="block" alt="record_<?php echo $model_info->Taxes->spouse->id; ?>"><ul><li class="inline"><label>Name</label><input id="spouse_name" name="spouse_name" value="<?php echo @$model_info->Taxes->spouse->name; ?>" type="text" /></li><li class="inline"><label>SSN</label><input id="spouse_ssn" name="spouse_ssn" class="ssn" value="<?php echo @$model_info->Taxes->spouse->ssn;?>" /></li><li class="inline"><label>DOB</label><input id="spouse_dob" name="spouse_dob" class="dob" value="<?php echo @$model_info->Taxes->spouse->dob; ?>" /></li><li class="inline"><label>Filing Jointly</label><select name="jointly" id="jointly"><option value="1" <?php if($model_info->Taxes->jointly==1){ echo 'selected'; } ?>>Yes</option><option value=""  <?php if($model_info->Taxes->jointly!=1){ echo 'selected'; } ?>>No</option></select></li></ul><i class="fa fa-trash" onclick="delete_record(<?php echo $model_info->Taxes->spouse->id; ?>);"></i></li>
                         <script>$('#spouse, #spouse_docs').css('display', 'block');</script>
                       <?php
                       }
                    ?>
                    
                    </ul>
                    <div class="upload-box" alt="spouse" id="spouse_docs"><div class="qq-upload-button">W2, 1099, Etc</div></div>
                </div>
                <div class="form-group">
                    <label for="title" class=" col-md-3">Dependants </label>
                    <div class=" col-md-9 button" onclick="add_dependant();">
                         Add Dependant
                    </div>
                    <ul id="Dependants">
                    <?php
                       $l = 0;
                       foreach($model_info->Taxes->dependants as $D => $Dependant){
                       ?>
                         <li class="block" id="Dependant_box_<?php echo $l; ?>" alt="record_<?php echo $Dependant->id; ?>"><ul><li class="inline"><label>Name</label><input id="dependant_name<?php echo $l; ?>" name="dependant[name][<?php echo $l; ?>]" value="<?php echo $Dependant->name; ?>" type="text" /></li><li class="inline"><label>SSN</label><input id="dependant_ssn<?php echo $l; ?>" name="dependant[ssn][<?php echo $l; ?>]" value="<?php echo $Dependant->ssn; ?>" class="ssn" /></li><li class="inline"><label>DOB</label><input id="dependant_dob<?php echo $l; ?>" name="dependant[dob][<?php echo $l; ?>]" value="<?php echo $Dependant->dob; ?>" class="dob" /></li></ul><i class="fa fa-trash" onclick="delete_record(<?php echo $Dependant->id; ?>);"></i></li>
                         <script>$('#Dependants').css('display', 'block');</script>
                       <?php
                       }
                    ?>
                    
                    </ul>
                  
                </div>
                <div class="form-group">
                    <label for="title" class=" col-md-3">Property </label>
                    <div class=" col-md-9 button" onclick="add_property();">
                         Add Property
                    </div>
                    <ul id="Property">
                    <?php
                       $l = 0;
                       foreach($model_info->Taxes->propertys as $D => $Property){
                       ?>
                         <li class="block" id="Property_box_<?php echo $l; ?>" alt="record_<?php echo $Property->id; ?>"><ul><li class="inline"><label>Address</label><input id="property_name<?php echo $l; ?>" name="property[name][<?php echo $l; ?>]" value="<?php echo $Property->name; ?>" type="text" /></li></ul><i class="fa fa-trash" onclick="delete_record(<?php echo $Property->id; ?>);"></i></li>
                         <script>$('#Property').css('display', 'block');</script>
                       <?php
                       }
                    ?>
                    </ul>
                    <div class="upload-box " alt="property" id="property_docs"><div class="qq-upload-button">Property Documents</div></div>
                </div>
                 <div class="form-group">
                    <label for="title" class=" col-md-3">Small Business </label>
                    <div class=" col-md-9 button" onclick="add_business();">
                         Add Business
                    </div>
                    <ul id="Business">
                    <?php
                       $l = 0;
                       foreach($model_info->Taxes->businesses as $D => $Property){
                       ?>
                         <li class="block" id="Business_box_<?php echo $l; ?>" alt="record_<?php echo $Property->id; ?>"><ul><li class="inline"><label>Address</label><input id="business_name<?php echo $l; ?>" name="business[name][<?php echo $l; ?>]" value="<?php echo $Property->name; ?>" type="text" /></li></ul><i class="fa fa-trash" onclick="delete_record(<?php echo $Property->id; ?>);"></i></li>
                         <script>$('#Business').css('display', 'block');</script>
                       <?php
                       }
                    ?>
                    </ul>
                    <div class="upload-box " alt="home business" id="home_business_docs"><div class="qq-upload-button">P&L Statements</div></div>
                </div>
            </div>
            <input type="hidden" id="Taxes_price" value="<?php echo $model_info->Taxes->price; ?>" class="price"/>
    </div>
     
            
</div>
 
<div class="modal-footer">
            <div class="form-group">
                <label for="title" class=" col-md-3">Subscription Price</label>
                <div class=" col-md-9">
                   <input type="text" disabled id="price" />
                </div>
            </div>
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    function add_spouse(){
      if($('#spouse li').length==0){
        html = '<li class="block" id="entry_0"><ul><li class="inline"><label>Name</label><input id="spouse_name" name="spouse_name" value="<?php echo @$model_info->Taxes->spouse->name; ?>" type="text" /></li><li class="inline"><label>SSN</label><input id="spouse_ssn" name="spouse_ssn" class="ssn" value="<?php echo @$model_info->Taxes->spouse->ssn;?>" /></li><li class="inline"><label>DOB</label><input id="spouse_dob" name="spouse_dob" class="dob" value="<?php echo @$model_info->Taxes->spouse->dob; ?>" /></li><li class="inline"><label>Filing Jointly</label><select name="jointly" id="jointly"><option value="1" <?php if($model_info->Taxes->jointly==1){ echo 'selected'; } ?>>Yes</option><option value=""  <?php if($model_info->Taxes->jointly!=1){ echo 'selected'; } ?>>No</option></select></li></ul><i class="fa fa-trash" onclick="delete_spouse(0);"></i></li>';
        $('#spouse').html(html);
        $('.ssn').mask('000-00-0000');
        $('.dob').mask('0000-00-00');
        $('#spouse_docs, #spouse').css('display', 'block');
      
      }
    
    }
    function add_dependant(){
     l = $('ul#Dependants > li > ul').length;
       html = '<li class="block" id="Dependant_box_' + l + '"><ul><li class="inline"><label>Name</label><input id="dependant_name' + l + '" name="dependant[name][' + l + ']" value="" type="text" /></li><li class="inline"><label>SSN</label><input id="dependant_ssn' + l + '" name="dependant[ssn][' + l + ']" value="" class="ssn" /></li><li class="inline"><label>DOB</label><input id="dependant_dob" name="dependant[dob][' + l + ']" value="" class="dob" /></li></ul><i class="fa fa-trash" onclick="delete_dependant(' + l + ');"></i></li>';
        $('#Dependants').append(html);
      $('.ssn').mask('000-00-0000');
        $('.dob').mask('0000-00-00');
        $('#Dependants').css('display', 'block');
    }
    function add_property(){
      l = $('ul#Property > li > ul').length;
      html = '<li class="block" id="Property_box_' + l + '"><ul><li class="inline"><label>Address</label><input id="property_name' + l + '" name="property[name][' + l + ']" value="" type="text" /></li></ul><i class="fa fa-trash" onclick="delete_property(' + l + ');"></i></li>';
      $('#Property').append(html);
      $('#property_docs, #Property').css('display', 'block');
    }
    function add_business(){
      l = $('ul#Business > li > ul').length;
      html = '<li class="block" id="Business_box_' + l + '"><ul><li class="inline"><label>Name</label><input id="business_name' + l + '" name="business[name][' + l + ']" value="" type="text" /></li></ul><i class="fa fa-trash" onclick="delete_business(' + l + ');"></i></li>';
       $('#Business').append(html);
       $('#home_business_docs, #Business').css('display', 'block');
    }
    function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    function eraseCookie(name) {   
        document.cookie = name+'=; Max-Age=-99999999;';  
    }
    function change_prices(data,text, next){
    data['client_id'] = '<?php echo $model_info->client_id; ?>';
    data['deductions'] = [];
      $('.select2-search-choice div').each(function(i, item){
        data['deductions'][i] = item;
      
      });
    eraseCookie(text);
    createCookie(text, 1, 5);
    console.log(data)
      $.ajax({
                   url: 'prices',
                   data: data,
                   success: function(response){
                      if(response.error){
                      $('#project-form .btn.btn-primary').attr('disabled', true);
                    
                         $.each(response.error, function(i, item){
                            pre_elem = '.panel[alt="' + i +  '"]';
                            $.each(response.error[i], function(a, array){
                               msg = array.msg;
                              
                               elem = pre_elem + ' ' + '#' + array.field;
                              // alert(elem)
                               if($(elem).parent().parent().find('.error').length==0){
                                $(elem).parent().parent().append('<span class="error">' + msg + '</span>');
                               }else{
                               
                               
                               }
                            });
                         });
                       }else{
                       
                       $('#project-form .btn.btn-primary').attr('disabled', false);
                            $('div.panel.active .price').val(response.prices.total);
                        
                            total = 0;
                            $('div.panel .price').each(function(i, item){
                       
                              total = (total + parseInt($(this).val()));
                             
                            
                            })
                            t=0;
                            $('.choose_services').each(function(i, item){
                               if($(this).val()==1){
                                 t++;
                               }  
                            });
                            if(t>=2){
                              total = Math.ceil(total - ( total * .1)); 
                            }
                            $('#price').val('$' + total);
                             $('.panel .error').remove();
                            if(next ==true){
                                    $('.panel').removeClass('active');
                                   
                                    $('.next').removeClass('active').css('background-image', 'url("/dashboard/assets/images/arrow_gradient_red_right.png");');
                                
                                
                                    arrow.addClass('active').css('background-image', 'url("/dashboard/assets/images/arrow_gradient_green_right.png");');
                                    $('.panel[alt="' + text + '"]').addClass('active').addClass('shown');
                            }
                       
                       }
                  }
               });   
     }          
    $(document).ready(function () {
    eraseCookie('Bookkeeping');
    createCookie('Bookkeeping', 1, 5);
    if(getCookie('Bookkeeping')==1){
      $('.panel[alt="Bookkeeping"]').addClass('shown');
    }
    if(getCookie('Payroll')==1){
      $('.panel[alt="Payroll"]').addClass('shown');
    }
    if(getCookie('Taxes')==1){
      $('.panel[alt="Taxes"]').addClass('shown');
    
    }
    
    $('.ssn').mask('000-00-0000').prop('placeholder', 'xxx-xx-xxxx');
    $('.dob').mask('0000-00-00').prop('placeholder', 'yyyy-mm-dd');
    $('.choose_services').bind('change', function(i, item){
        var   text = $(this).attr('alt');
           
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
        
        if($(this).val()!=1){
         
           $('.panel[alt="' + text + '"] input, .panel[alt="' + text + '"] select').prop('disabled', true).addClass('disabled');
           $('.panel[alt="' + text + '"] .price').val(0);
           $('.choose_services[alt="' + text + '"]').removeClass('disabled').prop('disabled', false);
        }else{
           $('.panel[alt="' + text + '"] input, .panel[alt="' + text + '"] select').prop('disabled', false).removeClass('disabled');
        }  
        change_prices(data,text);
      });
    total = 0;
                            $('div.panel .price').each(function(i, item){
                       
                              total = (total + parseInt($(this).val()));
                             
                            
                            })
                            t=0;
                            $('.choose_services').each(function(i, item){
                               if($(this).val()==1){
                                 t++;
                               }  
                            });
                            if(t>=2){
                              total = Math.ceil(total - ( total * .1)); 
                            }
                            $('#price').val('$' + total);
      
      $('#deductions_types').select2({
            minimumInputLength: 2,
            tags: [],
            ajax: {
                url: 'http://accountingjet.com/dashboard/index.php/projects/deduction_types',
                dataType: 'json',
                type: "GET",
                quietMillis: 50,
                data: function (term) {
                    return {
                        term: term
                    };
                },
                results: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.type,
                                slug: item.type,
                                id: item.type
                            }
                        })
                    };
                }
            }
        });
        $('#corp_type, #taxes_b').bind('change', function(){
          var   text = 'Taxes';
               
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
                change_prices(data,text);
        });
        $('#corp_type option, #taxes_b option').bind('click', function(){
          var   text = 'Taxes';
               
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
                change_prices(data,text);
        });
        $('#bus_annual_income, #company_name, #ssn, #dob').bind('change keyup click', function(){
                var   text = 'Taxes';
               
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
                change_prices(data,text);
        
        });
         $('#num_employees, #payment_interval, #pay_types, #retirement').bind('change keyup blur', function(){
                var   text = 'Payroll';
               
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
                change_prices(data,text);
        
        });
        $('#num_accounts, #expenses').bind('change keyup', function(){
                var   text = 'Bookkeeping';
               
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
                change_prices(data,text);
        
        });
        $('#taxes_b option').bind('click', function(){
          type = $('#taxes_b option:selected').val();
          
            $('.form-group.hidden').attr('style', 'display:none!important')
            switch(type){
                case('bus'):
                    $('#' + type + '_taxes').attr('style', 'display:block!important');
                break;
                case('per'):
                    $('#' + type + '_taxes').attr('style', 'display:block!important');
                break;
                case('both'):
                    $('.form-group2.hidden').attr('style', 'display:block!important');
                    
                break;
            }
                $('#panel_2 p label select').val(1);
                var   text = 'Taxes';
               
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
                change_prices(data,text);
        });
        $('.panel[alt="Bookkeeping"]').addClass('active');
        $('li.next:first-child').addClass('active').addClass('shown');
        $('.panel.active input').bind('blur change', function(){
          if($(this).val() != ''){
            $('.panel.active p label select').val('1');
          }
        });
        $('.next').bind('click', function(){
            var   text = $(this).find('b').text();
            arrow = $(this);
                                
                data  = {};
                
                $('div.panel.active input, div.panel.active select').each(function(i, item){
                        if($(this).attr('name') != undefined){ data[$(this).attr('name')] = $(this).val(); }
                });
            
            change_prices(data, text, 1);
        });
       /* $("#project-form").appForm({
            onSuccess: function (result) {
                if (typeof RELOAD_PROJECT_VIEW_AFTER_UPDATE !== "undefined" && RELOAD_PROJECT_VIEW_AFTER_UPDATE) {
                    location.reload();
                } else if (typeof RELOAD_VIEW_AFTER_UPDATE !== "undefined" && RELOAD_VIEW_AFTER_UPDATE) {
                    RELOAD_VIEW_AFTER_UPDATE = false;
                    window.location = "<?php echo site_url('projects/view'); ?>/" + result.id;
                } else {
                    $("#project-table").appTable({newData: result.data, dataId: result.id});
                }
            }
        });*/
        $("#title").focus();
        $("#project-form .select2").select2();

        setDatePicker("#start_date, #deadline");

        $("#project_labels").select2({
            tags: <?php echo json_encode($label_suggestions); ?>
        });
    });
</script>    
    <script>  
        function delete_file(id, type){
        $.ajax({
                    url: 'delete_client_files', 
                    data: { client_id: '<?php echo $model_info->client_id; ?>', id: id, type: type },
                    dataType: 'json',
                    success: function(response){
                      $('#' + id + ' ul').html('');
                      $.each(response, function(i, item){
                        $('#client_files_' + id).remove();
                        $('#' + id + ' ul').append('<li id="client_files_' + item.id + '">' + item.filename + '<i class="fa fa-trash" onclick="delete_file(' + item.id + ', \'' + type + '\');"></i></li>')
                      
                      });
                      
                    }
             });       
        
        }
        function delete_spouse(l){
           if($('#spouse #entry_' + l).length==1){
             $('#spouse #entry_' + l).parent().css('display', 'none');
           }
           $('#spouse #entry_' + l).remove()
           $('.upload-box[alt="spouse"]').css('display', 'none')
        }
        function delete_business(l){
           if($('#Business_box_' + l).length==1){
             $('#Business_box_' + l).parent().css('display', 'none');
           }
           $('#Business_box_' + l).remove()
           $('.upload-box[alt="home_business"]').css('display', 'none')
        }
        function delete_dependant(l){
           if($('#Dependant_box_' + l).length==1){
             $('#Dependant_box_' + l).parent().css('display', 'none');
           }
           $('#Dependant_box_' + l).remove()
        }
        function delete_property(l){
           if($('#Property_box_' + l).length==1){
             $('#Property_box_' + l).parent().css('display', 'none');
           }
           $('#Property_box_' + l).remove()
           $('.upload-box[alt="property"]').css('display', 'none')
        }
        function delete_record(id){
            $.ajax({
                    url: 'delete_record', 
                    data: { client_id: '<?php echo $model_info->client_id; ?>', id: id},
                   
                    success: function(response){
                      if($('li[alt="record_' + id  + '"]').length==1){
                        $('li[alt="record_' + id  + '"]').parent().css('display', 'none');
                      } 
                      $('li[alt="record_' + id  + '"]').remove();
                      
                      
                    }
             });          
        
        }
        function load_files(alt, id){
          if($('#' + id + ' ul').length==0){
            $('#' + id ).prepend('<span style="display:none!important;"><input type="file" style="display:none!important;" /></span><ul></ul>');
          }
          $.ajax({
                    url: 'client_files', 
                    data: { client_id: '<?php echo $model_info->client_id; ?>', type: alt },
                    dataType: 'json',
                    success: function(response){
                      $('#' + id + ' ul').html('');
                      $.each(response, function(i, item){
                        $('#' + id + ' ul').append('<li id="client_files_' + item.id + '">' + item.filename + '<i class="fa fa-trash" onclick="delete_file(' + item.id + ', \'' + alt + '\');"></i></li>')
                      
                      });
                      
                    }
             });       
        }
       $(document).ready(function(ui){
       
       $('.choose_services').each(function(ui){
       text = $(this).attr('alt');
       if($(this).val()!=1){
         
           $('.panel[alt="' + text + '"] input, .panel[alt="' + text + '"] select').prop('disabled', true).addClass('disabled');
           $('.panel[alt="' + text + '"] .price').val(0);
           $('.choose_services[alt="' + text + '"]').removeClass('disabled').prop('disabled', false);
        }else{
           $('.panel[alt="' + text + '"] input, .panel[alt="' + text + '"] select').prop('disabled', false).removeClass('disabled');
        }  
    });
         $('.upload-box').each( function(ui){
        
            load_files($(this).attr('alt'), $(this).attr('id'))
            
            
            $('#' + $(this).attr('id') + ' .qq-upload-button').on('click', function() {
              var alt = $(this).parent().attr('alt');
              var id  = $(this).parent().attr('id');
                $('#' + id + ' input[type="file"]' ).click()
                 $('#' + id + ' input[type="file"]' ).change(function(){
                file_data = $('#' + id + ' input[type="file"]' ).prop('files')[0];   
                        var form_data = new FormData();                  
                        form_data.append('file', file_data);
                        form_data.append('client_id', '<?php echo $model_info->client_id; ?>');
                        form_data.append('type', alt)                            
                        $.ajax({
                            url: 'uploader', // point to server-side PHP script 
                            dataType: 'text',  // what to expect back from the PHP script, if anything
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,                         
                            type: 'post',
                            success: function(response){
                              if(!response.error){
                            //    alert(php_script_response); // display response from the PHP script, if any
                                load_files(alt, id)
                              }else{
                                 alert(response.error);
                              }   
                              $('#' + id + ' input[type="file"]' ).replaceWith('<input type="file" style="display:none;" />');
                            }
                        });
                   })     
            });
          })
       });
    </script>    
  
