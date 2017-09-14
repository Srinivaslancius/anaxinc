<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getUsersData = getAllDataWithActiveRecent('mobile_push_notifications'); $i=1; ?>
     
      <div class="site-content">
        
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="send_notifications.php" style="float:right">Send Notifications</a>
            <h3 class="m-t-0 m-b-5">Mobile Push Notifications</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Messgae</th>    
                    <th>Date</th>                 
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getUsersData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['message'];?></td>
                    <td><?php echo $row['created_date'];?></td>
                    <td><a href="delete_mobile_notifications.php?bid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-delete zmdi-hc-fw" onclick="return confirm('Are you sure you want to delete?')"></i></a></td>
                    <!-- Open Modal Box  here -->
                   
                  <!-- End Modal Box  here -->
                  </tr>
                  <?php  $i++; } ?>                  
                </tbody>                
              </table>
            </div>
          </div>
        </div>      
        
      </div>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>