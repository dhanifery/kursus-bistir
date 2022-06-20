<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <!-- Font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- custom style -->
        <link rel="stylesheet" href="<?= base_url('assets/css/laporan-admin.css')?>">
</head>
<body onload="window.print()">
<div class="my-5 page" size="A4">
        <div class="p-5">
                <section class="top-content bb d-flex justify-content-between">
                        <div class="logo">
                                <img src="<?= base_url('assets/images/logo.png')?>" alt="" class="img-fluid">
                                <h1>B I-<span>S T I R</span></h1>
                        </div>
                        <div class="top-left">
                                <div class="graphic-path">
                                        <p>Lap.Harian</p>
                                </div>
                                <div class="position-relative">
                                        <?php 
                                        $kode_laporan = date('Ymd');
                                        ?>
                                        <p>No.<span><?= $kode_laporan?></span></p>
                                </div>
                        </div>
                </section>
                <section class="product-area mt-4">
                        <table class="table table-hover">
                                <thead>
                                        <tr>
                                                <td>Kode Jadwal</td>
                                                <td>Nama Peserta</td>
                                                <td>Paket</td>
                                                <td>Total</td>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $grand_total=0;
                                                foreach ($laporan as $key => $value) {
                                                        $total_harga = $value->total_bayar;
                                                        $grand_total = $grand_total + $total_harga;
                                                        ?>
                                                <tr>
                                                        <td><?= $value->kode_jadwal?></td>
                                                        <td><?= $value->username_peserta ?></td>
                                                        <td><?= $value->nama_paket ?></td>
                                                        <td>Rp.<?= number_format($value->total_bayar,0)?></td>
                                                </tr>
                                                
                                        <?php }?>

                                </tbody>
                        </table>

                </section>

                <section class="balance-info">
                        <div class="row">
                                <div class="col-8">
                                </div>
                                <div class="col-4">
                                        <table class="table table-hover">
                                                <tr>
                                                        <td>Grand Total</td>
                                                        <td>Rp.<?= number_format($grand_total,0)?></td>
                                                </tr>
                                        </table>
                <!-- signature  -->
                                

                                 </div>
                        </div>
                </section>

                <footer>
                        <div class="row">
                        <div class="col-12">
                                        <p class="text-center m-0">Bekasi, </b> <?= date('d-m-Y')?></p>     
                                        <img src="<?= base_url('assets/images/sign.png')?>" class="img-fluid" alt="">
                                        <p class="text-center m-0"> Admin</p>
                                </div>
                        </div>

                </footer>
        </div>
</div>
</body>
</html>