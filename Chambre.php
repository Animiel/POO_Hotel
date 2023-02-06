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
        if ($this->wifi == true || $this->wifi == "<i class='fa-solid fa-wifi'></i>") {
            $this->prix = $prix +($this->nb_lits * 20) + 5;
        }
        else {
        $this->prix = $prix + ($this->nb_lits * 20);
        }
        $this->etat = "<span class='dispo'>Disponible</span>";
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
        $result = "";
        if ($this->wifi == false) {
            $result = "non";
        }
        else {
            $result = "oui";
        }
        return $result;
    }

    public function getWifi2() {
        $result = "";
        if ($this->wifi == true) {
            $result = "<i class='fa-solid fa-wifi'></i>";       //depuis site font awesome --> charge icone --> pour la cibler 'fa-wifi'. 'fa-solid' peut être présent chez plusieurs icones.
        }
        return $result;
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