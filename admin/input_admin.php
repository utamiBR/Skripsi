<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['save']))
{     
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    
    $getId=mysqli_fetch_row(mysqli_query($con,"select max(id) from admin"));
    
    
    mysqli_query($con,"insert into admin (id, username, password, nama, email, tgl_lahir, tgl_dibuat) values('$id', '$username', '$password', '$nama', '$email', '$tgl_lahir', '".date('Y-m-d')."')");
    
       echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";
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
                    <h3 class="box-title">Form Input Admin</h3>
                </div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="id" value="<?php echo isset($_GET['id'])?$_GET['id']:''; ?>">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="satu" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Username" id="satu" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Password" id="dua" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama" id="tiga" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="empat" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Email" id="empat" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lima" class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Tanggal Lahir" id="lima" name="tgl_lahir">
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
                        <!--input image awal-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="Save" name="<?php echo isset($_GET['id'])?'update':'save'; ?>">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->