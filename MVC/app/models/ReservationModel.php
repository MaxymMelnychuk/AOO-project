<?php

class ReservationModel extends Bdd
{
    // Initialise la connexion DB depuis la classe parente
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Crée une réservation pour un utilisateur.
     */
    public function createReservation(int $userId, int $activityId): bool
    {
        $stmt = $this->co->prepare(
            'INSERT INTO reservations (user_id, activite_id)
             VALUES (:user_id, :activite_id)'
        );

        return $stmt->execute([
            'user_id'      => $userId,
            'activite_id'  => $activityId
        ]);
    }

    /**
     * Retourne toutes les réservations d'un utilisateur.
     */
    public function getReservationsByUserId(int $userId): array
    {
        $stmt = $this->co->prepare(
            'SELECT *
             FROM reservations
             WHERE user_id = :user_id'
        );

        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Marque une réservation comme annulée.
     */
    public function cancelReservation(int $reservationId): bool
    {
        $stmt = $this->co->prepare(
            'UPDATE reservations
             SET etat = FALSE
             WHERE id = :id'
        );

        return $stmt->execute(['id' => $reservationId]);
    }
}
