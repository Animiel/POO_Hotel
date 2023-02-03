<?php
class Chambre {
    private int $numero;
    private int $nb_lits;
    private bool $wifi;
    private int $prix;
    private string $etat = "";
    private Hotel $hotel;

    public function __construct(int $numero, int $nb_lits, bool $wifi, int $prix, string $etat, Hotel $hotel) {
        $this->numero = $numero;
        $this->nb_lits = $nb_lits;
        $this->wifi = $wifi;
        $this->prix = $prix;
        $this->etat = "Disponible";
        $this->hotel = $hotel;
        $this->hotel->ajouterChambre($this);
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero(int $numero) {
        $this->numero = $numero;
    }

    public function getNbLits() {
        return $this->nb_lits;
    }

    public function setNbLits(int $nb_lits) {
        $this->nb_lits = $nb_lits;
    }

    public function getWifi() {
        return $this->wifi;
    }

    public function setWifi(bool $wifi) {
        $this->wifi = $wifi;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix(int $prix) {
        $this->prix = $prix;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setEtat(string $etat) {
        $this->etat = $etat;
    }

    public function getHotel() {
        return $this->hotel;
    }

    public function __toString() {
        return "Chambre : $this->numero";
    }
}
?>