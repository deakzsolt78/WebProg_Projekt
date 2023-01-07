<?php
//Kapcsolódás MySQL-re
session_start();
$server = "localhost";
$user = "root";
$password = "";
$dbnamesql = "autokereskedes";
$conn = new mysqli($server, $user, $password, $dbnamesql);
if ($conn->connect_error)
{
    die("Kapcsolati Hiba: " . $conn->connect_error);
}


$marka = $_GET["marka"];
$sql = "DELETE FROM kocsik WHERE marka = '". $marka ."'";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Kocsi törülve!")</script>';
    header("location: index.php");
} else {
    echo "Hiba: " . $conn->error;
}
