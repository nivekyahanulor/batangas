  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/teacher.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			
              <div class="col-lg-12 col-md-12 order-1">
              <h5 class="card-title"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-teacher"> <i class="bi bi-person-plus-fill"></i> Add Teacher</button></h5>
				
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">ID</th>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Contact</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $teacher->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->id_number;?></td>
                    <td class="text-center"><?php echo $val->firstname . ' '. $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->contact;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info  btn-sm" data-bs-toggle="modal" data-bs-target="#edit-teacher<?php echo $val->teacher_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-teacher<?php echo $val->teacher_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					<div class="modal fade" id="edit-teacher<?php echo $val->teacher_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Information</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">ID Number: </label>
							  <input type="text" class="form-control" name="idnumber" value="<?php echo $val->id_number;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">First Name: </label>
							  <input type="text" class="form-control" name="fname" value="<?php echo $val->firstname;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Last Name: </label>
							  <input type="text" class="form-control" name="lname" value="<?php echo $val->lastname;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Address: </label>
							  <input type="text" class="form-control" name="address" value="<?php echo $val->address;?>"  required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Contact Number: </label>
							  <input type="text" class="form-control" name="contactnumber" value="<?php echo $val->contact;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->teacher_id;?>" required>
							</div>
							<div class="col-12">
						  <label for="inputNanme4" class="form-label">Email Address: </label>
						  <input type="text" class="form-control" name="email" value="<?php echo $val->email;?>" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Password: </label>
						  <input type="password" class="form-control" name="password" value="<?php echo $val->password;?>" required>
						</div>
						
							</div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-primary" name="update-teacher">Update </button>
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
					  </div>
					</div>
					</div>	
					 <div class="modal fade" id="delete-teacher<?php echo $val->teacher_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Teacher</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Teacher Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->teacher_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-teacher">Delete </button>
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
                      <h5 class="modal-title">Teacher Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">ID Number: </label>
						  <input type="text" class="form-control" name="idnumber" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">First Name: </label>
						  <input type="text" class="form-control" name="fname" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Last Name: </label>
						  <input type="text" class="form-control" name="lname" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Address: </label>
						  <input type="text" class="form-control" name="address" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Contact Number: </label>
						  <input type="text" class="form-control" name="contactnumber" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Email Address: </label>
						  <input type="text" class="form-control" name="email" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Password: </label>
						  <input type="password" class="form-control" name="password" required>
						</div>
					
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-teacher">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
    <?php include("footer.php");?>      