<?
switch ($list) {
    case 'product':
        foreach ($product as $page) {
            if ($page->s_name != '') { ?>
                <div class="product panel panel-success">
                    <div class="panel-body">
                        <a href="<?php echo '/product?id=' . $page->pk_i_id?>">
                            <span class="label label-info"><?php echo $page->s_name?></span>
                        </a>
                        <hr>
                        <div class="form-group">
                            <?php echo substr(strip_tags(html_entity_decode($page->s_body)), 0, 500)?>
                        </div>
                        <br>
                        <a class="btn btn-success btn-sm" href="<?php echo '/product?id=' . $page->pk_i_id?>">Read more ...</a>
                    </div>
                </div>
            <?php }
        }
        break;
    default:
        echo 'no list-found';
        break;
}
?>
