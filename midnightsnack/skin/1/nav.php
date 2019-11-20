<nav>
  
<?php

//Get categories List
//Class from back/db-recipes Recipes Objects (class.recipes.php)
try
 {

    if($categories = $categoriesObj->getCategories()){ 
        foreach ($categories as $category) 
        { ?>
            <div class="link">
                <a href="view?category=<?= $category['slug'];?>"><?= $category['title'];?></a>
            </div>
            
          <?php
       }
    }else{
        echo "<p align=center><b>No Categories Yet!</b></p>";
    }


}
catch(PDOException $e)
{
    echo $e->getMessage();
}  
?>
    
    
</nav>
<div class="clear"></div>