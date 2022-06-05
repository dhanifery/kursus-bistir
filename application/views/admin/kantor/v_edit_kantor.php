<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info info-gambar">
                    <img src="<?= base_url('assets/images/'.$kantor->image);?>"id="gambar_load" class="paket-gambar">
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
                         
                         echo form_open_multipart('admin/edit_kantor/' .$kantor->id_kantor) ?>
                                 <h3>Kantor B I S T I R</h3>
                                 <label for="">Alamat Kantor*</label>
                                <input type="text" class="form-input" name="alamat"  value="<?= $kantor->alamat?>"autocomplete="off" placeholder="Nama Mobil" required>
                                
                                <label for="">Telp Kantor*</label>
                                <input type="text" class="form-input" name="no_telp"  value="<?= $kantor->no_telp?>"autocomplete="off" placeholder="No Mesin" >
                                
                                <label for="">Ganti Foto*</label>
                                <input type="file" class="form-input form-file" name="image" id="preview_gambar">

                                <label for="">Deskripsi*</label>
                                <textarea placeholder="Deskripsi" name="deskripsi" class="form-input"><?= $kantor->deskripsi?></textarea>
                                <div class="form3">
                                <input type="submit" value="Save" class="btn">
                                <a href="<?= base_url('admin/kantor')?>" class="btn btn-password"><h3>Back</h3></a>
                                </div>
                                
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
                        <img src="<?= base_url('assets/images/' .$kantor->image);?>"  id="gambar_load">
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

