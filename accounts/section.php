  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/section.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			
              <div class="col-lg-12 col-md-12 order-1">
              <h5 class="card-title"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-teacher"> <i class="bi bi-person-plus-fill"></i> Add Section</button></h5>
				
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Year & Section</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $teacher->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->year_level .'-'. $val->section;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info  btn-sm" data-bs-toggle="modal" data-bs-target="#edit-teacher<?php echo $val->section_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-teacher<?php echo $val->section_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					<div class="modal fade" id="edit-teacher<?php echo $val->section_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Information</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Year Level: </label>
							  <select type="text" class="form-control" name="year_level" required>
								<option value=""> - Select Year - </option>
								<option value="1" <?php if( $val->year_level ==1){ echo "selected"; } else {} ?>> 1st Year </option>
								<option value="2" <?php if( $val->year_level ==2){ echo "selected"; } else {} ?>> 2nd Year </option>
								<option value="3" <?php if( $val->year_level ==3){ echo "selected"; } else {} ?>> 3rd Year </option>
								<option value="4" <?php if( $val->year_level ==4){ echo "selected"; } else {} ?>>4th Year </option>
							  </select>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Section: </label>
							  <input type="text" class="form-control" name="section" value="<?php echo  $val->section;?>" required>
							  <input type="hidden" class="form-control" name="section_id" value="<?php echo  $val->section_id;?>" required>
							</div>
						
							</div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-primary" name="update-section">Update </button>
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
					  </div>
					</div>
					</div>	
					 <div class="modal fade" id="delete-teacher<?php echo $val->section_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Section</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Data?
							  <input type="hidden" class="form-control" name="section_id" value="<?php echo  $val->section_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-section">Delete </button>
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
						  <label for="inputNanme4" class="form-label">Year Level: </label>
						  <select type="text" class="form-control" name="year_level" required>
							<option value=""> - Select Year - </option>
							<option value="1"> 1st Year </option>
							<option value="2"> 2nd Year </option>
							<option value="3"> 3rd Year </option>
							<option value="4">4th Year </option>
						  </select>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Section: </label>
						  <input type="text" class="form-control" name="section" required>
						</div>
						
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-section">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
    <?php include("footer.php");?>      