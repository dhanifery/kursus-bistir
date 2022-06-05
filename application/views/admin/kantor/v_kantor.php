<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info info-gambar">
               <?php 
                         foreach ($kantor as $key => $value) {?>
                    <img src="<?= base_url('assets/images/'.$value->image);?>"id="gambar_load" class="paket-gambar">
                <?php }?>
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

                        // notifikasi berhasil update data

                        if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-sm-xm sukses" id="alert">
                                <button type="button" class="closeBtn">&times;</button>
                                <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                        }
                         // notifikasi gagal upload gambar

                         if (isset($error_upload)) {
                                 echo '<div class="alert alert-sm error" id="alert">
                                 <button type="button" class="closeBtn">&times;</button>
                                 <h5><i class="icon fas fa-solid fa-circle-xmark"></i>Alert!</h5>'."Format gambar tidak diketahui!!!".'</div>';
                         }
                         
                         echo form_open_multipart('') ?>
                         <?php 
                         foreach ($kantor as $key => $value) {?>
                                 <h3>Kantor B I S T I R</h3>
                                 <label for="">Alamat Kantor*</label>
                                <input type="text" class="form-input" name="alamat"  value="<?= $value->alamat?>"autocomplete="off" placeholder="" readonly>
                                
                                <label for="">Telp Kantor*</label>
                                <input type="text" class="form-input" name="no_telp"  value="<?= $value->no_telp?>"autocomplete="off" placeholder="" readonly>
                                
                                <label for="">Deskripsi*</label>
                                <textarea placeholder="Deskripsi" name="deskripsi" class="form-input" readonly><?= $value->deskripsi?></textarea>
                                <div class="form3">
                                <a href="<?= base_url('admin/edit_kantor/'.$value->id_kantor);?>" value="Save" class="btn btn-edit"><p>Edit Kantor</p></a>
                                </div>
                                <!-- <a href=""><span class="material-icons-sharp">send</span></a> -->
                         </div>
                         <?php }?>
               <?php echo form_close() ?>   


          </div>
</div>

<div id="simpleModal" class="modal">
               <div class="modal-content">
                    <div class="modal-header">
                         <span hidden class="btnClose">&times;</span>
                    </div>
                    <div class="modal-body">
                    <?php 
                         foreach ($kantor as $key => $value) {?>
                        <img src="<?= base_url('assets/images/'.$value->image);?>"id="gambar_load">
                        <?php }?>
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

