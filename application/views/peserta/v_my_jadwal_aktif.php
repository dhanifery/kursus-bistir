<section class="testimonials section" id="testi">
        <div class="modal">
                <div class="modal-overlay"></div>
                <div class="slider-wrap daftar-wrap">
                        <div class="prev-btn">
                                
                        </div>    
                                <div class="images">
                                        <div class="gambar-qrcode">
                                                <?php
                                                foreach ($jadwal as $key => $value) {?>
                                                        <?php if ($value->status_jadwal == 2 & $value->status_bayar == 1) {?>
                                                        <div class="deskripsi">
                                                                <h1>QR Code</h1>
                                                                <h1>Verification</h1>
                                                                <p class="text">Silahkan scan QR code ini sebagai bukti dan berikan kepada admin kami di office untuk 
                                                                        mulai pelatihan
                                                                </p>
                                                                
                                                        </div>
                                                        <div class="qrcode">
                                                                <img class="showImage image-code" src="<?= site_url('my_jadwal/qr_code/'.$value->kode_jadwal)?>">
                                                        </div>
                                                        <?php }?>
                                                <?php }?>
                                                </div>
                                </div>

                        <div hidden class="next-btn">
                                
                        </div>
                </div>
        </div>
        <div class="container jadwal-sesi">
                <div class="section-background">
                        <img src="<?= base_url()?>/assets/images/home/young-girl.png" class="person" alt="">
                        <img src="<?= base_url()?>/assets/images/home/circle2.png" class="circle" alt="">
                        <img src="<?= base_url()?>/assets/images/home/square1.png" class="square" alt="">
                </div>
                <div class="swiper">
                        <div class="wrapper">
                                <?php 
                                foreach ($data_peserta as $key => $value) {?>
                                <div class="swiper-slide">
                                        <div class="client">
                                                <img src="<?= base_url('assets/images/gambar/' .$value->image_peserta)?>" alt="">
                                                <div class="client-info">
                                                        <h4><?= $value->username_peserta?></h4>
                                                        <h5>
                                                        <a href="#"><?= $value->email_peserta?></a></h5>
                                                </div>
                                        </div>
                                        <?php }?>
                                        <?php 
                                                 if ($this->session->flashdata('pesan')) {
                                                        echo '<div class="alert alert-sm-fl sukses" id="alert">
                                                        <button type="button" class="closeBtn">&times;</button>
                                                        <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                                                        echo $this->session->flashdata('pesan');
                                                        echo '</h5></div>';
                                                }
                                        ?>
                                        <div class="table">
                                                <table>
                                                <thead>
                                                <tr>
                                                        <th>Kode Jadwal</th>
                                                        <th>Peserta</th>
                                                        <th>Instruktur</th>
                                                        <th>Paket</th>
                                                        <th>Status </th>
                                                        <th>QR-Code</th>
                                                        <th>Option</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($jadwal as $key => $value) {?>        
                                                <tr>
                                                        <td><b><?= $value->kode_jadwal;?></b></td>
                                                        <td><?= $value->username_peserta;?></td>
                                                        <td><?= $value->username_instr?></td>
                                                        <td><?= $value->nama_paket?></td>
                                                        
                                                        <?php 
                                                                if($value->status_bayar == 0){?>
                                                                        <td><span class="danger">Belum Bayar</span></td>
                                                        <?php }else{?>
                                                                <td>
                                                                <?php
                                                                        if($value->status_jadwal == 0){?>
                                                                                <span class="danger">Pending</span>
                                                                <?php }else{?>
                                                                                <span class="primary">Aktif</span>
                                                                <?php } ?>
                                                        </td>
                                                        <?php }?>
                                                        
                                                        <?php 
                                                                if ($value->status_jadwal == 0) {?>
                                                        <td>
                                                                <a href="<?= base_url('my_jadwal/bayar/'.$value->id_jadwal)?>" class="btn btn-jadwal">Bayar</a>
                                                        </td>
                                                        <?php } else {?>
                                                        <td>
                                                                <button class="btn btn-danger btn-jadwal zoom-icon">QR Code</button>
                                                        </td>      
                                                        <?php }?>
                                                        <td>
                                                                <a href="<?= base_url('my_jadwal/detail_jadwal_peserta/'.$value->id_jadwal)?>" class="btn btn-jadwal">Detail jadwal</a>
                                                        </td>
                                                </tr>
                                                <?php }?>                         
                                                </tbody>
                                        </table>
                                        </div>
                                        
                                </div> 
                        </div>
                        <div class="swiper-pagination"></div>
                </div>
                <div class="testimonials-title title-jadwal">
                <?php 
                        foreach ($jadwal as $key => $value) {?>
                        <h3 class="sub-heading">Hey, <?= $value->username_peserta?>....</h3>
                <?php }?>
                        <h1 class="heading">This is ur Schedule</h1>
                </div>
        </div>
</section>