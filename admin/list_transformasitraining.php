<?php
date_default_timezone_set('Asia/Jakarta');
    mysqli_query($con, "truncate transformasi_training");
    $getId=(mysqli_query($con,"select bidang, pelanggan, proyek, total_harga_jual from training"));

    while ($row = mysqli_fetch_object($getId)) {
        if ($row->bidang=="ENERGI") {
            $bidang = 4;
        }
        if ($row->bidang=="SMARTCITY") {
            $bidang = 3;
        }
        if ($row->bidang=="ICT") {
            $bidang = 2;
        }
        if ($row->bidang=="TRANSPORTASI") {
            $bidang = 1;
        }


        if ($row->pelanggan=="TELKOM") {
            $pelanggan = 7;
        }
        if ($row->pelanggan=="KAI") {
            $pelanggan = 6;
        }
        if ($row->pelanggan=="PLN") {
            $pelanggan = 5;
        }
        if ($row->pelanggan=="PERTAMINA") {
            $pelanggan = 4;
        }
        if ($row->pelanggan=="PUSLITBANG") {
            $pelanggan = 3;
        }
        if ($row->pelanggan=="BPPT") {
            $pelanggan = 2;
        }
        if ($row->pelanggan=="BIOFARMA") {
            $pelanggan = 1;
        }

        if ($row->proyek=="TITO") {
            $proyek = 3;
        }
        if ($row->proyek=="FTTH") {
            $proyek = 2;
        }
        if ($row->proyek=="SMPBBM") {
            $proyek = 1;
        }


        if ($row->total_harga_jual>1000000000) {
            $total_harga_jual = 3;
        }
        if ($row->total_harga_jual<=1000000000) {
            $total_harga_jual = 2;
        }
        if ($row->total_harga_jual<100000000) {
            $total_harga_jual = 1;
        }


        mysqli_query($con,"insert into transformasi_training (bidang, pelanggan, proyek, total_harga_jual) 
        values($bidang,$pelanggan,$proyek,$total_harga_jual)");
    }
    
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Transformasi Training</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No Urut</th>
                            <th>Bidang</th>
                            <th>Pelanggan</th>
                            <th>Proyek</th>
                            <th>Total Harga Jual</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $qu=mysqli_query($con,"select * from transformasi_training");
                        
                            while($has=mysqli_fetch_row($qu))
                            {
                               
                                echo "
                                <tr>
                                    <td>$has[0]</td> 
                                    <td>$has[1]</td>
                                    <td>$has[2]</td>
                                    <td>$has[3]</td>
                                    <td>$has[4]</td>
                                    
                                    <td style='text-align:center'>
                        
                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel($has[0],&#39;list_transformasitraining&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button><span>
                                    </td>
                                </tr>
                                ";
                            }

                       ?>
                      </tbody>

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
<script>
    function datadel(value,jenis){
       document.getElementById('mylink').href="hapus.php?del="+value+"&data="+jenis;
    }
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="mylink" href=""><button type="button" class="btn btn-primary">Delete Data</button></a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.row -->