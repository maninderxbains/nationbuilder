/*$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	$(".all-sidebars").css({"display":"none"});
	var sidebar = $(e.target).attr("sidebar");
	$("."+sidebar).css({"display":"block"});
});
*/

/*
function setActiveMenu () {
	var path = window.location.href;
	path = path.replace(/\/$/,"");
	path = decodeURIComponent(path);
	
	paths = path.split('/');
	var lastSegment = paths.pop();
	$(".sidebar-nav a").each(function(){
		
		
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
*/
function setActiveMenu () {
	var path = window.location.href;
	path = path.replace(/\/$/,"");
	path = decodeURIComponent(path);
	
	paths = path.split('/');
	var lastSegment = paths.pop();
	$(".main_sidebar_li").each(function(){
		
		var current_li = $(this).find("a[href='"+lastSegment+"']");
		var current_li_id = $(this).attr("id");
		if (current_li.length>0 || lastSegment=="add-tracking-code.php" || lastSegment=="edit-tracking-code.php") {
			$(".main_sidebar_li").removeClass("active");
			$(".main_sidebar_li").removeClass("open");
			if (current_li_id=="accounts" || lastSegment=="add-tracking-code.php" || lastSegment=="edit-tracking-code.php") {
				$(this).closest("li").addClass("active");
				$("#accounts").addClass("active");
				$("#accounts").addClass("open");
			} else if (current_li_id=="receipts-sent") {
				$("#receipts-sent").addClass("active");
				$("#receipts-sent").css({"display":"block"});
				$("#receipts-not-sent").css({"display":"none"});
			} else if (current_li_id=="receipts-not-sent") {
				$("#receipts-not-sent").addClass("active");
				$("#receipts-sent").css({"display":"none"});
				$("#receipts-not-sent").css({"display":"block"});
			}
			
		}
		/*alert(current_li.length);
		return false;
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
		*/
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

$('.data-table').dataTable({
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sDom": '<""l>t<"F"fp>'
});
$('input[type=checkbox],input[type=radio],input[type=file]').uniform();

$('select').select2();
$("#tags").select2({
	tags:["red", "green", "blue", "orange"]
});