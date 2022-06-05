<section  class="services section" id="portfolio">
                        <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
                        <div class="container">
                                <div class="services-info">
                                        <h3 class="sub-heading"><?= $title?></h3>
                                        <h1 class="heading"><?= $sub_title?></h1>
                                        <p class="text">
                                                <?=  $mobil->deskripsi_mobil?>
                                        </p>
                                        <div class="milestones paket-rinci">
                                                <div class="ml">
                                                        <h2 class="number"><span><?= $mobil->nama_mobil?></span></h2>
                                                        <h5 class="paket-h5"> Transmisi : <?php
                                                                if ($mobil->jenis_mobil ==1 ) {?>
                                                                        Manual
                                                        <?php } else {?>
                                                                Matic
                                                        <?php }?></h5>
                                                </div>

                                        </div>
                                        <div class="cta">
                                                <a href="<?= base_url('jadwal/jadwal_peserta')?>" class="btn">Courses now</a>
                                                <!-- <a href="<?= base_url()?>/assets/images/home/markusCV.pdf" download class="btn secondary-btn">Download CV</a> -->
                                        </div>
                                </div>
                                <div class="services-grid">
                                        <div class="srv-card">
                                                <div class="card-desc">
                                                        <h3><?= $mobil->nama_mobil?></h3>
                                                        <img src="<?= base_url('assets/images/mobil/').$mobil->image_mobil?>" alt="">

                                                </div>
                                                <a href="<?= base_url('home')?>#contact" class="btn secondary-btn">Contact us</a>
                                        </div>
                                        <img src="<?= base_url()?>/assets/images/home/square1.png" alt="" class="shape square">
                                </div>
                        </div>
                </section>
                