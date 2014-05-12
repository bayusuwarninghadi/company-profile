<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <h1><?php echo $page->s_name?></h1>
            <br>
        </div>

        <? if (isset($page->s_image)) { ?>
            <div class="form-group">
                <img style="max-width: 100%" src="/images/pages/<?=$page->s_image?>">
            </div>
        <? } ?>
        <div class="form-group">
            <div style="line-height: 200%">
                <?php echo $page->s_body;?>
            </div>
        </div>
    </div>
</div>

<div class="row">
</div>