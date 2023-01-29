<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");

$cat = new CatView();
?>

<div class="container">
  <h2>EDIT CATEGORY</h2>
  <p>UPDATE OLD CATEGORY</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"><?php   ?>
    
</div>
  </div>
<table class="table table-bordered table-dark" style="color: black;">
  <thead>
    <tr>
      <th scope="col">CATEGORY NAME</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $cat->execute_edit_cat();
    if(isset($_GET["edit_id"])){
      $id = $_GET["edit_id"];
      $stmt = $cat->connect()->prepare("select * from category_post where cat_post_id=:cat_post_id");
      $stmt->bindValue(":cat_post_id",$id);
      $stmt->execute();
      $edit = $stmt->fetch(PDO::FETCH_OBJ);
    ?>
    <tr>
      <form method="post" id="edit_form" action="<?php $_SERVER['PHP_SELF']; ?>">
      <td>
        <input type="hidden" id="cat_post_id" name="cat_post_id" value="<?php echo $edit->cat_post_id; ?>">
      </td>
      <td>
        <input type="text" id="cat_post_name" name="cat_post_name" value="<?php echo $edit->cat_post_name; ?>">
      </td>

      <td><input type="submit" id="create" name="ed_cat" value="EDIT"></td>
      </form>
    </tr>
    <?php }  ?>
  </tbody>
</table>


</div>
<?php
include_once(dirname(__FILE__)."/template_dashboard/footer.php");
?>

