

$(window).load(function() {

	
	
	function toArr(sel){
		var arr = $(sel);	
		var premiumtypecodes = [];
		arr.each(function(index,element) {
		    premiumtypecodes.push(element);
		});
		return premiumtypecodes;
	}
	
	var pic_padding = 20;
	sum = function(arr){
	    var sum = 0;
	    $.map(arr, function(v){
	        sum += v;
	    });
	    return sum;
	};
	sum_padding = function(arr){
	    var sum = 0;
	    $.map(arr, function(v){
	        sum += v+pic_padding;
	    });
	    return sum;
	};
	
	var pics_w = $("#pics").width();
    

	var pics = $.map( toArr(".gallery_image") , function(n) {return $(n).width();});
	
	var grupe = [[]];
	var i = 0;
	while (pics.length > 0 && i < 100){
		if (sum_padding(grupe[i]) < pics_w){
			grupe[i].push(pics.shift());
		}else{
			var s1 = sum_padding(grupe[i]);
			var s2 = s1 - grupe[i][grupe[i].length-1];
			if (Math.abs(pics_w-s2) < Math.abs(pics_w-s1)){
				pics.unshift(grupe[i].pop());
			}
			grupe[++i] = [];
		}
	}
	

	pics = $.map( toArr(".gallery_image") , function(n) {return $(n);});
	var picWidths = $.map( toArr(".gallery_image") , function(n) {return $(n).width();});


	for (var i in grupe){
	    var d = 1. * (pics_w-pic_padding*grupe[i].length) / sum(grupe[i]);
	    if (d>1.4) d = 1; 
	    while (grupe[i].pop()){
	    	var pic = pics.shift();
	    	pic.addClass("resized_image");
	    	pic.data("grupa",i);
	    	pic.height(Math.floor(pic.height()*d));
	    	pic.width(Math.floor(picWidths.shift()*d));
	    }    
	    $('.resized_image').last().parent().after("<div class=\"single_picture_group\" id=\"grupa_"+i+"\">hello world</div>");
	}

	var curImage = "";
	$('.resized_image').click(function(element){
		console.log(element.currentTarget);
		$(".under").hide();
		$(element.currentTarget).next().show().html("aaa");
		$(".single_picture_group").hide();
		if (curImage == element.currentTarget.id){
			$("#grupa_"+$(element.currentTarget).data("grupa")).hide();
		}else{
			curImage = element.currentTarget.id;
			$("#grupa_"+$(element.currentTarget).data("grupa")).show();
			$("#grupa_"+$(element.currentTarget).data("grupa")).load("index.php?page=single&id="+element.currentTarget.id);
		}
	});

});