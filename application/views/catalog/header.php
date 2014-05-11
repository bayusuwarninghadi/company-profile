<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title><?php echo $title . ' - ' . $setting['site_name'] ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8"/>
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css" type="text/css" media="screen" charset="utf-8"/>
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css" type="text/css" media="screen"
          charset="utf-8"/>

	<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" charset="utf-8"/>
	<link rel="stylesheet" href="/css/mstyle.css" type="text/css" media="screen" charset="utf-8"/>

	<!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->
    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.elevateZoom-3.0.8.min.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
</head>
<header>
	<? $this->load->view('catalog/navbar')?>
</header>
<?php if ($flash_message) { ?>
<div class="flash-msg shadow"><?=$flash_message?></div>
<?php }?>

<body>
<div class="container">
