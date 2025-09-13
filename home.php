<?php include"dm/app-header.php" ?>
<title>Dashboard | <?php echo $dm_name ?></title>
<!-- ..........Start........ -->
<!-- Minimal statistics with bg color section start -->
<section id="minimal-statistics-bg">
  <!-- <div class="row">
    <div class="col-12 mb-1">
      <div class="content-header">Minimal Statistics With Background Color</div>
      <p class="content-sub-header mb-1">Statistics on minimal cards with background color.</p>
    </div>
  </div> -->

  <div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card card-inverse bg-success pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media">
              <div class="media-body text-left">
                <h3 class="card-text">
                  <?php 
                  $nRows = $pdo->query("select count(*) from uia where userid='$dm_id'")->fetchColumn(); 
                  echo $nRows
                  ?>                    
                  </h3>
                <span>Accounts</span>
              </div>
              <div class="media-right align-self-center">
                <i class="ft-briefcase font-large-2 float-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card card-inverse bg-warning pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media">
              <div class="media-body text-left">
                <h3 class="card-text"><?php 
                        $nRows = $pdo->query("select count(*) from goal where userid='$dm_id'")->fetchColumn(); 
                        echo $nRows
                        ?></h3>
                <span>Financial Goals</span>
              </div>
              <div class="media-right align-self-center">
                <i class="ft-bar-chart font-large-2 float-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card card-inverse bg-primary pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media">
              <div class="media-body text-left">
                <h3 class="card-text">
                  <?php 
                        $nRows = $pdo->query("select count(*) from pgoal where userid='$dm_id'")->fetchColumn(); 
                        echo $nRows
                        ?>
                </h3>
                <span>Projects</span>
              </div>
              <div class="media-right align-self-center">
                <i class="ft-pie-chart font-large-2 float-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card card-inverse bg-danger pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media">
              <div class="media-left align-self-center">
                <i class="ft-trending-up font-large-2 float-left"></i>
              </div>
              <div class="media-body text-right">
                <h3 class="card-text">
                  ₹
                  <?php
                    $query=mysqli_query($con,"select sum(bal)  as glamount from uia where  (userid='$dm_id');");
                    $result=mysqli_fetch_array($query);
                    $sum_glamount=$result['glamount'];
                    echo $sum_glamount;
                     ?>
                </h3>
                <span>Net Worth</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- // Minimal statistics with bg color section end -->
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
                         ₹ <?php if($sum_today_expense==""){
                        echo "0";
                        } else {
                        echo $sum_today_expense;
                        }
                         ?>
                    </h3>
              <span>Goal Amount</span>
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
                  ₹  <?php
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
              <span>Required Amount</span>
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
              <span>Goal Achieved</span>
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
<div class="row match-height">
  <div class="col-xl-7 col-lg-12">
  <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Graph (Coming Soon)</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div id="mixed-chart"></div>
                    </div>
                </div>
            </div>
  </div>

  <div class="col-xl-5 col-lg-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <h4 class="card-title">
            <span>Projects</span>
            <span class="float-right cursor-pointer">
              <!-- <i class="ft-more-vertical-"></i> -->
            </span>
          </h4>
          <p class="grey">Recent Projects</p>
          <ul class="list-group mb-3">
            <?php
              $sql="SELECT * FROM pgoal where userid='$dm_id'";
              $result=mysqli_query($con,$sql);
              ?>
              <?php
                while($rows=mysqli_fetch_array($result)){
                ?>
                <li class="list-group-item pull-up">
                  <span><?php echo $rows['pname']; ?></span>
                  <span class="float-right"><meter min="0" low="99" optimum="99" high="100" max="100" value="<?php echo $rows['progress']; ?>" title="<?php echo $rows['progress']; ?> %"></meter></span>
                </li>
             
            <?php } ?>
          </ul>
          <a href="projects.php" class="btn btn-primary mr-2">View All Project</a>
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php include"dm/footer.php" ?>