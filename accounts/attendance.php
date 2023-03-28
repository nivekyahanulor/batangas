  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/laboratory.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

              <div class="col-lg-12 col-md-12 order-1">
				
				<div class="card">
                <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Year & Section</th>
                    <th scope="col"  class="text-center">Day</th>
                    <th scope="col"  class="text-center">Start Time</th>
                    <th scope="col"  class="text-center">End Time</th>
                    <th scope="col"  class="text-center">Room</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $ub_laboratories->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><a href="lab-attendance.php?view=view&section=<?php echo $val->section_id;?>&section_name=<?php echo $val->year_level . ' '. $val->section;?>&data=<?php echo $val->lab_id;?>&lab_date=<?php echo $val->lab_date;?>&lab_time=<?php echo $val->lab_time;?>&lab_room=<?php echo $val->lab_room;?>" class="btn btn-info btn-sm" style="witdh:100% !important;"><?php echo $val->year_level . ' '. $val->section . ' | '. $val->lab_name;?></a></td>
                    <td class="text-center"><?php echo $val->lab_date;?></td>
                    <td class="text-center"><?php echo $val->lab_time;?></td>
                    <td class="text-center"><?php echo $val->lab_etime;?></td>
                    <td class="text-center"><?php echo $val->lab_room;?></td>
                  
                  </tr>
				
					
                <?php } ?>
                </tbody>
              </table>
                </div>
                </div>
         
              </div>
            
            </div>
         
		
    <?php include("footer.php");?>      