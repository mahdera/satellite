<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnection
 *
 * @author alemayehu
 */
require_once '../lib/PHPDebug.php';

class DBConnection {
    private static $_instance = null;
    private $_pdo;
    private $_query;
    private $_error = false;
    private $_results;
    private $_count = 0;
    
    private function __construct() {
        try{
            $this->_pdo = new PDO("mysql:host=".Config::get("mysql/host").";dbname=".Config::get("mysql/db"),
                    Config::get("mysql/username"),Config::get("mysql/password"));
                    
        } catch (Exception $ex) {
            PHPDebug::printLogText("Connection Failed : ". $ex->getMessage() , "../lib/debug.txt");
            die($ex->getMessage());
        }
    }
    
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DBConnection();
        }
        return self::$_instance;
    }
    
    public function query($sql, $params = array()){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }else{
                $this->_error = true;
            }
        }
        return $this;
    }
    
    public function error(){
        return $this->_error;
    }
    
    private function action($action, $table, $where = array()){
        if(count($where) === 3){
            $operators = array('=', '<', '>', '<=', '>=');
            
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
            
            if(in_array($operator, $operators)){
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if( !$this->query($sql, array($value))->error() ){
                    return $this;
                }
            }
        }
    }
    
    public function get($table, $where){
        return $this->action('SELECT *', $table, $where);
    }
    
    public function delete($table, $where){
        return $this->action('DELETE', $table, $where);
    }
    
    public function count(){
        return $this->_count;
    }
    
    
    

    private static function connect(){
      $hostname = 'localhost';
      $uname = 'root';
      $passwd = 'root';      

      $mysqliConnection = mysqli_connect($hostname, $uname, $passwd, DBConnection::$databaseName);
//new mysqli($hostname, $uname, $passwd, DBConnection::$databaseName);       
      if(mysqli_connect_errno()) {
                
        exit();
      }
      return $mysqliConnection;
    }
    
    public static function getPreparedStatement($stringQuery){
        $connection = DBConnection::connect();
        //initialize the prepared statement from the database connection...
        $stmt = $connection->stmt_init();
        //now create a prepared statement
        try{
            $stmt->prepare($stringQuery);
            return $stmt;
        }catch(Exception $ex){
            PHPDebug::printLogText($ex->__toString(), $fileName);
        }
        
    }
    
    public static function executePreparedStatement($stringQuery,$parameterNameArray,$parameterValueArray){
        $stmt = DBConnection::getPreparedStatement($stringQuery);
        //now for each element in the $parameterArray bind them with the value
        for($i=0; $i < sizeof($parameterNameArray); $i++){            
            $stmt->bind_param(($i+1), $parameterNameArray[$i]);            
        }
        //insert the datavalues to the parameters..
        for($j=0; $j < sizeof($parameterValueArray); $j++){
            $parameterNameArray[$j] = $parameterValueArray[$j];
            //execute the association here
            $stmt->execute();
        }        
        $stmt->close();
    }   
    
    public static function readFromDatabase($stringQuery,$parameterTypeOrder,$parameterValueArray){
        $stmt = DBConnection::getPreparedStatement($stringQuery);
        /*$buildString = "";
        for($i=0; $i<sizeof($parameterValueArray); $i++){
            $buildString .= $parameterValueArray[$i].",";
        }*/
        //now remove the last comma from the string...
        //$str = chop($buildString, ",");
        //echo 'parameterTypeOrder is : '.$parameterTypeOrder.'\n';
        //echo 'the build string is : '.$str.'<br/>';
        //echo 'the sqlstring is : '.$stringQuery;
        if($stmt){
            //bind parameters for markers
            $username = "mahder";
            $email = "mahder.neway@echoorigin.com";
            $password = "Iloveleki6";
            $stmt->bind_param("ss", $username,$email);
            
            //execute query
            $stmt->execute();
            
            //bind result variables-set
            $stmt->bind_result($resultSet);
            
            //fetch value
            $stmt->fetch();
            
            return $resultSet;
        }else{
            error_log("Error accessing database...");
        }
        /*
        //$stmt->bind_param($parameterTypeOrder, $str);
        //$stmt->bind_param("sss", "mahder","mahder.neway.echoorigin.com","Iloveleki7");
        
        
        //$stmt->bind_param("s", $email);
        //$stmt->bind_param("s", $password);
        $stmt->execute();
        $stmt->store_result();
        
        //prepare for fetching result...
        $result = array();
        
        while($stmt->fetch()){
            foreach($result as $key => $value){
                $row[$key] = $value;
            }//end foreach loop
            $data[] = $row;
        }//end while loop        
        $stmt->free_result();
        $stmt->close();
        return $data;
        */
    }
}//end class
