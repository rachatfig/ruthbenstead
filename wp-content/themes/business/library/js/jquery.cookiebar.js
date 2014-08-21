(function($){
	$.cookieBar = function(options,val){
		if(options=='cookies'){
			var doReturn = 'cookies';
		}else if(options=='set'){
			var doReturn = 'set';
		}else{
			var doReturn = false;
		}
		var defaults = {
			messagelarge: ' We use cookies on our website to track visits. Please continue to browse as normal if you are happy with this, or you can change your cookie preferences <a href="http://www.allaboutcookies.org/manage-cookies/">here.</a> ', //Message displayed on bar
			messagesmall: 'We use cookies on our website to track visits. <a href="http://www.allaboutcookies.org/manage-cookies/">Find out more.</a>', //Message displayed on bar
			acceptButton: true, //Set to true to show accept/enable button
			acceptText: 'X', //Text on accept/enable button
			declineButton: false, //Set to true to show decline/disable button
			declineText: 'Disable Cookies', //Text on decline/disable button
			policyButton: false, //Set to true to show Privacy Policy button
			policyText: 'View our policy.', //Text on Privacy Policy button
			policyURL: '/privacy-policy/', //URL of Privacy Policy
			autoEnable: true, //Set to true for cookies to be accepted automatically. Banner still shows
			expireDays: 365, //Number of days for cookieBar cookie to be stored for
			forceShow: false, //Force cookieBar to show regardless of user cookie preference
			effect: 'slide', //Options: slide, fade, hide
			element: 'body', //Element to append/prepend cookieBar to. Remember "." for class or "#" for id.
			append: true, //Set to true for cookieBar HTML to be placed at base of website. Actual position may change according to CSS
			fixed: true, //Set to true to add the class "fixed" to the cookie bar. Default CSS should fix the position
			zindex: '', //Can be set in CSS, although some may prefer to set here
			redirect: String(window.location.href), //Current location
			domain: String(window.location.hostname) //Location of privacy policy
		}
		var options = $.extend(defaults,options);
		
		//Sets expiration date for cookie
		var expireDate = new Date();
		expireDate.setTime(expireDate.getTime()+(options.expireDays*24*60*60*1000));
		expireDate = expireDate.toGMTString();
		
		var cookieEntry = 'cb-enabled={value}; expires='+expireDate+'; path=/'
		
		//Retrieves current cookie preference
		var i,cookieValue='',aCookie,aCookies=document.cookie.split('; ');
		for (i=0;i<aCookies.length;i++){
			aCookie = aCookies[i].split('=');
			if(aCookie[0]=='cb-enabled'){
    			cookieValue = aCookie[1];
			}
		}
		//Sets up default cookie preference if not already set
		if(cookieValue=='' && options.autoEnable){
			cookieValue = 'enabled';
			document.cookie = cookieEntry.replace('{value}','enabled');
		}
		if(doReturn=='cookies'){
			//Returns true if cookies are enabled, false otherwise
			if(cookieValue=='enabled' || cookieValue=='accepted'){
				return true;
			}else{
				return false;
			}
		}else if(doReturn=='set' && (val=='accepted' || val=='declined')){
			//Sets value of cookie to 'accepted' or 'declined'
			document.cookie = cookieEntry.replace('{value}',val);
			if(val=='accepted'){
				return true;
			}else{
				return false;
			}
		}else{
			//Sets up enable/accept button if required
			var messagelarge = options.messagelarge.replace('{policy_url}',options.policyURL);
			var messagesmall = options.messagesmall.replace('{policy_url}',options.policyURL);
			
			if(options.acceptButton){
				var acceptButton = '<div class="close"><a href="" class="cb-enable">'+options.acceptText+'</a></a>';
			}else{
				var acceptButton = '';
			}
			//Sets up disable/decline button if required
			if(options.declineButton){
				var declineButton = '<a href="" class="cb-disable">'+options.declineText+'</a>';
			}else{
				var declineButton = '';
			}
			//Sets up privacy policy button if required
			if(options.policyButton){
				var policyButton = '<a href="'+options.policyURL+'" class="cb-policy">'+options.policyText+'</a>';
			}else{
				var policyButton = '';
			}
			//Whether to add "fixed" class to cookie bar
			if(options.fixed){
				var fixed = ' class="fixedcookie"';
			}else{
				var fixed = '';
			}
			if(options.zindex!=''){
				var zindex = ' style="z-index:'+options.zindex+';"';
			}else{
				var zindex = '';
			}
			
			//Displays the cookie bar if arguments met
			if(options.forceShow || cookieValue=='enabled' || cookieValue==''){
				if(options.append){
					$(options.element).append('<div id="cookie-bar"'+fixed+zindex+'><div class="message">'+messagelarge+'</div><div class="message2">'+messagesmall+'</div>'+acceptButton+declineButton+policyButton+'</div>');
				}else{
					$(options.element).prepend('<div id="cookie-bar"'+fixed+zindex+'><div>'+message+acceptButton+declineButton+policyButton+'</div></div>');
				}
			}
			
			//Sets the cookie preference to accepted if enable/accept button pressed
			$('#cookie-bar .cb-enable').click(function(){
				document.cookie = cookieEntry.replace('{value}','accepted');
				if(cookieValue!='enabled' && cookieValue!='accepted'){
					window.location = options.currentLocation;
				}else{
					if(options.effect=='slide'){
						$('#cookie-bar').slideUp(300,function(){$('#cookie-bar').remove()});
					}else if(options.effect=='fade'){
						$('#cookie-bar').fadeOut(300,function(){$('#cookie-bar').remove()});
					}else{
						$('#cookie-bar').hide(0,function(){$('#cookie-bar').remove()});
					}
					return false;
				}
			});
			//Sets the cookie preference to declined if disable/decline button pressed
			$('#cookie-bar .cb-disable').click(function(){
				var deleteDate = new Date();
				deleteDate.setTime(deleteDate.getTime()-(864000000));
				deleteDate = deleteDate.toGMTString();
				aCookies=document.cookie.split('; ');
				for (i=0;i<aCookies.length;i++){
					aCookie = aCookies[i].split('=');
					if(aCookie[0].indexOf('_')>=0){
						document.cookie = aCookie[0]+'=0; expires='+deleteDate+'; domain='+options.domain.replace('www','')+'; path=/';
					}else{
						document.cookie = aCookie[0]+'=0; expires='+deleteDate+'; path=/';
					}
				}
				document.cookie = cookieEntry.replace('{value}','declined');
				if(cookieValue=='enabled' && cookieValue!='accepted'){
					window.location = options.currentLocation;
				}else{
					if(options.effect=='slide'){
						$('#cookie-bar').slideUp(300,function(){$('#cookie-bar').remove()});
					}else if(options.effect=='fade'){
						$('#cookie-bar').fadeOut(300,function(){$('#cookie-bar').remove()});
					}else{
						$('#cookie-bar').hide(0,function(){$('#cookie-bar').remove()});
					}
					return false;
				}
			});
		}
	}
})(jQuery);