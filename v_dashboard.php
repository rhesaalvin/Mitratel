<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-dashboard"></i>  Dashboard</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-key"></i></div>
                <div class="count">
                    <?php echo $kncCount ?>
                </div>
                <h3>Kunci</h3>
                <p>Jumlah Kunci</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">
                    <?php echo $optCount ?>
                </div>
                <h3>Operator</h3>
                <p>Jumlah Operator terdaftar</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-arrow-up"></i></div>
                <div class="count">
                    <?php echo $pnjCount ?>
                </div>
                <h3>Peminjaman</h3>
                <p>Jumlah peminjaman belum kembali</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-arrow-down"></i></div>
                <div class="count">
                    <?php echo $kmbCount ?>
                </div>
                <h3>Pengembalian</h3>
                <p>Jumlah peminjaman sudah kembali</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-home"></i>  Data Perusahaan</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <label>Nama Perusahaan</label>
                    <p>PT. Dayamitra Telekomunikasi
                    </p>
                    <label>Alamat</label>
                    <p>Jl. Gayungan PPT 17-19, Surabaya
                    </p>
                    <label>Tentang</label>
                    <p>Bergerak sebagai provider pada bisnis penyediaan menara pemancar telekomunikasi dan infrastruktur bagi beberapa operator telekomunikasi di Indonesia.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-flag"></i>  Statistik Peminjaman Kunci</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <?php
                                $query1 = $this->db->where('stts', 'Tersedia')->from('tb_kunci')->count_all_results();
                                $query2 = $this->db->where('stts', 'Dipinjam')->from('tb_kunci')->count_all_results();
                            ?>
                            <div style="padding-top: 23px; padding-left: 20px">
                            <?php echo '<h4>Kunci dipinjam : <b>'.$query2.'</b></h6>'; ?>
                            <?php echo '<h4>Kunci di rak : <b>'.$query1.'</b></h6>'; ?>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <!-- <canvas id="bookgraph"></canvas> -->
                            <div id="bookgraph"></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
</div>
</div>

<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/highcharts.js"></script>
<script>
$(function () {
    var chart;
    $(document).ready(function () {
        // Build the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'bookgraph',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                margin:28,
                width: null,
                height: 173
            },
            title: {
                text: null
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            legend:{
                 align: 'right',
                 verticalAlign: 'top',
                 floating: true        
            },
            series: [{
                type: 'pie',
                name: 'Presentase',
                data: [
                    ['Kunci di pinjam', <?php echo $query2 ?>],
                    ['Kunci di rak', <?php echo $query1 ?>],
                ]
            }]
        });
    });
     
});
</script>


