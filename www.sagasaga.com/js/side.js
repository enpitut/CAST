//right
$(".rightSlide").bind("click",rightNav);

function rightNav(){
	if($("#right-nav").hasClass("rightNav")){
		$("#rightNav-over").css("display","none");
		$("#right-nav").removeClass("rightNav");
		$("#right,#rightSlide").removeClass("rightMenu");
	}else{
		$("#rightNav-over").css("display","block");
		$("#right-nav").addClass("rightNav");
		$("#right,#rightSlide").addClass("rightMenu");
		
		$("#rightBox").height($(window).height());
		//new IScroll('#scrollerBox',{preventDefault:false});		
		$(window).resize(function(){
			$("#rightBox").height($(window).height());
		})
	}	
}

$("#rightNav-over").bind("click",function(){
	$("#rightNav-over").css("display","none");
	$("#right-nav").removeClass("rightNav");
	$("#right,#rightSlide").removeClass("rightMenu");
})

//left
$(".leftSlide").bind("click",leftNav);

function leftNav(){
	if($("#left-nav").hasClass("leftNav")){
		$("#leftNav-over").css("display","none");
		$("#left-nav").removeClass("leftNav");
		$("#left").removeClass("leftMenu");
	}else{
		$("#leftNav-over").css("display","block");
		$("#left-nav").addClass("leftNav");
		$("#left").addClass("leftMenu");
				
		$("#leftBox").height($(window).height());
		//new IScroll('#scrollerBox',{preventDefault:false});		
		$(window).resize(function(){
			$("#leftBox").height($(window).height());
		})
	}	
}
