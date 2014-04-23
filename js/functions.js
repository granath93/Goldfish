function checked(x){
	var buttonYes;
	var buttonNo;

	buttonYes=document.getElementById('change1');

		if (x==1){

		buttonYes.src="images/godkannGraBtn.png";

		}

		if (x==2){

		buttonYes.src="images/godkannBtn.png";
		
		}

		buttonNo=document.getElementById('change2');

		if (x==1){

		buttonNo.src="images/tabortBtn.png";

		}

		if (x==2){

		buttonNo.src="images/tabortBtnGra.png";
		
		}


}



jQuery("document").ready(function($){

	var nav = $('.nav-container');

	$(window).scroll(function(){
		if ($(this).scrollTop()>1){
			nav.addClass("f-nav");
		}

		else {
			nav.removeClass("f-nav");
		}
	});

});
