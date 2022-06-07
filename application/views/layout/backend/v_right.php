          <!-- RIGHT SIDE START-->
          <div class="right">

<!-- START OF TOP -->
<div class="top">
     <button id="menu-btn">
          <span class="material-icons-sharp">menu</span>
     </button>
     <div class="theme-toggler">
          <span class="material-icons-sharp active">light_mode</span>
          <span class="material-icons-sharp">dark_mode</span>
     </div>
     <div class="profile">
          <div class="info">
               <p>Hey, <b><?= $admin['nama_user'];?></b></p>
               <?php
               if ($this->session->userdata('level_user') == "1") {?>
                    <small class="text-muted">Admin</small>
               <?php } elseif 
               ($this->session->userdata('level_user') == "2"){?>
                    <small class="text-muted">Peserta</small>
               <?php } else {?>
                    <small class="text-muted">Instruktur</small>
               <?php } ?>
          </div>
          <div class="profile-photo">
               <div class="icon_wrap">
                    <img src="<?= base_url('assets/images/user/') . $admin['image'];?>">
               </div>
               <div class="profile_dd">
                    <ul class="profile_ul">
                    <li class="profile_li"><a class="profile" href="<?= base_url('admin/myprofil/' .$admin['id_user']);?>"><span class="material-icons-sharp">person_outline</span> My Profile</a>
                    </li>
                    <li class="profile_li"><a class="profile" href="<?= base_url('assets/images/modul/modul admin.pdf');?>"><span class="material-icons-sharp">book</span> Penggunaan</a>
                    </li>
                    <li class="profile_li"><a class="profile" href="<?= base_url('auth/logout_user')?>"><span class="material-icons-sharp">logout</span> Log Out </a></li>
                    </ul>
               </div>
               </div>
          </div>
</div>
<!-- END OF TOP -->

<!-- START OF RECENT UPDATES -->
<div class="recent-updates">
     <h2>Calender</h2>
     <div class="updates">   
         <!--Kalender Side-->
         <div class="content_kalender">
           <div class="calendar">
             <div class="calendar-header">
                 <span class="month-picker" id="month-picker">February</span>
                 <div class="year-picker">
                     <span class="year-change" id="prev-year">
                         <pre><</pre>
                     </span>
                     <span id="year">2021</span>
                     <span class="year-change" id="next-year">
                         <pre>></pre>
                     </span>
                 </div>
             </div>
             <div class="calendar-body">
                   <div class="calendar-week-day">
                     <div style="color: var(--color-danger);">Sun</div>
                     <div>Mon</div>
                     <div>Tue</div>
                     <div>Wed</div>
                     <div>Thu</div>
                     <div>Fri</div>
                     <div>Sat</div>
                 </div>
                 <div class="calendar-days">
             </div>
             <div class="calendar-footer">
             </div>
             <div class="month-list"></div>
         </div>
         </div>
       </div>
     </div>
</div>
<!-- END OF RECENT UPDATES -->

<!-- SALES ANALYTICS START -->
<div class="sales-analytics">
     <h2>Sales Analytics</h2>
     <div class="item online">
          <div class="icon">
               <span class="material-icons-sharp">person</span>
          </div>
          <div class="right">
               <div class="info">
                    <h3>DAFTAR ONLINE </h3>
                    <small class="text-muted">Last 24 Hours</small>
               </div>
               <?php
               $daftar_online = $this->m_home->total_daftar_online();
               $daftar_offline = $this->m_home->total_daftar_offline();
               $user = $this->m_home->total_user();
               $kantor = $this->m_home->get_kantor();
               $user_online = $this->m_home->user_online();
               $user_offline = $this->m_home->user_offline();
               ?>
               <h3><?= $daftar_online?>+</h3>
          </div>
     </div>
     <div class="item offline">
          <div class="icon">
               <span class="material-icons-sharp">person</span>
          </div>
          <div class="right">
               <div class="info">
                    <h3>DAFTAR OFFLINE</h3>
                    <small class="text-muted">Last 24 Hours</small>
               </div>
               <h3><?= $daftar_offline;?>+</h3>
          </div>
     </div>
     <div class="item costumers">
          <div class="icon">
                    <span class="material-icons-sharp">groups</span>
          </div>
          <div class="right">
               <div class="info">
                    <a href="<?= base_url('user/all_user');?>">
                    <h3>USER</h3>
                    <small class="text-muted primary">User active : <?= $user_online?> User</small><br>
                    <small class="text-muted danger">User non active : <?= $user_offline?> User</small>
                    </a>
               </div>
               <h3><?= $user;?>+</h3>
          </div>
     </div>
     <?php 
     foreach ($kantor as $key => $value) {?>
          <div class="item online">
          <div class="icon">
                    <span class="material-icons-sharp">home_work</span>
          </div>
          <div class="right">
               <div class="info">
                    <a href="<?= base_url('admin/kantor');?>">
                    <h3>KANTOR</h3>
                    <small class="text-muted"><?= $value->alamat?></small><br>
                    <small class="text-muted">Telp.<?= $value->no_telp?></small>
                    </a>
               </div>
               <h3 class="primary">
                    <span class="material-icons-sharp" style="font-size: 1rem;">home_work</span>
               </h3>
          </div>
     </div>
     <?php }?>

     <!-- <div class="item add-product">
          <div >
               <span class="material-icons-sharp">add</span>
               <h3>Add Product</h3>
          </div>
     </div> -->
</div>
<!-- SALES ANALYTICS END -->

</div>
<!-- RIGHT SIDE END -->