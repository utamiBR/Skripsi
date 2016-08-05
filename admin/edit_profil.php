<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['update']))
{     
    $id_profil = $_GET['id_profil'];
    

    $update=mysqli_query($con,"update profil set keterangan='$keterangan' where id_profil='$id_profil'");
    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";
}

if(isset($_GET['id_profil']))
$data=mysqli_fetch_row(mysqli_query($con,"select * from profil where id_profil='".$_GET['id_profil']."'"));
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
                    <h3 class="box-title">Form Edit Data Profil</h3>
                </div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                    <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id_profil'])?$data[1]:''; ?>" id="dua" name="keterangan">
                            </div>
                        </div>
                            </div>
                        </div>
                        <!--input image awal-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="Save" name="<?php echo isset($_GET['id_profil'])?'update':''; ?>">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->