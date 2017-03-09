<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small><?php echo $button ?> Users</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('check'); ?>
                                <?php echo form_open_multipart($action);?>
                                    <div class="form-group">
                                        <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Username <?php echo form_error('username') ?></label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Password <?php echo form_error('password') ?></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">No Telepon <?php echo form_error('phone') ?></label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Email <?php echo form_error('email') ?></label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Foto <?php echo $this->session->flashdata('error_gambar'); ?></label>
                                        <input type="file" class="form-control" name="foto" id="foto" value="<?php echo $foto; ?>" />
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>