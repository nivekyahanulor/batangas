  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/ticket.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			
              <div class="col-lg-12 col-md-12 order-1">
			 
				
				<div class="card">
				
				<?php if(isset($_GET['updated'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Order Updated!</strong> 
				</div>
				<?php } ?>
				
                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Ticket Number</th>
                    <th scope="col"  class="text-center">Report By</th>
                    <th scope="col"  class="text-center">Date Reported</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $ub_tickets1->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val->ticket_number;?>"><?php echo $val->ticket_number;?></a></td>
                    <td class="text-center"><?php echo $val->firstname .' '. $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
					<?php if($val->status !=2){?>
					<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->ticket_id;?>"> <i class="bi bi-pencil-square"></i> </button>
					<?php } ?>
					</td>
                  </tr>
				   <div class="modal fade" id="view-details<?php echo $val->ticket_number;?>" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered ">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"> Report Details </h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<div class="row">
						<div class="col-lg-12">
								<p> <b>Ticket Number :</b> <?php echo $val->ticket_number;?> </p>
								<p> <b>Reporter Name: </b><?php echo $val->firstname .' '. $val->lastname;?> </p>
								<p> <b>Report ID Number:</b> <?php echo $val->id_number;?> </p>
								<p> <b>Report Title:</b> <?php echo $val->title;?> </p>
								<p> <b>Report Description:</b> <br> <?php echo $val->content;?> </p>
							
						</div>
						
						</div>
						</div>
						<div class="modal-footer">
						 
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				</div>
					 <div class="modal fade" id="edit-item<?php echo $val->ticket_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Ticket Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" enctype="multipart/form-data" method="post">
							   <div class="row">
							   	<input type="hidden" class="form-control" name="ticket_id" value="<?php echo $val->ticket_id;?>" required>
								<input type="hidden" class="form-control" name="trans_code" value="<?php echo $val->trans_code;?>" required>
								<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
								<?php if($val->status == 0){?>
									<div class="col-12">
									  <br> 
									  ARE YOU SURE TO APPROVE THIS TICKET ?
									</div>
								<?php } else if($val->status == 1){?>
									<div class="col-12">
									  <br> 
									  ARE YOU SURE TO CLOSE THIS TICKET ?
									</div>
								<?php } ?>
								</div>
								<hr>
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="approved-status">Update </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
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

    <?php include("footer.php");?>      