<section class="testimonials section" id="testi">
                        <div class="modal">
                                <div class="modal-overlay"></div>
                                <div class="slider-wrap daftar-wrap">
                                        <div class="prev-btn navigation">
                                                
                                        </div>
                                        <div class="images">
                                        <div class="gambar-qrcode">

                                                <?php 
                                                foreach ($jadwal as $key => $value) {?>
                                                        <div class="deskripsi">
                                                                <h1 class="des-trans"><b>Kode-Transaksi :</b> <?=$value->kode_jadwal?></h1>
                                                                <label for="" class="text"><b>Atas nama : </b></label>
                                                                <p><?= $value->atas_nama?></p>
                                                                <label for="" class="text"><b>No.Rek : </b></label>
                                                                <p><?= $value->no_rek?></p>
                                                                <label for="" class="text"><b>Bank : </b></label>
                                                                <p><?= $value->bank?></p>
                                                                <label for="" class="text"><b>Jumlah transfer : </b></label>
                                                                <p>Rp. <?= number_format($value->total_bayar,0)?></p>
                                                        </div>
                                                        <div class="qrcode">
                                                                <img class="showImage code-image" src="<?= base_url('assets/images/bukti_bayar/'.$value->bukti_bayar)?>"> 
                                                        </div>
                                                <?php }?>
                                        </div>
                                        </div>
                                        <div class="next-btn navigation">
                                                
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
                                                        <th>QR Code </th>
                                                        <th>Option</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($jadwal as $key => $value) {?>        
                                                <tr>
                                                        <td><b><?= $value->kode_jadwal;?></b></td>
                                                        <td><?= $value->username_peserta;?></td>
                                                        <?php 
                                                                if ($value->username_instr == "") {?>
                                                                        <td class="warning">Belum tersedia</td>
                                                                <?php }else {?>
                                                                        <td><?= $value->username_instr?></td>
                                                                <?php }?>
                                                        <?php ?>
                                                        <td><?= $value->nama_paket?></td>
                                                        
                                                        <?php 
                                                                if($value->status_bayar == 0 & $value->status_jadwal == 0){?>
                                                                        <td><span class="danger">Belum Bayar</span></td>
                                                        <?php }else{?>
                                                                <td>
                                                                <?php
                                                                        if($value->status_jadwal == 0 & $value->status_bayar == 1){?>
                                                                                <span class="danger">Pending</span>
                                                                <?php } elseif ($value->status_jadwal == 1 & $value->status_bayar == 1){?>
                                                                                <span class="primary">Menunggu Instruktur</span>
                                                                <?php }?>
                                                                </td>
                                                        <?php }?>
                                                        
                                                        <td> - </td>
                                                        <?php
                                                             if ($value->status_jadwal == 0 & $value->status_bayar == 0) {?>
                                                                        <td>
                                                                                <a href="<?= base_url('my_jadwal/bayar/'.$value->id_jadwal)?>" class="btn btn-jadwal">Bayar</a>
                                                                        </td>
                                                        <?php }else{?>
                                                                <td>
                                                                        <?php
                                                                                if ($value->status_jadwal == 0 & $value->status_bayar == 1) {?>
                                                                                        <button class="btn btn-jadwal zoom-icon"> Lihat bukti</button>
                                                                        <?php }else{?>
                                                                                <button class="btn btn-jadwal zoom-icon"> Lihat bukti</button>
                                                                        <?php }?>
                                                                </td>
                                                        <?php }?>
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

<!-- <td>
                                                                        </td>
                                                                        <td>

                                                                        </td> -->