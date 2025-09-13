<?php 
  require_once("../inc/auth.php");
    //$result = $con->query("SELECT * FROM uia where userid ='$dm_id' ");
    $result = $con->query("SELECT * FROM goal where userid='$dm_id'");
    //SELECT * FROM iat INNER JOIN uia ON iat.id = uia.type where uia.userid='$dm_id'
    $data_record = $result->num_rows;
?>
       <table class="table table-hover table-sm table-striped table-bordered datatable" id="example2"  cellspacing="0">
            <thead>
                <tr>
                    <th>S.No</th>
                    
                    <th>Goal Name</th>
                    <th>Amount</th>
                    <th>Information</th>
                    <th>Target Date</th>   
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($result) && ($data_record) > 0)  : $i=1; ?>
                    <?php  while ($sdm = mysqli_fetch_object($result)) { ?>

                        <?php
                        
                        if($sdm->status == 'COMPLETED') {     
                          $Status = "<button class='btn btn-success'>COMPLETED</button>";
                        }else ($sdm->status == 'PENDING') {     
                          $Status = "<button class='btn btn-warning'>PENDING</button>"
                        }                         
                        ?>

                        <tr class="<?=$sdm->id?>_del">
                            <td><?=$i;?></td>
                            
                            <td><?=$sdm->gname;?></td>
                            <td>Rs. <?=$sdm->gamount;?></td>
                            <td><?=$sdm->ginfo;?></td>
                            <td><?=$sdm->edate;?></td>
                            <!-- <td><?=$sdm->status;?></td> -->
                            <td><?php echo $Status ?></td>
                            
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