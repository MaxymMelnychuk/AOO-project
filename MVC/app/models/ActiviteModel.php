<?php

class ActiviteModel extends Bdd
{
    // Initialise la connexion DB depuis la classe parente
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retourne toutes les activités avec leur type associé.
     */
    public function getAllActivities(): array
    {
        $stmt = $this->co->prepare(
            'SELECT a.*, t.nom AS type_nom
             FROM activities a
             INNER JOIN type_activite t ON a.type_id = t.id
             ORDER BY a.datetime_debut'
        );

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retourne une activité par son ID.
     */
    public function getActivityById(int $id): array
    {
        $stmt = $this->co->prepare(
            'SELECT a.*, t.nom AS type_nom
             FROM activities a
             INNER JOIN type_activite t ON a.type_id = t.id
             WHERE a.id = :id'
        );

        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * Calcule le nombre de places restantes pour une activité.
     */
    public function getPlacesLeft(int $id): int
    {
        // Récupère la capacité max
        $stmt = $this->co->prepare(
            'SELECT places_disponibles
             FROM activities
             WHERE id = :id'
        );

        $stmt->execute(['id' => $id]);
        $activity = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$activity) {
            return 0; // Activité inexistante
        }

        // Compte les réservations confirmées
        $stmt = $this->co->prepare(
            'SELECT COUNT(*) AS reserved
             FROM reservations
             WHERE activite_id = :id AND etat = TRUE'
        );

        $stmt->execute(['id' => $id]);
        $reserved = (int) $stmt->fetch(PDO::FETCH_ASSOC)['reserved'];

        // Calcul sécurisé (pas de négatif)
        return max(0, $activity['places_disponibles'] - $reserved);
    }
}
