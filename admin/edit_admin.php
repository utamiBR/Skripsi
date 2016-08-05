<?php
date_default_timezone_set('Asia/Jakarta');
    $id = $_GET['id'];

if(isset($_POST['update']))
{    
    
 
     $update=mysqli_query($con,"update admin set username='$username', password='$password', nama='$nama', email='$email', tgl_lahir='$tgl_lahir' where id='$id'");
     echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";
}

if(isset($_GET['id']))
$data=mysqli_fetch_row(mysqli_query($con,"select * from admin where id='".$_GET['id']."'"));

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
                    <h3 class="box-title">Form Edit Data Admin</h3>
                </div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body">
                      

                        <div class="form-group">
                            <label for="satu" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id'])?$data[1]:'';?>" id="satu" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id'])?$data[2]:'';?>" id="dua" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id'])?$data[3]:'';?>" id="tiga" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="empat" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id'])?$data[4]:'';?>" id="empat" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lima" class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['id'])?$data[5]:'';?>" id="lima" name="tgl_lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="enam" class="col-sm-2 control-label">Tanggal Dibuat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="enam" name="tgl_dibuat" value="<?php echo isset($_GET['id'])?$data[6]:date('d-m-Y'); ?>" disabled>
                            </div>
                        </div>
                            </div>
                        </div>
                     
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="Save" name="<?php echo isset($_GET['id'])?'update':''; ?>">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->