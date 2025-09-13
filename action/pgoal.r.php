<?php 
  require_once("../inc/auth.php");
    //$result = $con->query("SELECT * FROM uia where userid ='$dm_id' ");
    $result = $con->query("SELECT * FROM pgoal where userid='$dm_id'");
    //SELECT * FROM iat INNER JOIN uia ON iat.id = uia.type where uia.userid='$dm_id'
    $data_record = $result->num_rows;
?>
       <table class="table table-hover table-striped table-bordered table-sm" id="example2"  cellspacing="0">
            <thead>
                <tr>
                    <th>S.No</th>
                    
                    <th>Name</th>
                    <th>Progress</th>
                    <th>Deadline</th>
                    <th>Description</th>   
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($result) && ($data_record) > 0)  : $i=1; ?>
                    <?php  while ($sdm = mysqli_fetch_object($result)) { ?>

                        <tr class="<?=$sdm->id?>_del">
                            <td><?=$i;?></td>
                            
                            <td><?=$sdm->pname;?></td>
                            <!-- <td id="progrssbar"><input type="range" value="<?=$sdm->progress;?>" ></td> -->
                            <td><meter min="0" low="99" optimum="99" high="100" max="100" value="<?=$sdm->progress;?>" title="<?=$sdm->progress;?> %"></meter></td>
                            <td><?=$sdm->edate;?></td>
                            <td><?=$sdm->pinfo;?></td>
                            <td><?=$sdm->pstatus;?></td>
                            
                            <td class="text-truncate">
                             <a data="<?php echo 'page_'.$sdm->id ?>" class="model_form success p-0" href="#"> <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                </a>
                                <a class="delete_check" id="delete_product" data-id="<?php echo $sdm->id ?>" href="#"><i class="ft-x text-danger font-medium-3"></i></a>
                            </td>
                            <script>var page_<?php echo $sdm->id ?> = <?php echo json_encode($sdm);?></script>
                        </tr>
                <?php $i++; } ?>
            <?php else : echo '<tr><td colspan="10"><div align="center">-------No record found -----</div></td></tr>'; ?>
           <?php endif; ?>               
            </tbody>
        </table>



        <script type="text/javascript">
            $(document).ready(function(){
  
              $('#max').on('input', function() {
                $('#meter').prop('max', $('#max').val())
              });
              
              $('#min').on('input', function() {
                $('#meter').prop('min', $('#min').val())
              });
              
              $('#value').on('input', function() {
                $('#meter').prop('value', $('#value').val())
              });
              
              $('#high').on('input', function() {
                $('#meter').prop('high', $('#high').val())
              });
              
              $('#low').on('input', function() {
                $('#meter').prop('low', $('#low').val())
              });
              
              $('#optimum').on('input', function() {
                $('#meter').prop('optimum', $('#optimum').val())
              });
              
            });
        </script>