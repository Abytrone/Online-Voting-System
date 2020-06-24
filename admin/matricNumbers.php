<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
          <!-- Page Heading -->
          <div class=" align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Voters Matric Numbers</h1>
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
          <!-- Page Heading -->
          <div class=" align-items-center justify-content-between mb-4">
              <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm "><i class="fas fa-plus fa-sm"></i> New</a>
              <a href="#csvv" data-toggle="modal" class="btn btn-success btn-sm "><i class="fas fa-plus fa-sm"></i> Upload</a>

              <a href="#mn" data-toggle="modal" class="btn btn-success btn-sm "><i class="fas fa-plus fa-sm"></i> Matric Numbers</a>
          </div>
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Matric Numbers List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                <thead>
                  <th>Class ID</th>
                  <th>Matric Numbers</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM matric_numbers";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['classID']."</td>
                          <td>".$row['matricNumber']."</td>
                        </tr>
                      ";}
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
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_indexnumber').val(response.indexnumber);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_password').val(response.password);
      $('#edit_phoneNumber').val(response.phoneNumber);
      $('#edit_email').val(response.email);
      $('.password').html(response.password);
      $('.indexnumber').html(response.indexnumber);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
