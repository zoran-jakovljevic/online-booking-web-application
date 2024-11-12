<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['JMBG'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['JMBG'])) {
        $JMBG = $_SESSION['JMBG'];
        $adresa_klijenta = mysqli_real_escape_string($db, $_POST['adresa_klijenta']);
        $broj_telefona = mysqli_real_escape_string($db, $_POST['broj_telefona']);
        $email = mysqli_real_escape_string($db, $_POST['email']);

        $update_upit = "UPDATE klijent SET";

        if (!empty($adresa_klijenta)) {
            $update_upit .= " adresa_klijenta='$adresa_klijenta',";
        }

        if (!empty($broj_telefona)) {
            $update_upit .= " broj_telefona='$broj_telefona',";
        }

        if (!empty($email)) {
            $update_upit .= " email='$email',";
        }

        $update_upit = rtrim($update_upit, ',');
        $update_upit .= " WHERE JMBG='$JMBG'";

        $update_rezultat = mysqli_query($db, $update_upit);

        if ($update_rezultat) {
            echo "<script>window.onload = function() { showNotification('Podaci su uspešno ažurirani', 'tacno'); }</script>";
        } else {
            $greska_poruka = mysqli_real_escape_string($db, mysqli_error($db));
            echo "<script>window.onload = function() { showNotification('Došlo je do greške: $greska_poruka', 'greska'); }</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Izmenite lične podatke</title>
    <link rel="stylesheet" href="css/profil.css">
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

<h2 class="shabtravel">Izmenite lične podatke</h2>

<form action="profil.php" method='post'>
    <label for="adresa_klijenta">Unesite novu adresu: </label>
    <input type="text" name='adresa_klijenta'><br>
    <label for="broj_telefona">Unesite novi broj telefona: </label>
    <input type="text" name='broj_telefona'><br>
    <label for="email">Unesite novi E-mail: </label>
    <input type="text" name='email'><br>
    <input type="submit" name='izmeni' value='Izmeni'>
    <p id='notification'></p>
</form>

<table>
    <tr>
        <th>JMBG</th>
        <th>Ime klijenta</th>
        <th>Prezime klijenta</th>
        <th>Adresa klijenta</th>
        <th>Broj telefona</th>
        <th>E-mail</th>
    </tr>
    <?php
    if (isset($_SESSION['JMBG'])) {
        $JMBG = $_SESSION['JMBG'];
        $podaci1 = "SELECT * FROM klijent WHERE JMBG = '$JMBG'";
        $rezultat2 = mysqli_query($db, $podaci1);

        if (mysqli_num_rows($rezultat2) > 0) {
            while ($row = mysqli_fetch_array($rezultat2)) {
                $JMBG = $row[0];
                $ime_klijenta = $row[1];
                $prezime_klijenta = $row[2];
                $adresa_klijenta = $row[3];
                $broj_telefona = $row[4];
                $email = $row[5];
    
                print "<tr>";
                print "<td>$JMBG</td>";
                print "<td>$ime_klijenta</td>";
                print "<td>$prezime_klijenta</td>";
                print "<td>$adresa_klijenta</td>";
                print "<td>$broj_telefona</td>";
                print "<td>$email</td>";
                print "</tr>";
            }
        }
    }
    ?>
</table>

<script>
    function showNotification(message, type) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.className = type;
}
</script>

</body>
</html>
