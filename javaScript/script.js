$(document).ready(function(){

	$(".opener").click(function(){
	$("#open").slideToggle("slow");
	$(this).toggleClass("active");
	return false;

	});
});