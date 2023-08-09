<?php 
// Učitaj DatabaseBroker klasu
require_once __DIR__ . '/../DatabaseBroker.php';
 
// Proveri da li je zahtev napravljen sa HTTP POST metodom
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Učitaj JSON podatke iz tela zahteva
  $data = json_decode(file_get_contents('php://input'));

  // Proveri da li su JSON podaci ispravni
  if (isset($data->putovanjeId)) {
    // Napravi konekciju sa bazom
    $conn = DatabaseBroker::getConnection();

    // Pripremi SQL upit za brisanje putovanja sa datim ID-jem
    $sql = "DELETE FROM putovanje WHERE putovanje_id = ?";

    // Izvrši SQL upit koristeći parametar sa vrednošću ID-ja putovanja
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $data->putovanjeId);
    $stmt->execute();

    // Proveri da li je brisanje uspešno izvršeno
    if ($stmt->affected_rows > 0) {
      // Ako je brisanje uspešno, vratite JSON odgovor koji sadrži informaciju o uspehu
      echo json_encode(['success' => true]);
      exit;
    }
  }
}

// Ako je došlo do greške ili ako JSON podaci nisu ispravni, vratite JSON odgovor koji sadrži informaciju o grešci
echo json_encode(['success' => false, 'message' => 'Došlo je do greške prilikom brisanja putovanja.']);
?>