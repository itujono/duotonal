$(function() {
	altair_captcha_validation.init()
});
altair_captcha_validation = {
	init: function() {
		window.onload = function() {
			var recaptcha = document.forms["loginrest"]["g-recaptcha-response"];
			recaptcha.required = true;
			recaptcha.oninvalid = function(e) {
		        // do something
		        //alert("Please complete the captcha");
		        UIkit.modal.alert("Please complete the captcha");
	    	}
		}
	}
};