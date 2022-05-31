<div class="insights insights-laporan">
<!-- SALES START -->
<div class="sales sales-laporan">
<div class="heading">
        <span class="material-icons-sharp">analytics</span>
        <h3>Laporan harian</h3>
</div>
        <?php echo form_open('laporan/lap_harian')?>    

        <div class="middle">
                <div class="center">
                        <div class="content-laporan">
                                <label for="" class="label-laporan"> Tanggal </label>
                                <select name="tanggal"  class="input-laporan">
                                        <?php 
                                                $mulai =1;
                                                for ($i = $mulai; $i < $mulai + 31; $i ++) { 
                                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                        ?>    
                                </select>
                        </div>
                        <div class="content-laporan">
                                <label  class="label-laporan"> Bulan </label>
                                <select name="bulan" id="" class="input-laporan">
                                         <?php 
                                                $mulai =1;
                                                for ($i = $mulai; $i < $mulai + 12; $i ++) { 
                                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                        ?>  
                                </select>
                        </div>
                        <div class="content-laporan">
                                <label for="" class="label-laporan"> Tahun </label>
                                <select name="tahun" id="" class="input-laporan">
                                        <?php 
                                                $mulai =date('Y') - 1;
                                                for ($i = $mulai; $i < $mulai + 7; $i ++) { 
                                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                        ?> 
                                </select>
                        </div>
                </div>
        </div>
        <button type="submit" class="btn-laporan">Cetak Laporan</button>
        <?php echo form_close()?>
</div>

<div class="sales sales-laporan">
<div class="heading">
        <span class="material-icons-sharp">analytics</span>
        <h3>Laporan Bulanan</h3>
</div>
<?php echo form_open('laporan/lap_bulanan')?>
        <div class="middle">
                <div class="center">

                        <div class="content-laporan">
                                <label  class="label-laporan"> Bulan </label>
                                <select name="bulan" id="" class="input-laporan">
                                         <?php 
                                                $mulai =1;
                                                for ($i = $mulai; $i < $mulai + 12; $i ++) { 
                                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                        ?>  
                                </select>
                        </div>
                        <div class="content-laporan">
                                <label for="" class="label-laporan"> Tahun </label>
                                <select name="tahun" id="" class="input-laporan">
                                        <?php 
                                                $mulai =date('Y') - 1;
                                                for ($i = $mulai; $i < $mulai + 7; $i ++) { 
                                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                        ?> 
                                </select>
                        </div>
                </div>
        </div>
        <button type="submit" class="btn-laporan">Cetak Laporan</button>
        <?php echo form_close()?>

</div>

<div class="sales sales-laporan">
<div class="heading">
        <span class="material-icons-sharp">analytics</span>
        <h3>Laporan Tahunan</h3>
</div>
        <?php echo form_open('laporan/lap_tahunan')?>
        <div class="middle">
                <div class="center">

                        <div class="content-laporan">
                                <label for="" class="label-laporan"> Tahun </label>
                                <select name="tahun" id="" class="input-laporan">
                                        <?php 
                                                $mulai =date('Y') - 1;
                                                for ($i = $mulai; $i < $mulai + 7; $i ++) { 
                                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                        ?> 
                                </select>
                        </div>
                </div>
        </div>
        <button type="submit" class="btn-laporan">Cetak Laporan</button>
        <?php echo form_close()?>
</div>

</div>
<!-- INSIGHTS END -->
