<section class="contact section" id="contact"> 
                        <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
                        <div class="container">
                                <div class="contact-info">
                                        <h3 class="sub-heading">Contact me</h3>
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

                        echo form_open('my_jadwal/update_konfirmasi/' .$jadwal->id_jadwal)?>          
                                <div class="portfolio-gallery galeri-jadwal">                
                                        <div class="form-daftar">
                                                <h3>Form Konfirmasi</h3>
                                                <input type="text" class="form-input input-primary" name="kode_jadwal" value="Kode Jadwal : <?= $jadwal->kode_jadwal?>" placeholder="Kode Jadwal" readonly>
                                                <select name="id_instruktur" class="jadwal-daftar daftar-none">
                                                        <?php
                                                                foreach ($user_instruktur as $key => $value) {?>
                                                                        <option value="<?= $value->id_instruktur?>"><?= $value->username_instr?></option>
                            
                                                        <?php }?>
                                                        
                                                </select>
                                                <div class="form2">
                                                        <input type="submit" value="Konfirmasi" class="btn">
                                                        <a href="<?= base_url('jadwal/jadwal_instruktur')?>" class="btn btn-edit">Cancel</a>
                                                </div>

                                        </div>
                                </div>
                        </div>                                          
                        <?php echo form_close()?>
                        </div>
                </section>