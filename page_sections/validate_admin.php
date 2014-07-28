<?php
    require_once '../core/init.php';
    
    $errors = array();
    $data = array(); 
    
    /*get the form variables here...*/
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = new User();
    
    if($user->login($username, $email, $password)){
        //now check if this particular admin exists in the database....
        $data['success'] = true;
        $data['message'] = 'Success!';    
        echo json_encode($data);//returns json representation of the data value.....        
    }else{
        echo 'Failed to login';
    }
    
    
?>