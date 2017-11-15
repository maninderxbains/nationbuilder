/*$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	$(".all-sidebars").css({"display":"none"});
	var sidebar = $(e.target).attr("sidebar");
	$("."+sidebar).css({"display":"block"});
});
*/
function setActiveMenu () {
	var path = window.location.href;
	path = path.replace(/\/$/,"");
	path = decodeURIComponent(path);
	
	paths = path.split('/');
	var lastSegment = paths.pop();
	$(".sidebar-nav a").each(function(){
		
	/*	$(this).closest("li").removeClass("active");	*/
		var href = $(this).attr("href");
		if (lastSegment===href) {
			$(".sidebar-nav li").removeClass("active");
			$(this).closest("li").addClass("active");
		}
		
		if (lastSegment==="add-tracking-code.php" || lastSegment==="edit-tracking-code.php") {
			$(".sidebar-nav li").removeClass("active");
			$("a[href='tarcking-codes.php']").closest("li").addClass("active");
		}
		
		if (lastSegment==="receipts-not-sent.php") {
			$(".sidebar-nav li").removeClass("active");
			$(".sidebar-nav li").css("display","none");
			$(this).closest("li").css("display","block");
			$(this).closest("li").addClass("active");
		}
	})
}
setActiveMenu();


$(".deleteItem").off();
$(".deleteItem").on("click",function(){
	var con = confirm("Are you sure ?");
	if (con==true) {
		alert("Successfully Deleted");
	}
});

$("#receipt_status").select2().on("change",function () {
	var value = $(this).val();
	window.location.href = value;
});