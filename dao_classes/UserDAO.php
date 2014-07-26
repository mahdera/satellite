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
    private $userCreatedBy;
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

    public function getUserCreatedBy() {
        return $this->userCreatedBy;
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

    public function setUserCreatedBy($userCreatedBy) {
        $this->userCreatedBy = $userCreatedBy;
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
            
        } catch (Exception $ex) {

        }
    }
}//end class
