<?php

//Include validation class
include 'classes/class.validate.php';
$validateObj = new VALIDATE(); 
 

/**
* Display Saved On Button Click and Redirected Back
*/

$s = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '?') + 1);
$saved = ($s == 'saved' ? 'savesuccess' : "");



/**
* Add New Recipe on Button Click
* @param Posts form params
* @return redirects back to page to clear form on success
*/

if(isset($_POST['submit']))
{
    //do some validation on the inputs
    $title = $validateObj->basicValidation($_POST['title']);
    $ingredients = $validateObj->basicValidation($_POST['ingredients']);
    $instructions = $validateObj->basicValidation($_POST['instructions']);
    $category = $validateObj->basicValidation($_POST['category']);
    $organics = $validateObj->basicValidation($_POST['organics']);
    $time = $validateObj->basicValidation($_POST['time']);
    
    //upload the image
    if(!$image = $validateObj->checkImage($_FILES['image'])){
        $error = true;
    }else{
        $filename = $_FILES['image']['name'];
    }
    
    //create the slug
    $slug = $validateObj->titleToSlug($title);
 
    //insert into the database

    try
     {
        if($recipesObj->addRecipe($title,$slug,$ingredients,$instructions,$category,$organics,$time,$filename)) 
        {
            //redirect back if inserted correctly
           return $recipesObj->redirect('add.php?saved');
        }
    }
    catch(PDOException $e)
    {
       $e->getMessage();
    }
   
 
}//if(isset($_POST['submit']))



/* 
 * Copyright 2019 Nicole Sawler.
 *
*/