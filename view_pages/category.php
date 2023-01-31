<?php
include_once(dirname(__FILE__)."../../template/head.php");
include_once(dirname(__FILE__)."../../template/nav.php");
include_once(dirname(__FILE__)."../../template/header.php");
?>
<!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l8 s12">
    
      <!-- Blog entry -->
      <?php 
          $select = new CatView();
          if($loop = $select->select_single_cat()){
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
          <p><strong>About story: </strong><?php echo $posts->text_post; ?></p>
          
          <div class="w3-row w3-margin-bottom" id="demo1" style="display:none">
            <hr>
              <div class="w3-col l2 m3">
                <img src="/w3images/avatar_smoke.jpg" style="width:90px;">
              </div>
              
          </div>
        </div>
      </div>
    
      <hr>
      <?php } } }else{
      echo'
      <div class="alert alert-dark" role="alert">
        At this moment, category is empty. We are sorry.
      </div>';
      
    }?>
    <!-- END BLOG ENTRIES -->
    </div>
<?php
include_once(dirname(__FILE__)."../../template/sidebar.php");
include_once(dirname(__FILE__)."../../template/footer.php");
?>
