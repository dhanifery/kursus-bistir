
                    <!-- RECENT ORDERS START -->
                    <div class="recent-orders">
                    <h2></h2>
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
                         <a href="<?= base_url('crud_instruktur/add')?>" class="tambahdata">Add</a>
                    </div>
                    <table id="datatable" class="compact">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Nama Peserta</th>
                                   <th>Jenis Kelamin</th>
                                   <th>Image</th>
                                   <th>Option</th>
                              </tr>
                         </thead>
                         <tbody>
                         <?php
                         $no = 1;
                              foreach ($instruktur as $key => $value) {?>        
                              <tr>
                                   <td><?= $no++?></td>
                                   <td><?= $value->username_instr;?></td>
                                   <td><?= $value->JK;?></td>
                                   <td style="width:70px ;">
                                        <img src="<?= base_url('assets/images/gambar/'. $value->image_instr)?>">
                                   </td>
                                   <td class="primary">
                                        <a href="<?= base_url('crud_instruktur/update/'.$value->id_instruktur)?>"><i class="uil uil-pen"></i></a>
                                        <a href="<?= base_url('crud_instruktur/delete/'.$value->id_instruktur)?>"><i class="uil uil-trash"></i></a>
                                   </td>
                              </tr>
                         <?php }?>                         
                         </tbody>
                    </table>
               </div>
                    <!-- RECENT ORDERS END -->