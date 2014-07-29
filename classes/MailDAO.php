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

class MailDAO {
    public function __construct(){        
    }

    public function save($mail){
        try{

            $mailInsert = DBConnection::getInstance()->insert('tbl_mail', array(
                'mail_id'                       => $this->getUserId(),
                'from_user_id'                  => $this->getUserType(),
                'to_user_id'                    => $this->getUsername(),
                'mail_date'                     => $this->getUserPassword(),
                'mail_title'                    => $this->getUserFullName(),
                'mail_content'                  => $this->getUserStatus(),
                'mail_status'                   => $this->getEmail()                
            ));            
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
                //$this->data = $data->first();
                return $data;
            }
        }
        return false;
    }
    
    public function findMailsTo($mail = null){
        if($mail){
            $field = (is_numeric($mail)) ? 'to_user_id' : 'mail_title';
            $data = DBConnection::getInstance()->get('tbl_mail', array($field, '=', $mail));

            if($data->count()){
                //$this->data = $data->first();
                return $data;
            }
        }
        return false;
    }
    
    public function delete($fields = array()){                
        if(! DBConnection::getInstance()->delete('tbl_mail', $fields) ){
            throw new Exception('There was a problem deleting mail.');
        }        
    }
}//end class
