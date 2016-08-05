<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['save']))
{     
    $id_profil = $_POST['id_profil'];
    $keterangan = $_POST['keterangan'];
    
    
    $getId=mysqli_fetch_row(mysqli_query($con,"select max(id_profil) from profil"));
    
    
    mysqli_query($con,"insert into profil (id_profil, keterangan) values('$id_profil', '$keterangan')");
    
       echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";
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
                    <h3 class="box-title">Form Input Profil</h3>
                </div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="id_profil" value="<?php echo isset($_GET['id_profil'])?$_GET['id_profil']:''; ?>">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Keterangan Profil Perusahaan"  id="dua" name="keterangan">
                            </div>
                        </div>
                            </div>
                        </div>
                        <!--input image awal-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="Save" name="<?php echo isset($_GET['id_profil'])?'update':'save'; ?>">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->