<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['JMBG'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turistička Agencija</title>
<link rel="stylesheet" href="css/pocetna.css">
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

    <div class="main-container">
        <div class="description">
            <h2>Dobrodošli u SHABTravel</h2>
            <p>
                SHABTravel, vaša kapija ka nezaboravnim avanturama i putovanjima širom sveta! Uz stručnost i predanost našeg tima, garantujemo vam iskustvo koje će probuditi sva vaša čula. Otkrijte destinacije prepune čuda, doživite lokalnu kulturu u njenom punom sjaju, i stvarajte uspomene koje će trajati čitav život. Mi smo više od turističke agencije; mi smo putovanje samo za vas, prilagođeno vašim snovima. Dobrodošli u svet SHABTravel, gde avantura počinje!
            </p>
            <img src="agencija/pocetna.jpg" alt="Turistička agencija">
        </div>
    </div>
</body>

</html>
