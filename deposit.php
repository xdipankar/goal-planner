<?php include"dm/app-header.php" ?>
<title>Deposit Record | <?php echo $dm_name ?></title>
<!-- ..........Start........ -->

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="modal-header">
          <h3 class="text-primary"><i class="ft-gift text-danger mr-2"></i>Deposit Records</h3>
          <?php $apage = array('id'=>'','email'=>'');?>
           <script>var page_0 = <?php echo json_encode($apage)?></script>
             <a data="page_0" class="model_form btn dbtn-success dbtn-glow" href="#"><i class="ft-plus text-white"></i></a> 
        </div>
        
        <div id="load-result" class="table-responsive"></div>
        <p>NOTE : You cannot Delete or Edit Record if it is Already Used.</p>
      </div>
    </div>
  </div>
</div>
  <!-- Form modal -->
  <section id="multiple-validation" class="auth-height">
  <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header gradient-purple-bliss"> 
          <h4 class="modal-title text-white"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add </span> Deposit Entry</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span id="pop_title" class="ft-x text-white"> </span> </button>
        </div>
        <!-- Form inside modal -->
        <form method="post" action="" id="cat_form"><!-- 
          <form method="post" action="accountdm.php" id="cat_form"> -->
          <div class="modal-body with-padding">
                  <div class="form-group">
                        <label for="txtLastNameBilling" class="col-form-label">Goal </label>
                        <div class="">
                <select name="goal" id="goal" class="form-control" required="">
                           <?php
                          $sql="SELECT * FROM goal where userid='$dm_id'";
                          $result=mysqli_query($con,$sql);
                          ?>
                          <?php
                            while($rows=mysqli_fetch_array($result)){
                            ?>
                          <option value="<?php echo $rows['id']; ?>"><?php echo $rows['gname']; ?></option>
                        <?php } ?>
                          </select>
                          </div>
                    </div>
                <div class="form-group">
                    <div class="controls">
                      <label for="amount" class="col-form-label">Deposit Date</label>
                      <input type="date" name="date" id="date" class="form-control mb-2" >
                    </div>
                  </div>
                
                <div class="form-group">
                        <label for="txtLastNameBilling" class="col-form-label">Account </label>
                        <div class="">
                <select name="account" id="account" class="form-control" required="">
                           <?php
                          $sql="SELECT * FROM uia where userid='$dm_id'";
                          $result=mysqli_query($con,$sql);
                          ?>
                          <?php
                            while($rows=mysqli_fetch_array($result)){
                            ?>
                          <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                        <?php } ?>
                          </select>
                          </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="">
                        <label for="amount" class="col-form-label">Amount</label>
                        <div>
                            <input type="number" class="form-control" name="amount" id="amount" 
                        placeholder="Amount Save/Deposit/Invest For This Goal"  maxlength="10" minlength="2" required=""/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="amount" class="col-form-label">Remarks</label>
                        <div class="controls">
                          <textarea class="form-control" name="remarks" id="remarks" placeholder="Like Transaction Detail" required=""></textarea>
                            
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user" value="<?php echo $dm_id ?>" id="user">
                </div>
          <div class="modal-footer">
            <button class="btn bg-light-info" id="resetbtn" type="button" onclick="resetForm();">Reset</button>
            <button type="button" id="cancel" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <button type="submit" name="form_data" id="form_data" class="btn btn-primary">Submit</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /form modal -->

<script>
function resetForm() {
    document.getElementById("cat_form").reset();
}
</script>

<script>
  $(document).ready(function(){
    
    readProducts(); /* it will load products when document loads */
    
    $(document).on('click', '.delete_check', function(e){
      console.log("You clicked the delete button ");
      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
    });
    
  });
  $(document).on('click','.model_form',function(){
        $('#form_modal').modal({
          keyboard: false,
          show:true,
          backdrop:'static'
        });
        var data = eval($(this).attr('data'));
        $('#id').val(data.id);
        $('#date').val(data.date);;
        $('#amount').val(data.amount);
        $('#goal').val(data.goal);
        $('#account').val(data.account);
        $('#remarks').val(data.remarks);
        
        if(data.id!=""){
      $('#pop_title').html('Edit');
      // $('#gname').attr('readonly','readonly');
      $('#resetbtn').hide();
    }
            
        else{
      $('#pop_title').html('Add');
      // $('#gname').removeAttr('readonly','readonly');
      $('#resetbtn').show();
           
    }
           
    });  
  $(document).on('submit','#cat_form',function(){

       $("#form_data").prop("disabled", true);
       $("#cancel").prop("disabled", true);
       $("#resetbtn").prop("disabled", true);

      // readProducts();
      var url = 'action/deposit.dm.php';
      // $('#logerror').html('<img src="ajax.gif" align="absmiddle"> Please wait...');  
        $.ajax({
        type: 'POST',
        url: url,
        data: $('#cat_form').serialize(), // serializes the form's elements.
        success: function(data)
        { Swal.fire({title:"Success",text:"Account Saved Successfully",type:"success",confirmButtonClass:"btn btn-success",showConfirmButton:true});
            $('#form_modal').modal('toggle');
            $('#form_data').prop('disabled', false);
         $('#cancel').prop('disabled', false);
         $('#resetbtn').prop('disabled', false);
            readProducts();
        }
     });
    return false;
    });
  function SwalDelete(productId){
    
    Swal.fire({
      title:"Are you sure?",
      text:"You won't be able to revert this Process!",
      type:"warning",
      showCancelButton:!0,
      confirmButtonColor:"#2F8BE6",
      cancelButtonColor:"#F55252",
      confirmButtonText:"Yes, delete it!",
      confirmButtonClass:"btn bg-light-danger",
      cancelButtonClass:"btn bg-light-success ml-1",
      buttonsStyling:!1,
      // animation:!1,
      // customClass:"animated tada",
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
                   
           $.ajax({
            url: 'action/deposit.d.php',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'

           })
           .done(function(response){
            // Swal.fire('Deleted!', response.message, response.status);
            Swal.fire({title:"Deleted",text:"Deposit Entry Saved Successfully",type:"success",confirmButtonClass:"btn btn-success",showConfirmButton:true});
            readProducts();
           })
           .fail(function(){
            // Swal.fire('Oops...', 'Something went wrong !', 'error');
            Swal.fire({title:"Error",text:"Unable to Delete Deposit Entry ",type:"error",confirmButtonClass:"btn btn-success",showConfirmButton:true});
           });
           // window.location.reload();
        });

        
        },

        

      allowOutsideClick: false        
    }); 
    
  }
  function readProducts(){
    $('#load-result').load('action/deposit.r.php'); 
  }
</script>

  <script type="text/javascript">
      // checked label active
      $(document).on('click', 'label', function() {
    if($('input:checkbox:checked')) {
        $('input:checkbox:checked', this).closest('label').addClass('active');
    }
});
  </script> 
<!-- ..........End........ -->
<?php include("dm/app-footer.php") ?>