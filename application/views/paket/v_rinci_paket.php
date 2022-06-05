                <section  class="services section" id="portfolio">
                        <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
                        <div class="container">
                                <div class="services-info">
                                        <h3 class="sub-heading"><?= $title?></h3>
                                        <h1 class="heading"><?= $paket->nama_paket?></h1>
                                        <p class="text">
                                                <?=  $paket->deskripsi_paket?>
                                        </p>
                                        <div class="ml-paket">
                                                        <h5><?= $paket->byk_pertemuan?></h5>
                                        </div>
                                        <div class="milestones paket-rinci">
                                                <div class="ml">
                                                        <h2 class="number"><span>Rp. <?=  number_format($paket->harga,0)?></span></h2>
                                                        <h5 class="paket-h5">Start from</h5>
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
                                                        <h3><?= $paket->nama_paket?></h3>
                                                        <img src="<?= base_url('assets/images/paket/').$paket->image?>" alt="">
                                                </div>
                                                <a href="<?= base_url('home')?>#contact" class="btn secondary-btn">Contact us</a>
                                        </div>
                                        <div class="srv-card">
                                                <div class="card-desc">
                                                        <h3><?= $paket->nama_mobil?></h3>
                                                        <img src="<?= base_url('assets/images/mobil/').$paket->image_mobil?>" alt="">

                                                </div>
                                                <p>
                                                        Transmisi : <?php
                                                                if ($paket->jenis_mobil ==1 ) {?>
                                                                        Manual
                                                        <?php } else {?>
                                                                Matic
                                                        <?php }?>
                                                </p>
                                        </div>
                                        <img src="<?= base_url()?>/assets/images/home/square1.png" alt="" class="shape square">
                                </div>
                        </div>
                </section>