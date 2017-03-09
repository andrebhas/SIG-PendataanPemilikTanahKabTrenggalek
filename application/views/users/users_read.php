<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Profil <small><?php echo $nama_lengkap; ?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

							    <table class="table">
								    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
								    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
								    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
								    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
								    <tr><td>Foto</td><td> <img width="50" height="50" src="<?php echo base_url('gambar/user/'.$foto) ?>"></td></tr>
								    <tr><td>Last Login</td><td><?php echo $last_login; ?></td></tr>
								    <tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
								</table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>