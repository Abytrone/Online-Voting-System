<!-- SINGLE RECORD Reset -->
<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Reset...</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="smsReset.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>Reset SMS Delivery For:</p>
                    <h2 class="bold indexnumber"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="reset"><i class="fa fa-sync"></i> Reset</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- ALL RECORDS Reset -->
<div class="modal fade" id="allReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Reset...</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="smsReset.php">
                <!--<input type="hidden" class="id" name="id">-->
                <div class="text-center">
                    <p>Reset All SMS Delivery?</p>
                    <!--<h2 class="bold indexnumber"></h2>-->
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="allReset"><i class="fa fa-sync"></i> Reset</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- SINGLE SMS SEND -->
<div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Send SMS...</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="singleSend.php">
                <input type="hidden" id="edit_indexnumber" name="indexnumber">
                <input type="hidden" id="edit_password" name="password">
                <input type="hidden" id="edit_phoneNumber" name="phone">
                <div class="text-center">
                    <p>Send SMS To:</p>
                    <h2 class="bold phoneNumber"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="send"><i class="fa fa-sms"></i> Send</button>
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