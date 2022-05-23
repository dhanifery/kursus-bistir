
<!-- RECENT ORDERS START -->
<div class="recent-orders"> 
        <h2></h2>
        <div class="recent-orders"> 
                    <h2></h2>
                <div class="hero">
                        <div class="btn-box">
                                <button id="btn1" onclick="openHTML()"><span class="material-icons-sharp">insights</span>All</button>
                                <button id="btn2" onclick="openCSS()"><span class="material-icons-sharp">money_off</span>Belum bayar</button>
                                <button id="btn3" onclick="openJS()"><span class="material-icons-sharp">monetization_on</span>Sudah bayar</button>
                                <button id="btn4" onclick="openBOX()"><span class="material-icons-sharp">pending</span>Pending</button>
                                <button id="btn5" onclick="openLAST()"><span class="material-icons-sharp">check</span>Active</button>
                        </div>
                        <div id="content1" class="content">
                                <div class="content-left">
                                <?php 
                                if ($this->session->flashdata('pesan')) {
                                        echo '<div class="alert alert-sm-xl sukses" id="alert">
                                        <button type="button" class="closeBtn">&times;</button>
                                        <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                                        echo $this->session->flashdata('pesan');
                                        echo '</h5></div>';
                                }
                                ?>
                                        <table id="datatable" class="compact">
                                                <thead>
                                                <tr>
                                                        <th>No</th>
                                                        <th>Kode Jadwal</th>
                                                        <th>Peserta</th>
                                                        <th>Instruktur</th>
                                                        <th>Paket</th>
                                                        <th>Actions</th>
                                                        <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($jadwal as $key => $value) {?>        
                                                <tr>
                                                        <td><?= $no++?></td>
                                                        <td><?= $value->kode_jadwal?></td>
                                                        <td><?= $value->username_peserta;?></td>
                                                        <?php
                                                                if ($value->username_instr == "") {?>
                                                                        <td class="warning">None</td> 
                                                        <?php }else{?>
                                                                <td><?= $value->username_instr;?></td>
                                                        <?php }?>
                                                        <td><?= $value->nama_paket;?></td>
                                                                <?php
                                                                        if ($value->status_bayar == 0 & $value->status_jadwal == 0) {?>
                                                                                <td>
                                                                                        -
                                                                                </td>
                                                                        <?php } elseif ($value->status_bayar == 1 & $value->status_jadwal == 0) {?>
                                                                                <td>
                                                                                        <a href="<?= base_url('jadwal_admin/cek_bukti/'.$value->id_jadwal)?>" class="btn btn-jadwal" ><p>cek bukti</p></a>
                                                                                </td>      
                                                                        <?php } else {?>
                                                                                <td>
                                                                                        -
                                                                                </td>
                                                                <?php }?>
                                                                <?php
                                                                        if ($value->status_jadwal == 0 & $value->status_bayar == 0) {?>
                                                                                <td>
                                                                                        -
                                                                                </td>
                                                                        <?php } elseif($value->status_jadwal == 0 & $value->status_bayar == 1) {?>
                                                                                <td>
                                                                                        <a href="<?= base_url('jadwal_admin/konfirmasi/'.$value->id_jadwal)?>" class="btn btn-jadwal jadwal-danger" ><p>Confirm</p></a>
                                                                                </td> 
                                                                        <?php } elseif($value->status_jadwal == 2 & $value->status_bayar == 1) {?>
                                                                                <td>
                                                                                        <p class="btn btn-jadwal jadwal-danger">QR Code</p>        
                                                                                </td>
                                                                        <?php }else {?>
                                                                                <td>
                                                                                        <p class="btn btn-jadwal">Menunggu Instruktur</p> 
                                                                                </td>      
                                                                <?php }?>
                                                </tr>
                                                <?php }?>                         
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                        <div id="content2" class="content">
                                <div class="content-left">
                                <table id="datatable2" class="compact">
                                                <thead>
                                                <tr>
                                                        <th>No</th>
                                                        <th>Kode Jadwal</th>
                                                        <th>Peserta</th>
                                                        <th>Instruktur</th>
                                                        <th>Paket</th>
                                                        <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($belum_bayar as $key => $value) {?>        
                                                <tr>
                                                        <td><?= $no++?></td>
                                                        <td><?= $value->kode_jadwal?></td>
                                                        <td><?= $value->username_peserta;?></td>
                                                        <?php
                                                                if ($value->username_instr == "") {?>
                                                                        <td class="warning">None</td> 
                                                        <?php }?>
                                                        <td><?= $value->nama_paket;?></td>
                                                                <?php
                                                                        if ($value->status_bayar == 0) {?>
                                                                                <td>
                                                                                        -
                                                                                </td>
                                                                        <?php }?>
                                                </tr>
                                                <?php }?>                         
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                        <div id="content3" class="content">
                                <div class="content-left">
                                <?php 
                                if ($this->session->flashdata('pesan')) {
                                        echo '<div class="alert alert-sm-xl sukses" id="alert">
                                        <button type="button" class="closeBtn">&times;</button>
                                        <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                                        echo $this->session->flashdata('pesan');
                                        echo '</h5></div>';
                                }
                                ?>
                                        <table id="datatable3" class="compact">
                                                <thead>
                                                <tr>
                                                        <th>No</th>
                                                        <th>Kode Jadwal</th>
                                                        <th>Peserta</th>
                                                        <th>Instruktur</th>
                                                        <th>Paket</th>
                                                        <th>Actions</th>
                                                        <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($sudah_bayar as $key => $value) {?>        
                                                <tr>
                                                        <td><?= $no++?></td>
                                                        <td><?= $value->kode_jadwal?></td>
                                                        <td><?= $value->username_peserta;?></td>
                                                        <?php
                                                                if ($value->username_instr == "") {?>
                                                                        <td class="warning">None</td> 
                                                        <?php }?>
                                                        <td><?= $value->nama_paket;?></td>
                                                                <?php
                                                                        if ($value->status_bayar == 0) {?>
                                                                                <td>
                                                                                        -
                                                                                </td>
                                                                        <?php } else {?>
                                                                                <td>
                                                                                        <a href="<?= base_url('jadwal_admin/cek_bukti/'.$value->id_jadwal)?>" class="btn btn-jadwal" ><p>cek bukti</p></a>
                                                                                </td>      
                                                                <?php }?>
                                                                <?php
                                                                        if ($value->status_bayar == 0) {?>
                                                                                <td>
                                                                                        -
                                                                                </td>
                                                                        <?php } else {?>
                                                                                <td>
                                                                                        <a href="<?= base_url('jadwal_admin/konfirmasi/'.$value->id_jadwal)?>" class="btn btn-jadwal jadwal-danger" ><p>Confirm</p></a>
                                                                                </td>      
                                                                <?php }?>
                                                </tr>
                                                <?php }?>                         
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                        <div id="content4" class="content">
                                <div class="content-left">
                                <table id="datatable4" class="compact">
                                                <thead>
                                                <tr>
                                                        <th>No</th>
                                                        <th>Kode Jadwal</th>
                                                        <th>Peserta</th>
                                                        <th>Instruktur</th>
                                                        <th>Paket</th>
                                                        <th>#</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pending as $key => $value) {?>        
                                                <tr>
                                                        <td><?= $no++?></td>
                                                        <td><?= $value->kode_jadwal?></td>
                                                        <td><?= $value->username_peserta;?></td>
                                                        <?php
                                                                if ($value->username_instr == "") {?>
                                                                        <td class="warning">None</td> 
                                                        <?php }?>
                                                        <td><?= $value->nama_paket;?></td>
                                                                <?php
                                                                        if ($value->status_jadwal == 1) {?>
                                                                                <td>
                                                                                        <p class="btn btn-jadwal">Menunggu Instruktur</p>        
                                                                                </td>
                                                                        <?php }?>
                                                </tr>
                                                <?php }?>                         
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                        <div id="content5" class="content">
                                <div class="content-left">
                                <table id="datatable5" class="compact">
                                                <thead>
                                                <tr>
                                                        <th>No</th>
                                                        <th>Kode Jadwal</th>
                                                        <th>Peserta</th>
                                                        <th>Instruktur</th>
                                                        <th>Paket</th>
                                                        <th>QR Code</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($active as $key => $value) {?>        
                                                <tr>
                                                        <td><?= $no++?></td>
                                                        <td><?= $value->kode_jadwal?></td>
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
                                                                                        <p class="btn btn-jadwal jadwal-danger">QR Code</p>        
                                                                                </td>
                                                                        <?php }?>
                                                </tr>
                                                <?php }?>                         
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
</div>
</div>
               