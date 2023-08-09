<?php
require_once __DIR__ . '/../DatabaseBroker.php';

class Korisnik {
    private $korisnik_id;
    private $ime;
    private $prezime;
    private $email;
    
    public function __construct($ime, $prezime, $email) {
      $this->ime = $ime;
      $this->prezime = $prezime;
      $this->email = $email;
    }
    
    public function setKorisnikId($korisnik_id) {
      $this->korisnik_id = $korisnik_id;
    }
    
    public function getKorisnikId() {
      return $this->korisnik_id;
    }
    
    public function getIme() {
      return $this->ime;
    }
    
    public function getPrezime() {
      return $this->prezime;
    }
    
    public function getEmail() {
      return $this->email;
    }




    public static function getKorisnici() {
        $conn = DatabaseBroker::getConnection();
        $sql = "SELECT korisnik_id, ime, prezime FROM korisnik";
        $result = $conn->query($sql);

        $korisnici = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $korisnik = [
                    "korisnik_id" => $row["korisnik_id"],
                    "ime" => $row["ime"],
                    "prezime" => $row["prezime"]
                ];

                $korisnici[] = $korisnik;
            }
        }

  

        return $korisnici;
    }


}





?>