<?php
header("Content-type: text/css"); 
/*
 *  User custom styles
 */

define( 'WP_USE_THEMES', false );
require_once('../../../../wp-load.php');
$plugins_url = plugins_url();
?>


@import url(http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic);

* {
	filter: none;
}

/* http://meyerweb.com/eric/tools/css/neset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}

body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
strong {
	font-weight: bold;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
} 

/**  MAIN STYLES  **/

body.login div#login h1 a {
    background-image: url(<?php echo $plugins_url; ?>/retina-press-new/images/figloginlogo.png) !important;) !important;
    background-size: <?php if ($fig_options["fig_LogoWidth"] != "") { echo $fig_options["fig_LogoWidth"]; } else { echo '298px'; } ?> <?php if ($fig_options["fig_LogoHeight"] != "") { echo $fig_options["fig_LogoHeight"]; } else { echo '92px'; } ?> !important;
    width: <?php if ($fig_options["fig_LogoWidth"] != "") { echo $fig_options["fig_LogoWidth"]; } else { echo '298px'; } ?> !important;
    height: <?php if ($fig_options["fig_LogoHeight"] != "") { echo $fig_options["fig_LogoHeight"]; } else { echo '92px'; } ?> !important;
}
body.login, html {
	font-family: 'Lato', sans-serif;;
	font-size: 12px;
	background: #<?php if ($fig_options["fig_PrimaryColour"] != "") { echo $fig_options["fig_PrimaryColour"]; } else { echo '3E2F77'; } ?> !important;
}

p {
	margin: 0 0 10px 0;
	line-height: 15px;
}

a:link, a:active, a:visited {
	text-decoration: none;
	color: #5daced;
}

input[type="checkbox"] {
	width: 10px !important;
}

input, textarea, .login form .input, .login input[type="text"] {
	padding:10px;
	font-size: 12px;
	border: none !important;
	color:#<?php if ($fig_options["fig_LoginInputTextColour"] != "") { echo $fig_options["fig_LoginInputTextColour"]; } else { echo '4C2F91'; } ?> !important;
	background: #<?php if ($fig_options["fig_LoginInputColour"] != "") { echo $fig_options["fig_LoginInputColour"]; } else { echo 'FFFFFF'; } ?> !important;
	box-shadow: inset 0 0 1px rgba(0, 0, 0, .5) !important;
	-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, .5) !important;
	-moz-box-shadow: inset 0 0 2px rgba(0, 0, 0, .5) !important;
	width: 100%;
	margin: 10px 0 15px 0;
	
	border-radius:3px;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
}

input:focus, textarea:focus, .login form .input:focus, .login input[type="text"]:focus {
	
}

#loginform {
	background: none;
	border: none;
	padding: 20px 20px 0 20px !important;
	box-shadow: none;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	-o-box-shadow: none;
}

#loginform label {
	color: #<?php if ($options['custom_login_label'] != "") { echo $options['custom_login_label']; } else { echo 'ffffff'; } ?>;
}

#loginform #wp-submit {
	border: none !important;
	color: #<?php if ($fig_options["fig_LoginPrimaryButtonTextColour"] != "") { echo $fig_options["fig_LoginPrimaryButtonTextColour"]; } else { echo 'FFFFFF'; } ?> !important;
	width: 100%;
	margin: 0;
	font-weight: bold;
	height: auto;
	line-height: normal;
	padding: 10px !important;
	margin: 10px 0;
	background: #<?php if ($fig_options["fig_LoginPrimaryButtonColour"] != "") { echo $fig_options["fig_LoginPrimaryButtonColour"]; } else { echo '49378C'; } ?> !important;
	box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.3) !important;
	-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.3) !important;
	-moz-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.3) !important;
	
	transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	
}

#loginform #wp-submit:hover {
	color: #<?php if ($fig_options["fig_LoginPrimaryButtonTextHoverColour"] != "") { echo $fig_options["fig_LoginPrimaryButtonTextHoverColour"]; } else { echo 'F0F0F0'; } ?>;
	background: #<?php if ($fig_options["fig_LoginPrimaryButtonHoverColour"] != "") { echo $fig_options["fig_LoginPrimaryButtonHoverColour"]; } else { echo '7658E3'; } ?> !important;
}

.login #nav a {
	color: #<?php if ($fig_options["fig_LoginLinkColour"] != "") { echo $fig_options["fig_LoginLinkColour"]; } else { echo 'FFFFFF'; } ?> !important;
	
	transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
}

.login #nav a:hover {
	color: #<?php if ($fig_options["fig_LoginLinkHoverColour"] != "") { echo $fig_options["fig_LoginLinkHoverColour"]; } else { echo 'F0F0F0'; } ?> !important;
}

.login #backtoblog a {
	display: none;
}

#login_error, .login .message {
	margin: 30px 25px 0 30px !important;
	padding: 12px !important;
}

@media
only screen and (-webkit-min-device-pixel-ratio: 2),
only screen and (min--moz-device-pixel-ratio: 2),
only screen and (-o-min-device-pixel-ratio: 2/1),
only screen and (min-device-pixel-ratio: 2),
only screen and (min-resolution: 192dpi),
only screen and (min-resolution: 2dppx) { 

	body.login div#login h1 a {
		background-image: url(<?php if ($options['custom_logo_retina'] != "") { echo $options['custom_logo_retina']; } else { echo '/wp-content/plugins/retina-press-new/images/figloginlogo.png'; } ?>);
		background-size: <?php if ($options['custom_logo_width'] != "") { echo $options['custom_logo_width']; } else { echo '181px'; } ?> !important;
	}

}