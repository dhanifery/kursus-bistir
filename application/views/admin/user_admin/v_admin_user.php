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
                <a href="<?= base_url('user/add')?>" class="tambahdata">Add</a>
        </div>
        <table id="datatable" class="compact">
                <thead>
                <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Image</th>
                        <th>action</th>
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
                        <td><?php if($value->level_user = 1){?>
                                Admin
                        <?php }?>
                        </td>
                        <td style="width:70px ;">
                        <img src="<?= base_url('assets/images/user/'. $value->image)?>">
                        </td>
                        <td class="primary">
                        <a href="<?= base_url('user/update/'.$value->id_user)?>"><i class="uil uil-pen"></i></a>
                        <a href="<?= base_url('user/delete/'.$value->id_user)?>"><i class="uil uil-trash"></i></a>
                        </td>
                </tr>
                <?php }?>                         
                </tbody>
        </table>
</div>
<!-- RECENT ORDERS END -->
