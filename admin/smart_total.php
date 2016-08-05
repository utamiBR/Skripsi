<?
date_default_timezone_set('Asia/Jakarta');

mysqli_query($con,"truncate smart_total");
$id_transformasitesting = $_GET['id_transformasitesting'];
mysqli_query($con,"update transformasi_testing SET onclicksmart='1' where id_transformasitesting='".$id_transformasitesting."'");
$getId=(mysqli_query($con,"select bidang, pelanggan, proyek, total_harga_jual from transformasi_testing where id_transformasitesting='".$id_transformasitesting."'"));

while ($row = mysqli_fetch_object($getId)){

    //$array[]=$row;
    
    $array[0] = $row->bidang;
    $array[1] = $row->pelanggan;
    $array[2] = $row->proyek;
    $array[3] = $row->total_harga_jual;
    
}

//print_r($array);
$arr = $array;
$n = sizeof($array);
for ($i=0; $i < $n; $i++) { 
    for ($j=$n-1; $j > $i; $j--) { 
        if($arr[$j-1] < $arr[$j])
        {
            $temp = $arr[$j-1];
            $arr[$j-1] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
}
//echo "MAKSIMAL = ".$arr[0];
//echo "MINIMAL = ".$arr[3];

for ($i=0; $i < $n; $i++) { 
    $jum = (($arr[0]-$array[$i])/($arr[0]-$arr[3]))*100;
    $arr_jum[] = $jum;
}

//print_r($arr_jum);


$jum_tot = ($arr_jum[0]*0.4)+($arr_jum[1]*0.3)+($arr_jum[2]*0.2)+($arr_jum[3]*0.1);

//print_r($arr_jum_tot);

//echo "</br>";
   
  mysqli_query($con,"insert into smart_total (total) values (".$jum_tot.")");

?>



<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data SMART TOTAL</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Total</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                       <?php

                           

                            $qu=mysqli_query($con,"select * from smart_total");
                            
                            while($has=mysqli_fetch_row($qu))
                            {
                                echo "
                                <tr>
                                   
                                    <td>$has[1]</td>
                                    
                                </tr>
                                ";
                            }

                       ?>
                       
                    </tbody>
                <p><a href='index.php?page=hasil_smart'><button>PROSES</button></a></p>
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