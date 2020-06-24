<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
          <!-- Page Heading -->
          <div class=" align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Votes</h1>
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
<!-- Page Heading -->
          <div class=" align-items-center justify-content-between mb-4">
              <a href="print.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>              
              <a href="#reset" data-toggle="modal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i> Reset</a>
          </div>
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Votes List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                <thead>
                  <th>Position</th>
                  <th>Candidate</th>
                  <th>Voter</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, candidates.firstname AS canfirst, candidates.lastname AS canlast, voters.firstname AS votfirst, voters.lastname AS votlast FROM votes LEFT JOIN positions ON positions.id=votes.position_id LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN voters ON voters.id=votes.voters_id ORDER BY positions.priority ASC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['description']."</td>
                          <td>".$row['canfirst'].' '.$row['canlast']."</td>
                          <td>".$row['votfirst'].' '.$row['votlast']."</td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/votes_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
