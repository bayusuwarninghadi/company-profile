<html>
<head>
	<title><?php echo $title . ' - ' . $setting['site_name'] ?></title>
	<link rel="stylesheet" href="/css/common.css" type="text/css" media="screen" charset="utf-8"/>
	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css" type="text/css" media="screen"
	      charset="utf-8"/>
	<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" charset="utf-8"/>
	<link rel="stylesheet" href="/css/mstyle.css" type="text/css" media="screen" charset="utf-8"/>
	<!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/js/jquery.elevateZoom-3.0.8.min.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
</head>
<header>
	<? $this->load->view('catalog/navbar')?>
	<div class="fright right pad1">
		<form class="search fright mar01 desktop" action="/product" method="post">
			<input type="text" placeholder="Search..." name="s_key" style="width: 200px;">
			<button type="submit"><i class="icon-search"></i></button>
		</form>
		<span style="line-height: 28px;" class="fright mar01">
			<? if ($isLogin == 1) { ?>
			<a href="/profile"><i class="icon-user"></i> &nbsp;<?=$loggedUser->s_name?></a>
			<? } else { ?>
			<div class="ac-menu">
				<a href="/profile"><i class="icon-user"></i> &nbsp;Sign In</a>
				<div class="none ac-menu-toggler desktop">
					<form action="/login" method="post" class="round pad1 content">
						LOGIN
						<input type="text" name="s_email" placeholder="Username / Email">
						<input type="password" name="s_password" placeholder="Password">
						Dont have account? <a href="/register">SIGN UP</a>
						<input type="submit" value="Sign In">
						<div class="clear"></div>
					</form>
				</div>
			</div>
			<? } ?>
		</span>

		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</header>
<?php if ($flash_message) { ?>
<div class="flash-msg shadow"><?=$flash_message?></div>
<?php }?>

<body>
<div class="main-container">
