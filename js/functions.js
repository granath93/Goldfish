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



$('body').scrollspy({ target: '.navbar-example' })


$('[data-spy="scroll"]').each(function () {
  var $spy = $(this).scrollspy('refresh')
})