<section class="contact section" id="contact"> 
                        <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
                        <div class="container container-daftar">
                                <div class="contact-info">
                                        <h3 class="sub-heading">Konfirmasi</h3>
                                        <h1 class="heading">B I S T I R</h1>
                                        <p class="text">
                                               Heyy, <?= $user['nama_user']?>... <br> Silahkan konfirmasi jadwal peserta
                                        </p>
                                </div>

                                <div class="contact-form form-daftar">

                        <?php

                        echo form_open('my_jadwal/update_konfirmasi/' .$jadwal->id_jadwal)?>                         
                                        <div class="form-daftar">
                                                <h3>Form Konfirmasi</h3>
                                                <input type="text" class="form-input input-primary" name="kode_jadwal" value="Kode Jadwal : <?= $jadwal->kode_jadwal?>" placeholder="Kode Jadwal" readonly>
                                                <label for="">Instruktur*</label>
                                                <select name="id_instruktur" class="jadwal-daftar daftar-none">
                                                        <?php
                                                                foreach ($user_instruktur as $key => $value) {?>
                                                                        <option value="<?= $value->id_instruktur?>"><?= $value->username_instr?></option>
                            
                                                        <?php }?>
                                                        
                                                </select>
                                                <div class="form2">
                                                        <input type="submit" value="Konfirmasi" onclick="return confirm('Yakin Konfirmasi Kode Jadwal :<?= $jadwal->kode_jadwal?> ?');" class="btn">
                                                        <a href="<?= base_url('jadwal/jadwal_instruktur')?>" class="btn btn-edit">Cancel</a>
                                                </div>

                                        </div>
                        </div>                                          
                        <?php echo form_close()?>
                        </div>
                </section>