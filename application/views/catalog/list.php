<?
switch ($list) {
    case 'product':
        foreach ($product as $page) {
            if ($page->s_name != '') { ?>
                <div class="product">
	                <a href="<?php echo '/product?id=' . $page->pk_i_id?>"><h2><?php echo $page->s_name?></h2></a>
                    <div class="desc">
	                    <?php echo substr(strip_tags(html_entity_decode($page->s_body)), 0, 500)?>
                    </div>
	                <a class="fright" href="<?php echo '/product?id=' . $page->pk_i_id?>">Read more ...</a>
	                <div class="clear"></div>
                </div>
            <?php }
        }
        break;
    default:
        echo 'no list-found';
        break;
}
?>
