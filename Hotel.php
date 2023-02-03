<?php
class Hotel {
    private string $nom;
    private int $nb_etoiles;
    private string $rue;
    private string $cp;
    private string $ville;
    private array $nb_chambres;
    private array $listeReservations;

    public function __construct(string $nom, string $rue, string $cp, string $ville, $nb_etoiles) {
        $this->nom = $nom;
        $this->nb_etoiles = $nb_etoiles;
        $this->rue = $rue;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->nb_chambres = [];
        $this->listeReservations = [];
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getRue() {
        return $this->rue;
    }

    public function setRue(string $rue) {
        $this->rue = $rue;
    }

    public function getCp() {
        return $this->cp;
    }

    public function setCp(string $cp) {
        $this->cp = $cp;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille(string $ville) {
        $this->ville = $ville;
    }

    public function getnbChambres() {
        return $this->nb_chambres;
    }

    public function getListeReservations() {
        return $this->listeReservations;            //possible mais echo $this->getListeReservations renverra une erreur.
    }

    public function ajouterChambre(Chambre $chambre) {
        $this->nb_chambres[] = $chambre;
    }

    public function getReservees() {
        $nb = 0;
        foreach ($this->nb_chambres as $chambre) {
            if($chambre->getEtat() == "Réservé")        //Ayant changé l'état on peut récupérer les réservations de l'hotel spécifié.
             $nb++;
        }
        return $nb;
    }

    public function getDisponibles() {
        return count($this->nb_chambres) - $this->getReservees();
    }

    public function afficherInfos() {
        return $this."$this->rue $this->cp $this->ville<br>Nombre de chambres : ".count($this->nb_chambres)."<br>Nombre de chambres réservées : ".$this->getReservees()."<br>Nombre de chambres disponibles : ". $this->getDisponibles();
    }

    public function ajouterReservation(Reservation $reservation) {
        $this->listeReservations[] = $reservation;
    }

    public function __toString() {
        return "$this->nom ".str_repeat("*", $this->nb_etoiles). " $this->ville<br>";
    }
}
?>