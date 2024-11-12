<?php
require_once("connection.php");

if (isset($_POST['otkazi'])) {
    $otkazi_rezervaciju = mysqli_real_escape_string($db, $_POST['sifra_rezervacije']);
    $sifra_kataloga = mysqli_real_escape_string($db, $_POST['sifra_kataloga']);

    $delete_upit = "DELETE FROM rezervacija WHERE sifra_rezervacije = '$otkazi_rezervaciju'";
    $rezultat_brisanja = mysqli_query($db, $delete_upit);

    if ($rezultat_brisanja) {
        header("Location: rezervacije.php?message=success");
        exit();
    } else {
        print "Greška prilikom otkazivanja rezervacije.";
    }
}

?>
