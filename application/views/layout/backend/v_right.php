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
               <span class="material-icons-sharp">shopping_cart</span>
          </div>
          <div class="right">
               <div class="info">
                    <h3>ONLINE ORDERS</h3>
                    <small class="text-muted">Last 24 Hours</small>
               </div>
               <h5 class="success">+39%</h5>
               <h3>1100</h3>
          </div>
     </div>
     <div class="item offline">
          <div class="icon">
               <span class="material-icons-sharp">local_mall</span>
          </div>
          <div class="right">
               <div class="info">
                    <h3>OFFLINE ORDERS</h3>
                    <small class="text-muted">Last 24 Hours</small>
               </div>
               <h5 class="danger">-17%</h5>
               <h3>1100</h3>
          </div>
     </div>
     <div class="item costumers">
          <div class="icon">
               <span class="material-icons-sharp">person</span>
          </div>
          <div class="right">
               <div class="info">
                    <h3>NEW COSTUMER</h3>
                    <small class="text-muted">Last 24 Hours</small>
               </div>
               <h5 class="danger">+25%</h5>
               <h3>849</h3>
          </div>
     </div>
     <div class="item add-product">
          <div >
               <span class="material-icons-sharp">add</span>
               <h3>Add Product</h3>
          </div>
     </div>
</div>
<!-- SALES ANALYTICS END -->

</div>
<!-- RIGHT SIDE END -->