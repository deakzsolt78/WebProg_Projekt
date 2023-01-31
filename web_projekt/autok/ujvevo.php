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
            <li><a href="ujvevo.php">ügyfél hozaadása</a></li>
            <li><a href="ujkocsi.php">auto tábla bövitése</a></li>

        </ul>
        <div class="menu">
            <ul>
                <li><a href="#">menu</a>
                    <ul>
                        <li><a href="index.php">FŐOLDAL</a></li>
                        <li><a href="ujvevo.php">ügyfél hozaadása</a></li>
                        <li><a href="ujkocsi.php">auto tábla bövitése</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="oldal1">
    <h1>Ügyfél hozáadása</h1>

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
<form method="post" action="" enctype="multipart/form-data"> 
    <label for="nev"> <p>Név:</p>
        <input type="text" name="nev"><br>
    </label>
    <br>
    <br>
    <label for="id"> <p>ID:</p>
        <input type="number" name="id"><br>
    </label>
    <br>
    <button>
    <input type="submit" name="submit" value="Ügyfél hozaadása!"/>
    </button>
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
            echo '<p>A tulajdonos sikeresen hozaadva!</p>';
        } else {
            echo '<p>MySQL Hiba</p>' . $conn->error;
        }
    }
    else echo '<p>Ez az ID már használva van!</p>';
}
?>
</div>
</body>
