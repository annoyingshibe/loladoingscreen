$(window).resize(function(){
	  $(document.getElementById("main")).css({
	   position:"relative",
	   left: ($(window).width() 
		 - $(document.getElementById("main")).outerWidth())/2,
	   top: ($(window).height() 
		 - $(document.getElementById("main")).outerHeight())/2
	  });
});
$(function() {
	$(window).resize();
});