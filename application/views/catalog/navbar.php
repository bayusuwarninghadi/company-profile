<div class="main-navbar">
    <nav class="navbar navbar-default transition" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="icon icon-list-ul"></i>
                </button>
                <a class="navbar-brand" href="/">&nbsp;<i class="icon icon-home"></i>&nbsp;</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
<!--                    <li><a href="/article">Article</a></li>-->
                    <?php foreach ($categories as $cat) { ?>
                        <?php if ($cat['sub']) { ?>
                            <li class="dropdown dropdown-<?=$cat['s_slug']?>">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="/product<?=$cat['s_url']?>">
                                    <?=$cat['s_name']?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($cat['sub'] as $cat) { ?>
                                        <li><a href="/product<?=$cat['s_url']?>"><?=$cat['s_name']?></a></li>
                                    <?}?>
                                </ul>
                            </li>
                        <? } else {?>
                            <li><a href="/product<?=$cat['s_url']?>"><?=$cat['s_name']?></a></li>
                        <?}?>

                    <?php } ?>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="/product" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="s_key" >
                    </div>
                    <button type="submit" class="btn btn-default">&nbsp;<i class="icon-search"></i>&nbsp;</button>
                </form>
                <ul class="nav navbar-nav navbar-right" style="margin-left: 10px;">
                    <li class="active"><a href="#header">&nbsp;<i class="to-top icon-arrow-up"></i>&nbsp;</a></li>
                </ul>

                <ul class="navbar-form navbar-right">
                    <? if ($isLogin == 1) { ?>
                        <?=$loggedUser->s_name?> <a class="btn btn-danger" href="/logout">Logout</a>
                    <?} else {?>
                        <a href="/register">Register</a> &nbsp; <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Sign In</button>
                    <?}?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

</div>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="/login" method="post" class="round pad1 content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="s_email">Username</label>
                        <input type="email" class="form-control" name="s_email" placeholder="Username / Email">
                    </div>
                    <div class="form-group">
                        <label for="s_password">Password</label>
                        <input type="password" class="form-control" name="s_password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </div>
        </div>
    </form>
</div>