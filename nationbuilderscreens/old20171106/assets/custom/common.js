$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	$(".all-sidebars").css({"display":"none"});
	var sidebar = $(e.target).attr("sidebar");
	$("."+sidebar).css({"display":"block"});
});

function setActiveMenu () {
	var path = window.location.href;
	path = path.replace(/\/$/,"");
	path = decodeURIComponent(path);
	
	paths = path.split('/');
	var lastSegment = paths.pop();
	console.log(path);
	$(".sidebar-nav a").each(function(){
		
		$(this).closest("li").removeClass("active");
		var href = $(this).attr("href");
		console.log(href);
		if (lastSegment===href) {
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