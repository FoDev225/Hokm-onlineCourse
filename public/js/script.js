$(document).ready(function(){
	$(window).scroll(function(){
		if(this.scrollY > 20)
		{
			$('.navigation').addClass("sticky");
		}
		else
		{
			$('.navigation').removeClass("sticky");
		}

		if(this.scroll > 500)
		{
			$('.scroll-up-btn').addClass("show");
		}
		else
		{
			$('.scroll-up-btn').removeClass("show");
		}
	})
});