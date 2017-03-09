<br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="alert1" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">Berita</h3>

                            <?php foreach ($berita as $bt): ?>
                                <h3 class="blog3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s"><?php echo $bt->judul ?></h3>
                                <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">By:
                                    <a ><?php echo $bt->username ?></a> I
                                    <a ><?php echo $bt->tanggal ?></a>
                                </p>
                                <br/>
                                <p class="blog2 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <?php $isi = word_limiter($bt->isi, 60);
                                    echo $isi ?>
                                </p>
                                <br>
                                <div class="row wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <h4 class="pull-right">
                                        <a href="<?php echo base_url('home/berita_detail/'.$bt->id_berita) ?>" class="btn btn-warning btn-xs"><i class="fa fa-news"></i> Baca </a>
                                    </h4>
                                </div>
                            <?php endforeach ?>

                        </div>
                        <br><br>
                    </div>
                    <br><br><br><br><br>
                    <div class="row">
                        <div class="col-md-12 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s">
                            <center>
                                <?php echo $pagination ?>
                            </center>
                        </div>
                    </div>
                    <br/>
                </div>

            </div>
        </div>