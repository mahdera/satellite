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
    
    //this are transient values...not going to be saved to the database...
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

    public function getUserFullName() {
        return $this->userFullName;
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

    public function getUserDAO() {
        return $this->userDAO;
    }

    public function getSessionName() {
        return $this->sessionName;
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

    public function existingUserPassword($userPassword){
        $this->userPassword = $userPassword;
    }

    public function setUserFullName($userFullName) {
        $this->userFullName = $userFullName;
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

    public function setUserDAO($userDAO) {
        $this->userDAO = $userDAO;
    }

    public function setSessionName($sessionName) {
        $this->sessionName = $sessionName;
    }
    
    public function create(){
    	$userDAO->save($this);
    }
    
    public function update($user){
        $userDAO = new UserDAO();
        //now build the array represting the php object...
        $fields = array(
            'user_type' => $user->getUserType(),
            'username'  => $user->getUsername(),
            'user_password' => $user->getUserpassword(),
            'user_full_name' => $user->getUserFullName(),
            'user_status' => $user->getUserStatus(),
            'email' => $user->getEmail(),
            'user_last_valid_login' => $user->getUserLastValidLogin(),
            'user_first_invalid_login' => $user->getUserFirstInvalidLogin(),
            'user_faild_login_count' => $user->getUserFailedLoginCount(),
            'user_create_date' => $user->getUserCreateDate(),
            'modified_by' => $user->getModifiedBy(),
            'modification_date' => $user->getModificationDate()
        );
        $userDAO->update($user->getUserId() , $fields);        
    }
    
    public function userExistsWithCredentials($username, $email, $password){
        $userDao = new UserDAO();
    	$fetchedUser = $userDao->find($username);

    	if($fetchedUser){
            //there is a record with the given username...then do the filter for email...
            if($fetchedUser->email === $email){
                    //now the username and the password happen to be the same...
                    //I need to filter once more which is using password
                    if($fetchedUser->user_password === MD5($password)){    				
                        return true;
                    }
            }	
    	}else{
            //failed to login    		
            return false;
    	}
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

    public function getUserUsingEmailAddress($email){        
        $userDao = new UserDAO();
        $fetchedUser = $userDao->findUsingEmail($email);        
        return $fetchedUser;
    }

    public function logout(){
        Session::delete($this->sessionName);
    }
    
}//end class
