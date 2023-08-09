<?php

        require_once '../model/Putovanje.php';

        $putovanje_id = filter_input(INPUT_POST, 'putovanje_id', FILTER_VALIDATE_INT);

        $destinacija = filter_input(INPUT_POST, 'destinacija', FILTER_SANITIZE_SPECIAL_CHARS);
    
        $cena = filter_input(INPUT_POST, 'cena', FILTER_VALIDATE_FLOAT);
        $datum = filter_input(INPUT_POST, 'datum', FILTER_SANITIZE_SPECIAL_CHARS);
        $trajanje_putovanja = filter_input(INPUT_POST, 'trajanje_putovanja', FILTER_VALIDATE_INT);

        if ($putovanje_id && $destinacija  && $cena && $datum && $cena) {
            $p = new Putovanje($putovanje_id ,$destinacija, $datum, $trajanje_putovanja, $cena, null);
            $status = Putovanje::azurirajPutovanje($p);
          
            echo $status ? 'Success' : 'Failed';
        }
?>
