<section class="contact section" id="contact"> 
<img src="<?= base_url()?>/assets/images/home/triangle.png" class="shape triangle">
<div class="container container-daftar">
        <div class="contact-info">
                <h3 class="sub-heading"><?= $sub_title;?></h3>
                <h1 class="heading">B I S T I R</h1>
                <p class="text">
                Heyy, <?= $user['nama_user'];?>...       
                <br>
                        Silahkan isi form jadwal untuk menentukan jadwal kursus anda
                </p>
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

                  
                <div class="form-daftar ">
                        <h3>Form Jadwal</h3>
                        <label for="">Nama Peserta*</label>
                        <select name="id_peserta" class="jadwal-daftar">
                                <?php
                                        foreach ($user_peserta as $key => $value) {?>
                                                
                                                <?php
                                                        if ($value->id_user == $this->session->userdata('id_user')) {?>
                                                                <option value="<?= $value->id_peserta?>"><?= $value->username_peserta?></option>
                                                <?php }?>                                    
                                <?php }?>
                                
                        </select>
                        <label for="">Kode Jadwal*</label>
                        <input type="text" class="form-input" name="kode_jadwal" value="<?= $kode_jadwal?>" placeholder="Kode Jadwal" readonly>

                        <div class="form2">
                                <div hidden class="hidden">
                                        <input type="date" class="form-date">
                                </div>
                                <select name="jam_latihan" id="" style="width: 90%;">
                                        <option value="">Pilih Jam Latihan</option>
                                        <option value="08:00 - 10:00">08:00 - 10:00 WIB</option>
                                        <option value="10:00 - 12:00">10:00 - 12:00 WIB</option>
                                        <option value="14:00 - 16:00">14:00 - 16:00 WIB</option>
                                        <option value="15:00 - 17:00">15:00 - 17:00 WIB</option>
                                </select>
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
<?php echo form_close()?>
</div>
</section>