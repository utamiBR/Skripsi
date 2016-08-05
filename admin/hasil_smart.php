
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Hasil SMART</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kelayakan</th>
                            
                        </tr>
                    </thead>
                    <form action="index.php?page=list_hasilsmart" method="post">
                    <tbody>
                       <?php
                            $qu=mysqli_query($con,"select * from smart_total");
                            
                            while($has=mysqli_fetch_row($qu))
                            {
                                
                                 echo "
                                <tr>
                                ";
                                if (($has[1]>=0) && ($has[1]<50)) {
                                    echo "<td>kurang</td>";
                                    $jum=2;
                                }
                                if (($has[1]>=50) && ($has[1]<80)) {
                                    echo "<td>cukup</td>";
                                    $jum=3;
                                }
                                if (($has[1]>=80) && ($has[1]<=100)) {
                                    echo "<td>baik</td>";
                                    $jum=4;
                                }
                                 
                                    
                               echo "    
                                </tr>
                                ";
                            }
                       ?>
                       <p>Keterangan:</a></p>
                       <p>kurang    = 0-49</a></p>
                       <p>cukup     = 50-79</a></p>
                       <p>baik          = 80-100</a></p>
                    </tbody>
                     <input type="hidden" name="jumlah" value="<?php echo $jum; ?>"></input>
                   <p><button type="submit">LIST HASIL SMART</button></p>
                   </form>
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