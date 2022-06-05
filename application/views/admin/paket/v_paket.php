<!-- INSIGHTS START -->
<div class="insights">
     <!-- SALES START -->
     <?php
          foreach ($paket as $key => $value) {?>
          <div class="sales">
               <span class="material-icons-sharp">directions_car</span>
               <div class="middle">
                    <div class="left">
                         <h3><?= $value->nama_mobil?></h3>
                         <h2><?= $value->nama_paket?></h2>
                    </div>
                    <div class="progress progress-image">
                         <img src="<?= base_url('assets/images/paket/'.$value->image)?>" alt="">
                    </div>
               </div>
               <small class="text-muted"><?= $value->byk_pertemuan?></small><br>
               <b><small class="text-muted">Rp.<?= number_format($value->harga,0)?></small></b>
          </div>
     <?php }?>
</div>
<!-- INSIGHTS END -->

<!-- RECENT ORDERS START -->
<div class="recent-orders">
          <h2>Daftar Paket</h2>
          <?php 
               if ($this->session->flashdata('pesan')) {
                         echo '<div class="alert alert-sm-xl sukses" id="alert">
                         <button type="button" class="closeBtn">&times;</button>
                         <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                         echo $this->session->flashdata('pesan');
                         echo '</h5></div>';
               }
               ?>
          <div class="tambah-data">
               <a href="<?= base_url('paket/add')?>" class="tambahdata">Add</a>
          </div>
          <table id="datatable" class="compact">
               <thead>
                    <tr>
                         <th>No</th>
                         <th>Nama Paket</th>
                         <th>Mobil</th>
                         <th>Pertemuan</th>
                         <th>Transmisi</th>
                         <th>Harga</th>
                         <th>Actions</th>
                    </tr>
               </thead> 
               <tbody>
                    <?php
                    $no =1;
                    foreach ($paket as $key => $value) {?>
                    <tr>
                         <td><?= $no++?></td>
                         <td style="font-weight:bold;"><?= $value->nama_paket?></td>
                         <td><?= $value->nama_mobil ?>
                         </td>
                         <td><?= $value->byk_pertemuan?></td>
                         <td><?php if ($value->jenis_mobil ==1) {?>
                                   <p class="primary">Manual</p>
                              <?php }else{?>
                                   <p class="warning">Matic</p>
                              <?php }?>
                              </td>
                         <td>Rp.<?= number_format($value->harga,0)?></td>
                         <td class="primary">
                              <a href="<?= base_url('paket/update/'.$value->id_paket)?>"><i class="uil uil-pen"></i></a>
                              <a href="<?= base_url('paket/delete/'.$value->id_paket)?>" onclick="return confirm('Yakin hapus data <?= $value->nama_paket?> ?')"><i class="uil uil-trash"></i></a>
                         </td>
                    </tr>    
                    <?php }?>
               
               </tbody>
          </table>
     </div>
          <!-- RECENT ORDERS END -->