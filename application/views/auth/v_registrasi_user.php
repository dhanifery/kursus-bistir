<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/auth-regis.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/alert.css') ?>">
    <title><?= $title; ?></title>
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <form action="<?= base_url('auth/registrasi');?>" method="post"  class="sign-up-form">
                   
                         <img class="profil" src="<?= base_url('assets/images/profil/undraw_profile.svg') ?>">
                         <a href="<?= base_url('home');?>">
                              <img src="<?= base_url()?>assets/images/logo.png">
                              <p>BI<span class="danger">-STIR</span></p>
                         </a>
                         <?php
                         echo validation_errors('<div class="alert gagal" id="alert">
                         <button type="button" class="closeBtn">&times;</button>
                         <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>','
                         </div>');

                         if ($this->session->flashdata('pesan')) {
                              echo '<div class="alert sukses" id="alert">
                              <button type="button" class="closeBtn">&times;</button>
                              <h5><i class="fa-solid fa-circle-check"></i> Success!</h5>';
                              echo $this->session->flashdata('pesan');
                              echo '</div>';
                         }
                         if ($this->session->flashdata('error')) {
                                echo '<div class="alert gagal" id="alert">
                                <button type="button" class="closeBtn">&times;</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>';
                                echo $this->session->flashdata('error');
                                echo '</div>';
                           }
                         ?>    
                         <div class="input-field">
                              <i class="fas fa-user"></i>
                              <input type="text" placeholder="Username" name="nama_user" value="<?= set_value('nama_user');?>" autocomplete="off"/>
                         </div>
                         <div class="input-field">
                              <i class="fas fa-envelope"></i>
                              <input type="email" placeholder="Email" name="email" value="<?= set_value('email');?>" autocomplete="off" />
                         </div>
                         <div class="input-field">
                              <i class="fas fa-lock"></i>
                              <input type="password" placeholder="Password" name="password" />
                         </div>

                         <input type="submit" class="btn" value="Sign up" />
                    </form>


                    <form action="<?= base_url('auth/login_user');?>" method="post" class="sign-in-form">
                         <img class="profil" src="<?= base_url('assets/images/profil/undraw_profile.svg') ?>">
                         <a href="<?= base_url('home');?>">
                              <img src="<?= base_url()?>assets/images/logo.png">
                              <p>BI<span class="danger">-STIR</span></p>
                         </a>
                        
                         <!-- <div id="flash" data-flash="<?= $this->session->flashdata('login');?>"></div> -->
                         <?php
                         echo validation_errors('<div class="alert error" id="alert">
                         <button type="button" class="closeBtn">&times;</button>
                         <h5><i class="fa-solid fa-circle-xmark"></i></i> Error!</h5>','
                         </div>');

                         if ($this->session->flashdata('error')) {
                              echo '<div class="alert gagal" id="alert">
                              <button type="button" class="closeBtn">&times;</button>
                              <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>';
                              echo $this->session->flashdata('error');
                              echo '</div>';
                         }
                         ?>
                         <div class="input-field">
                              <i class="fas fa-user"></i>
                              <input type="email" placeholder="Email" id="email" name="email" autocomplete="off" value="<?= set_value('email');?>"/>
                         </div>
                         <div class="input-field">
                              <i class="fas fa-lock"></i>
                              <input type="password" placeholder="Password" id="password" name="password"/>
                         </div>
                         <input type="submit" name="submit" class="btn solid" value="Sign In" />
                    </form>


        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Daftar akun?</h3>
            <p>
              Silahkan registrasi dengan klik tombol dibawah ini
            </p>
            <button class="btn transparent" id="sign-up-btn">
              SIGN UP
            </button>
          </div>
          <img src="<?= base_url('assets/images/profil/undraw_off_road_-9-oae.svg');?>" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah mempunyai akun ?</h3>
            <p>
              Silahkan login dengan klik tombol dibawah ini
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="<?= base_url();?>assets/images/profil/undraw_programming_re_kg9v (1).svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="<?= base_url('assets/js/auth_regis.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="<?= base_url('assets/js/alert.js') ?>"></script>

        <script>
                window.setTimeout(function() {
                        $(".alert").fadeTo(500,0).slideUp(500, function(){
                        $(this).remove();
                });
                },3000)
        </script>
  </body>
</html>
