<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info admin">
                    <img src="<?= base_url('assets/images/user/'.$user->image)?>" id="gambar_load" >
                    <div class="images-mid">
                         <button  id="modalBtn" class="button" ><i class="uil uil-search-plus"></i></button>
                    </div>
                    <div class="deskripsi">
                         <h3><?= $user->nama_user?></h3>
                         <p><?= $user->email?></p><br>
                         <p style="font-size: 10px;">Member Since <br><?= date('d F Y', $user->date_created)?></p>
                    </div>
               </div>
                         <div action="" class="contact-form">
                         <?php 
                         
                         // notifikasi form kosong
                        echo validation_errors('<div class="alert alert-sm gagal" id="alert">
                        <button type="button" class="closeBtn">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>','
                        </div>');

                         
                         echo form_open_multipart('admin/ganti_password/'.$user->id_user) ?>
                              <h3>Form Ganti Password</h3>
                              <input type="password" class="form-input" value="<?= $user->password?>" autocomplete="off" placeholder="Password Lama"  readonly>
                              <div class="form2">
                                 <input type="password" class="form-input" name="password"  autocomplete="off" placeholder="Password Baru" autofocus required>
                                 <input type="password" class="form-input" name="ulangi_password" autocomplete="off" placeholder="Ulangi Password" autofocus required>
                              </div>
                              <div class="form3">
                                   <input type="submit" value="Save" class="btn">
                                   <a  class="btn btn-password" href="<?= base_url('admin/myprofil/' .$user->id_user)?>">
                                             <h3>cancel</h3>
                                   </a>
                              </div>
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
                    <img src="<?= base_url('assets/images/user/'.$user->image)?>" id="gambar_load" >
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