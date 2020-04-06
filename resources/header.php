<!DOCTYPE html>
<html lang="en-us">
<head>
	<title><?php echo $title; ?></title>
	<!-- <noscript><meta http-equiv="Refresh" content="0;URL=.html"> </noscript> -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link rel="stylesheet" href="/delectable/public_html/assets/css/custom.css">
	<link rel="stylesheet" href="/delectable/public_html/assets/css/manager-dashboard-nav.css">
	<link href="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.min.css" rel="stylesheet">
	<style type="text/css">
		#cover {
			position: fixed; 
			height: 100%; 
			width: 100%; 
			top:0; 
			left: 0; 
			background-color: #fff;
			z-index:9999;
		}
	</style>
</head>
<body class="<?php echo (isset($bodyClasses)) ? $bodyClasses : ""; ?>">
<div id="cover">
	<div class="d-flex h-75 justify-content-center align-items-center spinner">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
</div>
<div id="NoJS" class="fixed-top w-100 after-nav alert text-danger rounded-0 py-4 px-3 text-uppercase text-center bg-light">JavaScript disabled. This site requires JavaScript to run properly.</div>