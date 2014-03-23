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
<div class="container white round2 shadow wood-pattern">
	<h1 class="center" style="margin: 50px 10px 10px; font-style: italic; font-weight: normal; ">
		<?=$setting['site_name']?>
		<hr>
		<small>"<?=$setting['tagline']?>"</small>
	</h1>
	<div class="pad01" style="line-height: 200%; font-size: 120%;">
		<iframe  class="fright" style="margin:0 10px 10px 10px; border: 20px solid #ddd; border-radius: 5px;" width="380" height="250" src="//www.youtube.com/embed/2wxzliY5JDU" frameborder="0" allowfullscreen></iframe>
		<?=$promo->s_body?>
		<div class="clear"></div>
	</div>

	<div id="new-product" class="pad20">
		<div class="line">New Article <a href="/product" class="fright">See More >></a></div>
		<ul class="new-product no-over">
			<? $i = 0;?>
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
<script type="text/javascript">
	$('.new-product').carousel({
		slidespeed:700,
		auto:5000,
		width:333,
		height:200,
		visible:3
	});
	$('#slider').nivoSlider();
</script>
