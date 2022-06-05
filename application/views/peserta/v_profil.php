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

                // notif berhasil 
                if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-sm-fl sukses" id="alert">
                        <button type="button" class="closeBtn">&times;</button>
                        <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</h5></div>';
                }

                // notifikasi gagal upload gambar

                if (isset($error_upload)) {
                        echo '<div class="alert alert-sm-fl error" id="alert">
                        <button type="button" class="closeBtn">&times;</button>
                        <h5><i class="fa-solid fa-circle-xmark"></i>'.$error_upload.'</h5></div>';
                }


                echo form_open_multipart()?>

                        
                        <div class="portfolio-gallery galeri-daftar">
                                <div class="mix prt-card card-kursus">
                                        <div class="prt-image image-kursus">
                                                <img class="showImage" src="<?= base_url('assets/images/user/'.$user['image'])?>">   
                                                <div class="prt-overlay">
                                                        <span class="prt-icon zoom-icon" style="--i: 0s">
                                                                <i class="uil uil-search-plus"></i>
                                                        </span>
                                                </div>
                                        </div>
                                </div>                
                                <div class="form-daftar">
                                        <h3>My Profil</h3>
                                        <label>Username*</label>
                                        <input type="text" class="form-input" name="username" value="<?= $user['nama_user']?>"placeholder="Username" readonly>
                                        <label>Email*</label>
                                        <input type="email" class="form-input input-primary" name="email" value="<?= $user['email']?>" placeholder="Email" readonly>
                                        <label>Member Sejak*</label>
                                        <input type="text" class="form-input" name="email" value="<?= date('d F Y', $user['date_created']); ?>" placeholder="Email" readonly>
                                        <a href="<?= base_url('peserta/update_profil/'.$user['id_user'])?>" class="btn btn-primary">Edit Profil</a>
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