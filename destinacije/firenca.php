<!DOCTYPE html>
<html>
<head>
    <title>Firenca</title>
    <link rel="stylesheet" href="../css/destinacija.css">
    <style>
        table {border-collapse: collapse; width: 80%; margin: 20px auto;}
        th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}
        th {background-color: #4caf50; color: white;}
        form {padding: 10px; margin: 10px auto; text-align: center;}
        button {padding: 7px; background-color: #4caf50; color: white;border: #4caf50;border-radius: 10%;}
    </style>
</head>
<body>
    <header>
        <h1>SHABTravel</h1>
    </header>

    <nav>
        <a href="../pocetna.php">Početna</a>
        <a href="../ponuda.php">Katalog</a>
        <a href="../rezervacije.php">Rezervacije</a>
        <a href="../profil.php">Izmenite podatke</a>
        <a href="../logout.php">Logout</a>
    </nav>

    <?php
    session_start();
    require_once("../connection.php");

    if (!isset($_SESSION['JMBG'])) {
        header("Location: ../login.php");
        exit();
    }

    $upit = "SELECT sifra_kataloga, hotel.naziv_hotela, hotel.grad, datum_polaska, datum_dolaska, cena
            FROM katalog
            INNER JOIN hotel
            ON hotel.sifra_hotela = katalog.sifra_hotela
            WHERE sifra_kataloga NOT IN (SELECT sifra_kataloga
                                        FROM rezervacija) AND hotel.grad = 'FIRENCA';";
             
    $rezultat = mysqli_query($db, $upit);

    if (mysqli_num_rows($rezultat) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Sifra kataloga</th>";
        echo "<th>Naziv hotela</th>";
        echo "<th>Destinacija</th>";
        echo "<th>Datum polaska</th>";
        echo "<th>Datum dolaska</th>";
        echo "<th>Cena</th>";
        echo "<th>Rezervisi</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($rezultat)) {
            $sifra_kataloga = $row[0];
            $naziv_hotela = $row[1];
            $grad = $row[2];
            $datum_polaska = $row[3];
            $datum_dolaska = $row[4];
            $cena = $row[5];

            echo "<tr>";
            echo "<td>$sifra_kataloga</td>";
            echo "<td>$naziv_hotela</td>";
            echo "<td>$grad</td>";
            echo "<td>$datum_polaska</td>";
            echo "<td>$datum_dolaska</td>";
            echo "<td>$cena</td>";
            echo "<td>";
            echo "<form action='firenca.php' method='post'>";
            echo "<input type='hidden' name='sifra_kataloga' value='$sifra_kataloga'>";
            echo "<button type='submit' name='rezervisi' class='rezervisi'>Rezervisi</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nema dostupnih ponuda za Firencu!";
    }

    if (isset($_SESSION['JMBG']) && isset($_POST['sifra_kataloga'])) {
        $JMBG = $_SESSION['JMBG'];
        $sifra_kataloga = mysqli_real_escape_string($db, $_POST['sifra_kataloga']);
        $sifra_rezervacije = uniqid();

        $upit_rezervacija = "INSERT INTO rezervacija (sifra_rezervacije, JMBG, sifra_kataloga) VALUES ('$sifra_rezervacije', '$JMBG', '$sifra_kataloga')";
        $rezultat_rezervacija = mysqli_query($db, $upit_rezervacija);

        if ($rezultat_rezervacija) {
            echo "<script>alert('Rezervacija je uspešno kreirana!');</script>";
            echo "<script>window.location.href = 'firenca.php?message=success'</script>";
        } else {
            echo "<script>alert('Došlo je do greške prilikom rezervacije.');</script>";
        }
    }
    ?>

</body>
</html>
