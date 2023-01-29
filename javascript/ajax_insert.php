<script type="text/javascript">
	$(document).ready(function(){
$('#insert_form').submit(function(e){
	

	$.ajax({
		type:"POST",
		url:"../../../php_projects/blog/index.php",
		data:$('#insert_form').serialize(),
		success:function(data){

		}

		})
	e.preventDefault();
	})
})
	
</script>