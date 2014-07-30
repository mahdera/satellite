<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author alemayehu
 */
class Mail {
    private $mailId;
    private $fromUserId;
    private $toUserId;
    private $mailDate;
    private $mailTitle;
    private $mailContent;
    private $mailStatus;
    
    private $mailDAO = null;
    private $sessionName;
    
    public function __construct() {
        $this->sessionName = Config::get('session/session_name');
    }
    
    public function getMailId() {
        return $this->mailId;
    }

    public function getFromUserId() {
        return $this->fromUserId;
    }

    public function getToUserId() {
        return $this->toUserId;
    }

    public function getMailDate() {
        return $this->mailDate;
    }

    public function getMailTitle() {
        return $this->mailTitle;
    }

    public function getMailContent() {
        return $this->mailContent;
    }

    public function getMailStatus() {
        return $this->mailStatus;
    }

    public function setMailId($mailId) {
        $this->mailId = $mailId;
    }

    public function setFromUserId($fromUserId) {
        $this->fromUserId = $fromUserId;
    }

    public function setToUserId($toUserId) {
        $this->toUserId = $toUserId;
    }

    public function setMailDate($mailDate) {
        $this->mailDate = $mailDate;
    }

    public function setMailTitle($mailTitle) {
        $this->mailTitle = $mailTitle;
    }

    public function setMailContent($mailContent) {
        $this->mailContent = $mailContent;
    }

    public function setMailStatus($mailStatus) {
        $this->mailStatus = $mailStatus;
    }
    
    public function getMailDAO() {
        return $this->mailDAO;
    }

    public function getSessionName() {
        return $this->sessionName;
    }

    public function setMailDAO($mailDAO) {
        $this->mailDAO = $mailDAO;
    }

    public function setSessionName($sessionName) {
        $this->sessionName = $sessionName;
    }

    
    public function send($mail){
        $mailDao = new MailDAO();
        $mailDao->save($mail);        
    }
    
    public function getAllMailsTo($userId){
        //echo $userId;passed
        $mailDao = new MailDAO();
        $fetchedMail = $mailDao->findMailsTo($userId);
        //var_dump($fetchedMail);failed...
        return $fetchedMail;
    }
    
    public function getAllMailsFrom($userId){
        //echo $userId;passed
        $mailDao = new MailDAO();
        $fetchedMail = $mailDao->findMailsFrom($userId);
        return $fetchedMail;
    }
    
    public function delete($mail){
        $mailDao = new MailDAO();
        $mailDao->delete($mail);
    }

    public function getMailUsingMailId($mailId){
        $mailDao = new MailDAO();
        $fetchedMail = $mailDao->find($mailId);
        return $fetchedMail;
    }
}//end class
