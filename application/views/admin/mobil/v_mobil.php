        <!-- RECENT ORDERS START -->
        <div class="recent-orders">
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
                         <a href="<?= base_url('mobil/add')?>" class="tambahdata">Add</a>
                    </div>
                    <table id="datatable" class="compact">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Nama mobil</th>
                                   <th>Jenis mobil</th>
                                   <th>No plat</th>
                                   <th>No mesin</th>
                                   <th>Image</th>
                                   <th>actions</th>
                              </tr>
                         </thead>
                         <?php 
                         $no=1;
                         foreach ($mobil as $key => $value) {?>
                        <tbody>
                              <tr>
                                   <td><?= $no++;?></td>
                                   <td><?= $value->nama_mobil?></td>
                                   <?php
                                        if ($value->jenis_mobil == 1) {?>
                                                <td class="warning">Manual</td>    
                                        <?php }else{?>
                                                <td class="primary">Matic</td>    
                                        <?php }?>
                                   <td><?= $value->no_plat?></td>
                                   <td><?= $value->no_mesin?></td>
                                   <td style="width:70px ;">
                                        <img src="<?= base_url('assets/images/mobil/'. $value->image_mobil)?>">
                                   </td>
                                   <td class="primary">
                                        <a href="<?= base_url('mobil/update/'.$value->id_mobil)?>"><i class="uil uil-pen"></i></a>
                                        <a href="<?= base_url('mobil/delete/'.$value->id_mobil)?>" onclick="return confirm('Yakin hapus data <?= $value->nama_mobil?> ?')"><i class="uil uil-trash"></i></a>
                                   </td>
                              </tr>                         
                         </tbody>
                         <?php }?>

                    </table>
               </div>
                    <!-- RECENT ORDERS END -->