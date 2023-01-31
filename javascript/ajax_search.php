<form method="post" action='' class="w3-right" style="margin-top: 5px;margin-right: 2px;">
  <input type="text" name="search" placeholder="Text something..." id="search">
</form>
<script type="text/javascript">
$(document).ready(function(){
$("#search").keyup(function(){
var input = $(this).val();
if(input != ""){
$.ajax({
url:"../../../php_projects/blog/view_pages/live_search.php",
method:"POST",
data:{input:input},
success:function(data){
$("#search_result").html(data);
$("#search_result").css("display","block");
}
});
}else{
$("#search_result").css("display","none");
}
});
});
</script>