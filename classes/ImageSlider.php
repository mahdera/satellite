<?php
    require_once '../core/init.php';
    class ImageSlider{
        private $imageId;
        private $imagePath;
        private $fileName;
        private $uploadDate;
        private $modifiedBy;
        private $modificationDate;
            
        function __construct($imagePath, $fileName, $uploadDate, $modifiedBy, $modificationDate) {            
            $this->imagePath = $imagePath;
            $this->fileName = $fileName;
            $this->uploadDate = $uploadDate;
            $this->modifiedBy = $modifiedBy;
            $this->modificationDate = $modificationDate;
        }
        
        public function getImageId() {
            return $this->imageId;
        }

        public function getImagePath() {
            return $this->imagePath;
        }

        public function getFileName() {
            return $this->fileName;
        }

        public function getUploadDate() {
            return $this->uploadDate;
        }

        public function getModifiedBy() {
            return $this->modifiedBy;
        }

        public function getModificationDate() {
            return $this->modificationDate;
        }

        public function setImageId($imageId) {
            $this->imageId = $imageId;
        }

        public function setImagePath($imagePath) {
            $this->imagePath = $imagePath;
        }

        public function setFileName($fileName) {
            $this->fileName = $fileName;
        }

        public function setUploadDate($uploadDate) {
            $this->uploadDate = $uploadDate;
        }

        public function setModifiedBy($modifiedBy) {
            $this->modifiedBy = $modifiedBy;
        }

        public function setModificationDate($modificationDate) {
            $this->modificationDate = $modificationDate;
        }


        public function save(){
            try{
                $imageInsert = DBConnection::getInstance()->insert('tbl_home_page_image_slider', array(
                    'image_path'                    => $this->getImagePath(),
                    'file_name'                     => $this->getFileName(),
                    'upload_date'                   => $this->getUploadDate(),
                    'modified_by'                   => $this->getModifiedBy(),
                    'modification_date'             => $this->getModificationDate()                    
                    )
                );   
                if(! DBConnection::getInstance()->insert('tbl_home_page_image_slider', $imageInsert) ){
                    throw new Exception('There was a problem sending email.');
                }           
            } catch (Exception $ex) {
                error_log($ex->__toString());
            }
        }

    }//end class
?>