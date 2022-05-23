<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info">
                    <img src="<?= base_url('assets/images/mobil/' .$mobil->image_mobil);?>"id="gambar_load" class="paket-gambar">
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

                         
                         echo form_open_multipart('mobil/update/'.$mobil->id_mobil) ?>
                              <h3>Form Add Mobil</h3>
                              <input type="hidden" class="form-input" name="id_mobil"  value="<?= $mobil->id_mobil?>"autocomplete="off" placeholder="Nama Mobil" required>
                              <input type="text" class="form-input" name="nama_mobil"  value="<?= $mobil->nama_mobil?>"autocomplete="off" placeholder="Nama Mobil" required>
                              <input type="text" class="form-input" name="no_mesin"  value="<?= $mobil->no_mesin?>"autocomplete="off" placeholder="No Mesin" >
                              <div class="form2">
                                   <select class="form-input" name="jenis_mobil" id="">
                                           <option value="<?= $mobil->jenis_mobil?>"><?php 
                                             if ($mobil->jenis_mobil == 1){?>
                                                  Manual
                                        <?php } else{?>
                                                Matic
                                        <?php }?></option>
                                           <option value="1">Manual</option>
                                           <option value="2">Matic</option>
                                   </select>
                                   <input type="text" name="no_plat" class="form-input" value="<?= $mobil->no_plat?>" autocomplete="off" placeholder="No Plat">
                              </div>
                              <input type="file" name="image_mobil" class="form-input form-file" id="preview_gambar" autocomplete="off">
                              <textarea placeholder="Deskripsi" name="deskripsi_mobil" class="form-input"></textarea>
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
                            <img src="<?= base_url('assets/images/mobil/' .$mobil->image_mobil);?>"id="gambar_load">
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

