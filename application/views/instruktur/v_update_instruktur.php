<section  class="portfolio section" id="portfolio">
<div class="modal">
        <div class="modal-overlay"></div>
        <div class="slider-wrap daftar-wrap">
                <div class="prev-btn navigation">
                        
                </div>
                <div class="images">
                                <img class="showImage" src="<?= base_url('assets/images/gambar/'.$instruktur->image_instr)?>">   
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


        // notifikasi gagal upload gambar

        if (isset($error_upload)) {
                echo '<div class="alert alert-sm error" id="alert">
                <button type="button" class="closeBtn">&times;</button>
                <h5><i class="icon fas fa-solid fa-circle-xmark"></i>Alert!</h5>'."Format gambar tidak diketahui!!!".'</div>';
        }


        echo form_open_multipart('daftar_kursus/update_instruktur/' .$instruktur->id_instruktur)?>

                
                <div class="portfolio-gallery galeri-daftar">
                        <div class="mix prt-card card-kursus">
                                <div class="prt-image image-kursus">
                                        <img class="showImage" src="<?= base_url('assets/images/gambar/'.$instruktur->image_instr)?>" id="gambar_load">   
                                        <div class="prt-overlay">
                                                <span class="prt-icon zoom-icon" style="--i: 0s">
                                                        <i class="uil uil-search-plus"></i>
                                                </span>
                                        </div>
                                </div>
                        </div>                
                        <div class="form-daftar">
                                <h3>Form Edit</h3>
                                <label for="">Nama Instruktur*</label>
                                <input type="text" class="form-input" name="username_instr" value="<?= $instruktur->username_instr?>"placeholder="Username" >
                                <div class="form2">
                                        <div class="form-2">
                                                <label for="">Email*</label>
                                                <input type="email" class="form-input input-primary" name="email_instr" value="<?= $instruktur->email_instr?>" placeholder="Email" readonly>
                                        </div>
                                        <div class="form-2">
                                                <label for="">Tanggal Lahir*</label>
                                                <div hidden class="hidden">
                                                        <input type="date" class="form-date">
                                                </div>
                                                <input type="text" name="TTL" class="form-date" value="<?= $instruktur->TTL?>" name="TTL" onfocus="(this.type='date')" 
                                                onblur="if(this.value) this.type='text'" placeholder="Tanggal lahir">
                                        </div>

                                </div>
                                <div class="form2">
                                        <div class="form-2" style="width: 100%;">
                                                <label for="">No Telp*</label>
                                                <input type="text" class="form-input" name="no_telp" value="<?= $instruktur->no_telp?>" placeholder="No telp" >
                                        </div>
                                        <div class="form-2">
                                                <label for="">Gender*</label>
                                                <select name="JK" style="width: 100%;">
                                                        <option value=""><?= $instruktur->JK?></option>
                                                </select>
                                        </div>
                                </div>
                                <label for="">Ganti Foto*</label>
                                <input type="file" class="file-form" name="image_instr" value=""  id="preview_gambar">
                                        <label for="preview_gambar" class="file-form">
                                                <span>
                                                        <i class="uil uil-image-plus"></i>
                                                        <p>Image</p>
                                                </span>
        
                                                Upload foto...
                                        </label>

                                <label for="">Deskripsi*</label>
                                <textarea placeholder="Deskripsi" class="form-input" name="deskripsi_instr"><?= $instruktur->deskripsi_instr?></textarea>
                                <input type="submit" value="Save" class="btn">
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