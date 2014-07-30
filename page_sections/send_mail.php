<?php
    require_once '../core/init.php';
    $data = array();

    $userId = $_POST['userId'];
    $mailTo = trim($_POST['mailTo']);
    $mailTitle = $_POST['mailTitle'];
    $mailContent = $_POST['mailContent'];
    $mailDate = date("Y-m-d h:i:sa");
    //in case if there are many recipent...
    $mailToArray = explode(",", $mailTo);
    $trimmedMailToArray = array();
    $i = 0;
    foreach($mailToArray as $emailAddress){
        $trimmedMailToArray[$i] = trim($emailAddress);
        $i++;
    }//end foreach loop
    //don'f forget to trim the space

    //var_dump($trimmedMailToArray);
    $user = new User();

    //echo "array count : " . count($trimmedMailToArray);

    
    foreach($trimmedMailToArray as $email){
        //now i need to get the userId of this particular email address...
        $fetchedUser = $user->getUserUsingEmailAddress($email);
        $mailToUserId = $fetchedUser->user_id;
        //now instantiate a mail object and save it to the database...
        $newMail = new Mail();
        $newMail->setFromUserId($userId);
        $newMail->setToUserId($mailToUserId);
        $newMail->setMailDate($mailDate);
        $newMail->setMailTitle($mailTitle);
        $newMail->setMailContent($mailContent);
        $newMail->setMailStatus('Unread');
        $mail = new Mail();
        $mail->send($newMail);        
    }

    $data['success'] = true;
    $data['message'] = "<div class='alert alert-success alert-dismissable'>" .
             "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" .
             "Mail sent successfully..." .
             "</div><br/>"; 

    echo json_encode($data);
?>
