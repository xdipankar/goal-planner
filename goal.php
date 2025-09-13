<?php include"dm/app-header.php" ?>
<title> My Goal | <?php echo $dm_name ?></title>
<!-- ..........Start........ -->
 <div class="row">

  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card bg-info bg-lighten-4  pull-up">
      <div class="card-content">
        <div class="card-body py-0">
          <div class="media ">
            <div class="media-body info text-left">
                   <?php
                    $query=mysqli_query($con,"select sum(gamount)  as todaysadvance from goal where  (userid='$dm_id');");
                    $result=mysqli_fetch_array($query);
                    $sum_today_expense=$result['todaysadvance'];
                     ?>
                     <h3 class="font-large-1 info mb-0">
                        ₹  <?php if($sum_today_expense==""){
                        echo "0";
                        } else {
                        echo $sum_today_expense;
                        }
                         ?>
                    </h3>
              <span>Target Goal Amount</span>
            </div>
            <div class="media-right info text-right">
              <i class="ft-trending-up font-large-1"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card bg-warning bg-lighten-3  pull-up">
      <div class="card-content">
        <div class="card-body py-0">
          <div class="media">
            <div class="media-body warning text-left">
              <h3 class="font-large-1 warning mb-0">
                  ₹ <?php
                    $query=mysqli_query($con,"select sum(gamount)  as glamount from goal where  (userid='$dm_id');");
                    $query1=mysqli_query($con,"select sum(amount)  as depoditamt from deposit where  (user='$dm_id');");
                    $result=mysqli_fetch_array($query);
                    $result1=mysqli_fetch_array($query1);
                    $sum_glamount=$result['glamount'];
                    $sum_depoditamt=$result1['depoditamt'];
                    $rbalance = ($sum_glamount-$sum_depoditamt);
                    echo $rbalance;
                     ?>
                       
                     </h3>
              <span>Remaining Amount</span>
            </div>
            <div class="media-right warning text-right">
              <i class="ft-activity font-large-1"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card bg-primary bg-lighten-3 pull-up">
      <div class="card-content">
        <div class="card-body py-0">
          <div class="media">
            <div class="media-body primary text-left">
              <h3 class="font-large-1 primary mb-0">
                <?php 
                  $nRows = $pdo->query("select count(*) from goal where status='PENDING' and userid='$dm_id'")->fetchColumn(); 
                  echo $nRows
                  ?>
              </h3>
              <span>Pending Goals</span>
            </div>
            <div class="media-right primary text-right">
              <i class="ft-info primary font-large-1"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card bg-success bg-lighten-3  pull-up">
      <div class="card-content">
        <div class="card-body py-0">
          <div class="media">
            <div class="media-body success text-left">
              <h3 class="font-large-1 success mb-0">
                <?php 
                  $nRows = $pdo->query("select count(*) from goal where status='COMPLETED' and userid='$dm_id'")->fetchColumn(); 
                  echo $nRows
                  ?>
              </h3>
              <span> Achieved Goal</span>
            </div>
            <div class="media-right success text-right">
              <i class="ft-award font-large-1"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="modal-header">
          <h3 class="text-primary"><i class="ft-target text-danger mr-2"></i>Financial Goals</h3>
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
  <div id="form_modal" class="modal fade modal-fixed-footer with-header" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header gradient-purple-bliss">
          <!-- //<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
          <h4 class="modal-title text-white"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add </span> My Financial Goal </h4>
          <button type="button btn-warning" class="close" data-dismiss="modal" aria-hidden="true"><span id="pop_title" class="ft-x text-white"> </span> </button>
        </div>
        <!-- Form inside modal -->
        <form method="post" action="#" id="cat_form">
          <div class="modal-body with-padding">
            
                <div class="form-group">
                    <div class="controls">
                      <label for="amount" class="col-form-label">Goal Name</label>
                      <input type="text" name="gname" id="gname" class="form-control mb-2" placeholder="Mac Book Pro." required>
                    </div>
                  </div>
                <div class="form-group">
                    <div class="">
                        <label for="amount" class="col-form-label">Target Amount</label>
                        <div>
                            <input type="text" class="form-control" name="gamount" id="gamount" 
                        placeholder="Amount" required=""/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="amount" class="col-form-label">Target Date</label>
                        <div>
                            <input type="date" class="form-control" name="edate" id="edate" required=""/>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="goalstatus">
                        <label for="txtLastNameBilling" class="col-form-label">Goal Status</label>
                        <div class="">
                             <select name="status" id="status" class="form-control">
                           
                            <option value="PENDING">PENDING</option>
                            <option value="COMPLETED">COMPLETED</option>
                          </select>
                          </div>
                    </div>
                    <div class="form-group">
                    <div class="">
                        <label for="amount" class="col-form-label">Goal Detail</label>
                        <div>
                            <textarea class="form-control" name="ginfo" id="ginfo" 
                        placeholder="Goal Detail" required=""></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="userid" value="<?php echo $dm_id ?>" id="userid">
                </div>
          <div class="modal-footer">
          	<button class="btn bg-light-info" id="resetbtn" type="button" onclick="resetForm();">Reset</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <button type="submit" name="form_data" class="btn btn-primary">Submit</button>
              
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- /form modal -->
<script>
function resetForm() {
    document.getElementById("cat_form").reset();
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
        $('#gname').val(data.gname);;
        $('#gamount').val(data.gamount);
        $('#ginfo').val(data.ginfo);
        $('#status').val(data.status);
        $('#edate').val(data.edate);
        
        if(data.id!=""){
      $('#pop_title').html('Edit');
      // $('#gname').attr('readonly','readonly');
      $('#resetbtn').hide();
      $('#goalstatus').show();
    }
            
        else{
      $('#pop_title').html('Add');
      // $('#gname').removeAttr('readonly','readonly');
      $('#resetbtn').show();
      $('#goalstatus').hide();
           
    }
           
    });  
  $(document).on('submit','#cat_form',function(){

       $("#form_data").prop("disabled", true);
       $("#cancel").prop("disabled", true);
       $("#resetbtn").prop("disabled", true);

      // readProducts();
      var url = 'action/goal.dm.php';
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
            url: 'action/goal.d.php',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'

           })
           .done(function(response){
            // Swal.fire('Deleted!', response.message, response.status);
            Swal.fire({title:"Deleted",text:"Investment Account Deleted Successfully",type:"success",confirmButtonClass:"btn btn-success",showConfirmButton:true});
            readProducts();
           })
           .fail(function(){
            // Swal.fire('Oops...', 'Something went wrong !', 'error');
            Swal.fire({title:"Error",text:"Unable to Delete Investment Account. ",type:"error",confirmButtonClass:"btn btn-success",showConfirmButton:true});
           });
           // window.location.reload();
        });

        
        },

        

      allowOutsideClick: false        
    }); 
    
  }
  function readProducts(){
    $('#load-result').load('action/goal.r.php'); 
  }
</script>
<!-- ..........End........ -->
<?php include("dm/app-footer.php") ?>