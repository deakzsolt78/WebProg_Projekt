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
    <label for="marka"> Automarka:
        <input type="text" name="marka">
    </label>
    <br>
    <label for="model"> Automedl megnevezése:
        <input type="text" name="model">
    </label>
    <br>
    <label for="allapot"> Auto állapota:
        <input type="text" name="allapot">
    </label>
    <br>
    <label for="tulajdonos_id"> Auto tulajdonosanak az ID-ja:
        <input type="number" name="tulajdonos_id">
    </label>
    <br>
    <input type="submit" name="submit" value="Auto hozáadása!"/>
</form>';

if (!empty($_POST["marka"])  && !empty($_POST["model"]) && !empty($_POST["allapot"]) && !empty($_POST["tulajdonos_id"]))
{
    $marka = $_POST["marka"];
    $model = $_POST["model"];
    $allapot = $_POST["allapot"];
    $tulajdonos_id = $_POST["tulajdonos_id"];
    if ($tulajdonos_id > 0)
    {
        $result = mysqli_query($conn,"SELECT * FROM tulajdonos WHERE id = ". $tulajdonos_id ." ");
        if($result->num_rows > 0)
        {
            $sql = "INSERT INTO kocsik (marka , model, allapot, tulajdonos_id) VALUES ('". $marka ."', '". $model ."', '".  $allapot ."', '". $tulajdonos_id ."')";

            if ($conn->query($sql) === TRUE) {
                echo "Auto hozaadva!";
            } else {
                echo "MySQL Hiba: " . $conn->error;
            }

            $row = $result->fetch_assoc();
        } else echo "Nincs ilyen ID-jü autotulajdonos!";
    } else echo "Hibás autotulajdonos id!";

}