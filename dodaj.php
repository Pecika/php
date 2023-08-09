<?php
 
require_once 'model/Korisnik.php';
 
$korisnici = Korisnik::getKorisnici();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Unos novog putovanja</title>
</head>
<body>
    <h1>Unos novog putovanja</h1>
    <form id="form-putovanje" method="POST">
        <div>
            <label for="destinacija">Destinacija:</label>
            <input type="text" id="destinacija" name="destinacija" required>
        </div>
        <div>
            <label for="datum">Datum:</label>
            <input type="date" id="datum" name="datum" required>
        </div>
        <div>
            <label for="trajanje_putovanja">Trajanje putovanja:</label>
            <input type="number" id="trajanje_putovanja" name="trajanje_putovanja" required>
        </div>
        <div>
            <label for="cena">Cena:</label>
            <input type="number" id="cena" name="cena" required>
        </div>
        <div>
            <label for="korisnik_id">Korisnik ID:</label>
            <select id="korisnik_id" name="korisnik_id" required>
                <option value="" disabled selected>Izaberi korisnika</option>
                <?php foreach ($korisnici as $korisnik): ?>
                    <option value="<?php echo $korisnik['korisnik_id']; ?>"><?php echo $korisnik["ime"] . " " . $korisnik["prezime"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
        <button type="submit"  >Dodaj putovanje</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/main.js"></script>
</body>
</html>
