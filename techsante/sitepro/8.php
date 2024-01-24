<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo htmlspecialchars(($seoTitle !== "") ? $seoTitle : "POPUP"); ?></title>
	<base href="{{base_url}}" />
			<meta name="viewport" content="width=1200" />
		<meta name="description" content="<?php echo htmlspecialchars(($seoDescription !== "") ? $seoDescription : ""); ?>" />
	<meta name="keywords" content="<?php echo htmlspecialchars(($seoKeywords !== "") ? $seoKeywords : ""); ?>" />
		<!-- Facebook Open Graph -->
	<meta property="og:title" content="<?php echo htmlspecialchars(($seoTitle !== "") ? $seoTitle : "POPUP"); ?>" />
	<meta property="og:description" content="<?php echo htmlspecialchars(($seoDescription !== "") ? $seoDescription : ""); ?>" />
	<meta property="og:image" content="<?php echo htmlspecialchars(($seoImage !== "") ? "{{base_url}}".$seoImage : ""); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{curr_url}}" />
	<!-- Facebook Open Graph end -->
		
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js?v=20191203163512" type="text/javascript"></script>

	<link href="css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="css/site.css?v=20200131150053" rel="stylesheet" type="text/css" id="wb-site-stylesheet" />
	<link href="css/common.css?ts=1580489155" rel="stylesheet" type="text/css" />
	<link href="css/8.css?ts=1580489155" rel="stylesheet" type="text/css" id="wb-page-stylesheet" />
	<ga-code/><meta name="google-site-verification" content="" />
	<script type="text/javascript">
	window.useTrailingSlashes = true;
</script>
	
	<link href="css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css" />	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->

	</head>


<body class="site <?php if (isset($wbPopupMode) && $wbPopupMode) echo ' popup-mode'; ?>" <?php if (isset($wbLandingPage) && $wbLandingPage) echo ' data-landing-page="'.$wbLandingPage.'"'; ?>><div class="root"><div class="vbox wb_container" id="wb_main">
	
<div class="wb_cont_inner"></div><div class="wb_cont_outer"></div><div class="wb_cont_bg"></div></div><div class="wb_sbg"></div></div>{{hr_out}}</body>
</html>
