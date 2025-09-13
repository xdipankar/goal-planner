<?php 
  require_once("../inc/auth.php");
    //$result = $con->query("SELECT * FROM uia where userid ='$dm_id' ");
    $result = $con->query("SELECT t.*, tc.name as tcname FROM task t INNER JOIN taskcategory tc on t.category=tc.id WHERE t.userid='$dm_id'");
    //SELECT * FROM `task` CROSS JOIN `taskcategory`|| SELECT * FROM task where userid='$dm_id'
    //SELECT * FROM iat INNER JOIN uia ON iat.id = uia.type where uia.userid='$dm_id'
    $data_record = $result->num_rows;
?>
       <table class="table table-hover table-striped table-bordered table-sm" id="example2"  cellspacing="0">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Task Name</th>
                    <th>Category</th>
                    <th>Target Date</th>   
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($result) && ($data_record) > 0)  : $i=1; ?>
                    <?php  while ($sdm = mysqli_fetch_object($result)) { ?>

                        <tr class="<?=$sdm->id?>_del">
                            <td><?=$i;?></td>
                            <td><?=$sdm->name;?></td>
                            <td><?=$sdm->tcname;?></td>
                            <td><?=$sdm->date;?></td>
                            <td><?=$sdm->status;?></td>
                            
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