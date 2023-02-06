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

    public function ajouterChambre(Chambre $chambre) {
        $this->nb_chambres[] = $chambre;
    }

    public function afficherChambre() {
        $result = "<table><caption>Statuts des chambres de <strong>$this</strong></caption>
        <tr>
            <th>CHAMBRE</th>
            <th>PRIX</th>
            <th>WIFI</th>
            <th>ETAT</th>
        </tr>
        <tbody>";
        foreach ($this->nb_chambres as $chambre) {
            $result .= "<tr><td><strong>Chambre ".$chambre->getNumero()."</strong><br><small>La chambre compte ".$chambre->getNbLits()." lits.</small></td><td>".$chambre->getPrix()."</td><td>".$chambre->getWifi2()."</td><td>";
            if ($chambre->getEtat()=="Reservée") {
                $result .= "<span class='res'>Réservée</span>";
            }
            else{
                $result .= "<span class='dispo'>Disponible</span>";
            }
            echo "</td></tr>";
        }
        $result .= "</tbody></table>";
        return $result;
    }

    public function getReservees() {
        $nb = 0;
        foreach ($this->nb_chambres as $chambre) {
            if($chambre->getEtat() == "<span class='res'>Réservée</span>")        //Ayant changé l'état on peut récupérer les réservations de l'hotel spécifié.
             $nb++;
        }
        return $nb;
    }

    public function getDisponibles() {
        return count($this->nb_chambres) - $this->getReservees();
    }

    public function afficherInfos() {
        return "<strong>".$this."</strong><br>$this->rue $this->cp $this->ville<br>Nombre de chambres : ".count($this->nb_chambres)."<br>Nombre de chambres réservées : ".$this->getReservees()."<br>Nombre de chambres disponibles : ". $this->getDisponibles();
    }

    public function ajouterReservation(Reservation $reservation) {
        $this->listeReservations[] = $reservation;
    }

    public function afficherReservation() {
        $result = "<strong>Réservations de l'hôtel $this</strong><br><span>".$this->getReservees()." réservations.</span><br>";
        foreach ($this->listeReservations as $reservation) {
            $result .= "<strong>".$reservation->getClient()->getNom()." ".$reservation->getClient()->getPrenom()."</strong> - Chambre ".$reservation->getChambre()->getNumero()." - du ".$reservation->getDateArrivee()." au ".$reservation->getDateFin()."<br>";
        }
        return $result;
    }

    public function __toString() {
        return "$this->nom ".str_repeat("*", $this->nb_etoiles). " $this->ville";
    }
}
?>