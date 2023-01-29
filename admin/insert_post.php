<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");
$post = new PostView();
?>

<div class="container">
  <h2>ADD POST</h2>
  <p>CREATE NEW POST</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"></div><?php $post->sendPost(); ?></div>
  </div>
  <?php include_once(dirname(__FILE__)."../../javascript/ajax_insert.php"); ?>
  <form method="post" id="insert_form" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<table class="table table-bordered table-dark" style="color: black;">
  <thead>
    <tr>
      <th scope="col">POST NAME</th>
      <th scope="col">POST IMAGE</th>
      <th scope="col">POST TEXT</th>
      <th scope="col">TAGS</th>
      <th scope="col">CATEGORY</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" id="post_name" name="name_post" style="width: 100%;"></td>
      <td><input type="file" id="post_img" name="img_post"></td>
      <td><textarea type="text" id="post_text" name="text_post"></textarea></td>
      <input type="hidden" id="post_date" name="date_post">
      <td>
        <?php
          $tags = new TagsView();
          $tag = $tags->viewAllTags();
        ?>
        <select name="tags_id">
          <option>TAGS</option>
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
          <option>CATEGORY</option>
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
      <td><input type="submit" id="create" name="add_post" value="INSERT"></td>
    </tr>
  </tbody>
</table>
</form>

</div>
<?php
include_once(dirname(__FILE__)."/template_dashboard/footer.php");
?>

