<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
          <!-- Page Heading -->
          <div class=" align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Privilages</h1>
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
        <div class="col-md-9">
          <div class="box">

 <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Privelage Settings</h6>
            </div>
            <div class="card-body">
              <table class="table table-bordered" width="100%" cellspacing="0">
              <form class="form-horizontal" method="POST" action="settings.php">
                <tr>
                <td>Send SMS</td>
                <input type=text value="Send SMS" name="setting" style="display:none;" />
                    <td>
                        <select class="form-control col-sm-4" name="mode" required>
                            <option>On</option>
                            <option>Off</option>
                        </select>
                    </td>
                    <td>
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                    </td>
                    </tr>
                </form>
                <form class="form-horizontal" method="POST" action="settings.php">
                    <tr>
                <td>View voters details</td>
                <input type=text value="View voters details" name="setting" style="display:none;" />
                    <td>
                        <select class="form-control col-sm-4" name="mode" required>
                            <option>On</option>
                            <option>Off</option>
                        </select>
                    </td>
                    <td>
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                    </td>
                    </tr>
                    </form>
                    <form class="form-horizontal" method="POST" action="settings.php">
                    <td>Edit voters details</td>
                    <input type=text value="Edit voters details" name="setting" style="display:none;" />
                    <td>
                        <select class="form-control col-sm-4" name="mode" required>
                            <option>On</option>
                            <option>Off</option>
                        </select>
                    </td>
                    <td>
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                    </td>
                    </tr>
                    </form>
                    <form class="form-horizontal" method="POST" action="settings.php">
                    <td>Delete voters details</td>
                    <input type=text value="Delete voters details" name="setting" style="display:none;" />
                    <td>
                        <select class="form-control col-sm-4" name="mode" required>
                            <option>On</option>
                            <option>Off</option>
                        </select>
                    </td>
                    <td>
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                    </td>
                    </tr>
                    </form>
                </table>
            </div>
            <div class="modal-footer">
              
            </div>
        </div>
      </div>
    </div>
</section>   
</div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>