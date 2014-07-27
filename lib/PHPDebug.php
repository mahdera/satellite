<?php
    class PHPDebug {
        public static function printLogText($text,$fileName){           
            if (file_exists($fileName)){
                error_log($text,3,$fileName);
            }else{
                error_log("Error locating the file [$fileName]",3,$fileName);
            }
        }
    }//end class
?>
