$("#nav-over").bind("touchmove touch",function(e){e.preventDefault()},false);//阻止默认事件
$(".account").bind("click",myNav);

function myNav(){
	if($("#nav").hasClass("openNav")){
		$("#nav-over").css("display","none");
		$("#nav").removeClass("openNav");
		$("#warmp,.account,.bottom").removeClass("openMenu");
	}else{
		$("#nav-over").css("display","block");
		$("#nav").addClass("openNav");
		$("#warmp,.account,.bottom").addClass("openMenu");
				
		$("#scrollerBox").height($(window).height());
		//new IScroll('#scrollerBox',{preventDefault:false});		
		$(window).resize(function(){
			$("#scrollerBox").height($(window).height());
		})
	}	
}

$("#nav-over").bind("click",function(){
	$("#nav-over").css("display","none");
	$("#warmp,.account,.bottom").removeClass("openMenu");
	$("#nav").removeClass("openNav");
	$("#warmp,.account,.bottom").removeClass("openMenu")	
})
/*************************************/
$(".category").bind("click",bottomNav);

function bottomNav(){
	if($("#bottomNav").hasClass("openNav")){
		$("#bottomNav-over").css("display","none");
		$("#bottomNav").removeClass("openNav");
		$("#warmp,.account,.bottom").removeClass("openMenu");
	}else{
		$("#bottomNav-over").css("display","block");
		$("#bottomNav").addClass("openNav");
		$("#warmp,.account,.bottom").addClass("openMenu");
				
		$("#bottomBox").height($(window).height());
		//new IScroll('#scrollerBox',{preventDefault:false});		
		$(window).resize(function(){
			$("#bottomBox").height($(window).height());
		})
	}	
}
$("#bottomNav-over").bind("click",function(){
	$("#bottomNav-over").css("display","none");
	$("#warmp,.account,.bottom").removeClass("openMenu");
	$("#bottomNav").removeClass("openNav");
	$("#warmp,.account,.bottom").removeClass("openMenu")	
})