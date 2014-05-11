<?
switch ($list) {
    case 'article':
        foreach ($article as $page) {
            if ($page->s_name != '') { ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="<?php echo '/product?id=' . $page->pk_i_id?>">
                            <h3 class="panel-title"><?php echo $page->s_name?></h3>
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="desc">
                            <?php echo html_entity_decode(substr(strip_tags($page->s_body), 0, 500))?>
                        </div>
                        <br>
                        <a class="btn btn-success btn-small" href="<?php echo '/article?id=' . $page->pk_i_id?>">Read more ...</a>
                    </div>
                </div>
            <?php }
        }
        break;

    case 'product':
        foreach ($product as $page) {
            if ($page->s_name != '') { ?>
                <div class="product panel panel-info">
                    <div class="panel-heading">
                        <a href="<?php echo '/product?id=' . $page->pk_i_id?>">
                            <h3 class="panel-title"><?php echo $page->s_name?></h3>
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="desc">
                            <?php echo substr(strip_tags(html_entity_decode($page->s_body)), 0, 500)?>
                        </div>
                        <br>
                        <a class="btn btn-success btn-small" href="<?php echo '/product?id=' . $page->pk_i_id?>">Read more ...</a>
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
