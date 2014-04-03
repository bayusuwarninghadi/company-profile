<script type="text/javascript" src="/js/nivo-slider/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="/js/carousel.js"></script>
<link rel="stylesheet" href="/js/nivo-slider/themes/default/default.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="/js/nivo-slider/themes/bar/bar.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="/js/nivo-slider/nivo-slider.css" type="text/css" media="screen"/>

<div class="slider shadow" style="margin-top: -12px;">
	<div class="slider-wrapper theme-default">
		<div id="slider" class="nivoSlider">
			<? foreach ($slider as $item) { ?>
			<a href="<?=$item->s_link?>">
				<img src="/images/slider/thumbs/<?=$item->s_image?>" data-thumb="/images/slider/<?=$item->s_image?>"
				     alt="" title="<?=$item->s_name?>"/>
			</a>
			<? } ?>
		</div>
	</div>
</div>

<div class="center navbar-home">
	<div data-href="" class="transition navbar-home-menu"><i class="icon-wrench"></i>&nbsp; slider</div>
	<div data-href="about" class="transition navbar-home-menu"><i class="icon-wrench"></i>&nbsp; About</div>
	<div data-href="new-product" class="transition navbar-home-menu"><i class="icon-briefcase"></i>&nbsp; Article</div>
	<div data-href="gallery" class="transition navbar-home-menu"><i class="icon-picture"></i>&nbsp; Gallery</div>
</div>

<div id="about" class="home-box white shadow" style="margin-top: -10px;">
	 <div class="container">
		 <h1 class="center" style="font-style: italic; font-weight: normal; ">
			 <?=$setting['site_name']?>
			 <hr>
			 <small>"<?=$setting['tagline']?>"</small>
		 </h1>
		 <div class="pad01 center" style="line-height: 200%; font-size: 120%;">
			 <iframe width="560" height="315" src="//<?=$setting['youtube_url']?>" frameborder="0" allowfullscreen></iframe>

			 <?=$promo->s_body?>
			 <div class="clear"></div>
		 </div>
	 </div>
</div>

<div id="new-product" class="pad20 home-box blue shadow">
	<div class="container center">
		<h1>New Article</h1>
		<hr>
		<div class="desc">
			<?php echo $homearticle->s_body;?>
		</div>

		<br>
		<ul class="new-product no-over">
			<? foreach ($new_product as $prod) { ?>
			<li>
				<a href="/product?id=<?=$prod->pk_i_id?>">
					<div class="product round fleft shadow transition" style="background-image: url('/images/product/thumbs/<?=$prod->s_image?>')">
						<div class="title center"><?=$prod->s_name?></div>
						<div class="desc">
							<?php echo substr(strip_tags(html_entity_decode($prod->s_body)), 0, 150)?> ...
						</div>
					</div>
				</a>
			</li>
			<? }?>
			<div class="clear"></div>
		</ul>
	</div>
</div>

<div id="gallery" class="home-box purple">
	<div class="container center ">
		<h1>Gallery</h1>
		<hr>
		<div class="desc">
			<?php echo $homearticle->s_body;?>
		</div>
		<br>
		<? $i = 0;?>
		<? foreach ($images as $image) { ?>
		<div style="background-image: url('<?=$image['thumb_url'];?>') " class="preview transition"></div>
		<? $i++?>
		<? if ($i == 10) break;?>
		<? }?>
		<br>
		<button id="preview-gallery">&nbsp;&nbsp;&nbsp; PREVIEW &nbsp;&nbsp;&nbsp;</button>
		<div class="gallery-box">
			<div class="gallery-content">
				<div class="gallery-slider">
					<? foreach ($images as $image) { ?>
					<img src="<?=$image['url'];?>" width="900" height="600"  data-thumb="<?=$image['thumb_url'];?>" />
					<? }?>
				</div>
			</div>
			<div class="close">&times;</div>
		</div>
	</div>
</div>
<style type="text/css">
	.main-container { padding-bottom: 0;}
	.preview {
		height: 100px;
		width: 100px;
		border: 2px solid #111;
		margin: 5px;
		overflow: hidden;
		background: #fff no-repeat;
		background-size: cover;
		position: relative;
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
		filter: gray;
		-webkit-filter: grayscale(100%);
		display: inline-block;
	}
	.preview:hover {
		filter: none;
		-webkit-filter: none;
	}

	.gallery-box {
		display: none;
		position: fixed;
		z-index: 1000;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: #111;
	}
	.gallery-box .close {
		position: fixed;
		z-index: 1000;
		top: 5px;
		right: 5px;
		padding: 10px;
		cursor: pointer;
		background: #fff;
		color: #111;
	}

	.gallery-content{
		position: fixed;
		bottom: 74px;
		right: 10px;
		left: 10px;
		top: 10px;
		z-index: 1000;
	}
	.gallery-slider img {
		max-width: 100% !important;
		max-height: 100% !important;
		height: auto !important;
		width: auto !important;
		margin: 0 auto;
	}
	.gallery-slider .nivo-slice {
		display: none;
	}
	.gallery-content .nivo-controlNav{
		position: fixed;
		bottom: 0;
		right: 0;
		left: 0;
		z-index: 1000;
		background: #111;
		padding: 0;
		height: 56px;
		overflow: hidden;
	}
	.gallery-content .nivo-controlNav img{
		height: 50px;
		margin: 2px;
		border: 1px solid #fff;
	}

</style>
<script type="text/javascript">
	$('.new-product').carousel({
		slidespeed:700,
		auto:5000,
		width:333,
		height:200,
		visible:3
	});
	$('#slider').nivoSlider();

	$('#preview-gallery').click(function(){
		$('.gallery-box').show()
		$('.gallery-slider').nivoSlider({
			manualAdvance: true,
			effect:'fade',
			prevText: '<i class="icon-caret-left"></i>',               // Prev directionNav text
			nextText: '<i class="icon-caret-right"></i>',               // Next directionNav text
			controlNav:true, /* Display the control navigation */
			controlNavThumbs:true, /* Display thumbnails */
			controlNavThumbsFromRel:true /* Source thumbnails from rel attribute */
		});
	})
	$('.gallery-box .close').click(function(){$('.gallery-box').hide()})

</script>
