<div class="recent-orders">
        
        <h2><?= $sub_title;?></h2>
        <div class="edit-form">
               <div class="contact-info admin">
                    <img src="<?= base_url('assets/images/bukti_bayar/'.$jadwal->bukti_bayar)?>" id="gambar_load" >
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
                              <h3>Cek Bukti</h3>
                              <label for="">Kode Transaksi*</label>
                              <input type="text" class="form-input form-jadwal"  name="atas_nama" value="Kode Transaksi : <?= $jadwal->kode_jadwal?>" autocomplete="off" placeholder="Username" readonly>

                              <label for="">Atas Nama*</label>
                              <input type="text" class="form-input"  name="atas_nama" value="<?= $jadwal->atas_nama?>" autocomplete="off" placeholder="Username" readonly>
                              <div class="form2">
                                   <div class="form-2">
                                        <label for="">Bank*</label>
                                        <input type="text" class="form-input"  name="password" value="<?= $jadwal->bank?>" autocomplete="off" placeholder="Username" readonly>
                                   </div>
                                   <div class="form-2">
                                        <label for="">No.Rek*</label>
                                        <input type="text" class="form-input"   value="<?= $jadwal->no_rek?>" autocomplete="off" placeholder="Email" readonly>
                                   </div>
                              </div>
                              <label for="">Jumlah Transfer*</label>
                              <input type="text" class="form-input"   value="Rp.<?= number_format($jadwal->total_bayar,0)?>" autocomplete="off" placeholder="Email" readonly>
                              <div class="form3">
                                   <a  class="btn" href="<?= base_url('jadwal_admin')?>">
                                             <p>Back</p>
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
                    <img src="<?= base_url('assets/images/bukti_bayar/'.$jadwal->bukti_bayar)?>" id="gambar_load" >
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