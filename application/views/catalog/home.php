</div>
<div class="home-bg inverse">
    <div class="form-group container">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-body">
                    <script type="text/javascript" src="/js/nivo-slider/jquery.nivo.slider.js"></script>
                    <link rel="stylesheet" href="/js/nivo-slider/themes/light/light.css" type="text/css"
                          media="screen"/>
                    <link rel="stylesheet" href="/js/nivo-slider/themes/bar/bar.css" type="text/css" media="screen"/>
                    <link rel="stylesheet" href="/js/nivo-slider/nivo-slider.css" type="text/css" media="screen"/>
                    <div class="slider">
                        <div class="slider-wrapper theme-light">
                            <div id="slider" class="nivoSlider">
                                <? foreach ($slider as $item) { ?>
                                    <a href="<?= $item->s_link ?>">
                                        <img src="/images/slider/thumbs/<?= $item->s_image ?>"
                                             data-thumb="/images/slider/thumbs/<?= $item->s_image ?>"
                                             alt="" title="<?= $item->s_name ?>"/>
                                    </a>
                                <? } ?>
                            </div>
                            <div id="htmlcaption" class="nivo-html-caption">
                                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a
                                    link</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="center">
                <h1><?= $setting['site_name'] ?></h1>
                <h3>"<?= $setting['tagline'] ?>"</h3>
                <hr>
                <div class="form-group" style="line-height: 150%;">
                    <?= $promo->s_body ?>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div class="form-group" style="padding: 60px 0;">
        <div class="col-sm-4">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <h3 class="label label-warning">About Us</h3>
                    <hr>
                    <p>
                        The Generali Group is one of the most significant players in the global insurance and financial products market.
                        The Group is leader in Italy and Assicurazioni Generali, founded in 1831 in Trieste, is the Group's Parent and principal operating Company.
                    </p>

                    <p><a class="btn btn-warning btn-sm" href="/about">View details</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-info">
                <div class="panel-body">
                    <h3 class="label label-info">Article</h3>
                    <hr>

                    <p>
                        Generali Group since 1831 has been characterised by a strong international drive
                        One of the world's 50 largest companies (source: Fortune Global 500)
                        It is a key player in Continental Europe and leader in direct channels, with a significant presence in all main countries
                    </p>

                    <p><a class="btn btn-info btn-sm" href="/product">View details</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="panel-body">
                    <h3 class="label label-success">Gallery</h3>
                    <hr>
                    <p>
                        Highly strong brand both in Italy and abroad.
                        Enviable wide and diversified international presence,  with some excellent competitive positioning in both mature and emerging markets.
                        A total amount of premiums and assets that make us one of the first insurance groups worldwide.
                    </p>

                    <p><a class="btn btn-success btn-sm" href="/gallery">View details</a></p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="center">
            <h4 style="color:#B61014; line-height: 150%;" class="form-group center">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            <p>

                The Group is committed to achieving the optimal client segmentation and enhancing product innovation in order to deliver a targeted approach to clients. Generali aims to be best-in-class for client retention and satisfaction.

                Generali Group operates in the insurance sector with a multichannel distribution strategy through a global proprietary sales network of agents, financial advisors and brokers, supported by bancassurance and direct channels (internet and telephone) where it is Europe's leader.
            </p>
        </div>
    </div>
    <script type="text/javascript">
        $('#slider').nivoSlider({
            effect: 'fade'
        });

    </script>
</div>
<div class="white-bg" style="padding: 60px 0;">
    <div class="container">
        <div class="panel panel-danger  col-sm-3">
            <div class="panel-body">
                <img src="/images/logo.jpg" style="width: 100%;">
            </div>
        </div>
        <div class="col-sm-9">
            <h2 style="color: #B61014">Join generalli and get benefit</h2>
            <hr>
            <p>
                The Generali Group is one of the most significant players in the global insurance and financial products market.
                The Group is leader in Italy and Assicurazioni Generali, founded in 1831 in Trieste, is the Group's Parent and principal operating Company.
            </p>
            <p><a class="btn btn-danger" href="/carrer">View details</a></p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div>