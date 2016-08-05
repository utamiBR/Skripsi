<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['save']))
{     
    $id_training = $_POST['id_training'];
    $bidang = $_POST['bidang'];
    $pelanggan = $_POST['pelanggan'];
    $proyek = $_POST['proyek'];
    $total_harga_jual = $_POST['total_harga_jual'];
    $kelayakan = $_POST['kelayakan'];
    
    $getId=mysqli_fetch_row(mysqli_query($con,"select max(id_training) from training"));
    
    
    mysqli_query($con,"insert into training (bidang, pelanggan, proyek, total_harga_jual, kelayakan) values('$bidang', '$pelanggan', '$proyek', '$total_harga_jual', '$kelayakan')");
    
       echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";
}




if(isset($_GET['id_training']))
$data=mysqli_fetch_row(mysqli_query($con,"select * from training where id_training='".$_GET['id_training']."'"));

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
                    <h3 class="box-title">Form Input Data Training</h3>
                </div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="id_training" value="<?php echo isset($_GET['id_training'])?$_GET['id_training']:''; ?>">
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
                            <label for="empat" class="col-sm-2 control-label">Total Harga Jual</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Total Harga Jual" id="lima" name="total_harga_jual">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lima" class="col-sm-2 control-label">Kelayakan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Kelayakan" id="enam" name="kelayakan">
                            </div>
                        </div>
                            </div>
                        </div>
                        <!--input image awal-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="Save" name="<?php echo isset($_GET['id_training'])?'update':'save'; ?>">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->