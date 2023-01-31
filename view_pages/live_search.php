<?php
include_once("../template/head.php");
$search = new PostView();
$print_search = $search->create_live_search();

?>
<table class="table table-bordered" style="color: red;">
	<thead>
		<tr>
			<th>NAME</th>
			<th>IMAGES</th>
			<th>TEXT</th>
			<th>DATE</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(is_array($print_search) or is_object($print_search)){
		foreach($print_search as $print){
		?>
		<tr>
			<td style="color:blueviolet;"><a href="../../../php_projects/blog/view_pages/view_more.php?view_more=<?php echo $print->post_id; ?>"><?php echo $print->name_post; ?></a></td>
			<td><img src="../../../php_projects/blog/images/blog_images/<?php echo $print->img_post; ?>" alt="" style="width: 60px;height: 60px;"></td>
			<td><?php echo substr($print->text_post,0,20); ?></td>
			<td><?php echo $print->date_post; ?></td>
		</tr>
		<?php
		} }
		?>
	</tbody>
</table>