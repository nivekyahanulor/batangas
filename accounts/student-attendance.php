  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/s-attendance.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

              <div class="col-lg-12 col-md-12 order-1">
              <h5 class="card-title">
							<form method="POST">
							<div class="row">
								<div class="col-2">
								  <label for="inputNanme4" class="form-label">Date: </label>
								  <input type="date" class="form-control" name="date" value="<?php if(isset($_POST['date'])){ echo $_POST['date']; } else { echo date('Y-m-d');}?>">
								</div>
								<div class="col-2">
									<div style="height:27px;"></div>
									  <button type="submit" class="btn btn-primary btn-md" name="filter"> Filter </button>
								</div>
								</div>
							</form>
							
			  </h5>
				
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Student Name</th>
                    <th scope="col"  class="text-center">Computer / PC</th>
                    <th scope="col"  class="text-center">Time</th>
                    <th scope="col"  class="text-center">Room</th>
                    <th scope="col"  class="text-center">Status</th>
                    <th scope="col"  class="text-center">Date Added</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $ub_students_data->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->lab_name;?></td>
                    <td class="text-center"><?php echo $val->computer;?></td>
                    <td class="text-center"><?php echo $val->lab_time;?></td>
                    <td class="text-center"><?php echo $val->lab_room;?></td>
                    <td class="text-center"><?php  if($val->status == 1) { echo  "IN"; }  else { echo "OUT"; }?></td>
                    <td class="text-center"><?php echo $val->attendance_date;?></td>
                 
                  </tr>
					
                <?php } ?>
                </tbody>
              </table>
                </div>
                </div>
         
              </div>
            
            </div>

    <?php include("footer.php");?>      