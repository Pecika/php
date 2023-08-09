<?php
require_once __DIR__ . '/../DatabaseBroker.php';

 
class Putovanje {
    private $putovanje_id;
    private $destinacija;
    private $datum;
    private $trajanje_putovanja;
    private $cena;
    private $korisnik_id;
    
    public function __construct( $putovanje_id=null, $destinacija, $datum, $trajanje_putovanja, $cena, $korisnik_id) {
      $this->destinacija = $destinacija;
      $this->datum = $datum;
      $this->trajanje_putovanja = $trajanje_putovanja;
      $this->cena = $cena;
      $this->korisnik_id = $korisnik_id;
      $this->putovanje_id = $putovanje_id;

    }
    
    public function setPutovanjeId($putovanje_id) {
      $this->putovanje_id = $putovanje_id;
    }
    
    public function getPutovanjeId() {
      return $this->putovanje_id;
    }
    
    public function getDestinacija() {
      return $this->destinacija;
    }
    
    public function getDatum() {
      return $this->datum;
    }
    
    public function getTrajanjePutovanja() {
      return $this->trajanje_putovanja;
    }
    
    public function getCena() {
      return $this->cena;
    }
    
    public function getKorisnikId() {
      return $this->korisnik_id;
    }




    public static function getPutovanja() {
        $conn = DatabaseBroker::getConnection();
        $sql = "SELECT p.*, k.ime, k.prezime, k.email FROM putovanje p JOIN korisnik k ON p.korisnik_id = k.korisnik_id";
        $result = $conn->query($sql);
    
        $putovanja = [];
    
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $putovanje = [
              "putovanje_id" => $row["putovanje_id"],
              "destinacija" => $row["destinacija"],
              "datum" => $row["datum"],
              "trajanje_putovanja" => $row["trajanje_putovanja"],
              "cena" => $row["cena"],
              "korisnik_id" => $row["korisnik_id"],
              "ime" => $row["ime"],
              "prezime" => $row["prezime"],
              "email" => $row["email"]
            ];
    
            $putovanja[] = $putovanje;
          }
        }
 
    
        return $putovanja;
      }

      public static function dodajPutovanje($putovanje) {
        $conn = DatabaseBroker::getConnection();
        $destinacija = $putovanje->getDestinacija();
        $datum = $putovanje->getDatum();
        $trajanje = $putovanje->getTrajanjePutovanja();
        $cena = $putovanje->getCena();
        $korisnik_id = $putovanje->getKorisnikId();
    
        $sql = "INSERT INTO putovanje (destinacija, datum, trajanje_putovanja, cena, korisnik_id) 
                VALUES ('$destinacija', '$datum', $trajanje, $cena, $korisnik_id)";
    
        $result = $conn->query($sql);
 
    
        if (!$result) {
            throw new Exception(" Klasa putovanje Greška prilikom dodavanja putovanja u bazu: " . $conn->error);
        }
        return  $result;
    }   
    
    
    

    public static function getPutovanjeById($id) {
        $conn = DatabaseBroker::getConnection();
        $sql = "SELECT  *  FROM putovanje WHERE putovanje_id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $putovanje = [
                "putovanje_id" => $row["putovanje_id"],
                "destinacija" => $row["destinacija"],
                "datum" => $row["datum"],
                "trajanje_putovanja" => $row["trajanje_putovanja"],
                "cena" => $row["cena"],
                "korisnik_id" => $row["korisnik_id"],
 
            ];
    
            return $putovanje;
        } else {
            return null;
        }
    }
    

    public static function azurirajPutovanje($putovanje) {
        $conn = DatabaseBroker::getConnection();
        $putovanje_id = $putovanje->getPutovanjeId();
        
        $destinacija = $putovanje->getDestinacija();
        $datum = $putovanje->getDatum();
        $trajanje = $putovanje->getTrajanjePutovanja();
        $cena = $putovanje->getCena();
        
    
        $sql = "UPDATE putovanje SET destinacija = '$destinacija', datum = '$datum', trajanje_putovanja = $trajanje, cena = $cena WHERE putovanje_id = $putovanje_id";
      
        $result = $conn->query($sql);
       
        if (!$result) {
            throw new Exception("Klasa putovanje Greška prilikom ažuriranja putovanja u bazi: " . $conn->error);
        }
        return $result;
    }
    







}







?>