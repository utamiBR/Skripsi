<?
date_default_timezone_set('Asia/Jakarta');

$id_transformasitesting = $_GET['id_transformasitesting'];

mysqli_query($con,"update transformasi_testing SET onclickknn='1' where id_transformasitesting='".$id_transformasitesting."'");

mysqli_query($con,"truncate knn_jarak");
$getId=(mysqli_query($con,"select bidang from transformasi_testing where id_transformasitesting='".$id_transformasitesting."'"));
$getId2=(mysqli_query($con,"select bidang from transformasi_training"));
while ($row = mysqli_fetch_object($getId)){
    
    $array[] = $row->bidang;
    
}
while ($row2 = mysqli_fetch_object($getId2)){
    
    $array2[] = $row2->bidang;
}

for ($i=0; $i < count($array); $i++) { 
    for ($i1=0; $i1 < count($array2); $i1++) { 
        $temp = 0;
        $temp = $array[$i]-$array2[$i1];
        $hasil1[] = $temp;
    }

}

$getId3=(mysqli_query($con,"select pelanggan from transformasi_testing where id_transformasitesting='".$id_transformasitesting."'"));
$getId4=(mysqli_query($con,"select pelanggan from transformasi_training"));
while ($row3 = mysqli_fetch_object($getId3)){
    
    $array3[] = $row3->pelanggan;
}
while ($row4 = mysqli_fetch_object($getId4)){
    
    $array4[] = $row4->pelanggan;
}



for ($i=0; $i < count($array3); $i++) { 
    for ($i1=0; $i1 < count($array4); $i1++) { 
        $temp = 0;
        $temp = $array3[$i]-$array4[$i1];
        $hasil2[] = $temp;
    }
}


$getId5=(mysqli_query($con,"select proyek from transformasi_testing where id_transformasitesting='".$id_transformasitesting."'"));
$getId6=(mysqli_query($con,"select proyek from transformasi_training"));
while ($row5 = mysqli_fetch_object($getId5)){
    
    $array5[] = $row5->proyek;
}
while ($row6 = mysqli_fetch_object($getId6)){
    
    $array6[] = $row6->proyek;
}



for ($i=0; $i < count($array5); $i++) { 
    for ($i1=0; $i1 < count($array6); $i1++) { 
        $temp = 0;
        $temp = $array5[$i]-$array6[$i1];
        $hasil3[] = $temp;
    }
}


$getId7=(mysqli_query($con,"select total_harga_jual from transformasi_testing where id_transformasitesting='".$id_transformasitesting."'"));
$getId8=(mysqli_query($con,"select total_harga_jual from transformasi_training"));
while ($row7 = mysqli_fetch_object($getId7)){
    
    $array7[] = $row7->total_harga_jual;
}
while ($row8 = mysqli_fetch_object($getId8)){
    
    $array8[] = $row8->total_harga_jual;
}



for ($i=0; $i < count($array7); $i++) { 
    for ($i1=0; $i1 < count($array8); $i1++) { 
        $temp = 0;
        $temp = $array7[$i]-$array8[$i1];
        $hasil4[] = $temp;
    }
}


for ($i=0; $i < count($array8); $i++) { 
    $nilai = 0;
    $nilai = sqrt(pow($hasil1[$i], 2) + pow($hasil2[$i], 2)+ pow($hasil3[$i], 2)+ pow($hasil4[$i], 2));
    $jarak[$i] = $nilai;
}

for ($k=0; $k < count($jarak); $k++) { 
   
    $insert = mysqli_query($con,"insert into knn_jarak (jarak) values ($jarak[$k])");
}

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
                    <tbody>
                       <?php

                           

                            $qu=mysqli_query($con,"select training.id_training, knn_jarak.jarak, training.kelayakan from knn_jarak inner join training using (id_training)");
                            
                            while($has=mysqli_fetch_row($qu))
                            {
                                echo "
                                <tr>
                                    <td>$has[0]</td> 
                                    <td>$has[1]</td>
                                    <td>$has[2]</td>
                                 
                                    
                                    
                                </tr>
                                ";
                            }

                       ?>
                       
                    </tbody>
                <p><a href='index.php?page=hasil_knn'><button>PROSES</button></a></p>
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