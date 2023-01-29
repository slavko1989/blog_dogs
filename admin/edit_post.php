<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");
$post = new PostView();
?>

<div class="container">
  <h2>EDIT POST</h2>
  <p>EDIT OLD POST</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"></div><?php $post->execute_edit_post(); ?></div>
  </div>
  <form method="post" id="edit_form" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" style="color: green;">
<table class="table table-bordered table-dark" style="color: brown;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">POST NAME</th>
      <th scope="col">POST IMAGE</th>
      <th scope="col">POST TEXT</th>
      <th scope="col">TAGS</th>
      <th scope="col">CATEGORY</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if(isset($_GET["edit_id"])){

      $stmt = $post->connect()->prepare("select * from posts where post_id=:post_id");
      $stmt->bindValue(":post_id",$_GET["edit_id"]);
      $stmt->execute();
      $edit = $stmt->fetch(PDO::FETCH_OBJ);

    ?>
    <tr>
      <td><input type="hidden" id="post_id" name="post_id" value="<?php echo $edit->post_id; ?>"></td>
      <td><input type="text" id="post_name" name="name_post" style="width: 100%;" value="<?php echo $edit->name_post; ?>"></td>
      <td><input type="file" id="post_img" name="img_post"><?php echo $edit->img_post;?></td>
      <td><textarea type="text" id="post_text" name="text_post"><?php echo $edit->text_post; ?></textarea></td>
      <input type="hidden" id="post_date" name="date_post" value="<?php echo $edit->date_post; ?>">
      <td>
        <?php
          $tags = new TagsView();
          $tag = $tags->viewAllTags();
        ?>
        <select name="tags_id">
         
          <?php
              if(is_array($tag) || is_object($tag)){
                foreach($tag as $drop_down_tag){
           ?>
        <option value="<?php echo $drop_down_tag->tags_id; ?>">
          <?php 
                echo $drop_down_tag->tags_name;
                }
              }
           ?>
          </option>
        </select>
      </td>
      <td>
        <select name="cat_post_id" style="width: 100%;">
           <?php
          $cats = new CatView();
          $cat = $cats->viewAllCat();
          if(is_array($cat) || is_object($cat)){
            foreach($cat as $drop_down_cat){
           ?>
          <option value="<?php echo $drop_down_cat->cat_post_id; ?>">
            <?php 
                echo $drop_down_cat->cat_post_name;
                }
              }
           ?>
          </option>
        </select>
      </td>
      <td><input type="submit" id="edit" name="ed_post" value="EDIT"></td>
    </tr>

  <?php } ?>
  </tbody>
</table>
</form>

</div>
<?php
include_once(dirname(__FILE__)."/template_dashboard/footer.php");
?>

