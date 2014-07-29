<?php
    require_once '../core/init.php';
    $data = array();
    
    $userId = $_POST['userId'];
    $currentEmail = $_POST['currentEmail'];    
    $currentUsername = $_POST['currentUsername'];    
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    //the next step is to check if there exists a user with the passed
    //email, username and password. If so update the email variable only.
    $user = new User();
    
    if($user->userExistsWithCredentials($currentUsername, $currentEmail, $currentPassword)){
        //now i can update the fetch the object using the id
        $fetchedUser = $user->getUserUsingUserId($userId);
        $modifiedUser = new User();
        
        $modifiedUser->setUserId($userId);
        $modifiedUser->setUserType($fetchedUser->user_type);
        $modifiedUser->setUsername($fetchedUser->username);
        $modifiedUser->setUserPassword($newPassword);
        $modifiedUser->setUserFullName($fetchedUser->user_full_name);
        $modifiedUser->setUserStatus($fetchedUser->user_status);        
        $modifiedUser->setEmail($fetchedUser->email);
        $modifiedUser->setUserLastValidLogin($fetchedUser->user_last_valid_login);
        $modifiedUser->setUserFirstInvalidLogin($fetchedUser->user_first_invalid_login);
        $modifiedUser->setUserFailedLoginCount($fetchedUser->user_faild_login_count);
        $modifiedUser->setUserCreateDate($fetchedUser->user_create_date);
        $modifiedUser->setModifiedBy($fetchedUser->modified_by);
        $modifiedUser->setModificationDate($fetchedUser->modification_date);
        
        $user->update($modifiedUser);
        $data['success'] = true;
        $data['message'] = "<div class='alert alert-success alert-dismissable'>" .
             "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" .
             "Password updated successfully!" .
             "</div><br/>";
        echo json_encode($data);
    }else{
        //echo '.';
        $data['message'] = "<div class='alert alert-danger alert-dismissable'>" .
             "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" .
             "Wrong username, current email address or password. Try again..." .
             "</div><br/>"; 
        $data['success'] = false;
        echo json_encode($data);
    }   
?>
