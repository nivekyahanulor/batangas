  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/laboratory.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

              <div class="col-lg-12 col-md-12 order-1">
			 
              <h5 class="card-title"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-teacher"> <i class="bi bi-plus"></i> Add Student </button></h5>
				<?php if(isset($_GET['added'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Student Added to Laboratory!</strong> 
				</div>
		        <?php } if(isset($_GET['duplicate'])){?>
				<div class="alert alert-warning alert-dismissable">
					<strong>Student already added to Laboratory!</strong> 
				</div>
		        <?php } if(isset($_GET['updated'])){?>
				<div class="alert alert-success alert-dismissable">
					<strong>Laboratory data updated!</strong> 
				</div>
		        <?php } if(isset($_GET['deleted'])){?>
				<div class="alert alert-danger alert-dismissable">
					<strong>Laboratory data deleted!</strong> 
				</div>
		        <?php } ?>
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Student Name</th>
                    <th scope="col"  class="text-center">Computer / PC</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $ub_students_data->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->firstname. ' ' . $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->computer;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info  btn-sm" data-bs-toggle="modal" data-bs-target="#edit-student<?php echo $val->labs_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-student<?php echo $val->labs_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					<div class="modal fade" id="edit-student<?php echo $val->labs_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Information</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						  <form class="row g-3" method="post">
						
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Computer / PC Name: </label>
							  <input type="text" class="form-control" name="computer" value="<?php echo $val->computer;?>" required>
							  <input type="hidden" class="form-control" name="labs_id" value="<?php echo $val->labs_id ;?>" >
							  <input type="hidden" class="form-control" name="lab_date" value="<?php echo $_GET['lab_date'];?>" >
							  <input type="hidden" class="form-control" name="lab_time" value="<?php echo $_GET['lab_time'];?>" >
							  <input type="hidden" class="form-control" name="lab_room" value="<?php echo $_GET['lab_room'];?>" >
							  <input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" >
							</div>
					
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="update-lab-student">Update </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
					  </div>
					</div>
					</div>	
					 <div class="modal fade" id="delete-student<?php echo $val->labs_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Data</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Data?
							  <input type="hidden" class="form-control" name="labs_id" value="<?php echo $val->labs_id;?>" required>
							  <input type="hidden" class="form-control" name="lab_date" value="<?php echo $_GET['lab_date'];?>" >
							  <input type="hidden" class="form-control" name="lab_time" value="<?php echo $_GET['lab_time'];?>" >
							  <input type="hidden" class="form-control" name="lab_room" value="<?php echo $_GET['lab_room'];?>" >
							  <input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" >
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-lab-student">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
                <?php } ?>
                </tbody>
              </table>
                </div>
                </div>
         
              </div>
            
            </div>
            <!-- / Content -->
			<div class="modal fade" id="add-teacher" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Student Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
						
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Student Name: </label>
							<select class="form-control" name="student">	
								<option value=""> - Select Student - </option>
								 <?php 
								  $tbl_student = $mysqli->query("SELECT * FROM ub_students");
								  while($serv = $tbl_student->fetch_object()){ ?>
								 <option value="<?php echo $serv->student_id;?>"> <?php echo $serv->firstname . ' ' . $serv->lastname ;?></option>
							  <?php } ?>
							  </select>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Computer / PC Name: </label>
						  <input type="text" class="form-control" name="computer" required>
						  <input type="hidden" class="form-control" name="lab_date" value="<?php echo $_GET['lab_date'];?>" >
						  <input type="hidden" class="form-control" name="lab_time" value="<?php echo $_GET['lab_time'];?>" >
						  <input type="hidden" class="form-control" name="lab_room" value="<?php echo $_GET['lab_room'];?>" >
						  <input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" >
						</div>
					
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-lab-student">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
    <?php include("footer.php");?>      