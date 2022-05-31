<section  class="portfolio section" id="portfolio">
                        <div class="modal">
                                <div class="modal-overlay"></div>
                                <div class="slider-wrap daftar-wrap">
                                        <div class="prev-btn navigation">
                                                
                                        </div>
                                        <div class="images">
                                                        <img class="showImage" src="<?= base_url('assets/images/gambar/'.$jadwal->image_instr)?>">   
                                        </div>
                                        <div class="next-btn navigation">
                                                
                                        </div>
                                </div>
                        </div>
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

                                echo form_open('')?>

                                        
                                        <div class="portfolio-gallery galeri-daftar">
                                                <div class="mix prt-card card-kursus">
                                                        <div class="prt-image image-kursus">
                                                                <img class="showImage" src="<?= base_url('assets/images/gambar/'.$jadwal->image_instr)?>">   
                                                                <div class="prt-overlay">
                                                                        <span class="prt-icon zoom-icon" style="--i: 0s">
                                                                                <i class="uil uil-search-plus"></i>
                                                                        </span>
                                                                </div>
                                                        </div>
                                                </div>               
                                                <div class="form-daftar">
                                                        <h3>Detail Jadwal</h3>
                                                        <input type="text" class="form-input input-primary" name="username" value="Kode Jadwal : <?= $jadwal->kode_jadwal?>"placeholder="Username" readonly>
                                                        <div class="form2">
                                                                <input type="text" class="form-input" name="username_peserta" value="Peserta : <?= $jadwal->username_peserta?>" placeholder="Email" readonly>
                                                                <input type="text" class="form-input" name="username_instr" value="Instruktur : <?= $jadwal->username_instr?>" placeholder="Email" readonly>
                                                        </div>
                                                        <input type="text" class="form-input" name="username" 
                                                        value="<?= $jadwal->nama_paket?> (<?= $jadwal->byk_pertemuan?>)"placeholder="Username" readonly>
                                                        <div class="form2">
                                                                <input type="text" class="form-input" name="no_telp" value="Jam Latihan : <?= $jadwal->tgl_latihan?>" placeholder="No telp" readonly>

                                                                <input type="text" class="form-input" name="no_telp" value="Jam Latihan : <?= $jadwal->jam_latihan?> WIB" placeholder="No telp" readonly>
                                                        </div>
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
                                                        <a href="<?= base_url('jadwal/jadwal_peserta/')?>" class="btn">Back</a>
                                                </div>
                                        </div>
                                </div>                                          
                                <?php echo form_close()?>
                        </div>
                </section>
<script text="javascript">
        function bacaGambar(input){
                if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e){
                                $('#gambar_load').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                }

        }


        $("#preview_gambar").change(function(){
                bacaGambar(this);
        });
</script>