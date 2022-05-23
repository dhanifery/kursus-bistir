<section class="testimonials section" id="testi">
        <div class="container jadwal-sesi">
                <div class="section-background">
                        <img src="<?= base_url()?>/assets/images/home/young-girl.png" class="person" alt="">
                        <img src="<?= base_url()?>/assets/images/home/circle2.png" class="circle" alt="">
                        <img src="<?= base_url()?>/assets/images/home/square1.png" class="square" alt="">
                </div>
                <div class="swiper">
                        <div class="wrapper">
                                <div class="swiper-slide">
                                        <div class="client">
                                        <?php
                                                foreach ($data_instruktur as $key => $value) {?>
                                                <img src="<?= base_url('assets/images/gambar/'.$value->image_instr)?>" alt="">
                                                <div class="client-info">

                                                        <h4><?= $value->username_instr?></h4>
                                                        <h5><a href="#"><?= $value->email_instr?></a></h5>
                                                </div>
                                        <?php }?>

                                        </div>
                                        <div class="table">
                                                <table>
                                                <thead>
                                                <tr>
                                                        <th>Jadwal</th>
                                                </tr>
                                                </thead>
                                                <tbody>       
                                                <tr>
                                                       <td>Oops, Jadwal belum tersedia saat ini....

                                                       </td>
                                                </tr>                      
                                                </tbody>
                                        </table>
                                        </div>
                                        
                                </div> 
                        </div>
                        <div class="swiper-pagination"></div>
                </div>
                <div class="testimonials-title title-jadwal">
                        <h3 class="sub-heading">schedule</h3>
                        <h1 class="heading">Welcome</h1>
                </div>
        </div>
</section>