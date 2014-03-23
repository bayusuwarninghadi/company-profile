<div class="container white round2 shadow wood-pattern">
    <? if (isset($page->s_image)) { ?>
    <div class="center">
        <img style="max-width: 100%" src="/images/pages/<?=$page->s_image?>">
    </div>
	<br/>
	<? } ?>
	<div class="pad1">
        <h1><?php echo $page->s_name?></h1>
        <div class="desc">
            <?php echo $page->s_body;?>
        </div>
    </div>
</div>