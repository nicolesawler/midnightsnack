<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$error = false;
/* Recipes Class */
include_once 'back/db-recipes.php';
/* Validation Class */
include_once 'front/get-view.php';
//get in get-view.php
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
<h1>
    <?= $title ?>
</h1>
 
<?php if(!$empty): ?>
 
    <div class="meta">
        <span>Cook Time:<b> <?= $cooktime ?></b></span>
        <span>Naturals:<b> <?= $organics ?></b></span>
    </div>
    
    
   <div class="output recipe">
       <img src="images/<?= $imagename ?>" class="image"/>
       <p>
           <?= $instructions ?>
       </p>
    <ul>
        <?php
        $ingredients = explode(',', $ingredients);
        foreach($ingredients as $ingredient){
            echo "<li>".$ingredient."</li>";
        }
        ?>
    </ul>
    </div>

 <?php endif; ?>
 <!-- ************************** Output Results On Page **************************** -->  
 
 
</div>


<!-- Footer -->
<?php include_once 'skin/'.$skin.'/footer.php';?> 