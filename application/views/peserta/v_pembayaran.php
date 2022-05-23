<section class="contact section" id="contact"> 
                <img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
                <div class="container">
                        <div class="contact-info">
                                <h3 class="sub-heading">Pembayaran</h3>
                                <h1 class="heading">
                                        <?php
                                                foreach ($paket as $key => $value) {?>
                                                        <?php
                                                                if ($value->id_paket == $jadwal->id_paket) {?>
                                                                        Rp.<?= number_format($value->harga,0)?>
                                                        <?php }?>
                                        <?php }?>
                                </h1>

                                <p class="text">
                                        Silahkan transfer uang ke no rekening dibawah ini :
                                </p>
                                <div class="table">
                                                <table class="tabel-pembayaran">
                                                <thead>
                                                <tr style="text-align: left;">
                                                        <th>Nama Bank</th>
                                                        <th>No rek</th>
                                                        <th>Atas nama</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($bank as $key => $value) {?>        
                                                <tr style="text-align: left;">
                                                        <td><?= $value->nama_bank;?></td>
                                                        <td><?= $value->no_rek?></td>
                                                        <td><?= $value->atas_nama?></td>
                                                </tr>
                                                <?php }?>                         
                                                </tbody>
                                        </table>
                                        </div>
                        </div>

                <div class="contact-form form-daftar">

                <?php

                echo form_open_multipart('my_jadwal/bayar/'.$jadwal->id_jadwal);

                // notifikasi form kosong
                echo validation_errors('<div class="alert alert-sm-fl gagal" id="alert">
                <button type="button" class="closeBtn">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>','
                </div>');

                ?>        
                        <div class="portfolio-gallery">                
                                <div class="form-daftar">
                                        <h3>Upload bukti pembayaran</h3>
                                        <input type="text" class="form-input" name="no_rek" value="<?= set_value('no_rek')?>" placeholder="No.Rek" required>

                                        <div class="form2">
                                                <input type="text" class="form-input" name="atas_nama" value="<?= set_value('atas_nama')?>" placeholder="Atas Nama" >
                                                <input type="text" class="form-input" name="bank" value="<?= set_value('bank')?>" placeholder="Nama Bank" >
                                        </div>
                                        <select name="total_bayar" class="select-jadwal">
                                        <?php
                                                foreach ($paket as $key => $value) {?>
                                                        <?php
                                                                if ($value->id_paket == $jadwal->id_paket) {?>
                                                                        <option value="<?= $value->harga?>">Rp.<?= number_format($value->harga,0)?></option>
                                                        <?php }?>
                                        <?php }?>
                                        </select>
                                        <input type="file" class="form-input file-form" name="bukti_bayar" value="" placeholder="No.Rek" required>

                                        <input type="submit" value="submit" class="btn">
                                </div>
                        </div>
                </div>                                          
                <?php echo form_close()?>
                </div>
        </section>