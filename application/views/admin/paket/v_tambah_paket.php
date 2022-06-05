<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info">
                    <img src="<?= base_url('assets/images/default.jpg');?>"id="gambar_load" class="paket-gambar">
                    <div class="images">
                         <button  id="modalBtn" class="button" ><i class="uil uil-search-plus"></i></button>
                         </div>
                    <div class="deskripsi">
                         <h3></h3>
                         <p></p>
                    </div>
               </div>
                         <div action="" class="contact-form">
                         <?php 

                         // notifikasi form kosong
                        echo validation_errors('<div class="alert alert-sm gagal" id="alert">
                        <button type="button" class="closeBtn">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>','
                        </div>');


                         // notifikasi gagal upload gambar

                         if (isset($error_upload)) {
                                 echo '<div class="alert alert-sm error" id="alert">
                                 <button type="button" class="closeBtn">&times;</button>
                                 <h5><i class="fa-solid fa-circle-xmark"></i>'.$error_upload.'</h5></div>';
                         }
                         
                         echo form_open_multipart('paket/add') ?>
                              <h3>Form Paket</h3>
                              <input type="text" class="form-input"  name="nama_paket"  value="<?= set_value('nama_paket')?>"autocomplete="off" placeholder="Nama Paket" required>
                              <div class="form2">
                                   <select name="id_mobil" class="form-input">
                                        <option value="">Pilih Mobil</option>
                                        <?php foreach($mobil as $key => $value) { ?>
                                                <?php
                                                        if ($value->jenis_mobil == 1) {?>
                                                                <option value="<?= $value->id_mobil?>"><?= $value->nama_mobil?>
                                                        ( Manual )</option>           
                                                <?php }else{?>
                                                        <option value="<?= $value->id_mobil?>"><?= $value->nama_mobil?>
                                                        ( Matic )</option>
                                                <?php }?>
                                        <?php }?>
                                </select>
                              </div>
                              
                              <div class="form2">
                                   <input type="text" name="harga" class="form-input" value="<?= set_value('harga')?>" autocomplete="off" 
                                   placeholder="Harga">
                                   <select name="byk_pertemuan">
                                        <option value=""> Banyak Pertemuan </option>
                                        <option value="8 Pertemuan">8 Pertemuan</option>
                                        <option value="10 Pertemuan">10 Pertemuan</option>
                                        <option value="12 Pertemuan">12 Pertemuan</option>
                                   </select>
                              </div>
                              <input type="file" name="image" class="file-form" id="preview_gambar">
                              <label for="preview_gambar" class="file-form">
                                   <span>
                                        <i class="uil uil-image-plus"></i>
                                        <p>Image</p>
                                   </span>
                                   Upload foto
                              </label>
                              <textarea placeholder="Deskripsi" name="deskripsi_paket" value="<?= set_value('deskripsi_paket')?>" class="form-input"></textarea>
                              <input type="submit" value="Save" class="btn">
                              <!-- <a href=""><span class="material-icons-sharp">send</span></a> -->
                         </div>
               <?php echo form_close() ?>   


          </div>
</div>

<div id="simpleModal" class="modal">
               <div class="modal-content">
                    <div class="modal-header">
                         <span hidden class="btnClose">&times;</span>
                    </div>
                    <div class="modal-body">
                        <img src="<?= base_url('assets/images/default.jpg');?>"  id="gambar_load">
                    </div>
                    <div class="modal-footer">
                    </div>
</div>

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