<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-black w3-hide-small">
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-facebook-official"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-instagram"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-snapchat"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-flickr"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-twitter"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>
  
  <?php include_once(dirname(__FILE__)."../../javascript/ajax_search.php"); ?>
    <a href="../../../php_projects/blog/view_pages/login.php" class="w3-bar-item w3-button w3-right">SIGN IN</a>
  <a href="../../../php_projects/blog/view_pages/reg.php" class="w3-bar-item w3-button w3-right">SIGN UP</a>
  <a href="" class="w3-bar-item w3-button w3-right">
    <?php
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){
    echo "welcome " . $_SESSION["user_name"];
    ?>
    <a class='w3-bar-item w3-button w3-right' href='../../../php_projects/blog/view_pages/logout.php'>logout </a>
    <?php
    }
    ?>
  </a>
  <div id="search_result"></div>
</div>