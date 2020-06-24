<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	$sql = "SELECT * FROM positions";
	$pquery = $conn->query($sql);

	$output = '';
	$candidate = '';

	$sql = "SELECT * FROM positions ORDER BY priority ASC";
	$query = $conn->query($sql);
	$num = 1;
	while($row = $query->fetch_assoc()){
		$input = ($row['max_vote'] > 1) ? 
		'<input type="checkbox" class="flat-red '.slugify($row['description']).'" name="'.slugify($row['description'])."[]".'">' : 
		'<input id="'.slugify($row['description']).'" class="'.slugify($row['description']).'" name="'.slugify($row['description']).'" type="radio" /> ';

		$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
		$cquery = $conn->query($sql);
		while($crow = $cquery->fetch_assoc()){
			$image = (!empty($crow['photo'])) ? '../images/'.$crow['photo'] : '../images/profile.jpg';
			$candidate .= '
			<!-- ONE START -->
				<div class="row">
              <div class="col-lg-12 text-center">
                <hr class="sidebar-divider d-none d-md-block">
                <h1 class="h4 text-success mb-1">'.$row['description'].'</h1>
              <div class="row">
              <div class="col-lg-4">
                <div class="p-3">
                <div class="text-center">
                    <h5 class="text-gray-900">VOTE!</h5>
                  </div>
                  <!-- RADIO RATING -->
                    <div class="col-lg-3">
                          <div class="smile-rating-container" style="margin-top: 2em;">
                            <div class="smile-rating-toggle-container">
                              <form class="submit-rating">                                
                                <input id="meh"  name="satisfaction" type="radio" /> 
                                '.$input.' 
                                <label for="meh" class="rating-label rating-label-meh">Unvote</label>
                              <div class="smile-rating-toggle" style="">
                                  <div class="rating-eye rating-eye-left"></div>
                                  <div class="rating-eye rating-eye-right"></div>
                                  <div class="mouth rating-eye-bad-mouth"></div>
                              </div>
                                <div class="toggle-rating-pill"></div>
                                <label for="fun" class="rating-label rating-label-fun">Vote</label>
                              </form>
                            </div>
                          </div>
                        </div>
                    <!-- RADIO RATING -->
                    </div>
              </div>
              <div class="col-lg-4">
                <div class="p-3">
                  <div class="text-center">
                    <h5 class="text-gray-900 ">IMAGE</h5>
                  </div>
                  <!-- IMAGE -->
                 <img src="'.$image.'" style="width:50%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="p-3">
                  <div class="text-center">
                    <h5 class="text-gray-900" style="margin-bottom: 2em;">NAME</h5>
                 <span class="" style="font-size:1em;margin-top: 2em;">#'.$crow['id'].' '.$crow['firstname'].' '.$crow['lastname'].'</span>
                    </div>
                </div>
              </div>
            </div>
            <!-- ONE END -->';
		}

		$instruct = ($row['max_vote'] > 1) ? 'You may select up to '.$row['max_vote'].' candidates' : 'Select only one candidate';
		
		$updisable = ($row['priority'] == 1) ? 'disabled' : '';
		$downdisable = ($row['priority'] == $pquery->num_rows) ? 'disabled' : '';

		$output .= $candidate;

		$sql = "UPDATE positions SET priority = '$num' WHERE id = '".$row['id']."'";
		$conn->query($sql);

		$num++;
		$candidate = '';
	}

	echo json_encode($output);

?>