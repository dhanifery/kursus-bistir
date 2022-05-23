<body>
          <div class="container">
               <!-- aside start -->
               <aside>
                    <div class="top">
                         <div class="logo">
                              <img  src="<?= base_url()?>assets/images/logo.png">
                              <h2>BI<span class="danger">-STIR</span></h2>
                         </div>
                         <div class="close" id="close-btn"> 
                              <span class="material-icons-sharp">close</span>
                         </div>
                    </div>
                    <div class="sidebar">
                    <p>Home</p>
                         <a href="<?= base_url('admin'); ?>" class="<?php if($this->uri->segment(1)== 'admin'){
                         echo "active";
                         }?>"><span class="material-icons-sharp">grid_view</span>
                              <h3>Dashboard</h3>
                         </a>
                         <p>Master Data</p>
                         <a href="<?= base_url('crud_peserta'); ?>" class="<?php if($this->uri->segment(1)== 'crud_peserta'){
                         echo "active";
                         }?>"><span class="material-icons-sharp">person_outline</span>
                              <h3>Data Peserta</h3>
                         </a>
                         <a href="<?= base_url('crud_instruktur'); ?>" class="<?php if($this->uri->segment(1)== 'crud_instruktur'){
                         echo "active";
                         }?>"><span class="material-icons-sharp">group</span>
                              <h3>Data Instruktur</h3>
                         </a>
                         <a href="<?= base_url('user'); ?>" class="<?php if($this->uri->segment(1)== 'user'){
                         echo "active";
                         }?>"><span class="material-icons-sharp">groups</span>
                              <h3>Data Admin</h3>
                         </a>
                         <p>Paket dan Mobil</p>
                         <a href="<?= base_url('paket'); ?>" class="<?php if($this->uri->segment(1)== 'paket'){
                         echo "active";
                         }?>"><span class="material-icons-sharp">category</span>
                              <h3>Data Paket</h3>
                              <!-- <span class="message-count">20</span> -->
                         </a>
                         <a href="<?= base_url('mobil'); ?>" class="<?php if($this->uri->segment(1)== 'mobil'){
                         echo "active";
                         }?>"><span class="material-icons-sharp">directions_car</span>
                              <h3>Data Mobil</h3>
                              <!-- <span class="message-count">20</span> -->
                         </a>
                         <p>Jadwal & Laporan</p>
                         <a href="<?= base_url('jadwal_admin')?>" class="<?php if($this->uri->segment(1)== 'jadwal_admin'){
                         echo "active";
                         }?>"><span class="material-icons-sharp">insights</span>
                              <h3>Jadwal</h3>
                         </a>
                         <a href="#"><span class="material-icons-sharp">receipt_long</span>
                              <h3>Laporan Transaksi</h3>
                         </a>
                         <a href="<?= base_url('auth/logout_user');?>"><span class="material-icons-sharp">logout</span>
                              <h3>Logout</h3>
                         </a>
                    </div>
               </aside>
               <!-- aside end -->

               <!-- MAIN START -->
               