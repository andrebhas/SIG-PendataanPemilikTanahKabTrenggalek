    <div class="uv-rounds">
        <header>
            <div class="top-section top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 w100 top-icons">
                            <div class="social">
                                <a href="https://facebook.com/"><i class="fa icon-social-facebook fa-x3"></i></a>
                                <a href="https://twitter.com/"><i class="fa icon-social-twitter fa-x3"></i></a>
                                <a href="https://www.youtube.com/"><i class="fa icon-social-youtube fa-x3"></i></a>
                            </div>
                        </div>
                        <!-- /.top-icons -->
                        <div class="col-lg-8 col-md-8 col-sm-8 hidden-xs w100 phone right">
                            <a href="<?php echo base_url('home/contact') ?>" class="email hidden-xs"><i class="fa icon-envelope-open ph-size" aria-hidden="true"></i> jayenghardika@gmail.com</a>
                            <a href="#" class="number hidden-xs"><i class="fa icon-screen-smartphone ph-size" aria-hidden="true"></i> +62 812 165 877 95</a>
                        </div>
                        <div class="col-xs-4 visible-xs  right-in-small">
                            <p class="text-right">
                                <a href="contact_us.html"><i class="fa icon-envelope-open ph-size contact-mail-ph"></i> </a>
                                <a href="contact_us.html"><i class="fa icon-screen-smartphone contact-mail-ph ph-size"></i> </a>
                            </p>
                        </div>
                        <!-- /.phone -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.top-section -->
            <div class="bottom-section">
                <div class="container bottom">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 logo">
                            <a href="<?php echo base_url() ?>">
                                <h3 id="logotop">SIGTANAH</h3>
                            <!-- /.logo 
                                <img src="<?php echo base_url()?>assets/images/logo.png" alt="logo" id="logotop" />
                            -->
                            </a>
                            

                        </div>
                        <!-- /.logo -->
                        <div class="col-lg-9 col-md-9 nav-outer">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li id="Home" class="">
                                                <a href="<?php echo base_url() ?>" class="hvr-underline-from-center">Home</a>
                                            </li>
                                            <li id="Berita" class="">
                                                <a href="<?php echo base_url('home/berita') ?>" class="hvr-underline-from-center">Berita</a>
                                            </li>
                                            <li id="Peta" class="">
                                                <a href="<?php echo base_url('home/peta') ?>" class="remove-border hvr-underline-from-center">Peta Tanah </a>
                                            </li>
                                            <li id="Contact" class="">
                                                <a href="<?php echo base_url('home/contact') ?>" class="remove-border hvr-underline-from-center">Contact</a>
                                            </li>
                                            <a href="<?= base_url('auth/login') ?>" class="mail-ico msg-gap hidden-xs" data-toggle="tooltip" data-placement="top" title="Login Admin"><i class="fa fa-sign-in for_inifial"></i></a>
                                        </ul>
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.container-fluid -->
                            </nav>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.bottom-section -->
        </header>
        <!-- header -->

    <script type="text/javascript">
        document.getElementById("<?= $title ?>").className = "active";
    </script>