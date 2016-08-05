<?php
date_default_timezone_set('Asia/Jakarta');
                      
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Hasil KNN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php 
                if (isset($_POST['jumlah'])) {
                    mysqli_query($con,"insert into hasil_knn (kelayakan) values (".$_POST['jumlah'].")");

                }

                unset($_POST['jumlah']);
                
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Kelayakan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $qu=mysqli_query($con,"select * from hasil_knn");
                            
                            while($has=mysqli_fetch_row($qu))
                            {
                                
                                echo "
                                <tr>
                                    <td>$has[0]</td>";
                                    if($has[1]==4){
                                        echo "<td>baik</td>";
                                    }
                                    if($has[1]==3){
                                        echo "<td>cukup</td>";
                                    }
                                    if($has[1]==2){
                                        echo "<td>kurang</td>";
                                    }

                                echo "
                                 <td style='text-align:center'>
                        
                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel($has[0],&#39;list_hasilknn&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button><span>
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