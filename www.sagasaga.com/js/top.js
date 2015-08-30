$("#nav-over").bind("touchmove touch",function(e){e.preventDefault()},false);//阻止默认事件
$(".account").bind("click",myNav);

function myNav(){
	if($("#nav").hasClass("openNav")){
		$("#nav-over").css("display","none");
		$("#nav").removeClass("openNav");
		$("#warmp,.account").removeClass("openMenu");
	}else{
		$("#nav-over").css("display","block");
		$("#nav").addClass("openNav");
		$("#warmp,.account").addClass("openMenu");
				
		$("#scrollerBox").height($(window).height());
		//new IScroll('#scrollerBox',{preventDefault:false});		
		$(window).resize(function(){
			$("#scrollerBox").height($(window).height());
		})
	}	
}

$("#nav-over").bind("click",function(){
	$("#nav-over").css("display","none");
	$("#warmp,.account").removeClass("openMenu");
	$("#nav").removeClass("openNav");
	$("#warmp,.account").removeClass("openMenu")	
})