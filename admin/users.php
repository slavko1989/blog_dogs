<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");
$users = new UserView();
?>

<div class="container">

<div class="alert alert-success">
   ALL USERS
</div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>IMAGES</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $u = $users->view_users();
      if(is_array($u) or is_object($u)){
      foreach($u as $user){
      ?>
      <tr>
        <td><img src="../../../php_projects/blog/images/user_images/<?php echo $user->u_img; ?>" alt="" style="width: 60px;"></td>
        <td><?php echo $user->u_name; ?></td>
        <td><?php echo $user->u_email; ?></td>
        <td><a href=""><i class="bi bi-calendar-x-fill"></i></a> <a href=""><i class="bi bi-pen-fill"></i></a></td>
      </tr>
    <?php } }?>
    </tbody>
  </table>

<hr>

  <h2>USER</h2>
  <p>CREATE NEW USER</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"></div><?php  ?></div>
  </div>
  <form method="post" id="insert_form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <input type="file"  name="u_img" placeholder=" IMG"><br>
        <input type="text"  name="u_name" placeholder=" NAME"><br>
        <input type="text"  name="u_email"placeholder=" EMAIL"><br>
        <input type="text"  name="u_pass" placeholder="PASSWORD"><br>
        <input type="submit" id="create" name="add_w" value="INSERT"><br>
</form><br>

</div>
<?php
include_once(dirname(__FILE__)."/template_dashboard/footer.php");
?>

