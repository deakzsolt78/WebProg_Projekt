<!DOCTYPE html>
<head>
    <title>Autokereskedes | Főoldal</title>
    <link rel="stylesheet" href="style/autok css.css"/>

</head>
<body>

<div class="fejlec1">
    <div class="fejlec">
        <h1>használt autó kereskedés</h1>
            <ul>
                <li><a href="index.php">FŐOLDAL</a></li>
                <li><a href="ujvevo.php">uj ügyfél hozaadása</a></li>
                <li><a href="ujkocsi.php">auto tábla bövitése</a></li>

            </ul>
            <div class="menu">
                <ul>
                    <li><a href="#">menu</a>
                        <ul>
                            <li><a href="index.php">FŐOLDAL</a></li>
                            <li><a href="ujvevo.php">uj ügyfél hozaadása</a></li>
                            <li><a href="ujkocsi.php">auto tábla bövitése</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    </div>
</div>

<div class="oldal1">
    <h1>FŐOLDAL</h1>
    <p> Használt autó kereskedésben levő ugyfeleket és autokat nyilvántartó táblázat</p>

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

echo '<p>Autok tábla:</p><table border= "5px", bgcolor="#4E516C">'
    . '<tr><th>Automarka</th><th>Model</th><th>Autoallapota</th><th>Tulajdonos_id</th><th>Törlés</th></tr>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["marka"] . "</td><td>" . $row["model"] . "</td><td>" . $row["allapot"] . "</td><td>" . $row["tulajdonos_id"] . "</td><td><a href='torles.php?marka=" . $row["marka"] . "'>Törlés</a></td></tr>";
    }
}

echo "</table><br>";

//Második SQL tábla kiíratása
$sql2 = "SELECT * FROM tulajdonos";
$result2 = $conn->query($sql2);

echo '<br><p>Ügyfelek tábla:</p><table border= "5px"BGCOLOR="#4F5C7D">'
    . '<tr><th>Id</th><th>Név</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nev"] . "</tr>";
    }
}
echo "</table>";

$conn->close();
echo '<br>';
?>
</div>
</body>
