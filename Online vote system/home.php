<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
	      	<?php
	      		$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
    			$title = $parse['election_title'];
	      	?>
	      	<h1 class="page-header text-center title"><b><?php echo strtoupper($title); ?></b></h1>
	        		<?php
				        if(isset($_SESSION['error'])){
				        	?>
				        	<div class="alert alert-danger alert-dismissible">
				        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        	<ul>
					        		<?php
					        			foreach($_SESSION['error'] as $error){
					        				echo "<li>".$error."</li>";
					        			}
					        		?>
					        	</ul>
					        </div>
				        	<?php
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
				    <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
		        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<span class="message"></span>
			        </div>
				    <?php
				    	$sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."'";
				    	$vquery = $conn->query($sql);
				    	if($vquery->num_rows > 0){
				    		$sql2="UPDATE voters SET status='Voted' WHERE id = '".$voter['id']."'";
				    		$v=$conn->query($sql2);
				    		?>
				    		<div class="text-center" style="margin-bottom: 15em;">
					    		<h3>You have voted for this election.</h3>
					    		<a href="#view" data-toggle="modal" class="btn btn-flat btn-primary btn-lg">View Ballot</a>
					    	</div>
				    		<?php
				    	}
				    	else{
				    		?>
			    			<!-- Voting Ballot -->
											<!-- Outer Row -->
						<div class="justify-content-center col-md-9 vform">						
											<!-- Nested Row within Card Body -->
						    <form method="POST" id="ballotForm" action="submit_ballot.php">
				        		<?php
				        			include 'includes/slugify.php';
				        			$candidate = '';
				        			$sql = "SELECT * FROM positions ORDER BY priority ASC";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){
										$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
										$cquery = $conn->query($sql);
										while($crow = $cquery->fetch_assoc()){
											$slug = slugify($row['description']);
											$checked = '';
											if(isset($_SESSION['post'][$slug])){
												$value = $_SESSION['post'][$slug];

												if(is_array($value)){
													foreach($value as $val){
														if($val == $crow['id']){
															$checked = 'checked';
														}
													}
												}
												else{
													if($value == $crow['id']){
														$checked = 'checked';
													}
												}
											}
$input = '
<label class="si si-radio">
  <input type="radio" name="'.slugify($row['description']).'" value="'.$crow['id'].'" '.$checked.'/>
  <span class="si-label" style="margin-left:10px;">Vote</span>
</label>';

//echo '<input type="radio" '.$slug.'" name="'.slugify($row['description']).'" value="'.$crow['id'].'" '.$checked.'>';
											$image = (!empty($crow['photo'])) ? 'images/'.$crow['photo'] : 'images/profile.jpg';
											$candidate .= '
											<div class="row mb-3">
												<div class="imge p-3">
                  											<!-- IMAGE -->
                 										<img class="im" src="'.$image.'" style="width:50%;">
              									</div>
              									<div class="col-lg-4 text-center" style="border:2px solid #d7d7d7;background-color:#F6F8FF;">
              										<b style="font-size:20px;margin-top: 2em;">'.$crow['firstname'].' '.$crow['lastname'].'</b>
                									<div class="p-3 vinput">
                  										'.$input.'
									                </div>
									            </div>
									        </div>
											';
										}
										$instruct = ($row['max_vote'] > 1) ? 'You may select up to '.$row['max_vote'].' candidates' : 'Select only one candidate';
										echo '
									<div class="card border-0 shadow-lg mb-5">
									<div class="card-body p-0">
									<div class="card-header">	
										<h1 class="postitle text-success mb-1 text-center" style="text-transform:uppercase;"><b>'.$row['description'].'</b></h1>
										</div>
									<div class="justify-content-center m-3">
									<p class="note">'.$instruct.'
													<span class="" style="float:right;">
		<button type="button" class="btn btn-success btn-sm btn-flat reset" id="'.slugify($row['description']).'"><i class="fa fa-refresh"></i> Reset</button>
													</span>
												</p>
										<div class="col-lg-12 candi" id="'.$row['id'].'">	
														'.$candidate.'
												</div>	
											</div>
										</div>
									</div>
										';
										$candidate = '';
									}	
				        		?>
				        		<div class="text-center mb-3">
					        		<!--<button type="button" class="btn btn-success btn-flat" id="preview"><i class="fa fa-file-text"></i> Preview</button> -->
					        		<button type="submit" class="btn btn-primary btn-flat" name="vote"><i class="fa fa-check-square-o"></i> Submit</button>
					        	</div>

				        	</form>
					</div>
				        	<!-- End Voting Ballot -->
				    		<?php
				    	}
				    ?>	     
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/ballot_modal.php'; ?>
</div>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

	$(document).on('click', '.reset', function(e){
	    e.preventDefault();
	    var desc = $(this).data('desc');
	    $('.'+desc).iCheck('uncheck');
	});

	$(document).on('click', '.platform', function(e){
		e.preventDefault();
		$('#platform').modal('show');
		var platform = $(this).data('platform');
		var fullname = $(this).data('fullname');
		$('.candidate').html(fullname);
		$('#plat_view').html(platform);
	});

	$('#preview').click(function(e){
		e.preventDefault();
		var form = $('#ballotForm').serialize();
		if(form == ''){
			$('.message').html('You must vote at least one candidate');
			$('#alert').show();
		}
		else{
			$.ajax({
				type: 'POST',
				url: 'preview.php',
				data: form,
				dataType: 'json',
				success: function(response){
					if(response.error){
						var errmsg = '';
						var messages = response.message;
						for (i in messages) {
							errmsg += messages[i]; 
						}
						$('.message').html(errmsg);
						$('#alert').show();
					}
					else{
						$('#preview_modal').modal('show');
						$('#preview_body').html(response.list);
					}
				}
			});
		}
	});
});
</script>
</body>
</html>