<?php
    require_once '../core/init.php';
    $data = array();
    
    $userId = $_POST['userid'];
    $userType = $_POST['usertype'];
    $userFullName = $_POST['fullname'];
    $userStatus = $_POST['userstatus'];
    
    $user = new User();
    $fetchedUser = $user->getUserUsingUserId($userId);
    
    if(isset($fetchedUser)){
        //now set the modified values using the setter methods..
        $modifiedUser = new User();
        $modifiedUser->setUserId($userId);
        $modifiedUser->setUserType($userType);
        $modifiedUser->setUsername($fetchedUser->username);
        $modifiedUser->existingUserPassword($fetchedUser->user_password);
        $modifiedUser->setUserFullName($userFullName);
        $modifiedUser->setUserStatus($userStatus);
        $modifiedUser->setEmail($fetchedUser->email);
        $modifiedUser->setUserLastValidLogin($fetchedUser->user_last_valid_login);
        $modifiedUser->setUserFirstInvalidLogin($fetchedUser->user_first_invalid_login);
        $modifiedUser->setUserFailedLoginCount($fetchedUser->user_faild_login_count);
        $modifiedUser->setUserCreateDate($fetchedUser->user_create_date);
        $modifiedUser->setModifiedBy($fetchedUser->modified_by);
        $modifiedUser->setModificationDate($fetchedUser->modification_date);      
        
        //update the record
        $user->update($modifiedUser);
        $data['success'] = true;
        $data['message'] = "<div class='alert alert-success alert-dismissable'>" .
             "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" .
             "Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href='#' class='alert-link'>Alert Link</a>." .
             "</div><br/>";
        echo json_encode($data);
    }else{
        echo 'Count not find user with the given userId...';
    }
    
?>

