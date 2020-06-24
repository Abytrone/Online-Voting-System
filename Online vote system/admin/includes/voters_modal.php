<script type="text/javascript">
  //Index Number Check
  function checkindex() {
    var indexnumber = document.getElementById("indexnumber").value;
    if (indexnumber){
      $.ajax({
        type: 'post',
        url: 'user_check.php',
        data: {indexnumber:indexnumber,},
        success: function (response) {
          $('#indexStatus').html(response);
          if (response == "OK"){
            return true;
          } 
          else {  
            return false;
          }
        }
      });
    }
    else {
      $('#indexStatus').html("");
      return false;
    }
  }
  //Phone Number Check
  function checkphone() {
    var phoneNumber = document.getElementById("phoneNumber").value;
    if (phoneNumber){
      $.ajax({
        type: 'post',
        url: 'user_check.php',
        data: {phoneNumber:phoneNumber,},
        success: function (response) {
          $('#phoneStatus').html(response);
          if (response == "OK"){
            return true;
          } 
          else {
            return false;
          }
        }
      });
    }
    else {
      $('#phoneStatus').html("");
      return false;
    }
  }

</script>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Voter</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-4 control-label">Firstname</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-4 control-label">Lastname</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>

               <div class="form-group">
                    <label for="indexnumber" class="col-sm-4 control-label">Index Number</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="indexnumber" onkeypress="return onlyNumeric(event);" name="indexnumber" onkeyup="checkindex()" maxlength="8" required>
                      <span id="indexStatus" style="font-size:12px;"></span><br>
                      <span id="err" style="color:Red;display:none;font-size:12px;">*Only Numbers allowed!</span>
                    </div>
                </div>
                <div class="form-group">
                  <label for="phoneNumber" class="col-sm-4 control-label">Phone Number</label>
                        <div class="col-sm-8">
                          <input class="form-control" name="phoneNumber" id="phoneNumber"placeholder="024-123-1234" type="text" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" required maxlength="10">
                        </div>
                        <span id="phoneStatus" style="font-size:12px;"></span><br>           
                        <span id="error" style="color:Red;display:none;font-size:12px;">*Only Numbers Allowed!</span>
                      </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
        var specialKey = new Array();
        specialKey.push(8); //Backspace
        function onlyNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKey.indexOf(keyCode) != -1);
            document.getElementById("err").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>
<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Voter</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-4 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-4 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                    </div>
                </div>                

                <div class="form-group">

                  <?php     
                      $set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                      $password = substr(str_shuffle($set), 0, 8);
                  ?>

                    <label for="edit_lastname" class="col-sm-4 control-label">Password</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="edit_password" name="password" required>
                    </div>
                    <div class="col-sm-4">
                      <input type="button" class="btn btn-primary" value="Generate" onclick="document.getElementById('edit_password').value='<?php echo $password ?>'">
                    </div>
                </div> 

                <div class="form-group">
                    <label for="indexnumber" class="col-sm-4 control-label">Index Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_indexnumber" name="indexnumber" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_phoneNumber" class="col-sm-4 control-label">Phone Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_phoneNumber" name="phoneNumber" required>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete...</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE VOTER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="logout.php" method="POST"> 
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Details View -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Voter's Details</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="id" name="id">
                <div class="text-center">

                    <h4 class="bold indexnumber"></h4>
                    <h2 class="bold password text-success"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>