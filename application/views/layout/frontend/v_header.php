<body>
        <div class="overlay"></div>
        <header>
                <nav class="container">
                        <img class="logo-img" src="<?= base_url()?>assets/images/logo.png">
                        <a href="" class="logo">BI<span class="danger">-STIR</span></a>
                        <div class="link">
                                <ul>
                                <?php
                                        if ($this->session->userdata('level_user') == "2") {?>
                                        <li>
                                                <a href="<?= base_url('peserta')?>" class="nav-link">Home</a>
                                        </li>
                                        <!-- <li>
                                                <a href="<?= base_url('peserta/about')?>" class="nav-link">About</a>
                                        </li> -->
                                        <li>
                                                <a href="<?= base_url('courses/paket')?>" class="nav-link">courses</a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('daftar_kursus/daftar_peserta')?>" class="nav-link">Daftar</a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('jadwal/jadwal_peserta')?>" class="nav-link">Jadwal</a>
                                        </li>
                                        <!-- <li>
                                                <a href="<?= base_url('peserta/contact')?>" class="nav-link">Contact</a>
                                        </li> -->
                                        <?php } else {?>
                                                <li>
                                                <a href="<?= base_url('instruktur')?>" class="nav-link">Home</a>
                                        </li>
                                        <!-- <li>
                                                <a href="<?= base_url('instruktur/about')?>" class="nav-link">About</a>
                                        </li> -->
                                        <li>
                                                <a href="<?= base_url('courses/paket')?>" class="nav-link">courses</a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('daftar_kursus/daftar_instruktur')?>" class="nav-link">Daftar</a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('jadwal/jadwal_instruktur')?>" class="nav-link">Jadwal</a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('jadwal/jadwal_instruktur_aktif')?>" class="nav-link">My Jadwal</a>
                                        </li>
                                        <!-- <li>
                                                <a href="<?= base_url('peserta/contact')?>" class="nav-link">Contact</a>
                                        </li> -->
                                        <?php } ?>
                                </ul>
                                <i class="uil uil-moon toggle-btn"></i>
                                <!-- <span>
                                        <a href="<?= base_url('auth/login_user')?>">sign in</a>
                                </span> -->
                                <div class="profile">
                                        <div class="info"> 
                                                <p>Hey, <b><?= $user['nama_user']?></b></p>
                                                <?php
                                                if ($this->session->userdata('level_user') == "2") {?>
                                                        <small class="text-muted">Peserta</small>
                                                <?php } else {?>
                                                        <small class="text-muted">Instruktur</small>
                                                <?php } ?>
                                        </div>
                                        <div class="profile_dd">
                                                <div class="icon_wrap" id="profilBtn">
                                                        <img src="<?= base_url('assets/images/user/') . $user['image'];?>">
                                                </div>
                                                <div class="profile_down">
                                                        <ul class="profile_ul">
                                                          <li class="profile_li"><a class="profile" href="#"><i class="uil uil-user"></i> Profile</a>
                                                          </li>
                                                          <li class="profile_li"><a class="profile" href="<?= base_url('auth/logout_user')?>"><i class="uil uil-signout"></i> Sign out </a></li>
                                                        </ul>
                                                      </div>
                                        </div>
                                </div>
                        </div>
                        <div class="hamburger">
                                <div class="bar"></div>
                                <div class="bar"></div>
                        </div>
                </nav>
        </header>

        <main>