<!-- Grid -->
<div class="w3-row w3-padding w3-border">
  <!-- Blog entries -->
  <div class="w3-col l8 s12">
    
    <!-- Blog entry -->
    <?php
    $select = new PostView();
    $loop = $select->selectBlogPost();
    if(is_array($loop) || is_object($loop)){
    foreach($loop as $posts){
    ?>
    <div class="w3-container w3-white w3-margin w3-padding-large">
      <div class="w3-center">
        
        <h3><?php echo $posts->name_post; ?></h3>
        <h5>Date post: <span class="w3-opacity"><?php echo $posts->date_post; ?></span></h5>
      </div>
      <div class="w3-justify">
        <img src="../../../php_projects/blog/images/blog_images/<?php echo
        $posts->img_post; ?>" alt="" style="width:100%" class="w3-padding-16">
        <p><strong>About story: </strong><?php echo substr($posts->text_post,300); ?> <a href="../../php_projects/blog/view_pages/view_more.php?view_more=<?php echo $posts->post_id; ?>" class="link-primary" style="font-stretch: !important;font-weight: bolder;font-family: monospace;">VIEW MORE</a></p>
        
      </div>
    </div>
    
    <hr>
    <?php } }?>
    <!-- END BLOG ENTRIES -->
    <div class="w3-center w3-padding-32">
      <div class="w3-bar">
        
<?php $select->pag(); ?>        
      </div>
    </div>
  </div>