<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('Location: admin/home.php');
  	}
    if(isset($_SESSION['voter'])){
      header('Location: home.php');
    }
?>
<?php include 'includes/header.php'; ?> 
  <div class="" style="width:100%;">
 <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
          <img class="img-profile " style="width: 3em;margin-left: 0em;" src="images/aites.png">
          <div class="topbar-divider d-none d-sm-block"></div>
          <span class="mr-2 d-none d-lg-inline text-gray-600">AITES | Voting System</span>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sign In as</span>
                <img class="img-profile rounded-circle" src="images/profile.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="users/index.php">
                  <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                  Staff 
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="admin/index.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Admin 
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- NAVBAR -->
        <!-- Outer Row -->
    <div class="row justify-content-center" style="background-image: url(images/tatu2.png);background-size: cover;">
      <div class="col-xl-3 col-lg-6 col-md-9" style="margin:3em;">
        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 5em;margin-bottom: 10em;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="" style="padding: 2em;">
                  <!-- IMAGE 
                  <div class="row justify-content-center">
                  <img class="img-profile " style="width: 5em;" src="images/aites.png">
                </div>
                             IMAGE -->
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Voter!</h1>
                  </div>
                  <form class="user" action="login.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="indexnumber" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Matric Number">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" onclick="myFunction()" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Show Password</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="login">Sign In</button>
                    <script type="text/javascript">
                      function myFunction() {
                        var x = document.getElementById("exampleInputPassword");
                        if (x.type === "password") {
                          x.type = "text";
                        } else {
                          x.type = "password";
                        }
                      }
                    </script>

                    <hr>

                  </form>
                  <div class="text-center">
                    <span>Sign in with your credentials to vote otherwise contact the admin.</span>
                  </div>
                  <?php
                      if(isset($_SESSION['error'])){
                        echo "
                          <div class='callout callout-danger text-center mt20' style='color:red;'>
                            <p>".$_SESSION['error']."</p> 
                          </div>
                        ";
                        unset($_SESSION['error']);
                      }
                    ?>
              </div>
          </div>
    <?php include 'includes/footer.php' ?>
        </div>
      </div>
    </div>
<?php include 'includes/scripts.php' ?>
  </div>
    </div>
  </div>
</body>
</html>