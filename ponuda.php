<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['JMBG'])) {
    header("Location: login.php");
    exit();
}

?>

<html>
    <head>
        <title>Ponuda</title>
<link rel="stylesheet" href="css/ponuda.css">
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
          <table>
            <tr>
                <th><a href="destinacije/rim.php"><img src="agencija/rim3.jpg" alt="Rim"></a></th>
                <th><a href="destinacije/bec.php"><img src="agencija/bec2.jpg" alt="Bec"></a></th>
                <th><a href="destinacije/firenca.php"><img src="agencija/firenca2.jpg" alt="Firenca"></a></th>
                <th><a href="destinacije/berlin.php"><img src="agencija/berlin2.jpg" alt="Berlin"></a></th>
            </tr>
            <tr>
                <td>Rim</td>
                <td>Bec</td>
                <td>Firenca</td>
                <td>Berlin</td>
            </tr>
            <tr>
                <th><a href="destinacije/barselona.php"><img src="agencija/barselona2.jpg" alt="Barselona"></a></th>
                <th><a href="destinacije/pariz.php"><img src="agencija/pariz4.jpg" alt="Pariz"></a></th>
                <th><a href="destinacije/istanbul.php"><img src="agencija/istanbul2.jpg" alt="Istanbul"></a></th>
                <th><a href="destinacije/budimpesta.php"><img src="agencija/budimpesta2.jpg" alt="Budimpesta"></a></th>
            </tr>
            <tr>
                <td>Barselona</td>
                <td>Pariz</td>
                <td>Istanbul</td>
                <td>Budimpesta</td>
            </tr>
          </table>
    </body>
</html>