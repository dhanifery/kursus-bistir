<section  class="portfolio section" id="portfolio">
<div class="modal">
        <div class="modal-overlay"></div>
        <div class="slider-wrap daftar-wrap">
                <div class="prev-btn navigation">
                        
                </div>
                <div class="images">
                                <img class="showImage" src="<?= base_url('assets/images/user/'.$user['image'])?>">   
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


        echo form_open_multipart('peserta/ganti_password/'.$user['id_user'])?>

                
                <div class="portfolio-gallery galeri-daftar">
                        <div class="mix prt-card card-kursus">
                                <div class="prt-image image-kursus">
                                        <img class="showImage" src="<?= base_url('assets/images/user/'.$user['image'])?>" id="gambar_load">   
                                        <div class="prt-overlay">
                                                <span class="prt-icon zoom-icon" style="--i: 0s">
                                                        <i class="uil uil-search-plus"></i>
                                                </span>
                                        </div>
                                </div>
                        </div>                
                        <div class="form-daftar">
                                <h3>Form Ganti Password</h3>
                                <label>Password Lama*</label>
                                <input type="password" class="form-input" name="" value="<?= $user['password']?>"placeholder="Username" readonly>
                                <div class="form2">
                                <input type="password" class="form-input" name="password" value="" placeholder="Password" >
                                <input type="password" class="form-input" name="ulangi_password" value="" placeholder="Ulangi Password" >
                                </div>
                                
                                <div class="form2">
                                        <input type="submit" value="Save" class="btn">
                                        <a href="<?= base_url('peserta/update_profil/'.$user['id_user'])?>" class="btn btn-danger">Cancel</a>
                                </div>
                        </div>
                </div>
        </div>                                          
        <?php echo form_close()?>
</div>
</section>
