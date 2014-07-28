<?php
    require_once '../core/init.php';
    $uId = $_GET['uId'];
    $data = array();
    //now get the user using this particular id value
    $user = new User();
    $fetchedUser = $user->getUserUsingUserId($uId);
    //now populate the form data to JSON    
    $data['user_type'] = $fetchedUser->user_type;
    $data['username'] = $fetchedUser->username;
    $data['user_full_name'] = $fetchedUser->user_full_name;
    $data['user_status'] = $fetchedUser->user_status;
    $data['email'] = $fetchedUser->email;
    $data['user_create_date'] = $fetchedUser->user_create_date;
    $data['modification_date'] = $fetchedUser->modification_date;
    $data['success'] = true;
    
    echo json_encode($data);
?>

