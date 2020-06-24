<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
          <!-- Page Heading -->
          <div class=" align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Voters Log</h1>
          </div>
    <!-- Main content -->
    <section class="content">  
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xl-12">
          <div class="box">
                <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Voters log</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                <thead>
                  <th>Index Number</th>
                  <th>Voter IP</th>
                  <th>Login Time</th>
                  <th>Logout Time</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM userlog";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status=$row['status'];
                      echo "
                        <tr>
                          <td>".$row['indexnumber']."</td>
                          <td>".$row['userip']."</td>
                          <td>".$row['loginTime']."</td>
                          <td>".$row['logout']."</td>";
                        if ($status==1) {
                              echo'<td style="color:green;">Successfull</td>';
                            }
                        elseif ($status==0) {
                              echo'<td style="color:red;">Failed</td>';
                            }
                           }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/voters_modal.php'; ?>
  <?php include 'includes/file_upload.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
</body>
</html>
