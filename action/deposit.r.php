<?php 
  require_once("../inc/auth.php");

    $result = $con->query("SELECT d.id, d.date, d.amount, d.account, d.goal,d.remarks, g.gname, a.name as aname FROM deposit d,goal g,uia a WHERE d.goal = g.id AND d.account = a.id and d.user ='$dm_id'");

    $data_record = $result->num_rows;
?>
       <table class="table table-hover " id="example2"  cellspacing="0">
            <thead>
                <tr>
                    <th>S.No</th>
                    
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Goal</th>
                    <th>Acount</th>
                    <th>Remarks</th>   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($result) && ($data_record) > 0)  : $i=1; ?>
                    <?php  while ($sdm = mysqli_fetch_object($result)) { ?>

                        <tr class="<?=$sdm->id?>_del">
                            <td><?=$i;?></td>
                            
                            <td><?=$sdm->date;?></td>
                            <td>Rs. <?=$sdm->amount;?></td>
                            <td><?=$sdm->gname;?></td>
                            <td><?=$sdm->aname;?></td>
                            <td><?=$sdm->remarks;?></td> 
                            
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