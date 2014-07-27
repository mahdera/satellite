<?php
    require_once '../dao_classes/UserDAO.php';
    
    $errors = array();
    $data = array(); 
    
    /*get the form variables here...*/
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    UserDAO::getUserAccount($username, $email, $password);
    
    //now check if this particular admin exists in the database....
    $data['success'] = true;
    $data['message'] = 'Success!';    
    echo json_encode($data);//returns json representation of the data value.....
?>