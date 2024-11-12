<?php
session_start();
require_once("connection.php");

$obavezna_polja = ['ime_klijenta', 'prezime_klijenta', 'adresa_klijenta', 'broj_telefona', 'email', 'JMBG', 'lozinka'];

if (!empty(array_filter($_POST, 'trim'))) {
    $popunjena_polja = array_keys(array_filter($_POST, 'trim'));

    if (count(array_intersect($obavezna_polja, $popunjena_polja)) === count($obavezna_polja)) {

        $ime_klijenta = mysqli_real_escape_string($db, $_POST['ime_klijenta']);
        $prezime_klijenta = mysqli_real_escape_string($db, $_POST['prezime_klijenta']);
        $adresa_klijenta = mysqli_real_escape_string($db, $_POST['adresa_klijenta']);
        $broj_telefona = mysqli_real_escape_string($db, $_POST['broj_telefona']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $JMBG = mysqli_real_escape_string($db, $_POST['JMBG']);
        $lozinka = mysqli_real_escape_string($db, $_POST['lozinka']);

        $_SESSION['ime_klijenta'] = $ime_klijenta;
        $_SESSION['prezime_klijenta'] = $prezime_klijenta;
        $_SESSION['adresa_klijenta'] = $adresa_klijenta;
        $_SESSION['email'] = $email;
        $_SESSION['JMBG'] = $JMBG;
        $_SESSION['lozinka'] = $lozinka;
        $_SESSION['broj_telefona'] = $broj_telefona;

        $upit = "INSERT INTO `klijent`(`ime_klijenta`, `prezime_klijenta`, `adresa_klijenta`, `broj_telefona`, `email`, `JMBG`, `lozinka`) 
        VALUES ('$ime_klijenta','$prezime_klijenta','$adresa_klijenta','$broj_telefona','$email','$JMBG','$lozinka')";

        $rezultat = mysqli_query($db, $upit);

        if ($rezultat) {
            echo "Uspesno ste se registrovali";
            header("Location: login.php");
            exit();
        } else {
            echo "Došlo je do greške prilikom registrovanja.";
        }
    } else {
        $greska = "Niste popunili sva obavezna polja.";
    }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
<link rel="stylesheet" href="css/registracija.css">
</head>
<body>
    <form action="registracija.php" method="post">
        <h1>Registruj se</h1>
        <table>
            <tr>
                <td><label for="ime_klijenta">Ime: </label></td>
                <td><input type="text" name="ime_klijenta"></td>
            </tr>
            <tr>
                <td><label for="prezime_klijenta">Prezime: </label></td>
                <td><input type="text" name="prezime_klijenta"></td>
            </tr>
            <tr>
                <td><label for="adresa_klijenta">Adresa: </label></td>
                <td><input type="text" name="adresa_klijenta"></td>
            </tr>
            <tr>
                <td><label for="broj_telefona">Broj telefona: </label></td>
                <td><input type="number" name="broj_telefona"></td>
            </tr>
            <tr>
                <td><label for="email">E-mail: </label></td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><label for="JMBG">JMBG: </label></td>
                <td><input type="text" name="JMBG"></td>
            </tr>
            <tr>
                <td><label for="lozinka">Lozinka: </label></td>
                <td><input type="password" name="lozinka"></td>
            </tr>
        </table>
        <input type="submit" value="Registruj se">
        <a href="login.php"><input type="button" value="Povratak na login" name="povratak_btn"></a>

        <?php if(isset($greska)): ?>
            <p class="greska"><?php echo $greska; ?></p>
        <?php endif ?>

    </form>
</body>
</html>
