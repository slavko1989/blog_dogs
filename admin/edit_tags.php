<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");

$tags = new TagsView();
?>

<div class="container">
  <h2>EDIT TAGS</h2>
  <p>UPDATE OLD TAGS</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"><?php  ?>
    
</div>
  </div>
<table class="table table-bordered table-dark" style="color: darkred;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CATEGORY NAME</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $tags->execute_edit_tags(); 
    if(isset($_GET["edit_id"])){
      $id = $_GET["edit_id"];
      $stmt = $tags->connect()->prepare("select * from tags where tags_id=:tags_id");
      $stmt->bindValue(":tags_id",$id);
      $stmt->execute();
      $edit = $stmt->fetch(PDO::FETCH_OBJ);
      //if(is_array($edit) && is_object($edit)){
    ?>
    <tr>
    
      <form method="post" id="edit_form" action="<?php $_SERVER['PHP_SELF']; ?>">
        <td>
          <input type="hidden" id="tags_id" name="tags_id" value="<?php echo $edit->tags_id; ?>">
        </td>
        <td>
          <input type="text" id="tags_name" name="tags_name" value="<?php echo $edit->tags_name; ?>">
        </td>

        <td><input type="submit" id="create" name="ed_tags" value="EDIT"></td>
      </form>

    </tr>
    <?php }  ?>
    
  </tbody>
</table>


</div>
<?php
include_once(dirname(__FILE__)."/template_dashboard/footer.php");
?>

