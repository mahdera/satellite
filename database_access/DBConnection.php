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
class DBConnection {
    private static $databaseName = "db_satellite";

    private static function connect(){
      $hostname = 'localhost';
      $uname = 'root';
      $passwd = 'root';      

      $mysqliConnection = new mysqli($hostname, $uname, $passwd, $databaseName);       
      if(mysqli_connect_errno()) {
        echo "Connection Failed: " . mysqli_connect_errno();
        exit();
      }
      return $mysqliConnection;
    }
    
    public static function getPreparedStatement($stringQuery){
        $connection = DBConnection::connect();
        //initialize the prepared statement from the database connection...
        $stmt = $connection->stmt_init();
        //now create a prepared statement
        $stmt->prepare($stringQuery);        
        return $stmt;
    }
    
    public static function executePreparedStatement($stmt){
        $stmt->execute();
        //finally close the connection
        $stmt->close();
    }    
}//end class
