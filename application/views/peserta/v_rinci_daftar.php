<section  class="portfolio section" id="portfolio">
                        <div class="modal">
                                <div class="modal-overlay"></div>
                                <div class="slider-wrap daftar-wrap">
                                        <div class="prev-btn navigation">
                                                
                                        </div>
                                        <div class="images">
                                                <?php 
                                                foreach ($daftar_peserta as $key => $value) {?>
                                                        <img class="showImage" src="<?= base_url('assets/images/gambar/'.$value->image_peserta)?>">   
                                                <?php }?>
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
                                <div class="portfolio-header">
                                        <h3 class="sub-heading">KURSUS</h3>
                                </div>
                                <div class="contact-form form-daftar">

                                <?php

                                // notifikasi form kosong
                                echo validation_errors('<div class="alert alert-sm-fl gagal" id="alert">
                                <button type="button" class="closeBtn">&times;</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>','
                                </div>');


                                // notifikasi gagal upload gambar

                                if (isset($error_upload)) {
                                        echo '<div class="alert alert-sm-fl error" id="alert">
                                        <button type="button" class="closeBtn">&times;</button>
                                        <h5><i class="fa-solid fa-circle-xmark"></i>'.$error_upload.'</h5></div>';
                         }
    

                                echo form_open_multipart('daftar_kursus/add_peserta')?>

                                        
                                        <div class="portfolio-gallery galeri-daftar">
                                                <div class="mix prt-card card-kursus">
                                                        <div class="prt-image image-kursus">
                                                        <?php 
                                                        foreach ($daftar_peserta as $key => $value) {?>
                                                                <img class="showImage" src="<?= base_url('assets/images/gambar/'.$value->image_peserta)?>">   
                                                        <?php }?>
                                                                <div class="prt-overlay">
                                                                        <span class="prt-icon zoom-icon" style="--i: 0s">
                                                                                <i class="uil uil-search-plus"></i>
                                                                        </span>
                                                                </div>
                                                        </div>
                                                </div>                
                                                <div class="form-daftar">
                                                        <h3>Form pendaftaran</h3>
                                                        <?php 
                                                        foreach ($daftar_peserta as $key => $value) {?>
                                                        <input type="text" class="form-input" name="username" value="<?= $value->username_peserta?>"placeholder="Username" readonly>
                                                        <div class="form2">
                                                                <input type="email" class="form-input" name="email" value="<?= $value->email_peserta?>" placeholder="Email" readonly>
                                                                <div hidden class="hidden">
                                                                        <input type="date" class="form-date">
                                                                </div>
                                                                        <input type="text" name="TTL" class="form-date" value="<?= $value->TTL?>" name="TTL" onfocus="(this.type='date')" 
                                                                        onblur="if(this.value) this.type='text'" placeholder="Tanggal lahir" readonly>
                                                        </div>
                                                        <div class="form2">
                                                                <input type="text" class="form-input" name="no_telp" value="<?= $value->no_telp?>" placeholder="No telp" readonly>
                                                                <select name="JK">
                                                                        <option value=""><?= $value->JK?></option>
                                                                </select>
                                                        </div>
                                                        <textarea placeholder="Alamat" class="form-input" name="alamat" readonly><?= $value->alamat?></textarea>
                                                        <?php }?>
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