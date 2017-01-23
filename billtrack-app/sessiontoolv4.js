$(function(){
	// Triggers interacting menus
	$("#select1").change(function() {     
	    if(typeof $(this).data("options") === "undefined"){
	        $(this).data("options",$("#select2 option").clone());
	    } 
	    var id = ($(this).val()).replace(' ', '-');
	    var options = $(this).data("options").filter("[class=" + id + "]");
	    $("#select2").html(options);
	    BillUpdateList.search($("#select2").val());
	    $("input.search").val('');
	});
	$("#select1").trigger("change");
	
	$("#select2").change(function() {  
		//alert('test');
		BillUpdateList.search($("#select2").val());
	});
	
	$("button.clear-search").click(function() {  
		BillUpdateList.search();
	});
	
	$("p.bill").click(function() {  
		//alert('test');
		$("input.search").val($(this).next().text());
		$("input.search").attr('placeholder', '');
		BillUpdateList.search($(this).next().text());
	});
	
	});