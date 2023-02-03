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
        $this->chambre->setEtat("<span class='res'>Réservé</span>");             ///!\Penser à modifier une propriété pour accéder à une autre : hotel de la chambre n'est pas accessible (private) mais en changeant l'état de la chambre on peut récupérer la réservation de l'hotel en question.
        $this->client->ajouterReservation($this);
        $this->chambre->getHotel()->ajouterReservation($this);
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

    public function dureeSejour($date_arrivee, $date_fin) {
        $duree = $this->date_arrivee->diff($this->date_fin);
        return $duree->format('%a');
    }
}
?>