<?php

//Kapcsolódás MySQL-re
session_start();
$server = "localhost";
$user = "root";
$password = "";
$dbnamesql = "autokereskedes";
$conn = new mysqli($server, $user, $password, $dbnamesql);
if ($conn->connect_error) {
    die("Kapcsolati Hiba: " . $conn->connect_error);
}

//SQL tábla kiíratása
$sql = "SELECT marka, model, allapot, tulajdonos_id FROM kocsik";
$result = $conn->query($sql);

echo 'MySQL táblázat:<table border= "5px", bgcolor="lightblue">'
    . '<tr><th>Automarka</th><th>Model</th><th>Autoallapota</th><th>Tulajdonos_id</th><th>Törlés</th></tr>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["marka"] . "</td><td>" . $row["model"] . "</td><td>" . $row["allapot"] . "</td><td>" . $row["tulajdonos_id"] . "</td><td><a href='torles.php?marka=" . $row["marka"] . "'>Törlés</a></td></tr>";
    }
}
echo "</table>";

//Második SQL tábla kiíratása
$sql2 = "SELECT * FROM tulajdonos";
$result2 = $conn->query($sql2);

echo '<br>MySQL táblázat:<table border= "5px"BGCOLOR="lightblue">'
    . '<tr><th>Id</th><th>Név</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nev"] . "</tr>";
    }
}
echo "</table>";

$conn->close();
echo '<br>';
//Opciók
echo '<a href="ujvevo.php">Új vevo hozaadasa</a><br><a href="ujkocsi.php">Új kocsi hozaadasa</a><br><br>';
