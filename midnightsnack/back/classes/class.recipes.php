<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RECIPES
{	
	
private $recipesDB;
private $table = "recipes";
public $error;


    function __construct($db_con)
    {
      $this->recipesDB = $db_con;
    }

/* 
 * Get Everything from Recipes table
 * @params None
 * @return Array of Everything
 */
    public function getRecipes()
    {
       try
       { 
          $stmt = $this->recipesDB->prepare("SELECT * FROM  recipes.recipes" );
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
            return $results;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

/* 
 * Get Recipes List by Category
 * @params string Category
 * @return Array of Everything
 */
    public function getRecipesByCategory($cat)
    {
       try
       { 
          $stmt = $this->recipesDB->prepare("SELECT title,slug FROM recipes.recipes WHERE category = '$cat'");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
            return $results;
          }
          else{
              return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
   

/* 
 * Get Recipes By Slug
 * @params string slug
 * @return Array of Everything from one single recipe
 */
    public function getRecipesBySlug($slug)
    {
       try
       { 
          $stmt = $this->recipesDB->prepare("SELECT * FROM recipes.recipes WHERE slug = '$slug'");
            $stmt->execute();
            $result = $stmt->fetch();

          if($stmt->rowCount() > 0)
          {
            return $result;
          }
          else{
              return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
   
   
   
   
   
   
/* 
 * Add Recipe To Database
 * @params all params from form
 * @return Statement String
 */
    public function addRecipe($title,$slug,$ingredients,$instructions,$category,$organics,$time,$filename)
    { 
       
      try
       {
	$sql = "INSERT INTO recipes.recipes (`title`,`slug`, `ingredients`, `instructions`, `time`, `organics`, `category`, `filename`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $this->recipesDB->prepare($sql); 
			$stmt->bindParam(1, $title, PDO::PARAM_STR);       
			$stmt->bindParam(2, $slug, PDO::PARAM_STR);       
			$stmt->bindParam(3, $ingredients, PDO::PARAM_STR);       
			$stmt->bindParam(4, $instructions, PDO::PARAM_STR);    
                        $stmt->bindParam(5, $time, PDO::PARAM_STR);          
                        $stmt->bindParam(6, $organics, PDO::PARAM_STR);           
                        $stmt->bindParam(7, $category, PDO::PARAM_STR);             
                        $stmt->bindParam(8, $filename, PDO::PARAM_STR);              
			$stmt->execute(); 

           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
   
   
   
   
   /**
    * Redirect to URL
    * @return void.
    */
   public function redirect($url)
   {
       header("Location: $url");
   }
    /**
    * Print error msg function
    * @return void.
    */
    public function printError(){
        print $this->error;
    }
    
}