  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
		
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo text-center">
				<center><img src="assets/logo.png" width="200px"></center>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>
	      <br>
          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
		  <?php if($_SESSION['role'] == 1){?>
            <!-- Dashboard -->
            <li class="menu-item <?php echo $index;?>">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item <?php echo $ticket;?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Layouts">Tickets</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="tickets.php?data=pending" class="menu-link">
                    <div data-i18n="Without menu">Pending</div>
                  </a>
                </li> 
				<li class="menu-item">
                  <a href="tickets.php?data=ongoing" class="menu-link">
                    <div data-i18n="Without menu">On-going</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="tickets.php?data=closed" class="menu-link">
                    <div data-i18n="Without navbar">Closed</div>
                  </a>
                </li>
             
              
              </ul>
            </li>
			
			<li class="menu-item <?php echo $teacher;?>">
              <a href="teacher.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Teachers</div>
              </a>
            </li>
			<li class="menu-item <?php echo $users;?>">
              <a href="system-users.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">System User</div>
              </a>
            </li>
			
			
		  <?php } else { ?>
			<li class="menu-item <?php echo $student;?>">
              <a href="student.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Students</div>
              </a>
            </li>
			<li class="menu-item <?php echo $laboratory;?>">
              <a href="laboratory.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-label"></i>
                <div data-i18n="Analytics">Laboratory</div>
              </a>
            </li>
			<li class="menu-item <?php echo $attendance;?>">
              <a href="attendance.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Attendance</div>
              </a>
            </li>
			<li class="menu-item <?php echo $ticket;?>">
              <a href="ticket.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-error-circle"></i>
                <div data-i18n="Analytics">Tickets</div>
              </a>
            </li>
		  <?php } ?>
            <li class="menu-item">
              <a href="logout.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            
          </ul>
        </aside>
        <!-- / Menu -->
		
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
				<b>
				<?php if($page == "index.php"){?>
                 DASHBOARD
				<?php } else if($page == "tickets.php"){?>
                 <?php echo strtoupper($_GET['data']);?> TICKETS
				<?php } else if($page == "timetable.php"){?>
					ORDERS TIME TABLE
				<?php }  else if($page == "teacher.php"){?>
					TEACHER INFORMATION
				<?php } else if($page == "customer-record.php"){?>
					CUSTOMER DETAILS RECORDS
				<?php }  else if($page == "system-users.php"){?>
					SYSTEM USERS
				<?php }   else if($page == "menu.php"){?>
					MENU
				<?php }  else if($page == "category.php"){?>
					CATEGORY
				<?php }   else if($page == "settings.php"){?>
					SYSTEM SETTINGS
				<?php }   else if($page == "profile.php"){?>
					PROFILE 
				<?php } else if($page == "reports.php"){?>
					<?php echo strtoupper($_GET['data']);?> REPORTS 
				<?php } else if($page == "order-details.php"){?>
					TRANSACTION CODE : <?php echo strtoupper($_GET['data-transcode']);?> |  ORDER DETAILS 
				<?php }  else if($page == "laboratory.php"){?>
					LABORATORY
				<?php }  else if($page == "laboratory-records.php" ){?>
					LABORATORY SCHEDULE :  DAY - <?php echo $_GET['lab_date'];?> |
											TIME - <?php echo $_GET['lab_time'];?> |
											ROOM - <?php echo $_GET['lab_room'];?>
				<?php } else if($page == "student.php" ){?>
					STUDENT LIST
				<?php } else if($page == "attendance.php" ){?>
					ATTENDANCE LIST
				<?php } else if($page == "ticket.php" ){?>
					TICKETS 
				<?php } ?>
				</b>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
               

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
							
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
							<?php if($aval[6] == ""){?>
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
							<?php } else { ?>
							  <img src="assets/img/avatars/<?php echo $aval[6];?>" alt class="w-px-40 h-auto rounded-circle" />
							<?php } ?>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $aval[1] . ' ' .$aval[2];?></span>
                            <small class="text-muted">Admininstrator</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                  
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
