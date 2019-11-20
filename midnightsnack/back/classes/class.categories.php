<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CATEGORIES
{	
	
private $recipesDB;

    function __construct($db_con)
    {
      $this->recipesDB = $db_con;
    }

    //Get All Categories
    public function getCategories()
    {
       try
       { 
          $stmt = $this->recipesDB->prepare("SELECT * FROM recipes.categories");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

           if($stmt->rowCount() > 0)
          {
            //return categegories array
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
 
  
    
    
}