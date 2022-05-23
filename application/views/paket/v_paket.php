<section  class="portfolio section" id="portfolio">
                        <div class="modal">
                                <div class="modal-overlay"></div>
                                <div class="slider-wrap">
                                        <div class="prev-btn navigation">
                                                <i class="uil uil-angle-left"></i>
                                        </div>
                                        <div class="images">
                                                <?php 
                                                foreach ($paket as $key => $value) {?>
                                                        <img class="showImage" src="<?= base_url('assets/images/paket/' .$value->image)?>">
                                                <?php }?>
                                                <?php 
                                                foreach ($mobil as $key => $value) {?>
                                                        <img class="showImage" src="<?= base_url('assets/images/mobil/' .$value->image_mobil)?>">
                                                <?php }?>    
                                        </div>
                                        <div class="next-btn navigation">
                                                <i class="uil uil-angle-right"></i>
                                        </div>
                                </div>
                        </div>
                        <div class="container">
                                <div class="portfolio-header">
                                        <div class="portfolio-title">
                                                <h3 class="sub-heading"><?= $sub_title?></h3>
                                                <h3 class="heading"><?= $sub_heading?></h3>
                                        </div>
                                        <div class="filter-btns">
                                                <button class="filter-btn" data-filter="all">All</button>
                                                <button class="filter-btn" data-filter=".paket">Paket</button>
                                                <button class="filter-btn" data-filter=".mobil">Mobil</button>
                                        </div>
                                </div>
                                <div class="portfolio-gallery">
                                        <?php
                                        foreach ($paket as $key => $value) {?>
                                        <div class="mix prt-card paket">
                                                <div class="prt-image">
                                                       <img src="<?= base_url('assets/images/paket/' .$value->image)?>">
                                                        <div class="prt-overlay">
                                                                <span class="prt-icon zoom-icon" style="--i: 0s">
                                                                        <i class="uil uil-search-plus"></i>
                                                                </span>
                                                        </div>
                                                </div>
                                                <div class="prt-desc">
                                                        <h3><?= $value->nama_paket?></h3>
                                                        <a href="<?=  base_url('courses/rinci_paket/' .$value->id_paket)?>" class="btn secondary-btn sm">Read more</a>
                                                </div>
                                                <div class="prt-desc desc-sm">
                                                        <h5><?= $value->nama_mobil?></h3>
                                                        <h5><?= $value->byk_pertemuan?></h3>
                                                        <h5>Rp. <?= number_format($value->harga,0)?></h3>
                                                </div>
                                        </div>
                                        <?php }?>
                                        <?php
                                        foreach ($mobil as $key => $value) {?>
                                        <div class="mix prt-card mobil">
                                                <div class="prt-image">
                                                       <img src="<?= base_url('assets/images/mobil/' .$value->image_mobil)?>">
                                                        <div class="prt-overlay">
                                                                <span class="prt-icon zoom-icon" style="--i: 0s">
                                                                        <i class="uil uil-search-plus"></i>
                                                                </span>
                                                        </div>
                                                </div>
                                                <div class="prt-desc">
                                                        <h3><?= $value->nama_mobil?></h3>
                                                        <a href="<?=  base_url('courses/rinci_mobil/' .$value->id_mobil)?>" class="btn secondary-btn sm">Read more</a>
                                                </div>
                                                <div class="prt-desc desc-sm desc-mobil">
                                                        <h5>Transmisi : 
                                                        <?php
                                                                if ($value->jenis_mobil ==1 ) {?>
                                                                        Manual
                                                        <?php } else {?>
                                                                Matic
                                                        <?php }?>
                                                        </h5>
                                                </div>

                                        </div>
                                        <?php }?>
                                              
                                </div>
                        </div>
                </section>