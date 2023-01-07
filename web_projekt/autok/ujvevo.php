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

echo '
<a href=index.php>Vissza a kezdooldalra</a><br><br>
<form method="post" action="" enctype="multipart/form-data"> 
    <label for="nev"> Név:
        <input type="text" name="nev">
    </label>
    <br>
    <label for="id"> ID:
        <input type="number" name="id">
    </label>
    <br>
    <input type="submit" name="submit" value="Tulajdonos hozaadása!"/>
</form>';

if (!empty($_POST["nev"])  && !empty($_POST["id"]))
{
    $nev = $_POST["nev"];
    $id = $_POST["id"];
    $sql = "INSERT INTO tulajdonos (nev, id) VALUES ('". $nev ."', '". $id ."')";

    $result = mysqli_query($conn,"SELECT * FROM tulajdonos WHERE id = ". $id ." ");
    if($result->num_rows == 0)
    {
        if ($conn->query($sql) === TRUE) {
            echo "A tulajdonos sikeresen hozaadva!";
        } else {
            echo "MySQL Hiba: " . $conn->error;
        }
    }
    else echo "Ez az ID már használva van!";
}