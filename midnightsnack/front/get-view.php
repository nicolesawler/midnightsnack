<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// *** Check if Recipe is set *** //
if(isset($_GET["recipe"])){
    $empty = false;
    $recipeViewing = $_GET["recipe"];
    
        
      // *** Get Recipe Information *** //
        try
         {
            if($r = $recipesObj->getRecipesBySlug($recipeViewing)){ 
                 $title = $r['title'];
                 $ingredients = $r['ingredients'];
                 $instructions = $r['instructions'];
                 $cooktime = $r['time'];
                 $organics = $r['organics'];
                 $imagename = $r['filename'];
                 $categoryTag = $r['category'];
            }else{
                $recipesObj->error = "<p align=center><br><br><b>No Recipe!</b></p>";
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        } 
        
        //Create Page Title
        $title = $title;
        
        
}else{
    //redirect back home if theres no recipe chosen
    //$recipesObj->redirect('home');
    $empty = true;
    $title = "Choose A Recipe";
}


// *** Check if Category is set *** //
if(isset($_GET["category"])){
    $categoryChosen = $_GET["category"];
}else{
    //make selected recipe category the one chosen
    $categoryChosen = $categoryTag;
}
