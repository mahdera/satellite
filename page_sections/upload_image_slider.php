<?php
    require_once '../core/init.php';
    $modifiedBy = Session::get(Config::get('session/session_name'));

    $fname = $_POST["myObj"];   
    //echo $fname;

    if(isset($_FILES['file'])){
        //The error validation could be done on the javascript client side.
        $errors= array();        
        $file_name = $_FILES['file']['name'];
        //echo 'the file name is : '.$file_name;
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];   
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg","jpg","png", "gif"); 

        if(in_array($file_ext,$extensions )=== false){
         $errors[]="image extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 2097152){
            $errors[]='File size cannot exceed 2 MB';
        }               
        if(empty($errors) == true){
            //now before uploading the picture...i need to rename it
            $uniqueFileName = Common::constructUniqueFileName($file_name, $file_ext, 'IPS', 'tbl_home_page_image_slider', 'image_id');
            move_uploaded_file($file_tmp, "image_slider/" . $uniqueFileName);
            $now = date("Y-m-d h:i:sa");
            echo $fname . " uploaded file: " . "image_slider/" . $file_name;
            //after finishing uploading...lets save this info to the database...
            $imageSlider = new ImageSlider('image_slider', $uniqueFileName, $now, $modifiedBy, $now);
            $imageSlider->save();
        }else{
            print_r($errors);
        }
    }else{
        echo 'Something went wrong...';
    }

?>