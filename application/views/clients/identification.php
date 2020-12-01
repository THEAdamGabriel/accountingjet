<?php echo form_open("javascript: send_ajax3('" . get_uri("projects/identification") . "')", array("id" => "client-form", "class" => "general-form", "role" => "form")); ?>
 <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="estimate_id" value="<?php echo $model_info->estimate_id; ?>" />
<div class="modal-body clearfix">
    <h4>Please Upload a Picture Id</h4>
    <p>We were unable to verify your details at this time</p>
</div>
<style>
#img { 
    width: 1.6825in;
    height: 1.0625in;
    float: right;
    margin-right: 20px;
    position: relative;
    top: -85px;
    margin: 20px;
}    
.form-group {
    margin-bottom: 15px;
    min-height: 85px;
}
input[type=file] {
    display: block;
    margin-left: 35px;
}
.form-control {
    display: block;
    width: 35%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
</style>    
<script>
 function send_ajax3(url){
      
            $.ajax({
                    url: url,
                    data: $('#client-form').serialize(),
                    type: 'post',
                    success: function(response){
                            $('#ajaxModalContent').html(response)
                    }
             })       
      
    }
function readFile() {
  
  if (this.files && this.files[0]) {
    
    var FR= new FileReader();
    
    FR.addEventListener("load", function(e) {
      document.getElementById("img").src       = e.target.result;
     
      $('.btn.btn-primary').prop('disabled', false);
    }); 
    
    FR.readAsDataURL( this.files[0] );
  }
  
}

document.getElementById("inp").addEventListener("change", readFile);
$('.btn.btn-primary').prop('disabled', true);
</script>

<div class="form-group">

    <div class="<?php echo $field_column; ?>">
       <input type="file" id="inp" class="form-control" />
       <img id="img"  />
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div> 
<?php echo form_close(); ?>
