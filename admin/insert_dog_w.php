<?php
include_once(dirname(__FILE__)."/template_dashboard/head.php");
include_once(dirname(__FILE__)."/template_dashboard/sidebar.php");
include_once(dirname(__FILE__)."/template_dashboard/nav.php");
$walker = new UserView();
?>

<div class="container">

<div class="alert alert-success">
   ALL WALKERS
</div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>IMAGES</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>EDUCATION</th>
        <th>EXPERIANCE</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $w = $walker->admin_select_walkers();
      if(is_array($w) or is_object($w)){
      foreach($w as $walkers){
      ?>
      <tr>
        <td><img src="../../../php_projects/blog/images/dog_w/<?php echo $walkers->walker_img; ?>" alt="" style="width: 60px;"></td>
        <td><?php echo $walkers->full_name; ?></td>
        <td><?php echo $walkers->email; ?></td>
        <td><?php echo $walkers->phone; ?></td>
        <td><?php echo substr($walkers->education,0,20); ?></td>
        <td><?php echo substr($walkers->work_exp,0,20); ?></td>
        <td><a href=""><i class="bi bi-calendar-x-fill"></i></a> <a href=""><i class="bi bi-pen-fill"></i></a></td>
      </tr>
    <?php } }?>
    </tbody>
  </table>

<hr>

  <h2>DOGS WALKERS</h2>
  <p>CREATE NEW WALKER</p> 
  <div class="col-lg-12">
    <div id="message"></div>
    <div id="fetch"></div><?php $walker->executeWalker(); ?></div>
  </div>
  <form method="post" id="insert_form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <input type="file"  name="walker_img" placeholder="WALKER IMG"><br>
        <input type="text"  name="full_name" placeholder="WALKER NAME"><br>
        <input type="text"  name="email"placeholder="WALKER EMAIL"><br>
        <input type="text"  name="phone"placeholder="WALKER PHONE"><br>
        <textarea type="text"  name="education" placeholder="EDUCATION"></textarea><br>
        <textarea type="text"  name="work_exp" placeholder="EXPERIANCE"></textarea><br>
        <input type="submit" id="create" name="add_w" value="INSERT"><br>
</form><br>

</div>
<?php
include_once(dirname(__FILE__)."/template_dashboard/footer.php");
?>

