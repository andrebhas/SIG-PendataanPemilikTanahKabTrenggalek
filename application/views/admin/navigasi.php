<body class="nav-md">

    <div class="container body">
    
        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <center><a href="#" class="site_title"><span>SIGTANAH</span></a></center>
                    </div>
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url('gambar/user/'.$user->foto)?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $user->username ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <br><br><br><br>
                            <ul class="nav side-menu">
                                <?php $group = 3; 
                                    if ($this->ion_auth->in_group($group)): ?>
                                        <li><a href="<?php echo base_url('data_tanah')  ?>"><i class="fa fa-home"></i>Master Data Tanah</a></li>
                                    
                                    <?php else: ?>
                                        <li><a href="<?php echo base_url('dashboard')  ?>"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                        <li><a href="<?php echo base_url('penduduk')  ?>"><i class="fa fa-home"></i>Data Tanah</a></li>
                                        <li><a href="<?php echo base_url('data_tanah')  ?>"><i class="fa fa-home"></i>Master Data Tanah</a></li>
                                        <li><a href="<?php echo base_url('berita')  ?>"><i class="fa fa-newspaper-o"></i>Berita</a></li>
                                        <li><a href="<?php echo base_url('jenis_bangunan')  ?>"><i class="fa fa-university"></i>Jenis Bangunan</a></li>
                                        <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li><a href="<?php echo base_url('users')  ?>">User</a>
                                                </li>
                                                <li><a href="<?php echo base_url('groups')  ?>">Group</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url('slider')  ?>"><i class="fa fa-picture-o"></i>Slider</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url('gambar/user/'.$user->foto)?>" alt=""><?php echo $user->username ?> <span class=" fa fa-angle-down"> </span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url('users/read/'.$user->id); ?>">  Profile</a>
                                    </li>
                                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation">
                                <a href="<?php echo base_url() ?>"><i class="fa fa-share-square-o"></i> Situs </a>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->