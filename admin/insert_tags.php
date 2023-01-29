<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");
    $tags = new TagsView();
    ?>

<div class="container">
  <h2>ADD TAGS</h2>
  <p>CREATE NEW TAGS</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"><?php  
    $tags->execute_tags(); 
    $tags->confirm_delete();
    ?>
</div>
  </div>
  <form method="post" id="insert_form" action="<?php $_SERVER['PHP_SELF']; ?>">
<table class="table table-bordered table-dark" style="color: black;">
  <thead>
    <tr>
      <th scope="col">TAGS NAME</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" id="tags_name" name="tags_name"></td>
      <td><input type="submit" id="create" name="add_tags" value="INSERT"></td>
    </tr>
  </tbody>
</table>
</form>


  <h2>All Tags</h2>
  <p>Table for tags</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>TAGS</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $view_tags = $tags->viewAllTags();
        if(is_array($view_tags) or is_object($view_tags)){
          foreach($view_tags as $view_tag){
        ?>
      <tr>
        <td><?php echo $view_tag->tags_id; ?> </td>
        <td><?php echo $view_tag->tags_name; ?></td>
        <td><a href="../../../php_projects/blog/admin/insert_tags.php?del_id=<?php echo $view_tag->tags_id; ?> "><i class="bi bi-calendar-x-fill"></i>
</a> OR <a href="../../../php_projects/blog/admin/edit_tags.php?edit_id=<?php echo $view_tag->tags_id; ?> "><i class="bi bi-pen-fill"></i></a></td>
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

