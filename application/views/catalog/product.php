<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Search</h3>
        </div>

        <div class="panel-body">
            <form class="search product" action="/product" method="post">
                <input type="hidden" value="<?=$page?>" name="page">
                <div class="form-group">
                    <input class="form-control" type="text" name="s_key" value="<?=$s_key?>" placeholder="Search...">
                </div>
                <div class="form-group">
                    <? function create_combobox_view($_cats = array(), $_selected = ''){ ?>
                        <?php foreach ($_cats as $_cat) { ?>
                            <option <? if ($_selected == $_cat['pk_i_id']) echo 'selected="selected"'?>
                                data-url='<?php echo $_cat['s_url']?>'
                                onclick="$('.form').attr('action',)"
                                value='<?php echo $_cat['pk_i_id']?>'>
                                <?=str_repeat("&nbsp;&nbsp;&nbsp;", $_cat['i_depth'])?> <?php echo $_cat['s_name']?>
                            </option>
                            <? if ($_cat['sub']) echo create_combobox_view($_cat['sub'], $_selected);?>
                        <?php } ?>
                    <? } ?>

                    <select name="fk_i_cat_id" class="form-control fk_i_cat_id">
                        <option selected="selected" value='' data-url="">Select Category</option>
                        <?=create_combobox_view($categories, $cat)?>
                    </select>

                    <script type="application/javascript">
                        $('select.fk_i_cat_id').change(function(){
                            $('form.search.product').attr('action','/product'+ $(this).find('option:selected').data('url'))
                        })
                    </script>

                </div>
                <button class="btn btn-info btn-sm" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Recent Post</h3>
        </div>

        <div class="panel-body">
            <? foreach ($recent_product as $p) { ?>
                <a href="<?php echo '/product?id=' . $p->pk_i_id?>">
                    <h5><?php echo $p->s_name?>
                        <small><?php echo substr(strip_tags(html_entity_decode($p->s_body)), 0, 50)?>
                            ... <b><?=format_date($p->dt_modified)?></b></small>
                    </h5>

                </a>
            <? }?>
        </div>
    </div>

</div>
<div class="col-md-9 form-group">
    <?php if ($id) { ?>
        <div class="panel panel-info">
            <ol class="breadcrumb">
                <?=$breadcrumb?>
                <li class="active"><?=$article->s_name?></li>
            </ol>
            <div class="panel-body">

                <? if ($article->i_level == 2 && !$isLogin) {?>
                    <div class="center">
                        <h2>Access Denied</h2>
                        <hr>
                        <div>
                            please <a href="/login">Sign Up</a> to continue read this article
                        </div>
                    </div>
                <?} else {?>
                    <div>
                        <img class="image-preview" data-zoom-image="/images/product/<?=$article->s_image?>"
                             src="/images/product/thumbs/<?=$article->s_image?>" alt="" style="max-width: 100%">

                        <div id="navigator" class="navigator">
                            <?if ($article->s_image) { ?>
                                <a href="#" data-zoom-image="/images/product/<?=$article->s_image?>"
                                   data-image="/images/product/thumbs/<?=$article->s_image?>">
                                    <div class="img-thumb active"
                                         style="background-image: url('/images/product/thumbs/<?=$article->s_image?>')"></div>
                                </a>
                            <? }?>
                            <?if ($article->s_image2) { ?>
                                <a href="#" data-zoom-image="/images/product/<?=$article->s_image2?>"
                                   data-image="/images/product/thumbs/<?=$article->s_image2?>">
                                    <div class="img-thumb"
                                         style="background-image: url('/images/product/thumbs/<?=$article->s_image2?>')"></div>
                                </a>
                            <? }?>
                            <?if ($article->s_image3) { ?>
                                <a href="#" data-zoom-image="/images/product/<?=$article->s_image3?>"
                                   data-image="/images/product/thumbs/<?=$article->s_image3?>">
                                    <div class="img-thumb"
                                         style="background-image: url('/images/product/thumbs/<?=$article->s_image3?>')"></div>
                                </a>
                            <? }?>

                            <?if ($article->s_image4) { ?>
                                <a href="#" data-zoom-image="/images/product/<?=$article->s_image4?>"
                                   data-image="/images/product/thumbs/<?=$article->s_image4?>">
                                    <div class="img-thumb"
                                         style="background-image: url('/images/product/thumbs/<?=$article->s_image4?>')"></div>
                                </a>
                            <? }?>
                        </div>
                    </div>
                    <div class="desc">
                        <h1><?php echo $article->s_name?></h1>
                        <?php echo $article->s_body;?>
                    </div>
                <? } ?>
                <a href="/product" class="btn btn-danger">back to home</a>
            </div>
        </div>
    <?php } else { ?>
        <?if ($product) { ?>
            <div class="items-table">
                <? $this->load->view('catalog/list'); ?>
            </div>
            <center>
                <button class='btn btn-info load-more'>Load More</button>
            </center>
        <? } else {?>
            <div class="product panel panel-danger">
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
