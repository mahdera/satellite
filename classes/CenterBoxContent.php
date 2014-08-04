<?php
    require_once '../core/init.php';
    class CenterBoxContent {
        private $centerBoxContentId;
        private $title;
        private $content;
        private $postDate;
        private $modifiedBy;
        private $modificationDate;
        
        public function __construct($title, $content, $postDate, $modifiedBy, $modificationDate){
            $this->title = $title;
            $this->content = $content;
            $this->postDate = $postDate;
            $this->modifiedBy = $modifiedBy;
            $this->modificationDate = $modificationDate;
        }
        
        
    }//end class
    
?>