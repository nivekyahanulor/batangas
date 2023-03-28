
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
    <title>UBLAB</title>

    <meta name="description" content="" />

    <!-- Favicon -->

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
			 if(isset($_GET['duplicate'])){
				echo '<br> <div class="alert alert-warning alert-dismissible fade show" role="alert"> <center><i class="bi  bi-exclamation-circle me-1"></i> EMAIL ALREADY REGISTERED!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			} if(isset($_GET['cduplicate'])){
				echo '<br> <div class="alert alert-warning alert-dismissible fade show" role="alert"> <center><i class="bi  bi-exclamation-circle me-1"></i> CONTACT NUMBER ALREADY REGISTERED!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			} 
			?>
             <center>
              <p class="mb-4">Register your account</p>
			</center>
              <form id="formAuthentication" class="mb-3" method="post" action="controller/register.php">
			  <div class="mb-3">
                  <label for="email" class="form-label">Student ID</label>
                  <input
                    type="text"
                    class="form-control"
                    name="studentid"
                    placeholder="Enter Student ID"
					required
                    autofocus
                  />
                </div>
             
                <div class="mb-3">
                  <label for="email" class="form-label">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="firstname"
                    placeholder="First Name"
                    autofocus
					required
                  />
                </div>  
				<div class="mb-3">
                  <label for="email" class="form-label">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="lastname"
                    placeholder="Last Name"
					required
                  />
                </div> 
				<div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Email Address"
					required
                  />
                </div> 
				<div class="mb-3">
                  <label for="email" class="form-label">Contact Number</label>
                  <input
                    type="text"
                    class="form-control"
                    name="contact"
                    placeholder="Contact Number"
					 pattern="[0-9]{1}[0-9]{3}[0-9]{3}[0-9]{4}"
					oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
					maxlength="11"
					required
                  />
                </div> 
				<div class="mb-3">
                  <label for="email" class="form-label">Year & Section</label>
                	 <select type="text" class="form-control" name="laboratory" required>
							<option value=""> - Select - </option>
								 <?php 
								  $tbl_student = $mysqli->query("SELECT * FROM ub_section");
								  while($serv = $tbl_student->fetch_object()){ ?>
								 <option value="<?php echo $serv->section_id;?>"> <?php echo $serv->year_level . ' ' . $serv->section;?></option>
							  <?php } ?>
					</select>
                </div> 
				
				<div class="mb-3">
                  <label for="email" class="form-label">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
					required
                  />
                </div> 
				
				
               
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="register">Sign in</button>
                </div>
              </form>

             
            </div>
          </div>
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

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
