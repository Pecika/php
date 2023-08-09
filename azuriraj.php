<?php

require_once 'model/Putovanje.php';

if (isset($_GET['id'])) {
    $putovanje_id = $_GET['id'];
    $putovanje = Putovanje::getPutovanjeById($putovanje_id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ažuriraj putovanje</title>
</head>
<body>
    <h1>Ažuriraj putovanje</h1>
    <form id="forma-azuriraj" method="post">
        <input type="text" name="putovanje_id" value="<?php echo $putovanje['putovanje_id']; ?>">
        <label for="destinacija">Destinacija:</label>
        <input type="text" name="destinacija" value="<?php echo $putovanje['destinacija']; ?>" required>
        <br>
        <label for="datum">Datum:</label>
        <input type="date" name="datum" value="<?php echo $putovanje['datum']; ?>" required>
        <br>
        <label for="trajanje_putovanja">Trajanje putovanja:</label>
        <input type="number" name="trajanje_putovanja" value="<?php echo $putovanje['trajanje_putovanja']; ?>" required>
        <br>
        <label for="cena">Cena:</label>
        <input type="number" name="cena" value="<?php echo $putovanje['cena']; ?>" required>
        <br>
        <input type="submit" value="Ažuriraj">
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
