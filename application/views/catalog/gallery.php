<?php if ($id) { ?>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h1 class="panel-title"><?=$gallery->s_name?></h1>
        </div>
        <div class="panel-body">
            <p>
                <?=$gallery->s_body?>
            </p>
            <br>
            <div class="row">
                <script type="text/javascript" src="/js/nivo-slider/jquery.nivo.slider.js"></script>
                <link rel="stylesheet" href="/js/nivo-slider/themes/light/light.css" type="text/css"
                      media="screen"/>
                <link rel="stylesheet" href="/js/nivo-slider/themes/bar/bar.css" type="text/css" media="screen"/>
                <link rel="stylesheet" href="/js/nivo-slider/nivo-slider.css" type="text/css" media="screen"/>
                <div class="slider">
                    <div class="slider-wrapper theme-light">
                        <div id="slider" class="nivoSlider">
                            <? foreach ( $images as $image) { ?>
                                <img src="<?=$image['url'];?>" title="<?=$image['url'];?>" data-thumb="<?=$image['thumb_url'];?>" />
                            <? } ?>
                        </div>
                    </div>
                </div>
                <script type="application/javascript">
                    $('#slider').nivoSlider({
                        effect: 'fade',
                        ControlNavThumbs: true,
                        manualAdvance: false
                    });
                </script>
            </div>
            <br>
            <a href="/gallery" class="btn btn-danger">back to gallery</a>
        </div>
    </div>
<?php } else { ?>
    <?if ($gallery) { ?>
        <script type="text/javascript" src="/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="/js/imagesloaded.pkgd.min.js"></script>
        <div id="masonry-container">
            <?foreach ($gallery as $page) { ?>
                <div class="col-sm-3 item">
                    <a class="panel-title" href="<?php echo '/gallery?id=' . $page->pk_i_id?>">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <?php echo $page->s_name?>
                                </h2>
                            </div>
                            <div class="panel-body">

                                <img width="100%" src="/images/gallery/<?=$page->pk_i_id?>/thumbs/<?=$page->s_primary?>">
                            </div>
                        </div>
                    </a>
                </div>
            <?php }?>
        </div>
        <script type="application/javascript">
            var $container = $('#masonry-container').masonry();
            $container.imagesLoaded( function() {
                $container.masonry();
            });
        </script>
    <? } else {?>
        <div class="product panel panel-danger">
            <div class="panel-body">
                <center>No List Found</center>
            </div>
        </div>
    <?}?>
<?php }?>

