<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info">
                    <img src="<?= base_url('assets/images/gambar/'.$peserta->image_peserta)?>" id="gambar_load" >
                    <div class="images">
                         <button  id="modalBtn" class="button" ><i class="uil uil-search-plus"></i></button>
                         </div>
                    <div class="deskripsi">
                         <h3><?= $peserta->username_peserta?></h3>
                         <p><?= $peserta->email_peserta?></p>
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
                         
                         echo form_open_multipart('crud_peserta/update/'.$peserta->id_peserta) ?>
                              <h3>Form Edit</h3>
                              <label for="">Nama Peserta*</label>
                              <input type="text" class="form-input"  name="username_peserta" value="<?= $peserta->username_peserta?>" autocomplete="off" placeholder="Username" required>
                              <label for="">Tanggal Lahir*</label>
                              <div class="form2">
                                   <div hidden class="hidden">
                                   <input type="date" class="form-date">
                                   <input type="hidden" class="form-input" name="email_peserta" value="<?= $peserta->email_peserta?>">
                                   </div>
                                   <input type="text" name="TTL" class="form-date" value="<?= $peserta->TTL?>" name="TTL" onfocus="(this.type='date')" 
                                   onblur="if(this.value) this.type='text'" placeholder="Tanggal lahir">
                              </div>
                              <div class="form2">
                                   <div class="form-2">
                                        <label for="">No Telp*</label>
                                        <input type="text" name="no_telp" class="form-input" value="<?= $peserta->no_telp?>" autocomplete="off" placeholder="No telp">
                                   </div>
                                   <div class="form-2">
                                   <label for="">Jenis Kelamin*</label>
                                   <select name="JK">
                                        <option value="<?=$peserta->JK?>"><?=$peserta->JK?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                   </select>
                                   </div>
              
                              </div>
                              <label for="">Ganti foto*</label>
                              <input type="file" name="image_peserta" class="file-form" id="preview_gambar">
                              <label for="preview_gambar" class="file-form">
                                   <span>
                                        <i class="uil uil-image-plus"></i>
                                        <p>Image</p>
                                   </span>
                                   Upload foto
                              </label>
                              <label for="">Alamat*</label>
                              <textarea placeholder="Alamat" name="alamat" class="form-input"><?= $peserta->alamat?></textarea>
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
                        <img src="<?= base_url('assets/images/gambar/'.$peserta->image_peserta)?>" id="gambar_load" >
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