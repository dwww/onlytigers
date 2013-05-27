

$( document ).ready(function() {
 
	var pics_w = $("#pics").width();
    

	var pics = $.map( $("img") , function(n) {return $(n).width();});
	var visine = $.map( $("img") , function(n) {return $(n).height();});
	
	
	//int stp = (int)(Math.random()*1000);
	//int max = (int)(Math.random()*1000);

	
	//int[] arr = new int[stp];  
//	for (int i = 0; i < arr.length; i++) {
//		arr[i] = (int)(Math.random()*300+50);
//	}
	
//	ArrayList<Integer> vrs = null;
	popravki = [];
	var por = 0;
	while(por < pics.length){
		vrs = [];
		var qw = 0;
		while(por < pics.length &&  (qw+pics[por])+10 <= pics_w){
			qw += pics[por]+18;
			vrs.push(pics[por]);		
			por++;
		}
		if(por < pics.length){
			qw -= 8;
			//System.out.print(max+"   "+vrs.size()+"      ");
			var add = (pics_w - qw) / vrs.length;
			
			for(var i in vrs){
				popravki.push( ((i+add)* visine[popravki.length])/i);
			};
			
		}else{
			
		}
	};

	
	 
});