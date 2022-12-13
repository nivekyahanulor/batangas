
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="accounts/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
	<?php
	include('controller/database.php');

	
	
	?>
    <title>UNIVERSITY OF BATANGAS</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="accounts/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="accounts/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="accounts/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="accounts/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="accounts/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="accounts/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="accounts/assets/vendor/js/helpers.js"></script>

    <script src="accounts/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
			<?php 
			 if(isset($_GET['registered'])){
				echo '<br> <div class="alert alert-success alert-dismissible fade show" role="alert"> <center><i class="bi  bi-exclamation-circle me-1"></i>SUCCESS! Login now  using your account!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}  if(isset($_GET['error'])){
				echo '<br> <div class="alert alert-warning alert-dismissible fade show" role="alert"> <center><i class="bi  bi-exclamation-circle me-1"></i>NO SCHEDULE OR RECORD FOUND!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			} 
			?>
             <center>
              <h4 class="mb-2"> <img src="assets/logo.png" width="100px"></h4>
              <h4 class="mb-4">ENTER YOUR STUDENT ID</h4>
			</center>
		
              <form id="formAuthentication" class="mb-3" method="post" action="controller/process.php">
                <div class="mb-3">
                  <label for="email" class="form-label text-center">STUDENT ID</label>
                  <input
                    type="text"
                    class="form-control text-center"
                    id="email"
                    name="student_number"
                    placeholder="Enter Student ID"
                    autofocus
                  />
                </div>
              
               
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">PROCESS</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="accounts/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="accounts/assets/vendor/libs/popper/popper.js"></script>
    <script src="accounts/assets/vendor/js/bootstrap.js"></script>
    <script src="accounts/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="accounts/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="accounts/assets/js/main.js"></script>


    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
