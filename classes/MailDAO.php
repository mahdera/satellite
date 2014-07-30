<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailDAO
 *
 * @author alemayehu
 */
require_once '../core/init.php';
//error_reporting(0);
class MailDAO {
    public function __construct(){        
    }

    public function save($mail){
        try{

            $mailInsert = DBConnection::getInstance()->insert('tbl_mail', array(                
                'from_user_id'                  => $mail->getFromUserId(),
                'to_user_id'                    => $mail->getToUserId(),
                'mail_date'                     => $mail->getMailDate(),
                'mail_title'                    => $mail->getMailTitle(),
                'mail_content'                  => $mail->getMailContent(),
                'mail_status'                   => $mail->getMailStatus()                
            )); 

            if(! DBConnection::getInstance()->insert('tbl_mail', $mailInsert) ){
                throw new Exception('There was a problem sending email.');
            }           
        } catch (Exception $ex) {
            error_log($ex->__toString());
        }
    }   
    

    /*
        This method is used for login action done on the user....be it admin or member user...        
     */
    public function findMailsFrom($mail = null){        
        if($mail){
            $field = (is_numeric($mail)) ? 'from_user_id' : 'mail_title';
            $data = DBConnection::getInstance()->get('tbl_mail', array($field, '=', $mail));

            if($data->count()){
                return $data;
            }
        }
        return false;
    }
    
    public function findMailsTo($mail = null){
        //echo $mail;passed
        if($mail){
            $field = (is_numeric($mail)) ? 'to_user_id' : 'mail_title';
            //echo $field;passed
            $data = DBConnection::getInstance()->get('tbl_mail', array($field, '=', $mail));
            if(isset($data)){
                if($data->count()){
                    return $data;
                }
            }
        }
        return false;
    }
    
    public function delete($fields = array()){                
        if(! DBConnection::getInstance()->delete('tbl_mail', $fields) ){
            throw new Exception('There was a problem deleting mail.');
        }        
    }

    public function find($mail = null){        
        if($mail){
            $field = (is_numeric($mail)) ? 'mail_id' : 'username';
            $data = DBConnection::getInstance()->get('tbl_mail', array($field, '=', $mail));

            if($data->count()){
                $this->data = $data->first();
                return $this->data;
            }
        }
        return false;
    }
}//end class
