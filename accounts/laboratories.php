  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/laboratory.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

              <div class="col-lg-12 col-md-12 order-1">
              <h5 class="card-title"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-teacher"> <i class="bi bi-plus"></i> Add Laboratory Record</button></h5>
				
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Year & Section</th>
                    <th scope="col"  class="text-center">Day</th>
                    <th scope="col"  class="text-center">Start Time</th>
                    <th scope="col"  class="text-center">End Time</th>
                    <th scope="col"  class="text-center">Room</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $ub_laboratories->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><a href="laboratory-records.php?view=view&section=<?php echo $val->section_id;?>&section_name=<?php echo $val->year_level . ' '. $val->section;?>&data=<?php echo $val->lab_id;?>&lab_date=<?php echo $val->lab_date;?>&lab_time=<?php echo $val->lab_time;?>&lab_room=<?php echo $val->lab_room;?>" class="btn btn-info btn-sm" style="witdh:100% !important;"><?php echo $val->year_level . ' '. $val->section . ' | '. $val->lab_name;?></a></td>
                    <td class="text-center"><?php echo $val->lab_date;?></td>
                    <td class="text-center"><?php echo $val->lab_time;?></td>
                    <td class="text-center"><?php echo $val->lab_etime;?></td>
                    <td class="text-center"><?php echo $val->lab_room;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info  btn-sm" data-bs-toggle="modal" data-bs-target="#edit-student<?php echo $val->lab_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-student<?php echo $val->lab_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					<div class="modal fade" id="edit-student<?php echo $val->lab_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Information</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Section: </label>
							  <select type="text" class="form-control" name="section" required>
								<option value=""> - Select - </option>
									 <?php 
									  $tbl_student = $mysqli->query("SELECT * FROM ub_section");
									  while($serv = $tbl_student->fetch_object()){ ?>
									 <option value="<?php echo $serv->section_id;?>"> <?php echo $serv->year_level . ' ' . $serv->section;?></option>
								  <?php } ?>
							 </select>
							</div>
						
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Laboratory: </label>
							   <select type="text" class="form-control" name="laboratory" required>
								<option value=""> - Select - </option>
									 <?php 
									  $tbl_student = $mysqli->query("SELECT * FROM ub_laboratory");
									  while($serv = $tbl_student->fetch_object()){ ?>
									 <option value="<?php echo $serv->lab_id;?>"> <?php echo  $serv->lab_name;?></option>
								  <?php } ?>
							 </select>
							</div>
					
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->tl_id;?>" required>
							
						
						 </div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-primary" name="update-lab">Update </button>
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
					  </div>
					</div>
					</div>	
					 <div class="modal fade" id="delete-student<?php echo $val->lab_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Laboratory</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Laboratory Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->tl_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-labs">Delete </button>
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
                      <h5 class="modal-title">Laboratory Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Section: </label>
						  <select type="text" class="form-control" name="section" required>
							<option value=""> - Select - </option>
								 <?php 
								  $tbl_student = $mysqli->query("SELECT * FROM ub_section");
								  while($serv = $tbl_student->fetch_object()){ ?>
								 <option value="<?php echo $serv->section_id;?>"> <?php echo $serv->year_level . ' ' . $serv->section;?></option>
							  <?php } ?>
						 </select>
						</div>
					
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Laboratory: </label>
						   <select type="text" class="form-control" name="laboratory" required>
							<option value=""> - Select - </option>
								 <?php 
								  $tbl_student = $mysqli->query("SELECT * FROM ub_laboratory");
								  while($serv = $tbl_student->fetch_object()){ ?>
								 <option value="<?php echo $serv->lab_id;?>"> <?php echo  $serv->lab_name;?></option>
							  <?php } ?>
						 </select>
						</div>
					
					
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-tlab">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
    <?php include("footer.php");?>      