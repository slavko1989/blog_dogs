<!-- About/Information menu -->
<?php $walker = new UserView(); $view_w = $walker->view_walker(); ?>
    <div class="w3-col l4">
      <!-- About Card -->
      <div class="w3-white w3-margin">
        <img src="../../../php_projects/blog/images/people.avif" alt="Jane" style="width:100%" class="w3-grayscale">
        <div class="w3-container w3-black">
          <h4>Dog walkers</h4>

  <p class="text-primary">If you aren't in town or if you are going on work, this people  is ready to take care of your dog. Don't worry and be welcome to choose are dog walkers. Any aggrement is possible.</p>
 
            <div class="alert alert-success">
             <strong>Hello!</strong> <a href="../../../php_projects/blog/view_pages/see_all_dog_w.php" class="btn btn-primary stretched-link">See all dog walkers</a>
            </div>

<div class="w3-row"><br>
  <?php 
  if(is_array($view_w) or is_object($view_w)){
  foreach ($view_w as $w) {
    
   ?>
<div class="w3-quarter">

  
  <img src="../../../php_projects/blog/images/dog_w/<?php echo $w->walker_img; ?>" alt="Boss" style="width:65%" class="w3-circle w3-hover-opacity">
  <h3><a href="../../../php_projects/blog/view_pages/dog_w.php?dog_w=<?php echo $w->w_id; ?>"><?php echo $w->full_name; ?></a></h3>

  
</div>
<?php } } ?>
</div>


        </div>
      </div>
      <hr>

      <!-- Posts -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Most vote posts</h4>
        </div>
        
        <ul class="w3-ul w3-hoverable w3-white">
          <?php
          $avg = new PostView();
          $posts = $avg->selectBlogPost();
          foreach($posts as $post){
          $avg_list = $avg->view_avg_stars($post->post_id);
          if(is_array($avg_list) or is_object($avg_list)){
            foreach($avg_list as $list){
          
          ?>
          <li class="w3-padding-16">
            <img src="../../../php_projects/blog/images/blog_images/<?php echo $list->img_post; ?>" alt="Image" class="w3-left w3-margin-right" style="width:50px;height: 50px;">
            <span class="w3-large"><?php echo $list->name_post; ?></span>
            <br>
            <span><a href="../../../php_projects/blog/view_pages/view_more.php?view_more=<?php echo $post->post_id; ?>" class="btn btn-primary">VIEW MORE</a></span>
          </li>
          <?php }} }?>
          
          
          
        </ul>
      </div>
      <hr>

      <!-- Advertising -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Archives</h4>
        </div>
        <div class="w3-container w3-white">
          <div class="w3-container w3-display-container w3-light-grey w3-section" style="height:200px">
            <span class="w3-display-middle">Your AD Here</span>
          </div>
        </div>
      </div>
      <hr>

      <!-- Tags -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Tags</h4>
        </div>
        <div class="w3-container w3-white" style="margin-top: 5px;">
          <p>
            <?php
            $tags = new TagsView();
            $view_tags = $tags->viewAllTags();
            if(is_array($view_tags) or is_object($view_tags)){
            foreach($view_tags as $view_tag){
        
            ?>

            <span class="3-tag w3-light-grey w3-margin-bottom"><a href="../../../php_projects/blog/view_pages/tags.php?tags_id=<?php echo $view_tag->tags_id; ?>" class="btn btn-primary"><?php echo strtoupper($view_tag->tags_name); ?></a></span>
            <?php }} ?> 
          </p>
        </div>
      </div>
      <hr>

      <!-- Inspiration -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Category</h4>
        </div>
        
        <ul class="w3-ul w3-hoverable w3-white">
          <?php
            $cat = new CatView();
            $view_cats = $cat->viewAllCat();
            if(is_array($view_cats) or is_object($view_cats)){
            foreach($view_cats as $view_cat){
            ?>
          <li class="w3-padding-16">
            <p class="w3-left w3-margin-right" style="width:50px"></p>
            <span class="w3-large"><a href="../../../php_projects/blog/view_pages/category.php?cat_id=<?php echo $view_cat->cat_post_id;  ?>" class="link-info" style="text-decoration: none;"><?php echo ucfirst($view_cat->cat_post_name);  ?></a></span>
            <br>
          </li>
          <?php }} ?>
        </ul>

            </div>
       
      <hr>

      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Follow Me</h4>
        </div>
        <div class="w3-container w3-xlarge w3-padding">
          <i class="fa fa-facebook-official w3-hover-opacity"></i>
          <i class="fa fa-instagram w3-hover-opacity"></i>
          <i class="fa fa-snapchat w3-hover-opacity"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity"></i>
          <i class="fa fa-twitter w3-hover-opacity"></i>
          <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
      </div>
      <hr>
      
      <!-- Subscribe -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Subscribe</h4>
        </div>
        <div class="w3-container w3-white">
          <p>Enter your e-mail below and get notified on the latest blog posts.</p>
          <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
          <p><button type="button" onclick="document.getElementById('subscribe').style.display='block'" class="w3-button w3-block w3-red">Subscribe</button></p>
        </div>
      </div>

    <!-- END About/Intro Menu -->
    </div>

  <!-- END GRID -->
  </div>

<!-- END w3-content -->
</div>

<!-- Subscribe Modal -->
<div id="subscribe" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content" style="padding:32px">
    <div class="w3-container w3-white">
      <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-transparent w3-button w3-xlarge w3-right"></i>
      <h2 class="w3-wide">SUBSCRIBE</h2>
      <p>Join my mailing list to receive updates on the latest blog posts and other things.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>
