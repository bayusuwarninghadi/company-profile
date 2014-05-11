<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Search</h3>
        </div>
        <div class="panel-body">
            <form class="search product" action="/article" method="post">
                <input type="hidden" value="<?=$page?>" name="page">
                <div class="form-group">
                    <input class="form-control" type="text" name="s_key" value="<?=$s_key?>" placeholder="Search...">
                </div>
                <button class="btn btn-default" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-9">
    <?php if ($id) { ?>
        <div class="article">
            <? if ($article->s_image) { ?>
                <img src="/images/article/<?=$article->s_image?>" alt="" style="max-width: 100%">
            <? }?>
            <h1><?php echo $article->s_name?></h1>
            <div class="desc">
                <?php echo html_entity_decode($article->s_body);?>
            </div>
        </div>
        <a href="/article" class="btn btn-danger"><< back to home</a>
    <?php } else { ?>
        <?if ($article) { ?>
            <div class="items-table">
                <? $this->load->view('catalog/list'); ?>
            </div>

            <center>
                <button class='btn btn-info load-more'>Load More</button>
            </center>
        <? } else {?>
            <div class="product panel panel-success">
                <div class="panel-heading">
                    No List Found
                </div>

                <div class="panel-body">
                    <center>No List Found</center>
                </div>
            </div>
        <?}?>
    <?php }?>

</div>
