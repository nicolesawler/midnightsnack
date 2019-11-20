<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VALIDATE
{	
    
    // *** BASIC VALIDATION ON ANYTHING *** //
	public function basicValidation($input)
	{
		$input = trim($input);
		$input = strip_tags($input);
		$input = stripcslashes($input);
		$input = htmlspecialchars($input);
		return $input; 
	} 
        
    // *** Create Slug *** //
	public function titleToSlug($input)
	{
            //lowercase
		$input = strtolower($input);
            //replace spaces with dashes
		$input = str_replace(' ', '-', $input);
            //remove all special characters for letters and numbers only
                $input = preg_replace('/[^A-Za-z0-9\-]/', '', $input);
            //return
		return $input; 
	}   
        
    // *** CHECK AND UPLOAD IMAGE *** //
	public function checkImage($input)
	{
            // upload image
            $target_dir = "images/";
            $target_file = $target_dir . basename($input["name"]);
 
            //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
            //Return true if file is correct image
            $checkIfFileIsImage = getimagesize($input["tmp_name"]);
            
            if($checkIfFileIsImage) {
                //echo "File is an image - " . $checkIfFileIsImage["mime"] . ".";
                
                if (move_uploaded_file($input["tmp_name"], $target_file)) {
                    //echo "The file ". basename( $input["name"]). " has been uploaded.";
                    return true;
                } else {
                     return false;
                }
                
            }else{
                return false;
            } 
            
          
	}  
        
}

