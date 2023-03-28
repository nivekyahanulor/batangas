  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/computer.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			
              <div class="col-lg-12 col-md-12 order-1">
              <h5 class="card-title"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-teacher"> <i class="bi bi-person-plus-fill"></i> Add Computer</button></h5>
				
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Laboratory</th>
                    <th scope="col"  class="text-center">Computer</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $teacher->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->lab_name;?></td>
                    <td class="text-center"><?php echo $val->computer;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info  btn-sm" data-bs-toggle="modal" data-bs-target="#edit-teacher<?php echo $val->computer_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-teacher<?php echo $val->computer_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					<div class="modal fade" id="edit-teacher<?php echo $val->computer_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Information</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Laboratory : </label>
								  <select type="text" class="form-control" name="laboratory" required>
									<option value=""> - Select Laboratory - </option>
										 <?php 
										  $tbl_student = $mysqli->query("SELECT * FROM ub_laboratory");
										  while($serv = $tbl_student->fetch_object()){ ?>
										  <?php if($serv->lab_id == $val->laboratory){?>
										 <option value="<?php echo $serv->lab_id;?>" selected> <?php echo $serv->lab_name;?></option>
										  <?php } else { ?>
										 <option value="<?php echo $serv->lab_id;?>"> <?php echo $serv->lab_name;?></option>
										  <?php } } ?>
								  </select>
								</div>
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Computer Name: </label>
								  <input type="text" class="form-control" name="computer" value="<?php echo $val->computer;?>" required>
								  <input type="hidden" class="form-control" name="computer_id" value="<?php echo $val->computer_id;?>" required>
								</div>
							</div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-primary" name="update-computer">Update </button>
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
					  </div>
					</div>
					</div>	
					</div>	
					 <div class="modal fade" id="delete-teacher<?php echo $val->computer_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Computer</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Data?
								  <input type="hidden" class="form-control" name="computer_id" value="<?php echo $val->computer_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-computer">Delete </button>
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
                      <h5 class="modal-title">Computer Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Laboratory : </label>
						  <select type="text" class="form-control" name="laboratory" required>
							<option value=""> - Select Laboratory - </option>
								 <?php 
								  $tbl_student = $mysqli->query("SELECT * FROM ub_laboratory");
								  while($serv = $tbl_student->fetch_object()){ ?>
								 <option value="<?php echo $serv->lab_id;?>"> <?php echo $serv->lab_name;?></option>
							  <?php } ?>
						  </select>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Computer Name: </label>
						  <input type="text" class="form-control" name="computer" required>
						</div>
						
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-computer">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
    <?php include("footer.php");?>      