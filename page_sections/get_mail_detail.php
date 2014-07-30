<?php
	require_once '../core/init.php';

	$mailId = $_GET['mailId'];

	//now get the details of the mail using the mailId i have just obtained from
	//the parameter...
	$mail = new Mail();
	$fetchedMail = $mail->getMailUsingMailId($mailId);
	$mailTitle = $fetchedMail->mail_title;
	$mailContent = $fetchedMail->mail_content;
	//now get some details like email address, and full name of the person.
	$user = new User();
	$fetchedUser = $user->getUserUsingUserId($fetchedMail->to_user_id);
	//I got the user ...reciepient...then get the email address of the recipient...
	$userEmailAddress = $fetchedUser->email;
	$userFullName = $fetchedUser->user_full_name;
	$formattedToString = $userFullName.' [ '.$userEmailAddress.' ]';
?>
<div class="panel-body">
    <div class="tab-pane fade in active">
        <h4>Mail Details</h4>
        <!--the first tab to load is the username setting form...-->                                                            
        <form role="form">    
            <div class="form-group">
                <label for="userId">To</label>                
                <input ng-model="composeMailForm.mailTo" class="form-control" id="mailTo" type="text" value="<?php echo $formattedToString;?>" />
            </div>
            <div class="form-group">        
                <label>Title</label>
                <input ng-model="composeMailForm.mailTitle" class="form-control" id="mailTitle" type="text" value="<?php echo $mailTitle;?>" />
            </div>            
            <div class="form-group">
                <label>Mail Content</label>
                <textarea ng-model="composeMailForm.mailContent" 
                class="form-control jqte-test" id="mailContent" required="" rows="13">
                	<?php echo $mailContent;?>
            	</textarea>
            </div>            
        </form>
        
    </div>
</div>