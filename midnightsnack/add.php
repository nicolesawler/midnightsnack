<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$error = false;
/* Recipes Class */
include_once 'back/db-recipes.php';
//Include on Post 
include_once 'front/post-add.php';
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
if($saved != "") {
   echo '<div class="saved">Saved.</div>';
}
?>
    
<h1>
    Add New Recipe
</h1>

   <div class="output recipe">	
       
       <form class="add_form" method="post" enctype="multipart/form-data">
           
       <p><label>Title</label><br>
           <input name="title" type="text">
       </p>

       <p><label>Instructions</label><br>
           <textarea name="instructions" cols="100" rows="10"></textarea>
       </p>

       <p><label>Ingredients (separate with comma)</label><br>
           <textarea name="ingredients" cols="100" rows="10"></textarea>
       </p>
    
       
       <p><label>Cook Time (ex: 20 mins)</label><br>
           <input name="time" type="text">
       </p>
       
       <p><label>Orangics (separate with comma)</label><br>
           <input name="organics" type="text">
       </p>
       
       <p><label>Image</label><br>
            <input name="image" type='file' onchange="readURL(this);" />
            <br>
            <img id="blah" src="#" alt="your image" style="max-width:250px;" />
       </p>
       
       
       <p><label>Category</label><br>
           <select name="category" >
               <?php

                    //Get categories List
                    try
                     {

                        if($categories = $categoriesObj->getCategories()){ 
                            foreach ($categories as $category) 
                            { 
                                echo "<option>".$category['title']."</option>";
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
               
           </select>
       </p>
       
       <input type="submit" name="submit" />
       
   </form>
    </div>

</div>



<!-- Footer -->
<script>
    // *** Preview Image on Image Chosen *** //
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                        //.width(350)
                        //.height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    // *** Preview Image on Image Chosen *** //
</script>
<?php include_once 'skin/'.$skin.'/footer.php';?> 