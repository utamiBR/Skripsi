<?php
$con=mysqli_connect('localhost','root','','spkspinti');

if(isset($_GET['del']))
$id=$_GET['del'];

if(isset($_GET['data']))
{
switch($_GET['data'])
{
    case 'list_admin':
    mysqli_query($con,"delete from admin where id='$id'");
    header("location:index.php?page=list_admin");
    break;
        
    case 'list_transaksi':
    mysqli_query($con,"delete from transaksi where id_transaksi='$id'");
    header("location:index.php?page=list_transaksi");
    break;
    
    case 'list_profil':
    mysqli_query($con,"delete from profil where id_profil='$id'");
    header("location:index.php?page=list_profil");
    break;

    case 'list_hasilknn':
    mysqli_query($con,"delete from hasil_knn where id_transaksi='$id'");
    header("location:index.php?page=list_hasilknn");
    break;

    case 'list_hasilsmart':
    mysqli_query($con,"delete from hasil_smart where id_transaksi='$id'");
    header("location:index.php?page=list_hasilsmart");
    break;

    case 'list_training':
    mysqli_query($con,"delete from training where id_training='$id'");
    header("location:index.php?page=list_training");
    break;

    case 'list_kriteria':
    mysqli_query($con,"delete from kriteria where id_kriteria='$id'");
    header("location:index.php?page=list_kriteria");
    break;

}
}
?>