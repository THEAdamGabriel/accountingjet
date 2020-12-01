<?php echo validation_errors(); ?>
<?php echo form_open("javascript: send_ajax2('http://accountingjet.com/dashboard/index.php/projects/blockscore');", array("id" => "client-form", "class" => "general-form", "role" => "form")); ?>
<input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
<input type="hidden" name="view" value="<?php echo isset($view) ? $view : ""; ?>" />
<div class="modal-body clearfix">
<div class="form-group">
    <label for="first_name" class="<?php echo $label_column; ?>"><?php echo lang('first_name'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "first_name",
            "name" => "first_name",
            "value" => $model_info->first_name,
            "class" => "form-control",
            "placeholder" => lang('first_name'),
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="middle_name" class="<?php echo $label_column; ?>">Middle Name</label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "middle_name",
            "name" => "middle_name",
            "value" => $model_info->middle_name,
            "class" => "form-control",
            "placeholder" => 'Middle Name or Initial',
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="last_name" class="<?php echo $label_column; ?>"><?php echo lang('last_name'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "last_name",
            "name" => "last_name",
            "value" => $model_info->last_name,
            "class" => "form-control",
            "placeholder" => lang('last_name'),
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>

<div class="form-group">
    <label for="dob" class="<?php echo $label_column; ?>">Birth Date</label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "dob",
            "name" => "dob",
            "value" => $model_info->dob ? $model_info->dob : "",
            "class" => "form-control dob",
            "placeholder" => 'SSN',
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>

    </div>
</div>
<div class="form-group">
    <label for="ssn" class="<?php echo $label_column; ?>">SSN</label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "ssn",
            "name" => "ssn",
            "value" => $model_info->ssn ? $model_info->ssn : "",
            "class" => "form-control",
            "placeholder" => 'SSN',
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>

    </div>
</div>
<div class="form-group">
    <label for="address" class="<?php echo $label_column; ?>"><?php echo lang('address'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "address",
            "name" => "address",
            "value" => $model_info->address ? $model_info->address : "",
            "class" => "form-control",
            "placeholder" => lang('address'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>

    </div>
</div>
<div class="form-group">
    <label for="city" class="<?php echo $label_column; ?>"><?php echo lang('city'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "city",
            "name" => "city",
            "value" => $model_info->city,
            "class" => "form-control",
            "placeholder" => lang('city'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="state" class="<?php echo $label_column; ?>"><?php echo lang('state'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "state",
            "name" => "state",
            "value" => $model_info->state,
            "class" => "form-control",
            "placeholder" => lang('state'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="zip" class="<?php echo $label_column; ?>"><?php echo lang('zip'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "zip",
            "name" => "zip",
            "value" => $model_info->zip,
            "class" => "form-control",
            "placeholder" => lang('zip'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>

<div class="form-group">
    <label for="phone" class="<?php echo $label_column; ?>"><?php echo lang('phone'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "phone",
            "name" => "phone",
            "value" => $model_info->phone,
            "class" => "form-control",
            "placeholder" => lang('phone'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>


</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>


