<section class="contact section" id="contact"> 
                        <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
                        <div class="container">
                                <div class="contact-info">
                                        <h3 class="sub-heading">COntact me</h3>
                                        <h1 class="heading">Let's work together</h1>
                                        <p class="text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                 Fugit harum suscipit odio ad commodi ipsam reiciendis 
                                                 repudiandae fuga autem minima error esse dolores omnis
                                                 iure, nisi, ab sint ratione reprehenderit!
                                        </p>
                                        <a href="#" class="mail">markusraik@mail.com 
                                                <i class="uil uil-arrow-right"></i>
                                        </a>
                                </div>

                                <div class="contact-form form-daftar">

                        <?php

                        echo form_open('jadwal/add_jadwal');
                        $kode_jadwal = date('Ymd').strtoupper(random_string('alnum',5));

                        if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-sm-fl sukses" id="alert">
                                <button type="button" class="closeBtn">&times;</button>
                                <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                        }
                        // notifikasi form kosong
                        echo validation_errors('<div class="alert alert-sm-fl gagal" id="alert">
                        <button type="button" class="closeBtn">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>','
                        </div>');

                        ?>

                                
                                <div class="portfolio-gallery galeri-jadwal">                
                                        <div class="form-daftar">
                                                <h3>Form Jadwal</h3>
                                                <select name="id_peserta" class="jadwal-daftar">
                                                        <?php
                                                                foreach ($user_peserta as $key => $value) {?>
                                                                        
                                                                        <?php
                                                                                if ($value->id_user == $this->session->userdata('id_user')) {?>
                                                                                        <option value="<?= $value->id_peserta?>"><?= $value->username_peserta?></option>
                                                                        <?php }?>                                    
                                                        <?php }?>
                                                        
                                                </select>
                                                <input type="text" class="form-input" name="kode_jadwal" value="<?= $kode_jadwal?>" placeholder="Kode Jadwal" readonly>

                                                <div class="form2">
                                                        <div hidden class="hidden">
                                                                <input type="date" class="form-date">
                                                                <input type="time" class="form-date">
                                                        </div>
                                                        <input type="text" name="jam_latihan" class="form-date" value="<?= set_value('jam_latihan')?>"  onfocus="(this.type='time')" 
                                                        onblur="if(this.value) this.type='text'" placeholder="Jam Latihan">
                                                        <input type="text" name="tgl_latihan" class="form-date" value="<?= set_value('tgl_latihan')?>" onfocus="(this.type='date')" 
                                                        onblur="if(this.value) this.type='text'" placeholder="Tanggal Latihan">
                                                </div>
                                                <div class="form2">
                                                        <select name="id_paket" class="select-jadwal">
                                                                <option value="">Pilih Paket</option>
                                                                <?php 
                                                                        foreach ($paket as $key => $value) {?>
                                                                               <option value="<?= $value->id_paket?>"><?= $value->nama_paket?> - Rp.<?= number_format($value->harga,0)?></option>
                                                                <?php }?>
                                                        </select>
                                                </div>
                                                <input type="submit" value="Daftar" class="btn">
                                        </div>
                                </div>
                        </div>                                          
                        <?php echo form_close()?>
                        </div>
                </section>