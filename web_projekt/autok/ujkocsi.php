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
    <h1>Autó hozáadása</h1>

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
    <label for="marka"> <p>Automarka:</p>
        <input type="text" name="marka"><br>
    </label>
    <br>
    
    <label for="model"> <p>Automedl megnevezése:</p>
        <input type="text" name="model"><br>
    </label>
    <br>
    <label for="allapot"> <p>Auto állapota:</p>
        <input type="text" name="allapot"><br>
    </label>
    <br>
    <label for="tulajdonos_id"> <p>Auto tulajdonosanak az ID-ja:</p>
        <input type="number" name="tulajdonos_id"><br>
    </label>
    <br>
    <br>
    <button>
    <input type="submit" name="submit" value="Auto hozáadása!"/>
    </button>
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
                 echo'<p>Auto hozaadva!</p>' ;

            } else {
                echo '<p>MySQL Hiba </p>' . $conn->error;
            }

            $row = $result->fetch_assoc();
        } else echo '<p>Nincs ilyen ID-jü autotulajdonos!</p>';
    } else echo '<p>Hibás autotulajdonos id!</p>';

}

?>
</div>
</body>

