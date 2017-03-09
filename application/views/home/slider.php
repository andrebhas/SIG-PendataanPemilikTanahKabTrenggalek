<div class="banner-round">
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <?php foreach ($slider_data as $slider): ?>
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
                            <!-- MAIN IMAGE -->
                                <img src="<?php echo base_url('assets/images/slider/'.$slider->gambar)?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="back-img">
                                <!-- LAYERS -->
                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption grey_heavy_72 skewfromrightshort tp-resizeme rs-parallaxlevel-0" data-x="0" data-y="350" data-speed="500" data-start="120" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 5; max-width: inherit; max-height: inherit; white-space: nowrap;color: #ffffff;font-family: roboto, sans-serif;font-weight: lighter; margin-left:13px; font-size:35px;">
                                    <?php echo $slider->keterangan1 ?>
                                </div>
                                <div class="tp-caption grey_heavy_72 skewfromrightshort tp-resizeme rs-parallaxlevel-0" data-x="0" data-y="420" data-speed="300" data-start="120" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 5; max-width: inherit; max-height: inherit; white-space: nowrap;color: #ffffff;font-family: roboto, sans-serif;font-weight: 700;font-size:46px; margin-left:8px;">
                                    <?php echo $slider->keterangan2 ?>
                                </div>
                            </li>
                            
                        <?php endforeach ?>
                        <!-- SLIDE  -->
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
        </div>
        <!-- /.banner-round -->
        <!-- ============== Banner section ============== -->