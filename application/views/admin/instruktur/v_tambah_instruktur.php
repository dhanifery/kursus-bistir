<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info">
                    <img src="<?= base_url('assets/images/default.jpg');?>"id="gambar_load">
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
                              <h5><i class="icon fas fa-solid fa-circle-xmark"></i>Alert!</h5>'."Format gambar tidak diketahui!!!".'</div>';
                      }
                         
                         echo form_open_multipart('crud_instruktur/add') ?>
                              <h3>Form Daftar</h3>
                              <input type="text" class="form-input"  name="username_instr" autocomplete="off" placeholder="Username" required>
                              <div class="form2">
                                   <input type="email" name="email_instr" class="form-input" autocomplete="off" placeholder="Email">
                                   <div hidden class="hidden">
                                   <input type="date" class="form-date">
                                   </div>
                                   <input type="text" name="TTL" class="form-date" name="TTL" onfocus="(this.type='date')" 
                                   onblur="if(this.value) this.type='text'" placeholder="Tanggal lahir">
                              </div>
                              <input type="file" name="image_instr" class="file-form" id="preview_gambar">
                              <label for="preview_gambar" class="file-form">
                                   <span>
                                        <i class="uil uil-image-plus"></i>
                                        <p>Image</p>
                                   </span>
                                   Upload foto
                              </label>
                              <div class="form2">
                                   <input type="text" name="no_telp" class="form-input" autocomplete="off" placeholder="No telp">
                                   <select name="JK">
                                        <option> Jenis Kelamin </option>
                                        <option value="Male"> - Male - </option>
                                        <option value="Female">- Female -</option>
                                   </select>
                              </div>
                              <textarea placeholder="Deskripsi" name="deskripsi_instr" class="form-input"></textarea>
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