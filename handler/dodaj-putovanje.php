<?php
 
    require_once '../model/Putovanje.php';
    $destinacija = filter_input(INPUT_POST, 'destinacija', FILTER_SANITIZE_SPECIAL_CHARS);
    $korisnik_id = filter_input(INPUT_POST, 'korisnik_id', FILTER_VALIDATE_INT);
    $cena = filter_input(INPUT_POST, 'cena', FILTER_VALIDATE_FLOAT);
    $datum = filter_input(INPUT_POST, 'datum', FILTER_SANITIZE_SPECIAL_CHARS);
    $trajanje_putovanja = filter_input(INPUT_POST, 'trajanje_putovanja', FILTER_VALIDATE_INT);


    if ($destinacija && $korisnik_id && $cena  && $datum && $cena)  {
        

        $p = new Putovanje(null,$destinacija, $datum, $trajanje_putovanja,$cena , $korisnik_id  );
        $status = Putovanje::dodajPutovanje($p);

        echo $status ? 'Success' : 'Failed';
    }
?>