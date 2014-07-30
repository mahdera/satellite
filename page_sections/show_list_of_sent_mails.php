<?php
	require_once '../core/init.php';
	$userId = Session::get(Config::get('session/session_name'));
	//echo $userId;
	//now get the data from the database...
	$data = array();

	$mail = new Mail();
	$sentMailList = $mail->getAllMailsFrom($userId);

	//var_dump($sentMailList);

	if(!empty($sentMailList)){
		if($sentMailList->count()){	
			$data = $sentMailList->getResults();		
		}
	}else{
		echo 'Sent mail empty';
	}

	//echo gettype($data);
?>
<h4>Sent Mail</h4>
<!-- /.panel-heading -->
<div class="panel-body">
	<div class="table-responsive" >
		
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>Ser.No</th>
					<th>To</th>
					<th>Title</th>
					<th>Message</th>
					<th>Delete</th>					
				</tr>
			</thead>
			<tbody>	
				<?php
					$ctr = 1;
					foreach($data as $sentMail){
						$mailId = $sentMail->mail_id;
						?>
							<tr class="gradeA">
								<td><?php echo $ctr++;?></td>
								<td><?php echo $sentMail->to_user_id;?></td>
								<td><?php echo $sentMail->mail_title;?></td>
								<td>
									<a ng-href="" ng-click="showMailContentDetail(<?php echo $mailId; ?>);">
										<?php
											echo '<div style="display:inline-block; overflow:hidden; width:250px; height:45px;">'.strip_tags($sentMail->mail_content).'</div>';
										?>
									</a>
								</td>
								<td class="center">
									<a href="#/action/mail/delete/<?php echo $mailId;?>">D</a>
								</td>
							</tr>				
						<?php
					}//end foreach loop
				?>				
			</tbody>
		</table>
		<hr/>
		<div id="sentMailDetailDiv"></div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
       $('#dataTables-example').dataTable();
    });
</script>
