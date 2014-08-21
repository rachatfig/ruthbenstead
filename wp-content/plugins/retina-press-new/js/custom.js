jQuery.noConflict();
jQuery(document).ready(function() {
  	
	jQuery(".wrap form:has(div)").addClass("table-wrap");
	
	// Content wrap for media pages
	jQuery(".upload-php .wrap").children().not("#icon-upload, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for pages
	jQuery(".edit-php .wrap").children().not("#icon-edit-pages, #icon-edit, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for comments pages
	jQuery(".edit-comments-php .wrap").children().not("#icon-edit-comments, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for users pages
	jQuery(".users-php .wrap, .user-new-php .wrap, .profile-php .wrap").children().not("#icon-users, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for tools pages
	jQuery(".tools-php .wrap, .import-php .wrap, .export-php .wrap").children().not("#icon-tools, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for settings pages
	jQuery(".options-general-php .wrap, .options-reading-php .wrap, .options-writing-php .wrap, .options-discussion-php .wrap, .options-media-php .wrap, .options-permalink-php .wrap").children().not("#icon-options-general, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for plugins pages
	jQuery(".plugin-install-php .wrap, .plugins-php .wrap, .plugin-editor-php .wrap").children().not("#icon-plugins, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for appearance pages
	jQuery(".appearance_page_custom-header .wrap, .appearance_page_custom-background .wrap, .theme-editor-php .wrap").children().not("#icon-themes, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for update page
	jQuery(".update-core-php .wrap").children().not("#icon-tools, h2").wrapAll("<div class='content-wrap' />");
	
	// Content wrap for theme page
	jQuery(".theme-install-php .wrap").children().not("#icon-themes, h2").wrapAll("<div class='content-wrap' style='margin-top:0' />");
	
	// Content wrap for wooCommerce
	jQuery(".wrap.woocommerce").children().not(".icon-woocommerce, h2").wrapAll("<div class='content-wrap' />");
	
	
	
	// Remove (brackets) from notifications
    /*if(jQuery('span.count').length){
		v = jQuery("span.count").html().replace(/\(|\)/g, "");
		jQuery("span.count").html(v);
	}else{
		//
	}*/
	if(jQuery('span.count').length){
		jQuery("span.count:contains(')')").each(function () {
		    jQuery(this).html(jQuery(this).html().replace(")", "<span class='transparent'></span>"));
		});
		
		jQuery("span.count:contains('(')").each(function () {
		    jQuery(this).html(jQuery(this).html().replace("(", "<span class='transparent'></span>"));
		});
	}else{
		//
	}
    
    // Navigation animation
    jQuery("ul#adminmenu > li.wp-has-submenu > a").click(function(e){
		jQuery(this).siblings("ul").slideToggle(500);
		jQuery(this).siblings("ul").siblings().addClass("remove-border");
		jQuery(this).parent().siblings("li").find("ul").slideUp(500);
	    return false;  
	});
	
	
	
	if(jQuery("input").is("th > input")){
		//
	} else {
		jQuery('input:checkbox').checkbox();
	}
	
});

/**
 * jQuery custom checkboxes
 * 
 * Copyright (c) 2008 Khavilo Dmitry (http://widowmaker.kiev.ua/checkbox/)
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * @version 1.3.0 Beta 1
 * @author Khavilo Dmitry
 * @mailto wm.morgun@gmail.com
**/

(function(jQuery){
	/* Little trick to remove event bubbling that causes events recursion */
	var CB = function(e)
	{
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
	};
	
	jQuery.fn.checkbox = function(options) {
		/* IE6 background flicker fix */
		try	{ document.execCommand('BackgroundImageCache', false, true);	} catch (e) {}
		
		/* Default settings */
		var settings = {
			cls: 'jquery-checkbox',  /* checkbox  */
			empty: 'http://klevermedia.co.uk/assets/dashboard/images/empty.png'  /* checkbox  */
		};
		
		/* Processing settings */
		settings = jQuery.extend(settings, options || {});
		
		/* Adds check/uncheck & disable/enable events */
		var addEvents = function(object)
		{
			var checked = object.checked;
			var disabled = object.disabled;
			var jQueryobject = jQuery(object);
			
			if ( object.stateInterval )
				clearInterval(object.stateInterval);
			
			object.stateInterval = setInterval(
				function() 
				{
					if ( object.disabled != disabled )
						jQueryobject.trigger( (disabled = !!object.disabled) ? 'disable' : 'enable');
					if ( object.checked != checked )
						jQueryobject.trigger( (checked = !!object.checked) ? 'check' : 'uncheck');
				}, 
				10 /* in miliseconds. Low numbers this can decrease performance on slow computers, high will increase responce time */
			);
			return jQueryobject;
		};
		//try { console.log(this); } catch(e) {}
		
		/* Wrapping all passed elements */
		return this.each(function() 
		{
			var ch = this; /* Reference to DOM Element*/
			var jQuerych = addEvents(ch); /* Adds custom events and returns, jQuery enclosed object */
			
			/* Removing wrapper if already applied  */
			if (ch.wrapper) ch.wrapper.remove();
			
			/* Creating wrapper for checkbox and assigning "hover" event */
			ch.wrapper = jQuery('<span class="' + settings.cls + '"><span class="mark"><img src="' + settings.empty + '" /></span></span>');
			ch.wrapperInner = ch.wrapper.children('span:eq(0)');
			ch.wrapper.hover(
				function(e) { ch.wrapperInner.addClass(settings.cls + '-hover');CB(e); },
				function(e) { ch.wrapperInner.removeClass(settings.cls + '-hover');CB(e); }
			);
			
			/* Wrapping checkbox */
			jQuerych.css({position: 'absolute', zIndex: -1, visibility: 'hidden'}).after(ch.wrapper);
			
			/* Ttying to find "our" label */
			var label = false;
			if (jQuerych.attr('id'))
			{
				label = jQuery('label[for='+jQuerych.attr('id')+']');
				if (!label.length) label = false;
			}
			if (!label)
			{
				/* Trying to utilize "closest()" from jQuery 1.3+ */
				label = jQuerych.closest ? jQuerych.closest('label') : jQuerych.parents('label:eq(0)');
				if (!label.length) label = false;
			}
			/* Labe found, applying event hanlers */
			if (label)
			{
				label.hover(
					function(e) { ch.wrapper.trigger('mouseover', [e]); },
					function(e) { ch.wrapper.trigger('mouseout', [e]); }
				);
				label.click(function(e) { jQuerych.trigger('click',[e]); CB(e); return false;});
			}
			ch.wrapper.click(function(e) { jQuerych.trigger('click',[e]); CB(e); return false;});
			jQuerych.click(function(e) { CB(e); });
			jQuerych.bind('disable', function() { ch.wrapperInner.addClass(settings.cls+'-disabled');}).bind('enable', function() { ch.wrapperInner.removeClass(settings.cls+'-disabled');});
			jQuerych.bind('check', function() { ch.wrapper.addClass(settings.cls+'-checked' );}).bind('uncheck', function() { ch.wrapper.removeClass(settings.cls+'-checked' );});
			
			/* Disable image drag-n-drop for IE */
			jQuery('img', ch.wrapper).bind('dragstart', function () {return false;}).bind('mousedown', function () {return false;});
			
			/* Firefox antiselection hack */
			if ( window.getSelection )
				ch.wrapper.css('MozUserSelect', 'none');
			
			/* Applying checkbox state */
			if ( ch.checked )
				ch.wrapper.addClass(settings.cls + '-checked');
			if ( ch.disabled )
				ch.wrapperInner.addClass(settings.cls + '-disabled');			
		});
	}
})(jQuery);
