<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['update']))
{     
    $id_transaksi = $_GET['id_transaksi'];
   
    
    mysqli_query($con,"update transaksi set bidang='$bidang', produk='$produk', pelanggan='$pelanggan', proyek='$proyek', total_harga_jual='$total_harga_jual', tgl_transaksi='$tgl_transaksi' where id_transaksi='$id_transaksi'");
    
    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";
}



if(isset($_GET['id_transaksi']))
$data=mysqli_fetch_row(mysqli_query($con,"select * from transaksi where id_transaksi='".$_GET['id_transaksi']."'"));

?>
    <style>
        #image-holder {
            margin-top: 8px;
        }
        
        #image-holder img {
            border: 8px solid #DDD;
            max-width:100%;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Edit Data Transaksi</h3>
                </div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="id_transaksi" value="<?php echo isset($_GET['id_transaksi'])?$_GET['id_transaksi']:'';?>">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="satu" class="col-sm-2 control-label">Bidang</label>
                            <div class="col-sm-10">
                        <select name="bidang" /> 
                        <option value"pilih" selected> Pilih Bidang </option>
                        <option value"pilih" > ENERGI </option>
                        <option value"pilih" > SMARTCITY </option>
                        <option value"pilih" > ICT </option>
                        <option value"pilih" > TRANSPORTASI </option>
                    </select>
                    <br/>
                    </div>
                        </div>
                        <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id_transaksi'])?$data[2]:'';?>" id="dua" name="produk">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Pelanggan</label>
                            <div class="col-sm-10">
                        <select name="pelanggan" /> 
                        <option value"pilih" selected> Pilih Pelanggan </option>
                        <option value"pilih" > TELKOM </option>
                        <option value"pilih" > KAI </option>
                        <option value"pilih" > PLN </option>
                        <option value"pilih" > PERTAMINA </option>
                        <option value"pilih" > PUSLITBANG </option>
                        <option value"pilih" > BPPT </option>
                        <option value"pilih" > BIOFARMA </option>
                    </select>
                    <br/>
                    </div>
                        </div>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Proyek</label>
                            <div class="col-sm-10">
                        <select name="proyek" /> 
                        <option value"pilih" selected> Pilih Proyek </option>
                        <option value"pilih" > TITO </option>
                        <option value"pilih" > FTTH </option>
                        <option value"pilih" > SMPBBM </option>
                    </select>
                    <br/>
                    </div>
                        </div>
                        <div class="form-group">
                            <label for="lima" class="col-sm-2 control-label">Total Harga Jual</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id_transaksi'])?$data[5]:'';?>" id="lima" name="total_harga_jual">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="enam" class="col-sm-2 control-label">Tanggal Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id_transaksi'])?$data[6]:'';?>" id="enam" name="tgl_transaksi">
                            </div>
                        </div>
                            </div>
                        </div>
                        <!--input image awal-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="Save" name="<?php echo isset($_GET['id_transaksi'])?'update':''; ?>">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->