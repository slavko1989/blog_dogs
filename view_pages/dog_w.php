<?php include_once("../template/head.php");
$walker = new UserView();
$singl_w = $walker->view_walker_id(); ?>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
  <!-- The Grid -->
  <div class="w3-row-padding"> <!-- Left Column -->
  <div class="w3-third">
    <div class="w3-white w3-text-grey w3-card-4">
      <?php if(is_array($singl_w) or is_object($singl_w)){
      foreach($singl_w as $w){?>
      <div class="w3-display-container">
        <img src="../../../php_projects/blog/images/dog_w/<?php echo $w->walker_img; ?>" style="width:100%" alt="">
        <div class="w3-display-bottomleft w3-container w3-text-black">
          <h2 style="color:rosybrown;font-family: fantasy;font-weight: bolder;"><?php echo strtoupper($w->full_name); ?></h2>
        </div>
      </div>
      <div class="w3-container">
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $w->email; ?></p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $w->phone; ?></p> <hr>
      </div>
    </div><br>
    <!-- End Left Column -->
  </div>
  <!-- Right Column -->
  <div class="w3-twothird">
    <div class="w3-container w3-card w3-white w3-margin-bottom">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
      <div class="w3-container"> <p><?php echo $w->work_exp; ?></p> <hr> </div> </div> <div class="w3-container w3-card w3-white">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
      <div class="w3-container"> <p><?php echo $w->education; ?></p> <hr> <?php }} ?>
    </div> </div>
    <!-- End Right Column -->
    </div> <!-- End Grid -->
    </div> <!-- End Page Container --> </div>
    <?php include_once("../template/footer.php"); ?>