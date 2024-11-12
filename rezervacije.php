<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rezervacije</title>
<link rel="stylesheet" href="css/rezervacije.css">
</head>
<body>

<header>
        <h1>SHABTravel</h1>
    </header>

<nav>
    <a href="pocetna.php">Početna</a>
    <a href="ponuda.php">Katalog</a>
    <a href="rezervacije.php">Rezervacije</a>
    <a href="profil.php">Izmenite podatke</a>
    <a href="logout.php">Logout</a>
</nav>

    <h1 class="shabtravel">Rezervacije</h1>

    <?php
require_once('connection.php');
session_start();

if (!isset($_SESSION['JMBG'])) {
    header("Location: login.php");
    exit();
}

if(isset($_SESSION['JMBG'])) {
    $JMBG = $_SESSION['JMBG'];

    $query = "SELECT sifra_rezervacije, sifra_kataloga FROM rezervacija WHERE JMBG = '$JMBG'";
    $rezultat = mysqli_query($db, $query);

    if(mysqli_num_rows($rezultat) > 0) {
        print "<table>";
        print "<tr><th>Sifra rezervacije</th><th>Sifra kataloga</th><th>Akcije</th></tr>";

        while($row = mysqli_fetch_array($rezultat)) {
            $sifra_rezervacije = $row[0];
            $sifra_kataloga = $row[1];

            print "<tr>";
            print "<td>$sifra_rezervacije</td>";
            print "<td>$sifra_kataloga</td>";
            print "<td>";
            print "<form class='klasa' action='obrisi_rezervaciju.php' method='post'>";
            print "<input type='hidden' name='sifra_rezervacije' value='$sifra_rezervacije' />";
            print "<input type='hidden' name='sifra_kataloga' value='$sifra_kataloga'>";
            print "<input type='submit' name='otkazi' value='Otkazi rezervaciju'/>";
            print "</form>";
            print "</td>";
            print "</tr>";
        }

        print "</table>";
    } else {
        print "<p style='color:red; text-align:center;' >Osoba sa JMBG: $JMBG nema ništa rezervisano</p>";
    }
}
?>


</body>
</html>
