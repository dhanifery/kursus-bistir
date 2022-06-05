<section  class="portfolio section" id="portfolio">
        <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle2">
        <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
        <div class="container">
        <img src="<?= base_url()?>/assets/images/home/square2.png" class="shape square">
        <img src="<?= base_url()?>/assets/images/home/square2.png" class="shape square2">
                <div class="portfolio-header" style="margin-bottom: -0.5rem;">
                        <h3 class="sub-heading">KURSUS</h3>
                </div>
                <div class="contact-form form-daftar">

                <?php

                // notifikasi form kosong
                echo validation_errors('<div class="alert alert-sm-fl gagal" id="alert">
                <button type="button" class="closeBtn">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>','
                </div>');

                // notif berhasil 
                if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-sm-fl sukses" id="alert">
                        <button type="button" class="closeBtn">&times;</button>
                        <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</h5></div>';
                }

                echo form_open_multipart('')?>              
                <div class="form-daftar">
                        <h3>Detail Jadwal</h3>
                        <input type="text" class="form-input input-primary"  value="Kode Jadwal : <?= $jadwal->kode_jadwal?>" readonly>
                        <div class="form2">
                                <div class="form-2" style="width: 100%;">
                                        <label for="">Nama Peserta*</label>
                                        <input type="text" class="form-input" name="username_peserta" value="<?= $jadwal->username_peserta?>" placeholder="Email" readonly>
                                </div>
                                <div class="form-2" style="width: 100%;">
                                        <label for="">Nama Instruktur*</label>
                                        <input type="text" class="form-input" name="username_instr" value="<?= $jadwal->username_instr?>" placeholder="Email" readonly>
                                </div>

                        </div>
                        <label for="">Paket*</label>
                        <input type="text" class="form-input" 
                        value="<?= $jadwal->nama_paket?> (<?= $jadwal->byk_pertemuan?>)"placeholder="Username" readonly>
                        <div class="form2">
                                <div class="form-2" style="width: 100%;">
                                        <label for="">Tanggal Latihan*</label>
                                        <input type="text" class="form-input" name="no_telp" value="<?= $jadwal->tgl_latihan?>" placeholder="No telp" readonly>
                                </div>
                                <div class="form-2">
                                        <label for="">Jam Latihan*</label>
                                        <input type="text" class="form-input" name="no_telp" value="<?= $jadwal->jam_latihan?> WIB" placeholder="No telp" readonly>
                                </div>


                        </div>
                        <label for="">Mobil*</label>
                        <select name="id_instruktur" class="jadwal-daftar daftar-none">
                                <?php
                                        foreach ($paket as $key => $value) {?>
                                                <?php if($value->id_paket == $jadwal->id_paket){?>
                                                        <option value=""><?= $value->nama_mobil?>
                                                                <?php if($value->jenis_mobil == 1) {?>
                                                                        ( Manual )
                                                                <?php }else{?>
                                                                        ( Matic )
                                                                <?php }?>

                                                        </option>
                                                <?php }?>
                                <?php }?>
                        
                        </select>
                        <a href="<?= base_url('jadwal/jadwal_instruktur_aktif/')?>" class="btn">Back</a>
                </div>
        </div>                                 
                <?php echo form_close()?>
        </div>
</section>
