<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        
        <a href="<?= SITE_UNDANGAN ?>/<?= $order[0]->domain ?>" class="btn btn-primary btn-sm">Lihat Website</a>
        
        </div>
    </div>

    <div class="row mb-3">

        <?php if($pembayaran[0]->status == 0){ ?>
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <?php 
                    
                    $durasi = '+3 days';
                    $tglDaftar = $pembayaran[0]->created_at;
                    $tglExp = strtotime($durasi, strtotime($tglDaftar));
                    $tglExpFormated = date("d-m-Y H:i A",$tglExp);

                    ?>
                    
                    <h6 class="m-0 font-weight-bold " style="color:red">Invoice : Selesaikan pembayaran anda sebelum <?= $tglExpFormated ?></h6>

                </div>
            </div>
        </div>
        <?php }else if($pembayaran[0]->status == 1){ ?>
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    
                    <h6 class="m-0 font-weight-bold " style="color:orange">Invoice : Pembayaran anda menunggu dikonfirmasi</h6>

                </div>
            </div>
        </div>
        <?php } else if($pembayaran[0]->id_user != 1) {
$aktif = '+'.$setting[0]->aktif.' days';
$tglDaftar = $pembayaran[0]->created_at;
$tglNonaktif= strtotime($aktif, strtotime($tglDaftar));
$tglNonaktifFormated = date("d-m-Y H:i A",$tglNonaktif);
$today = strtotime('now');

if($setting[0]->aktif <= 0 || $today >= $tglNonaktif ){ 

?>
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color:red"> Masa Aktif Undangan sudah habis pada tanggal <?= $tglNonaktifFormated ?>, Silahkan lakukan pembayaran lagi untuk memperpanjang masa aktif undangan </h6>

                </div>
            </div>
        </div>
        <?php } }?>

        <!-- New User Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengunjung</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_pengunjung ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Ucapan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_komentar ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pengunjung 7 Hari Terakhir</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message From Customer-->
        <div class="col-xl-12 col-lg-7 mb-4 ">
            <div class="card">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-light">Data Ucapan</h6>
                </div>
                <div>
                    <?php 
                    $limit = 0;
                    foreach($komentar as $row){ 
                        $limit++;
                        if($limit > 4){ //limit 4 komentar
                            break;
                        }
                
                    ?>
                        <div class="customer-message align-items-center">
                            <a class="font-weight-bold" href="#">
                                <div class="text-truncate message-title"><?= \esc($row->isi_komentar) ?></div>
                                <div class="small text-gray-500 message-time font-weight-bold"><?= \esc($row->nama_komentar) ?></div>
                            </a>
                        </div>
                    <?php } ?>
                    
                    <div class="card-footer text-center">
                        <a class="m-0 small text-primary card-link" href="<?= base_url('user/ucapan') ?>">Lihat Lebih <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

<script>

    var jumlah = [];
    var tanggal = [];
    moment.locale('id');
    var namaBulan  = moment().format('MMMM');
    
    <?php foreach($total_mingguan as $row){ ?>
        jumlah.push(<?= $row->jumlah ?>);
        tanggal.push(<?= $row->tanggal ?>+' '+namaBulan);
    <?php } ?>
    


</script>