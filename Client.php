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

    // public function addReservation(Reservation $reservation) {
    //     $this->listeReservations[] = $reservation;
    // }

    public function __toString() {
        return "$this->nom $this->prenom";
    }
}
?>