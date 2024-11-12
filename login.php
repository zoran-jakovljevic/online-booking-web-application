<?php
session_start();
require_once("connection.php");

if (!empty(filter_input(INPUT_POST, 'email') && filter_input(INPUT_POST, 'lozinka'))) {
    $email = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'email'));
    $lozinka = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'lozinka'));

    $upit = "SELECT JMBG
             FROM klijent
             WHERE email = '$email' and lozinka = '$lozinka'";

    $rezultat = mysqli_query($db, $upit);

    if (mysqli_num_rows($rezultat) == 1) {
        $row = mysqli_fetch_array($rezultat);
        $_SESSION['JMBG'] = $row['JMBG'];
        header("Location: pocetna.php");
    } else {
        $poruka = "Pogrešno uneta email adresa ili lozinka";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prijavi se</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1>Prijavi se</h1>
        <label for="email">Email:</label>
        <input type="text" name="email">

        <label for="lozinka">Lozinka:</label>
        <input type="password" name="lozinka">
        
        <input type="submit" name="prijava" value="Prijavi se">
        
        <a href="registracija.php">
            <input type="button" name="registracija" value="Registruj se">
        </a>

        <?php if (isset($poruka)): ?>
            <p class="error"><?php echo $poruka; ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
