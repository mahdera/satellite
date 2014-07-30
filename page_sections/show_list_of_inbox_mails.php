<?php
	require_once '../core/init.php';
	$userId = Session::get(Config::get('session/session_name'));
	//echo $userId;
	//now get the data from the database...
	$data = array();

	$mail = new Mail();
	$inboxMailList = $mail->getAllMailsTo($userId);

	if(!empty($inboxMailList)){
		if($inboxMailList->count()){	
			$data = $inboxMailList->getResults();		
		}
	}else{
		//echo 'Inbox empty';
	}

	//echo gettype($data);
?>
<h4>Inbox Mail</h4>
<!-- /.panel-heading -->
<div class="panel-body">
	<div class="table-responsive" >
		
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>Ser.No</th>
					<th>From</th>
					<th>Title</th>
					<th>Message</th>
					<th>Delete</th>					
				</tr>
			</thead>
			<tbody>	
				<?php
					$ctr = 1;
					foreach($data as $inboxMail){
						$mailId = $inboxMail->mail_id;
						//now get the user detail of the sender...
						$user = new User();
					$fetchedUser = $user->getUserUsingUserId($inboxMail->from_user_id);
					$userFullName = $fetchedUser->user_full_name;
						?>
							<tr class="gradeA">
								<td><?php echo $ctr++;?></td>
								<td><?php echo $userFullName;?></td>
								<td><?php echo $inboxMail->mail_title;?></td>
								<td>
									<a ng-href="" ng-click="showMailContentDetail(<?php echo $mailId; ?>);">
										<?php
											echo '<div style="display:inline-block; overflow:hidden; width:250px; height:45px;">'.strip_tags($inboxMail->mail_content).'</div>';
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
		<div id="inboxMailDetailDiv"></div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
       $('#dataTables-example').dataTable();
    });
</script>
