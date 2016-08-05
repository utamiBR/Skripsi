<?php
date_default_timezone_set('Asia/Jakarta');
 
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data KNN Jarak</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No Training</th>
                            <th>Jarak</th>
                            <th>Kelayakan</th>
                           
                        </tr>
                    </thead>
                    <form action="index.php?page=list_hasilknn" method="post">

                    <tbody>
                       <?php
                            $qu=mysqli_query($con,"select training.id_training, knn_jarak.jarak, training.kelayakan from knn_jarak inner join training using (id_training) order by jarak asc limit 5");
                            
                            while($has=mysqli_fetch_row($qu))
                            {
                                echo "
                                <tr>
                                    <td>$has[0]</td> 
                                    <td>$has[1]</td>
                                    <td>$has[2]</td>
                                 
                                    
                                    
                                </tr>
                                ";
                                if ($has[2]=="baik") {
                                    $jum = 4;
                                }
                                if ($has[2]=="cukup") {
                                    $jum = 3;
                                }
                                if ($has[2]=="kurang") {
                                    $jum = 2;
                                }
                                 $array[]=$jum;
                            }

                            
                            $key=($array[0]+$array[1]+$array[2]+$array[3]+$array[4])/5;

                            //$a=array_count_values($array);
                            //foreach ($a as $key => $val) {
                            //if($val==max($a)){
                            //$key;
                            
                        if(($key>0)&&($key<=2)){
                            $key=2;
                        }
                        if(($key>2)&&($key<=3)){
                            $key=3;
                        }
                        if(($key>3)&&($key<=4)){
                            $key=4;
                        }
                       ?>
                    </tbody>
                    <input type="hidden" name="jumlah" value="<?php echo $key; ?>"></input>
                   <p><button type="submit">LIST HASIL KNN</button></p>
                   </form>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
<script src="plugins/jQuery/jquery.min.js"></script>

<script type="text/javascript">
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