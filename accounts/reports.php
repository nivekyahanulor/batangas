  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/dashboard.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
					<div class="col-lg-12 col-md-12 order-1">
			
					<div class="card">
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
                </div>
              </div>
            </div>
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      