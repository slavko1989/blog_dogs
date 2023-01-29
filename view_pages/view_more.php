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
    $select = new PostView();
    $comm = new CommView();
    $post = new PostView();
    
    $loop = $select->view_single_post();
    if(is_array($loop) || is_object($loop)){
    foreach($loop as $posts){
    ?>
    <div class="w3-container w3-white w3-margin w3-padding-large">
      <!-- form for vote-->
      <p class="w3-left" style="font-family: monospace;">
        <?php
        $stars_res = $post->view_avg_stars($posts->post_id);
        foreach ($stars_res as $star_res) {
        $y = $star_res->avg;
        $p = "Rating emoji for this post ";
        if(ceil($y) == "1"){
        echo "<p style='font-weight:bolder;font-family:monospace;'>$p</p> <i class='far fa-frown' style='font-size:48px;color:black;'></i>";
        }elseif(ceil($y) == "2"){
        echo "<p style='font-weight:bolder;font-family:monospace;'>$p</p><i class='far fa-frown-open' style='font-size:48px;color:black'></i>";
        }elseif(ceil($y) == "3"){
        echo "<p style='font-weight:bolder;font-family:monospace;'>$p</p><i class='far fa-smile' style='font-size:48px;color:red'></i>";
        }elseif(ceil($y) == "4"){
        echo "<p style='font-weight:bolder;font-family:monospace;'>$p</p><i class='fas fa-grin' style='font-size:48px;color:red'></i>";
        }elseif(ceil($y) == "5"){
        echo "<p style='font-weight:bolder;font-family:monospace;'>$p</p><i class='far fa-grin-stars' style='font-size:48px;color:red'></i>";
        }
        }
        $post->executeRaiting(); ?>
        <form method="post" action="../../../php_projects/blog/view_pages/view_more.php?view_more=<?php echo @$posts->post_id; ?>" class="w3-right" style="">
          <div class="form-outline">
            <input type="number" name="r_stars" min="1" class="w3-button w3-black" max="5" value="1" style="border-radius: 4px solid black;color: blue;">
            <input type="hidden" name="user_id" value="<?php echo @$_SESSION["user_id"]; ?>">
            <input type="hidden" name="post_id" value="<?php echo @$posts->post_id; ?>">
            <input type="submit" name="add_r" value="VOTE"  class="w3-button w3-black">
          </div>
          <hr>
        </form>
      </p>
      <?php
      if(isset($_SESSION["user_id"]) && isset($_SESSION["user_email"])){
      $stars = $post->view_stars($_SESSION["user_id"],$posts->post_id);
      if(is_array($stars) or is_object($stars)){
      foreach($stars as $star){
      $vote = "You vote with: ";
      $x = $star->r_stars;
      if($x == "1"){
      echo $vote;
      for($x = 1;$x<=1;$x++){
      echo str_replace($x,$vote .'<span class="fa fa-star checked" style="color: red;"></span>',$x);
      }
      }elseif($x == "2"){
      echo $vote;
      for($x = 1;$x<=2;$x++){
      echo str_replace($x,'<span class="fa fa-star checked" style="color: red;"></span>',$x);
      }
      }
      elseif($x == "3"){
      echo $vote;
      for($x = 1;$x<=3;$x++){
      echo str_replace($x,' <span class="fa fa-star checked" style="color: red;"></span>',$x);
      }
      }
      elseif($x == "4"){
      echo $vote;
      for($x = 1;$x<=4;$x++){
      echo str_replace($x,'<span class="fa fa-star checked" style="color: red;"></span>',$x);
      }
      }elseif($x == "5"){
      echo $vote;
      for($x = 1;$x<=5;$x++){
      echo str_replace($x,'<span class="fa fa-star checked" style="color: red;"></span>',$x);
      }
      }
      }
      }
      }
      ?>
      <!-- end of form for vote -->
      <div class="w3-center">
        <h3><?php echo $posts->name_post; ?></h3>
        <h5>Date post: <span class="w3-opacity"><?php echo $posts->date_post; ?></span></h5>
      </div>
      <div class="w3-justify">
        <img src="../../../php_projects/blog/images/blog_images/<?php echo
        $posts->img_post; ?>" alt="" style="width:100%" class="w3-padding-16">
        <p><strong>About story: </strong><?php echo substr($posts->text_post,300); ?>
          <p class="w3-left"><button class="w3-button w3-white w3-border" onclick="likeFunction(this)"><b><i class="fa fa-thumbs-up"></i> Like</b></button></p>
          <p class="w3-left"><button class="w3-button w3-white w3-border" onclick="likeFunction(this)"><b><i class="fa fa-thumbs-up"></i> UnLike</b></button></p>
          <p class="w3-right"><button class="w3-button w3-black" onclick="myFunction('demo1')" id="myBtn"><b>Comments <?php echo $comm->show_count_comm($posts->post_id); ?></b> <span class="w3-tag w3-white"></span></button></p>
          <!--FORM FOR COMMENTS-->
          <p class="w3-clear"></p>
          <?php $comm->executeComm(); ?>
          <form method="post" action="../../../php_projects/blog/view_pages/view_more.php?view_more=<?php echo @$posts->post_id; ?>">
            <div class="form-outline">
              <textarea class="form-control" id="textAreaExample1" rows="4" name="comm_text" placeholder="Leave a comment"></textarea>
              <input type="hidden" name="user_id" value="<?php echo @$_SESSION["user_id"]; ?>">
              <input type="hidden" name="post_id" value="<?php echo @$posts->post_id; ?>">
              <input type="hidden" name="comm_date">
              <input type="submit" name="add_comm" value="Add Comments" class="w3-button w3-black">
            </div>
            <div class="w3-row w3-margin-bottom" id="demo1" style="display:none"></div>
            <hr>
          </form>
          <?php
          $view_comm = $comm->view_user_comm(@$posts->post_id);
          if(is_array($view_comm) or is_object($view_comm)){
          foreach($view_comm as $comments){ ?>
          
          <div class="w3-col l2 m3">
            <img src="../../../php_projects/blog/images/user_images/<?php echo $comments->u_img; ?>" style="width:90px;border-radius: 25px;">
          </div>
          <div class="w3-col l10 m9">
            <h4><?php echo $comments->u_name; ?><span class="w3-opacity w3-medium"> <?php echo $comments->comm_date; ?></span></h4>
            <p><?php echo $comments->comm_text; ?></p>
          </div>
          <!--form for reply -->
          <?php $reps = $comm->view_user_rep($comments->comm_id);
          if(is_array($reps) or is_object($reps)){
          foreach($reps as $rep){ ?>
          <img src="../../../php_projects/blog/images/user_images/<?php echo $rep->u_img; ?>" style="width:90px;border-radius: 25px;margin-left: 100px;border: 4px solid blue;">
          <h4 style="margin-left:100px;"><?php echo $rep->u_name; ?><span class="w3-opacity w3-medium"> <?php echo $rep->rep_date; ?></span></h4>
          <p style="margin-left: 100px;color: blue;"><?php echo $rep->rep_text; ?></p>
          <?php }}
          $comm->executeRep(); ?>
          <form method="post" action="../../../php_projects/blog/view_pages/view_more.php?view_more=<?php echo @$posts->post_id; ?>" id="form_rep">
            <div class="form-outline">
              <textarea class="form-control" id="textAreaExample1" rows="4" name="rep_text" placeholder="Leave a replies"></textarea>
              <input type="hidden" name="comm_id" value="<?php echo $comments->comm_id; ?>">
              <input type="hidden" name="user_id" value="<?php echo @$_SESSION["user_id"]; ?>">
              <input type="hidden" name="post_id" value="<?php echo @$posts->post_id; ?>">
              <input type="hidden" name="rep_date">
              <input type="submit" name="add_rep" value="Add Replies" class="w3-button w3-black" style="border-radius: 15px;">
            </div>
          </form><br>
          <!--end of reply-->
          <?php }} ?>
          <!--FORM FOR COMMENTS END-->
        </div>
      </div>
      <hr>
      <?php } }?>
      <!-- END BLOG ENTRIES -->
    </div>
    <?php
    include_once(dirname(__FILE__)."../../template/sidebar.php");
    include_once(dirname(__FILE__)."../../template/footer.php");
    ?>