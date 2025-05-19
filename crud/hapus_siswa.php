<?php 
include 'config.php';

$id = $_GET['id'];

$query = "delete from `siswa` where `id` = '$id'";
$result = mysqli_query($conn, $query);

    if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}

else{
    header('location: index.php?massage=success');
}       
                    

?>