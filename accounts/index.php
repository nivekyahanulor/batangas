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
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-circle"></i> OPEN TICKETS </span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $total_pending;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-info-circle"></i> ONGOING TICKETS </span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $total_approved;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
				
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-check-circle"></i> CLOSED TICKETS </span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $total_closed;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
				    <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-person-badge"></i> TOTAL TEACHER </span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $total_t;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
				    <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-person-badge-fill"></i> TOTAL STUDENT </span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $total_s;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
				    <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-pc-display"></i> TOTAL LABORATORY </span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $total_l;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
				
                  </div>
                </div>
				
				
              </div>
            	<div class="col-lg-12 col-md-12 col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><b>Weekly Reports</b></span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<div id="container-weekly"></div>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-12 col-md-12 col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><b>Laboratory Reports</b></span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<div id="container-top"></div>
						   </h2>
                        </div>
                      </div>
                    </div>
         
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      