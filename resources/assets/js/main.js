	//ползунок
	$(window).keyup(function(e){
		var target = $('.checkbox-ios input:focus');
		if (e.keyCode == 9 && $(target).length){
			$(target).parent().addClass('focused');
		}
        console.log('keyup')
	});
	 
	$('.checkbox-ios input').focusout(function(){
		$(this).parent().removeClass('focused');
        console.log('focusout')

	});
