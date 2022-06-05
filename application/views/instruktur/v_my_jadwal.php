<section class="testimonials section" id="testi">
                        <div class="modal">
                                <div class="modal-overlay"></div>
                                <div class="slider-wrap daftar-wrap">
                                        <div class="prev-btn navigation">
                                                
                                        </div>
                                        <div class="images">
                                                <?php 
                                                foreach ($jadwal as $key => $value) {?>
                                                        <img class="showImage" src="<?= base_url('assets/images/bukti_bayar/'.$value->bukti_bayar)?>">   
                                                <?php }?>
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
                                foreach ($data_instruktur as $key => $value) {?>
                                <div class="swiper-slide">
                                        <div class="client">
                                                <img src="<?= base_url('assets/images/gambar/' .$value->image_instr)?>" alt="">
                                                <div class="client-info">
                                                        <h4><?= $value->username_instr?></h4>
                                                        <h5>
                                                        <a href="#"><?= $value->email_instr?></a></h5>
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
                                                        <th>Option</th>
                                                        <th>Actions</th>
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
                                                                if($value->status_bayar == 0){?>
                                                                        <td><span class="danger">Belum Bayar</span></td>
                                                        <?php }else{?>
                                                                <td>
                                                                <?php
                                                                        if($value->status_jadwal == 0 & $value->status_bayar == 1){?>
                                                                                <span class="danger">Pending</span>
                                                                <?php } elseif ($value->status_jadwal == 1 & $value->status_bayar == 1){?>
                                                                                <span class="primary">Menunggu Instruktur</span>
                                                                <?php } else{?>
                                                                        <span class="primary">Aktif</span>
                                                                <?php }?>
                                                                </td>
                                                        <?php }?>
                                                        <td> - </td>
                                                        <?php 
                                                        
                                                                if ($value->status_jadwal == 1 & $value->status_bayar == 1) {?>
                                                                <td>
                                                                        <a href="<?= base_url('my_jadwal/konfirmasi/'.$value->id_jadwal)?>" class="btn btn-jadwal">Confirm</a>
                                                                </td>
                                                        <?php } else {?>
                                                                <td>
                                                                        <a href="<?= base_url('my_jadwal/detail_jadwal/'.$value->id_jadwal)?>" class="btn btn-jadwal">Detail jadwal</a>
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
                        foreach ($data_instruktur as $key => $value) {?>
                        <h3 class="sub-heading">Hey, <?= $value->username_instr?>....</h3>
                <?php }?>
                        <h1 class="heading">This is ur Schedule</h1>
                </div>
        </div>
</section>