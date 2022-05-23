<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info admin">
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
                                 <h5><i class="fa-solid fa-circle-xmark"></i>'.$error_upload.'</h5></div>';
                         }
                         
                         echo form_open_multipart('user/add') ?>
                              <h3>Form Daftar</h3>
                              <input type="text" class="form-input" name="nama_user"  value="<?= set_value('nama_user')?>"autocomplete="off" placeholder="Username" required>
                              <div class="form2">
                                   <input type="email" name="email" class="form-input" value="<?= set_value('email')?>" autocomplete="off" placeholder="Email">
                                   <input type="password" name="password" class="form-input" value="<?= set_value('password')?>" autocomplete="off" placeholder="Password">
                              </div>
                              <input type="file" class="form-input form-file" name="image" id="preview_gambar" required>
                              <div class="form2">
                                   <select name="is_active">
                                        <option value=""> Is Active</option>
                                        <option value="1"> Active </option>
                                   </select>
                                   <select name="level_user">
                                        <option value=""> Level User</option>
                                        <option value="1"> Admin </option>
                                   </select>
                              </div>
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