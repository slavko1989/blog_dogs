<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");
    $cat = new CatView();
    $cat->confirm_delete();
    ?>

<div class="container">
  <h2>ADD CATEGORY</h2>
  <p>CREATE NEW CATEGORY</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"><?php  $cat->execute_cat(); ?>
</div>
  </div>
  <form method="post" id="insert_form" action="<?php $_SERVER['PHP_SELF']; ?>">
<table class="table table-bordered table-dark" style="color: black;">
  <thead>
    <tr>
      <th scope="col">CATEGORY NAME</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" id="cat_post_name" name="cat_post_name"></td>
      <td><input type="submit" id="create" name="add_cat" value="INSERT"></td>
    </tr>
  </tbody>
</table>
</form>
<h2>All Category</h2>
 <p>Table for category</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>CATEGORY</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php

        $view_cats = $cat->viewAllCat();
        if(is_array($view_cats) or is_object($view_cats)){
          foreach($view_cats as $view_cat){
        ?>
      <tr>
        <td><?php echo $view_cat->cat_post_id; ?> </td>
        <td><?php echo $view_cat->cat_post_name; ?></td>
        <td><a href="../../../php_projects/blog/admin/insert_cat.php?del_id=<?php echo $view_cat->cat_post_id;  ?>"><i class="bi bi-calendar-x-fill"></i>
        </a> OR 
        <a href="../../../php_projects/blog/admin/edit_cat.php?edit_id=<?php echo $view_cat->cat_post_id;  ?>"><i class="bi bi-pen-fill"></i></a></td>
      </tr>
      <?php
          }
        }
        ?>
    </tbody>
  </table>


</div>
<?php
include_once(dirname(__FILE__)."/template_dashboard/footer.php");
?>

