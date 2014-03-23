<div class="container white round2 shadow wood-pattern">
	<div class="pad1">
		<?php if ($id) { ?>
		<div class="article">
		    <? if ($page->i_level == 2 && !$isLogin) {?>
				<div class="center">
					<h2>Access Denied</h2>
					<hr>
					<div>
						please <a href="/login">Sign Up</a> to continue read this article
					</div>
				</div>
			<?} else {?>
			<div class="fleft" style="width: 30%; position: relative;">
				<img class="image-preview" data-zoom-image="/images/product/<?=$page->s_image?>"
				     src="/images/product/thumbs/<?=$page->s_image?>" alt="" style="max-width: 100%">

				<div id="navigator" class="navigator">
					<?if ($page->s_image) { ?>
					<a href="#" data-zoom-image="/images/product/<?=$page->s_image?>"
					   data-image="/images/product/thumbs/<?=$page->s_image?>">
						<div class="img-thumb active"
						     style="background-image: url('/images/product/thumbs/<?=$page->s_image?>')"></div>
					</a>
					<? }?>
					<?if ($page->s_image2) { ?>
					<a href="#" data-zoom-image="/images/product/<?=$page->s_image2?>"
					   data-image="/images/product/thumbs/<?=$page->s_image2?>">
						<div class="img-thumb"
						     style="background-image: url('/images/product/thumbs/<?=$page->s_image2?>')"></div>
					</a>
					<? }?>
					<?if ($page->s_image3) { ?>
					<a href="#" data-zoom-image="/images/product/<?=$page->s_image3?>"
					   data-image="/images/product/thumbs/<?=$page->s_image3?>">
						<div class="img-thumb"
						     style="background-image: url('/images/product/thumbs/<?=$page->s_image3?>')"></div>
					</a>
					<? }?>

					<?if ($page->s_image4) { ?>
					<a href="#" data-zoom-image="/images/product/<?=$page->s_image4?>"
					   data-image="/images/product/thumbs/<?=$page->s_image4?>">
						<div class="img-thumb"
						     style="background-image: url('/images/product/thumbs/<?=$page->s_image4?>')"></div>
					</a>
					<? }?>
					<div class="clear"></div>
				</div>
			</div>
			<div class="fright desc" style="width: 70%">
				<div class="mar01">
					<h1><?php echo $page->s_name?></h1>

					<?php echo $page->s_body;?>
				</div>
			</div>
			<div class="clear"></div>
			<? } ?>
		</div>
		<a href="/product"><input type="submit" value="<< back to home"></a>
		<?php } else { ?>
		<div class="fright" style="width: 25%">
			<form class="search product" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
				<input type="hidden" value="<?=$page?>" name="page">

				<div class="line">
					<div>Search</div>
					<hr>
					<input type="text" name="s_key" value="<?=$s_key?>" style="width: 100%; min-width: 0;"
					       placeholder="Search...">
					<button type="submit"><i class="icon-search"></i></button>
				</div>

			</form>
			<div class="line">
				<div>Recent Post</div>
				<hr>
				<? foreach ($recent_product as $page) { ?>
				<a href="<?php echo '/product?id=' . $page->pk_i_id?>">
					<h4><?php echo $page->s_name?>
						<small><?php echo substr(strip_tags(html_entity_decode($page->s_body)), 0, 50)?>
							... <?=format_date($page->dt_modified)?></small>
					</h4>

				</a>
				<? }?>
			</div>

		</div>
		<div class="items-table fleft" style="width: 70%">
			<? $this->load->view('catalog/list')?>
		</div>
		<div class="clear"></div>
		<div class='load-more'>Load More</div>
		<?php }?>
		<div class="clear"></div>
	</div>
</div>