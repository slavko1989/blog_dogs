<?php 

include_once("../template/head.php");
$logout = new UserView();
$logout->session_logout();

?>
<a href="../../../php_projects/blog/index.php"><img src="../../../php_projects/blog/images/lg.jpg" alt=""></a>