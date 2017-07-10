<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "codewell_duotonal";

//membuka koneksi ke mysql
$mysqli = new mysqli($host,$username,$password,$database);

//jika koneksi gagal
if($mysqli->connect_errno){
    echo "Server bermasalah";
}