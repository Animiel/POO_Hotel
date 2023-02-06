<?php
class Client {
    private string $nom;
    private string $prenom;
    private array $listeReservations;

    public function __construct(string $nom, string $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->listeReservations = [];
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }

    public function ajouterReservation(Reservation $reservation) {
        $this->listeReservations[] = $reservation;
    }

    public function totalPrix() {
        $total = 0;
        foreach ($this->listeReservations as $reservation) {
            $total += $reservation->getChambre()->getPrix() * $reservation->dureeSejour($reservation->getDateArrivee(), $reservation->getDateFin());
        }
        return $total;
    }

    public function afficherReservation() {
        $result = "<strong>Réservations de $this</strong><br><span>".count($this->listeReservations)." réservations</span><br>";
        foreach ($this->listeReservations as $reservation) {
            $result .= "<strong>".($reservation->getChambre())->getHotel()."</strong> / ".$reservation->getChambre()." (".($reservation->getChambre())->getNbLits()." lits - ".($reservation->getChambre())->getPrix()."€ - Wifi: ".($reservation->getChambre())->getWifi().") du ".$reservation->getDateArrivee()." au ".$reservation->getDateFin()."<br>";
        }
        $result .= "Total : ".$this->totalPrix()."€<br>";
        return $result;
    }

    public function __toString() {
        return "$this->nom $this->prenom";
    }
}
?>