<?php 
  $select = new PostView();
  $loop = $select->selectBlogPost();
  
?>
<!-- First Photo Grid-->
  <div class="w3-row-padding">
    <?php
      if(is_array($loop) || is_object($loop)){
      foreach($loop as $posts){
      ?>
    <div class="w3-third w3-container w3-margin-bottom">
      <?php $select->delete_post(); ?>
      <img src="../../../php_projects/blog/images/blog_images/<?php echo 
      $posts->img_post; ?>" style="width:100%;height: 150px;" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p style="text-align: center;"><b><?php echo $posts->name_post; ?></b></p>
        <p><?php echo substr($posts->text_post,400); ?></p>
        <a href="../../../php_projects/blog/admin/index.php?del_id=<?php echo $posts->post_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
        <a href="../../../php_projects/blog/admin/edit_post.php?edit_id=<?php echo $posts->post_id; ?>" style="float: right;"><span class="glyphicon glyphicon-wrench"></span></a>
      </div>
    
    </div>
    <?php } }?>
  </div>
  
   

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
