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
                    <th scope="col"  class="text-center">Lab Name</th>
                    <th scope="col"  class="text-center">Day</th>
                    <th scope="col"  class="text-center">Time</th>
                    <th scope="col"  class="text-center">Room</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $ub_students->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><a href="laboratory-records.php?data=<?php echo $val->lab_id;?>&lab_date=<?php echo $val->lab_date;?>&lab_time=<?php echo $val->lab_time;?>&lab_room=<?php echo $val->lab_room;?>" class="btn btn-info btn-sm"><?php echo $val->lab_name;?></a></td>
                    <td class="text-center"><?php echo $val->lab_date;?></td>
                    <td class="text-center"><?php echo $val->lab_time;?></td>
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
							  <label for="inputNanme4" class="form-label">Lab Name: </label>
							  <input type="text" class="form-control" name="title" value="<?php echo $val->lab_name;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Day: </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->lab_id;?>" required>
								<select class="form-control" name="day">	
									<option value=""> - Select Day - </option>
									<option value="Monday" <?php if($val->lab_date=="Monday"){ echo "selected";} else {}?>> Monday </option>
									<option value="Tuesday" <?php if($val->lab_date=="Tuesday"){ echo "selected"; } else {}?>> Tuesday </option>
									<option value="Wednesday" <?php if($val->lab_date=="Wednesday"){ echo "selected"; } else {}?>> Wednesday </option>
									<option value="Thursday" <?php if($val->lab_date=="Thursday"){ echo "selected";} else {}?>>Thursday </option>
									<option value="Friday" <?php if($val->lab_date=="Friday"){ echo "selected"; } else {}?>> Friday </option>
									<option value="Saturday" <?php if($val->lab_date=="Saturday"){ echo "selected"; } else {}?>> Saturday </option>
								</select>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time: </label>
							  <input type="time" class="form-control" name="time" value="<?php echo $val->lab_time;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Room: </label>
							  <input type="text" class="form-control" name="room" value="<?php echo $val->lab_room;?>" required>
							</div>
						
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
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->lab_id;?>" required>
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
                      <h5 class="modal-title">Laboratory Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Title: </label>
						  <input type="text" class="form-control" name="title" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Day: </label>
							<select class="form-control" name="day">	
								<option value=""> - Select Day - </option>
								<option value="Monday"> Monday </option>
								<option value="Tuesday"> Tuesday </option>
								<option value="Wednesday"> Wednesday </option>
								<option value="Thursday">Thursday </option>
								<option value="Friday"> Friday </option>
								<option value="Saturday"> Saturday </option>
							</select>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Time: </label>
						  <input type="time" class="form-control" name="time" required>
						</div>
						
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Room: </label>
						  <input type="text" class="form-control" name="room" required>
						</div>
					
					
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-lab">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
    <?php include("footer.php");?>      