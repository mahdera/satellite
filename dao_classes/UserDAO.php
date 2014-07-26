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
            $statement = DBConnection::getPreparedStatement($stringCommand);
            //now bind the parameters with the place holder question mark symbols...
            $userId = $this->getUserId();
            $userType = $this->getUserType();
            $username = $this->getUsername();
            $userPassword = $this->getUserPassword();
            $userStatus = $this->getUserStatus();
            $email = $this->getEmail();
            $userLastValidLogin = $this->getUserLastValidLogin();
            $userFirstInvalidLogin = $this->getUserFirstInvalidLogin();
            $userFaildLoginCount = $this->getUserFailedLoginCount();
            $userCreateDate = $this->getUserCreateDate();
            $modifiedBy = $this->getModifiedBy();
            $modificationDate = $this->getModificationDate();
            
            $statement->bind_param("isssssssssss", $userId, $userType, $username, $userPassword, $userStatus,
                    $email, $userLastValidLogin, $userFirstInvalidLogin, $userFaildLoginCount, $userCreateDate,
                    $modifiedBy, $modificationDate);
            //execute the statement
            DBConnection::executePreparedStatement($statement);
        } catch (Exception $ex) {
            error_log($ex->__toString());
        }
    }
    
    public static function getUserAccount($username,$email,$password){
        //validate on the server side just in case the javascript is disabled on the client side...
        if(! empty($username) && !empty($email) && ! empty($password)){
            $stringQuery = "select * from tbl_user where username = ? and email = ? and password = ?";
            $statement = DBConnection::getPreparedStatement($stringQuery);
            $username = $this->getUsername();
            $email = $this->getEmail();
            $password = MD5($this->getUserPassword());
            $statement->bind_param('sss', $username, $email, $password);
            $result = DBConnection::readFromDatabase($statement);
            while($row = $result->fetch_array(MYSQLI_NUM)){
                foreach ($row as $r){
                    print($r+"<br/>");
                }
            }//end while loop
        }
    }
}//end class
