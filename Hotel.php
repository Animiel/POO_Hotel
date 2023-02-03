<?php
class Hotel {
    private string $nom;
    private int $nb_etoiles;
    private string $rue;
    private string $cp;
    private string $ville;
    private array $nb_chambres;

    public function __construct(string $nom, string $rue, string $cp, string $ville, $nb_etoiles) {
        $this->nom = $nom;
        $this->nb_etoiles = $nb_etoiles;
        $this->rue = $rue;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->nb_chambres = [];
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

    public function __toString() {
        return "$this->nom ".str_repeat("*", $nb_etoiles). " $this->ville<br>";
    }
}
?>