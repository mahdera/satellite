<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author alemayehu
 */
class User {
    private $userId;
    private $userType;
    private $username;
    private $userPassword;
    private $userFullName;
    private $userStatus;
    private $email;
    private $userLastValidLogin;
    private $userFirstInvalidLogin;
    private $userFailedLoginCount;    
    private $userCreateDate;
    private $modifiedBy;
    private $modificationDate;
    private $userDAO = null;
    private $sessionName;
    
    function __construct() {
        $this->sessionName = Config::get('session/session_name');
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
        $this->userPassword = MD5($userPassword);
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

    public function create(){
    	$userDAO->save($this);
    }

    public function login($username = null, $email = null, $password = null){
    	$userDao = new UserDAO();
    	$fetchedUser = $userDao->find($username);

    	if($fetchedUser){
    		//there is a record with the given username...then do the filter for email...
    		if($fetchedUser->email === $email){
    			//now the username and the password happen to be the same...
    			//I need to filter once more which is using password
    			if($fetchedUser->user_password === MD5($password)){    				
    				//login successfull
                    Session::put($this->sessionName, $fetchedUser->user_id);
    				return true;
    			}
    		}	
    	}else{
    		//failed to login    		
    		return false;
    	}
    }

    public function getUserUsingUserId($userId){
        $userDao = new UserDAO();
        $fetchedUser = $userDao->find($userId);
        return $fetchedUser;
    }

    public function logout(){
        Session::delete($this->sessionName);
    }

    public function getUserDAO(){
    	return $this->userDAO;
    }

    public function setUserDAO($userDAO){
    	$this->userDAO = $userDAO;
    }

    public function getUserFullName(){
        return $this->userFullName;
    }

    public function setUserFullName($userFullName){
        $this->userFullName = $userFullName;        
    }
}//end class
