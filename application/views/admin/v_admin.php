<?php 
        if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-sm-xm sukses" id="alert">
                <button type="button" class="closeBtn">&times;</button>
                <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
        }
        ?>
 <!-- INSIGHTS START -->

 <div class="insights">
                         <!-- SALES START -->
                         <div class="sales">
                              <span class="material-icons-sharp">person</span>
                              <div class="middle">
                                   <div class="left">
                                        <h3>Total Peserta</h3>
                                        <h1><?= $total_peserta;?>+</h1>
                                   </div>
                              </div>
                              <small class="text-muted">Last 24 Hours</small>
                         </div>

                         <!-- SALES END -->

                         <!-- EXPENSES START -->
                         <div class="expenses">
                              <span class="material-icons-sharp">group</span>
                              <div class="middle">
                                   <div class="left">
                                        <h3>Total Instruktur</h3>
                                        <h1><?= $total_instruktur;?>+</h1>
                                   </div>
                              </div>
                              <small class="text-muted">Last 24 Hours</small>
                         </div>
                         <!-- EXPENSES END -->

                         <!-- INCOME START -->
                         <div class="income">
                              <span class="material-icons-sharp">stacked_line_chart</span>
                              <div class="middle">
                                   <div class="left">
                                        <h3>Total Jadwal</h3>
                                        <h1><?= $total_jadwal;?></h1>
                                   </div>
                              </div>
                              <small class="text-muted">Last 24 Hours</small>
                         </div>
                         <!-- INCOME END -->
 
                    </div>
                    <!-- INSIGHTS END -->

                    <!-- RECENT ORDERS START -->
               <div class="recent-orders">
                    <h2>Daftar Jadwal Aktif</h2>
                    <table id="datatable" class="compact">
                         <thead>
                         <tr>
                                   <th>No</th>
                                   <th>Kode Jadwal</th>
                                   <th>Peserta</th>
                                   <th>Instruktur</th>
                                   <th>Paket</th>
                                   <th>QR Code</th>
                                   <th>Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php
                         $no = 1;
                         foreach ($active as $key => $value) {?>        
                         <tr>
                                   <td><?= $no++?></td>
                                   <td style="font-weight: bold;"><?= $value->kode_jadwal?></td>
                                   <td><?= $value->username_peserta;?></td>
                                   <?php
                                        if ($value->username_instr == "") {?>
                                                  <td class="warning">None</td> 
                                   <?php }else{?>
                                        <td><?= $value->username_instr;?></td>
                                   <?php }?>
                                   <td><?= $value->nama_paket;?></td>
                                        <?php
                                                  if ($value->status_jadwal == 2) {?>
                                                            <td>
                                                            <a href="<?= base_url('jadwal_admin/qr_code/'.$value->id_jadwal)?>" class="btn btn-jadwal jadwal-danger" ><p>QR-Code</p></a>   
                                                            </td>
                                                  <?php }?>
                                   <td>-</td>
                         </tr>
                         <?php }?>                         
                         </tbody>
                    </table>
               </div>
                    <!-- RECENT ORDERS END -->
