<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAO
 *
 * @author alemayehu
 */
require_once '../database_access/DBConnection.php';

class UserDAO {
    private $userId;
    private $userType;
    private $username;
    private $userPassword;
    private $userStatus;
    private $email;
    private $userLastValidLogin;
    private $userFirstInvalidLogin;
    private $userFailedLoginCount;    
    private $userCreateDate;
    private $modifiedBy;
    private $modificationDate;
    
    function __construct() {
        
    }
    
    public function getUserId() {
        return $this->userId;
    }

    public function getUserType() {
        return $this->userType;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getUserPassword() {
        return $this->userPassword;
    }

    public function getUserStatus() {
        return $this->userStatus;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUserLastValidLogin() {
        return $this->userLastValidLogin;
    }

    public function getUserFirstInvalidLogin() {
        return $this->userFirstInvalidLogin;
    }

    public function getUserFailedLoginCount() {
        return $this->userFailedLoginCount;
    }    

    public function getUserCreateDate() {
        return $this->userCreateDate;
    }

    public function getModifiedBy() {
        return $this->modifiedBy;
    }

    public function getModificationDate() {
        return $this->modificationDate;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setUserType($userType) {
        $this->userType = $userType;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }

    public function setUserStatus($userStatus) {
        $this->userStatus = $userStatus;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUserLastValidLogin($userLastValidLogin) {
        $this->userLastValidLogin = $userLastValidLogin;
    }

    public function setUserFirstInvalidLogin($userFirstInvalidLogin) {
        $this->userFirstInvalidLogin = $userFirstInvalidLogin;
    }

    public function setUserFailedLoginCount($userFailedLoginCount) {
        $this->userFailedLoginCount = $userFailedLoginCount;
    }    

    public function setUserCreateDate($userCreateDate) {
        $this->userCreateDate = $userCreateDate;
    }

    public function setModifiedBy($modifiedBy) {
        $this->modifiedBy = $modifiedBy;
    }

    public function setModificationDate($modificationDate) {
        $this->modificationDate = $modificationDate;
    }

    public function save(){
        try{
            $stringCommand = "insert into tbl_user(user_id, user_type, username, user_password, user_status,"
                    . "email, user_last_valid_login, user_first_invalid_login, user_faild_login_count,"
                    . "user_create_date, modified_by, modification_date) values(?,?,?,?,?,?,?,?,?,?,?,?)";            
            //now create an associative array and add the parameters to it...
            $parameterNameArray[0] = "userId";
            $parameterNameArray[1] = "userType";
            $parameterNameArray[2] = "username";
            $parameterNameArray[3] = "userPassword";
            $parameterNameArray[4] = "userStatus";
            $parameterNameArray[5] = "email";
            $parameterNameArray[6] = "userLastValidLogin";
            $parameterNameArray[7] = "userFirstInvalidLogin";
            $parameterNameArray[8] = "userFaildLoginCount";
            $parameterNameArray[9] = "userCreateDate";
            $parameterNameArray[10] = "modifiedBy";
            $parameterNameArray[11] = "modificationDate";
            
            $parameterValueArray[0] = $this->getUserId();
            $parameterValueArray[1] = $this->getUserType();
            $parameterValueArray[2] = $this->getUsername();
            $parameterValueArray[3] = $this->getUserPassword();
            $parameterValueArray[4] = $this->getUserStatus();
            $parameterValueArray[5] = $this->getEmail();
            $parameterValueArray[6] = $this->getUserLastValidLogin();
            $parameterValueArray[7] = $this->getUserFirstInvalidLogin();
            $parameterValueArray[8] = $this->getUserFailedLoginCount();
            $parameterValueArray[9] = $this->getUserCreateDate();
            $parameterValueArray[10] = $this->getModifiedBy();
            $parameterValueArray[11] = $this->getModificationDate();            
            //execute the statement
            DBConnection::executePreparedStatement($stringCommand,$parameterNameArray, $parameterValueArray);
        } catch (Exception $ex) {
            error_log($ex->__toString());
        }
    }
    
    public static function getUserAccount($username,$email,$password){
        //validate on the server side just in case the javascript is disabled on the client side...
        if(! empty($username) && !empty($email) && ! empty($password)){
            $stringQuery = "select user_type from tbl_user where username = ? and email = ? and password = ?";
            $prepStmt = DBConnection::getPreparedStatement($stringQuery);
            
            if($prepStmt){
                echo 'passed. u can do db code in here';
                $prepStmt->bind_param("sss", $username,$email,$username);
                PHPDebug::printLogText($prepStmt->error, "debug.txt");
            }else{
                PHPDebug::printLogText($prepStmt->error, "debug.txt");
            }
            /*
            
            $parameterValueArray[0] = $username;
            $parameterValueArray[1] = $email;
            $parameterValueArray[2] = $password;
            $parameterTypeOrder = "sss";
            $resultSet = array();
            $resultSet = DBConnection::readFromDatabase($stringQuery, $parameterTypeOrder, $parameterValueArray);
            
            //now display the content of the array to test....
            var_dump($resultSet);
             * */
             
        }
    }
}//end class
