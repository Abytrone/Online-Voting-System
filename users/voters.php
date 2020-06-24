    <?php include 'includes/session.php'; ?>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="container-fluid">
        <!-- Content Header (Page header) -->
              <!-- Page Heading -->
              <div class=" align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Voters</h1>
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
              </div>
              <form action="sms_send.php" method="post">
     <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-success">Voters List</h6>
                  <button type="button" class='check btn btn-primary btn-sm'><i class='fas fa-user-check'></i> Select All</button>
                  <button type="button" class='uncheck btn btn-danger btn-sm'><i class='fas fa-user-times'></i> Unselect</button>
                  <button name='submit' class='btn btn-success btn-sm'><i class='fas fa-sms'></i> Send SMS</button>
                  <!-- SMS RESET -->
                  <button class='float-right btn btn-danger allReset btn-sm btn-flat'><i class='fa fa-sync'></i> Reset All SMS</button>
                  <!-- SMS RESET -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                      <th>Select</th>
                      <th>Matric Number</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>SMS Status</th>
                      <th>SMS Deli. Time</th>
                      <th>Status</th>
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      
                      <?php
                          $sql = mysqli_query($conn,"SELECT * FROM voters") or die(mysqli_error($conn));
                            while($row = mysqli_fetch_array($sql)){
                                $id = $row['id'];
                                $status=$row['status'];
                                $phn = $row['phoneNumber'];
                                $index = $row['indexnumber'];
                                $pass = $row['password'];
                                $SMSstatus = $row['msgStatus'];
                                $smsDtime = $row['smsDtime'];
                                echo'<tr>
                                  <td>
                                  <label class="si si-checkbox">
                                  <input type="checkbox" class="myCheck" name="phone[]" value="'.$phn.$index.$pass.'"/>
                                  <span class="si-label"></span>
                                  </label>';  
                                echo "
                                <td>".$row['indexnumber']."</td>
                                <td>".$row['firstname']." ".$row['lastname']."</td>
                                <td>".$row['phoneNumber']."</td>";
                                if ($SMSstatus=="1") {
                                    echo'<td style="color:green;">Sent</td>';
                                  }
                                  elseif ($SMSstatus=="0") {
                                    echo'<td style="color:red;">Not sent</td>';
                                  }
                                  else{
                                    echo'<td>'.$SMSstatus.'</td>';
                                  }
                                echo '<td>'.$smsDtime.'</td>';
                                if ($status=="Voted") {
                                    echo'<td style="color:green;">'.$status.'</td>';
                                  }
                                  elseif ($status=="Unvoted") {
                                    echo'<td style="color:red;">'.$status.'</td>';
                                  }
                                  else{
                                    echo'<td>'.$status.'</td>';
                                  }
                                echo"
                                <td>
                                  <button class='btn btn-primary btn-sm send btn-flat' data-id='".$row['id']."'><i class='fas fa-sms'></i> Send</button>

                                  <button class='btn btn-danger btn-sm reset btn-flat' data-id='".$row['id']."'><i class='fas fa-sync'></i> Reset</button>

                                </td>";
                                echo "</tr>";
                        }
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>
                </div>
              </div>
            </form>
          </div>
        </section>   
      </div>
    <?php include 'includes/voters_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script type="text/javascript">
    $(function(){
      $(document).on('click', '.allReset', function(e){
        e.preventDefault();
        $('#allReset').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.send', function(e){
        e.preventDefault();
        $('#send').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.reset', function(e){
        e.preventDefault();
        $('#reset').modal('show');
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
          $('.phoneNumber').html(response.phoneNumber);
          $('.password').html(response.password);
          $('.indexnumber').html(response.indexnumber);
          $('.fullname').html(response.firstname+' '+response.lastname);
        }
      });
    }
      $(document).ready(function(){
        $('.check').click(function(){
          $('.myCheck').prop('checked', true);
          });
          $('.uncheck').click(function(){
            $('.myCheck').prop('checked', false);
            });
      });
  </script>
<?php include 'includes/footer.php'; ?>