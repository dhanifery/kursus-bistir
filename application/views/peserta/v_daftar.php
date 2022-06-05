<section  class="portfolio section" id="portfolio">
                        <div class="modal">
                                <div class="modal-overlay"></div>
                                <div class="slider-wrap daftar-wrap">
                                        <div class="prev-btn navigation">
                                                
                                        </div>
                                        <div class="images">
                                                <img class="showImage" src="<?= base_url('assets/images/home/285127.jpg')?>">   
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
                                                        <img src="<?= base_url('assets/images/default.jpg')?>" id="gambar_load">
                                                                <div class="prt-overlay">
                                                                        <span class="prt-icon zoom-icon" style="--i: 0s">
                                                                                <i class="uil uil-search-plus"></i>
                                                                        </span>
                                                                </div>
                                                        </div>
                                                </div>                
                                                <div class="form-daftar">
                                                        <h3>Form pendaftaran</h3>
                                                        <input type="text" class="form-input" name="username_peserta" value="<?= set_value('username_peserta')?>"placeholder="Username" required>
                                                        <div class="form2">
                                                                <input type="email" class="form-input" name="email_peserta" value="<?= set_value('email_peserta')?>" placeholder="Email" >
                                                                <div hidden class="hidden">
                                                                        <input type="date" class="form-date">
                                                                </div>
                                                                        <input type="text" name="TTL" class="form-date" value="<?= set_value('TTL')?>" name="TTL" onfocus="(this.type='date')" 
                                                                        onblur="if(this.value) this.type='text'" placeholder="Tanggal lahir">
                                                        </div>
                                                        <input type="file" class="file-form" name="image_peserta" value=""  id="preview_gambar" required>
                                                        <label for="preview_gambar" class="file-form">
                                                                <span>
                                                                        <i class="uil uil-image-plus"></i>
                                                                        <p>Image</p>
                                                                </span>
                        
                                                                Upload foto...
                                                        </label>
                                                        <div class="form2">
                                                                <input type="text" class="form-input" name="no_telp" value="<?= set_value('no_telp')?>" placeholder="No telp" >
                                                                <select name="JK">
                                                                        <option value="">Jenis Kelamin</option>
                                                                        <option value="1">Male</option>
                                                                        <option value="2">Female</option>
                                                                </select>
                                                        </div>
                                                        <textarea placeholder="Alamat" class="form-input" name="alamat" ></textarea>
                                                        <input type="submit" value="Daftar" class="btn">
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