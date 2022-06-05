
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
                         <a href="<?= base_url('user/add')?>" class="tambahdata">Add</a>
                    </div>
                    <table id="datatable" class="compact">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Username</th>
                                   <th>Email</th>
                                   <th>level_user</th>
                                   <th>Is Active</th>
                                   <th>Image</th>
                                   <th>Option</th>
                              </tr>
                         </thead>
                         <tbody>
                         <?php
                         $no = 1;
                              foreach ($user as $key => $value) {?>        
                              <tr>
                                   <td><?= $no++?></td>
                                   <td><?= $value->nama_user;?></td>
                                   <td><?= $value->email;?></td>
                                   <td>
                                           <?php 
                                                if ($value->level_user == 2) {?>
                                                       <p class="primary">Peserta</p> 
                                        <?php }elseif($value->level_user == 3){?>
                                                <p class="warning">Instruktur</p> 

                                        <?php }else{?>
                                                <p class="danger">Admin</p> 

                                        <?php }?>
                                   </td>
                                   <td>
                                             <?php 
                                                  if($value->is_active == 1){?>
                                                       <p >Active</p>
                                             <?php }else{?>
                                                  <p class="danger">Non Active</p>
                                             <?php }?>

                                   </td>
                                   <td style="width:70px ;">
                                        <img src="<?= base_url('assets/images/user/'. $value->image)?>">
                                   </td>
                                   <td class="primary">
                                        <a href="<?= base_url('user/update_user/'.$value->id_user)?>"><i class="uil uil-pen"></i></a>
                                        <a href="<?= base_url('user/delete_user/'.$value->id_user)?>" onclick="return confirm('Yakin hapus data <?= $value->nama_user?> ?')"><i class="uil uil-trash"></i></a>
                                   </td>
                              </tr>
                         <?php }?>                         
                         </tbody>
                    </table>
               </div>
                    <!-- RECENT ORDERS END -->