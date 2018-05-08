
<script src="js/examples/examples.modals.js"></script>
<?php 
	//echo $api_url.'appointment/reject_popups.php?agent_id='.$_SESSION['id'];
	$rejectlist = file_get_contents($api_url.'appointment/reject_popups.php?agent_id='.$_SESSION['id']);
	$rejectpops = json_decode($rejectlist, true); // decode the JSON into an associative array	

	//print_r($rejectpops['records']);

	if(@$rejectpops['id']){

		//foreach ($rejectpops['records'] as $rejectpops) {
?>
			<div id="modalDanger<?php echo $rejectpops['id'];?>" class="modal-block modal-block-danger mfp-hide">
				<section class="card">
					<header class="card-header">
						<h2 class="card-title">New Reject!</h2>
					</header>
					<div class="card-body">
						<div class="modal-wrapper">
							<div class="modal-icon">
								<i class="fa fa-times-circle"></i>
							</div>
							<div class="modal-text">
								<p>Rejected from <?php echo $rejectpops['first_name']." ".$rejectpops['last_name']." - ". $rejectpops['categoryName']." ".$rejectpops['date']." ".$rejectpops['time']." , ".$rejectpops['cancelComment'];?></p>
							</div>
						</div>
					</div>
					<footer class="card-footer">
						<div class="row">
							<div class="col-md-12 text-right">
								<button class="btn btn-danger">OK</button>
							</div>
						</div>
					</footer>
				</section>
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
				$.magnificPopup.open({
				  items: {
				    src: '#modalDanger<?php echo $rejectpops['id'];?>'
				  }
				});


				$(".btn.btn-danger").on('click',function(){
					location.reload();
					//window.reload();
				});
			});
			</script>			
<?php
		//}
	}
?>


