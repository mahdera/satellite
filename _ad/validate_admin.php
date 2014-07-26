<?php
    require_once '../dao_classes/UserDAO.php';
    /*get the form variables here...*/
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //now check if this particular admin exists in the database....
    
?>