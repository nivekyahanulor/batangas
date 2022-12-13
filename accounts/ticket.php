  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/ticket.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

              <div class="col-lg-12 col-md-12 order-1">
              <h5 class="card-title"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-teacher"> <i class="bi bi-plus"></i> Add Ticket Report</button></h5>
				
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Ticket Number</th>
                    <th scope="col"  class="text-center">Title</th>
                    <th scope="col"  class="text-center">Details</th>
                    <th scope="col"  class="text-center">Status</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $ub_tickets->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->ticket_number;?></td>
                    <td class="text-center"><?php echo $val->title;?></td>
                    <td class="text-center"><?php echo $val->content;?></td>
                    <td class="text-center"><?php if($val->status == 0){ echo "Pending";} else { echo "Closed";}?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-student<?php echo $val->ticket_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
			
					 <div class="modal fade" id="delete-student<?php echo $val->ticket_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Ticket</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Ticket Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->ticket_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-ticket">Delete </button>
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
                      <h5 class="modal-title">Ticket Report</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Ticket Title: </label>
						  <input type="text" class="form-control" name="title" required>
						</div>
						
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Report Details: </label>
						  <textarea type="text" class="form-control" name="details" required></textarea>
						</div>
					
					
					 </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-ticket">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
    <?php include("footer.php");?>      