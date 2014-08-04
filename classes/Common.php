<?php
require_once '../core/init.php';
class Common {

    public static function uploadFile($filename, $actualSize, $sizeLimit, $destination) {
        if ($actualSize < $sizeLimit) {
            $fExtension = Common::findExtension($fullPath);
            $fileName = $destination . $fExtension;
            move_uploaded_file($_FILES[image_name][tmp_name], $fileName);
        }
    }
    
    public static function constructUniqueFileName($fileName, $extension, $prefix, 
        $tableName, $pkField){
        //echo $fileName.' '.$extension.' '.$prefix.' '.$tableName;
    	try{    		
    		$autoNumber = Common::getAutomaticNumberFromTable($tableName, $pkField);
    		$uniqueName = $prefix. $autoNumber. "." .$extension;    		
    		return $uniqueName;
    	}catch(Exception $e){
    		$e->__toString();
    	}
    }
      
    
    public static function getAutomaticNumberFromTable($tableName, $pkField){
    		
            $result = DBConnection::getInstance()->getAllRecordsFromTable($tableName, 
                $pkField);

            if(!empty($result)){
                $maxId = $result->count();
                echo 'max id is: '.$maxId;
                return ($maxId + 1);
            }else{
                return 1;
            } 		
    		
    		if($result){
    			$row = mysql_fetch_array($result);
    			$nextId = $row[0];
    			$nextId++;
    			return $nextId;
    		}else
    			return 0;
    }    
    
}//end class
?>
