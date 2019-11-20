<?php
$error = false;
/* Recipes Class */
include_once 'back/db-recipes.php';
$title = 'All Recipes';
?>
<!-- Header -->
<?php include_once 'skin/'.$skin.'/header.php';?>  
<!-- Nav -->
<?php include_once 'skin/'.$skin.'/nav.php';?> 
<!-- Sidebar -->
<?php include_once 'skin/'.$skin.'/aside.php';?> 


<div class="content">

<?php
 // *** Error Display *** //
if(isset($recipesObj->error)) {
   $recipesObj->printError();
   $error = true;
}
?>
    
<!-- ************************** Output Results On Page **************************** -->   
<div class="output recipes">	
    
<?php

//Get categories List
//Class from back/db-recipes Recipes Objects (class.recipes.php)
try
 {
    if($items = $recipesObj->getRecipes()){ 
        foreach ($items as $item) 
        { ?>
    <div class="item">
            <a href="view?recipe=<?= $item['slug'];?>"><?= $item['title'];?></a>
            <img src="images/<?= $item['filename'];?>" class="image"/>
            <a href="view?category=<?= $item['category'];?>"><?= $item['category'];?></a>
            
     </div>
            
          <?php
       }
    }else{
        echo "<p align=center><b>No Recipes Yet!</b></p>";
    }
}
catch(PDOException $e)
{
    echo $e->getMessage();
}  
?>  
    </div>
 <!-- ************************** Output Results On Page **************************** --> 

</div>

<!-- Footer -->
<?php include_once 'skin/'.$skin.'/footer.php';?> 