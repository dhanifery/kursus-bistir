<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info admin">
                    <img src="<?= site_url('jadwal_admin/qr_code_jadwal/'.$jadwal->kode_jadwal)?>" id="gambar_load" >
                    <div class="images-mid">
                         <button  id="modalBtn" class="button" ><i class="uil uil-search-plus"></i></button>
                    </div>
                    <div class="deskripsi">
                         <h3>Tanggal transaksi :</h3>
                         <p><?= $jadwal->tgl_jadwal;?></p>
                    </div>
               </div>
                         <div action="" class="contact-form">
                         <?php 
                         
                         echo form_open_multipart('') ?>
                              <h3>QR Code</h3>
                              <label for="">Kode Jadwal*</label>
                              <input type="text" class="form-input form-jadwal"  name="atas_nama" value="<?= $jadwal->kode_jadwal?>" autocomplete="off" placeholder="Username" readonly>
                              
                              <div class="form2">
                                   <div class="form-2">
                                   <label for="">Nama Peserta*</label>
                                   <input type="text" class="form-input"  name="atas_nama" value="<?= $jadwal->username_peserta?>" autocomplete="off" placeholder="Username" readonly>
                                   </div>
                                   <div class="form-2">
                                   <label for="">Nama Instruktur*</label>
                                   <input type="text" class="form-input"  name="atas_nama" value="<?= $jadwal->username_instr?>" autocomplete="off" placeholder="Username" readonly>
                                   </div>
                              </div>
                              <label for="">Paket*</label>
                              <input type="text" class="form-input "  name="atas_nama" value="<?= $jadwal->nama_paket?>" autocomplete="off" placeholder="paket" readonly>
                              <div class="form2">
                              <div class="form-2">
                                   <label for="">Jam Latihan*</label>
                                   <input type="text" class="form-input"  name="password" value="<?= $jadwal->jam_latihan?>" autocomplete="off" placeholder="Username" readonly>
                              </div>
                              <div class="form-2">
                                   <label for="">Tanggal Latihan*</label>
                                   <input type="text" class="form-input"   value="<?= $jadwal->tgl_latihan?>" autocomplete="off" placeholder="Email" readonly>
                              </div>
                              </div>
                              <label for="">Mobil*</label>
                              <select name="id_instruktur" class="jadwal-daftar daftar-none">
                                <?php
                                        foreach ($paket as $key => $value) {?>
                                                <?php if($value->id_paket == $jadwal->id_paket){?>
                                                        <option value=""><?= $value->nama_mobil?>
                                                                <?php if($value->jenis_mobil == 1) {?>
                                                                        ( Manual )
                                                                <?php }else{?>
                                                                        ( Matic )
                                                                <?php }?>

                                                        </option>
                                                <?php }?>
                                <?php }?>
                        
                        </select>
                              <div class="form3">
                                   <a href="<?= base_url('jadwal_admin')?>" class="btn"><p>Back</p></a>
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
                    <img src="<?= site_url('jadwal_admin/qr_code_jadwal/'.$jadwal->kode_jadwal)?>" id="gambar_load" >
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