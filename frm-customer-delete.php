<?php
include "config.php";
$id = $_GET['id'];

$sql = "DELETE FROM customer WHERE id = '{$id}'";

if(mysqli_query($conn, $sql)){
    echo "<script>window.location.href='list-customer.php';</script>";
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the User Record.</p>";
}

mysqli_close($conn);

?>