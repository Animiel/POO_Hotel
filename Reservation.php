<?php
class Reservation {
    private Client $client;
    private Chambre $chambre;
    private DateTime $date_arrivee;
    private DateTime $date_fin;

    public function __construct(Client $client, Chambre $chambre, string $date_arrivee, string $date_fin) {
        $this->client = $client;
        $this->chambre = $chambre;
        $this->date_arrivee = new DateTime($date_arrivee);
        $this->date_fin = new DateTime($date_fin);
    }

    public function getClient() {
        return $this->client;
    }

    public function getChambre() {
        return $this->chambre;
    }

    public function getDateArrivee() {
        return $this->date_arrivee->format('d/m/Y');
    }

    public function getDateFin() {
        return $this->date_fin->format('d/m/Y');
    }
}
?>