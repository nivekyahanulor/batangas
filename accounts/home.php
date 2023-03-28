  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/dashboard.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
           
                <div class="col-lg-12 col-md-12 order-1">
                  <div class="row">
				    <?php
					$id        = $_SESSION['id'];
					$pos_users = $mysqli->query("SELECT a.* , b.* , c.* from ub_laboratory_students a LEFT JOIN ub_laboratory b on a.laboratory_id = b.lab_id LEFT JOIN ub_section c on c.section_id = a.section where student_id = '$id'");
					while($valpos_users = $pos_users->fetch_object()){ 
						
					
					?>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
						<form method="POST">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <p class=""><i class="bi bi-circle"></i> Laboratory : <?php echo $valpos_users->lab_name;?> | Room : <?php echo $valpos_users->lab_room;?>  </p>
                              <p class=""><i class="bi bi-circle"></i> Day : <?php echo $valpos_users->lab_date;?> </p>
                              <p class=""><i class="bi bi-circle"></i> Start Time : <?php echo $valpos_users->lab_time;?>  to End Time : <?php echo $valpos_users->lab_etime;?>  </p>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<input type="hidden" name="laboratory_id" value="<?php echo $valpos_users->laboratory_id;?>">
							<?php if($valpos_users->asttatus == 1){?>
							<center>  <button type="submit" class="btn btn-warning btn-md" name="out"> OUT (ATTENDANCE) </button> </center>
							<?php } else { ?>
							<center>  <button type="submit" class="btn btn-info btn-md" name="attendance"> IN (ATTENDANCE) </button> </center>
							<?php } ?>
						   </h2>
						   </form>
                        </div>
                      </div>
                    </div>
					<?php } ?>
                  </div>
                </div>
				
				
              </div>
            	
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      